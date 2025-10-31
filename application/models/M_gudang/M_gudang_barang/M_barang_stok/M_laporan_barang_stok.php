<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan_barang_stok extends CI_Model {
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
            SELECT sum(gdg_qty_in) tot_barang_masuk FROM `tb_gudang_barang_masuk`
            WHERE id_barang_masuk = '$data[id_barang]' AND  is_deleted = 0 $where";
        return $this->db->query($sql);
    }
    public function jml_barang_keluar2($data){
        if ($data['tgl'] ==null) {
            $where = "";
        }else{
            $where = "AND c.tgl<='$data[tgl]'";
        }
        $sql = "
            SELECT sum(a.gdg_gty_out) tot_barang_keluar FROM `tb_gudang_barang_keluar` a 
            LEFT JOIN tb_surat_jalan c ON c.kode_tf_out = a.kode_tf_out
            LEFT JOIN tb_gudang_barang_masuk b ON a.kode_tf_in = b.kode_tf_in 
            WHERE b.id_barang ='$data[id_barang]' AND a.is_deleted = 0 $where"; 
        return $this->db->query($sql);
    }
   


}
