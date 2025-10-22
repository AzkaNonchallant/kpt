<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_sample extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_gudang/M_gudang_barang/M_barang_masuk/M_barang_masuk');
        $this->load->model('M_master/M_master_supplier');
        $this->load->model('M_master/M_master_customer');
        $this->load->model('M_gudang/M_gudang_sample/M_sample_masuk');
        $this->load->model('M_gudang/M_gudang_admin/M_admin_sample');
        $this->load->model('M_users');
    }

    private function convertDate($date)
    {
        $parts = explode('/', $date);

        if (count($parts) !== 3) {
            return null;
        }

        return $parts[2] . "-" . $parts[1] . "-" . $parts[0];
    }

    public function index()
    {
        $tgl = $this->input->get('date_from');
        $tgl2 = $this->input->get('date_until');
        $nama_barang = $this->input->get('nama_barang');
        $nama_supplier = $this->input->get('nama_supplier');

        $data['result'] = $this->M_admin_sample->get($tgl, $tgl2, $nama_barang, $nama_supplier);
        $data['res_barang'] = $this->M_barang_masuk->get3()->result_array();
        $data['res_supplier'] = $this->M_master_supplier->get()->result_array();
        $data['res_customer'] = $this->M_master_customer->get()->result_array();
        $data['res_user'] = $this->M_users->get()->result_array();
        $data['res_sample'] = $this->M_sample_masuk->get4()->result_array();

        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;
        $data['nama_barang'] = $nama_barang;
        $data['nama_supplier'] = $nama_supplier;
        
        $this->template->load('template', 'content/gudang/gudang_admin/admin_sample_data', $data);
    }

    public function proses()
    {
        $data['id_mkt_po_sample'] = $this->input->post('id_mkt_po_sample', TRUE);
        $data['tgl_masuk_sample'] = $this->convertDate($this->input->post('tgl_masuk_sample', TRUE));
        $data['id_customer'] = $this->input->post('id_customer', TRUE);
        $data['id_barang'] = $this->input->post('id_barang', TRUE);
        $data['kode_sample_in'] = $this->input->post('kode_sample_in', TRUE);
        $data['jumlah_masuk'] = $this->input->post('jumlah_masuk', TRUE);
        $data['jumlah_masuk'] = str_replace('.', '', $data['jumlah_masuk']);
        $data['ket_masuk'] = $this->input->post('ket_masuk', TRUE);
        $data['gudang_admin'] = $this->input->post('gudang_admin', TRUE);

        $respon = $this->M_admin_sample->proses($data);

        if($respon){
            header('location:'.base_url('gudang/gudang_admin/admin_sample').'?alert=success&msg=Selamat anda berhasil menambah PO Sample');
        }else{
            header('location:'.base_url('gudang/gudang_admin/admin_sample').'?alert=danger&msg=Maaf anda gagal menambah PO Sample');
        }
    }

    public function update()
    {
        $data['id_mkt_po_sample'] = $this->input->post('id_mkt_po_sample', TRUE);
        $data['tgl_po_sample'] = $this->convertDate($this->input->post('tgl_po_sample', TRUE));
        $data['id_customer'] = $this->input->post('id_customer', TRUE);
        $data['id_barang'] = $this->input->post('id_barang', TRUE);
        $data['kode_tf_in'] = $this->input->post('kode_tf_in', TRUE);
        $data['jumlah_po_sample'] = $this->input->post('jumlah_po_sample', TRUE);
        $data['jumlah_po_sample'] = str_replace('.', '', $data['jumlah_po_sample']);
        $data['ket_po_sample'] = $this->input->post('ket_po_sample', TRUE);
        $data['mkt_admin'] = $this->input->post('mkt_admin', TRUE);
        
        $respon = $this->M_admin_sample->update($data);

        if($respon){
            header('location:'.base_url('gudang/gudang_admin/admin_sample').'?alert=success&msg=Selamat anda berhasil meng-update PO Sample');
        }else{
            header('location:'.base_url('gudang/gudang_admin/admin_sample').'?alert=danger&msg=Maaf anda gagal meng-update PO Sample');
        }
    }

    public function delete($id_mkt_po_sample)
    {
        $data['id_mkt_po_sample'] = $id_mkt_po_sample;
        $respon = $this->M_admin_sample->delete($data);

        if($respon){
            header('location:'.base_url('gudang/gudang_admin/admin_sample').'?alert=success&msg=Selamat anda berhasil menghapus PO Sample');
        }else{
            header('location:'.base_url('gudang/gudang_admin/admin_sample').'?alert=danger&msg=Maaf anda gagal menghapus PO Sample');
        }
    }

//   public function proses2()
// {
//     $data['id_mkt_po_sample'] = $this->input->post('id_mkt_po_sample', TRUE);
//     $data['tgl_masuk_sample'] = $this->convertDate($this->input->post('tgl_masuk_sample', TRUE));
//     $data['id_customer'] = $this->input->post('id_customer', TRUE);
//     $data['id_barang'] = $this->input->post('id_barang', TRUE);
//     $data['kode_tf_in'] = $this->input->post('kode_tf_in', TRUE);
//     $data['jumlah_masuk'] = $this->input->post('jumlah_masuk', TRUE);
//     $data['jumlah_masuk'] = str_replace('.', '', $data['jumlah_masuk']);
//     $data['no_pengiriman'] = $this->input->post('no_pengiriman', TRUE);
//     $data['kurir'] = $this->input->post('kurir', TRUE);
//     $data['ket_masuk'] = $this->input->post('ket_masuk', TRUE);
//     $data['gudang_admin'] = $this->input->post('gudang_admin', TRUE);

//     // Insert ke tabel sample_masuk
//     $respon = $this->M_sample_masuk->insert($data);
    
//     // Update status PO Sample menjadi 'processed'
//     if($respon){
//         $this->M_admin_sample->update_status($data['id_mkt_po_sample'], 'processed');
//         header('location:'.base_url('gudang/gudang_admin/admin_sample').'?alert=success&msg=Selamat anda berhasil memproses PO Sample');
//     }else{
//         header('location:'.base_url('gudang/gudang_admin/admin_sample').'?alert=danger&msg=Maaf anda gagal memproses PO Sample');
//     }
// }



    public function cek_kode_tf_in(){
        $kode_tf_in = $this->input->post('kode_tf_in', TRUE);

        $row = $this->M_admin_sample->cek_kode_tf_in($kode_tf_in);
        if ($row['count_ktf'] == 0) {
            echo "false";
        } else {
            echo "true";
        }
    }
}