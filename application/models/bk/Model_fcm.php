<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_fcm extends CI_Model
{
    private $_table = "temp_fcm";

    public function getById($id=1)
    {
        return $this->db->get_where($this->_table, ["id_temp_fcm" => $id])->row();
    }
}