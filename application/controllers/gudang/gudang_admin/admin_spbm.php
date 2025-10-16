<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_spbm extends MY_Controller {

	function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_gudang/M_gudang_admin/M_admin_spbm');
        $this->load->model('M_purchasing/M_po_pembelian');
        $this->load->model('M_master/M_master_barang');
        $this->load->model('M_master/M_master_supplier');
        $this->load->model('M_gudang/M_gudang_barang/M_barang_masuk/M_barang_masuk');
        $this->load->model('M_users');
    }

private function convertDate($date)
{
    $parts = explode('/', $date);

    if (count($parts) !== 3) {
        return null; // atau return tanggal default misalnya '0000-00-00'
    }

    return $parts[2] . "-" . $parts[1] . "-" . $parts[0];
}


	public function index()
	{
        $tgl = $this->input->get('date_from');
        $tgl2 = $this->input->get('date_until');
        $nama_barang = $this->input->get('nama_barang');
        $nama_supplier = $this->input->get('nama_supplier');


		// $data['row'] = $this->supplier_m->get();
		$data['result'] = $this->M_admin_spbm->get($tgl, $tgl2, $nama_barang, $nama_supplier);
        $data['res_barang'] = $this->M_master_barang->get()->result_array();
        $data['res_supplier'] = $this->M_master_supplier->get()->result_array();
        $data['res_user'] = $this->M_users->get()->result_array();
        // $data['kode_tf_in'] = $this->M_barang_masuk-> get_kode_tf_in()->result_array();

        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;
        $data['nama_barang'] = $nama_barang;
        $data['nama_supplier'] = $nama_supplier;
		$this->template->load('template', 'content/gudang/gudang_admin/admin_spbm_data',$data);
        // print_r($data);

	}

	public function proses()
	{
        $data['id_prc_po_pembelian'] = $this->input->post('id_prc_po_pembelian',TRUE);
		$data['kode_tf_in_2'] = $this->input->post('kode_tf_in_2',TRUE);
        $data['no_batch'] = $this->input->post('no_batch',TRUE);
        $data['gdg_qty_in'] = $this->input->post('gdg_qty_in',TRUE);
        $data['gdg_qty_in'] = str_replace('.', '', $data['gdg_qty_in']); // Hapus titik pemisah ribuan
        $data['tgl_msk_gdg'] = $this->convertDate($this->input->post('tgl_msk_gdg',TRUE));
        $data['tgl_bayar_pib'] = $this->convertDate($this->input->post('tgl_bayar_pib',TRUE));
        $data['tgl_exp'] = $this->convertDate($this->input->post('tgl_exp',TRUE));
        $data['no_bl'] = $this->input->post('no_bl',TRUE);
        $data['keterangan'] = $this->input->post('keterangan',TRUE);
        $data['gdg_admin'] = $this->input->post('gdg_admin',TRUE);


        $this->M_admin_spbm->update_status_po($data['id_prc_po_pembelian'], "Diterima");
        $respon = $this->M_admin_spbm->proses($data);

        if($respon){
        	header('location:'.base_url('gudang/gudang_admin/admin_spbm').'?alert=success&msg=Selamat anda berhasil menambah barang masuk');
        }else{
        	header('location:'.base_url('gudang/gudang_admin/admin_spbm').'?alert=danger&msg=Maaf anda gagal menambah barang masuk');
        }
	}
	public function update()
	{
        $data['id_barang_masuk'] = $this->input->post('id_barang_masuk',TRUE);
		$data['kode_tf_in'] = $this->input->post('kode_tf_in',TRUE);
        $data['no_batch'] = $this->input->post('no_batch',TRUE);
        $data['tgl_msk_gdg'] = $this->convertDate($this->input->post('tgl_msk_gdg',TRUE));
        $data['tgl_bayar_pib'] = $this->convertDate($this->input->post('tgl_bayar_pib',TRUE));
        $data['jenis_transaksi'] = $this->input->post('jenis_transaksi',TRUE);
        $data['id_barang'] = $this->input->post('id_barang',TRUE);
        $data['qty_in'] = $this->input->post('qty_in',TRUE);
        $data['qty_in'] = str_replace('.', '', $data['qty_in']); // Hapus titik pemisah ribuan
        $data['tgl_exp'] = $this->convertDate($this->input->post('tgl_exp',TRUE));
        $data['no_bl'] = $this->input->post('no_bl',TRUE);
        $data['keterangan'] = $this->input->post('keterangan',TRUE);
        $data['gdg_admin'] = $this->input->post('gdg_admin',TRUE);
        
        $respon = $this->M_gudang_barang_masuk->update($data);
		// echo $respon;
        if($respon){
        	header('location:'.base_url('gudang/gudang_barang_masuk').'?alert=success&msg=Selamat anda berhasil meng-update barang masuk');
        }else{
        	header('location:'.base_url('gudang/gudang_barang_masuk').'?alert=danger&msg=Maaf anda gagal meng-update barang masuk');
        }
	}
	public function delete($id_barang_masuk)
	{
		$data['id_barang_masuk'] = $id_barang_masuk;
        $respon = $this->M_gudang_barang_masuk->delete($data);

        if($respon){
        	header('location:'.base_url('gudang/gudang_barang_masuk').'?alert=success&msg=Selamat anda berhasil menghapus barang masuk');
        }else{
        	header('location:'.base_url('bgudang/gudang_barang_masuk').'?alert=danger&msg=Maaf anda gagal menghapus barang masuk');
        }
	}

    public function cek_kode_tf_in(){
        $kode_tf_in = $this->input->post('kode_tf_in',TRUE);

        $row = $this->M_gudang_barang_masuk->cek_kode_tf_in($kode_tf_in)->row_array();
        if ($row['count_ktf']==0) {
            echo "false";
        }else{
            echo "true";
        }
    }

}
