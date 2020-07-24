<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_profile extends CI_Model
{
    private $_table = "tu";

    public $id_tu;
    public $username;
    public $password;
    public $nama_tu;

    public function rules()
    {
        return [
            ['field' => 'username',
            'rules' => 'required'],
            
            ['field' => 'nama_tu',
            'rules' => 'required']
        ];
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_tu" => $id])->row();
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_tu = $post["id_tu"];
        $this->username = $post["username"];
        $this->nama_tu = $post["nama_tu"];
        if(!empty($post["password_baru"])){
            $this->password = $post["password_baru"];
        }
        else{
            $this->password = $post["password"];
        }
        return $this->db->update($this->_table, $this, array('id_tu' => $post['id_tu']));
    }
}