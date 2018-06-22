<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Backend
 *
 * @author nanank
 */
class Backend extends CI_Controller
{
    protected $title = 'Beranda';
    protected $scripts = [];
    protected $styles = [];

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('backend/header', ['title' => $this->title, 'styles' => $this->styles]);
        $this->load->view('backend/backend/index');
        $this->load->view('backend/footer', ['scripts' => $this->scripts]);
    }

}
