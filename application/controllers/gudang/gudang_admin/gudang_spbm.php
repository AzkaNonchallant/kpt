<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class gudang_spbm extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_gudang/M_gudang_admin/M_admin_spbm');
        $this->load->model('M_gudang/M_gudang_admin/M_gudang_spbm');
        $this->load->model('M_purchasing/M_po_pembelian');
        $this->load->model('M_master/M_master_barang');
        $this->load->model('M_master/M_master_supplier');
        $this->load->model('M_gudang/M_gudang_barang/M_barang_masuk/M_barang_masuk');
        $this->load->model('M_users');
        $this->load->model('M_sumber');
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
        $data['result'] = $this->M_gudang_spbm->get($tgl, $tgl2, $nama_barang, $nama_supplier);
        $data['res_barang'] = $this->M_master_barang->get()->result_array();
        $data['res_supplier'] = $this->M_master_supplier->get()->result_array();
        $data['res_user'] = $this->M_users->get()->result_array();
        $data['res_sumber'] = $this->M_sumber->get2()->result_array();

        foreach ($data['result'] as &$k) {
        if (!empty($k['tgl_po_import'])) {
            $k['tgl_po_import_fmt'] = date('d/m/y', strtotime($k['tgl_po_import']));
        } else {
            $k['tgl_po_import_fmt'] = '-';
        }
    }
    unset($k);

        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;
        $data['nama_barang'] = $nama_barang;
        $data['nama_supplier'] = $nama_supplier;
        
        $this->template->load('template', 'content/gudang/gudang_admin/gudang_spbm_data', $data);
    }

  public function proses()
{
    $data['kode_tf_in'] = $this->input->post('kode_tf_in');
    $data['id_prc_po_import'] = $this->input->post('id_prc_po_import');
    $data['qty_in'] = $this->input->post('qty_in');
    $data['keterangan'] = $this->input->post('keterangan');

    if (!$data['kode_tf_in']) {
        $this->session->set_flashdata('error', 'Kode TF-IN tidak ditemukan');
        redirect('gudang/gudang_admin/admin_spbm');
        return;
    }

    $this->db->trans_begin();

    try {
        $this->M_gudang_spbm->finalisasi_barang_masuk($data);

        if ($this->db->trans_status() === FALSE) {
            throw new Exception('Gagal finalisasi barang masuk');
        }

        $this->db->trans_commit();
        $this->session->set_flashdata('success', 'Barang masuk berhasil difinalisasi');

    } catch (Exception $e) {
        $this->db->trans_rollback();
        $this->session->set_flashdata('error', $e->getMessage());
    }

    redirect('gudang/gudang_admin/admin_spbm');
}


    // public function proses()
    // {
    //     $data['id_prc_po_import_tf'] = $this->input->post('id_prc_po_import_tf', TRUE);
    //     $data['kode_tf_in_2'] = $this->input->post('kode_tf_in_2', TRUE);
    //     $data['no_batch'] = $this->input->post('no_batch', TRUE);
    //     $data['gdg_qty_in'] = $this->input->post('gdg_qty_in', TRUE);
    //     $data['gdg_qty_in'] = str_replace('.', '', $data['gdg_qty_in']);
    //     $data['tgl_msk_gdg'] = $this->convertDate($this->input->post('tgl_msk_gdg', TRUE));
    //     $data['tgl_bayar_pib'] = $this->convertDate($this->input->post('tgl_bayar_pib', TRUE));
    //     $data['tgl_ski'] = $this->convertDate($this->input->post('tgl_ski', TRUE));
    //     $data['tgl_inv'] = $this->convertDate($this->input->post('tgl_inv', TRUE));
    //     $data['tgl_pack'] = $this->convertDate($this->input->post('tgl_pack', TRUE));
    //     $data['tgl_coo'] = $this->convertDate($this->input->post('tgl_coo', TRUE));
    //     $data['tgl_coa'] = $this->convertDate($this->input->post('tgl_coa', TRUE));
    //     $data['tgl_srp'] = $this->convertDate($this->input->post('tgl_srp', TRUE));
    //     $data['tgl_exp'] = $this->convertDate($this->input->post('tgl_exp', TRUE));
    //     $data['no_bl'] = $this->input->post('no_bl', TRUE);
    //     $data['no_ski'] = $this->input->post('no_ski', TRUE);
    //     $data['no_inv'] = $this->input->post('no_inv', TRUE);
    //     $data['no_pack'] = $this->input->post('no_pack', TRUE);
    //     $data['no_coo'] = $this->input->post('no_coo', TRUE);
    //     $data['no_coa'] = $this->input->post('no_coa', TRUE);
    //     $data['no_srp'] = $this->input->post('no_srp', TRUE);
    //     $data['kurs_pib'] = $this->input->post('kurs_pib', TRUE);
    //     $data['no_pib'] = $this->input->post('no_pib', TRUE);
    //     $data['jenis_transaksi_gudang'] = $this->input->post('jenis_transaksi', TRUE);
    //     $data['keterangan'] = $this->input->post('keterangan', TRUE);
    //     $data['gdg_admin'] = $this->input->post('gdg_admin', TRUE);

    //     // Proses data
    //     $respon = $this->M_admin_spbm->proses($data);

    //     if($respon){
    //         header('location:'.base_url('gudang/gudang_admin/admin_spbm').'?alert=success&msg=Selamat anda berhasil memproses SPBM');
    //     } else {
    //         header('location:'.base_url('gudang/gudang_admin/admin_spbm').'?alert=danger&msg=Maaf anda gagal memproses SPBM');
    //     }
    // }

    public function update()
    {
        $data['id_barang_masuk'] = $this->input->post('id_barang_masuk', TRUE);
        $data['kode_tf_in'] = $this->input->post('kode_tf_in', TRUE);
        $data['no_batch'] = $this->input->post('no_batch', TRUE);
        $data['tgl_msk_gdg'] = $this->convertDate($this->input->post('tgl_msk_gdg', TRUE));
        $data['tgl_bayar_pib'] = $this->convertDate($this->input->post('tgl_bayar_pib', TRUE));
        $data['jenis_transaksi'] = $this->input->post('jenis_transaksi', TRUE);
        $data['kurs_pib'] = $this->input->post('kurs_pib', TRUE);
        $data['no_pib'] = $this->input->post('no_pib', TRUE);
        $data['id_barang'] = $this->input->post('id_barang', TRUE);
        $data['qty_in'] = $this->input->post('qty_in', TRUE);
        $data['qty_in'] = str_replace('.', '', $data['qty_in']);
        $data['tgl_exp'] = $this->convertDate($this->input->post('tgl_exp', TRUE));
        $data['no_bl'] = $this->input->post('no_bl', TRUE);
        $data['keterangan'] = $this->input->post('keterangan', TRUE);
        $data['gdg_admin'] = $this->input->post('gdg_admin', TRUE);
        
        $respon = $this->M_barang_masuk->update($data);
        
        if($respon){
            header('location:'.base_url('gudang/gudang_barang_masuk').'?alert=success&msg=Selamat anda berhasil meng-update barang masuk');
        } else {
            header('location:'.base_url('gudang/gudang_barang_masuk').'?alert=danger&msg=Maaf anda gagal meng-update barang masuk');
        }
    }

    public function delete($id_barang_masuk)
    {
        $data['id_barang_masuk'] = $id_barang_masuk;
        $respon = $this->M_gudang_barang_masuk->delete($data);

        if($respon){
            header('location:'.base_url('gudang/gudang_barang_masuk').'?alert=success&msg=Selamat anda berhasil menghapus barang masuk');
        } else {
            header('location:'.base_url('gudang/gudang_barang_masuk').'?alert=danger&msg=Maaf anda gagal menghapus barang masuk');
        }
    }

    public function cek_kode_tf_in()
    {
        $kode_tf_in = $this->input->post('kode_tf_in', TRUE);
        $row = $this->M_barang_masuk->cek_kode_tf_in($kode_tf_in)->row_array();
        
        if ($row['count_ktf'] == 0) {
            echo "false";
        } else {
            echo "true";
        }
    }
}