<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Farmasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pemesanan_obat_model');
        $this->load->model('Obat_model');
        $this->load->model('Kunjungan_model');
        $this->load->library('form_validation');
        if ($this->session->userdata('kode_user')) {
            if (!($this->session->userdata('level') == 1 || $this->session->userdata('level') == 3)) {
                redirect('blocked');
            }
        } else {
            redirect('login');
        }
    }
    public function index()
    {
        $data['rekam_medis'] = $this->Kunjungan_model->getAllFarmasi(date('Y-m-d'));
        $data['judul'] = 'Farmasi';
        $data['cek'] = 'farmasi';
        $data['pesan'] = 'Pasien';

        $this->form_validation->set_rules('id_rekam_medis', 'id', 'required');
        $this->form_validation->set_rules('lab', 'lab', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar');
            $this->load->view('layanan/farmasi/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->session->set_flashdata('flash', 'Di Berikan Obat');
            $this->Kunjungan_model->step4();
            redirect('layanan/farmasi/index');
        }
    }

    public function edit($id)
    {
        $data['rekam_medis'] = $this->Kunjungan_model->getKunjunganById($id);
        $data['pemesanan'] = $this->Pemesanan_obat_model->getByKodeKunjungan($data['rekam_medis']['kd_rekam_medis']);
        $data['judul'] = 'Farmasi';
        $data['cek'] = 'farmasi';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('layanan/farmasi/edit', $data);
        $this->load->view('templates/footer');
    }
}
