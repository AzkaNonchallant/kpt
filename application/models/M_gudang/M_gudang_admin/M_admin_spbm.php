<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin_spbm extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function id_user(){
        return $this->session->userdata("id_user");
    }
//  public function get($tgl = null, $tgl2 = null, $nama_barang = null, $nama_supplier = null)
    // {
    //     if ($tgl != null && $tgl2 != null) {
    //         $tgl = explode("/", $tgl);
    //         $tgl = "$tgl[2]-$tgl[1]-$tgl[0]";
    //         $tgl2 = explode("/", $tgl2);
    //         $tgl2 = "$tgl2[2]-$tgl2[1]-$tgl2[0]";
    //         $where[] = "AND a.tgl_po_pembelian >= '$tgl' AND  a.tgl_po_pembelian <= '$tgl2'";
    //     } else if ($tgl ==null && $tgl2 ==null) {
    //             $where[] = "";
    //     } else {
    //         return array();
    //     }

    //     if ($nama_barang == null) {
    //         $where[] = "";
    //     }  else {
    //         $where[] = "AND c.nama_barang = '$nama_barang'";
    //     }

    //     if ($nama_supplier == null) {
    //         $where[] = "";
    //     }  else {
    //         $where[] = "AND b.nama_supplier = '$nama_supplier'";
    //     }

    //     $where = implode(" ", $where);
        
    //     $sql = "
    //         SELECT a.*,b.nama_supplier,c.kode_barang,c.nama_barang,c.mesh,c.bloom,c.satuan,c.id_supplier FROM tb_prc_po_pembelian a
    //         LEFT JOIN tb_master_barang c ON a.id_barang = c.id_barang
    //         LEFT JOIN tb_master_supplier b ON c.id_supplier = b.id_supplier
    //         WHERE a.is_deleted = 0 AND a.status_po_pembelian = 'Proses' $where ORDER BY a.tgl_po_pembelian DESC";
    //         return $this->db->query($sql)->result_array();
    // }
    public function get($tgl = null, $tgl2 = null, $nama_barang = null, $nama_supplier = null)
{
    $where = [];

    if ($tgl != null && $tgl2 != null) {
        $tgl = explode("/", $tgl);
        $tgl = "$tgl[2]-$tgl[1]-$tgl[0]";
        $tgl2 = explode("/", $tgl2);
        $tgl2 = "$tgl2[2]-$tgl2[1]-$tgl2[0]";
        $where[] = "AND a.tgl_po_pembelian >= '$tgl' AND a.tgl_po_pembelian <= '$tgl2'";
    } else if ($tgl == null && $tgl2 == null) {
        $where[] = "";
    } else {
        return array();
    }

    if ($nama_barang == null) {
        $where[] = "";
    } else {
        $where[] = "AND c.nama_barang = '$nama_barang'";
    }

    if ($nama_supplier == null) {
        $where[] = "";
    } else {
        $where[] = "AND b.nama_supplier = '$nama_supplier'";
    }

    $where = implode(" ", $where);

    $sql = "
        SELECT 
            a.*,
            b.nama_supplier,
            c.kode_barang, c.nama_barang, c.mesh, c.bloom, c.satuan, c.id_supplier,
            d.kode_tf_in, d.tgl_msk_gdg, d.no_batch
        FROM tb_prc_po_pembelian a
        LEFT JOIN tb_master_barang c ON a.id_barang = c.id_barang
        LEFT JOIN tb_master_supplier b ON c.id_supplier = b.id_supplier
        LEFT JOIN tb_gudang_barang_masuk d ON d.id_prc_po_pembelian = a.id_prc_po_pembelian
        WHERE a.is_deleted = 0 AND a.status_po_pembelian = 'Proses' 
        $where 
        ORDER BY a.tgl_po_pembelian DESC";

    return $this->db->query($sql)->result_array();
}


    public function proses($data)
{
        $id_user = $this->id_user();
        // $sql = "
        // INSERT INTO `tb_gudang_barang_masuk`(`id_prc_po_pembelian`, `no_batch`, `gdg_qty_in`, `tgl_msk_gdg`,`tgl_bayar_pib`, `tgl_exp`, `no_bl`,`keterangan`,`gdg_admin`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        // VALUES ('$data[id_prc_po_pembelian]','$data[no_batch]','$data[gdg_qty_in]','$data[tgl_msk_gdg]','$data[tgl_bayar_pib]','$data[tgl_exp]','$data[no_bl]','$data[keterangan]','$data[gdg_admin]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        // ";
        $sql = "
        UPDATE `tb_gudang_barang_masuk`
        SET 
            `id_prc_po_pembelian` = '{$data['id_prc_po_pembelian']}',
            `no_batch`            = '{$data['no_batch']}',
            `gdg_qty_in`          = '{$data['gdg_qty_in']}',
            `tgl_msk_gdg`         = '{$data['tgl_msk_gdg']}',
            `tgl_bayar_pib`       = '{$data['tgl_bayar_pib']}',
            `tgl_exp`             = '{$data['tgl_exp']}',
            `no_bl`               = '{$data['no_bl']}',
            `keterangan`          = '{$data['keterangan']}',
            `gdg_admin`           = '{$data['gdg_admin']}',
            `updated_at`          = NOW(),
            `updated_by`          = '$id_user',
            `is_deleted`          = '0'
        WHERE `kode_tf_in` = '$data[kode_tf_in_2]'
    ";
        return $this->db->query($sql);
    }

    public function update_status_po($id_prc_po_pembelian, $status_po_pembelian)
    {
        $sql = "
        UPDATE `tb_prc_po_pembelian`
        SET `status_po_pembelian`='$status_po_pembelian'
        WHERE `id_prc_po_pembelian`='$id_prc_po_pembelian';
        ";
        return $this->db->query($sql);
    }
    
    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_barang_masuk` 
            SET `kode_tf_in`='$data[kode_tf_in]',`no_batch`='$data[no_batch]',`tgl_msk_gdg`='$data[tgl_msk_gdg]',`jenis_transaksi`='$data[jenis_transaksi]',`tgl_bayar_pib`='$data[tgl_bayar_pib]',`id_barang`='$data[id_barang]',`qty_in`='$data[qty_in]',`tgl_exp`='$data[tgl_exp]',`no_bl`='$data[no_bl]',`keterangan`='$data[keterangan]',`gdg_admin`='$data[gdg_admin]',`updated_at`=NOW(),`updated_by`='$id_user' 
            WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        ";
        return $this->db->query($sql);
        // return $sql;
    }

    public function delete($data)
    {
        $id_user = $this->id_user();

        $sql = "
        DELETE FROM `tb_barang_masuk`
         WHERE `id_barang_masuk`='$data[id_barang_masuk]'
        ";
        return $this->db->query($sql);
    }


    public function jml_barang_masuk($data){
        // $kode_user = $this->kode_user();
        $sql = "
            SELECT sum(qty_in) tot_barang_masuk FROM `tb_barang_masuk`
            WHERE id_barang = '$data[id_barang]' AND  is_deleted = 0";
        return $this->db->query($sql);
    }

    public function cek_kode_tf_in($kode_tf_in){
        $sql = "
            SELECT COUNT(a.kode_tf_in) count_ktf FROM tb_barang_masuk a
            WHERE a.kode_tf_in = '$kode_tf_in' AND a.is_deleted = 0";
        return $this->db->query($sql);
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
                       g.id_barang_masuk, g.kode_tf_in, g.tgl_msk_gdg, g.no_batch');
    $this->db->from('tb_prc_po_pembelian p');
    $this->db->join('tb_gudang_barang_masuk g', 'g.id_prc_po_pembelian = p.id_prc_po_pembelian', 'left');
    $this->db->order_by('p.id_prc_po_pembelian', 'DESC');
    return $this->db->get()->result(); // <== pake result biar bisa foreach
}


}