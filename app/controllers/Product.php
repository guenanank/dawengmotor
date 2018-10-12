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

    // private $data_credits;
    private $file_upload;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model', 'products');
        $this->load->model('Product_credit_model', 'product_credits');
        $this->load->model('Brand_model', 'brands');
        $this->load->model('Lease_model', 'leases');

        $this->config->load('file_upload', true);
        $this->file_upload = $this->config->item('file_upload');

        $this->brands->before_dropdown = ['motor', 'parent'];
        // $this->data_credits = $this->leases->get_all();

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
            $this->load->library('uploads', [
              'upload_path' => sprintf('%soriginal', $this->file_upload['path']),
              'allowed_types' => $this->file_upload['image_allowed'],
              'file_name' => sprintf('dw-%s-%s-0', url_title($brands[$input_post['brand_id']], '-', true), $input_post['year']),
              'file_ext_tolower' => true
            ]);

            if ($this->uploads->do_upload('photos')) {
                $create = $this->products->insert([
                    'brand_id' => $input_post['brand_id'],
                    'year' => $input_post['year'],
                    'description' => $input_post['description'],
                    'price' => $input_post['price'],
                    'down_payment' => $input_post['down_payment'],
                    'lease_id' => $input_post['lease_id'],
                    'photos' => $this->filename($this->uploads->data())
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
                $messege = $this->uploads->display_errors();
            }
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
        $product = $this->products->with('brand')->get($id);
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
            $this->load->library('uploads', [
            'upload_path' => sprintf('%soriginal', $this->file_upload['path']),
            'allowed_types' => $this->file_upload['image_allowed'],
            'file_name' => sprintf('dw-%s-%s-0', url_title($brands[$input_post['brand_id']], '-', true), $input_post['year']),
            'file_ext_tolower' => true
          ]);

            if ($this->uploads->do_upload('photos')) {
                $create = $this->products->update($product->id, [
                  'brand_id' => $input_post['brand_id'],
                  'year' => $input_post['year'],
                  'description' => $input_post['description'],
                  'price' => $input_post['price'],
                  'down_payment' => $input_post['down_payment'],
                  'lease_id' => $input_post['lease_id'],
                  'photos' => $this->filename($this->uploads->data())
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
                $messege = $this->uploads->display_errors();
            }
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
            foreach ($product->photos as $photo) {
                $this->delete_photo($photo['caption']);
            }
            $return = $this->products->delete($product->id);
        }

        return $this->output->set_content_type('application/json')
          ->set_status_header(200)
          ->set_output(json_encode([$return]));
        exit;
    }

    private function filename($photos)
    {
        $filename = [];
        foreach ($photos as $key => $value) {
            $filename[] = [
              'caption' => $value['file_name'],
              'mime' => $value['file_type'],
              'extension' => $value['file_ext'],
              'size' => $value['file_size'],
              'width' => $value['image_width'],
              'height' => $value['image_height'],
              'image_type' => $value['image_type'],
              'url' => sprintf('%s%soriginal/%s', base_url(), $this->file_upload['path'], $value['file_name'])
            ];
        }

        return json_encode($filename);
    }

    private function delete_photo($photos)
    {
        if (empty($photos)) {
            return;
        }

        $this->load->helper('directory');
        $map = directory_map($this->file_upload['path']);
        $images = [];
        foreach (array_keys($map) as $available_path) {
            $images[] = array_map(function ($photo) use ($available_path) {
                return sprintf('%s%s%s', $this->file_upload['path'], $available_path, $photo);
            }, $photos);
        }

        $this->image->remove($images);
    }
}
