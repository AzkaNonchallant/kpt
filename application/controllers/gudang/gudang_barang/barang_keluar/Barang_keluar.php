<?php

use Mpdf\Mpdf;

defined('BASEPATH') OR exit('No direct script access allowed');
require_once FCPATH . 'vendor/autoload.php'; // pastikan ini ditambahkan di awal file

class Barang_keluar extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_gudang/M_gudang_barang/M_barang_keluar/M_barang_keluar');
        $this->load->model('M_gudang/M_gudang_barang/M_barang_masuk/M_barang_masuk');
        $this->load->model('M_marketing/M_sppb');
        $this->load->model('M_master/M_master_customer');
    }

    public function convertDate($date)
    {
        return explode('/', $date)[2]."-".explode('/', $date)[1]."-".explode('/', $date)[0];
    }

    public function index()
    {
        $tgl = $this->input->get('date_from');
        $tgl2 = $this->input->get('date_until');
        $nama_customer = $this->input->get('nama_customer');
        $no_sppb = $this->input->get('no_sppb');

        $data['result'] = $this->M_barang_keluar->get($tgl, $tgl2, $nama_customer, $no_sppb)->result_array();
        $data['res_sppb'] = $this->M_sppb->get()->result_array();
        $data['res_customer'] = $this->M_master_customer->get()->result_array();

        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;
        $data['nama_customer'] = $nama_customer;
        $data['no_sppb'] = $no_sppb;

        // echo json_encode($data['result']);
        $this->template->load('template', 'content/gudang/gudang_barang/barang_keluar/barang_keluar_data', $data);
    }

    public function data_barang_keluar(){
        $kode_tf_out = $this->input->post('kode_tf_out',TRUE);
        $result = $this->M_barang_keluar->data_barang_keluar($kode_tf_out)->result_array();
        echo json_encode($result);
    }

    public function cek_surat_jalan(){
        $no_surat_jalan = $this->input->post('no_surat_jalan',TRUE);
        $row = $this->M_barang_keluar->cek_surat_jalan($no_surat_jalan)->row_array();
        if ($row['count_sj']==0) {
            echo "false";
        }else{
            echo "true";
        }
    }

    public function cek_kode_tf_out(){
        $kode_tf_out = $this->input->post('kode_tf_out',TRUE);
        $row = $this->M_barang_keluar->cek_kode_tf_out($kode_tf_out)->row_array();
        if ($row['count_kto']==0) {
            echo "false";
        }else{
            echo "true";
        }
    }

    public function add()
    {
        $data['kode_tf_out'] = $this->input->post('kode_tf_out',TRUE);
        $data['no_surat_jalan'] = $this->input->post('no_surat_jalan',TRUE);
        $data['id_mkt_sppb'] = $this->input->post('id_mkt_sppb',TRUE);
        $data['gdg_admin'] = $this->input->post('gdg_admin',TRUE);
        $data['no_po'] = $this->input->post('no_po',TRUE);
        $data['id_customer'] = $this->input->post('id_customer',TRUE);
        $data['no_sppb'] = $this->input->post('no_sppb',TRUE);
        $data['note_gudang'] = $this->input->post('note_gudang', TRUE);
        $data['kode_tf_in'] = $this->input->post('kode_tf_in', TRUE);
        $this->M_barang_keluar->update_status_sppb($data['id_mkt_sppb'], "Selesai");
        
        $respon = $this->M_barang_keluar->add_barang_keluar($data);

        if($respon){
            header('location:'.base_url('gudang/gudang_barang/barang_keluar/barang_keluar').'?alert=success&msg=Selamat anda berhasil menambah barang Keluar');
        }else{
            header('location:'.base_url('gudang/gudang_barang/barang_keluar/barang_keluar').'?alert=success&msg=Maaf anda gagal menambah barang Kelur');
        }
    }
    
    public function update()
    {
        $data['id_barang_keluar'] = $this->input->post('id_barang_keluar',TRUE);
        $data['no_surat_jalan'] = $this->input->post('no_surat_jalan',TRUE);
        $data['id_mkt_sppb'] = $this->input->post('id_mkt_sppb',TRUE);
        $data['gdg_admin'] = $this->input->post('gdg_admin',TRUE);

        $respon = $this->M_barang_keluar->update($data);
        
        if($respon){
            header('location:'.base_url('gudang/gudang_barang/barang_keluar/barang_keluar').'?alert=success&msg=Selamat anda berhasil meng-update barang keluar');
        }else{
            header('location:'.base_url('gudang/gudang_barang/barang_keluar/barang_keluar').'?alert=success&msg=Maaf anda gagal meng-update barang keluar');
        }
    }

    public function delete($id_barang_keluar)
    {
        $data['id_barang_keluar'] = str_replace('--', '/',$id_barang_keluar);
        $respon = $this->M_barang_keluar->delete($data);

        if($respon){
            header('location:'.base_url('gudang/gudang_barang/barang_keluar/barang_keluar').'?alert=success&msg=Selamat anda berhasil menghapus barang Kelur');
        }else{
            header('location:'.base_url('gudang/gudang_barang/barang_keluar/barang_keluar').'?alert=success&msg=Maaf anda gagal menghapus barang Kelur');
        }
    }


    // public function pdf_surat_jalan($no_sj=null)
    // {
    //     $kode_tf_out = str_replace("--","/",$no_sj);
    //     $mpdf = new \Mpdf\Mpdf();

    //     $data['row'] = $this->M_barang_keluar->ambil_surat_jalan($kode_tf_out)->row_array();
    //     $data['detail'] = $this->M_barang_keluar->data_barang_keluar($kode_tf_out)->result_array();

    //     $d = $this->load->view('laporan/barang_keluar/page_surat_jalan', $data, TRUE);
    //     $mpdf->AddPage("P","","","","","15","15","5","15","","","","","","","","","","","","A4");
    //     $mpdf->WriteHTML($d);
    //     $mpdf->Output();
    // }

    // METHOD PDF YANG SUDAH DIPERBAIKI
    // public function pdf_surat_jalan($no_sj = null)
    // {
    //     // Clean semua output buffer
    //     while (ob_get_level()) {
    //         ob_end_clean();
    //     }

    //     // Setup memory dan timeout
    //     ini_set('memory_limit', '256M');
    //     ini_set('max_execution_time', 300);

    //     $kode_tf_out = str_replace("--","/",$no_sj);
        
    //     // Ambil data
    //     $data['row'] = $this->M_barang_keluar->ambil_surat_jalan($kode_tf_out)->row_array();
    //     $data['detail'] = $this->M_barang_keluar->data_barang_keluar($kode_tf_out)->result_array();

    //     // Debug: Cek data
    //     if(empty($data['row'])) {
    //         die("Data tidak ditemukan untuk kode: " . $kode_tf_out);
    //     }

        // Inisialisasi mPDF
    //     $mpdf = new \Mpdf\Mpdf([
    //         'mode' => 'utf-8',
    //         'format' => 'A4',
    //         'orientation' => 'P',
    //         'margin_left' => 15,
    //         'margin_right' => 15,
    //         'margin_top' => 15,
    //         'margin_bottom' => 15,
    //         'tempDir' => sys_get_temp_dir()
    //     ]);

    //     // Load view dan generate HTML
    //     $html = $this->load->view('laporan/barang_keluar/page_surat_jalan', $data, TRUE);
        
    //     // Write HTML ke PDF
    //     $mpdf->WriteHTML($html);
        
    //     // Output PDF ke browser
    //     $filename = "Surat_Jalan_" . $data['row']['no_surat_jalan'] . ".pdf";
    //     $mpdf->Output($filename, 'I'); // 'I' untuk view di browser
        
    //     exit; // PENTING: Exit setelah output
    // }

    // METHOD PREVIEW UNTUK TEST
    public function preview_surat_jalan($no_sj = null)
    {
        $kode_tf_out = str_replace("--","/",$no_sj);
        
        $data['row'] = $this->M_barang_keluar->ambil_surat_jalan($kode_tf_out)->row_array();
        $data['detail'] = $this->M_barang_keluar->data_barang_keluar($kode_tf_out)->result_array();

        // Tampilkan HTML biasa untuk test
        $this->load->view('laporan/barang_keluar/page_surat_jalan', $data);
    }

    // METHOD TEST MPDF
    
