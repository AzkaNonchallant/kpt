<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_spbm extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_gudang/M_gudang_admin/M_admin_spbm');
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

     public function get_barang_by_po_import()
    {
        $no_po_import = $this->input->post('no_po_import', TRUE);
        
        // Panggil model untuk mengambil data barang berdasarkan supplier
        $data = $this->M_admin_spbm->get_barang_by_po_import($no_po_import,);
        
        // Debug: lihat data yang dikembalikan
        
        echo json_encode($data);
    }


    public function index()
    {
        $tgl = $this->input->get('date_from');
        $tgl2 = $this->input->get('date_until');
        $nama_barang = $this->input->get('nama_barang');
        $kode_tf_in = $this->input->get('kode_tf_in');

        $data['result'] = $this->M_admin_spbm->get($tgl, $tgl2, $nama_barang, $kode_tf_in);
        
        $data['res_barang'] = $this->M_master_barang->get()->result_array();
        $data['res_supplier'] = $this->M_master_supplier->get()->result_array();
        $data['res_po'] = $this->M_admin_spbm->get_po_import()->result_array();
        $data['res_user'] = $this->M_users->get()->result_array();
        $data['res_sumber'] = $this->M_sumber->get2()->result_array();

        

        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;
        $data['nama_barang'] = $nama_barang;
        $data['kode_tf_in'] = $kode_tf_in;
        
        $this->template->load('template', 'content/gudang/gudang_admin/admin_spbm_data', $data);
    }

    public function get_tgl()
    {
        $no_po_import = $this->input->post('no_po_import', TRUE);
        $data = $this->M_admin_spbm->get_tgl_po_import($no_po_import);
        echo json_encode($data);
    }

    public function proses()
{
    // ===== Ambil data dari form =====
    $data['id_prc_po_import_tf'] = $this->input->post('id_prc_po_import_tf', TRUE);
    $data['id_prc_po_import'] = $this->input->post('id_prc_po_import', TRUE);
    $data['no_batch'] = $this->input->post('no_batch', TRUE);
    $data['gdg_qty_in'] = str_replace('.', '', $this->input->post('gdg_qty_in', TRUE));
    $data['tgl_msk_gdg'] = $this->convertDate($this->input->post('tgl_msk_gdg', TRUE));
    $data['tgl_bayar_pib'] = $this->convertDate($this->input->post('tgl_bayar_pib', TRUE));
    $data['tgl_ski'] = $this->convertDate($this->input->post('tgl_ski', TRUE));
    $data['tgl_inv'] = $this->convertDate($this->input->post('tgl_inv', TRUE));
    $data['tgl_pack'] = $this->convertDate($this->input->post('tgl_pack', TRUE));
    $data['tgl_coo'] = $this->convertDate($this->input->post('tgl_coo', TRUE));
    $data['tgl_coa'] = $this->convertDate($this->input->post('tgl_coa', TRUE));
    $data['tgl_srp'] = $this->convertDate($this->input->post('tgl_srp', TRUE));
    $data['tgl_exp'] = $this->convertDate($this->input->post('tgl_exp', TRUE));
    $data['no_bl'] = $this->input->post('no_bl', TRUE);
    $data['no_ski'] = $this->input->post('no_ski', TRUE);
    $data['no_inv'] = $this->input->post('no_inv', TRUE);
    $data['no_pack'] = $this->input->post('no_pack', TRUE);
    $data['no_coo'] = $this->input->post('no_coo', TRUE);
    $data['no_coa'] = $this->input->post('no_coa', TRUE);
    $data['no_srp'] = $this->input->post('no_srp', TRUE);
    $data['kurs_pib'] = $this->input->post('kurs_pib', TRUE);
    $data['no_pib'] = $this->input->post('no_pib', TRUE);
    $data['id_barang'] = $this->input->post('id_barang', TRUE);
    $data['jenis_transaksi_gudang'] = $this->input->post('jenis_transaksi', TRUE);
    $data['keterangan'] = $this->input->post('keterangan', TRUE);
    $data['gdg_admin'] = $this->input->post('gdg_admin', TRUE);

    $data['kode_tf_in_2'] = $this->M_admin_spbm->generate_kode_tf_in();

    $id_user = $this->M_admin_spbm->id_user();
    $this->db->trans_begin();

    // 1️⃣ Update tb_gudang_barang_masuk (jika sudah ada)
   

    // 2️⃣ Insert ke tb_gudang_spbm
    $sql_spbm = "
        INSERT INTO tb_gudang_spbm
        SET
            kode_tf_in              = '{$data['kode_tf_in_2']}',
            id_prc_po_import_tf     = '{$data['id_prc_po_import_tf']}',
            id_prc_po_import     = '{$data['id_prc_po_import']}',
            no_batch                = '{$data['no_batch']}',
            id_barang               = '{$data['id_barang']}',
            gdg_qty_in              = '{$data['gdg_qty_in']}',
            tgl_msk_gdg             = '{$data['tgl_msk_gdg']}',
            tgl_bayar_pib           = '{$data['tgl_bayar_pib']}',
            kurs_pib                = '{$data['kurs_pib']}',
            no_pib                  = '{$data['no_pib']}',
            tgl_exp                 = '{$data['tgl_exp']}',
            tgl_ski                 = '{$data['tgl_ski']}',
            tgl_inv                 = '{$data['tgl_inv']}',
            tgl_pack                = '{$data['tgl_pack']}',
            tgl_coo                 = '{$data['tgl_coo']}',
            tgl_coa                 = '{$data['tgl_coa']}',
            tgl_srp                 = '{$data['tgl_srp']}',
            no_ski                  = '{$data['no_ski']}',
            no_inv                  = '{$data['no_inv']}',
            no_pack                 = '{$data['no_pack']}',
            no_coo                  = '{$data['no_coo']}',
            no_coa                  = '{$data['no_coa']}',
            no_srp                  = '{$data['no_srp']}',
            no_bl                   = '{$data['no_bl']}',
            jenis_transaksi_gudang  = '{$data['jenis_transaksi_gudang']}',
            keterangan              = '{$data['keterangan']}',
            gdg_admin               = '{$data['gdg_admin']}',
            created_at              = NOW(),
            created_by              = '$id_user',
            is_deleted              = '0'
    ";
    $this->db->query($sql_spbm);

    // 3️⃣ Update status PO import
    $sql_status = "
        UPDATE tb_prc_po_import
        SET
            status_po_import = 'gudang',
            updated_at = NOW(),
            updated_by = '$id_user'
        WHERE id_prc_po_import = '{$data['id_prc_po_import']}' AND id_barang = '{$data['id_barang']}'
    ";
    $this->db->query($sql_status);

    // ===== COMMIT / ROLLBACK =====
    if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
        header('location:'.base_url('gudang/gudang_admin/admin_spbm').'?alert=danger&msg=Gagal memproses SPBM');
        return;
    }

    $this->db->trans_commit();
    header('location:'.base_url('gudang/gudang_admin/admin_spbm').'?alert=success&msg=SPBM berhasil diproses dengan kode TF-IN: '.$data['kode_tf_in_2']);
}

    public function praeview_kode_tf_in() {
    if (!$this->input->is_ajax_request()) {
        show_404();
    }

    // Ambil nomor terakhir dari DB tanpa menyimpan
    $last = $this->db->select('kode_tf_in')
                     ->from('tb_gudang_spbm')
                     ->order_by('id_gudang_spbm', 'DESC')
                     ->limit(1)
                     ->get()
                     ->row_array();

    $tahun = date('Y');

    if ($last) {
        // Ambil angka terakhir
        preg_match('/-(\d+)$/', $last['kode_tf_in'], $matches);
        $next_number = isset($matches[1]) ? (int)$matches[1] + 1 : 1;
    } else {
        $next_number = 1;
    }

    $nomor = str_pad($next_number, 2, '0', STR_PAD_LEFT);
    $preview_tf_in = 'KPT-IN-' . $tahun . '-' . $nomor;

    echo json_encode(['kode_tf_in' => $preview_tf_in]);
}

public function get_next_kode_tf_in()
{
    if (!$this->input->is_ajax_request()) {
        show_404();
    }

    $kode = $this->M_admin_spbm->generate_kode_tf_in();

    echo json_encode([
        'success' => true,
        'kode_tf_in' => $kode
    ]);
}


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