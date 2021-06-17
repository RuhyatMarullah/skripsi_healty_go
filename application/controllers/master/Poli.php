<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Poli extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Poli_model');
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
        $data['judul'] = 'Data Poli';
        $data['poli'] = $this->Poli_model->getAll();
        $data['cek'] = 'data_master';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('master/Poli/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['judul'] = 'Form Tambah poli';
        $data['cek'] = 'data_master';

        $this->form_validation->set_rules('nama_poli', 'Nama Poli', 'required');
        $this->form_validation->set_rules('biaya_poli', 'Biaya Poli', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar');
            $this->load->view('master/poli/add');
            $this->load->view('templates/footer');
        } else {
            $this->Poli_model->tambahPoli();
            $this->session->set_flashdata('flash', 'Di tambahkan');
            redirect('master/poli');
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Form Ubah Poli';
        $data['cek'] = 'data_master';

        $data['poli'] = $this->Poli_model->getPoliById($id);

        $this->form_validation->set_rules('nama_poli', 'Nama Poli', 'required');
        $this->form_validation->set_rules('biaya_poli', 'Biaya Poli', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar');
            $this->load->view('master/poli/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Poli_model->ubahPoli();
            $this->session->set_flashdata('flash', 'Di ubah');
            redirect('master/poli');
        }
    }

    public function hapus($id)
    {
        $this->Poli_model->hapusPoli($id);
        $this->session->set_flashdata('flash', 'Di hapus');
        redirect('master/poli');
    }
}
