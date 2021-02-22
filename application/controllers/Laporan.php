<?php

class Laporan extends CI_Controller 
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

        auth();
    }

    public function index()
    {
        guard([1, 2]);

        $data = [
            'title' => 'Laporan Lelang'
        ];

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('laporan/index');
        $this->load->view('layouts/footer');
    }

    public function pdf($id)
    {
        $orders =  $this->Lelang_M->barangs();
        $tanggal = date('d-m-Y');
        
        $pdf = new \TCPDF();
        $pdf->AddPage();
        $pdf->SetFont('', 'B', 20);
        $pdf->Cell(115, 0, "Laporan Lelang - ".$tanggal, 0, 1, 'L');
        $pdf->SetAutoPageBreak(true, 0);
 
        // Add Header
        $pdf->Ln(10);
        $pdf->SetFont('', 'B', 12);
        $pdf->Cell(10, 8, "No", 1, 0, 'C');
        $pdf->Cell(55, 8, "Produk", 1, 0, 'C');
        $pdf->Cell(35, 8, "Tanggal", 1, 0, 'C');
        $pdf->Cell(35, 8, "Jumlah", 1, 0, 'C');
        $pdf->Cell(50, 8, "Total", 1, 1, 'C');
        $pdf->SetFont('', '', 12);
        foreach($orders->result_array() as $k => $order) {
            $this->addRow($pdf, $k+1, $order);
        }
        $tanggal = date('d-m-Y');
        $pdf->Output('Laporan Order - '.$tanggal.'.pdf');
    }

    private function addRow($pdf, $no, $order) {
        $pdf->Cell(10, 8, $no, 1, 0, 'C');
        $pdf->Cell(55, 8, $order['product'], 1, 0, '');
        $pdf->Cell(35, 8, date('d-m-Y', strtotime($order['tanggal'])), 1, 0, 'C');
        $pdf->Cell(35, 8, $order['jumlah'], 1, 0, 'C');
        $pdf->Cell(50, 8, "Rp. ".number_format($order['total'], 2, ',' , '.'), 1, 1, 'L');
    }
}
