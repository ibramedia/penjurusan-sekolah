<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_login');
        $this->load->model('siswa/model_peminatan');
        $this->load->model('siswa/model_minat_mapel');
        $this->load->model('siswa/model_minat_kerja');
        $this->load->model('siswa/model_minat_pt');
        $this->load->model('bk/model_nilai');
        if($this->model_login->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {
        $id = $this->session->userdata('id_siswa');
        $peminatan = $this->model_peminatan->getCount($id);
        $data["peminatan"] = $peminatan;
        $minat_mapel = $this->model_minat_mapel->getCount($id);
        $data["minat_mapel"] = $minat_mapel;
        $minat_kerja = $this->model_minat_kerja->getCount($id);
        $data["minat_kerja"] = $minat_kerja;
        $minat_pt = $this->model_minat_pt->getCount($id);
        $data["minat_pt"] = $minat_pt;
        $data["nilais"] = $this->model_nilai->getSiswa($id);
        $this->template->load('siswa/base', 'siswa/home', $data);
    }
}
