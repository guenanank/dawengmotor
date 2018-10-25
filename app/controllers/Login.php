<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Login
 *
 * @author nanank
 */

class Login extends CI_Controller
{
    private $configuration = [];
    private $credential;

    public function __construct()
    {
        parent::__construct();
        foreach($this->configs->get_all() as $config) {
            $this->configuration[$config->key] = $config->value;
        }

        $this->credential = json_decode($this->configuration['CREDENTIAL']);
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function act()
    {
        if ($this->input->is_ajax_request() == false) {
            show_404();
        }

        if($this->input->post('username') == $this->credential->username) {
            $this->load->library('encryption');

            $decode = $this->encryption->decrypt($this->credential->password);
            if($this->input->post('password') == $decode) {
                $this->session->set_userdata([
                  'logged_in' => true,
                  'user' => $this->credential->name,
                  'sitename' => $this->configuration['SITE_NAME']
                ]);

                $status = 200;
                $messege = ['logged_in' => true, 'redirectUrl' => base_url()];
            } else {
                $status = 422;
                $messege = ['password' => 'Password Salah'];
            }
        } else {
            $status = 422;
            $messege = ['username' => 'Username Salah'];
        }

        return $this->output->set_content_type('application/json')
            ->set_status_header($status)
            ->set_output(json_encode($messege));
        exit;
    }
}
