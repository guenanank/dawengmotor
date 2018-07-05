<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Item
 *
 * @author nanank
 */
class Item extends CI_Controller
{
    protected $title = 'Beranda';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model', 'products');
    }

    public function preview($product_id)
    {
        $product = $this->products->with('brand')->get($product_id);
        $this->load->view('header');
        $this->load->view('item', compact('product'));
        $this->load->view('footer');
    }

}
