<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once FCPATH . 'vendor/autoload.php';

class sample_masuk extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_gudang/M_gudang_sample/M_sample_masuk');
        $this->load->model('M_master/M_master_barang');
        $this->load->model('M_master/M_master_customer');
        $this->load->model('M_gudang/M_gudang_admin/M_admin_sample');
        $this->load->model('M_users');
    }

    private function convertDate($date)
    {
        if (empty($date)) {
            return null;
        }
        
        $parts = explode('/', $date);

        if (count($parts) !== 3) {
            return null;
        }

        return $parts[2] . "-" . $parts[1] . "-" . $parts[0];
    }

    public function index()
    {
        $tgl = $this->input->get('date_from');
        $tgl2 = $this->input->get('date_until');
        $nama_barang = $this->input->get('nama_barang');
        $nama_customer = $this->input->get('nama_customer');

        $data['result'] = $this->M_sample_masuk->get($tgl, $tgl2, $nama_barang, $nama_customer);
        $data['res_barang'] = $this->M_master_barang->get()->result_array();
        $data['res_customer'] = $this->M_master_customer->get()->result_array();
        $data['res_user'] = $this->M_users->get()->result_array();
        $data['res_sample'] = $this->M_sample_masuk->get4()->result_array();
        $data['res_gud'] = $this->M_sample_masuk->get5()->result_array();

        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;
        $data['nama_barang'] = $nama_barang;
        $data['nama_customer'] = $nama_customer;
        
        $this->template->load('template', 'content/gudang/gudang_sample/sample_masuk_data', $data);
    }

    public function add()
    {
        $data['res_barang'] = $this->M_master_barang->get()->result_array();
        $data['res_customer'] = $this->M_master_customer->get()->result_array();
        $data['res_po_sample'] = $this->M_admin_sample->get()->result_array();
        $data['res_user'] = $this->M_users->get()->result_array();
        
        $this->template->load('template', 'content/gudang/gudang/sample/sample_masuk_data', $data);
    }

    public function proses()
    {
        $data['id_mkt_po_sample'] = $this->input->post('id_mkt_po_sample', TRUE);
        $data['tgl_masuk_sample'] = $this->convertDate($this->input->post('tgl_masuk_sample', TRUE));
        $data['id_customer'] = $this->input->post('id_customer', TRUE);
        $data['id_barang'] = $this->input->post('id_barang', TRUE);
        $data['kode_sample_in'] = $this->input->post('kode_sample_in', TRUE);
        $data['jumlah_masuk'] = $this->input->post('jumlah_masuk', TRUE);
        $data['jumlah_masuk'] = str_replace('.', '', $data['jumlah_masuk']);
        $data['ket_masuk'] = $this->input->post('ket_masuk', TRUE);
        $data['gudang_admin'] = $this->input->post('gudang_admin', TRUE);

        // Validasi
        if (empty($data['id_mkt_po_sample']) || empty($data['tgl_masuk_sample']) || empty($data['jumlah_masuk'])) {
            header('location:'.base_url('gudang/gudang_admin/admin_sample').'?alert=danger&msg=Data required tidak boleh kosong');
            return;
        }

        // Cek kode TF IN jika perlu
        if (!empty($data['kode_sample_in'])) {
            $cek_kode = $this->M_sample_masuk->cek_kode_sample_in($data['kode_sample_in']);
            if ($cek_kode > 0) {
                header('location:'.base_url('gudang/gudang_admin/admin_sample').'?alert=danger&msg=Kode TF IN sudah digunakan');
                return;
            }
        }

        $respon = $this->M_sample_masuk->insert($data);

        if($respon){
        $this->M_admin_sample->update_status($data['id_mkt_po_sample'], 'processed');
        header('location:'.base_url('gudang/gudang_admin/admin_sample').'?alert=success&msg=Selamat anda berhasil memproses PO Sample');
        }else{
            header('location:'.base_url('gudang/gudang_admin/admin_sample').'?alert=danger&msg=Maaf anda gagal memproses PO Sample');
        }

        // if($respon){
        //     header('location:'.base_url('gudang/gudang_admin/admin_sample').'?alert=success&msg=Selamat anda berhasil menambah data sample masuk');
        // }else{
        //     header('location:'.base_url('gudang/gudang_admin/admin_sample').'?alert=danger&msg=Maaf anda gagal menambah data sample masuk');
        // }
    }

    public function edit($id_sample_masuk)
    {
        $data['row'] = $this->M_sample_masuk->get_by_id($id_sample_masuk);
        $data['res_barang'] = $this->M_master_barang->get()->result_array();
        $data['res_customer'] = $this->M_master_customer->get()->result_array();
        $data['res_po_sample'] = $this->M_admin_sample->get()->result_array();
        $data['res_user'] = $this->M_users->get()->result_array();
        
        $this->template->load('template', 'content/gudang/gudang_sample/sample_masuk_data', $data);
    }

    public function update()
    {
        $data['id_sample_masuk'] = $this->input->post('id_sample_masuk', TRUE);
        $data['id_mkt_po_sample'] = $this->input->post('id_mkt_po_sample', TRUE);
        $data['tgl_masuk_sample'] = $this->convertDate($this->input->post('tgl_masuk_sample', TRUE));
        $data['id_customer'] = $this->input->post('id_customer', TRUE);
        $data['id_barang'] = $this->input->post('id_barang', TRUE);
        $data['kode_sample_in'] = $this->input->post('kode_sample_in', TRUE);
        $data['jumlah_masuk'] = $this->input->post('jumlah_masuk', TRUE);
        $data['jumlah_masuk'] = str_replace('.', '', $data['jumlah_masuk']);
        $data['ket_masuk'] = $this->input->post('ket_masuk', TRUE);
        $data['gudang_admin'] = $this->input->post('gudang_admin', TRUE);

        $respon = $this->M_sample_masuk->update($data);

        if($respon){
            header('location:'.base_url('gudang/sample_masuk').'?alert=success&msg=Selamat anda berhasil mengupdate data sample masuk');
        }else{
            header('location:'.base_url('gudang/sample_masuk').'?alert=danger&msg=Maaf anda gagal mengupdate data sample masuk');
        }
    }

    public function delete($id_sample_masuk)
    {
        $respon = $this->M_sample_masuk->delete($id_sample_masuk);

        if($respon){
            header('location:'.base_url('gudang/sample_masuk').'?alert=success&msg=Selamat anda berhasil menghapus data sample masuk');
        }else{
            header('location:'.base_url('gudang/sample_masuk').'?alert=danger&msg=Maaf anda gagal menghapus data sample masuk');
        }
    }

    public function cek_kode_sample_in()
    {
        $kode_sample_in = $this->input->post('kode_sample_in', TRUE);
        $count = $this->M_sample_masuk->cek_kode_sample_in($kode_sample_in);
        
        if ($count == 0) {
            echo "false";
        } else {
            echo "true";
        }
    }

    public function get_po_sample_data($id_mkt_po_sample)
    {
        $data = $this->M_admin_sample->get_po_sample_by_id($id_mkt_po_sample);
        echo json_encode($data);
    }

    public function pdf_surat()
{   

    if (ob_get_length()) ob_end_clean();


    try {
        // === ⿡ Setting optimal Dompdf ===
        $options = new \Dompdf\Options();
        $options->set('isRemoteEnabled', false); // ⚡ Pakai file lokal biar cepat
        $options->set('isFontSubsettingEnabled', false);
        $options->set('defaultFont', 'Helvetica');
        $options->set('enable_font_subsetting', true);
        $options->set('dpi', 180);
        $options->set('chroot', FCPATH);
        $options->set('fontCache', FCPATH . 'application/cache/dompdf/');
        $options->set('tempDir', FCPATH . 'application/cache/dompdf/');

        $dompdf = new \Dompdf\Dompdf($options);


        // === ⿢ Ambil data dari model ===
        $data['row'] = $this->M_sample_masuk->ambil_surat_jalan2()->row_array();
        $data['detail'] = $this->M_sample_masuk->data_barang_keluar2()->result_array();
        // echo json_encode($data['detail']);
        // === ⿣ Load HTML View ===
        $html = $this->load->view('laporan/sample_masuk/page_sample_masuk', $data, TRUE);
        $dompdf->loadHtml($html, 'UTF-8');
        $dompdf->setPaper('A4', 'landscape');
    // if (file_exists($cache)) {
    //     readfile($cache);
    //     exit;
    // }
    $dompdf->render();
    // file_put_contents($cache, $dompdf->output());
    $dompdf->stream("laporan_barang.pdf", ["Attachment" => false]);
    } 
    catch (Exception $e) {
        // Tangani semua error (bukan cuma MpdfException)
        log_message('error', 'PDF Surat Jalan gagal dibuat: ' . $e->getMessage());
        echo 'Terjadi kesalahan saat membuat PDF. Coba lagi nanti.';
}
}

}