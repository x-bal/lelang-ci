<?php

class Dashboard_M extends CI_Model
{
    public function barang()
    {
        return $this->db->get('barangs')->num_rows();
    }

    public function user()
    {
        return $this->db->get('users')->num_rows();
    }

    public function petugas()
    {
        return $this->db->get('petugas')->num_rows();
    }

    public function masyarakat()
    {
        return $this->db->get('masyarakats')->num_rows();
    }

    public function lelang()
    {
        return $this->db->get('lelangs')->num_rows();
    }

    public function history()
    {
        return $this->db->get('history_lelang')->num_rows();
    }
}
