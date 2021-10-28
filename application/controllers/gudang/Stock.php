<?php
defined('BASEPATH') or exit('No direct script access allowed');

class stock extends CI_Controller
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
        $data['DaftarBagian'] = $this->templates->view('bagian')->result_array();
        $this->load->view('user/template/header', $data);
        $this->load->view('user/gudang/stock/index', $data);
        $this->load->view('user/template/footer', $data);
    }
    // public function add()
    // {
    //     if ($this->input->post()) {
    //         $this->templates->insert('bagian', $this->input->post());
    //         redirect('admin/bagian');
    //     } else {
    //         // $data['DaftarBagian'] = $this->templates->view('bagian')->result_array();
    //         $this->load->view('admin/template/header');
    //         $this->load->view('admin/bagian/add');
    //         $this->load->view('admin/template/footer');
    //     }
    // }
    // public function edit()
    // {
    //     if (isset($_GET['id'])) {

    //         if ($this->input->post()) {
    //             $this->templates->update('bagian', ['id_bagian' => $this->input->get('id')], $this->input->post());
    //             redirect('admin/bagian');
    //         } else {
    //             $data['Bagian'] = $this->templates->view_where('bagian', ['id_bagian' => $this->input->get('id')])->result_array();
    //             $this->load->view('admin/template/header');
    //             $this->load->view('admin/bagian/edit', $data);
    //             $this->load->view('admin/template/footer');
    //         }
    //     } else {
    //         redirect('admin/bagian');
    //     }
    // }
    // public function delete()
    // {
    //     echo $this->input->get('id');
    //     if (isset($_GET['id'])) {
    //         $query = $this->templates->delete('bagian', ['id_bagian' => $this->input->get('id')]);
    //     }
    //     redirect('admin/bagian');
    // }
}
