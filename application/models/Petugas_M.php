<?php

class Petugas_M extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('petugas', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id_petugas', $id);
        $this->db->update('petugas', $data);
    }

    public function delete($id)
    {
        $this->db->delete('petugas', ['id_petugas' => $id]);
    }

    public function users()
    {
        $this->db->select('petugas.*, users.*');
        $this->db->from('petugas');
        $this->db->join('users', 'petugas.user_id=users.id_user');
        return $this->db->get()->result_array();
    }

    public function user($id)
    {
        $this->db->select('petugas.*, users.*');
        $this->db->from('petugas');
        $this->db->join('users', 'petugas.user_id=users.id_user');
        $this->db->where('id_petugas', $id);
        return $this->db->get()->row_array();
    }
}
