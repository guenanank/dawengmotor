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
        $this->load->model('Product_model', 'products');
    }

    public function index()
    {
        $products = $this->products->with('brand')->limit(10)->get_many_by('sold', false);
        $this->load->view('header');
        $this->load->view('homepage', compact('products'));
        $this->load->view('footer');
    }

}
