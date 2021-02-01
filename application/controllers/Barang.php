<?php

class Barang extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_M');
    }

    public function index()
    {
        $data = [
            'title' => 'Data Barang',
            'barang' =>  $this->Barang_M->get()
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('barang/index');
        $this->load->view('layouts/footer');
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Barang',
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('barang/create');
        $this->load->view('layouts/footer');
    }
}
