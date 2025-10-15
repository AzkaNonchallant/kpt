<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_po_sample extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function id_user(){
        return $this->session->userdata("id_user");
    }

    public function get()
    {
        $sql = "
            SELECT a.*,b.nama_customer,c.kode_barang,c.nama_barang,c.mesh,c.bloom,c.satuan FROM tb_mkt_po_sample a
            LEFT JOIN tb_master_customer b ON a.id_customer = b.id_customer
            LEFT JOIN tb_master_barang c ON a.id_barang = c.id_barang
            WHERE a.is_deleted = 0  ORDER BY a.tgl_po_sample DESC";
            return $this->db->query($sql)->result_array();
    }


    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO tb_mkt_po_sample (tgl_po_sample,id_customer,id_barang,kode_tf_in,jumlah_po_sample,ket_po_sample,mkt_admin,created_by,created_at,updated_by,updated_at,is_deleted)
        VALUES ('$data[tgl_po_sample]','$data[id_customer]','$data[id_barang]','$data[kode_tf_in]','$data[jumlah_po_sample]','$data[ket_po_sample]','$data[mkt_admin]','$id_user',NOW(),'$id_user',0,0)
        ";

        return $this->db->query($sql);
    }

    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
        UPDATE tb_mkt_po_sample SET tgl_po_sample='$data[tgl_po_sample]', id_customer = '$data[id_customer]', id_barang = '$data[id_barang]', jumlah_po_sample = '$data[jumlah_po_sample]', ket_po_sample = '$data[ket_po_sample]', mkt_admin = '$data[mkt_admin]', updated_at=NOW(), updated_by='$id_user' WHERE id_mkt_po_sample = '$data[id_mkt_po_sample]'
        ";

        return $this->db->query($sql);
    }

    public function delete($data)
    {
        $id_user = $this->id_user();
        $sql = "
        UPDATE tb_mkt_po_sample SET is_deleted = 1, updated_at=NOW(), updated_by='$id_user' WHERE id_mkt_po_sample = '$data[id_mkt_po_sample]'
        ";

        return $this->db->query($sql);
    }
}