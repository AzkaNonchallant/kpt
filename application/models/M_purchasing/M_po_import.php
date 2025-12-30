<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_po_import extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function id_user()          
    {
        return $this->session->userdata("id_user");
    } 

    // Method untuk tampilan utama
    public function get($id = null)
    { 
        $sql = "
        SELECT a.*,a.status_po_import,b.nama_barang,b.mesh,b.bloom,b.satuan,b.id_supplier,c.nama_supplier,c.pic_supplier,d.tgl_po_import,d.metode,d.shipment,d.shipment2,d.pic1,d.pic2,d.payment 
        FROM tb_prc_po_import a
        LEFT JOIN tb_master_barang b ON a.id_barang = b.id_barang
        LEFT JOIN tb_master_supplier c ON b.id_supplier = c.id_supplier
        LEFT JOIN tb_prc_po_import_tf d ON a.no_po_import = d.no_po_import
        WHERE a.is_deleted = 0 ORDER BY a.id_prc_po_import DESC
        ";

        return $this->db->query($sql)->result_array();
    }

    public function add_po_import($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO tb_prc_po_import (no_po_import, id_barang, jumlah, harga_perunit, total_harga,status_po_import, created_at, created_by, updated_at, updated_by, is_deleted) 
        VALUES ( '$data[no_po_import]', '$data[id_barang]','$data[jumlah]','$data[harga_perunit]', '$data[total_harga]','proses', NOW(), '$id_user', '0000-00-00 00:00:00', '', '0')";

        return $this->db->insert('tb_prc_po_import', $data);
    }
    
    public function add_import_transfer($data)
    {
        $id_user = $this->id_user();
        
        $shipment = !empty($data['shipment']) ? "'" . $data['shipment'] . "'" : "NULL";
        $shipment2 = !empty($data['shipment2']) ? "'" . $data['shipment2'] . "'" : "NULL";
        
        $sql = "
        INSERT INTO tb_prc_po_import_tf (prc_admin, no_po_import, tgl_po_import, metode, shipment, shipment2, pic1, pic2, payment, created_at, created_by, updated_at, updated_by, is_deleted) 
        VALUES ( '$data[prc_admin]', '$data[no_po_import]', '$data[tgl_po_import]','$data[metode]', $shipment, $shipment2,'$data[pic1]','$data[pic2]','$data[payment]', NOW(), '$id_user', '0000-00-00 00:00:00', '', '0')";

        $this->db->insert('tb_prc_po_import_tf', $data);
    return $this->db->insert_id();
    }

    public function update($data)
    {
        $id_user = $this->id_user();
        
        $shipment = !empty($data['shipment']) ? "'" . $data['shipment'] . "'" : "NULL";
        $shipment2 = !empty($data['shipment2']) ? "'" . $data['shipment2'] . "'" : "NULL";
        
        $sql = "
        UPDATE tb_prc_po_import_tf
        SET 
            tgl_po_import = '$data[tgl_po_import]',
            metode = '$data[metode]',
            shipment = $shipment,
            shipment2 = $shipment2,
            pic1 = '$data[pic1]',
            pic2 = '$data[pic2]',
            payment = '$data[payment]',
            updated_at = NOW(),   
            updated_by = '$id_user' 
            WHERE id_prc_po_import_tf = '$data[id_prc_po_import_tf]'
        ";
        
        $this->db->query($sql);

        $sql2 = "
        UPDATE tb_prc_po_import_tf
        SET 
            prc_admin = '$data[prc_admin]',
            no_po_import = '$data[no_po_import]',
            tgl_po_import = '$data[tgl_po_import]',
            metode = '$data[metode]',
            shipment = $shipment,
            shipment2 = $shipment2,
            pic1 = '$data[pic1]',
            pic2 = '$data[pic2]',
            payment = '$data[payment]',
            updated_at = NOW(),   
            updated_by = '$id_user' 
            WHERE no_po_import = '$data[no_po_import]'
        ";
        
        $this->db->query($sql2);
        return true;
    }

    public function cek_pembelian()
    {
        $sql = "
            SELECT COUNT(status_po_import) as tot_status_spbm FROM tb_prc_po_import WHERE status_po_import = 'Proses' AND is_deleted = 0";
        return $this->db->query($sql)->row_array();
    }

    public function delete($data)
{
    // VALIDASI KERAS
    if (
        !isset($data['id_prc_po_import_tf']) ||
        empty($data['id_prc_po_import_tf'])
    ) {
        return false;
    }

    $this->db->trans_start();


    $this->db->where('id_prc_po_import_tf', $data['id_prc_po_import_tf']);
    $this->db->delete('tb_prc_po_import_tf');

    $this->db->where('id_prc_po_import_tf', $data['id_prc_po_import_tf']);
    $this->db->delete('tb_prc_po_import');

    $this->db->trans_complete();

    // CEK HASIL
    if ($this->db->trans_status() === FALSE) {
        return false;
    }

    return true;
}


    public function cek_no_po_import($no_po_import)
    {
        $sql = "
            SELECT COUNT(a.no_po_import) count_sj FROM tb_prc_po_import a
            WHERE a.no_po_import = '$no_po_import' AND a.is_deleted = 0";
        return $this->db->query($sql)->row_array();
    }

    public function det_ppb_barang($no_po_import, $tgl_po_import)
    {
        $sql = "
            SELECT a.*, b.nama_barang, c.nama_supplier, c.pic_supplier
            FROM tb_prc_po_import a
            LEFT JOIN tb_master_barang b ON a.id_barang = b.id_barang
            LEFT JOIN tb_master_supplier c ON b.id_supplier = c.id_supplier
            WHERE a.no_po_import = '$no_po_import'  ORDER BY a.id_prc_po_import ASC";
        return $this->db->query($sql)->result_array();
    }

    public function get_items_by_po($no_po_import)
    {
        $sql = "
            SELECT a.*, b.nama_barang, c.nama_supplier, c.pic_supplier
            FROM tb_prc_po_import a
            LEFT JOIN tb_master_barang b ON a.id_barang = b.id_barang
            LEFT JOIN tb_master_supplier c ON b.id_supplier = c.id_supplier
            WHERE a.no_po_import = '$no_po_import' ORDER BY a.id_prc_po_import ASC";
        return $this->db->query($sql)->result_array();
    }

    public function get_all_print()
{
    return $this->db
        ->select('tf.*, s.nama_supplier')
        ->from('tb_prc_po_import_tf tf')
        ->join('tb_prc_po_import pi', 'tf.no_po_import = pi.no_po_import', 'left')
        ->join('tb_master_barang mb', 'pi.id_barang = mb.id_barang', 'left')
        ->join('tb_master_supplier s', 'mb.id_supplier = s.id_supplier', 'left')
        ->where('tf.is_deleted', 0)
        ->get()
        ->result();
}

