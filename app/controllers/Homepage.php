<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Homepage
 *
 * @author nanank
 */
class Homepage extends CI_Controller
{
    protected $title = 'Beranda';

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Product_model', 'products');
        $this->load->library('Repositories');
    }

    public function index()
    {
        $data = [
          'sliders' => $this->repositories->sliders(),
          'latest_products' => $this->repositories->latest_products(),
        ];

        $this->load->view('header');
        $this->load->view('homepage', $data);
        $this->load->view('footer');
    }

    public function preview($product_id)
    {
        $product = $this->products->with('brand')->get($product_id);
        $this->load->view('header');
        $this->load->view('item', compact('product'));
        $this->load->view('footer');
    }
}
