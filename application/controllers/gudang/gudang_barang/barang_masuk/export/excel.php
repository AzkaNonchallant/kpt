<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once FCPATH . 'vendor/autoload.php'; // pastikan ini ditambahkan di awal file

class excel extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_gudang/M_gudang_barang/M_barang_masuk/M_barang_masuk'); // Contoh model
    }

    public function index() {
        // Ambil data dari database
        $data = $this->M_barang_masuk->get();

        // Buat objek spreadsheet
        $spreadsheet = new PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header kolom
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Tanggal Masuk');
        $sheet->setCellValue('C1', 'Kode Bahan Baku');
        $sheet->setCellValue('D1', 'Jumlah Masuk');
        $sheet->setCellValue('E1', 'Satuan');
        $sheet->setCellValue('F1', 'Bacth');
        $sheet->setCellValue('G1', 'Tanggal Expired');
        $sheet->setCellValue('H1', 'Keterangan');
        $sheet->setCellValue('I1', '');
        // $sheet->setCellValue('J1', 'ID Kota');
        // $sheet->setCellValue('K1', 'Nama Kota');
        // $sheet->setCellValue('L1', 'Nama Provinsi');

        // Isi data
        $row = 2;
        $no = 1;
        foreach ($data as $d) {
            $sheet->setCellValue('A'.$row, $no++);
            $sheet->setCellValue('B'.$row, $d['tgl_msk_gdg']);
            $sheet->setCellValue('C'.$row, $d['kode_barang_bpom']);
            $sheet->setCellValue('D'.$row, $d['gdg_qty_in']);
            $sheet->setCellValue('E'.$row, $d['satuan']);
            $sheet->setCellValue('F'.$row, $d['no_batch']);
            $sheet->setCellValue('G'.$row, $d['tgl_exp']);
            $sheet->setCellValue('H'.$row, $d['keterangan']);
            $sheet->setCellValue('I'.$row, ' ');
            // $sheet->setCellValue('J'.$row, $d['id_kota']);
            // $sheet->setCellValue('K'.$row, $d['nama_kota']);
            // $sheet->setCellValue('L'.$row, $d['nama_provinsi']);
            $row++;
        }

        // Buat writer dan output
        $writer = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'Data_Sumber_' . date('Ymd_His') . '.xlsx';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}