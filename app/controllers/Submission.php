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

     public function __construct()
     {
         parent::__construct();
         $this->load->model('Submission_model', 'submissions');
     }

     public function index()
     {
         $submissions = $this->submissions->with('debtor', 'product')->get_all();
         $this->load->view('backend/header', ['title' => $this->title]);
         $this->load->view('backend/submission/index', compact('submissions'));
         $this->load->view('backend/footer');
     }
 }
