<?php
use Dompdf\Options;
use Dompdf\Dompdf;

defined('BASEPATH') or exit('No direct script access allowed');
require_once FCPATH . 'vendor/autoload.php'; 

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
        $id_customer = $this->input->get('id_customer');
        $tgl_mulai = $this->input->get('tgl_mulai');
        $tgl_selesai = $this->input->get('tgl_selesai');

        // Simpan filter di session untuk cetak
        $this->session->set_userdata('filter_laporan', [
            'id_barang' => $id_barang,
            'id_customer' => $id_customer,
            'tgl_mulai' => $tgl_mulai,
            'tgl_selesai' => $tgl_selesai
        ]);

        // Ambil data stok sample yang sudah di-group
        $result = $this->M_laporan_sample_stock->get_sample_stock_grouped($id_barang, $id_customer, $tgl_mulai, $tgl_selesai);
        
        // Pastikan $result adalah array
        if (is_object($result)) {
            $data['result'] = $result->result_array();
        } else {
            $data['result'] = $result; // sudah array
        }

        $res_barang = $this->M_barang->get();
        $data['res_barang'] = is_array($res_barang) ? $res_barang : $res_barang->result_array();

        $res_customer = $this->M_customer->get();
        $data['res_customer'] = is_array($res_customer) ? $res_customer : $res_customer->result_array();

        $data['id_barang'] = $id_barang;
        $data['id_customer'] = $id_customer;
        $data['tgl_mulai'] = $tgl_mulai;
        $data['tgl_selesai'] = $tgl_selesai;

        $this->template->load('template', 'content/gudang/gudang_sample/laporan_sample/laporan_sample_stock_data', $data);
    }

    public function get_rincian_sample()
{
    $id_barang = $this->input->post('id_barang');
    $id_customer = $this->input->post('id_customer');
    $tgl_mulai = $this->input->post('tgl_mulai');
    $tgl_selesai = $this->input->post('tgl_selesai');

    // Ambil data dari model
    $result = $this->M_laporan_sample_stock->get_rincian_sample_by_id($id_barang, $id_customer, $tgl_mulai, $tgl_selesai);

    if ($result && $result->num_rows() > 0) {
        $data = $result->result_array();
        echo json_encode($data);
    } else {
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
            // Ambil filter dari session
            $filter = $this->session->userdata('filter_laporan') ?? [];
            
            $options = new \Dompdf\Options();
            $options->set('isRemoteEnabled', false);
            $options->set('isFontSubsettingEnabled', false);
            $options->set('defaultFont', 'Helvetica');
            $options->set('enable_font_subsetting', true);
            $options->set('dpi', 180);
            $options->set('chroot', FCPATH);
            $options->set('fontCache', FCPATH . 'application/cache/dompdf/');
            $options->set('tempDir', FCPATH . 'application/cache/dompdf/');

            $dompdf = new \Dompdf\Dompdf($options);

            // Ambil data dengan filter
            $data['filter'] = $filter;
            $data['row'] = $this->M_laporan_sample_stock->ambil_surat_jalan2($filter)->row_array();
            $data['detail'] = $this->M_laporan_sample_stock->data_barang_keluar2($filter)->result_array();
            
            // Ambil data summary untuk header
            $summary = $this->M_laporan_sample_stock->get_sample_stock_grouped(
                $filter['id_barang'] ?? null, 
                $filter['id_customer'] ?? null, 
                $filter['tgl_mulai'] ?? null, 
                $filter['tgl_selesai'] ?? null
            );
            
            if (is_object($summary)) {
                $data['summary'] = $summary->result_array();
            } else {
                $data['summary'] = $summary;
            }

            $html = $this->load->view('laporan/sample_stock/page_laporan_sample_stock', $data, TRUE);
            $dompdf->loadHtml($html, 'UTF-8');
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            
            $filename = "Laporan_Stock_Sample_" . date('Y-m-d_H-i-s') . ".pdf";
            $dompdf->stream($filename, ["Attachment" => false]);
        } 
        catch (Exception $e) {
            log_message('error', 'PDF Laporan Stock gagal dibuat: ' . $e->getMessage());
            echo 'Terjadi kesalahan saat membuat PDF. Coba lagi nanti.';
        }
    }

    // Export PDF dengan parameter filter
    public function export_pdf()
    {
        $id_barang = $this->input->get('id_barang');
        $id_customer = $this->input->get('id_customer');
        $tgl_mulai = $this->input->get('tgl_mulai');
        $tgl_selesai = $this->input->get('tgl_selesai');

        // Set filter untuk PDF
        $this->session->set_userdata('filter_laporan', [
            'id_barang' => $id_barang,
            'id_customer' => $id_customer,
            'tgl_mulai' => $tgl_mulai,
            'tgl_selesai' => $tgl_selesai
        ]);

        redirect('gudang/gudang_sample/laporan_sample_stock/pdf_laporan_surat');
    }
}
    