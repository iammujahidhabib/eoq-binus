<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // $this->load->model('users');
        $this->load->model('templates');
    }
    public function index()
    {
        // $this->session->sess_destroy();
        if ($this->session->isLogin == true) {
            echo "zzz";
            echo $this->session->id_bagian;
            if ($this->session->id_bagian == 7) // SILAHKAN MENYESUAIKAN PAK
            {
                // redirect berdasarkan level user
                redirect("admin/admin");
            } elseif ($this->session->id_bagian == 8) {
                // redirect berdasarkan level user
                redirect("manager/manager/");
            } elseif ($this->session->id_bagian == 9) {
                //redirect berdasarkan level user
                redirect("gudang/gudang/");
            } elseif ($this->session->id_bagian == 11) {
                // redirect berdasarkan level user
                redirect("produksi/produksi/");
            } elseif ($this->session->id_bagian == 10) {
                // redirect berdasarkan level user
                redirect("tukang_pesan/tukang_pesan/");
            }
            /*	elseif($value['id_level'] == 6)
            {
            	// redirect berdasarkan level user
            	header ("location:kepalabagian/index.php");
            } */ else {
                $this->session->sess_destroy();
                redirect("auth");
                // unset($_SESSION["statuslogin"]);
                // $sError = "Invalid Username and/or Password";
                //header("Location: index.php?sError=".urlencode($sError));
            }
        } else {
            if ($this->input->post()) {
                echo "<pre>";
                // print_r($this->input->post());
                $user = $this->templates->view_where('pegawai', ['username' => $this->input->post('username'), 'password' => $this->input->post('password')])->row_array();
                if (count($user) > 0) {
                    print_r($user);
                    $user['isLogin'] = true;
                    $user['nama'] = $user['nama_pegawai'];
                    $this->session->set_userdata($user);
                    print_r($this->session->userdata());

                    redirect("auth");
                }
            } else {
                $this->load->view('auth/index');
            }
        }
        // $this->load->view('welcome_message');
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect("auth");
    }
}