//     public function pdf_surat_jalan($no_sj = null)
// {
//     // Matikan output buffering default CI
    
    
//     $kode_tf_out = str_replace("--", "/", $no_sj);

//     try {
//         $options = new \Dompdf\Options();
//         $options->set('isRemoteEnabled', false); // pakai file lokal aja
//         $options->set('isHtml5ParserEnabled', false);
//         $options->set('defaultFont', 'Helvetica');

//         $dompdf = new \Dompdf\Dompdf($options);

//         $data['row'] = $this->M_barang_keluar->ambil_surat_jalan($kode_tf_out)->row_array();
//         $data['detail'] = $this->M_barang_keluar->data_barang_keluar($kode_tf_out)->result_array();
//         // echo json_encode($data['detail']);
//         $html = $this->load->view('laporan/barang_keluar/pdf_surat_jalan_2', $data, TRUE);

//         // Langsung output tanpa buffer
//         $dompdf->loadHtml($html);
//         $dompdf->setPaper('A4', 'portrait');
//         $dompdf->render();
//         $dompdf->stream("Surat_Jalan_$no_sj.pdf", array("Attachment" => false)); // false = preview di browser
        
//     } catch (\Mpdf\MpdfException $e) {
//         die('Error generating PDF: ' . $e->getMessage());
//     }
//     exit;
// }


