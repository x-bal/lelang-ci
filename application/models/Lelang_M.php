<?php

class Lelang_M extends CI_Model
{
    public function barangs()
    {
        $this->db->select('lelangs.*, barangs.*');
        $this->db->from('lelangs');
        $this->db->join('barangs', 'lelangs.barang_id=barangs.id_barang');
        return $this->db->get()->result_array();
    }

    public function insert($data)
    {
        $this->db->insert('lelangs', $data);
    }
}
