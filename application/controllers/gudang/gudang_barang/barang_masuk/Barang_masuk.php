<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_masuk extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_gudang/M_gudang_barang/M_barang_masuk/M_barang_masuk');
        $this->load->model('M_gudang/M_gudang_barang/M_barang_keluar/M_barang_keluar');
        $this->load->model('M_marketing/M_sppb');
        $this->load->model('M_purchasing/M_po_pembelian');
        $this->load->model('M_master/M_master_barang');
        $this->load->model('M_master/M_master_supplier');

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
        $no_batch = $this->input->get('no_batch');

		// $data['row'] = $this->customer_m->get();
		$data['result'] = $this->M_barang_masuk->get($tgl, $tgl2, $nama_barang, $no_batch);
        // for($i=0; $i<count($data['result']);$i++){
        //     $d['kode_tf_in'] = $data['result'][$i]['kode_tf_in'];
        //     $jml_sppb = $this->M_sppb->jml_sppb_keluar($d)->row_array();
        //     // $a=0;
        //     // for($o=0; $o<count($donasi);$o++){
        //     //     $a+=$donasi[$o]['donasi'];
        //     // }
        //     $stok=$data['result'][$i]['qty_in']-$jml_sppb['tot_sppb'];
        //     $data['result'][$i]['tot_sppb']=$jml_sppb['tot_sppb'];
        //     $data['result'][$i]['stok']=$stok;

        $data['res_batch'] = $this->M_barang_masuk->get2()->result_array();
        $data['res_barang'] = $this->M_master_barang->get()->result_array();
        $data['res_supplier'] = $this->M_master_supplier->get()->result_array();

        
        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;
        $data['nama_barang'] = $nama_barang;
        $data['no_batch'] = $no_batch;

		$this->template->load('template', 'content/gudang/gudang_barang/barang_masuk/barang_masuk_data',$data);
        // print_r($data);

	}

        public function pdf_barang_masuk()
    {
        $mpdf = new \Mpdf\Mpdf();

        $tgl = $this->input->get('date_from');
        $tgl2 = $this->input->get('date_until');
        $nama_barang = $this->input->get('nama_barang');
        $no_batch = $this->input->get('no_batch');

		// $data['row'] = $this->customer_m->get();
		$data['result'] = $this->M_barang_masuk->get($tgl, $tgl2, $nama_barang, $no_batch);
        // for($i=0; $i<count($data['result']);$i++){
        //     $d['kode_tf_in'] = $data['result'][$i]['kode_tf_in'];
        //     $jml_sppb = $this->M_sppb->jml_sppb_keluar($d)->row_array();
        //     // $a=0;
        //     // for($o=0; $o<count($donasi);$o++){
        //     //     $a+=$donasi[$o]['donasi'];
        //     // }
        //     $stok=$data['result'][$i]['qty_in']-$jml_sppb['tot_sppb'];
        //     $data['result'][$i]['tot_sppb']=$jml_sppb['tot_sppb'];
        //     $data['result'][$i]['stok']=$stok;
    
        $data['res_barang'] = $this->M_master_barang->get()->result_array();
        $data['res_supplier'] = $this->M_master_supplier->get()->result_array();

        
        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;
        $data['nama_barang'] = $nama_barang;
        $data['no_batch'] = $no_batch;

        $d = $this->load->view('content/gudang/gudang_barang/barang_masuk/pdf_barang_masuk', $data, TRUE);
        $mpdf->AddPage("P","","","","","15","15","5","15","","","","","","","","","","","","A4");
        $mpdf->setFooter('Halaman {PAGENO}');
        $mpdf->WriteHTML($d);
        $mpdf->Output();
    }

}
