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
      'assets/js/jquery.dataTables.js',
      'assets/js/dataTables.bootstrap4.js',
      'assets/js/jquery.mask.min.js',
      'assets/js/gijgo.min.js',
      'assets/js/fileinput.min.js',
      'assets/js/theme.min.js'
    ];

    protected $styles = [
      'assets/css/dataTables.bootstrap4.css',
      'assets/css/gijgo.min.css',
      'assets/css/fileinput.min.css'
    ];

    private $data_credits;
    private $upload_path = './assets/uploads/original';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model', 'products');
        $this->load->model('Brand_model', 'brands');
        $this->load->model('Lease_model', 'leases');

        $this->load->library('uploads', [
          'upload_path' => $this->upload_path,
          'allowed_types' => 'gif|jpg|png|jpeg',
          'overwrite' => true,
          'encrypt_name' => true,
        ]);


        $this->brands->before_dropdown = ['motor', 'parent'];
        $this->data_credits = $this->leases->with('credits')->get_all();

        $this->form_validation->set_rules('brand_id', 'Merek', 'required');
        $this->form_validation->set_rules('price', 'Harga', 'required');
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
        $brands = $this->brands->nested_dropdown();
        $leases = $this->data_credits;
        $this->load->view('backend/header', $header);
        $this->load->view('backend/product/create', compact('brands', 'leases'));
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
        $brands = $this->brands->nested_dropdown();
        $leases = $this->data_credits;
        $this->load->view('backend/header', $header);
        $this->load->view('backend/product/edit', compact('product', 'leases', 'brands'));
        $this->load->view('backend/footer', ['scripts' => $this->scripts]);
    }

    public function update($id = null)
    {
        $product = $this->products->get($id);
        if ($this->form_validation->run()) {
            $filename = [];


            // foreach ($product->photos as $photo) {
            //     echo $photo;
            //     unlink(sprintf('%s/%s', $this->upload_path, $photo));
            // }

            if ($this->uploads->do_upload('photos')) {
                $filename = array_column($this->uploads->data(), 'file_name');
                // $this->image->thumbnail($filename, 2);
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
            return $this->product->delete($product->id);
        }

        return false;
    }
}
