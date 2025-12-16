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

    public function get($id = null)
    { 
        $sql = "
        SELECT a.*,b.nama_barang,b.mesh,b.bloom,b.satuan,b.id_supplier,c.nama_supplier,c.pic_supplier,d.tgl_po_import,d.metode,d.shipment,d.shipment2,d.pic1,d.pic2,d.payment FROM tb_prc_po_import a
        LEFT JOIN tb_master_barang b ON a.id_barang = b.id_barang
        LEFT JOIN tb_master_supplier c ON b.id_supplier = c.id_supplier
        LEFT JOIN tb_prc_po_import_tf d ON a.no_po_import = d.no_po_import
        WHERE a.is_deleted = 0 ORDER BY a.id_prc_po_import DESC
        ";

        return $this->db->query($sql);
        
    }

    public function add_po_import($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO tb_prc_po_import (no_po_import, id_barang, jumlah, harga_perunit, total_harga, created_at, created_by, updated_at, updated_by, is_deleted) 
        VALUES ( '$data[no_po_import]', '$data[id_barang]','$data[jumlah]','$data[harga_perunit]', '$data[total_harga]', NOW(), '$id_user', '0000-00-00 00:00:00', '', '0')";

        return $this->db->query($sql);
      

    }
    
    public function add_import_transfer($data)
    {
        $id_user = $this->id_user();
        
        // Handle shipment dan shipment2
        $shipment = !empty($data['shipment']) ? "'" . $data['shipment'] . "'" : "NULL";
        $shipment2 = !empty($data['shipment2']) ? "'" . $data['shipment2'] . "'" : "NULL";
        
        $sql = "
        INSERT INTO tb_prc_po_import_tf (prc_admin, no_po_import, tgl_po_import, metode, shipment, shipment2, pic1, pic2, payment, status_po_import, created_at, created_by, updated_at, updated_by, is_deleted) 
        VALUES ( '$data[prc_admin]', '$data[no_po_import]', '$data[tgl_po_import]','$data[metode]', $shipment, $shipment2,'$data[pic1]','$data[pic2]','$data[payment]','proses', NOW(), '$id_user', '0000-00-00 00:00:00', '', '0')";

        $this->db->query($sql);
        $id_po_import_tf = $this->db->insert_id();

        // ======================
        // 2. Generate kode TFIN berurutan
        // ======================
        $this->db->select('kode_tf_in');
        $this->db->from('tb_gudang_barang_masuk');
        $this->db->like('kode_tf_in', 'TFIN-', 'after');
        $this->db->order_by('id_barang_masuk', 'DESC'); // pakai id biar aman
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $lastKode = $query->row()->kode_tf_in;
            $lastNumber = (int) str_replace('TFIN-', '', $lastKode);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1; // kalau belum ada data
        }

        $kode_tf = 'TFIN-' . $newNumber;

        // ======================
        // 3. Insert ke tb_gudang_barang_masuk
        // ======================
        $data_gudang = [
            'kode_tf_in' => $kode_tf,
            'id_prc_po_import_tf' => $id_po_import_tf,
            // 'gdg_qty_in' => $data['jumlah_po_pembelian'],
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $id_user
        ];

        $this->db->insert('tb_gudang_barang_masuk', $data_gudang);

        return true;
    
    }

    public function update($data)
    {
        $id_user = $this->id_user();
        
        // Handle shipment dan shipment2 untuk update
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

        // Logging query untuk debugging
        log_message('debug', 'Query update: ' . $this->db->last_query());
        
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

        // Logging query untuk debugging
        log_message('debug', 'Query update tf: ' . $this->db->last_query());
        $this->db->query($sql2);
        return true;
    }

    public function cek_pembelian()
    {
        $sql = "
            SELECT COUNT(status_po_import) as tot_status_spbm FROM tb_prc_po_import WHERE status_po_import = 'Proses' AND is_deleted = 0";
        return $this->db->query($sql);
    }

    public function delete($data)
    {
        $id_user = $this->id_user();

        $sql1 = "
        DELETE FROM tb_prc_po_import_tf 
        WHERE no_po_import='$data[no_po_import]'
    ";
    $sql = "
       DELETE FROM tb_prc_po_import
        WHERE no_po_import='$data[no_po_import]'
    ";
    $this->db->query($sql);
    return $this->db->query($sql1);
    }

    public function cek_no_po_import($no_po_import)
    {
        $sql = "
            SELECT COUNT(a.no_po_import) count_sj FROM tb_prc_po_import a
            WHERE a.no_po_import = '$no_po_import' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }

    public function det_ppb_barang($no_po_import)
    {
        $sql = "
            SELECT a.*, b.nama_barang, c.nama_supplier, c.pic_supplier
            FROM tb_prc_po_import a
            LEFT JOIN tb_master_barang b ON a.id_barang = b.id_barang
            LEFT JOIN tb_master_supplier c ON b.id_supplier = c.id_supplier
            WHERE a.no_po_import = '$no_po_import' ORDER BY a.id_prc_po_import ASC";
        return $this->db->query($sql);
    }
}