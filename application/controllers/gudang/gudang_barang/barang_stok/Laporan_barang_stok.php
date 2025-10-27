<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_barang_stok extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_gudang/M_gudang_barang/M_barang_masuk/M_laporan_barang_masuk');
        $this->load->model('M_gudang/M_gudang_barang/M_barang_masuk/M_barang_masuk');
        $this->load->model('M_gudang/M_gudang_barang/M_barang_keluar/M_barang_keluar');
        $this->load->model('M_master/M_master_barang', 'M_barang');
        $this->load->model('M_master/M_master_supplier', 'M_supplier');
    }

    private function convertDate($date)
    {
        return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
    }

    public function index()
    {
        $id_barang = $this->input->get('id_barang');

        $result = $this->M_laporan_barang_masuk->get($id_barang);
        $data['result'] = is_array($result) ? $result : $result->result_array();

        $res_batch = $this->M_barang_masuk->get();
        $data['res_batch'] = is_array($res_batch) ? $res_batch : $res_batch->result_array();

        $res_barang = $this->M_barang->get();
        $data['res_barang'] = is_array($res_barang) ? $res_barang : $res_barang->result_array();

        $res_supplier = $this->M_supplier->get();
        $data['res_supplier'] = is_array($res_supplier) ? $res_supplier : $res_supplier->result_array();

        $data['id_barang'] = $id_barang;

        $this->template->load('template', 'content/gudang/gudang_barang/barang_stok/laporan_barang_stok_data', $data);
    }

    // public function pdf_laporan_barang_masuk($tgl=null,$tgl2=null,$batch=null)
    // {
    //     $mpdf = new \Mpdf\Mpdf();

    //     $tgl = $this->input->get('date_from');
    //     $tgl2 = $this->input->get('date_until');
    //     $batch = $this->input->get('batch');

    //     $result = $this->M_laporan_barang_masuk->get($tgl,$tgl2,$batch);
    //     $data['result'] = is_array($result) ? $result : $result->result_array();

    //     for($i=0; $i<count($data['result']);$i++){
    //         $d['kode_tf_in'] = $data['result'][$i]['kode_tf_in'];
    //         $jml_barang_keluar = $this->M_barang_keluar->jml_barang_keluar($d);
    //         $jml_barang_keluar = is_array($jml_barang_keluar) ? $jml_barang_keluar : $jml_barang_keluar->row_array();
    //         $stok = $data['result'][$i]['qty'] - $jml_barang_keluar['tot_barang_keluar'];
    //         $data['result'][$i]['tot_barang_keluar'] = $jml_barang_keluar['tot_barang_keluar'];
    //         $data['result'][$i]['stok'] = $stok;
    //     }

    //     $res_barang = $this->M_barang->get();
    //     $data['res_barang'] = is_array($res_barang) ? $res_barang : $res_barang->result_array();

    //     $res_batch = $this->M_barang_masuk->get();
    //     $data['res_batch'] = is_array($res_batch) ? $res_batch : $res_batch->result_array();

    //     $res_supplier = $this->M_supplier->get();
    //     $data['res_supplier'] = is_array($res_supplier) ? $res_supplier : $res_supplier->result_array();

    //     $data['batch'] = $batch;
    //     $data['tgl'] = $tgl;
    //     $data['tgl2'] = $tgl2;

    //     $d = $this->load->view('laporan/barang_masuk/page_laporan_barang_masuk', $data, TRUE);
    //     $mpdf->AddPage("P","","","","","15","15","5","15","","","","","","","","","","","","A4");
    //     $mpdf->setFooter('Halaman {PAGENO}');
    //     $mpdf->WriteHTML($d);
    //     $mpdf->Output();
    // }

    // Fungsi add, update, delete tetap sama
    public function delete($id_barang_keluar)
    {
        $data['id_barang_keluar'] = str_replace('--', '/', $id_barang_keluar);
        $respon = $this->M_laporan_barang_keluar->delete($data);

        if ($respon) {
            header('location:' . base_url('gudang/gudang_barang/barang_keluar/laporan_barang_keluar') . '?alert=success&msg=Selamat anda berhasil menghapus barang Kelur');
        } else {
            header('location:' . base_url('gudang/gudang_barang/barang_keluar/laporan_barang_keluar') . '?alert=success&msg=Maaf anda gagal menghapus barang Kelur');
        };
    }
}