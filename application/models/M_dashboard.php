<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function id_user(){
        return $this->session->userdata("id_user");
    }
    public function tot_barang_masuk($hariini){
        // $kode_user = $this->kode_user();
        $sql = "SELECT count(id_barang_masuk) tot_barang_masuk FROM tb_gudang_barang_masuk WHERE tgl_msk_gdg='$hariini' AND is_deleted = 0";
        return $this->db->query($sql);
    }
    public function tot_surat_jalan($hariini){
        // $kode_user = $this->kode_user();
        $sql = "SELECT count(id_surat_jalan) tot_surat_jalan FROM tb_surat_jalan WHERE tgl='$hariini' AND is_deleted = 0";

        return $this->db->query($sql);
    }
    public function tot_barang_keluar($hariini){
        // $kode_user = $this->kode_user();
        $sql = "SELECT count(a.id_barang_keluar) tot_barang_keluar FROM tb_gudang_barang_keluar a
                LEFT JOIN tb_surat_jalan b ON b.kode_tf_out = a.kode_tf_out
                WHERE b.tgl='$hariini' AND a.is_deleted = 0 AND b.is_deleted = 0";

        return $this->db->query($sql);
    }
    public function tot_barang(){
        // $kode_user = $this->kode_user();
        $sql = "SELECT count(id_barang) tot_barang FROM tb_master_barang WHERE is_deleted = 0";
        return $this->db->query($sql);
    }
    public function tot_supplier(){
        // $kode_user = $this->kode_user();
        $sql = "SELECT count(id_supplier) tot_supplier FROM tb_master_supplier WHERE is_deleted = 0";
        return $this->db->query($sql);
    }
    public function tot_customer(){
        // $kode_user = $this->kode_user();
        $sql = "SELECT count(id_customer) tot_customer FROM tb_master_customer WHERE is_deleted = 0";
        return $this->db->query($sql);
    }
    public function users(){
        // $kode_user = $this->kode_user();
        $sql = "SELECT * FROM tb_user WHERE is_deleted = 0";
        return $this->db->query($sql);
    }



}
