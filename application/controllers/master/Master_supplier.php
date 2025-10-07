<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_supplier extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_master/M_master_supplier');

    }

	public function index()
	{
		// $data['row'] = $this->supplier_m->get();
		$result = 
		$data['result'] = $this->M_master_supplier->get()->result_array();
		$this->template->load('template', 'content/master/master_supplier/master_supplier_data',$data);

	}

	public function add()
	{
		$data['kode_supplier'] = $this->input->post('kode_supplier',TRUE);
        $data['nama_supplier'] = $this->input->post('nama_supplier',TRUE);
        $data['alamat_supplier'] = $this->input->post('alamat_supplier',TRUE);
        $data['negara_asal'] = $this->input->post('negara_asal',TRUE);
        $data['pic_supplier'] = $this->input->post('pic_supplier',TRUE);
        $data['no_sertif_halal'] = $this->input->post('no_sertif_halal',TRUE);
        $respon = $this->M_master_supplier->add($data);

        if($respon){
        	header('location:'.base_url('master/master_supplier').'?alert=success&msg=Selamat anda berhasil menambah supplier');
        }else{
        	header('location:'.base_url('master/master_supplier').'?alert=success&msg=Maaf anda gagal menambah supplier');
        }
	}
	public function update()
	{
		$data['id_supplier'] = $this->input->post('id_supplier',TRUE);
		$data['kode_supplier'] = $this->input->post('kode_supplier',TRUE);
        $data['nama_supplier'] = $this->input->post('nama_supplier',TRUE);
        $data['alamat_supplier'] = $this->input->post('alamat_supplier',TRUE);
        $data['negara_asal'] = $this->input->post('negara_asal',TRUE);
        $data['pic_supplier'] = $this->input->post('pic_supplier',TRUE);
        $data['no_sertif_halal'] = $this->input->post('no_sertif_halal',TRUE);
        $respon = $this->M_master_supplier->update($data);
        // echo $respon;
        if($respon){
        	header('location:'.base_url('master/master_supplier').'?alert=success&msg=Selamat anda berhasil meng-update supplier');
        }else{
        	header('location:'.base_url('master/master_supplier').'?alert=success&msg=Maaf anda gagal meng-update supplier');
        }
	}
	public function delete($id_supplier)
	{
		$data['id_supplier'] = $id_supplier;
        $respon = $this->M_master_supplier->delete($data);

        if($respon){
        	header('location:'.base_url('master/master_supplier').'?alert=success&msg=Selamat anda berhasil menghapus supplier');
        }else{
        	header('location:'.base_url('master/master_supplier').'?alert=success&msg=Maaf anda gagal menghapus supplier');
        }
	}

	public function cek_kode_supplier(){
        $kode_supplier = $this->input->post('kode_supplier',TRUE);

        $row = $this->M_master_supplier->cek_kode_supplier($kode_supplier)->row_array();
        if ($row['count_ks']==0) {
            echo "false";
        }else{
            echo "true";
        }
    }

    public function pdf_vendor_list()
    {
        $mpdf = new \Mpdf\Mpdf();

        $data['result'] = $this->M_master_supplier->get()->result_array();

        $d = $this->load->view('content/master/master_supplier/pdf_vendor_list', $data, TRUE);
        $mpdf->AddPage("P","","","","","15","15","5","15","","","","","","","","","","","","A4");
        $mpdf->setFooter('Halaman {PAGENO}');
        $mpdf->WriteHTML($d);
        $mpdf->Output();
    }

}
