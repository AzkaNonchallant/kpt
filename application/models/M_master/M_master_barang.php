<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_master_barang extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function id_user(){
        return $this->session->userdata("id_user");
    }
    
    public function get($id = null){
        // $kode_user = $this->kode_user();
        $sql = "
        SELECT a.*,b.nama_supplier FROM tb_master_barang a
        LEFT JOIN tb_master_supplier b ON a.id_supplier = b.id_supplier

        WHERE a.is_deleted = 0 ORDER BY a.created_at ASC";

        return $this->db->query($sql);
    }

    public function get2($id = null){

            $sql = "
                SELECT a.*,b.no_batch, b.tgl, b.qty, c.nama_supplier FROM tb_master_barang a
                LEFT JOIN tb_gudang_barang_masuk b ON a.id_barang = b.id_barang
                LEFT JOIN tb_master_supplier c ON b.id_supplier = c.id_supplier

                WHERE a.is_deleted = 0 ORDER BY a.created_at DESC";
            return $this->db->query($sql);
        }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_master_barang`(`kode_barang`, `kode_barang_bpom`,  `nama_barang`, `mesh`, `bloom`, `satuan`, `id_supplier`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[kode_barang]','$data[kode_barang_bpom]','$data[nama_barang]','$data[mesh]','$data[bloom]','$data[satuan]','$data[id_supplier]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";

        return $this->db->query($sql);
    }
    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_master_barang` 
            SET `kode_barang`='$data[kode_barang]',`nama_barang`='$data[nama_barang]',`mesh`='$data[mesh]',`bloom`='$data[bloom]',`satuan`='$data[satuan]',`id_supplier`='$data[id_supplier]',`updated_at`=NOW(),`updated_by`='$id_user' 
            WHERE `id_barang`='$data[id_barang]'
        ";
        return $this->db->query($sql);
        // return $sql;
    }


    public function delete($data)
    {
        $id_user = $this->id_user();
        $sql = "
           UPDATE `tb_master_barang` 
           SET `is_deleted`='1',`updated_at`=NOW(),`updated_by`='$id_user' 
            WHERE `id_barang`='$data[id_barang]'
        ";
        return $this->db->query($sql);
    }

    public function cek_kode_barang($kode_barang){
        $sql = "
            SELECT COUNT(a.kode_barang) count_kb FROM tb_master_barang a
            WHERE a.kode_barang = '$kode_barang' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }


}
