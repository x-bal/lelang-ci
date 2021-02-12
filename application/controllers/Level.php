<?php

class Level extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Level_M');

        auth();
    }
    public function index()
    {
        guard([1]);
        $data = [
            'title' => 'Data Level',
            'levels' => $this->Level_M->get()
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('level/index', $data);
        $this->load->view('layouts/footer');
    }

    public function create()
    {
        guard([1]);
        $data = [
            'title' => 'Tambah Level',
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('level/create', $data);
        $this->load->view('layouts/footer');
    }

    public function store()
    {
        guard([1]);

        // Buat variable untuk menampung inputan
        $data = [
            'level' => $this->input->post('level', true),
           
        ];

        // Panggil Model User untuk memasukan data ke dalam table
        $insert = $this->Level_M->insert($data);
        
        // Buat pesan 
        $this->session->set_flashdata('success', 'Level berhasil ditambahkan');
        // pindahkan ke halaman
        redirect(base_url('level'));
    }

    public function edit($id)
    {
        guard([1]);

        $data = [
            'title' => 'Edit Level',
            'levels' => $this->Level_M->get(),
            'level' => $this->Level_M->first($id) 
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('level/edit', $data);
        $this->load->view('layouts/footer');
    }

    public function update($id)
    {
        guard([1]);

        // Buat kondisi apakah password diganti atau tidak
       
            $data = [
                'level' => $this->input->post('level', true),
               
            ];
        

        // Panggil model untuk update data
        $this->Level_M->update($id, $data);

        // Buat pesan 
        $this->session->set_flashdata('success', 'Level berhasil diupdate');
        // pindahkan ke halaman
        redirect(base_url('level'));
    }

    public function destroy($id)
    {
        guard([1]);
        $this->Level_M->delete($id);

        // Buat pesan 
        $this->session->set_flashdata('success', 'Level berhasil dihapus');
        // pindahkan ke halaman
        redirect(base_url('level'));
    }
}