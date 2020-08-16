<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('bk/model_siswa');
        $this->load->model('bk/model_nilai');
        $this->load->model('bk/model_fcm');
        $this->load->library('form_validation');
        $this->load->model('model_login');
        if($this->model_login->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {
        $data["siswas"] = $this->model_siswa->getAll();
        $data["nilais"] = $this->model_nilai->getAll();
        $this->template->load('bk/base', 'bk/laporan/data', $data);
    }

    public function hitung()
    {
        $data["siswas"] = $this->model_siswa->getAll();
        $data["nilais"] = $this->model_nilai->getAll();
        $data["nilai_fcm"] = $this->model_fcm->getById();
        $this->template->load('bk/base', 'bk/laporan/hitung', $data);
    }
}