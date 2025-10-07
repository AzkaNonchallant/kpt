<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan_barang_keluar extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function id_user()
    {
        return $this->session->userdata("id_user");
    }
    public function get($tgl = null, $tgl2 = null, $batch = null)
    {
        if ($tgl != null && $tgl2 != null) {
            $tgl = explode("/", $tgl);
            $tgl = "$tgl[2]-$tgl[1]-$tgl[0]";
            $tgl2 = explode("/", $tgl2);
            $tgl2 = "$tgl2[2]-$tgl2[1]-$tgl2[0]";
            $where[] = "AND c.tgl >= '$tgl' AND  c.tgl <= '$tgl2'";
        } else if ($tgl == null && $tgl2 == null) {
            $where[] = "";
        } else {
            return array();
        }

        if ($batch == null) {
            $where[] = "";
        } else {
            $where[] = "AND d.no_batch = '$batch'";
        }

        $where = implode(" ", $where);

                $sql = "
                    SELECT 
            a.*, 
            c.*, 
            b.nama_customer, 
            c.tgl, 
            d.no_batch,  
            e.nama_barang, 
            e.satuan
        FROM tb_gudang_barang_keluar a
        LEFT JOIN tb_surat_jalan c ON a.kode_tf_out = c.kode_tf_out
        LEFT JOIN tb_master_customer b ON c.id_customer = b.id_customer
        LEFT JOIN tb_gudang_barang_masuk d ON a.kode_tf_in = d.kode_tf_in
        LEFT JOIN tb_prc_po_pembelian f ON d.id_prc_po_pembelian = f.id_prc_po_pembelian
        LEFT JOIN tb_master_barang e ON f.id_barang = e.id_barang
        WHERE a.is_deleted = 0 $where 
        ORDER BY c.tgl DESC;
        ";

        return $this->db->query($sql)->result_array();
    }

    public function data_barang_keluar($kode_tf_out)
    {
        $sql = "
            SELECT a.*,b.no_batch, c.nama_barang,c.satuan,d.nama_supplier FROM tb_barang_keluar a
            LEFT JOIN tb_barang_masuk b ON a.kode_tf_in = b.kode_tf_in
            LEFT JOIN tb_barang c ON b.id_barang = c.id_barang
            LEFT JOIN tb_supplier d ON b.id_supplier = d.id_supplier
            WHERE a.kode_tf_out = '$kode_tf_out' AND a.is_deleted = 0 ORDER BY a.created_at DESC";
        return $this->db->query($sql);
    }
    public function add_surat_jalan($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO tb_surat_jalan(no_surat_jalan, tgl, id_customer, note, exp, created_at, created_by, updated_at, updated_by, is_deleted) 
        VALUES ('$data[no_surat_jalan]','$data[tgl]','$data[id_customer]','$data[note]','$data[exp]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";
        return $this->db->query($sql);
    }
    public function add_barang_keluar($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO tb_barang_keluar(kode_tf_in, no_surat_jalan, qty, created_at, created_by, updated_at, updated_by, is_deleted)
        VALUES ('$data[kode_tf_in]','$data[no_surat_jalan]','$data[qty]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";
        return $this->db->query($sql);
    }
    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE tb_barang_masuk 
            SET kode_tf_in='$data[kode_tf_in]',tgl='$data[tgl]',id_barang='$data[id_barang]',id_supplier='$data[id_supplier]',status='$data[status]',qty='$data[qty]',updated_at=NOW(),updated_by='$id_user' 
            WHERE id_barang_masuk='$data[id_barang_masuk]'
        ";
        return $this->db->query($sql);
        // return $sql;
    }

    public function delete($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE tb_barang_masuk 
            SET is_deleted='1',updated_at=NOW(),updated_by='$id_user' 
            WHERE id_barang_masuk='$data[id_barang_masuk]'
        ";
        return $this->db->query($sql);
    }

    public function jml_barang_keluar($data)
    {
        $sql = "
            SELECT sum(qty) tot_barang_keluar FROM tb_barang_keluar WHERE kode_tf_in='$data[kode_tf_in]' AND is_deleted = 0";
        return $this->db->query($sql);
    }
    public function jml_barang_keluar2($data)
    {
        $sql = "
            SELECT sum(a.qty) tot_barang_keluar FROM tb_gudang_barang_keluar a 
            LEFT JOIN tb_gudang_barang_masuk b ON a.kode_tf_in = b.kode_tf_in 
            WHERE b.id_barang ='$data[id_barang]' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }

    public function get_filter_batch()
    {
        $sql = "
            SELECT a.*,b.no_batch FROM tb_gudang_barang_keluar a
            LEFT JOIN tb_gudang_barang_masuk b ON a.kode_tf_in = b.kode_tf_in
            WHERE a.is_deleted = 0 ORDER BY a.kode_tf_in ASC";
        return $this->db->query($sql);
    }
}
