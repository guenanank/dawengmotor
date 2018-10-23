<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Config
 *
 * @author nanank
 */

 class Config extends CI_Controller
 {
     protected $title = 'Pengaturan Sistem';
     public $type;

     public function __construct()
     {
         parent::__construct();
         $this->load->library('encryption');
         $this->type = $this->configs->type();
     }

     public function index()
     {
         $configs = $this->configs->get_all();
         $this->load->view('header', ['title' => $this->title]);
         $this->load->view('config/index', compact('configs'));
         $this->load->view('footer');
     }
 }
