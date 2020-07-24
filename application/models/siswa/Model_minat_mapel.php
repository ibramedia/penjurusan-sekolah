<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_minat_mapel extends CI_Model
{
    private $_table = "minat_mapel";

    public $id_minat_mapel;
    public $id_siswa;
    public $mapel;
    public $alasan;

    public function rules()
    {
        return [
            
            ['field' => 'mapel',
            'rules' => 'required'],

            ['field' => 'alasan',
            'rules' => 'required']
        ];
    }

    public function getFrame()
    {
        return $this->db->query("SELECT 1 as 'no', '' as 'item', '' as 'alasan' UNION SELECT 2,'','' UNION SELECT 3,'',''")->result();
    }
    
    public function getAll($id_siswa)
    {
        $this->db->order_by('id_minat_mapel', 'ASC');
        $this->db->where('id_siswa', $id_siswa );
        return $this->db->get($this->_table)->result();
    }

    public function proses()
    {
        $post = $this->input->post();
        if(empty($post["id_minat_mapel"])){
            $this->save();
        }
        else{
            $this->update();
        }
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_minat_mapel = NULL;//uniqid();
        $this->id_siswa = $post["id_siswa"];
        $this->mapel = $post["mapel"];
        $this->alasan = $post["alasan"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_minat_mapel = $post["id_minat_mapel"];
        $this->id_siswa = $post["id_siswa"];
        $this->mapel = $post["mapel"];
        $this->alasan = $post["alasan"];
        return $this->db->update($this->_table, $this, array('id_minat_mapel' => $post['id_minat_mapel']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_minat_mapel" => $id));
    }
}