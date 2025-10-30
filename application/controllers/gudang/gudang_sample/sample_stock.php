<?php

use Dompdf\Dompdf;
use Dompdf\Options;
defined('BASEPATH') OR exit('No direct script access allowed');
require_once FCPATH . 'vendor/autoload.php';

class Sample_stock extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_gudang/M_gudang_sample/M_sample_masuk');
        $this->load->model('M_gudang/M_gudang_sample/M_sample_keluar');
    }

    public function index()
    {

        $data['result'] = $this->get_stock_by_batch();
        
       
         $this->template->load('template', 'content/gudang/gudang_sample/stock_sample_data', $data);
    }

    private function get_stock_by_batch()
    {
        
        $batch_list = $this->M_sample_masuk->get_unique_batch()->result_array();
        
        $stock_data = array();
        
        foreach ($batch_list as $i => $batch) {
            $no_batch = $batch['no_batch'];

            $total_masuk = $this->M_sample_masuk->get_total_masuk_by_batch($no_batch);
            
            
            $total_keluar = $this->M_sample_keluar->get_total_keluar_by_batch($no_batch);
            
           
            $stok_akhir = $total_masuk - $total_keluar;
            
           
            $batch_detail = $this->M_sample_masuk->get_batch_detail($no_batch);
            
            if ($batch_detail) {
                $stock_data[] = array(
                    'no' => $i + 1,
                    'no_batch' => $no_batch,
                    'id_barang' => $batch_detail['id_barang'],
                    'nama_barang' => $batch_detail['nama_barang'] ?? '-',
                    'kode_sample_in' => $batch_detail['kode_sample_in'] ?? '-',
                    'id_customer' => $batch_detail['id_customer'],
                    'nama_customer' => $batch_detail['nama_customer'] ?? '-',
                    'tgl_masuk_sample' => $batch_detail['tgl_masuk_sample'],
                    'jumlah_masuk' => $total_masuk,
                    'jumlah_keluar' => $total_keluar,
                    'stok' => $stok_akhir,
                    'gudang_admin' => $batch_detail['gudang_admin'] ?? '-'
                );
            }
        }
        
        return $stock_data;
    }

   
    public function get_detail_batch()
    {
        $no_batch = $this->input->get('no_batch');
        
        if (!$no_batch) {
            echo json_encode(['error' => 'No batch tidak ditemukan']);
            return;
        }
        
        
        $masuk_list = $this->M_sample_masuk->get_masuk_by_batch($no_batch)->result_array();
        
       
        $keluar_list = $this->M_sample_keluar->get_keluar_by_batch($no_batch)->result_array();
        
       
        $total_masuk = $this->M_sample_masuk->get_total_masuk_by_batch($no_batch);
        $total_keluar = $this->M_sample_keluar->get_total_keluar_by_batch($no_batch);
        $stok_akhir = $total_masuk - $total_keluar;
        
        $data = [
            'no_batch' => $no_batch,
            'masuk_list' => $masuk_list,
            'keluar_list' => $keluar_list,
            'total_masuk' => $total_masuk,
            'total_keluar' => $total_keluar,
            'stok_akhir' => $stok_akhir
        ];
        
        echo json_encode($data);
    }

public function pdf_stock_sample()
{
    // --- Inisialisasi Dompdf ---
    require_once FCPATH . 'vendor/autoload.php'; 

    $options = new Options();
    $options->set('isRemoteEnabled', true);
    $dompdf = new Dompdf($options);

    // --- Ambil data stok ---
    $data['result'] = $this->get_stock_by_batch();

    // --- Load view HTML untuk PDF ---
    $html = $this->load->view('laporan/sample_stock/page_stock_sample_pdf', $data, TRUE);

    // --- Generate PDF ---
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape'); // landscape biar tabel muat lebar
    $dompdf->render();

    // --- Tambah footer halaman ---
    $canvas = $dompdf->getCanvas();
    $canvas->page_text(770, 570, "Halaman {PAGE_NUM}", null, 8, array(0,0,0));

    // --- Output ke browser ---
    $dompdf->stream("laporan_stock_sample.pdf", array("Attachment" => false));
}

}