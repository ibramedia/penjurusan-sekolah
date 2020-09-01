<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_nilai extends CI_Model
{
    private $_table = "nilai";

    public $id_nilai;
    public $id_siswa;
    public $mtk;
    public $ipa;

    public function rules()
    {
        return [
            
            ['field' => 'mtk',
            'rules' => 'required'],

            ['field' => 'ipa',
            'rules' => 'required']

        ];
    }

    // public function getFull()
    // {
    //     $this->db->order_by('mtk', 'ASC');
    //     return $this->db->get($this->_table)->result();
    // }
    
    // public function getAll($kelas)
    // {
    //     $this->db->order_by('id_nilai', 'DESC');
    //     $this->db->where('kelas', $kelas );
    //     return $this->db->get($this->_table)->result();
    // }

    public function getSiswa($id_siswa)
    {
        $this->db->order_by('nama_siswa', 'ASC');
        $this->db->join('siswa', 'siswa.id_siswa = nilai.id_siswa');
        $this->db->where('siswa.id_siswa', $id_siswa);
        return $this->db->get($this->_table)->result();
    }

    public function getAll()
    {
        $this->db->order_by('nama_siswa', 'ASC');
        $this->db->join('siswa', 'siswa.id_siswa = nilai.id_siswa');
        return $this->db->get($this->_table)->result();
    }

    public function proses()
    {
        $post = $this->input->post();
        if(empty($post["id_nilai"])){
            $this->save();
        }
        else{
            $this->update();
        }
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_nilai = NULL;//uniqid();
        $this->id_siswa = $post["id_siswa"];
        $this->mtk = $post["mtk"];
        $this->ipa = $post["ipa"];
        $this->psikotes = $post["psikotes"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_nilai = $post["id_nilai"];
        $this->id_siswa = $post["id_siswa"];
        $this->mtk = $post["mtk"];
        $this->ipa = $post["ipa"];
        $this->psikotes = $post["psikotes"];
        return $this->db->update($this->_table, $this, array('id_siswa' => $post['id_siswa']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_siswa" => $id));
    }
}