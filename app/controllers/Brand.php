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
    protected $scripts = [
      'assets/js/jquery.dataTables.js',
      'assets/js/dataTables.bootstrap4.js'
    ];
    protected $styles = ['assets/css/dataTables.bootstrap4.css'];

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Brand_model', 'brands');
        $this->brands->before_dropdown = ['parent'];

        $this->form_validation->set_rules('name', 'Nama', 'required|max_length[127]');
        $this->form_validation->set_rules('type', 'Tipe', 'required');
    }

    public function index()
    {
        $brands = $this->brands->with('parent')->get_all();
        $this->load->view('backend/header', ['title' => $this->title, 'styles' => $this->styles]);
        $this->load->view('backend/brand/index', compact('brands'));
        $this->load->view('backend/footer', ['scripts' => $this->scripts]);
    }

    public function create()
    {
        $parents = $this->brands->get_parent();
        $types = $this->brands->types;
        $this->load->view('backend/header', ['title' => $this->title, 'styles' => $this->styles]);
        $this->load->view('backend/brand/create', compact('parents', 'types'));
        $this->load->view('backend/footer', ['scripts' => $this->scripts]);
    }

    public function insert()
    {
        if ($this->form_validation->run()) {
            $this->brands->insert($this->input->post());
            redirect('brand');
        } else {
            return $this->create();
        }
    }

    public function edit($id = null)
    {
        $brand = $this->brands->get($id);
        $parents = $this->brands->get_parent();
        $types = $this->brands->types;
        $this->load->view('backend/header', ['title' => $this->title, 'styles' => $this->styles]);
        $this->load->view('backend/brand/edit', compact('brand', 'parents', 'types'));
        $this->load->view('backend/footer', ['scripts' => $this->scripts]);
    }

    public function update($id = null)
    {
        $brand = $this->brands->get($id);
        if (!empty($brand) && $this->form_validation->run()) {
            $this->brands->update($brand->id, $this->input->post());
            redirect('brand');
        } else {
            return $this->edit($brand->id);
        }
    }

    public function delete($id = null)
    {
        $brand = $this->brands->get($id);
        if (!empty($brand)) {
            return $this->brands->delete($brand->id);
        }

        return false;
    }
}
