<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang_keluar extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function id_user(){
        return $this->session->userdata("id_user");
    }

    public function get($tgl = null, $tgl2 = null, $nama_customer = null, $no_sppb = null){

        if ($tgl != null && $tgl2 != null) {
            $tgl = explode("/", $tgl);
            $tgl = "$tgl[2]-$tgl[1]-$tgl[0]";
            $tgl2 = explode("/", $tgl2);
            $tgl2 = "$tgl2[2]-$tgl2[1]-$tgl2[0]";
            $where[] = "AND b.tgl_kirim >= '$tgl' AND  b.tgl_kirim <= '$tgl2'";
        } else if ($tgl ==null && $tgl2 ==null) {
                $where[] = "";
        } else {
            return array();
        }

        if ($nama_customer == null) {
            $where[] = "";
        }  else {
            $where[] = "AND d.nama_customer = '$nama_customer'";
        }

        if ($no_sppb == null) {
            $where[] = "";
        }  else {
            $where[] = "AND b.no_sppb = '$no_sppb'";
        }

        $where = implode(" ", $where);

        $sql = "
            SELECT a.*, b.no_sppb, b.tgl_kirim, b.jumlah_kirim, b.note_gudang,c.id_customer,c.id_barang,d.nama_customer, e.nama_barang, e.mesh, e.bloom FROM tb_gudang_barang_keluar a
            LEFT JOIN tb_mkt_sppb b ON a.id_mkt_sppb = b.id_mkt_sppb
            LEFT JOIN tb_mkt_po_customer c ON b.id_mkt_po_customer = c.id_mkt_po_customer
            LEFT JOIN tb_master_customer d ON c.id_customer = d.id_customer
            LEFT JOIN tb_master_barang e ON c.id_barang = e.id_barang
            WHERE a.is_deleted = 0 $where ORDER BY a.id_barang_keluar DESC";
        return $this->db->query($sql);
    }
    // File: application/models/M_barang_keluar.php

    // public function add_surat_jalan($data)
    // {
    //     $id_user = $this->id_user();
    //     $sql = "
    //     INSERT INTO `tb_surat_jalan`(`kode_tf_out`, `no_surat_jalan`, `tgl`, `id_customer`,`no_sppb`, `no_po`,  `note` ,`created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`)
    //     VALUES ('$data[kode_tf_out]','$data[no_surat_jalan]',NOW(),'$data[id_customer]','$data[no_sppb]', '$data[no_po]', '$data[note_gudang]'  ,NOW(),'$id_user','0000-00-00 00:00:00','','0')
    //     ";
    //     return $this->db->query($sql);
    // }

