<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once FCPATH . 'vendor/autoload.php'; // pastikan ini ditambahkan di awal file

class admin_sppb extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_marketing/M_sppb');
        $this->load->model('M_gudang/M_gudang_admin/M_admin_sppb');
        $this->load->model('M_marketing/M_po_customer');
        $this->load->model('M_master/M_master_barang');
        $this->load->model('M_master/M_master_customer');
        $this->load->model('M_gudang/M_gudang_barang/M_barang_keluar/M_barang_keluar');
        $this->load->model('M_users');

    }
    private function convertDate($date)
    {
        return explode('/', $date)[2]."-".explode('/', $date)[1]."-".explode('/', $date)[0];
    }
	public function index()
	{
		// $data['row'] = $this->customer_m->get();
		$data['result'] = $this->M_sppb->get_sppb()->result_array();
        $data['res_barang'] = $this->M_master_barang->get()->result_array();
        $data['res_customer'] = $this->M_master_customer->get()->result_array();
        $data['res_po'] = $this->M_po_customer->get_no_po()->result_array();
        for($i=0; $i<count($data['res_po']);$i++){
            $d['id_mkt_po_customer'] = $data['res_po'][$i]['id_mkt_po_customer'];
            $jml_sppb = $this->M_sppb->jml_sppb($d)->row_array();
            // $a=0;
            // for($o=0; $o<count($donasi);$o++){
            //     $a+=$donasi[$o]['donasi'];
            // }
            $sisa=$data['res_po'][$i]['jumlah_po_customer']-$jml_sppb['tot_sppb'];
            $data['res_po'][$i]['tot_sppb']=$jml_sppb['tot_sppb'];
            $data['res_po'][$i]['sisa']=$sisa;
        }
        $data['res_user'] = $this->M_users->get()->result_array();
        // echo json_encode($data['result']);
    
		$this->template->load('template', 'content/gudang/gudang_admin/admin_sppb_data',$data);
        // print_r($data);
	}

	public function add()
	{
        $data['no_sppb'] = $this->input->post('no_sppb',TRUE);
        $data['tgl_sppb'] = $this->convertDate($this->input->post('tgl_sppb',TRUE));
        $data['id_mkt_po_customer'] = $this->input->post('id_mkt_po_customer',TRUE);
        $data['tgl_kirim'] = $this->convertDate($this->input->post('tgl_kirim',TRUE));
        $data['jumlah_kirim'] = $this->input->post('jumlah_kirim',TRUE);
        $data['note_gudang'] = $this->input->post('note_gudang',TRUE);
        $data['harga_kirim'] = $this->input->post('harga_kirim',TRUE);
        $data['note_pembayaran'] = $this->input->post('note_pembayaran',TRUE);
        $data['mkt_admin'] = $this->input->post('mkt_admin',TRUE);
        $respon = $this->M_sppb->add($data);
        //  $response = $this->M_barang_keluar->add_surat_jalan($data);
        if($respon){
        	header('location:'.base_url('gudang/gudang_admin/admin_sppb').'?alert=success&msg=Barang Berhasil di Kirim');
        }else{
        	header('location:'.base_url('gudang/gudang_admin/admin_sppb').'?alert=danger&msg=Maaf anda gagal menambah SPPB');
        }
	}
	public function update()
	{
        $data['id_mkt_sppb'] = $this->input->post('id_mkt_sppb',TRUE);
        $data['no_sppb'] = $this->input->post('no_sppb',TRUE);
        $data['tgl_sppb'] = $this->convertDate($this->input->post('tgl_sppb',TRUE));
        $data['id_mkt_po_customer'] = $this->input->post('id_mkt_po_customer',TRUE);
        $data['tgl_kirim'] = $this->convertDate($this->input->post('tgl_kirim',TRUE));
        $data['jumlah_kirim'] = $this->input->post('jumlah_kirim',TRUE);
        $data['note_gudang'] = $this->input->post('note_gudang',TRUE);
        $data['harga_kirim'] = $this->input->post('harga_kirim',TRUE);
        $data['note_pembayaran'] = $this->input->post('note_pembayaran',TRUE);
        $data['mkt_admin'] = $this->input->post('mkt_admin',TRUE);
        
        $respon = $this->M_sppb->update($data);
		// echo $respon;
        if($respon){
        	header('location:'.base_url('gudang/gudang_admin/admin_sppb').'?alert=success&msg=Selamat anda berhasil meng-update SPPB');
        }else{
        	header('location:'.base_url('gudang/gudang_admin/admin_sppb').'?alert=danger&msg=Maaf anda gagal meng-update SPPB');
        }
	}
	public function delete($id_mkt_sppb)
	{
		$data['id_mkt_sppb'] = $id_mkt_sppb;
        $respon = $this->M_sppb->delete($data);

        if($respon){
        	header('location:'.base_url('gudang/gudang_admin/admin_sppb').'?alert=success&msg=Selamat anda berhasil menghapus SPPB');
        }else{
        	header('location:'.base_url('gudang/gudang_admin/admin_sppb').'?alert=danger&msg=Maaf anda gagal menghapus SPPB');
        }
	}

    public function cek_no_sppb(){
        $no_sppb = $this->input->post('no_sppb',TRUE);

        $row = $this->M_sppb->cek_no_sppb($no_sppb)->row_array();
        if ($row['count_ns']==0) {
            echo "false";
        }else{
            echo "true";
        }
    }

    public function cek_kode_tf_out() {
        $kode_tf_out = $this->input->post('kode_tf_out', TRUE);
        $row = $this->M_admin_sppb->cek_kode_tf_out($kode_tf_out)->row_array();
         if ($row['count_ns'] == 0) {
            echo "false";
        }else{
            echo "true";
        }
    }

    public function pdf_sppb_gudang($no_sppb = null)
    {
        $no_sppb = str_replace("--", "/", $no_sppb);
        $mpdf = new \Mpdf\Mpdf([
            'tempDir' => FCPATH . 'assets/tmp',
        ]);

        $data['detail'] = $this->M_sppb->ambil_detail($no_sppb)->result_array();

        $d = $this->load->view('content/marketing/pdf/pdf_sppb_gudang', $data, TRUE);
        $mpdf->AddPage("P", "", "", "", "", "15", "15", "5", "15", "", "", "", "", "", "", "", "", "", "", "", "A4");
        $mpdf->WriteHTML($d);
        $mpdf->Output();
    }

}