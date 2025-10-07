<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_customer extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_master/M_master_customer');

    }

	public function index()
	{
		// $data['row'] = $this->customer_m->get();
		$result = 
		$data['result'] = $this->M_master_customer->get()->result_array();
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

    public function pdf_customer_list()
    {
        $mpdf = new \Mpdf\Mpdf();

        $data['result'] = $this->M_master_customer->get()->result_array();

        $d = $this->load->view('content/master/master_customer/pdf_customer_list', $data, TRUE);
        $mpdf->AddPage("P","","","","","15","15","5","15","","","","","","","","","","","","A4");
        $mpdf->setFooter('Halaman {PAGENO}');
        $mpdf->WriteHTML($d);
        $mpdf->Output();
    }

}
