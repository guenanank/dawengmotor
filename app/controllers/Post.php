<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Description of Backend
 *
 * @author nanank
 */
class Post extends CI_Controller
{
    protected $title = 'Artikel Berita';
    protected $scripts = ['summernote-bs4.min', 'tagsinput'];
    protected $styles = ['summernote-bs4', 'tagsinput'];

    public function __construct()
    {
        parent::__construct();
        if($this->session->has_userdata('logged_in') == false) {
            redirect('/login');
        }
        $this->load->model('Post_model', 'posts');

        $this->form_validation->set_rules('title', 'Judul', 'trim|required|max_length[127]');
        $this->form_validation->set_rules('category', 'Kategori', 'required');
    }

    public function index()
    {
        $posts = $this->posts->get_all();
        $this->load->view('header', ['title' => $this->title]);
        $this->load->view('post/index', compact('posts'));
        $this->load->view('footer');
    }

    public function create()
    {
        $categories = $this->posts->category();
        $this->load->view('header', ['title' => $this->title, 'styles' => $this->styles]);
        $this->load->view('post/create', compact('categories'));
        $this->load->view('footer', ['scripts' => $this->scripts]);
    }

    public function insert()
    {
        if ($this->input->is_ajax_request() == false) {
            show_404();
        }

        if ($this->form_validation->run()) {
            $status = 200;
            $messege = ['create' => $this->posts->insert($this->input->post())];
        } else {
            $status = 422;
            $messege = $this->form_validation->error_array();
        }

        return $this->output->set_content_type('application/json')
          ->set_status_header($status)
          ->set_output(json_encode($messege));
        exit;
    }

    public function edit($id)
    {
        $post = $this->posts->get($id);
        $categories = $this->posts->category();
        $this->load->view('header', ['title' => $this->title, 'styles' => $this->styles]);
        $this->load->view('post/edit', compact('post', 'categories'));
        $this->load->view('footer', ['scripts' => $this->scripts]);
    }

    public function update($id)
    {
        if ($this->input->is_ajax_request() == false) {
            show_404();
        }

        $post = $this->posts->get($id);
        if ($this->form_validation->run()) {
            $status = 200;
            $messege = ['update' => $this->posts->update($post->id, $this->input->post())];
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

        $post = $this->posts->get($id);
        $return = false;
        if (!empty($post)) {
            $return = $this->posts->delete($post->id);
        }

        return $this->output->set_content_type('application/json')
          ->set_status_header(200)
          ->set_output(json_encode([$return]));
        exit;
    }

}
