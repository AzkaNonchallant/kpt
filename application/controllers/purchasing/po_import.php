<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once FCPATH . 'vendor/autoload.php';
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

   public function detail()
{
    $no_po = $this->input->post('no_po_import');

    $po = $this->db
        ->where('no_po_import', $no_po)
        ->get('tb_prc_po_import_tf')
        ->row_array(); // ⬅️ INI PENTING

    $barang = $this->db
        ->select('c.nama_barang, b.jumlah,b.status_po_import, b.harga_perunit, b.total_harga')
        ->from('tb_prc_po_import b')
        ->join('tb_master_barang c', 'b.id_barang = c.id_barang', 'left')
        ->where('b.no_po_import', $no_po)
        ->get()
        ->result_array();

    echo json_encode([
        'po' => $po,       
        'barang' => $barang
    ]);
}

    public function add()
{
    
    
    $no_po = $this->input->post('no_po_import');
    $no_po_import = is_array($no_po) ? $no_po[0] : $no_po;

    $shipment  = $this->input->post('shipment', TRUE);
    $shipment2 = $this->input->post('shipment2', TRUE);

   
    $header = [
        'prc_admin' => $this->session->userdata('username'),
        'no_po_import'   => $no_po_import,
        'tgl_po_import'  => $this->convertDate($this->input->post('tgl_po_import', TRUE)),
        'payment'       => $this->convertDate(str_replace('_','-',$this->input->post('payment', TRUE))),
        'metode'         => $this->input->post('metode', TRUE),
        'shipment'       => !empty($shipment) ? $this->convertDate($shipment) : null,
        'shipment2'      => empty($shipment) ? (!empty($shipment2) ? $shipment2 : 'SECEPATNYA') : null,
        'pic1'           => $this->input->post('pic1', TRUE),
        'pic2'           => $this->input->post('pic2', TRUE),
    ];

   
    $id_barang     = $this->input->post('id_barang', TRUE);
    
    $jumlah        = $this->input->post('jumlah', TRUE);
    $harga         = $this->input->post('harga_perunit', TRUE);
    $total         = $this->input->post('total_harga', TRUE);

    // bersihin format angka
    $jumlah = array_map(function ($v) {
        return str_replace('.', '', $v);
    }, $jumlah);

   
    $this->db->trans_start();

    // INSERT HEADER
    $id_prc_po_import_tf = $this->M_po_import->add_import_transfer($header);

    if (!$id_prc_po_import_tf) {
        $this->db->trans_rollback();
        redirect('purchasing/po_import?alert=error&msg=Gagal menyimpan header PO');
        return;
    }

    // INSERT DETAIL BARANG
    for ($i = 0; $i < count($id_barang); $i++) {
        $detail = [
            'id_prc_po_import_tf' => $id_prc_po_import_tf,
            'no_po_import'        => $no_po_import,
            'id_barang'           => $id_barang[$i],
            'jumlah'              => $jumlah[$i],
            'harga_perunit'       => $harga[$i],
            'total_harga'         => $total[$i],
            'status_po_import'         => 'proses'
        ];

        $this->M_po_import->add_po_import($detail);
    }

    $this->db->trans_complete();

    
    if ($this->db->trans_status() === FALSE) {
        redirect('purchasing/po_import?alert=error&msg=Gagal menyimpan PO Import');
    } else {
        redirect('purchasing/po_import?alert=success&msg=PO Import berhasil ditambahkan');
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

    public function delete($id_prc_po_import_tf)
    {
        $data['id_prc_po_import_tf'] = str_replace('--', '/', $id_prc_po_import_tf);
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

    public function get_items_by_po()
    {
        $no_po_import = $this->input->post('no_po_import', TRUE);
        $items = $this->M_po_import->get_items_by_po($no_po_import)->result_array();
        echo json_encode($items);
    }

    public function data_ppb_barang() 
    { 
        $no_ppb_accounting = $this->input->post('no_ppb_accounting', TRUE);

        $result = $this->M_accounting_ppb->data_ppb_barang($no_ppb_accounting)->result_array();

        echo json_encode($result);
    }

    public function import_print_all()
{
    while (ob_get_level()) ob_end_clean();

    try {
        $options = new \Dompdf\Options();
        $options->set('defaultFont', 'Helvetica');
        $options->set('isRemoteEnabled', true);
        $options->set('chroot', FCPATH);

        $dompdf = new \Dompdf\Dompdf($options);

        // AMBIL SEMUA DATA
        $import['result'] = $this->M_po_import->pdf_import()->result_array();


        $html = $this->load->view(
            'content/purchasing/po_import/print_po_import',
            $import,
            true
        );

        $dompdf->loadHtml($html, 'UTF-8');
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("po_import_all.pdf", ["Attachment" => false]);

    } catch (Exception $e) {
        log_message('error', $e->getMessage());
        show_error('Gagal memuat PDF', 500);
    }
    exit;
}


public function import_print($no_po_import)
{
    // DECODE ID
    $no_po_import = str_replace('--', '/', $no_po_import);

    // BERSIHKAN OUTPUT BUFFER
    while (ob_get_level()) {
        ob_end_clean();
    }

    try {

        // VALIDASI ID
        if (empty($no_po_import)) {
            throw new Exception('ID tidak valid');
        }

        // AMBIL DATA
        $result = $this->M_po_import->import_pdf($no_po_import)->result_array();

        // VALIDASI DATA
        if (empty($result)) {
            throw new Exception('Data PO Import tidak ditemukan');
        }

        // DOMPDF OPTIONS
        $options = new \Dompdf\Options();
        $options->set('defaultFont', 'Helvetica');
        $options->set('enable_font_subsetting', true);
        $options->set('dpi', 100);
        $options->set('isRemoteEnabled', true);
        $options->set('chroot', FCPATH);

        // CACHE PATH
        $cachePath = FCPATH . 'application/cache/dompdf/';
        if (!is_dir($cachePath)) {
            mkdir($cachePath, 0777, true);
        }

        $options->set('fontCache', $cachePath);
        $options->set('tempDir', $cachePath);

        $dompdf = new \Dompdf\Dompdf($options);

        // DATA KE VIEW
        $data['result'] = $result;

        // LOAD VIEW
        $html = $this->load->view(
            'content/purchasing/po_import/print_po_import',
            $data,
            true
        );

        // RENDER PDF
        $dompdf->loadHtml($html, 'UTF-8');
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // NAMA FILE AMAN (TANPA /)
        $filename = 'import_print_' . str_replace('/', '-', $no_po_import) . '.pdf';

        // STREAM
        $dompdf->stream($filename, [
            'Attachment' => false
        ]);

    } catch (Exception $e) {

        log_message('error', 'PDF ERROR: ' . $e->getMessage());

        show_error(
            $e->getMessage(),
            500,
            'PDF Error'
        );
    }

    exit;
}


}