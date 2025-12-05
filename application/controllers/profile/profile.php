<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once FCPATH . 'vendor/autoload.php'; // pastikan ini ditambahkan di awal file

class Profile extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_profile/M_profile');
        $this->load->model('M_users');
    }

    private function convertDate($date)
    {
        return explode('/', $date)[2] . "-" . explode('/', $date)[1] . "-" . explode('/', $date)[0];
    }

    public function index()
    {

        


        // $data['row'] = $this->customer_m->get();\
        $data['result'] = $this->M_profile->get();
       
       
        $this->template->load('template', 'content/profile_data', $data);
        // print_r($data);

    }

    
    public function update()
    {
        $data['id_profile_pt'] = $this->input->post('id_profile_pt', TRUE);
        $data['nama_perusahaan'] = $this->input->post('nama_perusahaan', TRUE);
        $data['izin_pbf_available'] = $this->convertDate($this->input->post('izin_pbf_available', TRUE));
        $data['izin_pbf_exp'] = $this->convertDate($this->input->post('izin_pbf_exp', TRUE));
        $data['cdob_available'] = $this->convertDate($this->input->post('cdob_available', TRUE));
        $data['cdob_exp'] = $this->convertDate($this->input->post('cdob_exp', TRUE));
        $data['no_spa_available'] = $this->convertDate($this->input->post('no_spa_available', TRUE));
        $data['no_spa_exp'] = $this->convertDate($this->input->post('no_spa_exp', TRUE));
        $data['nama_apy'] = $this->input->post('nama_apy', TRUE);
       

        $respon = $this->M_profile->update($data);
        // echo $respon;
        if ($respon) {
            header('location:' . base_url('profile/profile') . '?alert=success&msg=Selamat anda berhasil meng-update PO Customer');
        } else {
            header('location:' . base_url('profile/profile') . '?alert=danger&msg=Maaf anda gagal meng-update PO Customer');
        }
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
