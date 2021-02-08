<?php

class Lelang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Lelang_M');
        $this->load->model('Barang_M');
        $this->load->model('History_M');
        $this->load->model('User_M');
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
            'lelang' => $this->Lelang_M->get()
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

    public function destroy($id)
    {
        $this->Lelang_M->delete($id);

        $this->session->set_flashdata('success', 'Lelang berhasil dihapus');
        redirect(base_url('lelang'));
    }

    public function tawarkan()
    {
        $idBarang = $this->input->post('id_lelang', true);
        $barang = $this->Lelang_M->barang($idBarang);

        $this->form_validation->set_rules('tawaran', 'Penawaran', 'required', [
            'required' => 'Tawaran harus diisi',
        ]);

        if ($this->input->post('tawaran', true) <= $barang['harga_awal']) {
            $this->session->set_flashdata('tawaran', 'Tawaran tidak boleh kurang dari harga awal');
            $this->show($barang['id_lelang']);
        } else {
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

    public function choose()
    {
        $id = $this->input->post('id_lelang', true);

        $data = [
            'user_id' => $this->input->post('user_id', true),
            'harga_akhir' => $this->input->post('harga_akhir', true),
            'status' => 'ditutup'
        ];

        $user = $this->User_M->first($this->input->post('user_id', true));

        

        $lelang = $this->Lelang_M->barang($id);

        // $random_id = random_string('alnum', 16);
		// $email = $this->input->post('email');
		// $password = $this->input->post('password');
 
		$this->email->from('noreply@gmail.com', 'E-Lelang');
		$this->email->to($user['email']);
 
		$this->email->subject('Pemberitahuan Pemenang');
		$this->email->message('Selamat, anda telah terpilih sebagai pemenang dari lelang barang : ' . $lelang['nama_barang']);
 
		$this->email->set_mailtype('html');
		// $this->email->send();
        
        if($this->email->send() > 0){
            $this->Lelang_M->update($id, $data);
            $this->session->set_flashdata('success', 'Pemenang berhasil dipilih');
            redirect(base_url('lelang'));
        }else{
            $this->session->set_flashdata('failed', 'Pemenang gagal dipilih');
            redirect(base_url('lelang'));
        }
    }
}
