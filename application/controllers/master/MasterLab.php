<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MasterLab extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Master_Lab_model');
        $this->load->library('form_validation');
        if ($this->session->userdata('kode_user')) {
            if (!($this->session->userdata('level') == 1)) {
                redirect('blocked');
            }
        } else {
            redirect('login');
        }
    }

    public function index()
    {
        $data['master_lab'] = $this->Master_Lab_model->getAll();
        $data['judul'] = 'Data Master Lab';
        $data['cek'] = 'data_master';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('master/master_lab/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['judul'] = 'Form Tambah Master Lab';
        $data['cek'] = 'data_master';

        $this->form_validation->set_rules('pemeriksaan', 'Pemeriksaan', 'required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');
        $this->form_validation->set_rules('nilai_rujukan_pria', 'Nilai Rujukan Pria', 'required');
        $this->form_validation->set_rules('nilai_rujukan_wanita', 'Nilai Rujukan Wanita', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar');
            $this->load->view('master/master_lab/add', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Master_Lab_model->tambahMasterLab();
            $this->session->set_flashdata('flash', 'Di tambahkan');
            redirect('master/masterlab');
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Form Ubah Master Lab';
        $data['cek'] = 'data_master';
        $data['master_lab'] = $this->Master_Lab_model->getMasterLabById($id);

        $this->form_validation->set_rules('pemeriksaan', 'Pemeriksaan', 'required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');
        $this->form_validation->set_rules('nilai_rujukan_pria', 'Nilai Rujukan Pria', 'required');
        $this->form_validation->set_rules('nilai_rujukan_wanita', 'Nilai Rujukan Wanita', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar');
            $this->load->view('master/master_lab/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Master_Lab_model->ubahMasterLab();
            $this->session->set_flashdata('flash', 'Di ubah');
            redirect('master/masterlab');
        }
    }
}
