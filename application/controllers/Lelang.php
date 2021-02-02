<?php

class Lelang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Lelang_M');
        $this->load->model('Barang_M');
        $this->load->model('History_M');
        $this->load->helper('rupiah_helper');
        $this->load->library('form_validation');
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
            'barang' => $this->Barang_M->get(),
            'lelang' => $this->Lelang_M->barangs()
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

    public function show($id)
    {
        $data = [
            'title' => 'Detail Barang',
            'lelang' => $this->Lelang_M->barang($id),
            'historyLelang' => $this->Lelang_M->getHistory($id)
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('lelang/show');
        $this->load->view('layouts/footer');
    }

    public function tawarkan()
    {
        $idBarang = $this->input->post('id_barang', true);
        $barang = $this->Lelang_M->barang($idBarang);

        $this->form_validation->set_rules('tawaran', 'Penawaran', 'required', [
            'required' => 'Tawaran harus diisi',
        ]);

        if ($this->input->post('tawaran', true) <= $barang['harga_awal']) {
            $this->session->set_flashdata('tawaran', 'Tawaran tidak boleh kurang dari harga awal');
            $this->show($barang['id_lelang']);
        }

        if ($this->form_validation->run() == false) {
        } else {
            $data = [
                'lelang_id' => $barang['id_lelang'],
                'user_id' => $this->session->userdata('id_user'),
                'penawaran_harga' => $this->input->post('tawaran', true)
            ];

            $this->History_M->insert($data);

            $this->session->set_flashdata('success', 'Tawaran berhasil di tawarkan');
            redirect(base_url('lelang/show/' . $barang['id_lelang']));
        }
    }
}
