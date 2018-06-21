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
    private $opt_brand;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model', 'products');
        $this->load->model('Brand_model', 'brands');
        $this->load->model('Lease_model', 'leases');

        // $this->brands->before_dropdown = ['motor'];

        $this->data_credits = $this->leases->with('credits')->get_all();

        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('type', 'Tipe', 'required');

        $this->opt_brand = $this->brands->dropdown('id', 'name');
        array_unshift($this->opt_brand, 'Pilih Merek Kendaraan');
    }

    public function index()
    {
        $products = $this->products->with('brand')->get_all();
        $header = ['title' => $this->title, 'styles' => $this->styles];
        $scripts = $this->scripts;
        $this->load->view('backend/header', $header);
        $this->load->view('backend/product/index', ['products' => $products]);
        $this->load->view('backend/footer', compact('scripts'));
    }

    public function create()
    {
        $header = ['title' => $this->title, 'styles' => $this->styles];
        $brands = $this->opt_brand;
        $leases = $this->data_credits;
        $this->load->view('backend/header', $header);
        $this->load->view('backend/product/create', compact('brands', 'leases'));
        $this->load->view('backend/footer', ['scripts' => $this->scripts]);
    }

    public function insert()
    {
        debug($this->input->post());
        if ($this->form_validation->run()) {
            $this->products->insert($this->input->post());
            redirect('product');
        } else {
            return $this->create();
        }
    }

    public function edit($id = null)
    {
        $product = $this->products->get($id);
        $header = ['title' => $this->title, 'styles' => $this->styles];
        $this->load->view('backend/header', $header);
        $this->load->view('backend/product/edit', ['product' => $product]);
        $this->load->view('backend/footer', ['scripts' => $this->scripts]);
    }

    public function update($id = null)
    {
        $product = $this->products->get($id);
        if (!empty($product) && $this->form_validation->run()) {
            $this->product->update($product->id, $this->input->post());
            redirect('product');
        } else {
            return $this->edit($product->id);
        }
    }

    public function delete($id = null)
    {
        $product = $this->products->get($id);
        if (!empty($product)) {
            $this->product->delete($product->id);
        }

        redirect('product');
    }
}
