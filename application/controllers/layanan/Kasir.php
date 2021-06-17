<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pemesanan_obat_model');
        $this->load->model('Obat_model');
        $this->load->model('Kunjungan_model');
        $this->load->library('form_validation');
        if ($this->session->userdata('kode_user')) {
            if (!($this->session->userdata('level') == 1 || $this->session->userdata('level') == 5)) {
                redirect('blocked');
            }
        } else {
            redirect('login');
        }
    }

    public function index()
    {
        $data['rekam_medis'] = $this->Kunjungan_model->getAllKasir(date('Y-m-d'));
        $data['judul'] = 'Kasir';
        $data['cek'] = 'kasir';
        $data['pesan'] = 'Transaksi';

        $this->form_validation->set_rules('id_rekam_medis', 'id', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar');
            $this->load->view('layanan/kasir/index', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->input->post('kembalian') < 0 || $this->input->post('kembalian') == '') {
                $this->session->set_flashdata('pembayaran', 'Periksa Kembali Pembayaran');
                redirect('layanan/kasir/edit/' . $this->input->post('id_rekam_medis'));
            }
            $this->Kunjungan_model->step5();
            $this->_print($this->input->post('id_rekam_medis'));
        }
    }

    public function edit($id)
    {
        $data['rekam_medis'] = $this->Kunjungan_model->getKunjunganById($id);
        $data['pemesanan'] = $this->Pemesanan_obat_model->getByKodeKunjungan($data['rekam_medis']['kd_rekam_medis']);

        $data['judul'] = 'Kasir';
        $data['cek'] = 'kasir';

        $i = 0;
        $data['total_biaya_obat'] = 0;
        foreach ($data['pemesanan'] as $cek) {
            $data['pemesanan'][$i]['biaya_obat'] = $cek['harga_obat'] * $cek['banyak_obat'];
            $data['total_biaya_obat'] += $data['pemesanan'][$i]['biaya_obat'];
            $i++;
        }

        if ($data['rekam_medis']['status_lab'] == 3) {
            $data['biaya_lab'] = 50000;
        } else {
            $data['biaya_lab'] = 0;
        }

        $data['total_harga'] = $data['biaya_lab'] + $data['total_biaya_obat'] + $data['rekam_medis']['biaya'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('layanan/kasir/edit', $data);
        $this->load->view('templates/footer');
    }

    private function _print($id)
    {
        $data['rekam_medis'] = $this->Kunjungan_model->getKunjunganById($id);
        $data['pemesanan'] = $this->Pemesanan_obat_model->getByKodeKunjungan($data['rekam_medis']['kd_rekam_medis']);

        $data['rekam_medis'] = $this->Kunjungan_model->getKunjunganById($id);
        $data['pemesanan'] = $this->Pemesanan_obat_model->getByKodeKunjungan($data['rekam_medis']['kd_rekam_medis']);

        $data['judul'] = 'Kasir';
        $data['cek'] = 'kasir';

        $i = 0;
        $data['total_biaya_obat'] = 0;
        foreach ($data['pemesanan'] as $cek) {
            $data['pemesanan'][$i]['biaya_obat'] = $cek['harga_obat'] * $cek['banyak_obat'];
            $data['total_biaya_obat'] += $data['pemesanan'][$i]['biaya_obat'];
            $i++;
        }

        if ($data['rekam_medis']['status_lab'] == 3) {
            $data['biaya_lab'] = 50000;
        } else {
            $data['biaya_lab'] = 0;
        }

        $data['total_harga'] = $data['biaya_lab'] + $data['total_biaya_obat'] + $data['rekam_medis']['biaya'];
        $this->load->view('layanan/kasir/print', $data);
    }

    public function selesai()
    {
        $this->session->set_flashdata('flash', 'Berhasil');
        redirect('layanan/kasir/index');
    }
}
