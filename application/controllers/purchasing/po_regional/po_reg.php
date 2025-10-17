<?php
defined('BASEPATH') or exit('No direct script access allowed');

class po_reg extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_purchasing/M_po_reg/M_po_reg');
        $this->load->model('M_gudang/M_gudang_barang/M_barang_masuk/M_barang_masuk');
        $this->load->model('M_master/M_master_supplier');
    }

    public function index()
    {
        $data['result'] = $this->M_po_reg->get()->result_array();
        $data['res_supplier'] = $this->M_master_supplier->get()->result_array();
        $data['res_barang'] = $this->M_barang_masuk->get3()->result_array();
        // echo json_encode($data['result']);
        $this->template->load('template', 'content/purchasing/po_regional/po_reg', $data);
    }

    public function add()
    {
        $data = [
            'tgl_po_reg' => $this->convertDate($this->input->post('tgl_po_reg', TRUE)),
            'no_po_reg' => $this->input->post('no_po_reg', TRUE),
            'id_supplier' => $this->input->post('id_supplier', TRUE),
            'id_barang' => $this->input->post('id_barang', TRUE),
            'jumlah' => $this->input->post('jumlah', TRUE),
            'harga_perunit' => $this->input->post('harga_perunit', TRUE),
            'metode' => $this->input->post('metode', TRUE),
            'shipment' => $this->input->post('shipment', TRUE),
            'pic1' => $this->input->post('pic1', TRUE),
            'pic2' => $this->input->post('pic2', TRUE),
            'pajak' => $this->input->post('pajak', TRUE),
            'total_harga' => $this->input->post('total_harga', TRUE),
            'prc_admin' => $this->input->post('prc_admin', TRUE),
        ];

        $respon = $this->M_po_reg->add($data);

        if ($respon) {
            header('location:' . base_url('purchasing/po_regional/po_reg') . '?alert=success&msg=Selamat anda berhasil menambah Barang');
        } else {
            header('location:' . base_url('purchasing/po_regional/po_reg') . '?alert=error&msg=Maaf anda gagal menambah Barang');
        }
    }

    public function update()
    {
        $data = [
            'tgl_po_reg' => $this->convertDate($this->input->post('tgl_po_reg', TRUE)),
            'id_prc_po_reg' => $this->input->post('id_prc_po_reg', TRUE),
            'no_po_reg' => $this->input->post('no_po_reg', TRUE),
            'id_supplier' => $this->input->post('id_supplier', TRUE),
            'id_barang' => $this->input->post('id_barang', TRUE),
            'jumlah' => $this->input->post('jumlah', TRUE),
            'harga_perunit' => $this->input->post('harga_perunit', TRUE),
            'metode' => $this->input->post('metode', TRUE),
            'shipment' => $this->input->post('shipment', TRUE),
            'pic1' => $this->input->post('pic1', TRUE),
            'pic2' => $this->input->post('pic2', TRUE),
            'total_harga' => $this->input->post('total_harga', TRUE),
            'prc_admin' => $this->input->post('prc_admin', TRUE),
        ];

        $respon = $this->M_po_reg->update($data);

        if ($respon) {
            header('location:' . base_url('purchasing/po_regional/po_reg') . '?alert=success&msg=Selamat anda berhasil mengedit PO Reg');
        } else {
            header('location:' . base_url('purchasing/po_regional/po_reg') . '?alert=error&msg=Maaf anda gagal mengedit PO Reg');
        }
    }

    public function delete($id_prc_po_reg)
    {
        $data = ['id_prc_po_reg' => $id_prc_po_reg];
        $respon = $this->M_po_reg->delete($data);

        if ($respon) {
            header('location:' . base_url('purchasing/po_regional/po_reg') . '?alert=success&msg=Selamat anda berhasil menghapus Barang');
        } else {
            header('location:' . base_url('purchasing/po_regional/po_reg') . '?alert=error&msg=Maaf anda gagal menghapus Barang');
        }
    }

    private function convertDate($date)
    {
        if (!is_null($date) && !empty($date)) {
            $parts = explode('/', $date);
            return $parts[2] . "-" . $parts[1] . "-" . $parts[0];
        } else {
            return null; // atau nilai default yang sesuai
        }
    }
}