<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Backend
 *
 * @author nanank
 */

 class Submission extends CI_Controller
 {
     protected $title = 'Simulasi Angsuran';
     protected $scripts = [
         'assets/js/jquery.dataTables.js',
         'assets/js/dataTables.bootstrap4.js'
     ];

     protected $styles = ['assets/css/dataTables.bootstrap4.css'];

     public function __construct()
     {
         parent::__construct();
         $this->load->model('Submission_model', 'submissions');
     }

     public function index()
     {
         $submissions = $this->submissions->with('debtor', 'product')->get_all();
         $header = ['title' => $this->title, 'styles' => $this->styles];
         $this->load->view('backend/header', $header);
         $this->load->view('backend/submission/index', compact('submissions'));
         $this->load->view('backend/footer', ['scripts' => $this->scripts]);
     }
 }
