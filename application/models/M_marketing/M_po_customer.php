<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_po_customer extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function id_user(){
        return $this->session->userdata("id_user");
    }
    public function get($tgl = null, $tgl2 = null, $nama_barang = null, $nama_customer = null)
    {
        if ($tgl != null && $tgl2 != null) {
            $tgl = explode("/", $tgl);
            $tgl = "$tgl[2]-$tgl[1]-$tgl[0]";
            $tgl2 = explode("/", $tgl2);
            $tgl2 = "$tgl2[2]-$tgl2[1]-$tgl2[0]";
            $where[] = "AND a.tgl_po_customer >= '$tgl' AND  a.tgl_po_customer <= '$tgl2'";
        } else if ($tgl ==null && $tgl2 ==null) {
                $where[] = "";
        } else {
            return array();
        }

        if ($nama_barang == null) {
            $where[] = "";
        }  else {
            $where[] = "AND c.nama_barang = '$nama_barang'";
        }

        if ($nama_customer == null) {
            $where[] = "";
        }  else {
            $where[] = "AND b.nama_customer = '$nama_customer'";
        }

        $where = implode(" ", $where);
        
        $sql = "
            SELECT a.*,b.nama_customer,c.kode_barang,c.nama_barang,c.mesh,c.bloom,c.satuan FROM tb_mkt_po_customer a
            LEFT JOIN tb_master_customer b ON a.id_customer = b.id_customer
            LEFT JOIN tb_master_barang c ON a.id_barang = c.id_barang
            WHERE a.is_deleted = 0 $where ORDER BY a.tgl_po_customer DESC";
            return $this->db->query($sql)->result_array();
    }

    public function get_no_po()
    {
        
        $sql = "
            SELECT a.*,b.nama_customer,c.kode_barang,c.nama_barang,c.mesh,c.bloom,c.satuan FROM tb_mkt_po_customer a
            LEFT JOIN tb_master_customer b ON a.id_customer = b.id_customer
            LEFT JOIN tb_master_barang c ON a.id_barang = c.id_barang
            WHERE a.is_deleted = 0 ORDER BY a.tgl_po_customer ASC";
            return $this->db->query($sql);
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO tb_mkt_po_customer(no_po_customer, tgl_po_customer, id_customer, id_barang,kode_tf_in, jumlah_po_customer, harga_po_customer, jenis_pembayaran_customer,tgl_batas_waktu ,keterangan_po_customer ,invoice,mkt_admin,created_at, created_by, updated_at, updated_by, is_deleted) 
        VALUES ('$data[no_po]','$data[tgl_po]','$data[id_customer]','$data[id_barang]','$data[kode_tf_in]','$data[jumlah_po]','$data[harga_po]','$data[jenis_pembayaran]','$data[tgl_batas_waktu]','$data[keterangan]' ,'Belum','$data[mkt_admin]', NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";


        return $this->db->query($sql);


    //      // ambil last insert id dari PO Pembelian
    // $id_po_customer = $this->db->insert_id();

    // // ======================
    // // 2. Generate kode TFIN berurutan
    // // ======================
    // $this->db->select('no_sppb');
    // $this->db->from('tb_mkt_sppb');
    // $this->db->like('no_sppb', 'SPPB-', 'after');
    // $this->db->order_by('id_mkt_sppb', 'DESC'); // pakai id biar aman
    // $this->db->limit(1);
    // $query = $this->db->get();

    // if ($query->num_rows() > 0) {
    //     $lastKode = $query->row()->kode_tf_in;
    //     $lastNumber = (int) str_replace('SPPB-', '', $lastKode);
    //     $newNumber = $lastNumber + 1;
    // } else {
    //     $newNumber = 1; // kalau belum ada data
    // }

    // $kode_tf = 'SPPB-' . $newNumber;

    // // ======================
    // // 3. Insert ke tb_gudang_barang_masuk
    // // ======================
    // $data_gudang = [
    //     'no_sppb' => $kode_tf,
    //     'id_mkt_po_customer' => $id_po_customer,
    //     // 'gdg_qty_in' => $data['jumlah_po_pembelian'],
    //     'created_at' => date('Y-m-d H:i:s'),
    //     'created_by' => $id_user
    // ];

    // $this->db->insert('tb_mkt_sppb', $data_gudang);

    // return true;
    }
    
    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE tb_mkt_po_customer 
            SET no_po_customer='$data[no_po]',tgl_po_customer='$data[tgl_po]',id_customer='$data[id_customer]',id_barang='$data[id_barang]',jumlah_po_customer='$data[jumlah_po]',harga_po_customer='$data[harga_po]',keterangan_po_customer='$data[keterangan]',jenis_pembayaran_customer='$data[jenis_pembayaran]',tgl_batas_waktu='$data[tgl_batas_waktu]',mkt_admin='$data[mkt_admin]',updated_at=NOW(),updated_by='$id_user' 
            WHERE id_mkt_po_customer='$data[id_mkt_po_customer]'
        ";
        return $this->db->query($sql);
        // return $sql;
    }

    public function update_status($data) 
    {
        $id_user = $this->id_user();
        $sql = "
        UPDATE tb_mkt_po_customer
        SET jenis_pembayaran_customer='$data[jenis_pembayaran]',status_invoice='$data[status_invoice]',updated_by='$id_user'
        WHERE id_mkt_po_customer='$data[id_mkt_po_customer]'
        ";

        return $this->db->query($sql);
    }

    public function delete($data)
    {
        $id_user = $this->id_user();

        $sql = "
        UPDATE  tb_mkt_po_customer
        SET is_deleted='1', `updated_at`=NOW(),updated_by='$id_user'
         WHERE id_mkt_po_customer='$data[id_mkt_po_customer]'
        ";
        return $this->db->query($sql);
    }

    public function jml_barang_masuk($data){
        // $kode_user = $this->kode_user();
        $sql = "
            SELECT sum(qty) tot_barang_masuk FROM tb_gudang_barang_masuk
            WHERE id_barang = '$data[id_barang]' AND  is_deleted = 0";
        return $this->db->query($sql);
    }

    public function cek_no_po($no_po){
        $sql = "
            SELECT COUNT(a.no_po_customer) count_np FROM tb_mkt_po_customer a
            WHERE a.no_po_customer = '$no_po' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }

    

    public function get_po_outstanding()
    {
        $sql = "
            SELECT a.*, b.nama_customer, c.kode_barang, c.nama_barang, c.mesh, c.bloom, c.satuan,
                (a.jumlah_po_customer - COALESCE((
                    SELECT SUM(s.jumlah_kirim) 
                    FROM tb_mkt_sppb s 
                    WHERE s.id_mkt_po_customer = a.id_mkt_po_customer 
                    AND s.is_deleted = 0
                ), 0)) as outstanding
            FROM tb_mkt_po_customer a
            LEFT JOIN tb_master_customer b ON a.id_customer = b.id_customer
            LEFT JOIN tb_master_barang c ON a.id_barang = c.id_barang
            WHERE a.is_deleted = 0 
            HAVING outstanding > 0
            ORDER BY a.tgl_po_customer ASC";
        
        return $this->db->query($sql)->result_array();
    }


}