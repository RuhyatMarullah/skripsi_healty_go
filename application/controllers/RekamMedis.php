<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RekamMedis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kunjungan_model');
        $this->load->model('Pemesanan_obat_model');
        if ($this->session->userdata('kode_user')) {
            //
        } else {
            redirect('login');
        }
    }
    public function index()
    {

        if (!($this->session->userdata('level') == 1 || $this->session->userdata('status') == 'pasien')) {
            redirect('blocked');
        }
        $data['judul'] = 'Rekam Medis';
        // $data['poli'] = $this->Poli_model->getAll();
        $data['cek'] = 'rekam_medis';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('rekam-medis/index', $data);
        $this->load->view('templates/footer');
    }

    public function detailRekamMedis($id_rekam_medis)
    {
        $data['judul'] = 'Rekam Medis';
        $data['rekam_medis'] = $this->Kunjungan_model->detailRekamMedis($id_rekam_medis);
        $data['pemesanan_obat'] = $this->Pemesanan_obat_model->getByKodeKunjungan($data['rekam_medis']['kd_rekam_medis']);

        $this->load->view('rekam-medis/detail', $data);
    }

    public function getRekammedis(Type $var = null)
    {
        if ($this->session->userdata('status') ==  'pasien') {
            $rekam_medis = $this->Kunjungan_model->getAllRekamMedisPasien($this->session->userdata('kode_user'));
        } else {
            $rekam_medis = $this->Kunjungan_model->getAllRekamMedis();
        }

        $data = [];
        foreach ($rekam_medis as $rm) {
            $row = [];
            $row[] = $rm['kd_rekam_medis'];
            $row[] = $rm['nama_pasien'];
            $row[] = $rm['nama_dokter'];
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
