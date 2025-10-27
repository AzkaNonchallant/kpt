<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan_barang_masuk extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function id_user(){
        return $this->session->userdata("id_user");
    }
    public function get($id_barang = null){
        if ($id_barang == null) {
            $where[] = "";
        }  else {
            $where[] = "AND c.id_barang = '$id_barang'";
        }

        $where = implode(" ", $where);
        $sql = "
       SELECT 
    MIN(a.id_barang_masuk) AS id_gudang_barang_masuk,
    c.nama_barang,
    b.nama_supplier,
    SUM(a.gdg_qty_in) AS total_qty_in,
    c.satuan,
    MAX(a.tgl_msk_gdg) AS tgl_terakhir
    FROM tb_gudang_barang_masuk a
    LEFT JOIN tb_prc_po_pembelian p ON a.id_prc_po_pembelian = p.id_prc_po_pembelian
    LEFT JOIN tb_master_barang c ON p.id_barang = c.id_barang
    LEFT JOIN tb_master_supplier b ON c.id_supplier = b.id_supplier
    WHERE a.is_deleted = 0 
    $where
    GROUP BY c.nama_barang, b.nama_supplier, c.satuan
    ORDER BY tgl_terakhir ASC;
";

        return $this->db->query($sql);

    }
    public function jml_barang_masuk($data){
        // $kode_user = $this->kode_user();
        $sql = "
            SELECT sum(qty) tot_barang_masuk FROM tb_barang_masuk
            WHERE id_barang = '$data[id_barang]' AND  is_deleted = 0";
        return $this->db->query($sql);
    }

}