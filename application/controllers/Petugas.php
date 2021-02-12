<?php

class Petugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        auth();
        $this->load->library('form_validation');
        $this->load->model('User_M');
        $this->load->model('Petugas_M');
    }

    public function index()
    {
        guard([1]);

        $data = [
            'title' => 'Data Petugas',
            'petugas' => $this->Petugas_M->users()
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('petugas/index');
        $this->load->view('layouts/footer');
    }

    public function create()
    {
        guard([1]);

        $data = [
            'title' => 'Tambah Petugas'
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('petugas/create');
        $this->load->view('layouts/footer');
    }

    public function store()
    {
        guard([1]);

        // Buat kondisi, jika validasinya gagal atau false maka kembalikan ke method create dan jika benar atau true maka ->
        if ($this->form_validation->run($this->validate()) == false) {
            $this->create();
        } else {
            // -> Membuat dulu variable untuk membuat user
            // Tampung data dari inputan ke variable 
            $dataUser = [
                'username' => $this->input->post('username', true),
                'email' => $this->input->post('email', true),
                'password' => password_hash('password', PASSWORD_DEFAULT),
                'level_id' => 2
            ];

            // Masukkan data untuk user dengan memanggil model user dan methodnya
            // Setelah user berhasil dimasukan kita ambil data terbaru dari table user yaitu yang baru saja kita masukan
            $user = $this->User_M->insert($dataUser);

            // Buat variable untuk menampung data ke table petugas
            $dataPetugas = [
                'nama' => $this->input->post('nama', true),
                'telp' => $this->input->post('telp', true),
                'user_id' => $user
            ];

            // Masukkan data petugas dengan memanggil model petugas dan methodnya
            $this->Petugas_M->insert($dataPetugas);

            // Buat pesan dan kembalikan ke halaman index petugas
            $this->session->set_flashdata('success', 'Petugas berhasil ditambahkan');
            redirect(base_url('petugas'));
        }
    }

    public function edit($id)
    {
        guard([1]);

        $data = [
            'title' => 'Edit Petugas',
            'petugas' => $this->Petugas_M->user($id),
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('petugas/edit');
        $this->load->view('layouts/footer');
    }

    public function update($id)
    {
        guard([1]);

        // Buat validasi atau aturan mengenai inputan yang dari form


        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('telp', 'No Telp', 'required|numeric', [
            'required' => 'No Telp harus tidak boleh kosong',
            'numeric' => 'No Telp harus berupa angka'
        ]);

        // Buat kondisi jika validasi nya salah atau false maka kembalikan ke halaman edit dan jika benar maka lakukan update data
        if ($this->form_validation->run() == false) {
            $this->edit($id);
        } else {
            $data = [
                'nama' => $this->input->post('nama', true),
                'telp' => $this->input->post('telp', true)
            ];

            // Lakukan update dengan memanggil method update dari model petugas
            $this->Petugas_M->update($id, $data);

            // Buat pesan dan kembalikan ke halaman index petugas
            $this->session->set_flashdata('success', 'Petugas berhasil diupdate');
            redirect(base_url('petugas'));
        }
    }

    public function destroy($id)
    {
        guard([1]);
        
        // Ambil data petugas dan user dengan join di model
        $petugas = $this->Petugas_M->user($id);

        // Delete User terlebih dahulu lalu delete petugas
        $this->User_M->delete($petugas['user_id']);
        $this->Petugas_M->delete($id);

        // Buat pesan dan kembalikan ke halaman index petugas
        $this->session->set_flashdata('success', 'Petugas berhasil dihapus');
        redirect(base_url('petugas'));
    }

    public function validate()
    {
        guard([1]);
        
        // Buat validasi atau aturan mengenai inputan yang dari form
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[users.username]', [
            'required' => 'Username tidak boleh kosong',
            'min_length' => 'Username terlalu pendek',
            'is_unique' => 'Username tidak tersedia'
        ]);

        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]', [
            'required' => 'Email tidak boleh kosong',
            'is_unique' => 'Email sudah digunakan'
        ]);

        $this->form_validation->set_rules('telp', 'No Telp', 'required|numeric', [
            'required' => 'No Telp harus tidak boleh kosong',
            'numeric' => 'No Telp harus berupa angka'
        ]);
    }
}
