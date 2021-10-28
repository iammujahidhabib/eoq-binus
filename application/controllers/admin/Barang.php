<?php
defined('BASEPATH') or exit('No direct script access allowed');

class barang extends CI_Controller
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
        $data['DaftarBarang'] = $this->templates->view('barang')->result_array();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/barang/index', $data);
        $this->load->view('admin/template/footer', $data);
    }
    public function add()
    {
        if ($this->input->post()) {
            $this->templates->insert('barang', $this->input->post());
            redirect('admin/barang');
        } else {
            $this->load->view('admin/template/header');
            $this->load->view('admin/barang/add');
            $this->load->view('admin/template/footer');
        }
    }
    public function edit()
    {
        if (isset($_GET['id'])) {

            if ($this->input->post()) {
                $this->templates->update('barang', ['id_barang' => $this->input->get('id')], $this->input->post());
                redirect('admin/barang');
            } else {
                $data['Barang'] = $this->templates->view_where('barang', ['id_barang' => $this->input->get('id')])->result_array();
                $this->load->view('admin/template/header');
                $this->load->view('admin/barang/edit', $data);
                $this->load->view('admin/template/footer');
            }
        } else {
            redirect('admin/barang');
        }
    }
    public function delete()
    {
        if (isset($_GET['id'])) {
            $query = $this->templates->delete('barang', ['id_barang' => $this->input->get('id')]);
        }
        redirect('admin/barang');
    }
}
