<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan_kartu_stok extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function id_user(){
        return $this->session->userdata("id_user");
    }
    public function jml_barang_masuk($data){
        if ($data['tgl'] ==null) {
            $where = "";
        }else{
            $where = "AND tgl_msk_gdg<='$data[tgl]'";
        }
        $sql = "
    SELECT SUM(a.gdg_qty_in) AS tot_barang_masuk
    FROM tb_gudang_barang_masuk a
    LEFT JOIN tb_prc_po_import_tf b ON a.id_prc_po_import_tf = b.id_prc_po_import_tf
    LEFT JOIN tb_prc_po_import c ON b.no_po_import = c.no_po_import
    WHERE c.id_barang = '$data[id_barang]' AND a.is_deleted = 0 $where
";

        return $this->db->query($sql);
    }
    public function jml_barang_keluar2($data){
        if ($data['tgl'] ==null) {
            $where = "";
        }else{
            $where = "AND c.tgl<='$data[tgl]'";
        }
        $sql = "
    SELECT SUM(a.gdg_qty_out) AS tot_barang_keluar
    FROM tb_gudang_barang_keluar a
    LEFT JOIN tb_gudang_barang_masuk b ON a.kode_tf_in = b.kode_tf_in
    LEFT JOIN tb_prc_po_import_tf d ON b.id_prc_po_import_tf = d.id_prc_po_import_tf
    LEFT JOIN tb_prc_po_import e ON d.no_po_import = e.no_po_import
    LEFT JOIN tb_surat_jalan c ON c.kode_tf_out = a.kode_tf_out
    WHERE e.id_barang = '$data[id_barang]' AND a.is_deleted = 0 $where
";
return $this->db->query($sql);
 
    }
   public function jml_barang_masuk_setelah($data){
    if (empty($data['tgl1']) || empty($data['tgl2'])) {
        $where = "";
    } else {
        $where = "AND tgl_msk_gdg >= '$data[tgl1]' AND tgl_msk_gdg <= '$data[tgl2]'";
    }

    $sql = "
    SELECT SUM(b.gdg_qty_in) AS tot_barang_masuk
    FROM tb_gudang_barang_masuk b
    LEFT JOIN tb_prc_po_import_tf p ON b.id_prc_po_import_tf = p.id_prc_po_import_tf
    LEFT JOIN tb_prc_po_import q ON p.no_po_import = p.no_po_import
    WHERE q.id_barang = '$data[id_barang]' AND b.is_deleted = 0 $where
";
return $this->db->query($sql);

}

    public function jml_barang_keluar_setelah($data){
        if (empty($data['tgl1']) || empty($data['tgl2'])) {
            $where = "";
        } else {
            $where = "AND tgl_msk_gdg >= '$data[tgl1]' AND tgl_msk_gdg <= '$data[tgl2]'";
        }

        $sql = "
    SELECT SUM(a.gdg_qty_out) AS tot_barang_keluar
    FROM tb_gudang_barang_keluar a
    LEFT JOIN tb_gudang_barang_masuk b ON a.kode_tf_in = b.kode_tf_in
    LEFT JOIN tb_prc_po_import_tf p ON b.id_prc_po_import_tf = p.id_prc_po_import_tf
    LEFT JOIN tb_prc_po_import q ON p.no_po_import = q.no_po_import
    LEFT JOIN tb_surat_jalan c ON c.kode_tf_out = a.kode_tf_out
    WHERE q.id_barang = '$data[id_barang]' AND a.is_deleted = 0 $where
";
return $this->db->query($sql);

    }

}
