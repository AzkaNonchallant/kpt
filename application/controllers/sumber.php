<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sumber extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model('M_sumber');
    }

    public function index()
    {
        $data['result'] = $this->M_sumber->get()->result_array();
        // echo json_encode($data['result']);
        $this->template->load('template', 'content/sumber/sumber_data',$data);

    }

    public function add()
    {
        $data = [
            'nama_provinsi' => $this->input->post('provinsi_nama', TRUE),
            'id_provinsi' => $this->input->post('provinsi', TRUE),
            'id_kota' => $this->input->post('kota', TRUE),
            'nama_kota' => $this->input->post('kota_nama', TRUE),
        ];

        $respon = $this->M_sumber->add($data);

        if ($respon) {
            header('location:' . base_url('sumber') . '?alert=success&msg=Selamat anda berhasil menambah Sumber');
        } else {
            header('location:' . base_url('sumber') . '?alert=error&msg=Maaf anda gagal menambah Sumber');
        }
    }

    public function update()
    {
        $data = [
            'nama_provinsi' => $this->input->post('provinsi_nama', TRUE),
            'id_provinsi' => $this->input->post('provinsi', TRUE),
            'id_kota' => $this->input->post('kota', TRUE),
            'nama_kota' => $this->input->post('kota_nama', TRUE),
        ];
        $id = $this->input->post('id_sumber', TRUE);
        $respon = $this->M_sumber->update($data, $id);
        if ($respon) {
            header('location:' . base_url('sumber') . '?alert=success&msg=Selamat anda berhasil mengubah Sumber');
        } else {
            header('location:' . base_url('sumber') . '?alert=error&msg=Maaf anda gagal mengubah Sumber');
        }
    }

    public function delete($id)
    {
        // $this->M_sumber->del($id);
        $this->db->set('is_deleted', 1);
        $this->db->where('id_sumber', $id);
        $respon = $this->db->update('tb_sumber');

        if ($respon) {
            header('location:' . base_url('sumber') . '?alert=success&msg=Selamat anda berhasil menghapus Sumber');
        } else {
            header('location:' . base_url('sumber') . '?alert=error&msg=Maaf anda gagal menghapus Sumber');
        }
    }

}