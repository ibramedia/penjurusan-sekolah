<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_profile extends CI_Model
{
    private $_table = "bk";

    public $id_bk;
    public $username;
    public $password;
    public $nama_bk;

    public function rules()
    {
        return [
            ['field' => 'username',
            'rules' => 'required'],
            
            ['field' => 'nama_bk',
            'rules' => 'required']
        ];
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_bk" => $id])->row();
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_bk = $post["id_bk"];
        $this->username = $post["username"];
        $this->nama_bk = $post["nama_bk"];
        if(!empty($post["password_baru"])){
            $this->password = $post["password_baru"];
        }
        else{
            $this->password = $post["password"];
        }
        return $this->db->update($this->_table, $this, array('id_bk' => $post['id_bk']));
    }
}