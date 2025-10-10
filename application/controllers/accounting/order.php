<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once FCPATH . 'vendor/autoload.php'; // pastikan ini ditambahkan di awal file
class Order extends MY_Controller {

 public function __construct() {
        parent::__construct();
        $this->load->model('M_accounting/M_invoice');
        $this->load->model('M_gudang/M_gudang_barang/M_barang_masuk/M_barang_masuk');
        $this->load->model('M_users');
            $this->load->model('M_marketing/M_po_customer');
            $this->load->model('M_marketing/M_sppb');
            $this->load->model('M_master/M_master_customer');
            $this->load->model('M_master/M_master_barang');
            // Load M_invoice_item model if it exists
        // Remove M_invoice_item since it doesn't exist
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
		$data['result'] = $this->M_po_customer->get($tgl, $tgl2, $nama_barang, $nama_customer);
            for($i=0; $i<count($data['result']);$i++){
            $d['id_mkt_po_customer'] = $data['result'][$i]['id_mkt_po_customer'];
            $jml_sppb = $this->M_sppb->jml_sppb($d)->row_array();
            // $a=0;
            // for($o=0; $o<count($donasi);$o++){
            //     $a+=$donasi[$o]['donasi'];
            // }
            $sisa=$data['result'][$i]['jumlah_po_customer']-$jml_sppb['tot_sppb'];
            $data['result'][$i]['tot_sppb']=$jml_sppb['tot_sppb'];
            $data['result'][$i]['sisa']=$sisa;
        }
        foreach ($data['result'] as &$row) {
            $row['is_invoice_exist'] = $this->M_invoice->is_invoice_exist($row['id_mkt_po_customer']);
        }
        $data['res_barang'] = $this->M_barang_masuk->get3()->result_array();
        $data['res_customer'] = $this->M_master_customer->get()->result_array();
        $data['res_user'] = $this->M_users->get()->result_array();

        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;
        $data['nama_barang'] = $nama_barang;
        $data['nama_customer'] = $nama_customer;
		// $this->template->load('template', 'content/marketing/po_customer',$data);
        // print_r($data);
      $this->template->load('template','content/accounting/order_data', $data);
    }

    public function add() {
        $data['id_mkt_po_customer'] = $this->input->post('id_mkt_po_customer', TRUE);
        $data['tgl_invoice'] = $this->convertDate($this->input->post('tgl_invoice',TRUE));
        $data['no_invoice'] = $this->input->post('no_invoice', TRUE);
        $data['op_acc'] = $this->input->post('op_acc', TRUE);

        $respon = $this->M_invoice->add($data);
		// echo $respon;
        if($respon){
        	header('location:'.base_url('accounting/order').'?alert=success&msg=Selamat anda berhasil Menambahkan data invoice');
        }else{
        	header('location:'.base_url('accounting/order').'?alert=danger&msg=Maaf anda gagal menambahkan invoice');
        }
    }
}