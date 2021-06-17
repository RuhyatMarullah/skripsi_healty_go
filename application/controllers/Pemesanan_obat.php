<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan_obat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Pemesanan_obat_model');
        if ($this->session->userdata('kode_user')) {
            if (!($this->session->userdata('level') == 1 || $this->session->userdata('status') == 'dokter')) {
                redirect('blocked');
            }
        } else {
            redirect('login');
        }
    }

    /* poli umum */
    public function tambahUmum()
    {
        $id = $this->input->post('id_rekam_medis');
        $this->form_validation->set_rules('kd_obat', 'Nama Obat', 'required');
        $this->form_validation->set_rules('penggunaan', 'Penggunaan', 'required');
        $this->form_validation->set_rules('status', '', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('poli/umum/step2/' . $id);
        } else {
            $cek = $this->Pemesanan_obat_model->tambahPemesanan();
            if ($cek['status'] == false) {
                $this->session->set_flashdata('flash', 'gagal');
                $this->session->set_flashdata('pesan', 'Pemesanan Gagal Sisa Stock Obat ' . $cek['jml_obat']);
                redirect('poli/umum/step2/' . $id);
            } else {
                $this->session->set_flashdata('flash', 'berhasil');
                redirect('poli/umum/step2/' . $id);
            }
        }
    }
    public function hapusUmum($id, $id_rekam_medis)
    {
        $this->Pemesanan_obat_model->hapusPemesanan($id);
        $this->session->set_flashdata('flash', 'hapus');
        redirect('poli/umum/step2/' . $id_rekam_medis);
    }

    /* poli gigi */
    public function tambahGigi()
    {
        $id = $this->input->post('id_rekam_medis');
        $this->form_validation->set_rules('kd_obat', 'Nama Obat', 'required');
        $this->form_validation->set_rules('penggunaan', 'Penggunaan', 'required');
        $this->form_validation->set_rules('status', '', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('poli/gigi/step2/' . $id);
        } else {
            $cek = $this->Pemesanan_obat_model->tambahPemesanan();
            if ($cek['status'] == false) {
                $this->session->set_flashdata('flash', 'gagal');
                $this->session->set_flashdata('pesan', 'Pemesanan Gagal Sisa Stock Obat ' . $cek['jml_obat']);
                redirect('poli/gigi/step2/' . $id);
            } else {
                $this->session->set_flashdata('flash', 'berhasil');
                redirect('poli/gigi/step2/' . $id);
            }
        }
    }
    public function hapusGigi($id, $id_rekam_medis)
    {
        $this->Pemesanan_obat_model->hapusPemesanan($id);
        $this->session->set_flashdata('flash', 'hapus');
        redirect('poli/gigi/step2/' . $id_rekam_medis);
    }

    /* poli anak */
    public function tambahAnak()
    {
        $id = $this->input->post('id_rekam_medis');
        $this->form_validation->set_rules('kd_obat', 'Nama Obat', 'required');
        $this->form_validation->set_rules('penggunaan', 'Penggunaan', 'required');
        $this->form_validation->set_rules('status', '', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('poli/anak/step2/' . $id);
        } else {
            $cek = $this->Pemesanan_obat_model->tambahPemesanan();
            if ($cek['status'] == false) {
                $this->session->set_flashdata('flash', 'gagal');
                $this->session->set_flashdata('pesan', 'Pemesanan Gagal Sisa Stock Obat ' . $cek['jml_obat']);
                redirect('poli/anak/step2/' . $id);
            } else {
                $this->session->set_flashdata('flash', 'berhasil');
                redirect('poli/anak/step2/' . $id);
            }
        }
    }
    public function hapusAnak($id, $id_rekam_medis)
    {
        $this->Pemesanan_obat_model->hapusPemesanan($id);
        $this->session->set_flashdata('flash', 'hapus');
        redirect('poli/anak/step2/' . $id_rekam_medis);
    }
}
