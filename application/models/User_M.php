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
        return $this->db->insert_id();
    }

    public function first($id)
    {
        return $this->db->get_where('users', ['id_user' => $id])->row_array();
    }

    public function update($id, $data)
    {
        $this->db->where('id_user', $id);
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

    public function masyarakat($id)
    {
        $this->db->select('users.*, masyarakats.*');
        $this->db->from('users');
        $this->db->join('masyarakats', 'users.id_user=masyarakats.user_id');
        $this->db->where('id_user', $id);
        return $this->db->get()->row_array();
    }

    public function petugas($id)
    {
        $this->db->select('users.*, petugas.*');
        $this->db->from('users');
        $this->db->join('petugas', 'users.id_user=petugas.user_id');
        $this->db->where('id_user', $id);
        return $this->db->get()->row_array();
    }
}
