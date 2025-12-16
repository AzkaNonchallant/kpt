<?php
defined('BASEPATH') or exit('No direct script access allowed');

class po_import extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_purchasing/M_po_import_tf');
        $this->load->model('M_purchasing/M_po_import');
        $this->load->model('M_gudang/M_gudang_barang/M_barang_masuk/M_barang_masuk');
        $this->load->model('M_master/M_master_supplier');
        $this->load->model('M_master/M_master_customer'); // Tambahkan model customer
        $this->load->model('M_users');
    }

    public function index()
    {
        // $data['row'] = $this->customer_m->get();
        $data['result'] = $this->M_po_import_tf->get()->result_array();
        $data['res_barang'] = $this->M_barang_masuk->get3()->result_array();
        $data['res_supplier'] = $this->M_master_supplier->get()->result_array();
        $data['res_customer'] = $this->M_master_customer->get()->result_array(); // Ambil data customer
        // echo json_encode($data['result']);

        $this->template->load('template', 'content/purchasing/po_import/prc_po_import', $data);
        // print_r($data);

    }

    public function get_barang_by_supplier()
    {
        $id_supplier = $this->input->post('id_supplier', TRUE);
        
        // Panggil model untuk mengambil data barang berdasarkan supplier
        $data = $this->M_barang_masuk->get_barang_by_supplier($id_supplier);
        
        // Debug: lihat data yang dikembalikan
        
        echo json_encode($data);
    }

    public function add()
    {
        $data['id_prc_po_import_tf'] = $this->input->post('id_prc_po_import_tf', TRUE);
        $data['prc_admin'] = $this->input->post('prc_admin', TRUE);
        $no_po = $this->input->post('no_po_import');
        $data['no_po_import'] = is_array($no_po) ? $no_po[0] : $no_po;
        $data['tgl_po_import'] = $this->convertDate($this->input->post('tgl_po_import', TRUE));
        $data['payment'] = $this->convertDate($this->input->post('payment', TRUE));
        $data['metode'] = $this->input->post('metode', TRUE);
        
        // LOGIKA SHIPMENT vs SHIPMENT2
        $shipment = $this->input->post('shipment', TRUE);
        $shipment2 = $this->input->post('shipment2', TRUE);
        
        if (!empty($shipment)) {
            $data['shipment'] = $this->convertDate($shipment);
            $data['shipment2'] = null; // NULL karena ada tanggal
        } else {
            $data['shipment'] = null;
            $data['shipment2'] = !empty($shipment2) ? $shipment2 : 'SECEPATNYA';
        }
        
        $data['pic1'] = $this->input->post('pic1', TRUE);
        $data['pic2'] = $this->input->post('pic2', TRUE);
        $data['id_barang'] = $this->input->post('id_barang', TRUE);
        $data['jumlah'] = $this->input->post('jumlah', TRUE);
        $data['jumlah'] = str_replace('.', '', $data['jumlah']);
        $data['harga_perunit'] = $this->input->post('harga_perunit', TRUE);
        $data['total_harga'] = $this->input->post('total_harga', TRUE);
        
        $respon = $this->M_po_import->add_import_transfer($data);

        if ($respon) {
            for ($i = 0; $i < count($data['jumlah']); $i++) {
                // echo $data['jumlah'][$i]."<br>";
                $d['no_po_import'] = $data['no_po_import'];
                $d['id_barang'] = $data['id_barang'][$i];
                $d['jumlah'] = $data['jumlah'][$i];
                $d['harga_perunit'] = $data['harga_perunit'][$i];
                $d['total_harga'] = $data['total_harga'][$i];

                $respon = $this->M_po_import->add_po_import($d);
            }
            header('location:' . base_url('purchasing/po_import') . '?alert=success&msg=Selamat anda berhasil menambah Barang');
        } else {
            header('location:' . base_url('purchasing/po_import') . '?alert=error&msg=Maaf anda gagal menambah Barang');
        }
    }

    public function update()
    {
        $data['tgl_po_import'] = $this->convertDate($this->input->post('tgl_po_import', TRUE));
        $data['id_prc_po_import_tf'] = $this->input->post('id_prc_po_import_tf', TRUE);
        $data['prc_admin'] = $this->input->post('prc_admin', TRUE);
        
        // Konversi payment jika ada
        $payment = $this->input->post('payment', TRUE);
        $data['payment'] = !empty($payment) ? $this->convertDate($payment) : null;
        
        $data['metode'] = $this->input->post('metode', TRUE);
        
        // LOGIKA SHIPMENT vs SHIPMENT2 untuk UPDATE
        $shipment = $this->input->post('shipment', TRUE);
        $shipment2 = $this->input->post('shipment2', TRUE);
        
        if (!empty($shipment)) {
            $data['shipment'] = $this->convertDate($shipment);
            $data['shipment2'] = null; // NULL karena ada tanggal
        } else {
            $data['shipment'] = null;
            // Default "SECEPATNYA" jika kosong
            $data['shipment2'] = !empty($shipment2) ? $shipment2 : 'SECEPATNYA';
        }
        
        $data['pic1'] = $this->input->post('pic1', TRUE);
        $data['pic2'] = $this->input->post('pic2', TRUE);

        $respon = $this->M_po_import->update($data);

        if ($respon) {
            header('location:' . base_url('purchasing/po_import') . '?alert=success&msg=Selamat anda berhasil mengupdate PO Import');
        } else {
            header('location:' . base_url('purchasing/po_import') . '?alert=error&msg=Maaf anda gagal mengupdate PO Import');
        }
    }

    public function delete($no_po_import)
    {
        $data['no_po_import'] = str_replace('--', '/', $no_po_import);
        $respon = $this->M_po_import->delete($data);
 
        if ($respon) {
            header('location:' . base_url('purchasing/po_import') . '?alert=success&msg=Selamat anda berhasil menghapus Permintaan Barang Melting');
        } else {
            header('location:' . base_url('purchasing/po_import') . '?alert=error&msg=Maaf anda gagal menghapus Permintaan Barang Melting');
        }
        // echo $no_transfer_slip;
    }

    private function convertDate($date)
    {
        // Jika null atau kosong, return null
        if (empty($date) || $date === null || $date === 'null') {
            return null;
        }
        
        try {
            $parts = explode('/', $date);
            
            // Pastikan ada 3 bagian (d/m/Y)
            if (count($parts) === 3) {
                return $parts[2] . "-" . $parts[1] . "-" . $parts[0];
            }
            
            // Jika format sudah Y-m-d, return as is
            if (strpos($date, '-') !== false && count(explode('-', $date)) === 3) {
                return $date;
            }
            
            return null;
        } catch (Exception $e) {
            return null;
        }
    }

    public function cek_no_po_import()
    {
        $no_po_import = $this->input->post('no_po_import', TRUE);
        $row = $this->M_po_import->cek_no_po_import($no_po_import)->row_array();

        if ($row['count_sj']==0) {
            echo "false";
        } else {
            echo "true";
        }
    }

    public function det_ppb_barang() 
    {
        $no_po_import = $this->input->post('no_po_import', TRUE);

        $result = $this->M_po_import->det_ppb_barang($no_po_import)->result_array();

        echo json_encode($result);
    }

    public function data_ppb_barang() 
    { 
        $no_ppb_accounting = $this->input->post('no_ppb_accounting', TRUE);

        $result = $this->M_accounting_ppb->data_ppb_barang($no_ppb_accounting)->result_array();

        echo json_encode($result);
    }
}