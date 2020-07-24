<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller
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
        $this->template->load('tatausaha/base', 'tatausaha/siswa/data', $data);
    }

    public function add()
    {
        $siswa = $this->model_siswa;
        $validation = $this->form_validation;
        $validation->set_rules($siswa->rules());

        if ($validation->run()) {
            $siswa->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal disimpan');
        }

        redirect(site_url('tatausaha/siswa'));
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('tatausaha/siswa');
       
        $siswa = $this->model_siswa;
        $validation = $this->form_validation;
        $validation->set_rules($siswa->rules());

        if ($validation->run()) {
            $siswa->update();
            $this->session->set_flashdata('success', 'Berhasil diperbaharui');
        }
        else {
            $this->session->set_flashdata('failed', 'Gagal diperbaharui');
        }

        $data["siswa"] = $siswa->getById($id);
        if (!$data["siswa"]) show_404();
        
        redirect(site_url('tatausaha/siswa'));
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->model_siswa->delete($id) && $this->model_nilai->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
        }
        else{
            $this->session->set_flashdata('failed', 'Gagal dihapus');
        }
        redirect(site_url('tatausaha/siswa'));
    }
}