<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sppb extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function id_user(){
        return $this->session->userdata("id_user");
    }
    public function get()
    {
        
        $sql = "
            SELECT a.*,b.no_po_customer, b.jumlah_po_customer, c.nama_customer,d.kode_barang,d.nama_barang,d.mesh,d.bloom,d.satuan FROM tb_mkt_sppb a
            LEFT JOIN tb_mkt_po_customer b ON a.id_mkt_po_customer = b.id_mkt_po_customer
            LEFT JOIN tb_master_customer c ON b.id_customer = c.id_customer
            LEFT JOIN tb_master_barang d ON b.id_barang = d.id_barang
            WHERE a.is_deleted = 0 ORDER BY a.tgl_sppb DESC";
            return $this->db->query($sql);
    }

    public function get_sppb()
    {

        $sql = "
            SELECT a.*,b.no_po_customer, b.jumlah_po_customer, c.nama_customer, c.id_customer,d.kode_barang,d.nama_barang,d.mesh,d.bloom,d.satuan, e.kode_tf_out FROM tb_mkt_sppb a
            LEFT JOIN tb_mkt_po_customer b ON a.id_mkt_po_customer = b.id_mkt_po_customer
            LEFT JOIN tb_master_customer c ON b.id_customer = c.id_customer
            LEFT JOIN tb_master_barang d ON b.id_barang = d.id_barang
            LEFT JOIN tb_gudang_barang_keluar e ON a.id_mkt_sppb = e.id_mkt_sppb
            WHERE a.status_sppb = 'Proses' AND a.is_deleted = 0 
            ORDER BY a.tgl_sppb DESC";
            return $this->db->query($sql);
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO tb_mkt_sppb(no_sppb, tgl_sppb, id_mkt_po_customer, kode_tf_in, tgl_kirim, jumlah_kirim, note_gudang, harga_kirim,note_pembayaran, mkt_admin, status_sppb,created_at, created_by, updated_at, updated_by, is_deleted) 
        VALUES ('$data[no_sppb]','$data[tgl_sppb]','$data[id_mkt_po_customer]','$data[kode_tf_in]','$data[tgl_kirim]','$data[jumlah_kirim]','$data[note_gudang]','$data[harga_kirim]','$data[note_pembayaran]', '$data[mkt_admin]','Proses',  NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";
        
        $this->db->query($sql);

        $id_mkt_sppb = $this->db->insert_id();

        //generate kode_tf_out
        $this->db->select('kode_tf_out');
        $this->db->from('tb_gudang_barang_keluar');
        $this->db->like('kode_tf_out', 'TFOUT-', 'after');
        $this->db->order_by('id_barang_keluar', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();

        if($query->num_rows() > 0) {
            $lastKode = $query->row()->kode_tf_out;
            $lastNumber = (int) str_replace('TFOUT-', '', $lastKode);
            $newNumber = $lastNumber + 1;
        }else {
            $newNumber = 1;
        }
        $kode_tf_out = 'TFOUT-' . $newNumber;

        $data_gudang = [
            'kode_tf_out' => $kode_tf_out,
            'id_mkt_sppb' => $id_mkt_sppb,
        ];
        $this->db->insert('tb_gudang_barang_keluar', $data_gudang);
        return TRUE;
    }
    
    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE tb_mkt_sppb 
            SET no_sppb='$data[no_sppb]',
            tgl_sppb='$data[tgl_sppb]',
            id_mkt_po_customer='$data[id_mkt_po_customer]',
            tgl_kirim='$data[tgl_kirim]',
            jumlah_kirim='$data[jumlah_kirim]',
            note_gudang='$data[note_gudang]',
            harga_kirim='$data[harga_kirim]',
            note_pembayaran='$data[note_pembayaran]',
            mkt_admin='$data[mkt_admin]',
            updated_at=NOW(),updated_by='$id_user' 
            WHERE id_mkt_sppb='$data[id_mkt_sppb]'
        ";
        return $this->db->query($sql);
        // return $sql;
    }

    public function delete($data)
    {
        $id_user = $this->id_user();

        $sql = "
        UPDATE  tb_mkt_sppb
        SET is_deleted='1', updated_at=NOW(), updated_by='$id_user'
        WHERE id_mkt_sppb='$data[id_mkt_sppb]'
        ";
        return $this->db->query($sql);
    }

    public function jml_sppb($data){
        $sql = "
            SELECT sum(jumlah_kirim) tot_sppb FROM tb_mkt_sppb WHERE id_mkt_po_customer='$data[id_mkt_po_customer]' AND is_deleted = 0";
        return $this->db->query($sql);
    }

    public function jml_sppb_keluar($data){
        $sql = "
            SELECT sum(jumlah_kirim) tot_sppb FROM tb_mkt_sppb WHERE kode_tf_in='$data[kode_tf_in]' AND is_deleted = 0";
        return $this->db->query($sql);
    }

    public function cek_no_sppb($no_sppb){
        $sql = "
            SELECT COUNT(a.no_sppb) count_ns FROM tb_mkt_sppb a
            WHERE a.no_sppb = '$no_sppb' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }

    public function ambil_detail($no_sppb)
    {
        $sql = "
            SELECT a.*,b.no_po, b.jumlah_po, c.nama_customer,d.kode_barang,d.nama_barang,d.mesh,d.bloom,d.satuan FROM tb_mkt_sppb a
            LEFT JOIN tb_mkt_po_customer b ON a.id_mkt_po_customer = b.id_mkt_po_customer
            LEFT JOIN tb_customer c ON b.id_customer = c.id_customer
            LEFT JOIN tb_barang d ON b.id_barang = d.id_barang
            WHERE a.is_deleted = 0 AND a.no_sppb = '$no_sppb' ORDER BY a.tgl_sppb DESC";
            return $this->db->query($sql);
    }


}