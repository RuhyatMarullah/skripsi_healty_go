<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Karyawan_model');
        $this->load->library('form_validation');
        if ($this->session->userdata('kode_user')) {
            if ($this->session->userdata('status') != 'admin') {
                redirect('blocked');
            }
        } else {
            redirect('login');
        }
    }
    public function index()
    {
        $data['karyawan'] = $this->Karyawan_model->getAll();
        $data['judul'] = 'Data Karyawan';
        $data['cek'] = 'data_master';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('master/karyawan/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['judul'] = 'Form Tambah Karyawan';
        $data['cek'] = 'data_master';
        $data['jabatan'] = $this->Karyawan_model->getJabatan();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('no_identitas', 'No identitas', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar');
            $this->load->view('master/karyawan/add', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Karyawan_model->tambahKaryawan();
            $this->session->set_flashdata('flash', 'Di tambahkan');
            redirect('master/karyawan');
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Form Ubah Karyawan';
        $data['jabatan'] = $this->Karyawan_model->getJabatan();
        $data['karyawan'] = $this->Karyawan_model->getKaryawanById($id);
        $data['cek'] = 'data_master';

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('no_identitas', 'No identitas', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar');
            $this->load->view('master/karyawan/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Karyawan_model->ubahKaryawan();
            $this->session->set_flashdata('flash', 'Di ubah');
            redirect('master/karyawan');
        }
    }

    public function hapus($id)
    {
        $this->Karyawan_model->hapusKaryawan($id);
        $this->session->set_flashdata('flash', 'Di hapus');
        redirect('master/karyawan');
    }

    public function detail($id)
    {
        $data['judul'] = 'Data Dokter';
        $data['cek'] = 'data_master';
        $data['karyawan'] = $this->Karyawan_model->getKaryawanById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('master/karyawan/detail', $data);
        $this->load->view('templates/footer');
    }
}
