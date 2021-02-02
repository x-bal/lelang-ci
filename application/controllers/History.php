<?php

class History extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Lelang_M');
        $this->load->library('form_validation');
    }

    public function store()
    {
    }
}
