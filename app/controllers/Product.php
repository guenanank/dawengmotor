<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Product
 *
 * @author nanank
 */
class Product extends CI_Controller
{
    protected $title = 'Unit Produk';
    protected $scripts = [
      'summernote-bs4.min',
      'fileinput.min',
      'theme.min',
      'product',
    ];

    protected $styles = [
      'summernote-bs4',
      'fileinput.min',
      // 'bootstrap-switch'
    ];

    private $file_upload;

    public function __construct()
    {
        parent::__construct();
        if ($this->session->has_userdata('logged_in') == false) {
            redirect('/login');
        }
        $this->load->model('Product_model', 'products');
        $this->load->model('Product_credit_model', 'product_credits');
        $this->load->model('Brand_model', 'brands');
        $this->load->model('Lease_model', 'leases');

        $this->config->load('file_upload', true);
        $this->file_upload = $this->config->item('file_upload');
        $this->file_upload['upload']['upload_path'] = sprintf('%soriginal', $this->file_upload['upload']['path']);
        $this->file_upload['upload']['allowed_types'] = $this->file_upload['upload']['image_allowed'];
        // unset($this->file_upload['upload']['path']);
        unset($this->file_upload['upload']['image_allowed']);

        $this->brands->before_dropdown = ['motor', 'parent'];

        $this->form_validation->set_rules('brand_id', 'Merek', 'required');
        $this->form_validation->set_rules('year', 'Tahun', 'required|max_length[9999]');
        $this->form_validation->set_rules('price', 'Harga', 'required');
        $this->form_validation->set_rules('down_payment', 'Uang Muka', 'required');
        $this->form_validation->set_rules('description', 'Keterangan', 'required');
    }

    public function index()
    {
        $parent_brand = $this->brands->get_parent();
        $products = $this->products->with('brand')->get_many_by('sold', false);
        $header = ['title' => $this->title, 'styles' => $this->styles];
        $this->load->view('header', $header);
        $this->load->view('product/index', compact('products', 'parent_brand'));
        $this->load->view('footer', ['scripts' => $this->scripts]);
    }

    public function create()
    {
        $brands = $this->brands->custom_dropdown();
        $leases = $this->leases->dropdown('id', 'name');
        $years = $this->products->years();
        $this->load->view('header', ['title' => $this->title, 'styles' => $this->styles]);
        $this->load->view('product/create', compact('brands', 'leases', 'years'));
        $this->load->view('footer', ['scripts' => $this->scripts]);
    }

    public function insert()
    {
        if ($this->input->is_ajax_request() == false) {
            show_404();
        }

        $input_post = $this->input->post();
        if ($this->form_validation->run()) {
            $this->brands->before_dropdown = [];
            $brands = $this->brands->dropdown('name');
            $this->file_upload['upload']['file_name'] = sprintf('dw-%s-%04d-0', url_title($brands[$input_post['brand_id']], '_', true), $input_post['year']);
            $this->load->library('uploads', $this->file_upload['upload']);

            if ($this->uploads->do_upload('photos')) {
                $photos = $this->_filename($this->uploads->data());
                $this->_watermark($photos);
            }

            $create = $this->products->insert([
                'brand_id' => $input_post['brand_id'],
                'year' => $input_post['year'],
                'description' => $input_post['description'],
                'price' => $input_post['price'],
                'down_payment' => $input_post['down_payment'],
                'lease_id' => $input_post['lease_id'],
                'photos' => $photos
            ]);

            $credits = [];
            foreach ($input_post['credits'] as $id => $credit) {
                $credits[] = [
                  'product_id' => $create,
                  'credit_id' => $id,
                  'installment' => $credit['installment'],
                  'flat' => $credit['flat']
                ];
            }

            $status = 200;
            $messege = $this->product_credits->insert_many($credits);
        } else {
            $status = 422;
            $messege = $this->form_validation->error_array();
        }

        return $this->output->set_content_type('application/json')
          ->set_status_header($status)
          ->set_output(json_encode($messege));
        exit;
    }

    public function edit($id = null)
    {
        $product = $this->products->with('brand')->with('lease')->get($id);
        $brands = $this->brands->custom_dropdown();
        $leases = $this->leases->dropdown('id', 'name');
        $years = $this->products->years();
        $this->load->view('header', ['title' => $this->title, 'styles' => $this->styles]);
        $this->load->view('product/edit', compact('product', 'leases', 'brands', 'years'));
        $this->load->view('footer', ['scripts' => $this->scripts]);
    }

