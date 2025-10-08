<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

    // tampil semua data invoice dengan filter
    // public function index() {
    //     $nama_customer = $this->input->get('nama_customer');
    //     $date_from = $this->input->get('date_from');
    //     $date_until = $this->input->get('date_until');
        
    //     $data['invoice'] = $this->M_invoice->get_all($nama_customer, $date_from, $date_until);
    //     $data['res_customer'] = $this->M_invoice->get_customers();
    //     $data['res_barang'] = $this->M_barang_masuk->get3()->result_array();
    //     // echo json_encode($data['res_barang']);
    //     $this->template->load('template','content/accounting/invoice_data', $data);
    // }
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


		// $data['row'] = $this->customer_m->get();
		$data['result'] = $this->M_po_customer->get($tgl, $tgl2, $nama_barang, $nama_customer);
            for($i=0; $i<count($data['result']);$i++){
            $d['id_mkt_po_customer'] = $data['result'][$i]['id_mkt_po_customer'];
            $jml_sppb = $this->M_sppb->jml_sppb($d)->row_array();
            // $a=0;
            // for($o=0; $o<count($donasi);$o++){
            //     $a+=$donasi[$o]['donasi'];
            // }
            $sisa=$data['result'][$i]['jumlah_po_customer']-$jml_sppb['tot_sppb'];
            $data['result'][$i]['tot_sppb']=$jml_sppb['tot_sppb'];
            $data['result'][$i]['sisa']=$sisa;
        }
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

    // export PDF
    public function export_pdf() {
        $customer = $this->input->get('customer');
        $date_from = $this->input->get('date_from');
        $date_until = $this->input->get('date_until');
        
        $data['invoice'] = $this->M_invoice->get_all($customer, $date_from, $date_until);
        $data['filter'] = [
            'customer' => $customer,
            'date_from' => $date_from,
            'date_until' => $date_until
        ];
        
        // Load library PDF
        $this->load->library('pdf');
        $html = $this->load->view('content/accounting/invoice_pdf', $data, true);
        $this->pdf->generate($html, 'laporan_invoice_'.date('YmdHis'));
    }

    
    public function update_status()
	{
        $data['id_mkt_po_customer'] = $this->input->post('id_mkt_po_customer',TRUE);
		// $data['no_po'] = $this->input->post('no_po',TRUE);
        // $data['tgl_po'] = $this->convertDate($this->input->post('tgl_po',TRUE));
        // $data['id_customer'] = $this->input->post('id_customer',TRUE);
        // $data['id_barang'] = $this->input->post('id_barang',TRUE);
        // $data['jumlah_po'] = $this->input->post('jumlah_po',TRUE);
        // $data['harga_po'] = $this->input->post('harga_po',TRUE);
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
    // PDF per invoice

    public function pdf_invoice($id) {
        // === 1. Setup Dompdf options ===
        $options = new \Dompdf\Options();
        $options->set('isRemoteEnabled', false);
        $options->set('isFontSubsettingEnabled', false);
        $options->set('defaultFont', 'Helvetica');
        $options->set('enable_font_subsetting', true);
        $options->set('dpi', 90);
        $options->set('chroot', FCPATH);
        $options->set('fontCache', FCPATH . 'application/cache/dompdf/');
        $options->set('tempDir', FCPATH . 'application/cache/dompdf/');
        $dompdf = new \Dompdf\Dompdf($options);

        // === 2. Ambil data invoice ===
        $invoice_data = $this->M_invoice->get_by_id($id);
        
        if (!$invoice_data) {
            show_404();
        }
        
        if (is_array($invoice_data)) {
            $data['invoice'] = (object)$invoice_data;
        } else {
            $data['invoice'] = $invoice_data;
        }

        // === 3. Load view HTML ===
        $html = $this->load->view('content/accounting/invoice_single_pdf', $data, TRUE);

        // === 4. Set ukuran kertas ===
        $dompdf->setPaper('A4', 'portrait');

        // === 5. Render ===
        $dompdf->loadHtml($html);
        $dompdf->render();

        // === 6. Tambah footer nomor halaman ===
        $canvas = $dompdf->getCanvas();
        $canvas->page_script(function ($pageNumber, $pageCount, $canvas, $fontMetrics) {
            $text = "Halaman $pageNumber dari $pageCount";
            $font = $fontMetrics->getFont("Helvetica", "normal");
            $size = 9;
            $width = $fontMetrics->getTextWidth($text, $font, $size);
            $canvas->text(550 - $width, 820, $text, $font, $size);
        });

        // === 7. Output ke browser ===
        $dompdf->stream("Invoice_".$data['invoice']->no_invoice.".pdf", ["Attachment" => false]);
    }
}