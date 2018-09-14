<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Backend
 *
 * @author nanank
 */
class Dashboard extends CI_Controller
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
        $this->load->view('header', ['title' => $this->title, 'styles' => $this->styles]);
        $this->load->view('dashboard/index');
        $this->load->view('footer', ['scripts' => $this->scripts]);
    }

}
