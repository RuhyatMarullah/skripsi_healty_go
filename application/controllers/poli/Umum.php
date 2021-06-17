<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Umum extends CI_Controller
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
        $data['rekam_medis'] = $this->Kunjungan_model->getAllUmum(date('Y-m-d'));
        $data['judul'] = 'Poli Umum';
        $data['cek'] = 'poli_umum';
        $data['pesan'] = 'Pasien';


        $this->form_validation->set_rules('id_rekam_medis', 'id', 'required');
        $this->form_validation->set_rules('lab', 'lab', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar');
            $this->load->view('poli/umum/index', $data);
            $this->load->view('templates/footer');
        } else {
            $cek_resep = $this->Pemesanan_obat_model->getByKodeKunjungan($this->input->post('kd_rekam_medis'));
            if ($cek_resep != null) {
                $this->session->set_flashdata('flash', 'Di Periksa');
                $this->Kunjungan_model->step2();
                redirect('poli/umum/index');
            } else {
                $this->session->set_flashdata('flash', 'step2_gagal');
                redirect('poli/umum/step2/' . $this->input->post('id_rekam_medis'));
            }
        }
    }

    public function step1($id)
    {
        $data['rekam_medis'] = $this->Kunjungan_model->getKunjunganById($id);
        $data['judul'] = 'Form Rekam Medis';
        $data['cek'] = 'poli_umum';

        if ($data['rekam_medis']['status'] == 3) {
            redirect('poli/umum/step2/' . $data['rekam_medis']['id_rekam_medis']);
        }
        if ($this->input->post('lab') != 2) {
            $this->form_validation->set_rules('keluhan', 'Keluhan', 'required');
            $this->form_validation->set_rules('diagnosa', 'diagnosa', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar');
                if ($data['rekam_medis']['status_lab'] == 2 || $data['rekam_medis']['status_lab'] == 3) {
                    $this->load->view('poli/umum/step1-edit', $data);
                } else {
                    $this->load->view('poli/umum/step1', $data);
                }
                $this->load->view('templates/footer');
            } else {
                $this->Kunjungan_model->step1();
                redirect('poli/umum/step2/' . $data['rekam_medis']['id_rekam_medis']);
            }
        } else {
            $this->session->set_flashdata('flash', 'Menunggu Hasil Lab');
            $this->Kunjungan_model->step1();
            redirect('poli/umum/');
        }
    }

    public function step2($id)
    {
        $data['rekam_medis'] = $this->Kunjungan_model->getKunjunganById($id);
        $data['obat'] = $this->Obat_model->getAllStep2();
        $data['pemesanan'] = $this->Pemesanan_obat_model->getByKodeKunjungan($data['rekam_medis']['kd_rekam_medis']);
        $data['judul'] = 'Form Rekam Medis';
        $data['cek'] = 'poli_umum';
        $data['pesan'] = 'Obat';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('poli/umum/step2', $data);
        $this->load->view('templates/footer');
    }
}
