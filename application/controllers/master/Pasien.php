<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pasien_model');
        $this->load->model('Kunjungan_model');
        $this->load->library('form_validation');
        if ($this->session->userdata('kode_user')) {
            // 
        } else {
            redirect('login');
        }
    }
    public function index()
    {
        if (!($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2)) {
            redirect('blocked');
        }
        $data['pasien'] = $this->Pasien_model->getAll();
        $data['judul'] = 'Data Pasien';
        $data['cek'] = 'data_master';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('master/pasien/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        if (!($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2)) {
            redirect('blocked');
        }
        $data['judul'] = 'Form Tambah Pasien';
        $data['cek'] = 'data_master';

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_identitas', 'NO Identitas', 'required|numeric');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar');
            $this->load->view('master/pasien/add', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Pasien_model->tambahPasien();
            $this->session->set_flashdata('flash', 'Di tambahkan');
            redirect('master/Pasien');
        }
    }

    public function edit($id)
    {
        if (!($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2)) {
            redirect('blocked');
        }
        $data['judul'] = 'Form Ubah Pasien';
        $data['cek'] = 'data_master';
        $data['pasien'] = $this->Pasien_model->getPasienById($id);

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_identitas', 'NO Identitas', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar');
            $this->load->view('master/Pasien/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Pasien_model->ubahPasien();
            $this->session->set_flashdata('flash', 'Di ubah');
            redirect('master/Pasien');
        }
    }

    public function getUbah()
    {
        echo json_encode($this->Pasiend_model->getDokterById($_POST['id']));
    }

    public function detail($id)
    {
        if (!($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2)) {
            redirect('blocked');
        }

        $data['judul'] = 'Data Pasien';
        $data['cek'] = 'data_master';
        $data['pasien'] = $this->Pasien_model->getPasienById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('master/pasien/detail', $data);
        $this->load->view('templates/footer');
    }

    public function getRekamMedis()
    {
        $kd_pasien = $this->input->get('kd_pasien');
        $kd_poli = $this->input->get('kd_poli');
        $rekam_medis = $this->Kunjungan_model->getRekamMedis($kd_pasien, $kd_poli);

        $data = [];
        foreach ($rekam_medis as $rm) {
            $row = [];
            $row[] = $rm['kd_rekam_medis'];
            $row[] = $rm['kd_pasien'];
            $row[] = $rm['nama_pasien'];
            $row[] = $rm['nama_poli'];
            $row[] = $rm['tgl_periksa'];
            if ($rm['status_lab'] == 3) {
                $row[] = '<a href="' . base_url("layanan/laboratorium/detailLab/" . $rm['id_rekam_medis']) . '" class="btn-sm btn-info btn-icon-split" target="_blank">
                            <span class="icon text-white-50">
                                <i class="fas fa-info-circle"></i>
                            </span>
                            <span class="text">View</span>
                        </a>';
            } else {
                $row[] = 'Tidak ada';
            }
            $row[] = '<a href="' . base_url("/rekammedis/detailrekammedis/" . $rm['id_rekam_medis']) . '" class="btn-sm btn-info btn-icon-split" target="_blank">
                        <span class="icon text-white-50">
                            <i class="fas fa-info-circle"></i>
                        </span>
                        <span class="text">View</span>
                    </a>
                    ';

            $data[] = $row;
        };

        $output = [
            'data' => $data
        ];

        echo json_encode($output);
    }
}
