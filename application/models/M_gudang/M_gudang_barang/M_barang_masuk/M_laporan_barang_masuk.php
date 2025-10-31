<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan_barang_masuk extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function id_user(){
        return $this->session->userdata("id_user");
    }

public function get($id_barang = null)
{
    $where = '';
    if ($id_barang != null) {
        $where = "AND c.id_barang = '$id_barang'";
    }

    $sql = "
        SELECT 
            c.id_barang,
            c.nama_barang,
            b.nama_supplier,
            c.satuan,
            COALESCE(SUM(a.gdg_qty_in), 0) AS total_masuk,
            (
                SELECT COALESCE(SUM(x.gdg_qty_out), 0)
                FROM tb_gudang_barang_keluar x
                LEFT JOIN tb_gudang_barang_masuk y ON x.kode_tf_in = y.kode_tf_in
                LEFT JOIN tb_prc_po_pembelian p2 ON y.id_prc_po_pembelian = p2.id_prc_po_pembelian
                WHERE p2.id_barang = c.id_barang
                AND x.is_deleted = 0
            ) AS total_keluar,
            (
                COALESCE(SUM(a.gdg_qty_in), 0) -
                (
                    SELECT COALESCE(SUM(x.gdg_qty_out), 0)
                    FROM tb_gudang_barang_keluar x
                    LEFT JOIN tb_gudang_barang_masuk y ON x.kode_tf_in = y.kode_tf_in
                    LEFT JOIN tb_prc_po_pembelian p2 ON y.id_prc_po_pembelian = p2.id_prc_po_pembelian
                    WHERE p2.id_barang = c.id_barang
                    AND x.is_deleted = 0
                )
            ) AS stok_akhir,
            MAX(a.tgl_msk_gdg) AS tgl_terakhir
        FROM tb_gudang_barang_masuk a
        LEFT JOIN tb_prc_po_pembelian p ON a.id_prc_po_pembelian = p.id_prc_po_pembelian
        LEFT JOIN tb_master_barang c ON p.id_barang = c.id_barang
        LEFT JOIN tb_master_supplier b ON c.id_supplier = b.id_supplier
        WHERE a.is_deleted = 0 
        $where
        GROUP BY c.id_barang, c.nama_barang, b.nama_supplier, c.satuan
        ORDER BY tgl_terakhir ASC;
    ";

    return $this->db->query($sql);
}



}