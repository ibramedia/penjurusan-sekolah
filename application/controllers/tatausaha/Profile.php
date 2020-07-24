<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('tatausaha/model_profile');
        // $this->load->library('form_validation');
        $this->load->model('model_login');
        if($this->model_login->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {
        $user = $this->model_profile;
        $id = $this->session->userdata('id_tu');
        $data["user"] = $user->getById($id);
        if (!$data["user"]) redirect(site_url('login/logout'));
        
        $this->template->load('tatausaha/base', 'tatausaha/profile/data', $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect(site_url('login/logout'));
       
        $user = $this->model_profile;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());

        if ($validation->run()) {
            $user->update();
            $this->session->set_flashdata('success', 'Profile berhasil diperbaharui.<br>Jika anda merubah username atau password. Mohon login berikutnya menggunakan username atau password baru anda.');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal diperbaharui');
        }

        $data["user"] = $user->getById($id);
        if (!$data["user"]) show_404();
        
        redirect(site_url('tatausaha/profile'));
    }

}