<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pengambilan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('templates');
    }
    public function index()
    {
        $data['DaftarPengambilan'] = $this->templates->view('pengambilan')->result_array();
        $this->load->view('user/template/header', $data);
        $this->load->view('user/tukang_pesan/pengambilan/index', $data);
        $this->load->view('user/template/footer', $data);
    }
    public function add()
    {
        if ($this->input->post()) {
            $this->templates->insert('pengambilan', $this->input->post());
            redirect('user/gudang/pengambilan');
        } else {
            // $data['Daftarpengambilan'] = $this->templates->view('pengambilan')->result_array();
            $data['DaftarBarang'] = $this->templates->view('barang')->result_array();
            $this->load->view('user/template/header');
            $this->load->view('user/tukang_pesan/pengambilan/add', $data);
            $this->load->view('user/template/footer');
        }
    }
    public function edit()
    {
        if (isset($_GET['id'])) {

            if ($this->input->post()) {
                $this->templates->update('pengambilan', ['id_pengambilan' => $this->input->get('id')], $this->input->post());
                redirect('user/gudang/pengambilan');
            } else {
                $data['Pengambilan'] = $this->templates->view_where('pengambilan', ['id_pengambilan' => $this->input->get('id')])->result_array();
                $this->load->view('user/template/header');
                $this->load->view('user/tukang_pesan/pengambilan/edit', $data);
                $this->load->view('user/template/footer');
            }
        } else {
            redirect('user/gudang/pengambilan');
        }
    }
    public function delete()
    {
        echo $this->input->get('id');
        if (isset($_GET['id'])) {
            $query = $this->templates->delete('pengambilan', ['id_pengambilan' => $this->input->get('id')]);
        }
        redirect('user/gudang/pengambilan');
    }
}
