<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once FCPATH . 'vendor/autoload.php'; // pastikan ini ditambahkan di awal file

class po_customer extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_marketing/M_po_customer');
        $this->load->model('M_marketing/M_sppb');
        $this->load->model('M_master/M_master_barang');
        $this->load->model('M_gudang/M_gudang_barang/M_barang_masuk/M_barang_masuk');
        $this->load->model('M_master/M_master_customer');
        $this->load->model('M_users');
    }

    private function convertDate($date)
    {
        return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
    }

    public function index()
    {

        $tgl = $this->input->get('date_from');
        $tgl2 = $this->input->get('date_until');
        $nama_barang = $this->input->get('nama_barang');
        $nama_customer = $this->input->get('nama_customer');


        // $data['row'] = $this->customer_m->get();\
        $data['result'] = $this->M_po_customer->get($tgl, $tgl2, $nama_barang, $nama_customer);
        $filtered = [];
        if (!empty($data['result']) && is_array($data['result'])) {
            for ($i = 0; $i < count($data['result']); $i++) {
                $d['id_mkt_po_customer'] = $data['result'][$i]['id_mkt_po_customer'];
                $jml_sppb = $this->M_sppb->jml_sppb($d)->row_array();
                $sisa = $data['result'][$i]['jumlah_po_customer'] - $jml_sppb['tot_sppb'];
                $data['result'][$i]['tot_sppb'] = $jml_sppb['tot_sppb'];
                $data['result'][$i]['sisa'] = $sisa;

                // hanya tampilkan jika masih ada sisa
                if ($data['result'][$i]['sisa'] > 0) {
                    $filtered[] = $data['result'][$i];
                }
            }
        }
        $data['result'] = $filtered;
        $data['res_barang'] = $this->M_barang_masuk->get3()->result_array();
        $data['res_customer'] = $this->M_master_customer->get()->result_array();
        $data['res_user'] = $this->M_users->get()->result_array();

        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;
        $data['nama_barang'] = $nama_barang;
        $data['nama_customer'] = $nama_customer;
        $this->template->load('template', 'content/marketing/po_customer', $data);
        // print_r($data);

    }

    public function add()
    {
        $data['no_po'] = $this->input->post('no_po', TRUE);
        $data['tgl_po'] = $this->convertDate($this->input->post('tgl_po', TRUE));
        $data['id_customer'] = $this->input->post('id_customer', TRUE);
        $data['id_barang'] = $this->input->post('id_barang', TRUE);
        $data['kode_tf_in'] = $this->input->post('kode_tf_in', TRUE);
        $data['jumlah_po'] = $this->input->post('jumlah_po', TRUE);
        $data['jumlah_po'] = str_replace('.', '', $data['jumlah_po']); // Hapus titik pemisah ribuan
        $data['harga_po'] = $this->input->post('harga_po', TRUE);
        $data['harga_po'] = str_replace('.', '', $data['harga_po']); // Hapus titik pemisah ribuan
        $data['keterangan'] = $this->input->post('keterangan', TRUE);
        $data['jenis_pembayaran'] = $this->input->post('jenis_pembayaran', TRUE);
        $data['tgl_batas_waktu'] = $this->convertDate($this->input->post('tgl_batas_waktu', TRUE));
        $data['mkt_admin'] = $this->input->post('mkt_admin', TRUE);

        $respon = $this->M_po_customer->add($data);

        if ($respon) {
            header('location:' . base_url('marketing/po_customer') . '?alert=success&msg=Selamat anda berhasil menambah PO Customer');
        } else {
            header('location:' . base_url('marketing/po_customer') . '?alert=danger&msg=Maaf anda gagal menambah PO Customer');
        }
    }
    public function update()
    {
        $data['id_mkt_po_customer'] = $this->input->post('id_mkt_po_customer', TRUE);
        $data['no_po'] = $this->input->post('no_po', TRUE);
        $data['tgl_po'] = $this->convertDate($this->input->post('tgl_po', TRUE));
        $data['id_customer'] = $this->input->post('id_customer', TRUE);
        $data['id_barang'] = $this->input->post('id_barang', TRUE);
        $data['jumlah_po'] = $this->input->post('jumlah_po', TRUE);
        $data['harga_po'] = $this->input->post('harga_po', TRUE);
        $data['keterangan'] = $this->input->post('keterangan', TRUE);
        $data['jenis_pembayaran'] = $this->input->post('jenis_pembayaran', TRUE);
        $data['tgl_batas_waktu'] = $this->convertDate($this->input->post('tgl_batas_waktu', TRUE));
        $data['mkt_admin'] = $this->input->post('mkt_admin', TRUE);

        $respon = $this->M_po_customer->update($data);
        // echo $respon;
        if ($respon) {
            header('location:' . base_url('marketing/po_customer') . '?alert=success&msg=Selamat anda berhasil meng-update PO Customer');
        } else {
            header('location:' . base_url('marketing/po_customer') . '?alert=danger&msg=Maaf anda gagal meng-update PO Customer');
        }
    }
    public function delete($id_mkt_po_customer)
    {
        $data['id_mkt_po_customer'] = $id_mkt_po_customer;
        $respon = $this->M_po_customer->delete($data);

        if ($respon) {
            header('location:' . base_url('marketing/po_customer') . '?alert=success&msg=Selamat anda berhasil menghapus PO Customer');
        } else {
            header('location:' . base_url('marketing/po_customer') . '?alert=danger&msg=Maaf anda gagal menghapus PO Customer');
        }
    }

    public function cek_no_po()
    {
        $no_po = $this->input->post('no_po', TRUE);

        $row = $this->M_po_customer->cek_no_po($no_po)->row_array();
        if ($row['count_np'] == 0) {
            echo "false";
        } else {
            echo "true";
        }
    }

    public function get_barang_by_customer()
    {
        $id_customer = $this->input->post('id_customer');
        $data = $this->M_barang_masuk->get_barang_by_customer($id_customer);
        echo json_encode($data);
    }


    public function pdf_po_customer()
    {
        // === 1. Setup Dompdf options ===
        $options = new \Dompdf\Options();
        $options->set('isRemoteEnabled', false); // ⚡ Pakai file lokal biar cepat
        $options->set('isFontSubsettingEnabled', false);
        $options->set('defaultFont', 'Helvetica');
        $options->set('enable_font_subsetting', true);
        $options->set('dpi', 90);
        $options->set('chroot', FCPATH);
        $options->set('fontCache', FCPATH . 'application/cache/dompdf/');
        $options->set('tempDir', FCPATH . 'application/cache/dompdf/');
        $dompdf = new \Dompdf\Dompdf($options);

        // === 2. Ambil input filter ===
        $tgl = $this->input->get('date_from');
        $tgl2 = $this->input->get('date_until');
        $nama_barang = $this->input->get('nama_barang');
        $nama_customer = $this->input->get('nama_customer');

        // === 3. Ambil data dari model ===
        $data['result'] = $this->M_po_customer->get($tgl, $tgl2, $nama_barang, $nama_customer);
        $data['res_barang'] = $this->M_master_barang->get()->result_array();
        $data['res_customer'] = $this->M_master_customer->get()->result_array();
        $data['res_user'] = $this->M_users->get()->result_array();

        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;
        $data['nama_barang'] = $nama_barang;
        $data['nama_customer'] = $nama_customer;

        // echo json_encode($data['result']);
        // === 4. Load view HTML ===
        $html = $this->load->view('content/marketing/page_po_customer', $data, TRUE);

        // === 5. Set ukuran kertas ===
        $dompdf->setPaper('A4', 'portrait');

        // === 6. Render ===
        $dompdf->loadHtml($html);
        $dompdf->render();

        // === 7. Tambah footer nomor halaman ===
        $canvas = $dompdf->getCanvas();
        $canvas->page_script(function ($pageNumber, $pageCount, $canvas, $fontMetrics) {
            $text = "Halaman $pageNumber dari $pageCount";
            $font = $fontMetrics->getFont("Helvetica", "normal");
            $size = 9;
            $width = $fontMetrics->getTextWidth($text, $font, $size);
            $canvas->text(550 - $width, 820, $text, $font, $size);
        });

        // === 8. Output ke browser ===
        $dompdf->stream("Laporan_PO_Customer.pdf", ["Attachment" => false]);
    }
}
