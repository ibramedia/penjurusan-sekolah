<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("model_login");
        $this->load->library('form_validation');
    }

    public function index()
    {
        if($this->session->userdata('jenis_login')=='sw'){
            redirect(site_url('siswa'));
        }
        elseif($this->session->userdata('jenis_login')=='bk'){
            redirect(site_url('bk'));
        }
        elseif($this->session->userdata('jenis_login')=='wk'){
            redirect(site_url('wakasis'));
        }
        else{
            $this->load->view("login");
        }
    }

    public function aksi_login(){
        $login = $this->model_login;
        $data = $login->cek();
        if($data["jenis_login"]=="sw"){
            if ($data["login"] != null) {
            
                $data_session = array(
                    'jenis_login' => $data["jenis_login"],
                    'id_siswa' => $data["login"]->id_siswa
                    );
     
                $this->session->set_userdata($data_session);
                redirect(site_url('siswa'));
            }
            else {
                $this->session->set_flashdata('failed', 'Username atau password salah');
                redirect(site_url('login'));
            }
        }
        elseif($data["jenis_login"]=="bk"){
            if ($data["login"] != null) {
            
                $data_session = array(
                    'jenis_login' => $data["jenis_login"],
                    'id_bk' => $data["login"]->id_bk
                    );
     
                $this->session->set_userdata($data_session);
                redirect(site_url('bk'));
            }
            else {
                $this->session->set_flashdata('failed', 'Username atau password salah');
                redirect(site_url('login'));
            }
        }
        elseif($data["jenis_login"]=="wk"){
            if ($data["login"] != null) {
            
                $data_session = array(
                    'jenis_login' => $data["jenis_login"],
                    'id_wakasis' => $data["login"]->id_wakasis
                    );
     
                $this->session->set_userdata($data_session);
                redirect(site_url('wakasis'));
            }
            else {
                $this->session->set_flashdata('failed', 'Username atau password salah');
                redirect(site_url('login'));
            }
        }
	}

    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }
}