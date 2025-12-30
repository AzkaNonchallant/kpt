<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang_masuk extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function id_user(){
        return $this->session->userdata("id_user");
    }
    public function get($tgl = null, $tgl2 = null, $nama_barang = null, $no_batch = null){

        if ($tgl != null && $tgl2 != null) {
            $tgl = explode("/", $tgl);
            $tgl = "$tgl[2]-$tgl[1]-$tgl[0]";
            $tgl2 = explode("/", $tgl2);
            $tgl2 = "$tgl2[2]-$tgl2[1]-$tgl2[0]";
            $where[] = "AND a.tgl_msk_gdg >= '$tgl' AND  a.tgl_msk_gdg <= '$tgl2'";
        } else if ($tgl ==null && $tgl2 ==null) {
                $where[] = "";
        } else {
            return array();
        }

        if ($nama_barang == null) {
            $where[] = "";
        }  else {
            $where[] = "AND c.nama_barang = '$nama_barang'";
        }

        if ($no_batch == null) {
            $where[] = "";
        }  else {
            $where[] = "AND a.no_batch = '$no_batch'";
        }

        $where = implode(" ", $where);

        $sql = "
            SELECT 
    a.id_barang_masuk,
    a.tgl_msk_gdg,
    a.gdg_qty_in,
    a.no_batch,
    a.kode_tf_in,
    a.gdg_admin,
    imp.id_barang,
    imp.id_prc_po_import,
    imp.jumlah,
    imp.harga_perunit,
    imp.status_po_import,
    c.nama_barang,
    c.kode_barang_bpom,
    c.mesh,
    c.bloom,
    c.satuan,
    d.nama_supplier
FROM tb_gudang_barang_masuk a
LEFT JOIN tb_prc_po_import imp 
    ON a.id_prc_po_import = imp.id_prc_po_import
LEFT JOIN tb_master_barang c 
    ON imp.id_barang = c.id_barang
LEFT JOIN tb_master_supplier d 
    ON c.id_supplier = d.id_supplier
WHERE a.is_deleted = 0
AND imp.status_po_import = 'diterima'
ORDER BY a.id_barang_masuk DESC
        ";
        return $this->db->query($sql)->result_array();
    }

        public function get2($id = null){
        // $kode_user = $this->kode_user();
        $sql = "SELECT * FROM tb_gudang_barang_masuk WHERE is_deleted = 0 ORDER BY id_barang_masuk DESC";

        return $this->db->query($sql);
    }

        public function get3($id = null ){
            
        $sql = "
            SELECT a.*,imp.id_barang,imp.jumlah,imp.harga_perunit,c.kode_barang,c.nama_barang,c.mesh,c.bloom,c.satuan,d.nama_supplier,d.pic_supplier FROM tb_gudang_barang_masuk a
            LEFT JOIN tb_prc_po_import imp ON a.id_prc_po_import = imp.id_prc_po_import
            LEFT JOIN tb_master_barang c ON imp.id_barang = c.id_barang
            LEFT JOIN tb_master_supplier d ON c.id_supplier = d.id_supplier

            WHERE a.is_deleted = 0 AND imp.status_po_import = 'diterima' ORDER BY a.id_barang_masuk DESC";
        return $this->db->query($sql);
    }

    public function get_barang_by_customer($id_customer)
{
    $sql = "
        SELECT 
            a.kode_tf_in,
            a.no_batch,
            c.id_barang,
            c.kode_barang,
            c.nama_barang,
            c.mesh,
            c.bloom,
            c.satuan,
            d.nama_supplier,
            a.gdg_qty_in,
            h.harga AS harga_customer
        FROM tb_gudang_barang_masuk a
        LEFT JOIN tb_prc_po_import_tf b ON a.id_prc_po_import_tf = b.id_prc_po_import_tf
        LEFT JOIN tb_prc_po_import imp ON b.no_po_import = imp.no_po_import
        LEFT JOIN tb_master_barang c ON imp.id_barang = c.id_barang
        LEFT JOIN tb_master_supplier d ON c.id_supplier = d.id_supplier
        LEFT JOIN tb_master_harga h ON h.id_barang = c.id_barang
        WHERE a.is_deleted = 0
        AND h.is_deleted = 0
        AND h.id_customer = ?
        ORDER BY c.nama_barang ASC
    ";
    
    return $this->db->query($sql, [$id_customer])->result_array();
}

public function get_barang_by_supplier($id_supplier)
{
    $sql = "
        SELECT 
            c.id_barang,
            c.kode_barang,
            c.nama_barang,
            c.id_supplier,
            c.satuan,
            c.mesh,
            c.bloom,
            d.nama_supplier,
            d.pic_supplier,
            d.kode_po,
            c.is_deleted
        FROM tb_master_barang c
        LEFT JOIN tb_master_supplier d ON c.id_supplier = d.id_supplier
        WHERE c.is_deleted = 0
        AND c.id_supplier = ?
        ORDER BY c.nama_barang ASC
    ";

    return $this->db->query($sql, [$id_supplier])->result_array();
}

        public function jml_barang_masuk($data){
        $sql = "
            SELECT sum(gdg_qty_in) tot_barang_masuk FROM tb_gudang_barang_masuk 
            WHERE id_barang_masuk ='$data[id_barang_masuk]' AND is_deleted = 0"; 
        return $this->db->query($sql);
        }

        public function get_kode_tf_in(){
        
        $sql = "SELECT MAX(kode_tf_in) as kode_tf_in from tb_gudang_barang_masuk";
        return $this->db->query($sql);
        }

}