    public function update($id = null)
    {
        if ($this->input->is_ajax_request() == false) {
            show_404();
        }

        $product = $this->products->get($id);
        $input_post = $this->input->post();
        if ($this->form_validation->run()) {
            $this->brands->before_dropdown = [];
            $brands = $this->brands->dropdown('name');
            $this->file_upload['upload']['file_name'] = sprintf('dw-%s-%04d-0', url_title($brands[$input_post['brand_id']], '_', true), $input_post['year']);
            $this->load->library('uploads', $this->file_upload['upload']);

            if ($this->uploads->do_upload('photos')) {
                $photos = $this->_filename($this->uploads->data());
            } else {
                $this->_watermark($product->photos);
                $photos = json_encode($product->photos);
            }

            $update = $this->products->update($product->id, [
                'brand_id' => $input_post['brand_id'],
                'year' => $input_post['year'],
                'description' => $input_post['description'],
                'price' => $input_post['price'],
                'down_payment' => $input_post['down_payment'],
                'lease_id' => $input_post['lease_id'],
                'photos' => $photos
            ]);

            $credits = [];
            $this->product_credits->delete_by('product_id', $product->id);
            foreach ($input_post['credits'] as $id => $credit) {
                $credits[] = [
                  'product_id' => $product->id,
                  'credit_id' => $id,
                  'installment' => $credit['installment'],
                  'flat' => $credit['flat']
                ];
            }

            $status = 200;
            $messege = $this->product_credits->insert_many($credits);
        } else {
            $status = 422;
            $messege = $this->form_validation->error_array();
        }

        return $this->output->set_content_type('application/json')
          ->set_status_header($status)
          ->set_output(json_encode($messege));
        exit;
    }

    public function delete($id = null)
    {
        $return = false;
        $product = $this->products->get($id);
        if (!empty($product)) {
            $this->_delete_photo(array_column($product->photos, 'caption'));
            $return = $this->products->delete($product->id);
        }

        return $this->output->set_content_type('application/json')
          ->set_status_header(200)
          ->set_output(json_encode([$return]));
        exit;
    }

    private function _filename($photos)
    {
        $file_name = [];
        foreach ($photos as $photo) {
            $file_name[] = [
              'caption' => $photo['file_name'],
              'mime' => $photo['file_type'],
              'extension' => $photo['file_ext'],
              'size' => $photo['file_size'],
              'width' => $photo['image_width'],
              'height' => $photo['image_height'],
              'image_type' => $photo['image_type'],
              'url' => sprintf('%s/%s', base_url($this->file_upload['upload']['upload_path']), $photo['file_name'])
            ];

            $this->load->library('image_lib');
            $this->_resize($photo['full_path']);
            $this->_watermark($photo['full_path']);
        }

        return json_encode($file_name);
    }

    private function _watermark($image)
    {
        $watermark['source_image'] = $image;
        $watermark['quality'] = '100%';
        $watermark['wm_type'] = 'overlay';
        $watermark['wm_overlay_path'] = './assets/img/dw-watermark.png';
        $watermark['wm_vrt_alignment'] = 'middle';
        $watermark['wm_hor_alignment'] = 'center';
        $this->image_lib->clear();
        $this->image_lib->initialize($watermark);
        $this->image_lib->watermark();
    }

    private function _resize($image)
    {
        $resize['source_image'] = $image;
        $resize['maintain_ratio'] = true;
        $resize['width'] = 1024;
        $resize['height'] = 768;
        $resize['quality'] = '100%';
        $this->image_lib->clear();
        $this->image_lib->initialize($resize);
        $this->image_lib->resize();
    }

    private function _delete_photo($photos)
    {
        if (empty($photos)) {
            return;
        }

        $images = [];
        $this->load->helper('directory');
        $map = directory_map($this->file_upload['upload']['path']);
        foreach (array_keys($map) as $available_path) {
            $images[] = array_map(function ($photo) use ($available_path) {
                return sprintf('%s%s%s', $this->file_upload['upload']['path'], $available_path, $photo);
            }, $photos);
        }

        $this->image->remove($images);
    }
}
