<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pegawai extends CI_Controller
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
        $data['DaftarPegawai'] = $this->templates->join('pegawai', 'id_bagian', 'bagian', 'left')->result_array();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/pegawai/index', $data);
        $this->load->view('admin/template/footer', $data);
    }
    public function add()
    {
        if ($this->input->post()) {
            $this->templates->insert('pegawai', $this->input->post());
            redirect('admin/pegawai');
        } else {
            $data['DaftarBagian'] = $this->templates->view('bagian')->result_array();
            $this->load->view('admin/template/header');
            $this->load->view('admin/pegawai/add', $data);
            $this->load->view('admin/template/footer');
        }
    }
    public function edit()
    {
        if (isset($_GET['id'])) {

            if ($this->input->post()) {
                $this->templates->update('pegawai', ['id_pegawai' => $this->input->get('id')], $this->input->post());
                redirect('admin/pegawai');
            } else {
                $data['DaftarBagian'] = $this->templates->view('bagian')->result_array();
                $data['Pegawai'] = $this->templates->view_where('pegawai', ['id_pegawai' => $this->input->get('id')])->result_array();
                $this->load->view('admin/template/header');
                $this->load->view('admin/pegawai/edit', $data);
                $this->load->view('admin/template/footer');
            }
        } else {
            redirect('admin/pegawai');
        }
    }
    public function delete()
    {
        if (isset($_GET['id'])) {
            $query = $this->templates->delete('pegawai', ['id_pegawai' => $this->input->get('id')]);
        }
        redirect('admin/pegawai');
    }
}
