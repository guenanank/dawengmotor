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
         // $password = $this->encryption->encrypt('babacoi');
         // $decrypt = $this->encryption->decrypt('119e42e538b165cba654cd9e72ac565f13ae6147f37c560ff927d16a61205b3dd3e11fc1f951366510628402d1d4504e91628fbd55fd98d2d877c33b597c61b7dxnf5j3bP0LxJtgYd0gYo8cxxhpQ+/U=');
         // debug($password);
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
