<?php

class Level_M extends CI_Model
{
    public function get()
    {
        return $this->db->get('levels')->result_array();
    }

    public function insert($data)
    {
        $this->db->insert('levels', $data);
    }

    public function first($id)
    {
        return $this->db->get_where('levels', ['id_level' => $id])->row_array();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('levels', $data);
    }

    public function delete($id)
    {
        $this->db->delete('levels', ['id_level' => $id]);
    }
}
