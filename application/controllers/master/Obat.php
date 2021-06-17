<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Obat_model');
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
        $data['judul'] = 'Data Obat';
        $data['obat'] = $this->Obat_model->getAll();
        $data['cek'] = 'data_master';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('master/Obat/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['judul'] = 'Form Tambah obat';
        $data['cek'] = 'data_master';

        $this->form_validation->set_rules('nama_obat', 'Nama Poli', 'required');
        $this->form_validation->set_rules('harga_obat', 'Harga Obat', 'required|numeric');
        $this->form_validation->set_rules('keterangan_obat', 'Nama Poli', 'required');
        $this->form_validation->set_rules('jml_obat', 'Jumlah Obat', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar');
            $this->load->view('master/obat/add');
            $this->load->view('templates/footer');
        } else {
            $this->Obat_model->tambahObat();
            $this->session->set_flashdata('flash', 'Di tambahkan');
            redirect('master/obat');
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Form Ubah Poli';
        $data['cek'] = 'data_master';

        $data['obat'] = $this->Obat_model->getObatById($id);

        $this->form_validation->set_rules('nama_obat', 'Nama Poli', 'required');
        $this->form_validation->set_rules('harga_obat', 'Harga Obat', 'required|numeric');
        $this->form_validation->set_rules('keterangan_obat', 'Nama Poli', 'required');
        $this->form_validation->set_rules('jml_obat', 'Jumlah Obat', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar');
            $this->load->view('master/obat/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Obat_model->ubahObat();
            $this->session->set_flashdata('flash', 'Di ubah');
            redirect('master/obat');
        }
    }

    public function hapus($id)
    {
        $this->Obat_model->hapusObat($id);
        $this->session->set_flashdata('flash', 'Di hapus');
        redirect('master/obat');
    }
}
