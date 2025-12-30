<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_gudang_spbm extends CI_Model {
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
            $where[] = "AND imp.tgl_po_import >= '$tgl' AND imp.tgl_po_import <= '$tgl2'";
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
    imp2.id_prc_po_import,

    MAX(a.id_gudang_spbm)        AS id_gudang_spbm,
    MAX(a.kode_tf_in)            AS kode_tf_in,
    MAX(imp.id_prc_po_import_tf) AS id_prc_po_import_tf,

    MAX(imp.no_po_import)        AS no_po_import,
    MAX(imp.tgl_po_import)       AS tgl_po_import,
    MAX(imp.prc_admin)           AS prc_admin,
    MAX(imp2.id_barang)           AS id_barang,
    MAX(imp2.jumlah)           AS jumlah,
    MAX(imp2.harga_perunit)           AS harga_perunit,
    MAX(imp2.status_po_import)           AS status_po_import,

    MAX(b.id_supplier)           AS id_supplier,
    MAX(b.nama_supplier)         AS nama_supplier,
    MAX(c.nama_barang)         AS nama_barang,
    MAX(c.mesh)         AS mesh,
    MAX(c.bloom)         AS bloom,
    MAX(c.satuan)         AS satuan,

    SUM(imp2.jumlah)             AS total_qty_po,
    SUM(imp2.jumlah * imp2.harga_perunit) AS total_nilai_po,

    MAX(e.no_batch)              AS no_batch,
    MAX(e.gdg_qty_in)            AS qty_masuk,
    MAX(e.tgl_msk_gdg)           AS tgl_masuk,
    MAX(e.no_bl)                 AS no_bl,
    MAX(e.keterangan)            AS keterangan,
    MAX(e.gdg_admin)             AS gdg_admin

FROM tb_gudang_spbm a
LEFT JOIN tb_prc_po_import_tf imp 
    ON a.id_prc_po_import_tf = imp.id_prc_po_import_tf
LEFT JOIN tb_prc_po_import imp2 
    ON imp.id_prc_po_import_tf = imp2.id_prc_po_import_tf
LEFT JOIN tb_master_barang c 
    ON imp2.id_barang = c.id_barang
LEFT JOIN tb_master_supplier b 
    ON c.id_supplier = b.id_supplier
LEFT JOIN tb_gudang_barang_masuk e 
    ON imp2.id_prc_po_import = e.id_prc_po_import

WHERE 
    a.is_deleted = 0
    AND imp2.status_po_import IN ('gudang','proses_gudang')
    $where

GROUP BY imp2.id_prc_po_import
ORDER BY tgl_po_import DESC";


        return $this->db->query($sql)->result_array();
    }

