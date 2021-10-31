<?php
defined('BASEPATH') or exit('No direct script access allowed');

class manager extends CI_Controller
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
        redirect('manager/manager/eoq');
    }
    public function eoq()
    {
        $data['DaftarBE']=$this->barang->BE()->result_array();
        $data['TabelEOQ']=$this->barang->EOQ()->result_array();
        $this->load->view('user/template/header');
        $this->load->view('user/manager/eoq',$data);
        $this->load->view('user/template/footer');
    }
    public function rop()
    {
        $data['TabelROP']=$this->barang->ROP()->result_array();
        $this->load->view('user/template/header');
        $this->load->view('user/manager/rop',$data);
        $this->load->view('user/template/footer');
    }
}
