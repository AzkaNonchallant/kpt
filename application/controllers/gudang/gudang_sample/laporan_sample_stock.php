<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_sample_stock extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_gudang/M_gudang_sample/M_sample_masuk');
        $this->load->model('M_gudang/M_gudang_sample/M_sample_keluar');
        $this->load->model('M_gudang/M_gudang_sample/M_laporan_sample_stock');
        $this->load->model('M_master/M_master_barang', 'M_barang');
        $this->load->model('M_master/M_master_customer', 'M_customer');
    }

    private function convertDate($date)
    {
        return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
    }

    public function index()
    {
        $id_barang = $this->input->get('id_barang');

        // Ambil data stok sample yang sudah di-group
        $result = $this->M_laporan_sample_stock->get_sample_stock_grouped($id_barang);
        $data['result'] = is_array($result) ? $result : $result->result_array();

        $res_barang = $this->M_barang->get();
        $data['res_barang'] = is_array($res_barang) ? $res_barang : $res_barang->result_array();

        $res_customer = $this->M_customer->get();
        $data['res_customer'] = is_array($res_customer) ? $res_customer : $res_customer->result_array();

        $data['id_barang'] = $id_barang;

        $this->template->load('template', 'content/gudang/gudang_sample/laporan_sample/laporan_sample_stock_data', $data);
    }

     public function get_rincian_sample()
    {
        $id_barang = $this->input->post('id_barang');
        
        // Debug: Cek apakah data sampai
        error_log("ID Barang received: " . $id_barang);
        
        $result = $this->M_laporan_sample_stock->get_rincian_sample_by_id($id_barang);
        
        if ($result) {
            $data = $result->result_array();
            error_log("Data found: " . count($data) . " records");
            echo json_encode($data);
        } else {
            error_log("No data found for id_barang: " . $id_barang);
            echo json_encode([]);
        }
    }

    public function delete($id_sample_keluar)
    {
        $data['id_sample_keluar'] = str_replace('--', '/', $id_sample_keluar);
        $respon = $this->M_sample_keluar->delete($data);

        if ($respon) {
            header('location:' . base_url('gudang/gudang_sample/sample_keluar/laporan_sample_keluar') . '?alert=success&msg=Selamat anda berhasil menghapus sample Keluar');
        } else {
            header('location:' . base_url('gudang/gudang_sample/sample_keluar/laporan_sample_keluar') . '?alert=success&msg=Maaf anda gagal menghapus sample Keluar');
        };
    }
    public function pdf_laporan_surat()
{   

    if (ob_get_length()) ob_end_clean();


    try {
        // === 1️⃣ Setting optimal Dompdf ===
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


        // === 2️⃣ Ambil data dari model ===
        $data['row'] = $this->M_laporan_sample_stock->ambil_surat_jalan2()->row_array();
        $data['detail'] = $this->M_laporan_sample_stock->data_barang_keluar2()->result_array();
        // echo json_encode($data['detail']);
        // === 3️⃣ Load HTML View ===
        $html = $this->load->view('laporan/sample_masuk/laporan_sample/page_laporan_sample_stock', $data, TRUE);
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