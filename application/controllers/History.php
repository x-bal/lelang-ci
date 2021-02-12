<?php

class History extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Lelang_M');
        $this->load->model('History_M');
        $this->load->library('form_validation');
        $this->load->helper('rupiah_helper');

        auth();
    }

    public function index()
    {
        $data = [
            'title' => 'History Penawaran',
            'history' => $this->History_M->masyarakat($this->session->userdata('id_user'))
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('dashboard/history');
        $this->load->view('layouts/footer');
    }

    public function store()
    {
    }

    public function destroy($id)
    {
        $this->History_M->delete($id);

        $this->session->set_flashdata('success', 'History berhasil dihapus');
        redirect(base_url('history'));
    }

    public function destroyAll($idUser)
    {
        $this->History_M->deleteAll($idUser);

        $this->session->set_flashdata('success', 'Semua history berhasil dihapus');
        redirect(base_url('history'));
    }
}