public function finalisasi_barang_masuk($data)
{
    // 1. Ambil data SPBM
    $spbm = $this->db
        ->get_where('tb_gudang_spbm', [
            'kode_tf_in' => $data['kode_tf_in']
        ])
        ->row_array();

    if (!$spbm) {
        throw new Exception('Data SPBM tidak ditemukan');
    }

    // 2. Cek apakah barang masuk SUDAH ADA (hindari duplikat)
    $cek = $this->db
        ->get_where('tb_gudang_barang_masuk', [
            'kode_tf_in' => $spbm['kode_tf_in']
        ])
        ->row_array();

    if ($cek) {
        throw new Exception('Barang masuk sudah pernah difinalisasi');
    }

    // 3. Data INSERT barang masuk
    $insert_barang_masuk = [
        'id_prc_po_import_tf'    => $spbm['id_prc_po_import_tf'],
        'id_prc_po_import'    => $data['id_prc_po_import'],
        'kode_tf_in'             => $spbm['kode_tf_in'],
        'no_batch'               => $spbm['no_batch'],
        'gdg_qty_in' => $data['qty_in'],
        'tgl_msk_gdg'            => $spbm['tgl_msk_gdg'],
        'tgl_bayar_pib'          => $spbm['tgl_bayar_pib'],
        'tgl_ski'                => $spbm['tgl_ski'],
        'tgl_inv'                => $spbm['tgl_inv'],
        'tgl_pack'               => $spbm['tgl_pack'],
        'tgl_coo'                => $spbm['tgl_coo'],
        'tgl_coa'                => $spbm['tgl_coa'],
        'tgl_srp'                => $spbm['tgl_srp'],
        'tgl_exp'                => $spbm['tgl_exp'],
        'no_bl'                  => $spbm['no_bl'],
        'no_ski'                 => $spbm['no_ski'],
        'no_inv'                 => $spbm['no_inv'],
        'no_pack'                => $spbm['no_pack'],
        'no_coo'                 => $spbm['no_coo'],
        'no_coa'                 => $spbm['no_coa'],
        'no_srp'                 => $spbm['no_srp'],
        'kurs_pib'               => $spbm['kurs_pib'],
        'no_pib'                 => $spbm['no_pib'],
        'jenis_transaksi_gudang' => $spbm['jenis_transaksi_gudang'],
        'keterangan'             => $data['keterangan'],
        'gdg_admin'              => $spbm['gdg_admin'],
        'created_at'             => date('Y-m-d H:i:s'),
        'created_by'             => $this->session->userdata('id_user'),
        'updated_at'             => date('Y-m-d H:i:s'),
        'updated_by'             => $this->session->userdata('id_user'),
        'is_deleted'             => 0
    ];

    // 4. INSERT barang masuk
    $this->db->insert('tb_gudang_barang_masuk', $insert_barang_masuk);

    if ($this->db->affected_rows() == 0) {
        throw new Exception('Insert barang masuk gagal');
    }

    // 5. Update status PO Import
    $this->db->where('id_prc_po_import', $data['id_prc_po_import']);
    $this->db->update('tb_prc_po_import', [
        'status_po_import' => 'diterima',
        'updated_at'       => date('Y-m-d H:i:s'),
        'updated_by'       => $this->session->userdata('id_user')
    ]);

    if ($this->db->affected_rows() == 0) {
        throw new Exception('Update status PO Import gagal');
    }

    return true;
}

