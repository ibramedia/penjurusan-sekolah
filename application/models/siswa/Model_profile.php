<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_profile extends CI_Model
{
    private $_table = "siswa";

    public $id_siswa;
    public $no_peserta;
    public $password;
    public $nama_siswa;

    public function rules()
    {
        return [
            ['field' => 'username',
            'rules' => 'required'],
            
            ['field' => 'nama_siswa',
            'rules' => 'required']
        ];
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_siswa" => $id])->row();
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_siswa = $post["id_siswa"];
        $this->no_peserta = $post["username"];
        $this->nama_siswa = $post["nama_siswa"];
        if(!empty($post["password_baru"])){
            $this->password = $post["password_baru"];
        }
        else{
            $this->password = $post["password"];
        }
        return $this->db->update($this->_table, $this, array('id_siswa' => $post['id_siswa']));
    }
}