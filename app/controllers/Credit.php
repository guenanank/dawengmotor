<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Credit
 *
 * @author nanank
 */
class Credit extends CI_Controller
{
    protected $title = 'Simulasi Angsuran';
    protected $scripts = [
      'assets/js/jquery.dataTables.js',
      'assets/js/dataTables.bootstrap4.js',
      'assets/js/jquery.mask.min.js'
    ];
    protected $styles = ['assets/css/dataTables.bootstrap4.css'];

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Lease_model', 'leases');
        $this->load->model('Credit_model', 'credits');

        $this->form_validation->set_rules('lease_id', 'Nama Leasing', 'required');
        $this->form_validation->set_rules('tenor', 'Tenor', 'required|numeric|max_length[100]');
        $this->form_validation->set_rules('insurance', 'Asuransi', 'required|decimal');
    }

    public function index()
    {
        $credits = $this->credits->with('lease')->get_all();
        $header = ['title' => $this->title, 'styles' => $this->styles];
        $this->load->view('backend/header', $header);
        $this->load->view('backend/credit/index', compact('credits'));
        $this->load->view('backend/footer', ['scripts' => $this->scripts]);
    }

    public function create()
    {
        $header = ['title' => $this->title, 'styles' => $this->styles];
        $leases = $this->leases->dropdown('id', 'name');
        $this->load->view('backend/header', $header);
        $this->load->view('backend/credit/create', compact('leases'));
        $this->load->view('backend/footer', ['scripts' => $this->scripts]);
    }

    public function insert()
    {
        if ($this->form_validation->run()) {
            $this->credits->insert($this->input->post());
            redirect('credit');
        } else {
            return $this->create();
        }
    }

    public function edit($id = null)
    {
        $credit = $this->credits->with('lease')->get($id);
        $header = ['title' => $this->title, 'styles' => $this->styles];
        $leases = $this->leases->dropdown('id', 'name');
        $this->load->view('backend/header', $header);
        $this->load->view('backend/credit/edit', compact('credit', 'leases'));
        $this->load->view('backend/footer', ['scripts' => $this->scripts]);
    }

    public function update($id = null)
    {
        $credit = $this->credits->get($id);
        if (!empty($credit) && $this->form_validation->run()) {
            $this->credits->update($credit->id, $this->input->post());
            redirect('credit');
        } else {
            return $this->edit($credit->id);
        }
    }

    public function delete($id = null)
    {
        $credit = $this->credits->get($id);
        if (!empty($credit)) {
            return $this->credits->delete($credit->id);
        }

        return false;
    }
}
