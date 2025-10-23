<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_sample_masuk extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    private function id_user()
    {
        return $this->session->userdata("id_user");
    }

    // Ambil data dengan filter tanggal, nama barang, atau kode_tf_in
    public function get($tgl = null, $tgl2 = null, $nama_barang = null, $kode_sample_in = null)
    {
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
                $from = $t1[2] . '-' . $t1[1] . '-' . $t1[0];
                $to   = $t2[2] . '-' . $t2[1] . '-' . $t2[0];
                $this->db->where("a.tgl_masuk_sample >=", $from);
                $this->db->where("a.tgl_masuk_sample <=", $to);
            }
        }

        if ($nama_barang != null) {
            $this->db->where('b.nama_barang', $nama_barang);
        }

        if ($kode_sample_in != null) {
            $this->db->where('a.kode_sample_in', $kode_sample_in);
        }

        $this->db->order_by('a.id_sample_masuk', 'DESC');
        $q = $this->db->get();
        return $q->result_array();
    }

    // Ambil semua data (raw)
    public function get2()
    {
        return $this->db->get_where('tb_sample_masuk', ['is_deleted' => 0])->result_array();
    }

    // Ambil data lengkap dengan relasi
    public function get3($id = null)
    {

        $sql = "
    SELECT 
        a.id_sample_masuk,
        a.no_batch,
        a.id_mkt_po_sample,
        a.id_customer,
        a.id_barang,
        a.ket_masuk,
        b.nama_customer,
        c.nama_barang
    FROM tb_sample_masuk a
    LEFT JOIN tb_master_customer b ON a.id_customer = b.id_customer
    LEFT JOIN tb_master_barang c ON a.id_barang = c.id_barang
    WHERE a.is_deleted = 0
    ORDER BY a.id_sample_masuk DESC
";
        return $this->db->query($sql);
    }

    // Ambil 1 row by id
    public function get_by_id($id_sample_masuk)
    {
        $q = $this->db->get_where('tb_sample_masuk', ['id_sample_masuk' => $id_sample_masuk, 'is_deleted' => 0]);
        return $q->row_array();
    }

    public function get4()
    {
        $sql = "
        SELECT 
            a.id_barang,
            a.kode_sample_in, 
            b.nama_barang,
            b.bloom,
            b.mesh,
            c.id_prc_po_pembelian,
            d.gdg_qty_in
        FROM tb_sample_masuk a
        LEFT JOIN tb_master_barang b ON a.id_barang = b.id_barang
        LEFT JOIN tb_prc_po_pembelian c ON  a.id_barang = c.id_barang
        LEFT JOIN tb_gudang_barang_masuk d ON c.id_prc_po_pembelian = d.id_prc_po_pembelian
        WHERE a.is_deleted = 0 
        ORDER BY a.created_at ASC
    ";

        return $this->db->query($sql);
    }

    public function get6() 
    {
        $sql = "
        SELECT a.id_barang,a.jumlah_masuk,a.no_batch,a.is_deleted,a.id_mkt_po_sample,b.nama_barang,b.mesh,b.bloom,b.satuan,c.kode_sample_in
        FROM tb_sample_masuk a
        LEFT JOIN tb_master_barang b ON a.id_barang = b.id_barang
        LEFT JOIN tb_sample_masuk c ON a.id_mkt_po_sample = c.id_mkt_po_sample
        WHERE a.is_deleted=0
        ";

        return $this->db->query($sql);
    }

    public function get5()
    {
        $sql = "
        SELECT 
            a.id_customer, 
            b.nama_customer
        FROM tb_sample_masuk a
        LEFT JOIN tb_master_customer b ON a.id_customer = b.id_customer
        WHERE a.is_deleted = 0
        ORDER BY a.created_at ASC
    ";

        return $this->db->query($sql);
    }



    // Insert baru
    public function insert($data)
    {
        // map expected fields (defensive)
        $row = [
            'id_mkt_po_sample' => isset($data['id_mkt_po_sample']) ? $data['id_mkt_po_sample'] : null,
            'tgl_masuk_sample' => isset($data['tgl_masuk_sample']) ? $data['tgl_masuk_sample'] : null, // expect yyyy-mm-dd
            'id_customer'      => isset($data['id_customer']) ? $data['id_customer'] : null,
            'id_barang'        => isset($data['id_barang']) ? $data['id_barang'] : null,
            'kode_sample_in'       => isset($data['kode_sample_in']) ? $data['kode_sample_in'] : null,
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
    public function update($data)
    {
        if (empty($data['id_sample_masuk'])) {
            return false;
        }

        $row = [
            'id_mkt_po_sample' => isset($data['id_mkt_po_sample']) ? $data['id_mkt_po_sample'] : null,
            'tgl_masuk_sample' => isset($data['tgl_masuk_sample']) ? $data['tgl_masuk_sample'] : null,
            'id_customer'      => isset($data['id_customer']) ? $data['id_customer'] : null,
            'id_barang'        => isset($data['id_barang']) ? $data['id_barang'] : null,
            'kode_sample_in'       => isset($data['kode_sample_in']) ? $data['kode_sample_in'] : null,
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
    public function delete($id_sample_masuk)
    {
        $row = [
            'is_deleted' => 1,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $this->id_user()
        ];
        $this->db->where('id_sample_masuk', $id_sample_masuk);
        return $this->db->update('tb_sample_masuk', $row);
    }

    // Cek kode tf in (kembalikan jumlah)
    public function cek_kode_sample_in($kode_sample_in)
    {
        if (empty($kode_sample_in)) return 0;
        $this->db->where('kode_sample_in', $kode_sample_in);
        $this->db->where('is_deleted', 0);
        return $this->db->count_all_results('tb_sample_masuk');
    }

    // Hitung total sample masuk (misal per barang)
    public function jml_sample_masuk($id_barang)
    {
        $this->db->select_sum('jumlah_masuk', 'total_masuk');
        $this->db->where('id_barang', $id_barang);
        $this->db->where('is_deleted', 0);
        $q = $this->db->get('tb_sample_masuk');
        return $q->row();
    }


    //     public function jml_po_sample($id_mkt_po_sample){
    //     $this->db->select_sum('jumlah_order', 'total_order'); // ganti kolom sesuai tabel kamu
    //     $this->db->where('id_mkt_po_sample', $id_mkt_po_sample);
    //     $this->db->where('is_deleted', 0);
    //     $q = $this->db->get('tb_mkt_po_sample');
    //     return $q->row();
    // }


    public function jml_po_sample($data)
    {
        $sql = "
            SELECT sum(jumlah_masuk) tot_sample_masuk FROM `tb_sample_masuk` 
            WHERE id_sample_masuk ='$data[id_sample_masuk]' AND is_deleted = 0";
        return $this->db->query($sql);
    }

    // public function jml_sample2_masuk($id_barang){
    //     $sql = "
    // SELECT SUM(jumlah_sample) AS total_sample 
    // FROM tb_mkt_po_sample
    // WHERE id_mkt_po_sample = '$id_mkt_po_sample'
    // AND is_deleted = 0
    // ";
    // return $this->db->query($sql);

    // }

    //  $sql = "
    //         SELECT sum(gdg_qty_in) tot_barang_masuk FROM `tb_gudang_barang_masuk` 
    //         WHERE id_barang_masuk ='$data[id_barang_masuk]' AND is_deleted = 0"; 
    //     return $this->db->query($sql);

    // Ambil kode transfer terakhir
    // public function get_kode_sample_in(){
    //     $this->db->select_max('kode_sample_in', 'kode_sample_in');
    //     $q = $this->db->get('tb_sample_masuk');
    //     return $q->row();
    // }

      // Get unique no_batch
    public function get_unique_batch()
    {
        $this->db->select('no_batch');
        $this->db->from('tb_sample_masuk');
        $this->db->where('is_deleted', 0);
        $this->db->group_by('no_batch');
        return $this->db->get();
    }

    // Get total masuk by no_batch
    public function get_total_masuk_by_batch($no_batch)
    {
        $this->db->select('SUM(jumlah_masuk) as total_masuk');
        $this->db->from('tb_sample_masuk');
        $this->db->where('no_batch', $no_batch);
        $this->db->where('is_deleted', 0);
        $result = $this->db->get()->row_array();
        return $result['total_masuk'] ?? 0;
    }

    // Get batch detail
    public function get_batch_detail($no_batch)
    {
        $this->db->select('sm.*, mb.nama_barang, c.nama_customer');
        $this->db->from('tb_sample_masuk sm');
        $this->db->join('tb_master_barang mb', 'sm.id_barang = mb.id_barang', 'left');
        $this->db->join('tb_master_customer c', 'sm.id_customer = c.id_customer', 'left');
        $this->db->where('sm.no_batch', $no_batch);
        $this->db->where('sm.is_deleted', 0);
        $this->db->limit(1);
        return $this->db->get()->row_array();
    }

    // Get masuk by batch untuk detail
    public function get_masuk_by_batch($no_batch)
    {
        $this->db->select('sm.*, mb.nama_barang, c.nama_customer');
        $this->db->from('tb_sample_masuk sm');
        $this->db->join('tb_master_barang mb', 'sm.id_barang = mb.id_barang', 'left');
        $this->db->join('tb_master_customer c', 'sm.id_customer = c.id_customer', 'left');
        $this->db->where('sm.no_batch', $no_batch);
        $this->db->where('sm.is_deleted', 0);
        $this->db->order_by('sm.tgl_masuk_sample', 'DESC');
        return $this->db->get();
    }
}
