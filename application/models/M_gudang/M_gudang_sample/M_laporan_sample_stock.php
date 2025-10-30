<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan_sample_stock extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function id_user(){
        return $this->session->userdata("id_user");
    }

    // Fungsi untuk mendapatkan stok sample yang sudah di-group (TANPA DUPLIKAT)
    public function get_sample_stock_grouped($id_barang = null)
    {
        $where = "";
        if ($id_barang != null && $id_barang != '') {
            $where = "WHERE b.id_barang = '$id_barang'";
        }

        $sql = "
            SELECT 
                b.id_barang,
                b.nama_barang,
                b.mesh,
                b.satuan,
                COALESCE(SUM(sm.jumlah_masuk), 0) as total_masuk,
                COALESCE(SUM(sk.jumlah_keluar), 0) as total_keluar,
                (COALESCE(SUM(sm.jumlah_masuk), 0) - COALESCE(SUM(sk.jumlah_keluar), 0)) as stok_akhir
            FROM tb_master_barang b
            LEFT JOIN tb_sample_masuk sm ON sm.id_barang = b.id_barang AND sm.is_deleted = 0
            LEFT JOIN tb_sample_keluar sk ON sk.id_barang = b.id_barang AND sk.is_deleted = 0
            $where
            GROUP BY b.id_barang, b.nama_barang, b.mesh, b.satuan
            HAVING total_masuk > 0 OR total_keluar > 0
            ORDER BY b.nama_barang, b.mesh";

        return $this->db->query($sql);
    }

    // Fungsi untuk mendapatkan rincian sample by ID barang
        public function get_rincian_sample_by_id($id_barang)
    {
        // Pastikan nama tabel dan kolom sesuai dengan database Anda
        $this->db->select('
            sm.tgl_masuk_sample,
            sm.kode_sample_in,
            b.nama_barang,
            sm.no_batch,
            sm.jumlah_masuk,
            b.satuan,
            c.nama_customer
        ');
        $this->db->from('tb_sample_masuk sm');
        $this->db->join('tb_master_barang b', 'sm.id_barang = b.id_barang', 'left');
        $this->db->join('tb_master_customer c', 'sm.id_customer = c.id_customer', 'left');
        $this->db->where('sm.id_barang', $id_barang);
        $this->db->where('sm.is_deleted', 0);
        $this->db->order_by('sm.tgl_masuk_sample', 'DESC');
        
        return $this->db->get();
    }


    // Fungsi lama untuk kompatibilitas
    public function get7($id_barang = null)
    {
        return $this->get_sample_stock_grouped($id_barang);
    }

    public function jml_sample_masuk($data){
        if ($data['tgl'] == null) {
            $where = "";
        } else {
            $where = "AND tgl_masuk_sample <= '$data[tgl]'";
        }
        
        $sql = "
            SELECT SUM(jumlah_masuk) as tot_sample_masuk 
            FROM tb_sample_masuk
            WHERE id_barang = '$data[id_barang]' AND is_deleted = 0 $where";
        return $this->db->query($sql);
    }

    public function jml_sample_keluar($data){
        if ($data['tgl'] == null) {
            $where = "";
        } else {
            $where = "AND tgl_keluar_sample <= '$data[tgl]'";
        }
        
        $sql = "
            SELECT SUM(jumlah_keluar) as tot_sample_keluar 
            FROM tb_sample_keluar
            WHERE id_barang = '$data[id_barang]' AND is_deleted = 0 $where"; 
        return $this->db->query($sql);
    }

    public function data_barang_keluar2(){
        $sql = "
            SELECT 
    a.*, 
    b.nama_barang, b.satuan, b.mesh, b.bloom,
    c.nama_customer
    FROM tb_sample_masuk a
    LEFT JOIN tb_master_barang b ON a.id_barang = b.id_barang
    LEFT JOIN tb_master_customer c ON a.id_customer = c.id_customer
    WHERE 
    b.is_deleted = 0
    ORDER BY a.kode_sample_in ASC;
    ";
            return $this->db->query($sql);
    }

     public function ambil_surat_jalan2(){
        $sql = "
            SELECT a.*,b.nama_customer,b.alamat_customer FROM tb_sample_masuk a
            LEFT JOIN tb_master_customer b ON a.id_customer = b.id_customer
            WHERE a.is_deleted = 0 ORDER BY a.created_at DESC";
        return $this->db->query($sql);
    }
}