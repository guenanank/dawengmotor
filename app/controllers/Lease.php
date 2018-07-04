<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Lease
 *
 * @author nanank
 */
class Lease extends CI_Controller
{
    protected $title = 'Merek Kendaraan';
    protected $scripts = [
      'assets/js/jquery.dataTables.js',
      'assets/js/dataTables.bootstrap4.js'
    ];
    protected $styles = ['assets/css/dataTables.bootstrap4.css'];

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Lease_model', 'leases');
        $this->form_validation->set_rules('name', 'Nama', 'required|max_length[128]');
        $this->form_validation->set_rules('description', 'Keterangan', 'alpha_numeric');
    }

    public function index()
    {
        $leases = $this->leases->get_all();
        $header = ['title' => $this->title, 'styles' => $this->styles];
        $this->load->view('backend/header', $header);
        $this->load->view('backend/lease/index', compact('leases'));
        $this->load->view('backend/footer', ['scripts' => $this->scripts]);
    }

    public function create()
    {
        $header = ['title' => $this->title, 'styles' => $this->styles];
        $this->load->view('backend/header', $header);
        $this->load->view('backend/lease/create');
        $this->load->view('backend/footer', ['scripts' => $this->scripts]);
    }

    public function insert()
    {
        if ($this->form_validation->run()) {
            $this->leases->insert($this->input->post());
            redirect('lease');
        } else {
            return $this->create();
        }
    }

    public function edit($id = null)
    {
        $lease = $this->leases->get($id);
        $header = ['title' => $this->title, 'styles' => $this->styles];
        $this->load->view('backend/header', $header);
        $this->load->view('backend/lease/edit', compact('lease'));
        $this->load->view('backend/footer', ['scripts' => $this->scripts]);
    }

    public function update($id = null)
    {
        $lease = $this->leases->get($id);
        if (!empty($lease) && $this->form_validation->run()) {
            $this->leases->update($lease->id, $this->input->post());
            redirect('lease');
        } else {
            return $this->edit($lease->id);
        }
    }

    public function delete($id = null)
    {
        $lease = $this->leases->get($id);
        if (!empty($lease)) {
            return $this->leases->delete($lease->id);
        }
        return false;
    }
}
