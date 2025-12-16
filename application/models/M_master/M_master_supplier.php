<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_master_supplier extends CI_Model
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
        $sql = "SELECT * FROM tb_master_supplier WHERE is_deleted = 0 ORDER BY created_at ASC";

        return $this->db->query($sql);
    }

    public function add($data)
    {
        $id_user = $this->id_user();
        $sql = "
        INSERT INTO `tb_master_supplier`( `kode_supplier`, `nama_supplier`, `alamat_supplier`, `negara_asal`, `pic_supplier`, `no_sertif_halal`,`kode_po`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) 
        VALUES ('$data[kode_supplier]','$data[nama_supplier]', '$data[alamat_supplier]','$data[negara_asal]', '$data[pic_supplier]', '$data[no_sertif_halal]','$data[kode_po]',NOW(),'$id_user','0000-00-00 00:00:00','','0')
        ";

        return $this->db->query($sql);
    }

    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE `tb_master_supplier` 
            SET `kode_supplier`='$data[kode_supplier]',`nama_supplier`='$data[nama_supplier]',`alamat_supplier`='$data[alamat_supplier]',`negara_asal`='$data[negara_asal]',`pic_supplier`='$data[pic_supplier]',`no_sertif_halal`='$data[no_sertif_halal]',`kode_po`='$data[kode_po]',`updated_at`=NOW(),`updated_by`='$id_user' 
            WHERE `id_supplier`='$data[id_supplier]'
        ";
        return $this->db->query($sql);
    }

    public function cek_kode_po($kode_po)
    {
        $sql = "
            SELECT COUNT(a.kode_po) as kode_po 
            FROM tb_master_supplier a
            WHERE a.kode_po = '$kode_po' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }

     public function count_by_nama_and_tahun($nama_supplier, $tahun, $exclude_id = null) {
        $this->db->like('nama_supplier', $nama_supplier);
        
            $this->db->like('kode_po', '/' . $tahun . '/');
        
        // Exclude ID tertentu (untuk edit)
        if($exclude_id) {
            $this->db->where('id_supplier !=', $exclude_id);
        }
        
        $this->db->from('tb_master_supplier');
        return $this->db->count_all_results();
    }

    public function get_by_id($id_supplier)
    {
        $this->db->where('id_supplier', $id_supplier);
        return $this->db->get('tb_master_supplier')->row();
    }

    

public function count_by_nama_supplier_exclude($nama_supplier, $exclude_id = null) {
    $this->db->like('nama_supplier', $nama_supplier);
    
    // Exclude ID tertentu (untuk edit)
    if($exclude_id) {
        $this->db->where('id_supplier !=', $exclude_id);
    }
    
    $this->db->from('tb_master_supplier');
    return $this->db->count_all_results();
}


    public function count_by_nama_supplier($nama_supplier)
    {
        $this->db->like('nama_supplier', $nama_supplier);
        $this->db->from('tb_master_supplier');
        return $this->db->count_all_results();
    }

    public function delete($data)
    {
        $id_user = $this->id_user();

        $sql = "
        DELETE FROM `tb_master_supplier`
         WHERE `id_supplier`='$data[id_supplier]'
        ";
        return $this->db->query($sql);
    }

    public function cek_kode_supplier($kode_supplier)
    {
        $sql = "
            SELECT COUNT(a.kode_supplier) count_ks FROM tb_master_supplier a
            WHERE a.kode_supplier = '$kode_supplier' AND a.is_deleted = 0";
        return $this->db->query($sql);
    }


}
