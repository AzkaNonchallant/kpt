<?php
// defined('BASEPATH') or exit('No direct script access allowed');

// class Left_sidebar extends MY_Controller
// {

    // function __construct()
    // {
    //     parent::__construct();
    //     // check_not_login();
    //     $this->load->model('M_marketing/M_sppb');
    //     $this->load->model('M_gudang_admin/M_admin_sppb');
    //     $this->load->model('M_barang_keluar');
    //     $this->load->model('M_gudang/M_gudang_admin/M_admin_spbm');
    //     $this->load->model('M_purchasing/M_po_pembelian');
    //     $this->load->model('M_users');
    // }

//     public function index()
//     {
//         $cek_sppb = $this->M_admin_sppb->cek_sppb()->row_array(0);
//         $cek_po = $this->M_po_pembelian->cek_pembelian()->row_array(0);
//         $cek_spbm = $this->M_admin_spbm->cek_spbm()->row_array(0);
//         die;
//         $this->template->load('template', 'layout/left_sidebar.php', array(
//             'cek_sppb' => $cek_sppb['tot_status_sppb'],
//             'cek_po' => $cek_po['tot_status_spbm'],
//             'cek_spbm' => $cek_spbm['tot_status_spbm'],
//         ));
//         // print_r($data); 
//     }
// }