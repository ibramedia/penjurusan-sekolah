<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Angket extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_login');
        $this->load->model('siswa/model_siswa');
        $this->load->model('siswa/model_peminatan');
        $this->load->model('siswa/model_minat_mapel');
        $this->load->model('siswa/model_minat_kerja');
        $this->load->model('siswa/model_minat_pt');
        if($this->model_login->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {
        $id = $this->session->userdata('id_siswa');
        $data["siswa"] = $this->model_siswa->getById($id);
        $data["peminatan"] = $this->model_peminatan->getAll($id);
        $data["frame"] = $this->model_minat_mapel->getFrame();
        $data["minat_mapel"] = $this->model_minat_mapel->getAll($id);
        $data["minat_kerja"] = $this->model_minat_kerja->getAll($id);
        $data["minat_pt"] = $this->model_minat_pt->getAll($id);
        $this->template->load('siswa/base', 'siswa/angket/data', $data);
    }
    
    public function updatebiodata($id = null)
    {
        if (!isset($id)) redirect('siswa/angket');
       
        $siswa = $this->model_siswa;
        $validation = $this->form_validation;
        $validation->set_rules($siswa->rules());

        if ($validation->run()) {
            $siswa->update();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        }
        else {
            $this->session->set_flashdata('failed', 'Data Gagal Disimpan');
        }
        
        redirect(site_url('siswa/angket'));
    }

    public function updatepeminatan($id = null)
    {
        if (!isset($id)) redirect('siswa/angket');
       
        $peminatan = $this->model_peminatan;
        $validation = $this->form_validation;
        $validation->set_rules($peminatan->rules());

        if ($validation->run()) {
            $peminatan->proses();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        }
        else {
            $this->session->set_flashdata('failed', 'Data Gagal Disimpan');
        }
        
        redirect(site_url('siswa/angket'));
    }

    public function updateminatmapel($id = null)
    {
        if (!isset($id)) redirect('siswa/angket');
       
        $minat_mapel = $this->model_minat_mapel;
        $validation = $this->form_validation;
        $validation->set_rules($minat_mapel->rules());

        if ($validation->run()) {
            $minat_mapel->proses();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        }
        else {
            $this->session->set_flashdata('failed', 'Data Gagal Disimpan');
        }
        
        redirect(site_url('siswa/angket'));
    }

    public function hapusminatmapel($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->model_minat_mapel->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
        }
        else{
            $this->session->set_flashdata('failed', 'Gagal dihapus');
        }
        redirect(site_url('siswa/angket'));
    }

    public function updateminatkerja($id = null)
    {
        if (!isset($id)) redirect('siswa/angket');
       
        $minat_kerja = $this->model_minat_kerja;
        $validation = $this->form_validation;
        $validation->set_rules($minat_kerja->rules());

        if ($validation->run()) {
            $minat_kerja->proses();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        }
        else {
            $this->session->set_flashdata('failed', 'Data Gagal Disimpan');
        }
        
        redirect(site_url('siswa/angket'));
    }

    public function hapusminatkerja($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->model_minat_kerja->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
        }
        else{
            $this->session->set_flashdata('failed', 'Gagal dihapus');
        }
        redirect(site_url('siswa/angket'));
    }

    public function updateminatpt($id = null)
    {
        if (!isset($id)) redirect('siswa/angket');
       
        $minat_pt = $this->model_minat_pt;
        $validation = $this->form_validation;
        $validation->set_rules($minat_pt->rules());

        if ($validation->run()) {
            $minat_pt->proses();
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
        }
        else {
            $this->session->set_flashdata('failed', 'Data Gagal Disimpan');
        }
        
        redirect(site_url('siswa/angket'));
    }

    public function hapusminatpt($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->model_minat_pt->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
        }
        else{
            $this->session->set_flashdata('failed', 'Gagal dihapus');
        }
        redirect(site_url('siswa/angket'));
    }
}
