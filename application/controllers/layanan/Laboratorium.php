<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laboratorium extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kunjungan_model');
        $this->load->model('Laboratorium_model');
        $this->load->library('form_validation');
        if ($this->session->userdata('kode_user')) {
            //
        } else {
            redirect('login');
        }
    }
    public function index()
    {
        if (!($this->session->userdata('level') == 1 || $this->session->userdata('level') == 4)) {
            redirect('blocked');
        }

        $data['laboratorium'] = $this->Kunjungan_model->getAllLaboratorium(date('Y-m-d'));
        $data['judul'] = 'Laboratorium';
        $data['cek'] = 'lab';
        $data['pesan'] = 'Laboratorium';

        // $this->form_validation->set_rules('id_rekam_medis', 'id', 'required');
        // $this->form_validation->set_rules('lab', 'lab', 'required');


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('layanan/laboratorium/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        if (!($this->session->userdata('level') == 1 || $this->session->userdata('level') == 4)) {
            redirect('blocked');
        }

        $data['rekam_medis'] = $this->Kunjungan_model->getKunjunganById($id);
        $data['hasil_lab'] = $this->Laboratorium_model->getHasilLab($data['rekam_medis']['kd_rekam_medis']);
        $data['master_lab'] = $this->Laboratorium_model->getMasterLab();

        $data['judul'] = 'Laboratorium';
        $data['cek'] = 'lab';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('layanan/laboratorium/edit', $data);
        $this->load->view('templates/footer');
    }

    public function tambahLab(Type $var = null)
    {
        if (!($this->session->userdata('level') == 1 || $this->session->userdata('level') == 4)) {
            redirect('blocked');
        }

        $id = $this->input->post('id_rekam_medis');
        $this->form_validation->set_rules('hasil', 'Hasil', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('layanan/laboratorium/edit/' . $id);
        } else {
            $cek = $this->Laboratorium_model->tambahLab();
            if ($cek['status'] == false) {
                $this->session->set_flashdata('flash', 'gagal');
                $this->session->set_flashdata('pesan', 'Pemeriksaan Gagal ');
                redirect('layanan/laboratorium/edit/' . $id);
            } else {
                $this->session->set_flashdata('flash', 'berhasil');
                redirect('layanan/laboratorium/edit/' . $id);
            }
        }
    }

    public function getLab()
    {
        echo json_encode($this->Laboratorium_model->getLab($this->input->post('kd_master_lab')));
    }

    public function simpanLab()
    {
        $data['hasil_lab'] = $this->Laboratorium_model->getHasilLab($this->input->post('kd_rekam_medis'));

        if ($data['hasil_lab'] == null) {
            $this->session->set_flashdata('flash', 'step2_gagal');
            redirect('layanan/laboratorium/edit/' . $this->input->post('id_rekam_medis'));
        } else {
            $this->session->set_flashdata('flash', 'Berhasil');
            $this->Kunjungan_model->stepLab();
            redirect('layanan/laboratorium');
        }
    }

    public function detailLab($id)
    {
        $data['judul'] = 'Laboratorium';
        $data['rekam_medis'] = $this->Kunjungan_model->getKunjunganById($id);
        $data['hasil_lab'] = $this->Laboratorium_model->getHasilLab($data['rekam_medis']['kd_rekam_medis']);

        $this->load->view('layanan/laboratorium/detail', $data);
    }

    public function hapusLab($id, $id_rekam_medis)
    {
        $this->db->delete('laboratorium', ['id_laboratorium' => $id]);
        $this->session->set_flashdata('flash', 'hapus');
        redirect('layanan/laboratorium/edit/' . $id_rekam_medis);
    }
}
