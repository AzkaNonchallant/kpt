<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan_barang_stok_2 extends CI_Model {
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
            $where = "AND tgl<='$data[tgl]'";
        }
        $sql = "
            SELECT sum(qty) tot_barang_masuk FROM `tb_barang_masuk`
            WHERE id_barang = '$data[id_barang]' AND  is_deleted = 0 $where";
        return $this->db->query($sql);
    }
    public function jml_barang_keluar2($data){
        if ($data['tgl'] ==null) {
            $where = "";
        }else{
            $where = "AND c.tgl<='$data[tgl]'";
        }
        $sql = "
            SELECT sum(a.qty) tot_barang_keluar FROM `tb_barang_keluar` a 
            LEFT JOIN tb_surat_jalan c ON c.kode_tf_out = a.kode_tf_out
            LEFT JOIN tb_barang_masuk b ON a.kode_tf_in = b.kode_tf_in 
            WHERE b.id_barang ='$data[id_barang]' AND a.is_deleted = 0 $where"; 
        return $this->db->query($sql);
    }
   
    public function data_barang_stok($id_barang){
        $sql = "
            SELECT a.*,b.nama_supplier,c.kode_barang,c.nama_barang,c.satuan FROM tb_barang_masuk a
            LEFT JOIN tb_supplier b ON a.id_supplier = b.id_supplier
            LEFT JOIN tb_barang c ON a.id_barang = c.id_barang
            WHERE a.id_barang = '$id_barang' AND  a.is_deleted = 0 ORDER BY a.id_barang_masuk DESC";
    return $this->db->query($sql);
}


}
