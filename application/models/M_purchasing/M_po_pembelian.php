<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_po_pembelian extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function id_user(){
        return $this->session->userdata("id_user");
    }
    public function get($tgl = null, $tgl2 = null, $nama_barang = null, $nama_supplier = null)
    {
        if ($tgl != null && $tgl2 != null) {
            $tgl = explode("/", $tgl);
            $tgl = "$tgl[2]-$tgl[1]-$tgl[0]";
            $tgl2 = explode("/", $tgl2);
            $tgl2 = "$tgl2[2]-$tgl2[1]-$tgl2[0]";
            $where[] = "AND a.tgl_po_pembelian >= '$tgl' AND  a.tgl_po_pembelian <= '$tgl2'";
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

        if ($nama_supplier == null) {
            $where[] = "";
        }  else {
            $where[] = "AND b.nama_supplier = '$nama_supplier'";
        }

        $where = implode(" ", $where);
        
        $sql = "
            SELECT a.*,b.nama_supplier,c.kode_barang,c.nama_barang,c.mesh,c.bloom,c.satuan,c.id_supplier FROM tb_prc_po_pembelian a
            LEFT JOIN tb_master_barang c ON a.id_barang = c.id_barang
            LEFT JOIN tb_master_supplier b ON c.id_supplier = b.id_supplier
            WHERE a.is_deleted = 0 $where ORDER BY a.tgl_po_pembelian DESC";
            return $this->db->query($sql)->result_array();
    }

    public function get_no_po_pembelian()
    {
        
        $sql = "
            SELECT a.*,b.nama_supplier,c.kode_barang,c.nama_barang,c.mesh,c.bloom,c.satuan FROM tb_mkt_po_supplier a
            LEFT JOIN tb_master_supplier b ON a.id_supplier = b.id_supplier
            LEFT JOIN tb_master_barang c ON a.id_barang = c.id_barang
            WHERE a.is_deleted = 0 ORDER BY a.tgl_po ASC";
            return $this->db->query($sql);
    }

    // public function add($data)
    // {
    //     $id_user = $this->id_user();
    //     $sql = "
    //     INSERT INTO `tb_prc_po_pembelian`(`no_po_pembelian`, `tgl_po_pembelian`, `id_barang`, `jumlah_po_pembelian`, `harga_po_pembelian`, `jenis_pembayaran`,`prc_admin`, `status_po_pembelian`,`created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
    //     VALUES ('$data[no_po_pembelian]','$data[tgl_po_pembelian]','$data[id_barang]','$data[jumlah_po_pembelian]','$data[harga_po_pembelian]','$data[jenis_pembayaran]','$data[prc_admin]', 'Proses', NOW(),'$id_user','0000-00-00 00:00:00','','0')
    //     ";
    //     return $this->db->query($sql);
    // }

//     public function add($data)
// {
//     $id_user = $this->id_user();

//     // 1. Insert ke tb_prc_po_pembelian
//     $sql = "
//     INSERT INTO `tb_prc_po_pembelian`
//     (`no_po_pembelian`, `tgl_po_pembelian`, `id_barang`, `jumlah_po_pembelian`, `harga_po_pembelian`, `jenis_pembayaran`, `prc_admin`, `status_po_pembelian`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
//     VALUES 
//     (
//         '{$data['no_po_pembelian']}',
//         '{$data['tgl_po_pembelian']}',
//         '{$data['id_barang']}',
//         '{$data['jumlah_po_pembelian']}',
//         '{$data['harga_po_pembelian']}',
//         '{$data['jenis_pembayaran']}',
//         '{$data['prc_admin']}',
//         'Proses',
//         NOW(),
//         '$id_user',
//         '0000-00-00 00:00:00',
//         '',
//         '0'
//     )
//     ";
//     $this->db->query($sql);
// }

public function add($data)
{
    $id_user = $this->id_user();

    // ======================
    // 1. Insert ke tb_prc_po_pembelian
    // ======================
    $sql = "
        INSERT INTO `tb_prc_po_pembelian`
        (`no_po_pembelian`, `tgl_po_pembelian`, `id_barang`, `jumlah_po_pembelian`, `harga_po_pembelian`, `jenis_pembayaran`, `prc_admin`, `status_po_pembelian`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES 
        (
            '{$data['no_po_pembelian']}',
            '{$data['tgl_po_pembelian']}',
            '{$data['id_barang']}',
            '{$data['jumlah_po_pembelian']}',
            '{$data['harga_po_pembelian']}',
            '{$data['jenis_pembayaran']}',
            '{$data['prc_admin']}',
            'Proses',
            NOW(),
            '$id_user',
            '0000-00-00 00:00:00',
            '',
            '0'
        )
    ";
    $this->db->query($sql);

    // ambil last insert id dari PO Pembelian
    $id_po = $this->db->insert_id();

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
        'id_prc_po_pembelian' => $id_po,
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
        $sql = "
            UPDATE `tb_prc_po_pembelian` 
            SET `no_po_pembelian`='$data[no_po_pembelian]',`tgl_po_pembelian`='$data[tgl_po_pembelian]',`id_barang`='$data[id_barang]',`jumlah_po_pembelian`='$data[jumlah_po_pembelian]',`harga_po_pembelian`='$data[harga_po_pembelian]',`jenis_pembayaran`='$data[jenis_pembayaran]',`prc_admin`='$data[prc_admin]',`updated_at`=NOW(),`updated_by`='$id_user' 
            WHERE `id_prc_po_pembelian`='$data[id_prc_po_pembelian]'
        ";
        return $this->db->query($sql);
        // return $sql;
    }

    public function delete($data)
    {
        $id_user = $this->id_user();

        $sql = "
        DELETE FROM `tb_prc_po_pembelian`
         WHERE `id_prc_po_pembelian`='$data[id_prc_po_pembelian]'
        ";
        return $this->db->query($sql);
    }


    public function cek_no_po_pembelian($no_po_pembelian){
        $sql = "
            SELECT COUNT(a.no_po_pembelian) count_np FROM tb_prc_po_pembelian a
            WHERE a.no_po_pembelian = '$no_po_pembelian' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }

     public function cek_pembelian()
    {
        $sql = "
            SELECT COUNT(status_po_pembelian) as tot_status_spbm FROM tb_prc_po_pembelian WHERE status_po_pembelian = 'Proses' AND is_deleted = 0";
        return $this->db->query($sql);
    }

    public function generateKodeTFIN()
{
    // ambil kode terakhir
    $this->db->select('kode_tf_in');
    $this->db->from('tb_gudang_barang_masuk');
    $this->db->like('kode_tf_in', 'TFIN-', 'after');
    $this->db->order_by('kode_tf_in', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        $lastKode = $query->row()->kode_tf_in;
        $lastNumber = (int) str_replace('TFIN-', '', $lastKode);
        $newNumber = $lastNumber + 1;
    } else {
        $newNumber = 1; // kalau belum ada data
    }

    return 'TFIN-' . $newNumber;
}




}