<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_invoice extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function id_user(){
        return $this->session->userdata("id_user");
    }

    // ambil semua data invoice dengan filter
    public function get_all($nama_customer = null, $date_from = null, $date_until = null){
        $id_user = $this->id_user();
        $sql = "SELECT i.*, c.kode_customer 
                FROM tb_invoice i 
                LEFT JOIN tb_master_customer c ON i.id_customer = c.id_customer 
                WHERE i.is_deleted = 0";
        
        if ($nama_customer) {
            $sql .= " AND i.nama_customer LIKE '%$nama_customer%'";
        }
        
        if ($date_from && $date_until) {
            $date_from = date('Y-m-d', strtotime(str_replace('/', '-', $date_from)));
            $date_until = date('Y-m-d', strtotime(str_replace('/', '-', $date_until)));
            $sql .= " AND i.tgl_invoice BETWEEN '$date_from' AND '$date_until'";
        }
        
        $sql .= " ORDER BY i.created_at DESC";
        
        return $this->db->query($sql)->result();
    }

    // ambil invoice berdasarkan id
    public function get_by_id($id){
        $sql = "SELECT i.*, c.kode_customer, c.alamat_customer, c.kota_kab, c.provinsi, c.nib
                FROM tb_invoice i 
                LEFT JOIN tb_master_customer c ON i.id_customer = c.id_customer 
                WHERE i.id_invoice = '$id' AND i.is_deleted = 0";
        return $this->db->query($sql)->row();
    }

    // tambah invoice
    public function add($data){
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO tb_invoice(no_invoice, id_customer, nama_customer, tgl_invoice, total, status, keterangan, created_at, created_by) 
        VALUES ('$data[no_invoice]','$data[id_customer]','$data[nama_customer]','$data[tgl_invoice]','$data[total]','$data[status]','$data[keterangan]',NOW(),'$id_user')
        ";
        return $this->db->query($sql);
    }

    // update invoice
    public function update($data){
        $id_user = $this->id_user();
        $sql = "
            UPDATE tb_invoice 
            SET no_invoice='$data[no_invoice]',
                id_customer='$data[id_customer]',
                nama_customer='$data[nama_customer]',
                tgl_invoice='$data[tgl_invoice]',
                total='$data[total]',
                status='$data[status]',
                keterangan='$data[keterangan]',
                updated_at=NOW(),
                updated_by='$id_user' 
            WHERE id_invoice='$data[id_invoice]'
        ";
        return $this->db->query($sql);
    }

    // hapus invoice (soft delete)
    public function delete($data){
        $id_user = $this->id_user();
        $sql = "
            UPDATE tb_invoice 
            SET is_deleted='1',
                updated_at=NOW(),
                updated_by='$id_user' 
            WHERE id_invoice='$data[id_invoice]'
        ";
        return $this->db->query($sql);
    }

    // cek no invoice sudah ada
    public function cek_no_invoice($no_invoice, $id_invoice = null){
        $sql = "SELECT COUNT(a.no_invoice) count_ni FROM tb_invoice a
                WHERE a.no_invoice = '$no_invoice' AND a.is_deleted = 0";
        
        if ($id_invoice) {
            $sql .= " AND a.id_invoice != '$id_invoice'";
        }
        
        return $this->db->query($sql)->row()->count_ni;
    }

    // ambil data customer untuk dropdown
    public function get_customers(){
        $sql = "SELECT id_customer, kode_customer, nama_customer, alamat_customer 
                FROM tb_master_customer 
                WHERE is_deleted = 0 
                ORDER BY nama_customer ASC";
        return $this->db->query($sql)->result();
    }

    // generate nomor invoice otomatis
    public function generate_no_invoice(){
        $year = date('Y');
        $month = date('m');
        
        $sql = "SELECT MAX(no_invoice) as last_invoice 
                FROM tb_invoice 
                WHERE no_invoice LIKE 'INV/$year/$month/%' 
                AND is_deleted = 0";
        
        $result = $this->db->query($sql)->row();
        
        if ($result->last_invoice) {
            $last_number = intval(substr($result->last_invoice, -3));
            $new_number = $last_number + 1;
        } else {
            $new_number = 1;
        }
        
        return "INV/$year/$month/" . str_pad($new_number, 3, '0', STR_PAD_LEFT);
    }
}