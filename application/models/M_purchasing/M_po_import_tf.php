<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_po_import_tf extends CI_Model
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
       
        $sql = "
          SELECT 
            a.id_prc_po_import_tf,
            a.no_po_import,
            a.tgl_po_import,
            a.metode,
            a.shipment,
            a.pic1,
            a.pic2,
            a.prc_admin
        FROM tb_prc_po_import_tf a
        WHERE a.is_deleted = 0
        ORDER BY a.id_prc_po_import_tf DESC
        ";

        return $this->db->query($sql);
    }

}