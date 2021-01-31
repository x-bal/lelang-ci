<?php

class User_M extends CI_Model
{
    public function get()
    {
        return $this->db->get('users')->result_array();
    }

    public function insert($data)
    {
        $this->db->insert('users', $data);
    }

    public function first($id)
    {
        return $this->db->get_where('users', ['id_user' => $id])->row_array();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function delete($id)
    {
        $this->db->delete('users', ['id_user' => $id]);
    }

    public function getUserDesc()
    {
        $this->db->select('users.*');
        $this->db->from('users');
        $this->db->order_by('id_user', 'DESC');
        return $this->db->get()->row_array();
    }
}
