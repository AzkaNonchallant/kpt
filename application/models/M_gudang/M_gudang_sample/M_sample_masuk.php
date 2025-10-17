<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sample_masuk extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    private function id_user(){
        return $this->session->userdata("id_user");
    }

    // Ambil data dengan filter tanggal, nama barang, atau kode_tf_in
    public function get($tgl = null, $tgl2 = null, $nama_barang = null, $kode_tf_in = null){
        $this->db->select('a.*, b.nama_barang, c.nama_customer');
        $this->db->from('tb_sample_masuk a');
        $this->db->join('tb_master_barang b', 'a.id_barang = b.id_barang', 'left');
        $this->db->join('tb_master_customer c', 'a.id_customer = c.id_customer', 'left');
        $this->db->where('a.is_deleted', 0);

        if ($tgl != null && $tgl2 != null) {
            // expecting dd/mm/yyyy inputs
            $t1 = explode('/', $tgl);
            $t2 = explode('/', $tgl2);
            if (count($t1) === 3 && count($t2) === 3) {
                $from = $t1[2].'-'.$t1[1].'-'.$t1[0];
                $to   = $t2[2].'-'.$t2[1].'-'.$t2[0];
                $this->db->where("a.tgl_masuk_sample >=", $from);
                $this->db->where("a.tgl_masuk_sample <=", $to);
            }
        }

        if ($nama_barang != null) {
            $this->db->where('b.nama_barang', $nama_barang);
        }

        if ($kode_tf_in != null) {
            $this->db->where('a.kode_tf_in', $kode_tf_in);
        }

        $this->db->order_by('a.id_sample_masuk', 'DESC');
        $q = $this->db->get();
        return $q->result_array();
    }

    // Ambil semua data (raw)
    public function get2(){
        return $this->db->get_where('tb_sample_masuk', ['is_deleted' => 0])->result_array();
    }

    // Ambil data lengkap dengan relasi
    public function get3(){
        return $this->get(); // reuse get()
    }

    // Ambil 1 row by id
    public function get_by_id($id_sample_masuk){
        $q = $this->db->get_where('tb_sample_masuk', ['id_sample_masuk' => $id_sample_masuk, 'is_deleted' => 0]);
        return $q->row_array();
    }

    // Insert baru
    public function insert($data){
        // map expected fields (defensive)
        $row = [
            'id_mkt_po_sample' => isset($data['id_mkt_po_sample']) ? $data['id_mkt_po_sample'] : null,
            'tgl_masuk_sample' => isset($data['tgl_masuk_sample']) ? $data['tgl_masuk_sample'] : null, // expect yyyy-mm-dd
            'id_customer'      => isset($data['id_customer']) ? $data['id_customer'] : null,
            'id_barang'        => isset($data['id_barang']) ? $data['id_barang'] : null,
            'kode_tf_in'       => isset($data['kode_tf_in']) ? $data['kode_tf_in'] : null,
            'jumlah_masuk'     => isset($data['jumlah_masuk']) ? $data['jumlah_masuk'] : 0,
            'no_pengiriman'    => isset($data['no_pengiriman']) ? $data['no_pengiriman'] : null, // TAMBAH INI
            'kurir'            => isset($data['kurir']) ? $data['kurir'] : null, // TAMBAH INI
            'ket_masuk'        => isset($data['ket_masuk']) ? $data['ket_masuk'] : null,
            'gudang_admin'     => isset($data['gudang_admin']) ? $data['gudang_admin'] : null,
            'created_at'       => date('Y-m-d H:i:s'),
            'created_by'       => $this->id_user(),
            'updated_at'       => date('Y-m-d H:i:s'),
            'updated_by'       => $this->id_user(),
            'is_deleted'       => 0
        ];

        return $this->db->insert('tb_sample_masuk', $row);
    }

    // Update existing
    public function update($data){
        if (empty($data['id_sample_masuk'])) {
            return false;
        }

        $row = [
            'id_mkt_po_sample' => isset($data['id_mkt_po_sample']) ? $data['id_mkt_po_sample'] : null,
            'tgl_masuk_sample' => isset($data['tgl_masuk_sample']) ? $data['tgl_masuk_sample'] : null,
            'id_customer'      => isset($data['id_customer']) ? $data['id_customer'] : null,
            'id_barang'        => isset($data['id_barang']) ? $data['id_barang'] : null,
            'kode_tf_in'       => isset($data['kode_tf_in']) ? $data['kode_tf_in'] : null,
            'jumlah_masuk'     => isset($data['jumlah_masuk']) ? $data['jumlah_masuk'] : 0,
            'ket_masuk'        => isset($data['ket_masuk']) ? $data['ket_masuk'] : null,
            'gudang_admin'     => isset($data['gudang_admin']) ? $data['gudang_admin'] : null,
            'updated_at'       => date('Y-m-d H:i:s'),
            'updated_by'       => $this->id_user(),
        ];

        $this->db->where('id_sample_masuk', $data['id_sample_masuk']);
        return $this->db->update('tb_sample_masuk', $row);
    }

    // Soft delete
    public function delete($id_sample_masuk){
        $row = [
            'is_deleted' => 1,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $this->id_user()
        ];
        $this->db->where('id_sample_masuk', $id_sample_masuk);
        return $this->db->update('tb_sample_masuk', $row);
    }

    // Cek kode tf in (kembalikan jumlah)
    public function cek_kode_tf_in($kode_tf_in){
        if (empty($kode_tf_in)) return 0;
        $this->db->where('kode_tf_in', $kode_tf_in);
        $this->db->where('is_deleted', 0);
        return $this->db->count_all_results('tb_sample_masuk');
    }

    // Hitung total sample masuk (misal per barang)
    public function jml_sample_masuk($id_barang){
        $this->db->select_sum('jumlah_masuk', 'total_masuk');
        $this->db->where('id_barang', $id_barang);
        $this->db->where('is_deleted', 0);
        $q = $this->db->get('tb_sample_masuk');
        return $q->row();
    }

    // Ambil kode transfer terakhir
    public function get_kode_tf_in(){
        $this->db->select_max('kode_tf_in', 'kode_tf_in');
        $q = $this->db->get('tb_sample_masuk');
        return $q->row();
    }
}
