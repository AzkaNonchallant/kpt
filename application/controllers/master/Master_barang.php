<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    require_once FCPATH . 'vendor/autoload.php';


class Master_barang extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_master/M_master_barang');
        $this->load->model('M_master/M_master_supplier');

    }

	public function index()
	{
		// $data['row'] = $this->customer_m->get();
		$data['result'] = $this->M_master_barang->get()->result_array();
        $data['res_supplier'] = $this->M_master_supplier->get()->result_array();
		$this->template->load('template', 'content/master/master_barang/master_barang_data',$data);
        // print_r($data);

	}

	public function add()
	{
		$data['kode_barang'] = $this->input->post('kode_barang',TRUE);
        $data['kode_barang_bpom'] = $this->input->post('kode_barang_bpom',TRUE);
        $data['nama_barang'] = $this->input->post('nama_barang',TRUE);
        $data['mesh'] = $this->input->post('mesh',TRUE);
        $data['satuan'] = $this->input->post('satuan',TRUE);
        $data['bloom'] = $this->input->post('bloom',TRUE);
        $data['id_supplier'] = $this->input->post('id_supplier',TRUE);
        $respon = $this->M_master_barang->add($data);

        if($respon){
        	header('location:'.base_url('master/master_barang').'?alert=success&msg=Selamat anda berhasil menambah barang');
        }else{
        	header('location:'.base_url('master/master_barang').'?alert=success&msg=Maaf anda gagal menambah barang');
        }
	}
	public function update()
	{
		$data['id_barang'] = $this->input->post('id_barang',TRUE);
		$data['kode_barang'] = $this->input->post('kode_barang',TRUE);
        $data['nama_barang'] = $this->input->post('nama_barang',TRUE);
        $data['mesh'] = $this->input->post('mesh',TRUE);
        $data['satuan'] = $this->input->post('satuan',TRUE);
        $data['bloom'] = $this->input->post('bloom',TRUE);
        $data['id_supplier'] = $this->input->post('id_supplier',TRUE);
        $respon = $this->M_master_barang->update($data);
		// echo $respon;
        if($respon){
        	header('location:'.base_url('master/master_barang').'?alert=success&msg=Selamat anda berhasil meng-update customer');
        }else{
        	header('location:'.base_url('master/master_barang').'?alert=success&msg=Maaf anda gagal meng-update customer');
        }
	}

	public function delete($id_barang)
	{
		$data['id_barang'] = $id_barang;
        $respon = $this->M_master_barang->delete($data);

        if($respon){
        	header('location:'.base_url('master/master_barang').'?alert=success&msg=Selamat anda berhasil menghapus barang');
        }else{
        	header('location:'.base_url('master/master_barang').'?alert=success&msg=Maaf anda gagal menghapus barang');
        }
	}

	public function cek_kode_barang(){
        $kode_barang = $this->input->post('kode_barang',TRUE);

        $row = $this->M_master_barang->cek_kode_barang($kode_barang)->row_array();
        if ($row['count_kb']==0) {
            echo "false";
        }else{
            echo "true";
        }
    }

    // public function pdf_daftar_barang()
    // {
    //     $mpdf = new \Mpdf\Mpdf();

    //     $data['result'] = $this->M_master_barang->get()->result_array();

    //     $d = $this->load->view('content/master/master_barang/pdf_daftar_barang', $data, TRUE);
    //     $mpdf->AddPage("P","","","","","15","15","5","15","","","","","","","","","","","","A4");
    //     $mpdf->setFooter('Halaman {PAGENO}');
    //     $mpdf->WriteHTML($d);
    //     $mpdf->Output();
    // }


public function pdf_daftar_barang()
{
    // 1️⃣ Load library Dompdf
    
    // 2️⃣ Konfigurasi dasar Dompdf
    $options = new Dompdf\Options();
    $options->set('isHtml5ParserEnabled', true);
    // $options->set('isRemoteEnabled', true); // biar bisa load gambar/logo
    $options->set('isRemoteEnabled', false); // ⚡ Pakai file lokal biar cepat
        $options->set('isFontSubsettingEnabled', false);
        $options->set('defaultFont', 'Helvetica');
        $options->set('enable_font_subsetting', true);
        $options->set('dpi', 99);
        $options->set('chroot', FCPATH);
        $options->set('fontCache', FCPATH . 'application/cache/dompdf/');
        $options->set('tempDir', FCPATH . 'application/cache/dompdf/');
    $dompdf = new Dompdf\Dompdf($options);

    // 3️⃣ Ambil data dari model
    $data['result'] = $this->M_master_barang->get()->result_array();

    // 4️⃣ Render tampilan HTML ke string
    $html = $this->load->view('content/master/master_barang/pdf_daftar_barang', $data, TRUE);

    // 5️⃣ Load HTML ke Dompdf
    $dompdf->loadHtml($html);

    // 6️⃣ Set ukuran dan orientasi halaman (P = Portrait)
    $dompdf->setPaper('A4', 'landscape');

    // 7️⃣ Render ke PDF
    $dompdf->render();

    // 8️⃣ Tambah nomor halaman (footer seperti mPDF)
    // $canvas = $dompdf->getCanvas();
    // $font = $dompdf->getFontMetrics()->get_font("Helvetica", "normal");
    // $canvas->page_text(520, 820, "Halaman {PAGE_NUM}", $font, 9, array(0, 0, 0));

    // 9️⃣ Output PDF ke browser
    $dompdf->stream("daftar_barang.pdf", array("Attachment" => false));
}



}
