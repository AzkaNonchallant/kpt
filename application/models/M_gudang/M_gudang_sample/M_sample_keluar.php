<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_sample_keluar extends CI_Model
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
    public function get($tgl = null, $tgl2 = null, $nama_barang = null, $nama_customer = null)
    {
        $this->db->select('a.*, b.nama_barang, c.nama_customer');
        $this->db->from('tb_sample_keluar a');
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

        if ($nama_customer != null) {
            $this->db->where('c.nama_customer', $nama_customer);
        }

        $this->db->order_by('a.id_sample_keluar', 'DESC');
        $q = $this->db->get();
        return $q->result_array();
    }

    // Ambil semua data (raw)
    public function get2()
    {
        return $this->db->get_where('tb_sample_keluar', ['is_deleted' => 0])->result_array();
    }

    // Ambil data lengkap dengan relasi
    public function get3($id = null)
    {

        $sql = "
    SELECT 
        a.id_sample_keluar,
        a.id_mkt_po_sample,
        a.id_customer,
        a.id_barang,
        b.nama_customer,
        c.nama_barang
    FROM tb_sample_keluar a
    LEFT JOIN tb_master_customer b ON a.id_customer = b.id_customer
    LEFT JOIN tb_master_barang c ON a.id_barang = c.id_barang
    WHERE a.is_deleted = 0
    ORDER BY a.id_sample_keluar DESC
";
        return $this->db->query($sql);
    }

    // Ambil 1 row by id
    public function get_by_id($id_sample_keluar)
    {
        $q = $this->db->get_where('tb_sample_keluar', ['id_sample_keluar' => $id_sample_keluar, 'is_deleted' => 0]);
        return $q->row_array();
    }

    public function get4()
    {
        $sql = "
        SELECT 
            a.id_barang,
            a.kode_sample_out, 
            b.nama_barang,
            b.bloom,
            b.mesh,
            d.gdg_qty_in
        FROM tb_sample_keluar a
        LEFT JOIN tb_master_barang b ON a.id_barang = b.id_barang
        LEFT JOIN tb_prc_po_pembelian c ON  a.id_barang = c.id_barang
        LEFT JOIN tb_gudang_barang_masuk d ON a.no_batch = d.no_batch
        WHERE a.is_deleted = 0
        ORDER BY a.created_at ASC
    ";

        return $this->db->query($sql);
    }

    public function get5()
    {
        $sql = "
        SELECT 
            a.id_customer, 
            b.nama_customer
        FROM tb_sample_keluar a
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
            'kode_sample_out'       => isset($data['kode_sample_out']) ? $data['kode_sample_out'] : null,
            'jumlah_masuk'     => isset($data['jumlah_masuk']) ? $data['jumlah_masuk'] : 0,
            'ket_masuk'        => isset($data['ket_masuk']) ? $data['ket_masuk'] : null,
            'gudang_admin'     => isset($data['gudang_admin']) ? $data['gudang_admin'] : null,
            'created_at'       => date('Y-m-d H:i:s'),
            'created_by'       => $this->id_user(),
            'updated_at'       => date('Y-m-d H:i:s'),
            'updated_by'       => $this->id_user(),
            'is_deleted'       => 0
        ];

        return $this->db->insert('tb_sample_keluar', $row);
    }

    // Update existing
    public function update($data)
    {
        if (empty($data['id_sample_keluar'])) {
            return false;
        }

        $row = [
            'id_mkt_po_sample' => isset($data['id_mkt_po_sample']) ? $data['id_mkt_po_sample'] : null,
            'tgl_masuk_sample' => isset($data['tgl_masuk_sample']) ? $data['tgl_masuk_sample'] : null,
            'id_customer'      => isset($data['id_customer']) ? $data['id_customer'] : null,
            'id_barang'        => isset($data['id_barang']) ? $data['id_barang'] : null,
            'kode_sample_out'       => isset($data['kode_sample_out']) ? $data['kode_sample_out'] : null,
            'jumlah_masuk'     => isset($data['jumlah_masuk']) ? $data['jumlah_masuk'] : 0,
            'ket_masuk'        => isset($data['ket_masuk']) ? $data['ket_masuk'] : null,
            'gudang_admin'     => isset($data['gudang_admin']) ? $data['gudang_admin'] : null,
            'updated_at'       => date('Y-m-d H:i:s'),
            'updated_by'       => $this->id_user(),
        ];

        $this->db->where('id_sample_keluar', $data['id_sample_keluar']);
        return $this->db->update('tb_sample_keluar', $row);
    }

    // Soft delete
    public function delete($id_sample_keluar)
    {
        $row = [
            'is_deleted' => 1,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' => $this->id_user()
        ];
        $this->db->where('id_sample_keluar', $id_sample_keluar);
        return $this->db->update('tb_sample_keluar', $row);
    }

    // Cek kode tf in (kembalikan jumlah)
    public function cek_kode_sample_out($kode_sample_out)
    {
        if (empty($kode_sample_out)) return 0;
        $this->db->where('kode_sample_out', $kode_sample_out);
        $this->db->where('is_deleted', 0);
        return $this->db->count_all_results('tb_sample_keluar');
    }

    // Hitung total sample masuk (misal per barang)
    public function jml_sample_keluar($id_barang)
    {
        $this->db->select_sum('jumlah_keluar', 'total_masuk');
        $this->db->where('id_barang', $id_barang);
        $this->db->where('is_deleted', 0);
        $q = $this->db->get('tb_sample_keluar');
        return $q->row();
    }

    public function jml_po_sample_keluar($data)
    {
        $sql = "
        SELECT SUM(k.jumlah_keluar) AS tot_sample_keluar
        FROM tb_sample_keluar k
        LEFT JOIN tb_sample_masuk m ON k.id_mkt_po_sample = m.id_mkt_po_sample
        WHERE m.id_sample_masuk = '$data[id_sample_masuk]'
        AND k.is_deleted = 0
    ";
        return $this->db->query($sql);
    }

    public function get_total_keluar_by_batch($no_batch)
    {
        $this->db->select('SUM(jumlah_keluar) as total_keluar');
        $this->db->from('tb_sample_keluar');
        $this->db->where('no_batch', $no_batch);
        $this->db->where('is_deleted', 0);
        $result = $this->db->get()->row_array();
        return $result['total_keluar'] ?? 0;
    }

    // Get keluar by batch untuk detail
    public function get_keluar_by_batch($no_batch)
    {
        $this->db->select('sk.*, mb.nama_barang, c.nama_customer');
        $this->db->from('tb_sample_keluar sk');
        $this->db->join('master_barang mb', 'sk.id_barang = mb.id_barang', 'left');
        $this->db->join('customer c', 'sk.id_customer = c.id_customer', 'left');
        $this->db->where('sk.no_batch', $no_batch);
        $this->db->where('sk.is_deleted', 0);
        $this->db->order_by('sk.tgl_keluar_sample', 'DESC');
        return $this->db->get();
    }

    public function data_barang_sample_keluar($tgl = null, $tgl2 = null, $nama_barang = null, $nama_customer = null)
    {

        if ($tgl != null && $tgl2 != null) {
            $tgl = explode("/", $tgl);
            $tgl = "$tgl[2]-$tgl[1]-$tgl[0]";
            $tgl2 = explode("/", $tgl2);
            $tgl2 = "$tgl2[2]-$tgl2[1]-$tgl2[0]";
            $where[] = "AND a.tgl_masuk_sample >= '$tgl' AND  a.tgl_masuk_sample <= '$tgl2'";
        } else if ($tgl == null && $tgl2 == null) {
            $where[] = "";
        } else {
            return array();
        }

        if ($nama_barang == null) {
            $where[] = "";
        } else {
            $where[] = "AND b.nama_barang = '$nama_barang'";
        }

        if ($nama_customer == null) {
            $where[] = "";
        } else {
            $where[] = "AND c.nama_customer = '$nama_customer'";
        }

        $where = implode(" ", $where);

        $sql = "
        SELECT 
        a.*, 
        b.nama_barang, b.satuan, b.mesh, b.bloom,
        c.nama_customer
        FROM tb_sample_keluar a
        LEFT JOIN tb_master_barang b ON a.id_barang = b.id_barang
        LEFT JOIN tb_master_customer c ON a.id_customer = c.id_customer
        WHERE 
        b.is_deleted = 0
        $where
        ORDER BY a.kode_sample_out ASC;
        ";
        return $this->db->query($sql);
    }

    public function ambil_surat_jalan2()
    {
        $sql = "
            SELECT a.*,b.nama_customer,b.alamat_customer FROM tb_sample_masuk a
            LEFT JOIN tb_master_customer b ON a.id_customer = b.id_customer
            WHERE a.is_deleted = 0 ORDER BY a.created_at DESC";
        return $this->db->query($sql);
    }
}
