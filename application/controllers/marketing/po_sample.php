<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once FCPATH . 'vendor/autoload.php'; // pastikan ini ditambahkan di awal file

class po_sample extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_marketing/M_po_sample');
        $this->load->model('M_marketing/M_sppb');
        $this->load->model('M_master/M_master_barang');
        $this->load->model('M_gudang/M_gudang_sample/M_sample_masuk');
        $this->load->model('M_gudang/M_gudang_barang/M_barang_masuk/M_barang_masuk');
        $this->load->model('M_master/M_master_customer');
        $this->load->model('M_users');

    }

    private function convertDate($date)
    {
        return explode('/', $date)[2]."-".explode('/', $date)[1]."-".explode('/', $date)[0];
	}
	public function index()
	{

        $tgl = $this->input->get('date_from');
        $tgl2 = $this->input->get('date_until');
        $nama_barang = $this->input->get('nama_barang');
        $nama_customer = $this->input->get('nama_customer');



		// $data['row'] = $this->customer_m->get();
		$data['result'] = $this->M_po_sample->get();
        $data['res_barang'] = $this->M_barang_masuk->get3()->result_array();
        $data['res_customer'] = $this->M_master_customer->get()->result_array();
        $data['res_user'] = $this->M_users->get()->result_array();
        $data['res_sample'] = $this->M_sample_masuk->get4()->result_array();
        $data['res_gud'] = $this->M_sample_masuk->get5()->result_array();
        $data['res_barang_gud'] = $this->M_sample_masuk->get6()->result_array();

        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;
        $data['nama_barang'] = $nama_barang;
        $data['nama_customer'] = $nama_customer;
        // echo json_encode($data['res_barang_gud']);
		$this->template->load('template', 'content/marketing/po_sample',$data);
        // print_r($data);

	}

	public function add()
	{
		$data['no_po'] = $this->input->post('no_po',TRUE);
        $data['tgl_po_sample'] = $this->convertDate($this->input->post('tgl_po_sample',TRUE));
        $data['id_customer'] = $this->input->post('id_customer',TRUE);
        $data['id_barang'] = $this->input->post('id_barang',TRUE);
        // $data['kode_tf_in'] = $this->input->post('kode_tf_in',TRUE);
        $data['jumlah_po_sample'] = $this->input->post('jumlah_po_sample',TRUE);
        $data['jumlah_po_sample'] = str_replace('.', '', $data['jumlah_po_sample']); // Hapus titik pemisah ribuan
        $data['ket_po_sample'] = $this->input->post('ket_po_sample',TRUE);
        $data['mkt_admin'] = $this->input->post('mkt_admin',TRUE);

        $respon = $this->M_po_sample->add($data);

        if($respon){
        	header('location:'.base_url('marketing/po_sample').'?alert=success&msg=Selamat anda berhasil menambah PO Customer');
        }else{
        	header('location:'.base_url('marketing/po_sample').'?alert=danger&msg=Maaf anda gagal menambah PO Customer');
        }
	}

    public function add2()
	{
		$data['no_po'] = $this->input->post('no_po',TRUE);
        $data['tgl_po_sample'] = $this->convertDate($this->input->post('tgl_po_sample',TRUE));
        $data['id_customer'] = $this->input->post('id_customer',TRUE);
        $data['id_barang'] = $this->input->post('id_barang',TRUE);
        $data['jumlah_po_sample'] = $this->input->post('jumlah_po_sample',TRUE);
        $data['jumlah_po_sample'] = str_replace('.', '', $data['jumlah_po_sample']); // Hapus titik pemisah ribuan
        $data['ket_po_sample'] = $this->input->post('ket_po_sample',TRUE);
        $data['mkt_admin'] = $this->input->post('mkt_admin',TRUE);

        $respon = $this->M_po_sample->add2($data);

        if($respon){
        	header('location:'.base_url('marketing/po_sample').'?alert=success&msg=Selamat anda berhasil menambah PO Customer');
        }else{
        	header('location:'.base_url('marketing/po_sample').'?alert=danger&msg=Maaf anda gagal menambah PO Customer');
        }
	}

	public function update()
	{
        $data['id_mkt_po_sample'] = $this->input->post('id_mkt_po_sample',TRUE);
        $data['tgl_po_sample'] = $this->convertDate($this->input->post('tgl_po_sample',TRUE));
        $data['id_customer'] = $this->input->post('id_customer',TRUE);
        $data['id_barang'] = $this->input->post('id_barang',TRUE);
        $data['jumlah_po_sample'] = $this->input->post('jumlah_po_sample',TRUE);
        $data['ket_po_sample'] = $this->input->post('ket_po_sample',TRUE);
        $data['mkt_admin'] = $this->input->post('mkt_admin',TRUE);
        
        $respon = $this->M_po_sample->update($data);
		// echo $respon;
        if($respon){
        	header('location:'.base_url('marketing/po_sample').'?alert=success&msg=Selamat anda berhasil meng-update PO Customer');
        }else{
        	header('location:'.base_url('marketing/po_sample').'?alert=danger&msg=Maaf anda gagal meng-update PO Customer');
        }
	}
	public function delete($id_mkt_po_sample)
	{
		$data['id_mkt_po_sample'] = $id_mkt_po_sample;
        $respon = $this->M_po_sample->delete($data);

        if($respon){
        	header('location:'.base_url('marketing/po_sample').'?alert=success&msg=Selamat anda berhasil menghapus PO Customer');
        }else{
        	header('location:'.base_url('marketing/po_sample').'?alert=danger&msg=Maaf anda gagal menghapus PO Customer');
        }
	}

    public function cek_no_po(){
        $no_po = $this->input->post('no_po',TRUE);

        $row = $this->M_po_customer->cek_no_po($no_po)->row_array();
        if ($row['count_np'] == 0) {
            echo "false";
        }else{
            echo "true";
        }
    }

    // public function pdf_po_customer()
    // {
    //     $mpdf = new \Mpdf\Mpdf([
    //         'tempDir' => FCPATH . 'assets/tmp',
    //     ]);

    //     $tgl = $this->input->get('date_from');
    //     $tgl2 = $this->input->get('date_until');
    //     $nama_barang = $this->input->get('nama_barang');
    //     $nama_customer = $this->input->get('nama_customer');

	// 	$data['result'] = $this->M_po_customer->get($tgl, $tgl2, $nama_barang, $nama_customer);
    //     $data['res_barang'] = $this->M_master_barang->get()->result_array();
    //     $data['res_customer'] = $this->M_master_customer->get()->result_array();
    //     $data['res_user'] = $this->M_users->get()->result_array();

    //     $data['tgl'] = $tgl;
    //     $data['tgl2'] = $tgl2;
    //     $data['nama_barang'] = $nama_barang;
    //     $data['nama_customer'] = $nama_customer;


    //     $d = $this->load->view('content/marketing/page_po_customer', $data, TRUE);
    //     ob_clean();
    //     header('Content-Type: application/pdf');
    //     $mpdf->AddPage("P","","","","","15","15","5","15","","","","","","","","","","","","A4");
    //     $mpdf->setFooter('Halaman {PAGENO}');
    //     $mpdf->WriteHTML($d);
    //     $mpdf->Output();
    // }

