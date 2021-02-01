<?php

class Barang_M extends CI_Model
{
    public function get()
    {
        return $this->db->get('barangs')->result_array();
    }

    public function insert($data)
    {
        $this->db->insert('barangs', $data);
    }

    public function first($id)
    {
        return $this->db->get_where('barangs', ['id_barang' => $id])->row_array();
    }

    public function update($id, $data)
    {
        $this->db->where('id_barang', $id);
        $this->db->update('barangs', $data);
    }

    public function delete($id)
    {
        $this->db->delete('barangs', ['id_barang' => $id]);
    }
}
