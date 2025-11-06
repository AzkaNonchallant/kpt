<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once FCPATH . 'vendor/autoload.php'; // pastikan ini ditambahkan di awal file


class Master_customer extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_master/M_master_customer');
        $this->load->model('M_master/M_master_barang');

    }

	public function index()
	{
		// $data['row'] = $this->customer_m->get();
		$data['result'] = $this->M_master_customer->get()->result_array();
        $data['res_barang'] = $this->M_master_barang->get()->result_array();
		$this->template->load('template', 'content/master/master_customer/master_customer_data',$data);

	}

	public function add()
	{
		$data['kode_customer'] = $this->input->post('kode_customer',TRUE);
        $data['nama_customer'] = $this->input->post('nama_customer',TRUE);
        $data['kegiatan_usaha'] = $this->input->post('kegiatan_usaha',TRUE);
        $data['alamat_customer'] = $this->input->post('alamat_customer',TRUE);
        $data['kota_kab'] = $this->input->post('kota_kab',TRUE);
        $data['provinsi'] = $this->input->post('provinsi',TRUE);
        $data['nib'] = $this->input->post('nib',TRUE);
        $respon = $this->M_master_customer->add($data);

        if($respon){
        	header('location:'.base_url('master/master_customer').'?alert=success&msg=Selamat anda berhasil menambah customer');
        }else{
        	header('location:'.base_url('master/master_customer').'?alert=success&msg=Maaf anda gagal menambah customer');
        }
	}
	public function update()
	{
		$data['id_customer'] = $this->input->post('id_customer',TRUE);
		$data['kode_customer'] = $this->input->post('kode_customer',TRUE);
        $data['nama_customer'] = $this->input->post('nama_customer',TRUE);
        $data['kegiatan_usaha'] = $this->input->post('kegiatan_usaha',TRUE);
        $data['alamat_customer'] = $this->input->post('alamat_customer',TRUE);
        $data['provinsi'] = $this->input->post('provinsi',TRUE);
        $data['kota_kab'] = $this->input->post('kota_kab',TRUE);
        $data['nib'] = $this->input->post('nib',TRUE);
        $respon = $this->M_master_customer->update($data);
		// echo $respon;
        if($respon){
        	header('location:'.base_url('master/master_customer').'?alert=success&msg=Selamat anda berhasil meng-update customer');
        }else{
        	header('location:'.base_url('master/master_customer').'?alert=success&msg=Maaf anda gagal meng-update customer');
        }
	}
	public function delete($id_customer)
	{
		$data['id_customer'] = $id_customer;
        $respon = $this->M_master_customer->delete($data);

        if($respon){
        	header('location:'.base_url('master/master_customer').'?alert=success&msg=Selamat anda berhasil menghapus customer');
        }else{
        	header('location:'.base_url('master/master_customer').'?alert=success&msg=Maaf anda gagal menghapus customer');
        }
	}

	public function cek_kode_customer(){
        $kode_customer = $this->input->post('kode_customer',TRUE);

        $row = $this->M_master_customer->cek_kode_customer($kode_customer)->row_array();
        if ($row['count_kc']==0) {
            echo "false";
        }else{
            echo "true";
        }
    }

    public function add_harga() {
        $data['id_customer'] = $this->input->post('id_customer',TRUE);
        $data['id_barang']  = $this->input->post('id_barang',TRUE);
        $data['harga']  = $this->input->post('harga',TRUE);
        $data['mkt_admin'] =  $this->input->post('mkt_admin',TRUE);

        $respon = $this->M_master_customer->add_harga($data);
        if($respon){
        	header('location:'.base_url('master/master_customer').'?alert=success&msg=Selamat anda berhasil menambah harga Customer');
        }else{
        	header('location:'.base_url('master/master_customer').'?alert=success&msg=Maaf anda gagal menambah Harga customer');
        }
    }


public function pdf_customer_list()
{
    // 1️⃣ Inisialisasi Dompdf
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

    // 2️⃣ Ambil data dari model
    $data['result'] = $this->M_master_customer->get()->result_array();

    // 3️⃣ Render view ke HTML string
    $html = $this->load->view('content/master/master_customer/pdf_customer_list', $data, TRUE);

    // 4️⃣ Set ukuran halaman (A4 potrait)
    $dompdf->setPaper('A4', 'landscape');

    // 5️⃣ Load HTML ke Dompdf
    $dompdf->loadHtml($html);

    // 6️⃣ Render HTML jadi PDF
    $dompdf->render();

    // // 7️⃣ Tambahkan nomor halaman di footer
    // $canvas = $dompdf->getCanvas();
    // $font = $dompdf->getFontMetrics()->get_font("helvetica", "normal");
    // $canvas->page_text(520, 820, "Halaman {PAGE_NUM} dari {PAGE_COUNT}", $font, 9, [0, 0, 0]);

    // 8️⃣ Output ke browser
    $dompdf->stream("Customer_List.pdf", ["Attachment" => false]);
}


}
