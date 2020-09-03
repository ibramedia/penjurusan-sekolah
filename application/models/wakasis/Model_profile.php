<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_profile extends CI_Model
{
    private $_table = "wakasis";

    public $id_wakasis;
    public $username;
    public $password;
    public $nama_wakasis;

    public function rules()
    {
        return [
            ['field' => 'username',
            'rules' => 'required'],
            
            ['field' => 'nama_wakasis',
            'rules' => 'required']
        ];
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_wakasis" => $id])->row();
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_wakasis = $post["id_wakasis"];
        $this->username = $post["username"];
        $this->nama_wakasis = $post["nama_wakasis"];
        if(!empty($post["password_baru"])){
            $this->password = $post["password_baru"];
        }
        else{
            $this->password = $post["password"];
        }
        return $this->db->update($this->_table, $this, array('id_wakasis' => $post['id_wakasis']));
    }
}