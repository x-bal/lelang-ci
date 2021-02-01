<?php

class Barang_M extends CI_Model
{
    public function get()
    {
        return $this->db->get('barangs')->result_array();
    }
}