public function pdf_po_customer()
{
    // === 1. Setup Dompdf options ===
    $options = new \Dompdf\Options();
        $options->set('isRemoteEnabled', false); // ⚡ Pakai file lokal biar cepat
        $options->set('isFontSubsettingEnabled', false);
        $options->set('defaultFont', 'Helvetica');
        $options->set('enable_font_subsetting', true);
        $options->set('dpi', 90);
        $options->set('chroot', FCPATH);
        $options->set('fontCache', FCPATH . 'application/cache/dompdf/');
        $options->set('tempDir', FCPATH . 'application/cache/dompdf/');
    $dompdf = new \Dompdf\Dompdf($options);

    // === 2. Ambil input filter ===
    $tgl = $this->input->get('date_from');
    $tgl2 = $this->input->get('date_until');
    $nama_barang = $this->input->get('nama_barang');
    $nama_customer = $this->input->get('nama_customer');

    // === 3. Ambil data dari model ===
    $data['result'] = $this->M_po_customer->get($tgl, $tgl2, $nama_barang, $nama_customer);
    $data['res_barang'] = $this->M_master_barang->get()->result_array();
    $data['res_customer'] = $this->M_master_customer->get()->result_array();
    $data['res_user'] = $this->M_users->get()->result_array();

    $data['tgl'] = $tgl;
    $data['tgl2'] = $tgl2;
    $data['nama_barang'] = $nama_barang;
    $data['nama_customer'] = $nama_customer;

    // echo json_encode($data['result']);
    // === 4. Load view HTML ===
    $html = $this->load->view('content/marketing/page_po_customer', $data, TRUE);

    // === 5. Set ukuran kertas ===
    $dompdf->setPaper('A4', 'portrait');

    // === 6. Render ===
    $dompdf->loadHtml($html);
    $dompdf->render();

    // === 7. Tambah footer nomor halaman ===
    $canvas = $dompdf->getCanvas();
    $canvas->page_script(function ($pageNumber, $pageCount, $canvas, $fontMetrics) {
        $text = "Halaman $pageNumber dari $pageCount";
        $font = $fontMetrics->getFont("Helvetica", "normal");
        $size = 9;
        $width = $fontMetrics->getTextWidth($text, $font, $size);
        $canvas->text(550 - $width, 820, $text, $font, $size);
    });

    // === 8. Output ke browser ===
    $dompdf->stream("Laporan_PO_Customer.pdf", ["Attachment" => false]);
}


}