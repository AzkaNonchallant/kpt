<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan_sample_stock extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function id_user(){
        return $this->session->userdata("id_user");
    }

    // Fungsi untuk mendapatkan stok sample - HANYA jumlah_masuk sebagai stock_akhir
    public function get_sample_stock_grouped($id_barang = null, $id_customer = null, $tgl_mulai = null, $tgl_selesai = null)
    {
        $where = "WHERE sm.is_deleted = 0";
        
        if ($id_barang != null && $id_barang != '') {
            $where .= " AND b.id_barang = '$id_barang'";
        }
        
        if ($id_customer != null && $id_customer != '') {
            $where .= " AND sm.id_customer = '$id_customer'";
        }
        
        if ($tgl_mulai != null && $tgl_mulai != '') {
            $tgl_mulai_db = date('Y-m-d', strtotime($tgl_mulai));
            $where .= " AND sm.tgl_masuk_sample >= '$tgl_mulai_db'";
        }
        
        if ($tgl_selesai != null && $tgl_selesai != '') {
            $tgl_selesai_db = date('Y-m-d', strtotime($tgl_selesai));
            $where .= " AND sm.tgl_masuk_sample <= '$tgl_selesai_db'";
        }

        $sql = "
        SELECT 
            b.id_barang,
            b.nama_barang,
            b.mesh,
            b.satuan,
            COALESCE(SUM(sm.jumlah_masuk), 0) AS total_masuk,
            (
                SELECT COALESCE(SUM(sk.jumlah_keluar), 0)
                FROM tb_sample_keluar sk
                LEFT JOIN tb_sample_masuk sm2 ON sk.no_batch = sm2.no_batch
                WHERE sm2.id_barang = b.id_barang
                AND sk.is_deleted = 0
            ) AS total_keluar,
            (
                COALESCE(SUM(sm.jumlah_masuk), 0) -
                (
                    SELECT COALESCE(SUM(sk.jumlah_keluar), 0)
                    FROM tb_sample_keluar sk
                    LEFT JOIN tb_sample_masuk sm2 ON sk.no_batch = sm2.no_batch
                    WHERE sm2.id_barang = b.id_barang
                    AND sk.is_deleted = 0
                )
            ) AS stok_akhir,
            MAX(sm.tgl_masuk_sample) AS tanggal_terakhir
        FROM tb_sample_masuk sm
        LEFT JOIN tb_master_barang b ON sm.id_barang = b.id_barang
        $where
        GROUP BY b.id_barang, b.nama_barang, b.mesh, b.satuan
        HAVING stok_akhir > 0
        ORDER BY tanggal_terakhir ASC;
    ";

    return $this->db->query($sql);
}

   public function get_rincian_sample_by_id($id_barang, $id_customer = null, $tgl_mulai = null, $tgl_selesai = null)
{
    $where = "sm.is_deleted = 0 AND sm.id_barang = '$id_barang'";
    
    if (!empty($id_customer)) {
        $where .= " AND sm.id_customer = '$id_customer'";
    }

    if (!empty($tgl_mulai) && !empty($tgl_selesai)) {
        $where .= " AND DATE(sm.tgl_masuk_sample) BETWEEN '$tgl_mulai' AND '$tgl_selesai'";
    }

    $sql = "
        SELECT 
            sm.id_sample_masuk,
            sm.kode_sample_in,
            sm.no_batch,
            sm.tgl_masuk_sample,
            sm.jumlah_masuk,
            sk.jumlah_keluar,
            COALESCE(sm.jumlah_masuk, 0) - COALESCE(sk.jumlah_keluar, 0) AS stok_akhir,
            sm.id_barang,
            b.nama_barang,
            b.satuan
        FROM tb_sample_masuk sm
        LEFT JOIN tb_master_barang b ON sm.id_barang = b.id_barang
        LEFT JOIN (
            SELECT 
                no_batch,
                SUM(jumlah_keluar) AS jumlah_keluar
            FROM tb_sample_keluar
            WHERE is_deleted = 0
            GROUP BY no_batch
        ) sk ON sk.no_batch = sm.no_batch
        WHERE $where
        ORDER BY sm.tgl_masuk_sample ASC
    ";

    return $this->db->query($sql);
}


    public function data_barang_keluar2($filter = [])
    {
        $where = "WHERE b.is_deleted = 0";
        
        if (!empty($filter['id_barang'])) {
            $where .= " AND b.id_barang = '{$filter['id_barang']}'";
        }
        
        if (!empty($filter['id_customer'])) {
            $where .= " AND a.id_customer = '{$filter['id_customer']}'";
        }
        
        if (!empty($filter['tgl_mulai'])) {
            $tgl_mulai_db = date('Y-m-d', strtotime($filter['tgl_mulai']));
            $where .= " AND a.tgl_masuk_sample >= '$tgl_mulai_db'";
        }
        
        if (!empty($filter['tgl_selesai'])) {
            $tgl_selesai_db = date('Y-m-d', strtotime($filter['tgl_selesai']));
            $where .= " AND a.tgl_masuk_sample <= '$tgl_selesai_db'";
        }

        $sql = "
           SELECT 
            sm.id_sample_masuk,
            sm.kode_sample_in,
            sm.no_batch,
            sm.tgl_masuk_sample,
            sm.jumlah_masuk,
            sk.jumlah_keluar,
            COALESCE(sm.jumlah_masuk, 0) - COALESCE(sk.jumlah_keluar, 0) AS stok_akhir,
            sm.id_barang,
            b.nama_barang,
            b.satuan
        FROM tb_sample_masuk sm
        LEFT JOIN tb_master_barang b ON sm.id_barang = b.id_barang
        LEFT JOIN (
            SELECT 
                no_batch,
                SUM(jumlah_keluar) AS jumlah_keluar
            FROM tb_sample_keluar
            WHERE is_deleted = 0
            GROUP BY no_batch
        ) sk ON sk.no_batch = sm.no_batch
        $where
        ORDER BY sm.tgl_masuk_sample ASC
    ";
            
        return $this->db->query($sql);
    }

    public function ambil_surat_jalan2($filter = [])
    {
        $where = "WHERE a.is_deleted = 0";
        
        if (!empty($filter['id_barang'])) {
            $where .= " AND a.id_barang = '{$filter['id_barang']}'";
        }
        
        if (!empty($filter['id_customer'])) {
            $where .= " AND a.id_customer = '{$filter['id_customer']}'";
        }
        
        if (!empty($filter['tgl_mulai'])) {
            $tgl_mulai_db = date('Y-m-d', strtotime($filter['tgl_mulai']));
            $where .= " AND a.tgl_masuk_sample >= '$tgl_mulai_db'";
        }
        
        if (!empty($filter['tgl_selesai'])) {
            $tgl_selesai_db = date('Y-m-d', strtotime($filter['tgl_selesai']));
            $where .= " AND a.tgl_masuk_sample <= '$tgl_selesai_db'";
        }

        $sql = "
            SELECT a.*, b.nama_customer, b.alamat_customer 
            FROM tb_sample_masuk a
            LEFT JOIN tb_master_customer b ON a.id_customer = b.id_customer
            $where 
            ORDER BY a.created_at DESC";
            
        return $this->db->query($sql);
    }
    
}