<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once FCPATH . 'vendor/autoload.php';

class Master_supplier extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_master/M_master_supplier');
    }

    public function index()
    {
        $result = $data['result'] = $this->M_master_supplier->get()->result_array();
        $this->template->load('template', 'content/master/master_supplier/master_supplier_data',$data);
    }

    public function add()
    {
        $data['kode_supplier'] = $this->input->post('kode_supplier',TRUE);
        $data['nama_supplier'] = $this->input->post('nama_supplier',TRUE);
        $data['alamat_supplier'] = $this->input->post('alamat_supplier',TRUE);
        $data['negara_asal'] = $this->input->post('negara_asal',TRUE);
        $data['pic_supplier'] = $this->input->post('pic_supplier',TRUE);
        
        // Generate Kode PO otomatis berdasarkan nama supplier
        $data['kode_po'] = $this->generate_kode_po($data['nama_supplier']);
        
        $data['no_sertif_halal'] = $this->input->post('no_sertif_halal',TRUE);
        $respon = $this->M_master_supplier->add($data);

        if($respon){
            header('location:'.base_url('master/master_supplier').'?alert=success&msg=Selamat anda berhasil menambah supplier');
        }else{
            header('location:'.base_url('master/master_supplier').'?alert=success&msg=Maaf anda gagal menambah supplier');
        }
    }

    public function update()
    {
        $data['id_supplier'] = $this->input->post('id_supplier',TRUE);
        $data['kode_supplier'] = $this->input->post('kode_supplier',TRUE);
        $data['nama_supplier'] = $this->input->post('nama_supplier',TRUE);
        $data['alamat_supplier'] = $this->input->post('alamat_supplier',TRUE);
        $data['negara_asal'] = $this->input->post('negara_asal',TRUE);
        $data['pic_supplier'] = $this->input->post('pic_supplier',TRUE);
        
        // Cek apakah nama supplier berubah
        $old_data = $this->M_master_supplier->get_by_id($data['id_supplier']);
        $old_nama_supplier = $old_data->nama_supplier;
        
        if($data['nama_supplier'] != $old_nama_supplier) {
            // Jika nama berubah, generate kode PO baru
            $data['kode_po'] = $this->generate_kode_po($data['nama_supplier'], $data['id_supplier']);
        } else {
            // Jika nama tidak berubah, gunakan kode PO lama
            $data['kode_po'] = $this->input->post('kode_po',TRUE);
        }
        
        $data['no_sertif_halal'] = $this->input->post('no_sertif_halal',TRUE);
        $respon = $this->M_master_supplier->update($data);
        
        if($respon){
            header('location:'.base_url('master/master_supplier').'?alert=success&msg=Selamat anda berhasil meng-update supplier');
        }else{
            header('location:'.base_url('master/master_supplier').'?alert=success&msg=Maaf anda gagal meng-update supplier');
        }
    }

    public function delete($id_supplier)
    {
        $data['id_supplier'] = $id_supplier;
        $respon = $this->M_master_supplier->delete($data);

        if($respon){
            header('location:'.base_url('master/master_supplier').'?alert=success&msg=Selamat anda berhasil menghapus supplier');
        }else{
            header('location:'.base_url('master/master_supplier').'?alert=success&msg=Maaf anda gagal menghapus supplier');
        }
    }

    public function cek_kode_supplier(){
        $kode_supplier = $this->input->post('kode_supplier',TRUE);
        $row = $this->M_master_supplier->cek_kode_supplier($kode_supplier)->row_array();
        if ($row['count_ks']==0) {
            echo "false";
        }else{
            echo "true";
        }
    }

    public function cek_kode_po()
    {
        $kode_po = $this->input->post('kode_po', TRUE);
        $row = $this->M_master_supplier->cek_kode_po($kode_po)->row_array();
        if ($row['kode_po'] == 0) {
            echo "false";
        } else {
            echo "true";
        }
    }

    // Fungsi untuk generate preview kode PO real-time
    public function generate_preview_kode_po() {
        $nama_supplier = $this->input->post('nama_supplier', TRUE);
        $id_supplier = $this->input->post('id_supplier', TRUE);
        
        $nama_clean = preg_replace('/[^A-Z]/', '', strtoupper($nama_supplier));
        if(strlen($nama_clean) >= 3) {
            $inisial = substr($nama_clean, 0, 3);
        } else if(strlen($nama_clean) == 2) {
            $inisial = $nama_clean . 'X';
        } else if(strlen($nama_clean) == 1) {
            $inisial = $nama_clean . 'XX';
        } else {
            $inisial = 'XXX';
        }
        
        $tahun = date('Y');
        
        $count = $this->M_master_supplier->count_by_nama_and_tahun($nama_supplier, $tahun, $id_supplier);
        $nomor_urut = $count + 1;
        $nomor_format = str_pad($nomor_urut, 3, '0', STR_PAD_LEFT);
        
        $kode_po = $nomor_format . '/' . $tahun . '/' .'KPT' . '/' . $inisial;
        
        echo json_encode(array(
            'kode_po' => $kode_po,
            'nomor_urut' => $nomor_urut,
            'inisial' => $inisial,
            'tahun' => $tahun,
            'count' => $count
        ));
    }

    // Fungsi untuk generate kode PO final
    private function generate_kode_po($nama_supplier, $exclude_id = null) {
        // Ambil inisial
        $nama_clean = preg_replace('/[^A-Z]/', '', strtoupper($nama_supplier));
        if(strlen($nama_clean) >= 3) {
            $inisial = substr($nama_clean, 0, 3);
        } else if(strlen($nama_clean) == 2) {
            $inisial = $nama_clean . 'X';
        } else if(strlen($nama_clean) == 1) {
            $inisial = $nama_clean . 'XX';
        } else {
            $inisial = 'XXX';
        }
        
        // Ambil tahun sekarang
        $tahun = date('Y');
        
        // Hitung count untuk supplier dengan nama yang sama DAN TAHUN YANG SAMA
        $count = $this->M_master_supplier->count_by_nama_and_tahun($nama_supplier, $tahun, $exclude_id);
        
        $nomor_urut = $count + 1;
        $nomor_format = str_pad($nomor_urut, 3, '0', STR_PAD_LEFT);
        $kode_po = $nomor_format . '/' . $tahun . '/' . $inisial;
        
        return $kode_po;
    }

    public function pdf_vendor_list()
    {
        // --- Konfigurasi Dompdf ---
        $options = new Dompdf\Options();
        $options->set('isRemoteEnabled', false);
        $options->set('isFontSubsettingEnabled', false);
        $options->set('defaultFont', 'Helvetica');
        $options->set('enable_font_subsetting', true);
        $options->set('dpi', 97);
        $options->set('chroot', FCPATH);
        $options->set('fontCache', FCPATH . 'application/cache/dompdf/');
        $options->set('tempDir', FCPATH . 'application/cache/dompdf/');
        $dompdf = new Dompdf\Dompdf($options);

        $data['result'] = $this->M_master_supplier->get()->result_array();
        $html = $this->load->view('content/master/master_supplier/pdf_vendor_list', $data, TRUE);
        
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->loadHtml($html);
        $dompdf->render();
        
        $dompdf->stream('vendor_list.pdf', array('Attachment' => 0));
    }
}
?>