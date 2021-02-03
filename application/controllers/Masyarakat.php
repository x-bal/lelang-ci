<?php

class Masyarakat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Masyarakat_M');
        $this->load->model('User_M');
    }

    public function index()
    {
        $data = [
            'title' => 'Data Masyarakat',
            'masyarakat' => $this->Masyarakat_M->users()
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('masyarakat/index');
        $this->load->view('layouts/footer');
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah masyarakat'
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('masyarakat/create');
        $this->load->view('layouts/footer');
    }

    public function store()
    {
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
                'level_id' => 3
            ];

            // Masukkan data untuk user dengan memanggil model user dan methodnya
            // Setelah user berhasil dimasukan kita ambil data terbaru dari table user yaitu yang baru saja kita masukan
            $user = $this->User_M->insert($dataUser);

            // Buat variable untuk menampung data ke table petugas
            $dataMasyarakat = [
                'nama' => $this->input->post('nama', true),
                'telp' => $this->input->post('telp', true),
                'user_id' => $user
            ];

            // Masukkan data petugas dengan memanggil model petugas dan methodnya
            $this->Masyarakat_M->insert($dataMasyarakat);

            // Buat pesan dan kembalikan ke halaman index petugas
            $this->session->set_flashdata('success', 'Masyarakat berhasil ditambahkan');
            redirect(base_url('masyarakat'));
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Masyarakat',
            'masyarakat' => $this->Masyarakat_M->user($id),
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('masyarakat/edit');
        $this->load->view('layouts/footer');
    }

    public function update($id)
    {
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
            $this->Masyarakat_M->update($id, $data);

            // Buat pesan dan kembalikan ke halaman index petugas
            $this->session->set_flashdata('success', 'Masyarakat berhasil diupdate');
            redirect(base_url('masyarakat'));
        }
    }

    public function validate()
    {
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

    public function destroy($id)
    {
        // Ambil data masyarakat dan user dengan join di model
        $masyarakat = $this->Masyarakat_M->user($id);

        // Delete User terlebih dahulu lalu delete masyarakat
        $this->User_M->delete($masyarakat['user_id']);
        $this->Masyarakat_M->delete($id);

        // Buat pesan dan kembalikan ke halaman index masyarakat
        $this->session->set_flashdata('success', 'Masyarakat berhasil dihapus');
        redirect(base_url('masyarakat'));
    }
}
