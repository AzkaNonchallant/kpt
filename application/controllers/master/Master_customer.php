<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once FCPATH . 'vendor/autoload.php'; // pastikan ini ditambahkan di awal file


class Master_customer extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_master/M_master_customer');
        $this->load->model('M_master/M_master_barang');
    }

    public function index()
    {
        // $data['row'] = $this->customer_m->get();
        $data['result'] = $this->M_master_customer->get()->result_array();
        $data['res_barang'] = $this->M_master_barang->get()->result_array();
        $this->template->load('template', 'content/master/master_customer/master_customer_data', $data);
    }

    public function get_barang_customer()
    {
        $id_customer = $this->input->post('id_customer');

        $res_barang = $this->db->query("
            SELECT a.id_barang, a.kode_barang, a.nama_barang, b.nama_supplier
            FROM tb_master_barang a
            LEFT JOIN tb_master_supplier b ON a.id_supplier = b.id_supplier
            LEFT JOIN tb_master_harga h 
            ON a.id_barang = h.id_barang 
            AND h.id_customer = ?
            AND h.is_deleted = 0
            WHERE a.is_deleted = 0 
            AND h.id_barang IS NULL
            ORDER BY a.created_at ASC
        ", [$id_customer])->result_array();

        echo json_encode($res_barang);
    }

    public function get_detail_customer()
    {
        $id_customer = $this->input->post('id_customer');

        // ambil data customer
        $customer = $this->db->get_where('tb_master_customer', [
            'id_customer' => $id_customer,
            'is_deleted' => 0
        ])->row_array();

        // ambil data harga barang customer ini
        $harga = $this->db->query("
        SELECT 
            h.id_master_harga,
            b.kode_barang,
            b.nama_barang,
            h.harga,
            h.mkt_admin,
            DATE_FORMAT(h.created_at, '%d-%m-%Y') AS tanggal_input
        FROM tb_master_harga h
        JOIN tb_master_barang b ON h.id_barang = b.id_barang
        WHERE h.id_customer = ?
          AND h.is_deleted = 0
        ORDER BY h.created_at DESC
    ", [$id_customer])->result_array();

        echo json_encode([
            'customer' => $customer,
            'harga' => $harga
        ]);
    }

    public function delete_harga($id)
{

    $respon = $this->M_master_customer->delete_harga($id);

    if ($respon) {
            header('location:' . base_url('master/master_customer') . '?alert=success&msg=Selamat anda berhasil menghapus harga customer');
        } else {
            header('location:' . base_url('master/master_customer') . '?alert=success&msg=Maaf anda gagal menghapus Harga customer');
        }

}

public function update_harga()
{
    $id_user = $this->session->userdata("id_user");
    $id = $this->input->post('id_master_harga');
    $harga = $this->input->post('harga');

   $data['id_user'] = $id_user;
   $data['id'] = $id;
   $data['harga'] = $harga;

   $respon = $this->M_master_customer->update_harga($data);
    
    if ($respon) {
            header('location:' . base_url('master/master_customer') . '?alert=success&msg=Selamat anda berhasil update harga customer');
        } else {
            header('location:' . base_url('master/master_customer') . '?alert=success&msg=Maaf anda gagal update Harga customer');
        }
}




    public function add()
    {
        $data['kode_customer'] = $this->input->post('kode_customer', TRUE);
        $data['nama_customer'] = $this->input->post('nama_customer', TRUE);
        $data['kegiatan_usaha'] = $this->input->post('kegiatan_usaha', TRUE);
        $data['alamat_customer'] = $this->input->post('alamat_customer', TRUE);
        $data['kota_kab'] = $this->input->post('kota_kab', TRUE);
        $data['kota_nama'] = $this->input->post('kota_nama', TRUE);
        $data['provinsi'] = $this->input->post('provinsi', TRUE);
        $data['provinsi_nama'] = $this->input->post('provinsi_nama', TRUE);
        $data['nib'] = $this->input->post('nib', TRUE);
        $data['npwp'] = $this->input->post('npwp', TRUE);
        $data['alamat_kirim'] = $this->input->post('alamat_kirim', TRUE);
        $data['alamat_pjk'] = $this->input->post('alamat_pjk', TRUE);
        $respon = $this->M_master_customer->add($data);

        if ($respon) {
            header('location:' . base_url('master/master_customer') . '?alert=success&msg=Selamat anda berhasil menambah customer');
        } else {
            header('location:' . base_url('master/master_customer') . '?alert=success&msg=Maaf anda gagal menambah customer');
        }
    }
    public function update()
    {
        $data['id_customer'] = $this->input->post('id_customer', TRUE);
        $data['kode_customer'] = $this->input->post('kode_customer', TRUE);
        $data['nama_customer'] = $this->input->post('nama_customer', TRUE);
        $data['kegiatan_usaha'] = $this->input->post('kegiatan_usaha', TRUE);
        $data['alamat_customer'] = $this->input->post('alamat_customer', TRUE);
        $data['provinsi'] = $this->input->post('provinsi', TRUE);
        $data['kota_kab'] = $this->input->post('kota_kab', TRUE);
        $data['nib'] = $this->input->post('nib', TRUE);
        $data['npwp'] = $this->input->post('npwp', TRUE);
        $data['alamat_kirim'] = $this->input->post('alamat_kirim', TRUE);
        $respon = $this->M_master_customer->update($data);
        // echo $respon;
        if ($respon) {
            header('location:' . base_url('master/master_customer') . '?alert=success&msg=Selamat anda berhasil meng-update customer');
        } else {
            header('location:' . base_url('master/master_customer') . '?alert=success&msg=Maaf anda gagal meng-update customer');
        }
    }
    public function delete($id_customer)
    {
        $data['id_customer'] = $id_customer;
        $respon = $this->M_master_customer->delete($data);

        if ($respon) {
            header('location:' . base_url('master/master_customer') . '?alert=success&msg=Selamat anda berhasil menghapus customer');
        } else {
            header('location:' . base_url('master/master_customer') . '?alert=success&msg=Maaf anda gagal menghapus customer');
        }
    }

    public function cek_kode_customer()
    {
        $kode_customer = $this->input->post('kode_customer', TRUE);

        $row = $this->M_master_customer->cek_kode_customer($kode_customer)->row_array();
        if ($row['count_kc'] == 0) {
            echo "false";
        } else {
            echo "true";
        }
    }

    public function add_harga()
    {
        $data['id_customer'] = $this->input->post('id_customer', TRUE);
        $data['id_barang']  = $this->input->post('id_barang', TRUE);
        $data['harga']  = $this->input->post('harga', TRUE);
        $data['mkt_admin'] =  $this->input->post('mkt_admin', TRUE);

        $respon = $this->M_master_customer->add_harga($data);
        if ($respon) {
            header('location:' . base_url('master/master_customer') . '?alert=success&msg=Selamat anda berhasil menambah harga Customer');
        } else {
            header('location:' . base_url('master/master_customer') . '?alert=success&msg=Maaf anda gagal menambah Harga customer');
        }
    }


    public function pdf_customer_list()
    {
        // 1️⃣ Inisialisasi Dompdf
        $options = new Dompdf\Options();
        $options->set('isHtml5ParserEnabled', true);
        // $options->set('isRemoteEnabled', true); // biar bisa load gambar/logo
        $options->set('isRemoteEnabled', false); // ⚡ Pakai file lokal biar cepat
        $options->set('isFontSubsettingEnabled', false);
        $options->set('defaultFont', 'Helvetica');
        $options->set('enable_font_subsetting', true);
        $options->set('dpi', 99);
        $options->set('chroot', FCPATH);
        $options->set('fontCache', FCPATH . 'application/cache/dompdf/');
        $options->set('tempDir', FCPATH . 'application/cache/dompdf/');
        $dompdf = new Dompdf\Dompdf($options);

        // 2️⃣ Ambil data dari model
        $data['result'] = $this->M_master_customer->get()->result_array();

        // 3️⃣ Render view ke HTML string
        $html = $this->load->view('content/master/master_customer/pdf_customer_list', $data, TRUE);

        // 4️⃣ Set ukuran halaman (A4 potrait)
        $dompdf->setPaper('A4', 'landscape');

        // 5️⃣ Load HTML ke Dompdf
        $dompdf->loadHtml($html);

        // 6️⃣ Render HTML jadi PDF
        $dompdf->render();

        // // 7️⃣ Tambahkan nomor halaman di footer
        // $canvas = $dompdf->getCanvas();
        // $font = $dompdf->getFontMetrics()->get_font("helvetica", "normal");
        // $canvas->page_text(520, 820, "Halaman {PAGE_NUM} dari {PAGE_COUNT}", $font, 9, [0, 0, 0]);

        // 8️⃣ Output ke browser
        $dompdf->stream("Customer_List.pdf", ["Attachment" => false]);
    }
}
