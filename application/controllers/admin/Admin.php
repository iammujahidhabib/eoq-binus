<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
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
    public function index()
    {
        $data['user'] = $this->templates->view('pegawai')->result();
        $data['barang'] = $this->templates->view('barang')->result();
        $this->load->view('admin/template/header');
        $this->load->view('admin/index',$data);
        $this->load->view('admin/template/footer');
    }
}