<?php
defined('BASEPATH') or exit('No direct script access allowed');

class stock extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // $this->load->model('users');
        $this->load->model('templates');
        $this->load->model('barang');
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
        $data['DataStok'] = $this->barang->StokBarang()->result_array();
        $this->load->view('user/template/header', $data);
        $this->load->view('user/tukang_pesan/stock/index', $data);
        $this->load->view('user/template/footer', $data);
    }
}
