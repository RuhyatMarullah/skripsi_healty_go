<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Poli_model');
        $this->load->model('Doctor_model');
        $this->load->model('Pasien_model');
        $this->load->model('Kunjungan_model');
        $this->load->library('form_validation');
        if ($this->session->userdata('kode_user')) {
            if (!($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2)) {
                redirect('blocked');
            }
        } else {
            redirect('login');
        }
    }
    public function index()
    {
        $data['kunjungan'] = $this->Kunjungan_model->getAll(date('Y-m-d'));
        $data['pasien'] = $this->Pasien_model->getAll();
        $data['poli'] = $this->Poli_model->getAll();
        $data['judul'] = 'Pendaftaran';
        $data['cek'] = 'pendaftaran';
        $data['pesan'] = 'Pasien';

        $this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'required');
        $this->form_validation->set_rules('poli', 'poli', 'required');
        $this->form_validation->set_rules('kd_pasien', 'Kode Pasien', 'required');



        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar');
            $this->load->view('layanan/pendaftaran/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Kunjungan_model->tambahKunjungan();
            $this->session->set_flashdata('flash', 'Di daftarkan');
            redirect('layanan/pendaftaran');
        }
    }

    public function getPasien()
    {
        echo json_encode($this->Pasien_model->getByKodePasien($this->input->post('kode_pasien')));
    }


    public function hapus($id)
    {
        $this->Kunjungan_model->hapuskunjungan($id);
        $this->session->set_flashdata('flash', 'Di hapus');
        redirect('layanan/pendaftaran');
    }
}
