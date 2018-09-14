<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Debtor
 *
 * @author nanank
 */
class Debtor extends CI_Controller
{
    protected $title = 'Simulasi Angsuran';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Debtor_model', 'debtors');
        $this->form_validation->set_rules('number', 'Nomer Urut', 'trim|required|max_length[16]');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('fullname', 'Nama Lengkap', 'trim|required|min_length[8]|max_length[256]');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('address', 'Alamat', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]');
        $this->form_validation->set_rules('phone', 'Telepon', 'trim|required|numeric|max_length[16]');
        $this->form_validation->set_rules('domicile', 'Domisili', 'required');
        $this->form_validation->set_rules('home_status', 'Status Tempat Tinggal', 'required');
        $this->form_validation->set_rules('work', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('work_experience', 'Lama Bekerja', 'trim|required|max_length[64]');
        $this->form_validation->set_rules('income', 'Penghasilan', 'required');
    }

    public function index()
    {
        $debtors = $this->debtors->get_all();
        $this->load->view('header', ['title' => $this->title]);
        $this->load->view('debtor/index', compact('debtors'));
        $this->load->view('footer');
    }

    public function create()
    {
        $option = [
          'number' => $this->debtors->number(),
          'gender' => $this->debtors->gender(),
          'home_status' => $this->debtors->home_status(),
          'works' => $this->debtors->works(),
          'incomes' => $this->debtors->incomes()
        ];
        $this->load->view('header', ['title' => $this->title]);
        $this->load->view('debtor/create', $option);
        $this->load->view('footer');
    }

    public function insert()
    {
        if ($this->form_validation->run()) {
            $this->debtors->insert($this->input->post());
            redirect('debtor');
        } else {
            return $this->create();
        }
    }

    public function edit($id = null)
    {
        $debtor = $this->debtors->get($id);
        $option = [
          'home_status' => $this->debtors->home_status(),
          'work' => $this->debtors->works(),
          'income' => $this->debtors->incomes()
        ];
        $this->load->view('header', ['title' => $this->title]);
        $this->load->view('debtor/edit', $option);
        $this->load->view('footer');
    }

    public function update($id = null)
    {
        $debtor = $this->debtors->get($id);
        if (!empty($debtor) && $this->form_validation->run()) {
            $this->debtors->update($debtor->id, $this->input->post());
            redirect('debtor');
        } else {
            return $this->edit($debtor->id);
        }
    }

    public function delete($id = null)
    {
        $debtor = $this->debtors->get($id);
        if (!empty($debtor)) {
            return $this->debtors->delete($debtor->id);
        }

        return false;
    }
}
