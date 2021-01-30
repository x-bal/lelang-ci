<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_M');
        $this->load->model('Level_M');
    }
    public function index()
    {
        $data = [
            'title' => 'Data User',
            'users' => $this->User_M->get()
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('users/index', $data);
        $this->load->view('layouts/footer');
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah User',
            'levels' => $this->Level_M->get()
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('users/create', $data);
        $this->load->view('layouts/footer');
    }

    public function store()
    {
        // Buat variable untuk menampung inputan
        $data = [
            'username' => $this->input->post('username', true),
            'email' => $this->input->post('email', true),
            'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
            'level_id' => $this->input->post('level_id', true)
        ];

        // Panggil Model User untuk memasukan data ke dalam table
        $insert = $this->User_M->insert($data);
        
        // Buat pesan 
        $this->session->set_flashdata('success', 'User berhasil ditambahkan');
        // pindahkan ke halaman
        redirect(base_url('user'));
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit User',
            'levels' => $this->Level_M->get(),
            'user' => $this->User_M->first($id) 
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('users/edit', $data);
        $this->load->view('layouts/footer');
    }

    public function update($id)
    {
        // Buat kondisi apakah password diganti atau tidak
        if($this->input->post('password', true) != null){
            // Buat variable untuk menampung inputan
            $data = [
                'username' => $this->input->post('username', true),
                'email' => $this->input->post('email', true),
                'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
                'level_id' => $this->input->post('level_id', true)
            ];
        }else {
            $data = [
                'username' => $this->input->post('username', true),
                'email' => $this->input->post('email', true),
                'level_id' => $this->input->post('level_id', true)
            ];
        }

        // Panggil model untuk update data
        $this->User_M->update($id, $data);

        // Buat pesan 
        $this->session->set_flashdata('success', 'User berhasil diupdate');
        // pindahkan ke halaman
        redirect(base_url('user'));
    }

    public function destroy($id)
    {
        $this->User_M->delete($id);

        // Buat pesan 
        $this->session->set_flashdata('success', 'User berhasil dihapus');
        // pindahkan ke halaman
        redirect(base_url('user'));
    }
}