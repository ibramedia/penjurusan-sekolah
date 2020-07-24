<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_siswa extends CI_Model
{
    private $_table = "siswa";

    public $id_siswa;
    public $no_peserta;
    // public $kelas;
    public $nama_siswa;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $agama;
    public $alamat;
    public $no_hp;
    public $asal_sekolah;
    public $status_sekolah_asal;
    public $bulan_tahun_masuk_smp;
    public $bulan_tahun_lulus_smp;
    public $password;

    public function rules()
    {
        return [
            
            ['field' => 'no_peserta',
            'rules' => 'required'],

            // ['field' => 'kelas',
            // 'rules' => 'required'],

            ['field' => 'nama_siswa',
            'rules' => 'required'],

            ['field' => 'tempat_lahir',
            'rules' => 'required'],

            ['field' => 'tanggal_lahir',
            'rules' => 'required'],

            ['field' => 'agama',
            'rules' => 'required'],

            ['field' => 'alamat',
            'rules' => 'required'],

            ['field' => 'no_hp',
            'rules' => 'required'],

            ['field' => 'asal_sekolah',
            'rules' => 'required'],

            ['field' => 'status_sekolah_asal',
            'rules' => 'required'],

            ['field' => 'bulan_tahun_masuk_smp',
            'rules' => 'required'],

            ['field' => 'bulan_tahun_lulus_smp',
            'rules' => 'required'],

            ['field' => 'password',
            'rules' => 'required']
        ];
    }

    // public function getFull()
    // {
    //     $this->db->order_by('nama_siswa', 'ASC');
    //     return $this->db->get($this->_table)->result();
    // }
    
    // public function getAll($kelas)
    // {
    //     $this->db->order_by('id_siswa', 'DESC');
    //     $this->db->where('kelas', $kelas );
    //     return $this->db->get($this->_table)->result();
    // }

    public function getAll()
    {
        $this->db->order_by('id_siswa', 'DESC');
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_siswa" => $id])->row();
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_siswa = $post["id_siswa"];
        $this->no_peserta = $post["no_peserta"];
        // $this->kelas = $post["kelas"];
        $this->nama_siswa = $post["nama_siswa"];
        $this->tempat_lahir = $post["tempat_lahir"];
        $this->tanggal_lahir = $post["tanggal_lahir"];
        $this->agama = $post["agama"];
        $this->alamat = $post["alamat"];
        $this->no_hp = $post["no_hp"];
        $this->asal_sekolah = $post["asal_sekolah"];
        $this->status_sekolah_asal = $post["status_sekolah_asal"];
        $this->bulan_tahun_masuk_smp = $post["bulan_tahun_masuk_smp"];
        $this->bulan_tahun_lulus_smp = $post["bulan_tahun_lulus_smp"];
        $this->password = $post["password"];
        return $this->db->update($this->_table, $this, array('id_siswa' => $post['id_siswa']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_siswa" => $id));
    }
}