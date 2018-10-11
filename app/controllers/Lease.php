<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Lease
 *
 * @author nanank
 */
class Lease extends CI_Controller
{
    protected $title = 'Leasing Pembayaran';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Lease_model', 'leases');
        $this->form_validation->set_rules('name', 'Nama', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('description', 'Keterangan', 'trim');
    }

    public function index()
    {
        $leases = $this->leases->get_all();
        $this->load->view('header', ['title' => $this->title]);
        $this->load->view('lease/index', compact('leases'));
        $this->load->view('footer');
    }

    public function create()
    {
        $this->load->view('header', ['title' => $this->title]);
        $this->load->view('lease/create');
        $this->load->view('footer');
    }

    public function insert()
    {
        if ($this->input->is_ajax_request() == false) {
            show_404();
        }

        if ($this->form_validation->run()) {
            $status = 200;
            $messege = ['create' => $this->leases->insert($this->input->post())];
        } else {
            $status = 422;
            $messege = $this->form_validation->error_array();
        }

        return $this->output->set_content_type('application/json')
        ->set_status_header($status)
        ->set_output(json_encode($messege));
        exit;
    }

    public function edit($id = null)
    {
        $lease = $this->leases->get($id);
        $this->load->view('header', ['title' => $this->title]);
        $this->load->view('lease/edit', compact('lease'));
        $this->load->view('footer');
    }

    public function update($id = null)
    {
        if ($this->input->is_ajax_request() == false) {
            show_404();
        }

        $lease = $this->leases->get($id);
        if ($this->form_validation->run()) {
            $status = 200;
            $messege = ['update' => $this->leases->update($lease->id, $this->input->post())];
        } else {
            $status = 422;
            $messege = $this->form_validation->error_array();
        }

        return $this->output->set_content_type('application/json')
          ->set_status_header($status)
          ->set_output(json_encode($messege));
        exit;
    }

    public function delete($id = null)
    {
        if ($this->input->is_ajax_request() == false) {
            show_404();
        }

        $lease = $this->leases->get($id);
        $return = false;
        if (!empty($lease)) {
            $return = $this->leases->delete($lease->id);
        }

        return $this->output->set_content_type('application/json')
          ->set_status_header(200)
          ->set_output(json_encode([$return]));
        exit;
    }
}
