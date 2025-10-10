<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_invoice extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function id_user(){
        return $this->session->userdata("id_user");
    }

    public function get()
    {

        // SELECT a.*,b.nama_customer,c.kode_barang,c.nama_barang,c.mesh,c.bloom,c.satuan FROM tb_mkt_po_customer a
        //     LEFT JOIN tb_master_customer b ON a.id_customer = b.id_customer
        //     LEFT JOIN tb_master_barang c ON a.id_barang = c.id_barang
        //     WHERE a.is_deleted = 0 $where ORDER BY a.tgl_po_customer DESC";

        // //  $where = implode(" ", $where);
         $sql = "
            SELECT a.*,b.*,c.nama_customer,c.alamat_customer,d.nama_barang,d.mesh,d.bloom,d.satuan FROM tb_acc_invoice a
            LEFT JOIN tb_mkt_po_customer b ON a.id_mkt_po_customer = b.id_mkt_po_customer
            LEFT JOIN tb_master_customer c ON b.id_customer = c.id_customer
            LEFT JOIN tb_master_barang d ON b.id_barang = d.id_barang
            WHERE a.is_deleted = 0 ORDER BY a.tgl_invoice DESC
         ";

         return $this->db->query($sql);
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
            INSERT INTO tb_acc_invoice (id_mkt_po_customer, no_invoice, tgl_invoice, status_invoice ,op_acc, created_at, created_by, updated_at, updated_by, is_deleted) 
            VALUES('$data[id_mkt_po_customer]', '$data[no_invoice]', '$data[tgl_invoice]','Unpaid' ,'$id_user', NOW(), $id_user, '0000-00-00', '0', '0')
        ";

        $this->db->query($sql);

        $sql2 = "
        UPDATE tb_mkt_po_customer
        SET invoice='Selesai', updated_at=NOW(), updated_by='$id_user'
        WHERE id_mkt_po_customer='$data[id_mkt_po_customer]'
        "; 
        $this->db->query($sql2);

        return TRUE;
    }

    public function is_invoice_exist($id_po)
{
    $this->db->where('id_mkt_po_customer', $id_po);
    $cek = $this->db->get('tb_acc_invoice')->num_rows();
    return $cek > 0; // true jika sudah ada invoice
}

 public function cek_order()
    {
        $sql = "
            SELECT COUNT(invoice) as tot_status_invoice FROM tb_mkt_po_customer WHERE invoice = 'Belum' AND is_deleted = 0";
        return $this->db->query($sql);
    }

    public function data_customer_pdf($id)
    {
        $sql = "
        SELECT a.*,b.id_customer,c.nama_customer,c.alamat_customer FROM tb_acc_invoice a
        LEFT JOIN tb_mkt_po_customer b ON a.id_mkt_po_customer = b.id_mkt_po_customer
        LEFT JOIN tb_master_customer c ON b.id_customer = c.id_customer
        WHERE a.is_deleted = 0 AND id_acc_invoice = '$id'
        ";

        return $this->db->query($sql);
    }

    public function data_pdf($id)
    {
        $sql = "
        SELECT a.*, b.*,c.nama_customer,c.alamat_customer,d.nama_barang,d.mesh,d.bloom,d.satuan FROM tb_acc_invoice a
        LEFT JOIN tb_mkt_po_customer b ON a.id_mkt_po_customer = b.id_mkt_po_customer
        LEFT JOIN tb_master_customer c ON b.id_customer = c.id_customer
        LEFT JOIN tb_master_barang d ON b.id_barang = d.id_barang
        WHERE a.is_deleted = '0' AND  id_acc_invoice = '$id'
        ";

        return $this->db->query($sql);
    }

     public function cek_no_invoice($no_invoice){
        $sql = "
            SELECT COUNT(a.no_invoice) count_ni FROM tb_acc_invoice a
            WHERE a.no_invoice = '$no_invoice' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }
}