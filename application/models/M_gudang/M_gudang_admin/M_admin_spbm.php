<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin_spbm extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function id_user(){
        return $this->session->userdata("id_user");
    }
    
    public function get($tgl = null, $tgl2 = null, $nama_barang = null, $nama_supplier = null)
    {
        $where = [];

        if ($tgl != null && $tgl2 != null) {
            $tgl = explode("/", $tgl);
            $tgl = "$tgl[2]-$tgl[1]-$tgl[0]";
            $tgl2 = explode("/", $tgl2);
            $tgl2 = "$tgl2[2]-$tgl2[1]-$tgl2[0]";
            $where[] = "AND imp.tgl_po_import >= '$tgl' AND imp.tgl_po_import <= '$tgl2'";
        } else if ($tgl == null && $tgl2 == null) {
            $where[] = "";
        } else {
            return array();
        }

        if ($nama_barang == null) {
            $where[] = "";
        } else {
            $where[] = "AND c.nama_barang = '$nama_barang'";
        }

        if ($nama_supplier == null) {
            $where[] = "";
        } else {
            $where[] = "AND b.nama_supplier = '$nama_supplier'";
        }

        $where = implode(" ", $where);

        $sql = "
           SELECT
    e.id_barang_masuk,
    e.kode_tf_in,
    e.no_batch,
    e.gdg_qty_in,
    e.tgl_msk_gdg,
    e.tgl_exp,
    e.no_bl,
    e.keterangan,
    e.tgl_bayar_pib,
    e.no_pib,
    e.tgl_ski,
    e.tgl_inv,
    e.tgl_pack,
    e.tgl_coo,
    e.tgl_coa,
    e.tgl_srp,
    e.kurs_pib,
    e.no_ski,
    e.no_inv,
    e.no_pack,
    e.no_coo,
    e.no_coa,
    e.no_srp,
    e.gdg_admin,
    imp.id_prc_po_import_tf,
    imp.no_po_import,
    imp.prc_admin,
    imp2.id_prc_po_import,  
    imp2.jumlah,
    imp2.harga_perunit,
    imp2.status_po_import,
    imp.tgl_po_import,
    c.id_barang,
    c.kode_barang,
    c.nama_barang,
    c.mesh,
    c.bloom,
    c.satuan,
    b.id_supplier,
    b.nama_supplier
FROM tb_gudang_barang_masuk e
LEFT JOIN tb_prc_po_import_tf imp 
    ON e.id_prc_po_import_tf = imp.id_prc_po_import_tf
LEFT JOIN tb_prc_po_import imp2 
    ON e.id_prc_po_import = imp2.id_prc_po_import 
LEFT JOIN tb_master_barang c 
    ON imp2.id_barang = c.id_barang
LEFT JOIN tb_master_supplier b 
    ON c.id_supplier = b.id_supplier
WHERE e.is_deleted = 0
$where
ORDER BY e.tgl_msk_gdg DESC";

        return $this->db->query($sql)->result_array();
    }

    public function proses($data)
    {
        $id_user = $this->id_user();

        $this->db->trans_begin();

        $sql_spbm = "
        INSERT INTO tb_gudang_spbm
        SET
            kode_tf_in              = '{$data['kode_tf_in_2']}',
            id_prc_po_import_tf     = '{$data['id_prc_po_import_tf']}',
            id_prc_po_import        = '{$data['id_prc_po_import']}',
            id_barang               = '{$data['id_barang']}',         
            no_batch                = '{$data['no_batch']}',
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

        // Update hanya item barang yang spesifik, bukan semua barang dengan no_po_import yang sama
        $sql_status = "
        UPDATE tb_prc_po_import
        SET 
            status_po_import = 'gudang',
            updated_at = NOW(),
            updated_by = '$id_user'
        WHERE id_prc_po_import = '{$data['id_prc_po_import']}'
        AND id_barang = '{$data['id_barang']}'
        ";

        $this->db->query($sql_status);

        // Jangan hapus echo dan die di sini
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        }

        $this->db->trans_commit();
        return true;
    }

    // Update status PO khusus untuk satu barang (method tambahan)
    public function update_status_po_specific($id_prc_po_import, $id_barang, $status_po_import)
    {
        $id_user = $this->id_user();
        $sql = "
        UPDATE tb_prc_po_import
        SET 
            status_po_import = '$status_po_import',
            updated_at = NOW(),
            updated_by = '$id_user'
        WHERE id_prc_po_import = '$id_prc_po_import'
        AND id_barang = '$id_barang'";
        
        return $this->db->query($sql);
    }
    
    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE tb_gudang_spbm 
            SET 
                kode_tf_in = '{$data['kode_tf_in']}',
                id_prc_po_import_tf = '{$data['id_prc_po_import_tf']}',
                id_prc_po_import = '{$data['id_prc_po_import']}',
                id_barang = '{$data['id_barang']}',
                no_batch = '{$data['no_batch']}',
                tgl_msk_gdg = '{$data['tgl_msk_gdg']}',
                jenis_transaksi = '{$data['jenis_transaksi']}',
                tgl_bayar_pib = '{$data['tgl_bayar_pib']}',
                kurs_pib = '{$data['kurs_pib']}',
                no_pib = '{$data['no_pib']}',
                qty_in = '{$data['qty_in']}',
                tgl_exp = '{$data['tgl_exp']}',
                no_bl = '{$data['no_bl']}',
                keterangan = '{$data['keterangan']}',
                gdg_admin = '{$data['gdg_admin']}',
                updated_at = NOW(),
                updated_by = '$id_user' 
            WHERE id_gudang_spbm = '{$data['id_gudang_spbm']}'"; // Pastikan menggunakan id yang benar
        return $this->db->query($sql);
    }

    public function delete($data)
    {
        $id_user = $this->id_user();

        $sql = "
        DELETE FROM tb_gudang_barang_masuk
        WHERE id_barang_masuk = '{$data['id_barang_masuk']}'";
        return $this->db->query($sql);
    }

    public function jml_barang_masuk($data){
        $sql = "
            SELECT SUM(qty_in) AS tot_barang_masuk 
            FROM tb_barang_masuk
            WHERE id_barang = '{$data['id_barang']}' 
            AND is_deleted = 0";
        return $this->db->query($sql);
    }

    public function cek_kode_tf_in($kode_tf_in){
        $sql = "
            SELECT COUNT(a.kode_tf_in) AS count_ktf 
            FROM tb_barang_masuk a
            WHERE a.kode_tf_in = '$kode_tf_in' 
            AND a.is_deleted = 0";
        return $this->db->query($sql);
    }
    
    public function cek_spbm()
    {
        $sql = "
            SELECT COUNT(status_po_import) AS tot_status_spbm 
            FROM tb_prc_po_import
            WHERE status_po_import = 'proses' 
            AND is_deleted = 0";
        return $this->db->query($sql);
    }

    public function get_po_import(){
        $sql = "
        SELECT
         a.id_prc_po_import_tf,
         a.no_po_import
        FROM tb_prc_po_import_tf a
        WHERE a.is_deleted = 0 ORDER BY a.no_po_import DESC";

        return $this->db->query($sql);
    }

    public function get_tgl_po_import($no_po_import)
    {
        $sql = "
            SELECT tgl_po_import
            FROM tb_prc_po_import_tf
            WHERE no_po_import = ?
        ";

        return $this->db->query($sql, [$no_po_import])->row_array();
    }

    public function generate_kode_tf_in()
    {
        $tahun = date('Y');

        $sql = "
            SELECT kode_tf_in 
            FROM tb_gudang_spbm
            WHERE kode_tf_in LIKE 'KPT-IN-$tahun-%'
            ORDER BY id_gudang_spbm DESC
            LIMIT 1
        ";

        $row = $this->db->query($sql)->row();

        if (!$row) {
            $nomor = 1;
        } else {
            $last = explode('-', $row->kode_tf_in);
            $nomor = (int) end($last) + 1;
        }

        return 'KPT-IN-' . $tahun . '-' . str_pad($nomor, 2, '0', STR_PAD_LEFT);
    }

    public function get_barang_by_po_import($no_po_import)
    {
        $sql = "
            SELECT 
                a.id_prc_po_import,
                a.jumlah,
                a.status_po_import,
                a.no_po_import,
                a.id_barang,
                c.kode_barang,
                c.nama_barang,
                c.mesh,
                c.bloom,
                c.satuan,
                b.id_supplier,
                b.nama_supplier,
                d.tgl_po_import
            FROM tb_prc_po_import a
            JOIN tb_master_barang c ON a.id_barang = c.id_barang
            JOIN tb_master_supplier b ON c.id_supplier = b.id_supplier
            JOIN tb_prc_po_import_tf d ON a.no_po_import = d.no_po_import
            WHERE a.no_po_import = ?
            AND a.status_po_import = 'proses'
            AND a.is_deleted = 0
        ";

        return $this->db->query($sql, [$no_po_import])->result_array();
    }

    public function getAllPOWithKodeTF()
    {
        $this->db->select('p.id_prc_po_import, p.no_po_import, p.id_barang, b.nama_supplier, p.tgl_po_import, 
                           g.id_barang_masuk, g.kode_tf_in, g.tgl_msk_gdg, g.no_batch');
        $this->db->from('tb_prc_po_import p');
        $this->db->join('tb_gudang_barang_masuk g', 'g.id_prc_po_import = p.id_prc_po_import', 'left');
        $this->db->join('tb_master_barang mb', 'p.id_barang = mb.id_barang', 'left');
        $this->db->join('tb_master_supplier b', 'mb.id_supplier = b.id_supplier', 'left');
        $this->db->order_by('p.id_prc_po_import', 'DESC');
        return $this->db->get()->result();
    }
    
    // Method untuk mendapatkan data barang berdasarkan id_prc_po_import dan id_barang
    public function get_barang_by_id_po_import($id_prc_po_import, $id_barang = null)
    {
        $sql = "
            SELECT 
                a.id_prc_po_import,
                a.no_po_import,
                a.jumlah,
                a.status_po_import,
                a.id_barang,
                c.kode_barang,
                c.nama_barang,
                c.mesh,
                c.bloom,
                c.satuan,
                b.id_supplier,
                b.nama_supplier
            FROM tb_prc_po_import a
            JOIN tb_master_barang c ON a.id_barang = c.id_barang
            JOIN tb_master_supplier b ON c.id_supplier = b.id_supplier
            WHERE a.id_prc_po_import = ?
        ";
        
        if ($id_barang) {
            $sql .= " AND a.id_barang = ?";
            return $this->db->query($sql, [$id_prc_po_import, $id_barang])->row_array();
        } else {
            $sql .= " AND a.is_deleted = 0";
            return $this->db->query($sql, [$id_prc_po_import])->result_array();
        }
    }
}   