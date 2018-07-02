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
    protected $scripts = [
      'assets/js/jquery.dataTables.js',
      'assets/js/dataTables.bootstrap4.js',
      'assets/js/jquery.mask.min.js'
    ];
    protected $styles = ['assets/css/dataTables.bootstrap4.css'];

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Debtor_model', 'debtors');

        $this->form_validation->set_rules('number', 'Nomer Urut', 'required');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('fullname', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('address', 'Alamat', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('phone', 'Telepon', 'required');
        $this->form_validation->set_rules('domicile', 'Domisili', 'required');
        $this->form_validation->set_rules('work', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('work_experience', 'Lama Bekerja', 'required');
        $this->form_validation->set_rules('income', 'Penghasilan', 'required');
    }

    public function index()
    {
        $debtors = $this->debtors->get_all();
        $header = ['title' => $this->title, 'styles' => $this->styles];
        $this->load->view('backend/header', $header);
        $this->load->view('backend/debtor/index', compact('debtors'));
        $this->load->view('backend/footer', ['scripts' => $this->scripts]);
    }

    public function create()
    {
        $header = ['title' => $this->title, 'styles' => $this->styles];
        $option = [
          'gender' => $this->debtors->gender(),
          'home_status' => $this->debtors->home_status(),
          'works' => $this->debtors->works(),
          'incomes' => $this->debtors->incomes()
        ];
        $this->load->view('backend/header', $header);
        $this->load->view('backend/debtor/create', $option);
        $this->load->view('backend/footer', ['scripts' => $this->scripts]);
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
        $header = ['title' => $this->title, 'styles' => $this->styles];
        $option = [
          'home_status' => $this->debtors->home_status(),
          'work' => $this->debtors->works(),
          'income' => $this->debtors->incomes()
        ];
        $this->load->view('backend/header', $header);
        $this->load->view('backend/debtor/edit', $option);
        $this->load->view('backend/footer', ['scripts' => $this->scripts]);
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
