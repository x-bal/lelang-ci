<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Buat kondisi jika user tidak melakukan login, maka akan di kembalikan ke halaman login
        if (!$this->session->userdata('login')) {
            redirect(base_url());
        }

        $this->load->model("Lelang_M");
        $this->load->helper('rupiah_helper');
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('dashboard/index');
        $this->load->view('layouts/footer');
    }

    public function lelang()
    {
        $data = [
            'title' => 'Lelang Barang',
            'lelang' => $this->Lelang_M->barangLelang()
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('dashboard/lelang');
        $this->load->view('layouts/footer');
    }
}
