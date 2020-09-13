<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_peminatan extends CI_Model
{
    private $_table = "peminatan";

    public $id_peminatan;
    public $id_siswa;
    
    // public function getFull()
    // {
    //     $this->db->order_by('mtk', 'ASC');
    //     return $this->db->get($this->_table)->result();
    // }
    
    // public function getAll($kelas)
    // {
    //     $this->db->order_by('id_peminatan', 'DESC');
    //     $this->db->where('kelas', $kelas );
    //     return $this->db->get($this->_table)->result();
    // }
    public function getPerOffset($offset){
        $this->db->order_by('nama_siswa', 'ASC');
        $this->db->join('siswa', 'siswa.id_siswa = peminatan.id_siswa');
        return $this->db->get($this->_table, 1, $offset)->result(); // limit 1 offset x
    }

    public function getSiswa($id_siswa)
    {
        $this->db->order_by('nama_siswa', 'ASC');
        $this->db->join('siswa', 'siswa.id_siswa = peminatan.id_siswa');
        $this->db->where('siswa.id_siswa', $id_siswa);
        return $this->db->get($this->_table)->result();
    }

    public function getAll()
    {
        $this->db->order_by('nama_siswa', 'ASC');
        $this->db->join('siswa', 'siswa.id_siswa = peminatan.id_siswa');
        return $this->db->get($this->_table)->result();
    }
}