public function pdf_surat_jalan($no_sj = null)
{
    // Bersihkan output buffer CodeIgniter (mencegah duplikasi data / error header)
    if (ob_get_length()) ob_end_clean();

    $kode_tf_out = str_replace("--", "/", $no_sj);

    try {
        // === 1️⃣ Setting optimal Dompdf ===
        $options = new \Dompdf\Options();
        $options->set('isRemoteEnabled', false); // ⚡ Pakai file lokal biar cepat
        $options->set('isFontSubsettingEnabled', false);
        $options->set('defaultFont', 'Helvetica');
        $options->set('enable_font_subsetting', true);
        $options->set('dpi', 87);
        $options->set('chroot', FCPATH);
        $options->set('fontCache', FCPATH . 'application/cache/dompdf/');
        $options->set('tempDir', FCPATH . 'application/cache/dompdf/');

        $dompdf = new \Dompdf\Dompdf($options);


        // === 2️⃣ Ambil data dari model ===
        $data['row'] = $this->M_barang_keluar->ambil_surat_jalan($kode_tf_out)->row_array();
        $data['detail'] = $this->M_barang_keluar->data_barang_keluar($kode_tf_out)->result_array();
        // echo json_encode($data['detail']);
        // === 3️⃣ Load HTML View ===
        $html = $this->load->view('laporan/barang_keluar/pdf_surat_jalan_2', $data, TRUE);
        $dompdf->loadHtml($html, 'UTF-8');
        $dompdf->setPaper('A4', 'portrait');
    // if (file_exists($cache)) {
    //     readfile($cache);
    //     exit;
    // }
    $dompdf->render();
    // file_put_contents($cache, $dompdf->output());
    $dompdf->stream("Surat_Jalan_$no_sj.pdf", ["Attachment" => false]);
    } 
    catch (Exception $e) {
        // Tangani semua error (bukan cuma MpdfException)
        log_message('error', 'PDF Surat Jalan gagal dibuat: ' . $e->getMessage());
        echo 'Terjadi kesalahan saat membuat PDF. Coba lagi nanti.';
    }

    exit;
}



public function landscape_surat_jalan()
{   

    if (ob_get_length()) ob_end_clean();


    try {
        // === ⿡ Setting optimal Dompdf ===
        $options = new \Dompdf\Options();
        $options->set('isRemoteEnabled', false); // ⚡ Pakai file lokal biar cepat
        $options->set('isFontSubsettingEnabled', false);
        $options->set('defaultFont', 'Helvetica');
        $options->set('enable_font_subsetting', true);
        $options->set('dpi', 180);
        $options->set('chroot', FCPATH);
        $options->set('fontCache', FCPATH . 'application/cache/dompdf/');
        $options->set('tempDir', FCPATH . 'application/cache/dompdf/');

        $dompdf = new \Dompdf\Dompdf($options);


        // === ⿢ Ambil data dari model ===
        $data['row'] = $this->M_barang_keluar->ambil_surat_jalan2()->row_array();
        $data['detail'] = $this->M_barang_keluar->data_barang_keluar2()->result_array();
        // echo json_encode($data['detail']);
        // === ⿣ Load HTML View ===
        $html = $this->load->view('laporan/barang_keluar/page_laporan_barang_keluar', $data, TRUE);
        $dompdf->loadHtml($html, 'UTF-8');
        $dompdf->setPaper('A4', 'landscape');
    // if (file_exists($cache)) {
    //     readfile($cache);
    //     exit;
    // }
    $dompdf->render();
    // file_put_contents($cache, $dompdf->output());
    $dompdf->stream("laporan_barang.pdf", ["Attachment" => false]);
    } 
    catch (Exception $e) {
        // Tangani semua error (bukan cuma MpdfException)
        log_message('error', 'PDF Surat Jalan gagal dibuat: ' . $e->getMessage());
        echo 'Terjadi kesalahan saat membuat PDF. Coba lagi nanti.';
}
}

}
?>