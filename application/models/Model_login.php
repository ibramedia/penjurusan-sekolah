<?php

class Model_login extends CI_Model
{

    public $jenis_login;
    public $username;
    public $password;

    public function cek(){
        $post = $this->input->post();
        $this->jenis_login = $post["jenis_login"];
        if($this->jenis_login=='sw'){
            $this->username = $post["username"];
            $this->password = $post["password"];
            $where = array(
                'no_peserta' => $this->username,
                'password' => $this->password
                );
            $data["login"] = $this->db->get_where("siswa", $where)->row();
            $data["jenis_login"] = $this->jenis_login;
            return $data;
        }
        elseif($this->jenis_login=='tu'){
            $this->username = $post["username"];
            $this->password = $post["password"];
            $where = array(
                'username' => $this->username,
                'password' => $this->password
                );
            $data["login"] = $this->db->get_where("tu", $where)->row();
            $data["jenis_login"] = $this->jenis_login;
            return $data;
        }
        elseif($this->jenis_login=='wk'){
            $this->username = $post["username"];
            $this->password = $post["password"];
            $where = array(
                'username' => $this->username,
                'password' => $this->password
                );
            $data["login"] = $this->db->get_where("wakasis", $where)->row();
            $data["jenis_login"] = $this->jenis_login;
            return $data;
        }
    }

    public function isNotLogin(){
        if($this->jenis_login=='sw'){
            return $this->session->userdata('id_siswa') === null;
        }
        elseif($this->jenis_login=='tu'){
            return $this->session->userdata('id_tu') === null;
        }
        elseif($this->jenis_login=='wk'){
            return $this->session->userdata('id_wakasis') === null;
        }
    }
}