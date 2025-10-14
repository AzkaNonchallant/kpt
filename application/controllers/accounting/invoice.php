<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once FCPATH . 'vendor/autoload.php'; // pastikan ini ditambahkan di awal file
class Invoice extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_accounting/M_invoice');
        $this->load->model('M_gudang/M_gudang_barang/M_barang_masuk/M_barang_masuk');
        $this->load->model('M_users');
            $this->load->model('M_marketing/M_po_customer');
            $this->load->model('M_marketing/M_sppb');
            $this->load->model('M_master/M_master_customer');
            $this->load->model('M_master/M_master_barang');
            // Load M_invoice_item model if it exists
        // Remove M_invoice_item since it doesn't exist
    }

    private function convertDate($date)
    {
        return explode('/', $date)[2]."-".explode('/', $date)[1]."-".explode('/', $date)[0];
    }
    public function index()
	{

        $tgl = $this->input->get('date_from');
        $tgl2 = $this->input->get('date_until');
        $nama_barang = $this->input->get('nama_barang');
        $nama_customer = $this->input->get('nama_customer');
        $data['result'] = $this->M_invoice->get($tgl, $tgl2, $nama_barang, $nama_customer)->result_array();
        $data['res_barang'] = $this->M_barang_masuk->get3()->result_array();
        $data['res_customer'] = $this->M_master_customer->get()->result_array();
        $data['res_user'] = $this->M_users->get()->result_array();

        $data['tgl'] = $tgl;
        $data['tgl2'] = $tgl2;
        $data['nama_barang'] = $nama_barang;
        $data['nama_customer'] = $nama_customer;
		// $this->template->load('template', 'content/marketing/po_customer',$data);
        // print_r($data);
      $this->template->load('template','content/accounting/invoice_data', $data);
    }

    // tambah invoice
    public function add() {
        if ($this->input->post('submit')) {
            // Validasi no invoice
            $no_invoice = $this->input->post('no_invoice');
            if ($this->M_invoice->cek_no_invoice($no_invoice) > 0) {
                $this->session->set_flashdata('error', 'No Invoice sudah ada!');
                redirect('accounting/invoice/add');
            }

            $data = [
                'no_invoice' => $no_invoice,
                'id_customer' => $this->input->post('id_customer'),
                'nama_customer' => $this->input->post('nama_customer'),
                'tgl_invoice' => $this->input->post('tgl_invoice'),
                'total' => $this->input->post('total'),
                'status' => $this->input->post('status'),
                'keterangan' => $this->input->post('keterangan')
            ];
            
            $result = $this->M_invoice->add($data);
            if ($result) {
                $this->session->set_flashdata('success', 'Invoice berhasil ditambahkan!');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan invoice!');
            }
            redirect('accounting/invoice');
        } else {
            $data['res_customer'] = $this->M_invoice->get_customers();
            $data['auto_no_invoice'] = $this->M_invoice->generate_no_invoice();
            $this->load->view('content/accounting/invoice_data', $data);
        }
    }

    // edit invoice
    public function edit($id) {
        if ($this->input->post('submit')) {
            $no_invoice = $this->input->post('no_invoice');
            if ($this->M_invoice->cek_no_invoice($no_invoice, $id) > 0) {
                $this->session->set_flashdata('error', 'No Invoice sudah ada!');
                redirect('accounting/invoice/edit/' . $id);
            }

            $data = [
                'id_invoice' => $id,
                'no_invoice' => $no_invoice,
                'id_customer' => $this->input->post('id_customer'),
                'nama_customer' => $this->input->post('nama_customer'),
                'tgl_invoice' => $this->input->post('tgl_invoice'),
                'total' => $this->input->post('total'),
                'status' => $this->input->post('status'),
                'keterangan' => $this->input->post('keterangan')
            ];
            
            $result = $this->M_invoice->update($data);
            if ($result) {
                $this->session->set_flashdata('success', 'Invoice berhasil diupdate!');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengupdate invoice!');
            }
            redirect('accounting/invoice');
        } else {
            // FIX: Get invoice data and check if it exists
            $invoice_data = $this->M_invoice->get_by_id($id);
            
            if (!$invoice_data) {
                $this->session->set_flashdata('error', 'Invoice tidak ditemukan!');
                redirect('accounting/invoice');
            }
            
            // FIX: Ensure we have an object with proper properties
            if (is_array($invoice_data)) {
                $data['invoice'] = (object)$invoice_data;
            } else {
                $data['invoice'] = $invoice_data;
            }
            
            $data['res_customer'] = $this->M_invoice->get_customers();
            $this->load->view('content/accounting/invoice_data', $data);
        }
    }

    // hapus invoice
    public function delete($id) {
        $data = ['id_invoice' => $id];
        $result = $this->M_invoice->delete($data);
        
        if ($result) {
            $this->session->set_flashdata('success', 'Invoice berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus invoice!');
        }
        redirect('accounting/invoice');
    }


    
    public function update_status()
	{
        $data['id_mkt_po_customer'] = $this->input->post('id_mkt_po_customer',TRUE);
        $data['jenis_pembayaran'] = $this->input->post('jenis_pembayaran',TRUE);
        $data['status_invoice'] = $this->input->post('status_invoice', TRUE);
        $data['mkt_admin'] = $this->input->post('mkt_admin',TRUE);
        
        $respon = $this->M_po_customer->update_status($data);
		// echo $respon;
        if($respon){
            header('location:'.base_url('accounting/invoice').'?alert=success&msg=Selamat anda berhasil meng-update Data Invoice');
        }else{
            header('location:'.base_url('accounting/invoice').'?alert=danger&msg=Maaf anda gagal meng-update Data Invoice');
        }
	}

    // === CEK NO INVOICE

