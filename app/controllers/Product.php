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
      'assets/js/fileinput.min.js',
      'assets/js/theme.min.js'
    ];

    protected $styles = [
      'assets/css/fileinput.min.css'
    ];

    private $data_credits;
    private $file_upload;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model', 'products');
        $this->load->model('Brand_model', 'brands');
        $this->load->model('Lease_model', 'leases');

        $this->config->load('file_upload', true);
        $this->file_upload = $this->config->item('file_upload');

        $this->load->library('uploads', [
          'upload_path' => sprintf('%soriginal', $this->file_upload['path']),
          'allowed_types' => $this->file_upload['image_allowed'],
          'encrypt_name' => true,
          'file_ext_tolower' => true
        ]);

        $this->brands->before_dropdown = ['motor', 'parent'];
        $this->data_credits = $this->leases->with('credits')->get_all();

        $this->form_validation->set_rules('brand_id', 'Merek', 'required');
        $this->form_validation->set_rules('year', 'Tahun', 'required|max_length[9999]');
        $this->form_validation->set_rules('price', 'Harga', 'required');
        $this->form_validation->set_rules('down_payment', 'Uang Muka', 'required');
        $this->form_validation->set_rules('description', 'Keterangan', 'required');
    }

    public function index()
    {
        $parent_brand = $this->brands->get_parent();
        $products = $this->products->with('brand')->get_all();
        $header = ['title' => $this->title, 'styles' => $this->styles];
        $this->load->view('backend/header', $header);
        $this->load->view('backend/product/index', compact('products', 'parent_brand'));
        $this->load->view('backend/footer', ['scripts' => $this->scripts]);
    }

    public function create()
    {
        $header = ['title' => $this->title, 'styles' => $this->styles];
        $brands = $this->brands->custom_dropdown();
        $leases = $this->data_credits;
        $years = $this->products->years();
        $this->load->view('backend/header', $header);
        $this->load->view('backend/product/create', compact('brands', 'leases', 'years'));
        $this->load->view('backend/footer', ['scripts' => $this->scripts]);
    }

    public function insert()
    {
        if ($this->form_validation->run()) {
            $filename = [];
            if ($this->uploads->do_upload('photos')) {
                $filename = array_column($this->uploads->data(), 'file_name');
            } else {
                // debug($this->uploads->display_errors());
                return $this->create();
            }
            $data = $this->input->post();
            $data['photos'] = json_encode($filename, true);
            $this->products->insert($data);
            redirect('product');
        } else {
            return $this->create();
        }
    }

    public function edit($id = null)
    {
        $product = $this->products->with('brand')->get($id);
        $header = ['title' => $this->title, 'styles' => $this->styles];
        $brands = $this->brands->custom_dropdown();
        $leases = $this->data_credits;
        $years = $this->products->years();
        $this->load->view('backend/header', $header);
        $this->load->view('backend/product/edit', compact('product', 'leases', 'brands', 'years'));
        $this->load->view('backend/footer', ['scripts' => $this->scripts]);
    }

    public function update($id = null)
    {
        $product = $this->products->get($id);
        if ($this->form_validation->run()) {
            $filename = [];

            if ($this->uploads->do_upload('photos')) {
                $this->delete_photo($product->photos);
                $filename = array_column($this->uploads->data(), 'file_name');
            } else {
                // debug($this->uploads->display_errors());
                return $this->edit($product->id);
            }

            $data = $this->input->post();
            $data['photos'] = json_encode($filename, true);
            $this->products->update($product->id, $data);
            redirect('product');
        } else {
            return $this->edit($product->id);
        }
    }

    public function delete($id = null)
    {
        $product = $this->products->get($id);
        if (!empty($product)) {
            $this->delete_photo($product->photos);
            return $this->products->delete($product->id);
        }

        return false;
    }

    private function delete_photo($photos)
    {
        if(empty($photos)) {
          return;
        }

        $this->load->helper('directory');
        $map = directory_map($this->file_upload['path']);
        $images = [];
        foreach (array_keys($map) as $available_path) {
            $images[] = array_map(function($photo) use($available_path) {
                return sprintf('%s%s%s', $this->file_upload['path'], $available_path, $photo);
            }, $photos);
        }

        $this->image->remove($images);
    }
}
