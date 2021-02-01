<?php

class Lelang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Lelang_M');
        $this->load->model('Barang_M');
        $this->load->helper('rupiah_helper');
    }

    public function index()
    {
        $data = [
            'title' => 'Data Lelang',
            'lelang' => $this->Lelang_M->barangs()
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('lelang/index');
        $this->load->view('layouts/footer');
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Lelang',
            'barang' => $this->Barang_M->get()
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('lelang/create');
        $this->load->view('layouts/footer');
    }

    public function store()
    {
        $data = [
            'barang_id' => $this->input->post('barang', true),
            'tanggal_lelang' => $this->input->post('tanggal', true),
            'status' => 'dibuka'
        ];

        $this->Lelang_M->insert($data);

        $this->session->set_flashdata('success', 'Lelang berhasil ditambahkan');
        redirect(base_url('lelang'));
    }
}
