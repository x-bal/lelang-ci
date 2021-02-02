<?php

class History_M extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('history_lelang', $data);
    }
}
