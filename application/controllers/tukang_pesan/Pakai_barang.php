<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pakai_barang extends CI_Controller
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
    // public function index()
    // {
    //     $data['DaftarPesanan'] = $this->templates->view('pesanan')->result_array();
    //     $this->load->view('user/template/header', $data);
    //     $this->load->view('user/tukang_pesan/pesanan/index', $data);
    //     $this->load->view('user/template/footer', $data);
    // }
    // public function add()
    // {
    //     if ($this->input->post()) {
    //         $this->templates->insert('pesanan', $this->input->post());
    //         redirect('user/gudang/pesanan');
    //     } else {
    //         // $data['Daftarpesanan'] = $this->templates->view('pesanan')->result_array();
    //         $data['DaftarBarang'] = $this->templates->view('barang')->result_array();
    //         $this->load->view('user/template/header');
    //         $this->load->view('user/tukang_pesan/pesanan/add', $data);
    //         $this->load->view('user/template/footer');
    //     }
    // }
    public function add()
    {
        if (isset($_GET['id'])) {

            if ($this->input->post()) {
                $this->templates->update('pemesanan', ['id_pesanan' => $this->input->get('id')], ['pakai'=>$this->input->post('pakai')]);
                redirect('tukang_pesan/pesanan');
            } else {
                $data['PakaiBarang'] = $this->templates->view_where('pemesanan', ['id_pesanan' => $this->input->get('id')])->result_array();//where join
                $this->load->view('user/template/header');
                $this->load->view('user/tukang_pesan/pakai_barang/add', $data);
                $this->load->view('user/template/footer');
            }
        } else {
            redirect('tukang_pesan/pesanan');
        }
    }
    // public function delete()
    // {
    //     echo $this->input->get('id');
    //     if (isset($_GET['id'])) {
    //         $query = $this->templates->delete('pesanan', ['id_pesanan' => $this->input->get('id')]);
    //     }
    //     redirect('user/gudang/pesanan');
    // }
}