public function get_by_multiple_po($list_po)
    {
        return $this->db
            ->select('
                tf.*,
                s.nama_supplier
            ')
            ->from('tb_prc_po_import_tf tf')
            ->join('tb_prc_po_import pi', 'tf.no_po_import = pi.no_po_import', 'left')
            ->join('tb_master_barang mb', 'pi.id_barang = mb.id_barang', 'left')
            ->join('tb_master_supplier s', 'mb.id_supplier = s.id_supplier', 'left')
            ->where_in('tf.no_po_import', $list_po)
            ->where('tf.is_deleted', 0)
            ->get()
            ->result();
    }

public function get_by_no_po($no_po_import)
{
    return $this->db
        ->select('tf.*, s.nama_supplier, s.alamat_supplier, s.pic_supplier')
        ->from('tb_prc_po_import_tf tf')
        ->join('tb_prc_po_import pi', 'tf.no_po_import = pi.no_po_import', 'left')
        ->join('tb_master_barang mb', 'pi.id_barang = mb.id_barang', 'left')
        ->join('tb_master_supplier s', 'mb.id_supplier = s.id_supplier', 'left')
        ->where('tf.no_po_import', $no_po_import)
        ->where('tf.is_deleted', 0)
        ->get()
        ->row();
}


    
    public function data_supplier_pdf($id)
    {
        $sql = "
        SELECT a.*,c.id_barang,d.id_supplier,d.nama_supplier,d.alamat_supplier FROM tb_prc_po_import a
        LEFT JOIN tb_prc_po_import_tf b ON a.no_po_import = b.no_po_import
        LEFT JOIN tb_master_barang c ON a.id_barang = c.id_barang
        LEFT JOIN tb_master_supplier d ON c.id_supplier = d.id_supplier
        WHERE a.is_deleted = 0 AND id_prc_po_import = '$id'
        ";

        return $this->db->query($sql);
    }

    public function import_pdf($no_po_import)
    {
        $sql = "
        SELECT a.*, b.*,d.nama_supplier,d.alamat_supplier,c.nama_barang,c.mesh,c.bloom,c.satuan FROM tb_prc_po_import a
        LEFT JOIN tb_prc_po_import_tf b ON a.no_po_import = b.no_po_import
        LEFT JOIN tb_master_barang c ON a.id_barang = c.id_barang
        LEFT JOIN tb_master_supplier d ON c.id_supplier = d.id_supplier
        WHERE a.is_deleted = '0' AND  a.no_po_import = '$no_po_import'
        ";

        return $this->db->query($sql);
    }

    public function pdf_import()
    {
        $sql = "
        SELECT a.*, b.*,d.nama_supplier,d.alamat_supplier,c.nama_barang,c.mesh,c.bloom,c.satuan FROM tb_prc_po_import a
        LEFT JOIN tb_prc_po_import_tf b ON a.no_po_import = b.no_po_import
        LEFT JOIN tb_master_barang c ON a.id_barang = c.id_barang
        LEFT JOIN tb_master_supplier d ON c.id_supplier = d.id_supplier
        WHERE a.is_deleted = '0'
        ";

        return $this->db->query($sql);
    }

    public function pdf_data_all()
    {
        $sql = "
        SELECT a.*,c.id_barang,d.id_supplier,d.nama_supplier,d.alamat_supplier FROM tb_prc_po_import a
        LEFT JOIN tb_prc_po_import_tf b ON a.no_po_import = b.no_po_import
        LEFT JOIN tb_master_barang c ON a.id_barang = c.id_barang
        LEFT JOIN tb_master_supplier d ON c.id_supplier = d.id_supplier
        WHERE a.is_deleted = 0
        ";

        return $this->db->query($sql);
    }

}