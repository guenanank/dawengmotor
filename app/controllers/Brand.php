<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Brand
 *
 * @author nanank
 */
class Brand extends CI_Controller
{
    protected $title = 'Merek Kendaraan';

    public function __construct()
    {
        parent::__construct();
        if($this->session->has_userdata('logged_in') == false) {
            redirect('/login');
        }
        $this->load->model('Brand_model', 'brands');
        $this->brands->before_dropdown = ['parent'];

        $this->form_validation->set_rules('name', 'Nama', 'trim|required|max_length[64]');
        $this->form_validation->set_rules('type', 'Tipe', 'required');
    }

    public function index()
    {
        $brands = $this->brands->with('parent')->get_all();
        $this->load->view('header', ['title' => $this->title]);
        $this->load->view('brand/index', compact('brands'));
        $this->load->view('footer');
    }

    public function create()
    {
        $parents = $this->brands->get_parent();
        $types = $this->brands->types;
        $this->load->view('header', ['title' => $this->title]);
        $this->load->view('brand/create', compact('parents', 'types'));
        $this->load->view('footer');
    }

    public function insert()
    {
        if ($this->input->is_ajax_request() == false) {
            show_404();
        }

        if ($this->form_validation->run()) {
            $status = 200;
            $messege = ['create' => $this->brands->insert($this->input->post())];
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
        $brand = $this->brands->get($id);
        $parents = $this->brands->get_parent();
        $types = $this->brands->types;
        $this->load->view('header', ['title' => $this->title]);
        $this->load->view('brand/edit', compact('brand', 'parents', 'types'));
        $this->load->view('footer');
    }

    public function update($id = null)
    {
        if ($this->input->is_ajax_request() == false) {
            show_404();
        }

        $brand = $this->brands->get($id);
        if ($this->form_validation->run()) {
            $status = 200;
            $messege = ['update' => $this->brands->update($brand->id, $this->input->post())];
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

        $brand = $this->brands->get($id);
        $return = false;
        if (!empty($brand)) {
            $return = $this->brands->delete($brand->id);
        }

        return $this->output->set_content_type('application/json')
          ->set_status_header(200)
          ->set_output(json_encode([$return]));
        exit;
    }
}
