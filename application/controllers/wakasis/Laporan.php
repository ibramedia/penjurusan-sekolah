<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('tatausaha/model_siswa');
        $this->load->model('tatausaha/model_nilai');
        $this->load->library('form_validation');
        $this->load->model('model_login');
        if($this->model_login->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {
        $data["siswas"] = $this->model_siswa->getAll();
        $data["nilais"] = $this->model_nilai->getAll();
        $this->template->load('wakasis/base', 'wakasis/laporan/data', $data);
    }
}