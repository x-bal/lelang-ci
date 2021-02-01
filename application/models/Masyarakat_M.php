<?php

class Masyarakat_M extends CI_Model 
{

    public function insert($data)
    {
        $this->db->insert('masyarakats', $data);
    }


    public function users()
    {
        $this->db->select('masyarakats.*, users.*');
        $this->db->from('masyarakats');
        $this->db->join('users', 'masyarakats.user_id=users.id_user');
        return $this->db->get()->result_array();
    }

    public function user($id)
    {
        $this->db->select('masyarakats.*, users.*');
        $this->db->from('masyarakats');
        $this->db->join('users', 'masyarakats.user_id=users.id_user');
        $this->db->where('id_masyarakat', $id);
        return $this->db->get()->row_array();
    }

    public function delete($id)
    {
        $this->db->delete('masyarakats', ['id_masyarakat' => $id]);
    }

}