public function cek_no_invoice(){
        $no_invoice = $this->input->post('no_invoice',TRUE);

        $row = $this->M_invoice->cek_no_invoice($no_invoice)->row_array();
        if ($row['count_ni'] == 0) {
            echo "false";
        }else{
            echo "true";
        }
    }


    // === END
    // ==PDF INVOICE
    public function pdf_invoice($id)
    {
         if (ob_get_length()) ob_end_clean();
    try {
        // === 1️⃣ Setting optimal Dompdf ===
        $options = new \Dompdf\Options();
        // $options->set('isRemoteEnabled', false); // ⚡ Pakai file lokal biar cepat
        // $options->set('isFontSubsettingEnabled', false);
        $options->set('defaultFont', 'Helvetica');
        $options->set('enable_font_subsetting', true);
        $options->set('dpi', 100);
        $options->set('chroot', FCPATH);
        $options->set('fontCache', FCPATH . 'application/cache/dompdf/');
        $options->set('tempDir', FCPATH . 'application/cache/dompdf/');

        $dompdf = new \Dompdf\Dompdf($options);


        // === 2️⃣ Ambil data dari model ===
        $invoice['res_customer'] = $this->M_invoice->data_customer_pdf($id)->result_array();
        $invoice['items'] = $this->M_invoice->data_pdf($id)->result_array();
        // echo json_encode($invoice['res_customer']);
        // === 3️⃣ Load HTML View ===
        $html = $this->load->view('content/accounting/pdf/invoice_pdf', $invoice, TRUE);
        $dompdf->loadHtml($html, 'UTF-8');
        $dompdf->setPaper('A4', 'potrait');
    // if (file_exists($cache)) {
    //     readfile($cache);
    //     exit;
    // }
    $dompdf->render();
    // file_put_contents($cache, $dompdf->output());
    $dompdf->stream("Data_Invoice_$id.pdf", ["Attachment" => false]);
    } 
    catch (Exception $e) {
        // Tangani semua error (bukan cuma MpdfException)
        log_message('error', 'PDF Surat Jalan gagal dibuat: ' . $e->getMessage());
        echo 'Terjadi kesalahan saat membuat PDF. Coba lagi nanti.';
    }

    exit;
}
}