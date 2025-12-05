<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_profile extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function id_user()
    {
        return $this->session->userdata("id_user");
    }
    public function get()
    {
        
        $sql = "
            SELECT a.* FROM tb_profile_pt a
            WHERE a.is_deleted = 0";
        return $this->db->query($sql)->result_array();
    }

   

    public function update($data)
    {
        $id_user = $this->id_user();
        $sql = "
            UPDATE tb_profile_pt 
            SET nama_perusahaan='$data[nama_perusahaan]',izin_pbf_available='$data[izin_pbf_available]',izin_pbf_exp='$data[izin_pbf_exp]',cdob_available='$data[cdob_available]',cdob_exp='$data[cdob_exp]',nama_apy='$data[nama_apy]',no_spa_exp='$data[no_spa_exp]',no_spa_available='$data[no_spa_available]',updated_at=NOW(),updated_by='$id_user' 
            WHERE id_profile_pt='$data[id_profile_pt]'
        ";
        return $this->db->query($sql);
        // return $sql;
    }

    
   
   
  



   
}
