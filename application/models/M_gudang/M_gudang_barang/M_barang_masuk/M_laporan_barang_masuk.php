<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan_barang_masuk extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function id_user(){
        return $this->session->userdata("id_user");
    }
    public function get($tgl = null,$tgl2 = null, $batch = null){
        if ($tgl != null && $tgl2 != null) {
            $tgl = explode("/", $tgl);
            $tgl = "$tgl[2]-$tgl[1]-$tgl[0]";
            $tgl2 = explode("/", $tgl2);
            $tgl2 = "$tgl2[2]-$tgl2[1]-$tgl2[0]";
            $where[] = "AND a.tgl >= '$tgl' AND  a.tgl <= '$tgl2'";
        } else if ($tgl ==null && $tgl2 ==null) {
                $where[] = "";
        } else {
            return array();
        }

        if ($batch == null) {
            $where[] = "";
        }  else {
            $where[] = "AND a.no_batch = '$batch'";
        }

        $where = implode(" ", $where);
        $sql = "
            SELECT a.*,b.nama_supplier,c.* FROM tb_gudang_barang_masuk a
            LEFT JOIN tb_prc_po_pembelian p ON a.id_prc_po_pembelian = p.id_prc_po_pembelian
            LEFT JOIN tb_master_barang c ON p.id_barang = c.id_barang
            LEFT JOIN tb_master_supplier b ON c.id_supplier = b.id_supplier
            WHERE a.is_deleted = 0 $where ORDER BY a.tgl_msk_gdg ASC";
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