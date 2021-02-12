<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_M');
        $this->load->model('Level_M');
        $this->load->model('Petugas_M');
        $this->load->model('Masyarakat_M');
        $this->load->library('form_validation');

        auth();
    }
    public function index()
    {
        guard([1]);

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
        guard([1]);

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
        guard([1]);

        // Buat variable untuk menampung inputan
        $data = [
            'username' => $this->input->post('username', true),
            'email' => $this->input->post('email', true),
            'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
            'level_id' => $this->input->post('level_id', true)
        ];

        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]', [
            'required' => 'Username tidak boleh kosong',
            'unique' => 'Username tidak tersedia'
        ]);

        $this->form_validation->set_rules('email', 'email', 'valid_email|required|is_unique[users.email]', [
            'required' => 'Email tidak boleh kosong',
            'unique' => 'Email tidak tersedia',
            'valid_email' => 'Gunakan email yang valid'
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Password tidak boleh kosong',
        ]);

        $this->form_validation->set_rules('level_id', 'Level', 'required', [
            'required' => 'Silahkan pilih level',
        ]);

        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'nama tidak boleh kosong',
        ]);


        if ($this->form_validation->run() == false) {
            $this->create();
        } else {

            if ($this->input->post('level_id') == 1 || $this->input->post('level_id') == 2) {
                // Panggil Model User untuk memasukan data ke dalam table
                $user = $this->User_M->insert($data);

                $petugas = [
                    'nama' => $this->input->post('nama', true),
                    'user_id' => $user
                ];

                $this->Petugas_M->insert($petugas);
            } else {
                // Panggil Model User untuk memasukan data ke dalam table
                $user = $this->User_M->insert($data);

                $masyarakat = [
                    'nama' => $this->input->post('nama', true),
                    'user_id' => $user
                ];

                $this->Masyarakat_M->insert($masyarakat);
            }

            // Buat pesan 
            $this->session->set_flashdata('success', 'User berhasil ditambahkan');
            // pindahkan ke halaman
            redirect(base_url('user'));
        }
    }

    public function edit($id)
    {
        guard([1]);

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
        guard([1]);

        // Buat kondisi apakah password diganti atau tidak
        if ($this->input->post('password', true) != null) {
            // Buat variable untuk menampung inputan
            $data = [
                'username' => $this->input->post('username', true),
                'email' => $this->input->post('email', true),
                'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
                'level_id' => $this->input->post('level_id', true)
            ];
        } else {
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
        guard([1]);
        
        $this->User_M->delete($id);

        // Buat pesan 
        $this->session->set_flashdata('success', 'User berhasil dihapus');
        // pindahkan ke halaman
        redirect(base_url('user'));
    }
}