public function data_barang_keluar($kode_tf_out){
        $sql = "
            SELECT 
    a.*, 
    b.*, 
    c.no_batch,
    c.tgl_exp,
    d.id_barang,
    e.nama_barang, e.satuan, e.mesh, e.bloom,
    f.nama_customer
FROM tb_gudang_barang_keluar a
LEFT JOIN tb_mkt_sppb b ON a.id_mkt_sppb = b.id_mkt_sppb
LEFT JOIN tb_gudang_barang_masuk c ON a.kode_tf_in = c.kode_tf_in
LEFT JOIN tb_mkt_po_customer d ON b.id_mkt_po_customer = d.id_mkt_po_customer
LEFT JOIN tb_master_barang e ON d.id_barang = e.id_barang
LEFT JOIN tb_master_customer f ON d.id_customer = f.id_customer
LEFT JOIN tb_surat_jalan g ON a.kode_tf_out = g.kode_tf_out
WHERE a.kode_tf_out = '$kode_tf_out' 
  AND a.is_deleted = 0 
  AND e.is_deleted = 0
ORDER BY a.kode_tf_out ASC;
";
        return $this->db->query($sql);
    }

    public function data_barang_keluar2(){
        $sql = "
            SELECT 
    a.*, 
    b.*, 
    c.no_batch,
    c.tgl_exp,
    d.id_barang,
    e.nama_barang, e.satuan, e.mesh, e.bloom,
    f.nama_customer
FROM tb_gudang_barang_keluar a
LEFT JOIN tb_mkt_sppb b ON a.id_mkt_sppb = b.id_mkt_sppb
LEFT JOIN tb_gudang_barang_masuk c ON a.kode_tf_in = c.kode_tf_in
LEFT JOIN tb_mkt_po_customer d ON b.id_mkt_po_customer = d.id_mkt_po_customer
LEFT JOIN tb_master_barang e ON d.id_barang = e.id_barang
LEFT JOIN tb_master_customer f ON d.id_customer = f.id_customer
LEFT JOIN tb_surat_jalan g ON a.kode_tf_out = g.kode_tf_out
WHERE 
 e.is_deleted = 0
ORDER BY a.kode_tf_out ASC;
";
        return $this->db->query($sql);
    }
    public function cek_surat_jalan($no_surat_jalan){
        $sql = "
            SELECT COUNT(a.kode_tf_out) count_sj FROM tb_surat_jalan a
            WHERE a.no_surat_jalan = '$no_surat_jalan' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }

    public function cek_kode_tf_out($kode_tf_out){
        $sql = "
            SELECT COUNT(a.kode_tf_out) count_kto FROM tb_surat_jalan a
            WHERE a.kode_tf_out = '$kode_tf_out' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }

    public function add_barang_keluar($data)
    {
        $id_user = $this->id_user();
        $sql = "
        UPDATE `tb_gudang_barang_keluar`
        SET `kode_tf_in` = '$data[kode_tf_in]', `no_surat_jalan`='$data[no_surat_jalan]',`gdg_admin` =  '$data[gdg_admin]',`created_at` = NOW(), `created_by` = '$id_user',`updated_at`=NOW(),`updated_by`='$id_user', `is_deleted`='0'
        WHERE `kode_tf_out`='$data[kode_tf_out]'
        ";
         $this->db->query($sql);


         // 2. Insert ke tb_surat_jalan

          $sql2 = "
            INSERT INTO `tb_surat_jalan`(`kode_tf_out`, `no_surat_jalan`, `tgl`, `id_customer`,`no_sppb`, `no_po`,  `note` ,`created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`)
            VALUES ('$data[kode_tf_out]','$data[no_surat_jalan]',NOW(),'$data[id_customer]','$data[no_sppb]', '$data[no_po]', '$data[note_gudang]'  ,NOW(),'$id_user','0000-00-00 00:00:00','0','0')
        ";
        $this->db->query($sql2);

        //merubah status sppb menjadi selesai
        $sql3 = "
        UPDATE `tb_mkt_sppb`
        SET `status_sppb`='Selesai'
        WHERE `id_mkt_sppb`='$data[id_mkt_sppb]'
        ";
        $this->db->query($sql3);
        return TRUE;
    }

    public function update_status_sppb($id_mkt_sppb, $status_sppb)
    {
        $sql = "
        UPDATE `tb_mkt_sppb`
        SET `status_sppb`='$status_sppb'
        WHERE `id_mkt_sppb`='$id_mkt_sppb';
        ";
        return $this->db->query($sql);
    }

    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_gudang_barang_keluar` 
            SET `no_surat_jalan`='$data[no_surat_jalan]',`updated_at`=NOW(),`updated_by`='$id_user' 
            WHERE `id_barang_keluar`='$data[id_barang_keluar]'
        ";
        return $this->db->query($sql);
    }

    public function delete($data)
    {
        $id_user = $this->id_user();
        $sql = "
           DELETE FROM `tb_gudang_barang_keluar`
            WHERE `id_barang_keluar`='$data[id_barang_keluar]'
        ";
        return $this->db->query($sql);
    }

    public function jml_barang_keluar($data){
        $sql = "
            SELECT sum(b.jumlah_kirim) qty_out FROM `tb_gudang_barang_keluar` a
            LEFT JOIN tb_mkt_sppb b ON a.id_mkt_sppb = b.id_mkt_sppb 
            WHERE a.kode_tf_in='$data[kode_tf_in]' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }
    public function jml_barang_keluar2($data){
        $sql = "
            SELECT sum(a.qty) tot_barang_keluar FROM `tb_gudang_barang_keluar` a 
            LEFT JOIN tb_barang_masuk b ON a.kode_tf_in = b.kode_tf_in 
            WHERE b.id_customer ='$data[id_customer]' AND a.is_deleted = 0"; 
        return $this->db->query($sql);
    }
    // Di model M_barang_keluar, perbaiki method ambil_surat_jalan:
public function ambil_surat_jalan($kode_tf_out = null){
        $sql = "
            SELECT a.*,b.nama_customer,b.alamat_customer FROM tb_surat_jalan a
            LEFT JOIN tb_master_customer b ON a.id_customer = b.id_customer
            WHERE a.is_deleted = 0 AND a.kode_tf_out = '$kode_tf_out' ORDER BY a.created_at DESC";
        return $this->db->query($sql);
    }

    public function ambil_surat_jalan2(){
        $sql = "
            SELECT a.*,b.nama_customer,b.alamat_customer FROM tb_surat_jalan a
            LEFT JOIN tb_master_customer b ON a.id_customer = b.id_customer
            WHERE a.is_deleted = 0 ORDER BY a.created_at DESC";
        return $this->db->query($sql);
    }
}
