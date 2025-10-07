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
            SELECT a.*,b.id_barang,b.jumlah_po_pembelian,b.harga_po_pembelian,c.kode_barang,c.nama_barang,c.mesh,c.bloom,c.satuan,d.nama_supplier FROM tb_gudang_barang_masuk a
            LEFT JOIN tb_prc_po_pembelian b ON a.id_prc_po_pembelian = b.id_prc_po_pembelian
            LEFT JOIN tb_master_barang c ON b.id_barang = c.id_barang
            LEFT JOIN tb_master_supplier d ON c.id_supplier = d.id_supplier

            WHERE a.is_deleted = 0 $where ORDER BY a.id_barang_masuk DESC";
        return $this->db->query($sql)->result_array();
    }

        public function get2($id = null){
        // $kode_user = $this->kode_user();
        $sql = "SELECT * FROM tb_gudang_barang_masuk WHERE is_deleted = 0 ORDER BY id_barang_masuk DESC";

        return $this->db->query($sql);
    }

        public function get3($id = null ){
            
        $sql = "
            SELECT a.*,b.id_barang,b.jumlah_po_pembelian,b.harga_po_pembelian,c.kode_barang,c.nama_barang,c.mesh,c.bloom,c.satuan,d.nama_supplier FROM tb_gudang_barang_masuk a
            LEFT JOIN tb_prc_po_pembelian b ON a.id_prc_po_pembelian = b.id_prc_po_pembelian
            LEFT JOIN tb_master_barang c ON b.id_barang = c.id_barang
            LEFT JOIN tb_master_supplier d ON c.id_supplier = d.id_supplier

            WHERE a.is_deleted = 0 ORDER BY a.id_barang_masuk DESC";
        return $this->db->query($sql);
    }

        public function jml_barang_masuk($data){
        $sql = "
            SELECT sum(gdg_qty_in) tot_barang_masuk FROM `tb_gudang_barang_masuk` 
            WHERE id_barang_masuk ='$data[id_barang_masuk]' AND is_deleted = 0"; 
        return $this->db->query($sql);
        }

        public function get_kode_tf_in(){
        
        $sql = "SELECT MAX(kode_tf_in) as kode_tf_in from tb_gudang_barang_masuk";
        return $this->db->query($sql);
        }

}