public function cek_gspbm()
    {
        $sql = "
            SELECT COUNT(status_po_import) AS tot_status_gspbm 
            FROM tb_prc_po_import
            WHERE status_po_import = 'gudang' 
            AND is_deleted = 0";
        return $this->db->query($sql);
    }

    

    public function proses($data)
{
    $id_user = $this->id_user();

    $this->db->trans_begin();

    $sql = "
    INSERT INTO tb_gudang_barang_masuk
    SET 
        no_batch = '{$data['no_batch']}',
        gdg_qty_in = '{$data['gdg_qty_in']}',
        tgl_msk_gdg = '{$data['tgl_msk_gdg']}',
        tgl_bayar_pib = '{$data['tgl_bayar_pib']}',
        kurs_pib = '{$data['kurs_pib']}',
        no_pib = '{$data['no_pib']}',
        tgl_exp = '{$data['tgl_exp']}',
        tgl_ski = '{$data['tgl_ski']}',
        tgl_inv = '{$data['tgl_inv']}',
        tgl_pack = '{$data['tgl_pack']}',
        tgl_coo = '{$data['tgl_coo']}',
        tgl_coa = '{$data['tgl_coa']}',
        tgl_srp = '{$data['tgl_srp']}',
        no_ski = '{$data['no_ski']}',
        no_inv = '{$data['no_inv']}',
        no_pack = '{$data['no_pack']}',
        no_coo = '{$data['no_coo']}',
        no_coa = '{$data['no_coa']}',
        no_srp = '{$data['no_srp']}',
        no_bl = '{$data['no_bl']}',
        jenis_transaksi_gudang = '{$data['jenis_transaksi_gudang']}',
        keterangan = '{$data['keterangan']}',
        gdg_admin = '{$data['gdg_admin']}',
        created_at = NOW(),
        created_by = '$id_user',
        updated_at = NOW(),
        updated_by = '$id_user',
        is_deleted = '0'
    ";

    $insert = $this->db->query($sql);

    if (!$insert) {
        $this->db->trans_rollback();
        return [
            'status' => false,
            'error'  => $this->db->error()
        ];
    }

    $sql_status = "
    UPDATE tb_prc_po_import
    SET 
        status_po_import = 'diterima',
        updated_at = NOW(),
        updated_by = '$id_user'
    WHERE id_prc_po_import_tf = '{$data['id_prc_po_import_tf']}'
    ";

    $update = $this->db->query($sql_status);

    if (!$update) {
        $this->db->trans_rollback();
        return [
            'status' => false,
            'error'  => $this->db->error()
        ];
    }

    $this->db->trans_commit();

    return ['status' => true];
}

    public function update_status_po($id_prc_po_import_tf, $status_po_import)
    {
        $id_user = $this->id_user();
        $sql = "
        UPDATE tb_prc_po_import
        SET 
            status_po_import = '$status_po_import',
            updated_at = NOW(),
            updated_by = '$id_user'
        WHERE id_prc_po_import_tf = '$id_prc_po_import_tf'";
        return $this->db->query($sql);
    }
    
    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE tb_barang_masuk 
            SET 
                kode_tf_in = '{$data['kode_tf_in']}',
                id_prc_po_import_tf = '{$data['id_prc_po_import_tf']}',
                no_batch = '{$data['no_batch']}',
                tgl_msk_gdg = '{$data['tgl_msk_gdg']}',
                jenis_transaksi_gudang = '{$data['jenis_transaksi_gudang']}',
                tgl_bayar_pib = '{$data['tgl_bayar_pib']}',
                kurs_pib = '{$data['kurs_pib']}',
                no_pib = '{$data['no_pib']}',
                id_barang = '{$data['id_barang']}',
                gdg_qty_in = '{$data['gdg_qty_in']}',
                tgl_exp = '{$data['tgl_exp']}',
                no_bl = '{$data['no_bl']}',
                keterangan = '{$data['keterangan']}',
                gdg_admin = '{$data['gdg_admin']}',
                updated_at = NOW(),
                updated_by = '$id_user' 
            WHERE id_barang_masuk = '{$data['id_barang_masuk']}'";
        return $this->db->query($sql);
    }

    public function delete($data)
    {
        $id_user = $this->id_user();

        $sql = "
        DELETE FROM tb_barang_masuk
        WHERE id_barang_masuk = '{$data['id_barang_masuk']}'";
        return $this->db->query($sql);
    }

    public function jml_barang_masuk($data){
        $sql = "
            SELECT SUM(gdg_qty_in) AS tot_barang_masuk 
            FROM tb_gudang_barang_masuk
            WHERE id_barang = '{$data['id_barang']}' 
            AND is_deleted = 0";
        return $this->db->query($sql);
    }

    public function cek_kode_tf_in($kode_tf_in){
        $sql = "
            SELECT COUNT(a.kode_tf_in) AS count_ktf 
            FROM tb_barang_masuk a
            WHERE a.kode_tf_in = '$kode_tf_in' 
            AND a.is_deleted = 0";
        return $this->db->query($sql);
    }

    public function cek_spbm()
    {
        $sql = "
            SELECT COUNT(status_po_import) AS tot_status_spbm 
            FROM tb_prc_po_import 
            WHERE status_po_import = 'gudang' 
            AND is_deleted = 0";
        return $this->db->query($sql);
    }

    public function getAllPOWithKodeTF()
    {
        $this->db->select('p.id_prc_po_import, p.no_po_import, b.nama_supplier, p.tgl_po_import, 
                           g.id_barang_masuk, g.kode_tf_in, g.tgl_msk_gdg, g.no_batch');
        $this->db->from('tb_prc_po_import p');
        $this->db->join('tb_gudang_barang_masuk g', 'g.id_prc_po_import = p.id_prc_po_import', 'left');
        $this->db->join('tb_master_barang mb', 'p.id_barang = mb.id_barang', 'left');
        $this->db->join('tb_master_supplier b', 'mb.id_supplier = b.id_supplier', 'left');
        $this->db->order_by('p.id_prc_po_import', 'DESC');
        return $this->db->get()->result();
    }
}