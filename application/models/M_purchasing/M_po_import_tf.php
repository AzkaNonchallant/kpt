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

   public function get()
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
            a.payment,
            

            CASE
                WHEN COUNT(b.id_prc_po_import_tf) = 0 THEN 'Proses'
                WHEN SUM(b.status_po_import = 'Diterima') = COUNT(b.id_prc_po_import_tf)
                     THEN 'Diterima'
                ELSE 'Proses'
            END AS status_po_import

        FROM tb_prc_po_import_tf a
        LEFT JOIN tb_prc_po_import b 
            ON a.id_prc_po_import_tf = b.id_prc_po_import_tf
        WHERE a.is_deleted = 0
        GROUP BY a.id_prc_po_import_tf
        ORDER BY a.id_prc_po_import_tf DESC
    ";

    return $this->db->query($sql);
}


}