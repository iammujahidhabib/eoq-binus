<?php
defined('BASEPATH') or exit('No direct script access allowed');

class manager extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // $this->load->model('users');
        $this->load->model('templates');
        // $this->load->helper('date');
        // if ($this->session->userdata('role') == 1) {
        //     redirect('profile');
        // } elseif ($this->session->userdata('role') == 0) {
        //     redirect('home', 'refresh');
        // }

        // $this->load->library('form_validation');

        // // $config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-@\=';

    }
    public function eoq()
    {
        $this->load->view('user/template/header');
        $this->load->view('user/manager/eoq');
        $this->load->view('user/template/footer');
    }
    public function rop()
    {
        $this->load->view('user/template/header');
        $this->load->view('user/manager/rop');
        $this->load->view('user/template/footer');
    }
}