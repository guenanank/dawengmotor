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

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Lease_model', 'leases');
        $this->load->model('Credit_model', 'credits');

        $this->form_validation->set_rules('lease_id', 'Nama Leasing', 'trim|required');
        $this->form_validation->set_rules('tenor', 'Tenor', 'trim|required|numeric|max_length[100]');
        $this->form_validation->set_rules('administration', 'Administrasi', 'trim|required|decimal');
        $this->form_validation->set_rules('insurance', 'Asuransi', 'trim|required|decimal');
        $this->form_validation->set_rules('effective_rate', 'Rata-rata Efektif', 'trim|required|decimal');
    }

    public function index()
    {
        $credits = $this->credits->with('lease')->get_all();
        $this->load->view('backend/header', ['title' => $this->title]);
        $this->load->view('backend/credit/index', compact('credits'));
        $this->load->view('backend/footer');
    }

    public function create()
    {
        $leases = $this->leases->dropdown('id', 'name');
        $this->load->view('backend/header', ['title' => $this->title]);
        $this->load->view('backend/credit/create', compact('leases'));
        $this->load->view('backend/footer');
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
        $leases = $this->leases->dropdown('id', 'name');
        $this->load->view('backend/header', ['title' => $this->title]);
        $this->load->view('backend/credit/edit', compact('credit', 'leases'));
        $this->load->view('backend/footer');
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

    public function calculate()
    {
        $down_payment = $this->input->post('downPayment');
        $price = $this->input->post('price');
        $response = [];
        $this->credits->after_get = ['set_money'];
        $credits = $this->credits->get_many_by('lease_id', $this->input->post('lease_id'));
        foreach($credits as $credit) {
          $pure_dp = ($down_payment - $credit->administration) - substr(($credit->insurance * $price), 0, -2);
          $percent = round((float) ($pure_dp / $price) * 100, 2);
          $net_finance = $price + (substr(($credit->insurance * $price), 0, -2)) + $credit->administration - $down_payment;
          $formula1 = round(($credit->effective_rate / 12) / 100, 2);
          $formula2 = pow((1 + $formula1), ($credit->tenor * -1));
          $installment = (floor($net_finance - $credit->effective_rate) * $formula1) / (1 - $formula2);
          $flat = ((float)(($installment * $credit->tenor) - $net_finance) / $net_finance) * 100;
          $response[] = [
            'credit_id' => $credit->id,
            'tenor' => $credit->tenor,
            'installment' => round($installment),
            'flat' => round($flat, 2)
          ];
        }

        $this->output
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response))
            ->_display();

        exit;
    }
}
