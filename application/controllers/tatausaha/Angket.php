<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Angket extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_login');
        $this->load->model('tatausaha/model_siswa');
        $this->load->model('siswa/model_peminatan');
        $this->load->model('siswa/model_minat_mapel');
        $this->load->model('siswa/model_minat_kerja');
        $this->load->model('siswa/model_minat_pt');
        if($this->model_login->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {
        $data["siswas"] = $this->model_siswa->getAll();
        $this->template->load('tatausaha/base', 'tatausaha/angket/data', $data);
    }

    public function open($id_siswa)
    {
        $data["siswa"] = $this->model_siswa->getById($id_siswa);
        $data["peminatan"] = $this->model_peminatan->getAll($id_siswa);
        $data["frame"] = $this->model_minat_mapel->getFrame();
        $data["minat_mapel"] = $this->model_minat_mapel->getAll($id_siswa);
        $data["minat_kerja"] = $this->model_minat_kerja->getAll($id_siswa);
        $data["minat_pt"] = $this->model_minat_pt->getAll($id_siswa);
        $this->template->load('tatausaha/base', 'tatausaha/angket/open', $data);
    }
}
