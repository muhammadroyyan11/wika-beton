<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Base_model', 'base');
    }

    public function index()
    {
        $data = [
            'title' => 'Tentang Kami',
            'tentang'    => $this->db->get('about_us')->result_array()
        ];
        // var_dump($data);
        $this->template->load('template', 'tentang/data', $data);
    }

    public function add()
    {
        $post = $this->input->post(null, true);

        $params = [
            'about'      => $post['tentang'],
            'maps'          => $post['maps']
        ];

        $this->base->add('about_us', $params);

        if ($this->db->affected_rows() > 0) {
            set_pesan('Data berhasil disimpan');
        } else {
            set_pesan('Terjadi Kesalahan, Harap Coba Kembali', FALSE);
        }

        redirect('tentang');
    }

    public function edit($id)
    {
        $post = $this->input->post(null, true);

        $params = [
            'about'         => $post['tentang'],
            'maps'          => $post['maps']
        ];

        $this->base->edit('about_us', $params, ['id' => $id]);

        if ($this->db->affected_rows() > 0) {
            set_pesan('Data berhasil disimpan');
        } else {
            set_pesan('Terjadi Kesalahan, Harap Coba Kembali', FALSE);
        }

        redirect('tentang');
    }

    public function delete($id)
    {
        $this->base->del('about_us', ['id' => $id]);

        if ($this->db->affected_rows() > 0) {
            set_pesan('Data berhasil dihapus');
        } else {
            set_pesan('Terjadi Kesalahan, Harap Coba Kembali', FALSE);
        }

        redirect('tentang');
    }
}
