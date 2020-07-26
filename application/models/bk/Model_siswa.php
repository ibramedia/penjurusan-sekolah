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

            ['field' => 'nama_siswa',
            'rules' => 'required']
        ];
    }

    public function getCount($kelas)
    {
        return $this->db->get($this->_table)->num_rows();
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
        $this->db->order_by('nama_siswa', 'ASC');
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_siswa" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_siswa = NULL;//uniqid();
        $this->no_peserta = $post["no_peserta"];
        // $this->kelas = $post["kelas"];
        $this->nama_siswa = $post["nama_siswa"];
        $this->tempat_lahir = '';
        $this->tanggal_lahir = '';
        $this->agama = '';
        $this->alamat = '';
        $this->no_hp = '';
        $this->asal_sekolah = '';
        $this->status_sekolah_asal = '';
        $this->bulan_tahun_masuk_smp = '';
        $this->bulan_tahun_lulus_smp = '';
        $this->password = $post["no_peserta"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_siswa = $post["id_siswa"];
        $this->no_peserta = $post["no_peserta"];
        // $this->kelas = $post["kelas"];
        $this->nama_siswa = $post["nama_siswa"];
        if(!empty($post["password_baru"])){
            $this->password = $post["password_baru"];
        }
        else{
            $this->password = $post["password"];
        }
        $this->db->set('no_peserta', $this->no_peserta);
        $this->db->set('nama_siswa', $this->nama_siswa);
        $this->db->set('password', $this->password);
        $this->db->where('id_siswa', $this->id_siswa);
        return $this->db->update($this->_table);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_siswa" => $id));
    }
}