<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
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
        $data['judul'] = 'Dashboard';
        $data['cek'] = 'dashboard';
        $this->load->view('dashboard/index', $data);
    }
    public function bulanan()
    {
        $tanggal = $this->input->get('tanggal');


        $this->db->like('tgl_periksa', $tanggal);
        $umum =  $this->db->get_where('rekam_medis', [
            'kd_poli' => 'makmur-pl-1',
            'status >=' => 3
        ])->num_rows();

        $this->db->like('tgl_periksa', $tanggal);
        $gigi =  $this->db->get_where('rekam_medis', [
            'kd_poli' => 'makmur-pl-2',
            'status >=' => 3
        ])->num_rows();

        $this->db->like('tgl_periksa', $tanggal);
        $anak = $this->db->get_where('rekam_medis', [
            'kd_poli' => 'makmur-pl-3',
            'status >=' => 3
        ])->num_rows();

        $data = [];
        $data = [$umum, $gigi, $anak];
        echo json_encode($data);
    }

    public function tahunan()
    {
        $tanggal = $this->input->get('tanggal');

        // januari
        $jan = $tanggal . '-01';
        $this->db->like('tgl_periksa', $jan);
        $januari =  $this->db->get_where('rekam_medis', [
            'status >=' => 3
        ])->num_rows();

        // februari
        $feb = $tanggal . '-02';
        $this->db->like('tgl_periksa', $feb);
        $februari =  $this->db->get_where('rekam_medis', [
            'status >=' => 3
        ])->num_rows();

        // maret
        $mar = $tanggal . '-03';
        $this->db->like('tgl_periksa', $mar);
        $maret =  $this->db->get_where('rekam_medis', [
            'status >=' => 3
        ])->num_rows();

        // april
        $apr = $tanggal . '-04';
        $this->db->like('tgl_periksa', $apr);
        $april =  $this->db->get_where('rekam_medis', [
            'status >=' => 3
        ])->num_rows();

        // mei
        $mei = $tanggal . '-05';
        $this->db->like('tgl_periksa', $mei);
        $meii =  $this->db->get_where('rekam_medis', [
            'status >=' => 3
        ])->num_rows();

        // juni
        $jun = $tanggal . '-06';
        $this->db->like('tgl_periksa', $jun);
        $juni =  $this->db->get_where('rekam_medis', [
            'status >=' => 3
        ])->num_rows();

        // juli
        $jul = $tanggal . '-07';
        $this->db->like('tgl_periksa', $jul);
        $juli =  $this->db->get_where('rekam_medis', [
            'status >=' => 3
        ])->num_rows();

        // agustus
        $aug = $tanggal . '-08';
        $this->db->like('tgl_periksa', $aug);
        $agustus =  $this->db->get_where('rekam_medis', [
            'status >=' => 3
        ])->num_rows();

        // september
        $sep = $tanggal . '-09';
        $this->db->like('tgl_periksa', $sep);
        $september =  $this->db->get_where('rekam_medis', [
            'status >=' => 3
        ])->num_rows();

        // oktober
        $okt = $tanggal . '-10';
        $this->db->like('tgl_periksa', $okt);
        $oktober =  $this->db->get_where('rekam_medis', [
            'status >=' => 3
        ])->num_rows();

        // november
        $nov = $tanggal . '-11';
        $this->db->like('tgl_periksa', $nov);
        $november =  $this->db->get_where('rekam_medis', [
            'status >=' => 3
        ])->num_rows();

        // desember
        $dev = $tanggal . '-12';
        $this->db->like('tgl_periksa', $dev);
        $desember =  $this->db->get_where('rekam_medis', [
            'status >=' => 3
        ])->num_rows();

        $data = [];
        $data = [
            'januari' => $januari,
            'februari' => $februari,
            'maret' => $maret,
            'april' => $april,
            'mei' => $meii,
            'juni' => $juni,
            'juli' => $juli,
            'agustus' => $agustus,
            'september' => $september,
            'oktober' => $oktober,
            'november' => $november,
            'desember' => $desember,
        ];
        echo json_encode($data);
    }

    public function harian()
    {
        $cek = $this->input->get('cek');
        $tanggal = date('Y-m-d');
        if ($cek == 'poli-umum') {
            $poli_umum =  $this->db->get_where('rekam_medis', [
                'kd_poli =' => 'makmur-pl-1',
                'status >=' => 1,
                'tgl_periksa =' => $tanggal
            ])->num_rows();

            echo json_encode($poli_umum);
        } elseif ($cek == 'poli-gigi') {
            $poli_gigi =  $this->db->get_where('rekam_medis', [
                'kd_poli =' => 'makmur-pl-2',
                'status >=' => 1,
                'tgl_periksa =' => $tanggal
            ])->num_rows();

            echo json_encode($poli_gigi);
        } elseif ($cek == 'poli-anak') {
            $poli_anak =  $this->db->get_where('rekam_medis', [
                'kd_poli =' => 'makmur-pl-3',
                'status >=' => 1,
                'tgl_periksa =' => $tanggal
            ])->num_rows();

            echo json_encode($poli_anak);
        } elseif ($cek == 'lab') {
            $lab =  $this->db->get_where('rekam_medis', [
                'status_lab =' => 3,
                'tgl_periksa =' => $tanggal
            ])->num_rows();

            echo json_encode($lab);
        }
    }

    public function backUpData()
    {
        // Load the DB utility class
        $this->load->dbutil();

        // Backup your entire database and assign it to a variable
        $backup = $this->dbutil->backup();

        // nama file backup
        $namafile = "dbbackup" . "-" . date("Y-m-d_H-i-s") . ".sql.gz";

        // Load the file helper and write the file to your server
        $this->load->helper('file');

        write_file(FCPATH . '/db_backup/' . $namafile, $backup);

        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download($namafile, $backup);

        return base_url('dashboard');
    }
}
