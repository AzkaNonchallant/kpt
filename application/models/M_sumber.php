<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sumber extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function kode_user(){
        return $this->session->userdata("kode_user");
    }

    public function get(){
        // $kode_user = $this->kode_user();
        $sql = "SELECT * FROM tb_sumber WHERE is_deleted = 0 ORDER BY id_sumber DESC";

        return $this->db->query($sql);
    }

    public function get2(){
        // $kode_user = $this->kode_user();
        $sql = "SELECT a.id_sumber,a.nama_provinsi,a.id_provinsi ,a.nama_kota, a.id_kota FROM tb_sumber a WHERE is_deleted = 0 ORDER BY id_sumber DESC";

        return $this->db->query($sql);
    }
    public function add($data)
    {

        $sql = "
        INSERT INTO tb_sumber( nama_provinsi, id_provinsi, id_kota, nama_kota, created_at, created_by, updated_at, updated_by, is_deleted) 
        VALUES ('$data[nama_provinsi]','$data[id_provinsi]','$data[id_kota]','$data[nama_kota]',NOW(),'1','0000-00-00 00:00:00','','0')
        ";

        return $this->db->query($sql);
    }

    public function update($data, $id)
    {
        $sql = "
        UPDATE tb_sumber
        SET 
            nama_provinsi = '$data[nama_provinsi]',
            id_provinsi = '$data[id_provinsi]',
            id_kota = '$data[id_kota]',
            nama_kota = '$data[nama_kota]',
            updated_at = NOW(),
            updated_by = '1'
        WHERE id_sumber = '$id'
        ";

        return $this->db->query($sql);
    }
}