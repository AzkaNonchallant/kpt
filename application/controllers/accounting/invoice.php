<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_accounting/M_invoice');
        // Remove M_invoice_item since it doesn't exist
    }

    // tampil semua data invoice dengan filter
    public function index() {
        $nama_customer = $this->input->get('nama_customer');
        $date_from = $this->input->get('date_from');
        $date_until = $this->input->get('date_until');
        
        $data['invoice'] = $this->M_invoice->get_all($nama_customer, $date_from, $date_until);
        $data['res_customer'] = $this->M_invoice->get_customers();
        
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

    // PDF per invoice
    public function pdf_invoice($id) {
        $invoice_data = $this->M_invoice->get_by_id($id);
        
        if (!$invoice_data) {
            show_404();
        }
        
        // FIX: Ensure we have an object with proper properties
        if (is_array($invoice_data)) {
            $data['invoice'] = (object)$invoice_data;
        } else {
            $data['invoice'] = $invoice_data;
        }
        
        $this->load->library('pdf');
        $html = $this->load->view('content/accounting/invoice_single_pdf', $data, true);
        $this->pdf->generate($html, 'invoice_'.$data['invoice']->no_invoice);
    }
}