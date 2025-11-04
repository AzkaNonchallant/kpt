<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan_kartu_sample extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    function id_user() {
        return $this->session->userdata("id_user");
    }

    // === SAMPLE MASUK ===
    public function jml_sample_masuk($data) {
        if ($data['tgl'] ==null) {
            $where = "";
        }else{
            $where = "AND a.tgl_masuk_sample<='$data[tgl]'";
        }

        $sql = "
            SELECT 
                SUM(a.jumlah_masuk) AS tot_sample_masuk,
                c.nama_barang
            FROM tb_sample_masuk a
            LEFT JOIN tb_master_barang c ON a.id_barang = c.id_barang
            WHERE a.id_barang = '$data[id_barang]' 
                AND a.is_deleted = 0 
                $where
        ";

        return $this->db->query($sql);
    }

    // === SAMPLE KELUAR ===
    public function jml_sample_keluar2($data) {
        if ($data['tgl'] ==null) {
            $where = "";
        }else{
            $where = "AND a.tgl_masuk_sample<='$data[tgl]'";
        }

        $sql = "
            SELECT 
                SUM(a.jumlah_keluar) AS tot_sample_keluar,
                b.nama_barang
            FROM tb_sample_keluar a
            LEFT JOIN tb_master_barang b ON a.id_barang = b.id_barang
            WHERE a.id_barang = '$data[id_barang]'
                AND a.is_deleted = 0 
                $where
        ";

        return $this->db->query($sql);
    }

    // === SAMPLE MASUK SETELAH TANGGAL ===
    public function jml_sample_masuk_setelah($data) {
        if (empty($data['tgl1']) || empty($data['tgl2'])) {
            $where = "";
        } else {
            $where = "AND a.tgl_masuk_sample >= '$data[tgl1]' AND a.tgl_masuk_sample <= '$data[tgl2]'";
        }

        $sql = "
            SELECT 
                SUM(a.jumlah_masuk) AS tot_sample_masuk
            FROM tb_sample_masuk a
            LEFT JOIN tb_master_barang b ON a.id_barang = b.id_barang
            WHERE a.id_barang = '$data[id_barang]' 
                AND a.is_deleted = 0 
                $where
        ";

        return $this->db->query($sql);
    }

    // === SAMPLE KELUAR SETELAH TANGGAL ===
    public function jml_sample_keluar_setelah($data) {
        if (empty($data['tgl1']) || empty($data['tgl2'])) {
            $where = "";
        } else {
            $where = "AND a.tgl_masuk_sample >= '$data[tgl1]' AND a.tgl_masuk_sample <= '$data[tgl2]'";
        }

        $sql = "
            SELECT 
                SUM(a.jumlah_keluar) AS tot_sample_keluar
            FROM tb_sample_keluar a
            LEFT JOIN tb_master_barang b ON a.id_barang = b.id_barang
            WHERE a.id_barang = '$data[id_barang]' 
                AND a.is_deleted = 0 
                $where
        ";

        return $this->db->query($sql);
    }
}