<?php

class History_M extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('history_lelang', $data);
    }

    public function masyarakat($id)
    {
        $this->db->select('lelangs.*, history_lelang.*, barangs.*');
        $this->db->from('lelangs');
        $this->db->join('history_lelang', 'lelangs.id_lelang=history_lelang.lelang_id');
        $this->db->join('barangs', 'lelangs.barang_id=barangs.id_barang');
        $this->db->where('history_lelang.user_id', $id);
        return $this->db->get()->result_array();
    }

    public function delete($id)
    {
        $this->db->delete('history_lelang', ['id_history' => $id]);
    }

    public function deleteAll($idUser)
    {
        $this->db->delete('history_lelang', ['user_id' => $idUser]);
    }

    public function getMasyarakat($id)
    {
        return $this->db->get_where('history_lelang', ['user_id' => $id])->num_rows();
    }
}
