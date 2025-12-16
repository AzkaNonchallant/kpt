<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin_sample_keluar extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function id_user(){
        return $this->session->userdata("id_user");
    }

    public function get($tgl = null, $tgl2 = null, $nama_barang = null, $nama_supplier = null)
    {
        $where = [];

        if ($tgl != null && $tgl2 != null) {
            $tgl = explode("/", $tgl);
            $tgl = "$tgl[2]-$tgl[1]-$tgl[0]";
            $tgl2 = explode("/", $tgl2);
            $tgl2 = "$tgl2[2]-$tgl2[1]-$tgl2[0]";
            $where[] = "AND a.tgl_po_sample >= '$tgl' AND a.tgl_po_sample <= '$tgl2'";
        } else if ($tgl == null && $tgl2 == null) {
            $where[] = "";
        } else {
            return array();
        }

        if ($nama_barang != null) {
            $where[] = "AND c.nama_barang = '$nama_barang'";
        }

        if ($nama_supplier != null) {
            $where[] = "AND b.nama_supplier = '$nama_supplier'";
        }

        $where = implode(" ", $where);

        $sql = "
        SELECT 
            a.*, 
            c.kode_barang, c.nama_barang, c.mesh, c.bloom, c.satuan, c.id_supplier,
            d.tgl_msk_gdg, d.no_batch,
            e.nama_customer,
            f.kode_sample_out
        FROM tb_mkt_po_sample a
        LEFT JOIN tb_master_barang c ON a.id_barang = c.id_barang
        LEFT JOIN tb_sample_masuk sm ON a.id_mkt_po_sample = sm.id_mkt_po_sample
        LEFT JOIN tb_gudang_barang_masuk d ON sm.no_batch = d.no_batch
        LEFT JOIN tb_master_customer e ON a.id_customer = e.id_customer
        LEFT JOIN tb_sample_keluar f ON a.id_mkt_po_sample = f.id_mkt_po_sample
        WHERE a.is_deleted = 0 AND f.kode_sample_out IS NOT NULL
        $where
        ORDER BY a.tgl_po_sample DESC
    ";

return $this->db->query($sql)->result_array();

    }

    // TAMBAHAN: Function proses untuk PO Sample
    // Function untuk proses sample masuk dari PO Sample
public function proses($data)
{
    $id_user = $this->id_user();
    
    $sql = "
        UPDATE tb_sample_keluar 
        SET tgl_masuk_sample='$data[tgl_masuk_sample]', id_customer='$data[id_customer]', id_barang='$data[id_barang]',jumlah_keluar='$data[jumlah_keluar]',
        gdg_admin='$id_user', is_deleted='0'
        WHERE kode_sample_out='$data[kode_sample_out]' 
    ";
    
     $this->db->query($sql);

     $sql2 = "
     UPDATE tb_mkt_po_sample SET
     status='processed'
     WHERE id_mkt_po_sample='$data[id_mkt_po_sample]'
     ";

     $this->db->query($sql2);

     return TRUE;
}

   
    public function update_status($id_mkt_po_sample, $status)
{
    $id_user = $this->id_user();
    $sql = "
        UPDATE tb_mkt_sample_customer
        SET 
            status = '$status',
            updated_at = NOW(),
            updated_by = '$id_user'
        WHERE id_mkt_po_sample = '$id_mkt_po_sample'
    ";
    return $this->db->query($sql);
}
    public function insert($data)
    {
        $id_user = $this->id_user();
        $sql = "
            INSERT INTO tb_mkt_sample_customer
            (tgl_po_sample, id_customer, id_barang, kode_sample_out, jumlah_po_sample, ket_po_sample, mkt_admin, created_at, created_by, updated_at, updated_by, is_deleted)
            VALUES (
                '{$data['tgl_po_sample']}',
                '{$data['id_customer']}',
                '{$data['id_barang']}',
                '{$data['kode_sample_out']}',
                '{$data['jumlah_po_sample']}',
                '{$data['ket_po_sample']}',
                '{$data['mkt_admin']}',
                NOW(),
                '$id_user',
                NOW(),
                '$id_user',
                0
            )
        ";
        return $this->db->query($sql);
    }

    public function update_status_po($id_prc_po_pembelian, $status_po_pembelian)
    {
        $sql = "
        UPDATE tb_prc_po_pembelian
        SET status_po_pembelian='$status_po_pembelian'
        WHERE id_prc_po_pembelian='$id_prc_po_pembelian';
        ";
        return $this->db->query($sql);
    }

    
    
    // public function update($data)
    // {
    //     $id_user = $this->id_user();
    //     $sql = "
    //         UPDATE tb_mkt_sample_customer
    //         SET 
    //             tgl_po_sample = '{$data['tgl_po_sample']}',
    //             id_customer = '{$data['id_customer']}',
    //             id_barang = '{$data['id_barang']}',
    //             kode_sample_out = '{$data['kode_sample_out']}',
    //             jumlah_po_sample = '{$data['jumlah_po_sample']}',
    //             ket_po_sample = '{$data['ket_po_sample']}',
    //             mkt_admin = '{$data['mkt_admin']}',
    //             updated_at = NOW(),
    //             updated_by = '$id_user'
    //         WHERE id_mkt_po_sample = '{$data['id_mkt_po_sample']}'
    //     ";
    //     return $this->db->query($sql);
    // }

    public function delete($data)
    {
        $id_user = $this->id_user();
        $sql = "
          DELETE FROM tb_mkt_sample_customer
             WHERE tb_mkt_sample_customer= '$data[id_mkt_po_sample]'
         ";
        return $this->db->query($sql);
    }


    public function cek_sample()
    {
        $sql = "
            SELECT COUNT(id_mkt_po_sample) as tot_sample 
            FROM tb_mkt_sample_customer
            WHERE is_deleted = 0";
        return $this->db->query($sql)->row()->tot_sample;
    }
    
    public function cek_spbm()
    {
        $sql = "
            SELECT COUNT(status_po_pembelian) as tot_status_spbm FROM tb_prc_po_pembelian WHERE status_po_pembelian = 'Proses' AND is_deleted = 0";
        return $this->db->query($sql);
    }

    public function getAllPOWithKodeTF()
    {
        $this->db->select('p.id_prc_po_pembelian, p.no_po_pembelian, p.supplier, p.tgl_po_pembelian, 
                           g.id_barang_masuk, g.kode_sample_out, g.tgl_msk_gdg, g.no_batch');
        $this->db->from('tb_prc_po_pembelian p');
        $this->db->join('tb_gudang_barang_masuk g', 'g.id_prc_po_pembelian = p.id_prc_po_pembelian', 'left');
        $this->db->order_by('p.id_prc_po_pembelian', 'DESC');
        return $this->db->get()->result();
    }


    
    
    // public function get_po_sample_by_id($id_mkt_po_sample)
    // {
    //     $sql = "
    //         SELECT 
    //             a.*,
    //             c.kode_barang, c.nama_barang, c.mesh, c.bloom, c.satuan,
    //             e.nama_customer
    //         FROM tb_mkt_po_sample a
    //         LEFT JOIN tb_master_barang c ON a.id_barang = c.id_barang
    //         LEFT JOIN tb_master_customer e ON a.id_customer = e.id_customer
    //         WHERE a.id_mkt_po_sample = '$id_mkt_po_sample' AND a.is_deleted = 0
    //     ";
    //     return $this->db->query($sql)->row_array();
    // }
}