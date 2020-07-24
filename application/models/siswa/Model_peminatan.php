<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_peminatan extends CI_Model
{
    private $_table = "peminatan";

    public $id_peminatan;
    public $id_siswa;
    public $pilihan;
    public $alasan;

    public function rules()
    {
        return [
            
            ['field' => 'id_siswa',
            'rules' => 'required'],

            ['field' => 'pilihan',
            'rules' => 'required'],

            ['field' => 'alasan',
            'rules' => 'required']
        ];
    }

    public function getCount($id_siswa)
    {
        $this->db->where('id_siswa', $id_siswa);
        return $this->db->get($this->_table)->num_rows();
    }

    public function getAll($id_siswa)
    {
        $jum = $this->getCount($id_siswa);
        if($jum==0)
            return $this;
        return $this->db->get_where($this->_table, ["id_siswa" => $id_siswa])->row();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_peminatan" => $id])->row();
    }

    public function proses()
    {
        $post = $this->input->post();
        if(empty($post["id_peminatan"])){
            $this->save();
        }
        else{
            $this->update();
        }
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_peminatan = NULL;//uniqid();
        $this->id_siswa = $post["id_siswa"];
        $this->pilihan = $post["pilihan"];
        $this->alasan = $post["alasan"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_peminatan = $post["id_peminatan"];
        $this->id_siswa = $post["id_siswa"];
        $this->pilihan = $post["pilihan"];
        $this->alasan = $post["alasan"];
        return $this->db->update($this->_table, $this, array('id_siswa' => $post['id_siswa']));
    }
}