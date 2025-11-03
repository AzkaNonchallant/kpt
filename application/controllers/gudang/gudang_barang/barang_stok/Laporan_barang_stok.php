<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once FCPATH . 'vendor/autoload.php'; // pastikan ini ditambahkan di awal file

class Laporan_barang_stok extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_gudang/M_gudang_barang/M_barang_masuk/M_laporan_barang_masuk');
        $this->load->model('M_gudang/M_gudang_barang/M_barang_masuk/M_barang_masuk');
        $this->load->model('M_gudang/M_gudang_barang/M_barang_keluar/M_barang_keluar');
        $this->load->model('M_master/M_master_barang', 'M_barang');
        $this->load->model('M_master/M_master_supplier', 'M_supplier');
    }

    private function convertDate($date)
    {
        return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
    }

    public function index()
    {
        $id_barang = $this->input->get('id_barang');

        $result = $this->M_laporan_barang_masuk->get($id_barang);
        $data['result'] = is_array($result) ? $result : $result->result_array();

        


        $res_batch = $this->M_barang_masuk->get();
        $data['res_batch'] = is_array($res_batch) ? $res_batch : $res_batch->result_array();

        $res_barang = $this->M_barang->get();
        $data['res_barang'] = is_array($res_barang) ? $res_barang : $res_barang->result_array();

        $res_supplier = $this->M_supplier->get();
        $data['res_supplier'] = is_array($res_supplier) ? $res_supplier : $res_supplier->result_array();

        $data['id_barang'] = $id_barang;

        $this->template->load('template', 'content/gudang/gudang_barang/barang_stok/laporan_barang_stok_data', $data);
    }


    
    public function get_rincian_barang()
{
    $nama_barang = $this->input->post('nama_barang');

    // Ambil data barang masuk
    $barang_masuk = $this->db->select('
            a.id_barang_masuk,
            p.no_po_pembelian,
            a.kode_tf_in,
            a.no_batch,
            a.tgl_msk_gdg,
            a.tgl_exp,
            a.jenis_transaksi_gudang,
            a.gdg_qty_in,
            c.nama_barang,
            c.satuan
        ')
        ->from('tb_gudang_barang_masuk a')
        ->join('tb_prc_po_pembelian p', 'a.id_prc_po_pembelian = p.id_prc_po_pembelian', 'left')
        ->join('tb_master_barang c', 'p.id_barang = c.id_barang', 'left')
        ->where('a.is_deleted', 0)
        ->where('c.nama_barang', $nama_barang)
        ->order_by('a.tgl_msk_gdg', 'ASC')
        ->get()
        ->result_array();

    $hasil = [];

    foreach ($barang_masuk as $row) {
        // Cari total keluar berdasarkan kode_tf_in
        $barang_keluar = $this->db->select('SUM(gdg_qty_out) as total_keluar')
            ->from('tb_gudang_barang_keluar')
            ->where('kode_tf_in', $row['kode_tf_in'])
            ->where('is_deleted', 0)
            ->get()
            ->row_array();

        $total_keluar = $barang_keluar['total_keluar'] ?? 0;
        $stok_akhir = ($row['gdg_qty_in'] ?? 0) - $total_keluar;

        $hasil[] = [
            'no_po'         => $row['no_po_pembelian'],
            'tgl_masuk'     => $row['tgl_msk_gdg'],
            'kode_tf_in'    => $row['kode_tf_in'],
            'nama_barang'   => $row['nama_barang'],
            'no_batch'      => $row['no_batch'],
            'tgl_exp'       => $row['tgl_exp'],
            'jumlah_out'    => $row['jenis_transaksi_gudang'],
            'stok_akhir'    => $stok_akhir,
            'satuan'        => $row['satuan'],
        ];
    }

    echo json_encode($hasil);
}


    // Fungsi add, update, delete tetap sama
    public function delete($id_barang_keluar)
    {
        $data['id_barang_keluar'] = str_replace('--', '/', $id_barang_keluar);
        $respon = $this->M_laporan_barang_keluar->delete($data);

        if ($respon) {
            header('location:' . base_url('gudang/gudang_barang/barang_keluar/laporan_barang_keluar') . '?alert=success&msg=Selamat anda berhasil menghapus barang Kelur');
        } else {
            header('location:' . base_url('gudang/gudang_barang/barang_keluar/laporan_barang_keluar') . '?alert=success&msg=Maaf anda gagal menghapus barang Kelur');
        };
    }

    public function export_laporan_stock_barang()
{
    // Konfigurasi Dompdf
    $options = new Dompdf\Options();
     $options->set('isRemoteEnabled', false); // ⚡ Pakai file lokal biar cepat
        $options->set('isFontSubsettingEnabled', false);
        $options->set('defaultFont', 'Helvetica');
        $options->set('enable_font_subsetting', true);
        $options->set('dpi', 130);
        $options->set('chroot', FCPATH);
        $options->set('fontCache', FCPATH . 'application/cache/dompdf/');
        $options->set('tempDir', FCPATH . 'application/cache/dompdf/');
    $dompdf = new Dompdf\Dompdf($options);

    $nama_barang = $this->input->get('id_barang');

    // Ambil data dari model
    $data['result'] = $this->M_laporan_barang_masuk->data_export($nama_barang)->result_array();
    // Simpan variabel untuk digunakan di view
    $data['nama_barang'] = $nama_barang;

    // Render tampilan ke HTML
    $html = $this->load->view('content/gudang/gudang_barang/barang_stok/pdf/page_pdf_laporan_barang_stok', $data, TRUE);

    // Load HTML ke Dompdf
    $dompdf->loadHtml($html);

    // Setting ukuran dan orientasi halaman (A4 Portrait)
    $dompdf->setPaper('A4', 'landscape');

    // Render PDF
    $dompdf->render();

    // Tambahkan nomor halaman di footer
    $canvas = $dompdf->getCanvas();
    $font = $dompdf->getFontMetrics()->get_font("Helvetica", "normal");
    $canvas->page_text(520, 820, "Halaman {PAGE_NUM} dari {PAGE_COUNT}", $font, 9, [0, 0, 0]);

    // Output hasil PDF ke browser
    $dompdf->stream("laporan_barang_masuk.pdf", array("Attachment" => false));
}
}