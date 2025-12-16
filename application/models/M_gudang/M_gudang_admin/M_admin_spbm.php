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
                a.*,
                b.nama_supplier,
                c.kode_barang, c.nama_barang, c.mesh, c.bloom, c.satuan, c.id_supplier,
                imp.id_prc_po_import_tf, imp.status_po_import, imp.tgl_po_import, imp.prc_admin,
                e.kode_tf_in, e.no_batch, e.gdg_qty_in, e.tgl_msk_gdg,
                e.tgl_exp, e.no_bl, e.keterangan, e.gdg_admin,
                imp.no_po_import as imp_no_po
            FROM tb_prc_po_import a
            LEFT JOIN tb_prc_po_import_tf imp ON a.no_po_import = imp.no_po_import
            LEFT JOIN tb_master_barang c ON a.id_barang = c.id_barang
            LEFT JOIN tb_master_supplier b ON c.id_supplier = b.id_supplier
            LEFT JOIN tb_gudang_barang_masuk e ON imp.id_prc_po_import_tf = e.id_prc_po_import_tf
            WHERE a.is_deleted = 0 AND imp.status_po_import = 'proses' 
            $where 
            ORDER BY imp.tgl_po_import DESC";

        return $this->db->query($sql)->result_array();
    }

    public function proses($data)
    {
        $id_user = $this->id_user();
        
        // Update data barang masuk
        $sql = "
        UPDATE tb_gudang_barang_masuk
        SET 
            no_batch            = '{$data['no_batch']}',
            gdg_qty_in          = '{$data['gdg_qty_in']}',
            tgl_msk_gdg         = '{$data['tgl_msk_gdg']}',
            tgl_bayar_pib       = '{$data['tgl_bayar_pib']}',
            kurs_pib       = '{$data['kurs_pib']}',
            no_pib       = '{$data['no_pib']}',
            tgl_exp             = '{$data['tgl_exp']}',
            no_bl               = '{$data['no_bl']}',
            jenis_transaksi_gudang = '{$data['jenis_transaksi_gudang']}',
            keterangan          = '{$data['keterangan']}',
            gdg_admin           = '{$data['gdg_admin']}',
            updated_at          = NOW(),
            updated_by          = '$id_user',
            is_deleted          = '0'
        WHERE kode_tf_in = '{$data['kode_tf_in_2']}'";
        
        $this->db->query($sql);
        
        // Update status PO import
        $sql_status = "
        UPDATE tb_prc_po_import_tf
        SET 
            status_po_import = 'diterima',
            updated_at = NOW(),
            updated_by = '$id_user'
        WHERE id_prc_po_import_tf = '{$data['id_prc_po_import_tf']}'";
        
        return $this->db->query($sql_status);
    }

    public function update_status_po($id_prc_po_import_tf, $status_po_import)
    {
        $id_user = $this->id_user();
        $sql = "
        UPDATE tb_prc_po_import_tf
        SET 
            status_po_import = '$status_po_import',
            updated_at = NOW(),
            updated_by = '$id_user'
        WHERE id_prc_po_import_tf = '$id_prc_po_import_tf'";
        return $this->db->query($sql);
    }
    
    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE tb_barang_masuk 
            SET 
                kode_tf_in = '{$data['kode_tf_in']}',
                id_prc_po_import_tf = '{$data['id_prc_po_import_tf']}',
                no_batch = '{$data['no_batch']}',
                tgl_msk_gdg = '{$data['tgl_msk_gdg']}',
                jenis_transaksi = '{$data['jenis_transaksi']}',
                tgl_bayar_pib = '{$data['tgl_bayar_pib']}',
                kurs_pib = '{$data['kurs_pib']}',
                no_pib = '{$data['no_pib']}',
                id_barang = '{$data['id_barang']}',
                qty_in = '{$data['qty_in']}',
                tgl_exp = '{$data['tgl_exp']}',
                no_bl = '{$data['no_bl']}',
                keterangan = '{$data['keterangan']}',
                gdg_admin = '{$data['gdg_admin']}',
                updated_at = NOW(),
                updated_by = '$id_user' 
            WHERE id_barang_masuk = '{$data['id_barang_masuk']}'";
        return $this->db->query($sql);
    }

    public function delete($data)
    {
        $id_user = $this->id_user();

        $sql = "
        DELETE FROM tb_barang_masuk
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
            FROM tb_prc_po_import_tf 
            WHERE status_po_import = 'proses' 
            AND is_deleted = 0";
        return $this->db->query($sql);
    }

    public function getAllPOWithKodeTF()
    {
        $this->db->select('p.id_prc_po_import, p.no_po_import, b.nama_supplier, p.tgl_po_import, 
                           g.id_barang_masuk, g.kode_tf_in, g.tgl_msk_gdg, g.no_batch');
        $this->db->from('tb_prc_po_import p');
        $this->db->join('tb_gudang_barang_masuk g', 'g.id_prc_po_import = p.id_prc_po_import', 'left');
        $this->db->join('tb_master_barang mb', 'p.id_barang = mb.id_barang', 'left');
        $this->db->join('tb_master_supplier b', 'mb.id_supplier = b.id_supplier', 'left');
        $this->db->order_by('p.id_prc_po_import', 'DESC');
        return $this->db->get()->result();
    }
}