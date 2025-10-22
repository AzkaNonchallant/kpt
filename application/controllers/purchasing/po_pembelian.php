<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once FCPATH . 'vendor/autoload.php'; // pastikan ini ditambahkan di awal file


class Po_pembelian extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_purchasing/M_po_pembelian');
        $this->load->model('M_master/M_master_barang');
        $this->load->model('M_master/M_master_supplier');
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
        $nama_supplier = $this->input->get('nama_supplier');


		// $data['row'] = $this->supplier_m->get();
		$data['result'] = $this->M_po_pembelian->get($tgl, $tgl2, $nama_barang, $nama_supplier);
        $data['res_barang'] = $this->M_master_barang->get()->result_array();
        $data['res_supplier'] = $this->M_master_supplier->get()->result_array();
        $data['res_user'] = $this->M_users->get()->result_array();

        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;
        $data['nama_barang'] = $nama_barang;
        $data['nama_supplier'] = $nama_supplier;
        // echo json_encode($data['result']);
		$this->template->load('template', 'content/purchasing/po_pembelian',$data);
        // print_r($data);

	}

	public function add()
	{
		$data['no_po_pembelian'] = $this->input->post('no_po_pembelian',TRUE);
        $data['tgl_po_pembelian'] = $this->convertDate($this->input->post('tgl_po_pembelian',TRUE));
        $data['id_barang'] = $this->input->post('id_barang',TRUE);
        $data['jumlah_po_pembelian'] = $this->input->post('jumlah_po_pembelian',TRUE);
        $data['jumlah_po_pembelian'] = str_replace('.', '', $data['jumlah_po_pembelian']); // Hapus titik pemisah ribuan
        $data['harga_po_pembelian'] = $this->input->post('harga_po_pembelian',TRUE);
        $data['harga_po_pembelian'] = str_replace('.', '', $data['harga_po_pembelian']); // Hapus titik pemisah ribuan
        $data['jenis_pembayaran'] = $this->input->post('jenis_pembayaran',TRUE);
        $data['ket_po'] = $this->input->post('ket_po', TRUE);
        $data['prc_admin'] = $this->input->post('prc_admin',TRUE);

        $respon = $this->M_po_pembelian->add($data);

        if($respon){
        	header('location:'.base_url('purchasing/po_pembelian').'?alert=success&msg=Selamat anda berhasil menambah PO Pembelian');
        }else{
        	header('location:'.base_url('purchasing/po_pembelian').'?alert=danger&msg=Maaf anda gagal menambah PO Pembelian');
        }
	}

	public function update()
	{
        $data['id_prc_po_pembelian'] = $this->input->post('id_prc_po_pembelian',TRUE);
		$data['no_po_pembelian'] = $this->input->post('no_po_pembelian',TRUE);
        $data['tgl_po_pembelian'] = $this->convertDate($this->input->post('tgl_po_pembelian',TRUE));
        $data['id_supplier'] = $this->input->post('id_supplier',TRUE);
        $data['id_barang'] = $this->input->post('id_barang',TRUE);
        $data['jumlah_po_pembelian'] = $this->input->post('jumlah_po_pembelian',TRUE);
        $data['jumlah_po_pembelian'] = str_replace('.', '', $data['jumlah_po_pembelian']); // Hapus titik pemisah ribuan
        $data['harga_po_pembelian'] = $this->input->post('harga_po_pembelian',TRUE);
        $data['harga_po_pembelian'] = str_replace('.', '', $data['harga_po_pembelian']); // Hapus titik pemisah ribuan
        $data['jenis_pembayaran'] = $this->input->post('jenis_pembayaran',TRUE);
        $data['ket_po'] = $this->input->post('ket_po', TRUE);
        $data['prc_admin'] = $this->input->post('prc_admin',TRUE);
        
        $respon = $this->M_po_pembelian->update($data);
		// echo $respon;
        if($respon){
        	header('location:'.base_url('purchasing/po_pembelian').'?alert=success&msg=Selamat anda berhasil meng-update PO Pembelian');
        }else{
        	header('location:'.base_url('purchasing/po_pembelian').'?alert=danger&msg=Maaf anda gagal meng-update PO Pembelian');
        }
	}
    
	public function delete($id_prc_po_pembelian)
	{
		$data['id_prc_po_pembelian'] = $id_prc_po_pembelian;
        $respon = $this->M_po_pembelian->delete($data);

        if($respon){
        	header('location:'.base_url('purchasing/po_pembelian').'?alert=success&msg=Selamat anda berhasil menghapus PO Pembelian');
        }else{
        	header('location:'.base_url('purchasing/po_pembelian').'?alert=danger&msg=Maaf anda gagal menghapus PO Pembelian');
        }
	}

    public function cek_no_po_pembelian(){
        $no_po_pembelian = $this->input->post('no_po_pembelian',TRUE);

        $row = $this->M_po_pembelian->cek_no_po_pembelian($no_po_pembelian)->row_array();
        if ($row['count_np']==0) {
            echo "false";
        }else{
            echo "true";
        }
    }

    public function pdf_po_pembelian()
{
    // Load Dompdf
    // $this->load->library('dompdf_gen'); // pastikan kamu sudah buat autoloader atau helper-nya
    $options = new \Dompdf\Options();
        $options->set('isRemoteEnabled', true); // ⚡ Pakai file lokal biar cepat
        $options->set('isFontSubsettingEnabled', false);
        $options->set('defaultFont', 'Helvetica');
        $options->set('enable_font_subsetting', true);
        $options->set('dpi', 87);
        $options->set('chroot', FCPATH);
        $options->set('fontCache', FCPATH . 'application/cache/dompdf/');
        $options->set('tempDir', FCPATH . 'application/cache/dompdf/');

    // Ambil input filter
    $tgl = $this->input->get('date_from');
    $tgl2 = $this->input->get('date_until');
    $nama_barang = $this->input->get('nama_barang');
    $nama_supplier = $this->input->get('nama_supplier');

    // Ambil data dari model
    $data['result'] = $this->M_po_pembelian->get($tgl, $tgl2, $nama_barang, $nama_supplier);
    $data['res_barang'] = $this->M_master_barang->get()->result_array();
    $data['res_supplier'] = $this->M_master_supplier->get()->result_array();
    $data['res_user'] = $this->M_users->get()->result_array();

    $data['tgl'] = $tgl;
    $data['tgl2'] = $tgl2;
    $data['nama_barang'] = $nama_barang;
    $data['nama_supplier'] = $nama_supplier;

    // Load tampilan ke variabel HTML
    $html = $this->load->view('content/purchasing/pdf_po_pembelian', $data, TRUE);


    // Inisialisasi Dompdf
    $dompdf = new Dompdf\Dompdf($options);

    // Load HTML ke Dompdf
    $dompdf->loadHtml($html);

    // Setting ukuran & orientasi kertas
    $dompdf->setPaper('A4', 'landscape');

    // Render HTML jadi PDF
    $dompdf->render();

    // Tambahkan footer halaman (opsional)
    $canvas = $dompdf->getCanvas();
    $font = $dompdf->getFontMetrics()->get_font("Helvetica", "normal");
    $canvas->page_text(520, 810, "Halaman {PAGE_NUM}", $font, 9, array(0, 0, 0));

    // Output hasil ke browser
    $dompdf->stream("PO_Pembelian.pdf", array("Attachment" => false));
}


}