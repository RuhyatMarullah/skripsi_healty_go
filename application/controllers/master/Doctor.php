<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Doctor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Doctor_model');
        $this->load->library('form_validation');
        if ($this->session->userdata('kode_user')) {
            if ($this->session->userdata('level') != 1) {
                redirect('blocked');
            }
        } else {
            redirect('login');
        }
    }
    public function index()
    {
        $data['doctor'] = $this->Doctor_model->getAll();
        $data['judul'] = 'Data Dokter';
        $data['cek'] = 'data_master';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('master/doctor/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['judul'] = 'Form Tambah Doctor';
        $data['poli'] = $this->Doctor_model->getPoli();
        $data['cek'] = 'data_master';

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('poli', 'poli', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('no_identitas', 'No Identitas', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar');
            $this->load->view('master/doctor/add', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Doctor_model->tambahDokter();
            $this->session->set_flashdata('flash', 'Di tambahkan');
            redirect('master/doctor');
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Form Ubah Doctor';
        $data['poli'] = $this->Doctor_model->getPoli();
        $data['dokter'] = $this->Doctor_model->getDokterById($id);
        $data['cek'] = 'data_master';

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('poli', 'poli', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar');
            $this->load->view('master/doctor/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Doctor_model->ubahDokter();
            $this->session->set_flashdata('flash', 'Di ubah');
            redirect('master/doctor');
        }
    }

    public function getUbah()
    {
        echo json_encode($this->Doctor_model->getDokterById($_POST['id']));
    }

    public function hapus($id)
    {
        $this->Doctor_model->hapusDokter($id);
        $this->session->set_flashdata('flash', 'Di hapus');
        redirect('master/doctor');
    }

    public function detail($id)
    {
        $data['judul'] = 'Data Dokter';
        $data['cek'] = 'data_master';
        $data['doctor'] = $this->Doctor_model->getDokterById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('master/doctor/detail', $data);
        $this->load->view('templates/footer');
    }
}
