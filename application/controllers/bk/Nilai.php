<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('bk/model_siswa');
        $this->load->model('bk/model_nilai');
        $this->load->library('form_validation');
        $this->load->model('model_login');
        if($this->model_login->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {
        $data["siswas"] = $this->model_siswa->getAll();
        $data["nilais"] = $this->model_nilai->getAll();
        $this->template->load('bk/base', 'bk/nilai/data', $data);
    }

    public function olah()
    {
        $nilai = $this->model_nilai;
        $validation = $this->form_validation;
        $validation->set_rules($nilai->rules());

        if ($validation->run()) {
            $nilai->proses();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal disimpan');
        }

        redirect(site_url('bk/nilai'));
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->model_nilai->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
        }
        else{
            $this->session->set_flashdata('failed', 'Gagal dihapus');
        }
        redirect(site_url('bk/nilai'));
    }
}