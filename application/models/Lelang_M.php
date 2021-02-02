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

    public function barang($id)
    {
        $this->db->select('lelangs.*, barangs.*');
        $this->db->from('lelangs');
        $this->db->join('barangs', 'lelangs.barang_id=barangs.id_barang');
        $this->db->where('id_lelang', $id);
        return $this->db->get()->row_array();
    }

    public function barangLelang()
    {
        $this->db->select('lelangs.*, barangs.*');
        $this->db->from('lelangs');
        $this->db->join('barangs', 'lelangs.barang_id=barangs.id_barang');
        $this->db->where('status', 'dibuka');
        return $this->db->get()->result_array();
    }

    public function getBarang($id)
    {
        $this->db->select('lelangs.*, barangs.*');
        $this->db->from('lelangs');
        $this->db->join('barangs', 'lelangs.barang_id=barangs.id_barang');
        $this->db->where('barang.id_barang', $id);
        return $this->db->get()->row_array();
    }

    public function getHistory($id)
    {
        $this->db->select('lelangs.*, history_lelang.*, masyarakats.*, users.*');
        $this->db->from('lelangs');
        $this->db->join('history_lelang', 'lelangs.id_lelang=history_lelang.lelang_id');
        $this->db->join('users', 'history_lelang.user_id=users.id_user');
        $this->db->join('masyarakats', 'users.id_user=masyarakats.user_id');
        $this->db->where('lelang_id', $id);
        $this->db->order_by('penawaran_harga', 'DESC');
        $this->db->limit(15);
        return $this->db->get()->result_array();
    }

    public function insert($data)
    {
        $this->db->insert('lelangs', $data);
    }
}
