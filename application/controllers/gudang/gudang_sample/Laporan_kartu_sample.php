<?php
use Dompdf\Options;
use Dompdf\Dompdf;

defined('BASEPATH') OR exit('No direct script access allowed');
require_once FCPATH . 'vendor/autoload.php'; 
class Laporan_kartu_sample extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_master/M_master_barang');
        $this->load->model('M_gudang/M_gudang_sample/M_laporan_kartu_sample');

    }

	public function index($tgl=null,$tgl2=null)
	{
		// $data['row'] = $this->customer_m->get();

        $tgl_sebelum = !empty($tgl)
        ? date('Y-m-d', strtotime('-1 day', strtotime($tgl)))
        : date('Y-m-d', strtotime('-1 day'));

		$data['result'] = $this->M_master_barang->get()->result_array();
        for($i=0; $i<count($data['result']);$i++){
            $d['id_barang'] = $data['result'][$i]['id_barang'];
            $d['tgl'] = $tgl_sebelum;
            $jml_barang_masuk = $this->M_laporan_kartu_sample->jml_sample_masuk($d)->row_array();
            $jml_barang_keluar = $this->M_laporan_kartu_sample->jml_sample_keluar2($d)->row_array();


            // $data['result'][$i]['masuk']=$jml_barang_masuk['tot_barang_masuk'];
            // $data['result'][$i]['keluar']=$jml_barang_keluar['tot_barang_keluar'];
            $data['result'][$i]['stok']=$jml_barang_masuk['tot_sample_masuk']-$jml_barang_keluar['tot_sample_keluar'];

            $d['tgl1'] = $tgl;
            $d['tgl2'] = $tgl2;
            $jml_barang_masuk_setelah = $this->M_laporan_kartu_sample->jml_sample_masuk_setelah($d)->row_array();
            $jml_barang_keluar_setelah = $this->M_laporan_kartu_sample->jml_sample_keluar_setelah($d)->row_array();


            // print_r($jml_barang_masuk_setelah);
            $data['result'][$i]['masuk']=$jml_barang_masuk_setelah['tot_sample_masuk'];
            $data['result'][$i]['keluar']=$jml_barang_keluar_setelah['tot_sample_keluar'];

        }
        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;
        
		$this->template->load('template', 'content/gudang/gudang_sample/laporan_kartu_sample_data',$data);
        // print_r($data);

	}

	

public function pdf_laporan_kartu_stok($tgl = null, $tgl2 = null)
{
    // --- Inisialisasi Dompdf ---
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
    // --- Proses Data ---
    $tgl_sebelum = date('Y-m-d', strtotime('-1 days', strtotime($tgl)));
    $data['result'] = $this->M_master_barang->get()->result_array();

    for ($i = 0; $i < count($data['result']); $i++) {
        $d['id_barang'] = $data['result'][$i]['id_barang'];
        $d['tgl'] = $tgl_sebelum;

        $jml_barang_masuk = $this->M_laporan_kartu_sample->jml_sample_masuk($d)->row_array();
        $jml_barang_keluar = $this->M_laporan_kartu_sample->jml_sample_keluar2($d)->row_array();

        $data['result'][$i]['stok'] = $jml_barang_masuk['tot_sample_masuk'] - $jml_barang_keluar['tot_sample_keluar'];

        $d['tgl1'] = $tgl;
        $d['tgl2'] = $tgl2;

        $jml_barang_masuk_setelah = $this->M_laporan_kartu_sample->jml_sample_masuk_setelah($d)->row_array();
        $jml_barang_keluar_setelah = $this->M_laporan_kartu_sample->jml_sample_keluar_setelah($d)->row_array();

        $data['result'][$i]['masuk'] = $jml_barang_masuk_setelah['tot_sample_masuk'];
        $data['result'][$i]['keluar'] = $jml_barang_keluar_setelah['tot_sample_keluar'];
    }

    $data['tgl'] = $tgl;
    $data['tgl2'] = $tgl2;

    // --- Load View ---
    $html = $this->load->view('laporan/barang_stok/page_laporan_kartu_stok', $data, TRUE);

    // --- Generate PDF ---
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait'); // Sama kayak AddPage("P")
    $dompdf->render();

    // --- Footer Halaman ---
    $canvas = $dompdf->getCanvas();
    $canvas->page_text(520, 820, "Halaman {PAGE_NUM}", null, 8, array(0,0,0));

    // --- Output ke Browser ---
    $dompdf->stream("laporan_kartu_stok.pdf", array("Attachment" => false));
}


}