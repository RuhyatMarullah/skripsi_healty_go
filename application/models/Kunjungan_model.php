<?php
class Kunjungan_model extends CI_Model
{
    public function getAll($tgl_periksa)
    {
        $this->db->order_by('rekam_medis.id_rekam_medis', 'ASC');
        $this->db->select('rekam_medis.*, pasien.*, poli.*');
        $this->db->join('pasien', 'pasien.kd_pasien = rekam_medis.kd_pasien');
        $this->db->join('poli', 'poli.kd_poli = rekam_medis.kd_poli');
        return $this->db->get_where('rekam_medis', array('tgl_periksa' => $tgl_periksa, 'status <' => 4))->result_array();
    }

    public function getAllUmum($tgl_periksa)
    {
        $this->db->order_by('rekam_medis.id_rekam_medis', 'ASC');
        $this->db->select('rekam_medis.*, pasien.*, poli.*');
        $this->db->join('pasien', 'pasien.kd_pasien = rekam_medis.kd_pasien');
        $this->db->join('poli', 'poli.kd_poli = rekam_medis.kd_poli');
        return $this->db->get_where('rekam_medis', array('tgl_periksa' => $tgl_periksa, 'status <' => 4, 'rekam_medis.kd_poli' => 'makmur-pl-1'))->result_array();
    }

    public function getAllGigi($tgl_periksa)
    {
        $this->db->order_by('rekam_medis.id_rekam_medis', 'ASC');
        $this->db->select('rekam_medis.*, pasien.*, poli.*');
        $this->db->join('pasien', 'pasien.kd_pasien = rekam_medis.kd_pasien');
        $this->db->join('poli', 'poli.kd_poli = rekam_medis.kd_poli');
        return $this->db->get_where('rekam_medis', array('tgl_periksa' => $tgl_periksa, 'status <' => 4, 'rekam_medis.kd_poli' => 'makmur-pl-2'))->result_array();
    }

    public function getAllAnak($tgl_periksa)
    {
        $this->db->order_by('rekam_medis.id_rekam_medis', 'ASC');
        $this->db->select('rekam_medis.*, pasien.*, poli.*');
        $this->db->join('pasien', 'pasien.kd_pasien = rekam_medis.kd_pasien');
        $this->db->join('poli', 'poli.kd_poli = rekam_medis.kd_poli');
        return $this->db->get_where('rekam_medis', array('tgl_periksa' => $tgl_periksa, 'status <' => 4, 'rekam_medis.kd_poli' => 'makmur-pl-3'))->result_array();
    }

    public function getAllFarmasi($tgl_periksa)
    {
        $this->db->order_by('rekam_medis.id_rekam_medis', 'ASC');
        $this->db->select('rekam_medis.*, pasien.*, poli.*');
        $this->db->join('pasien', 'pasien.kd_pasien = rekam_medis.kd_pasien');
        $this->db->join('poli', 'poli.kd_poli = rekam_medis.kd_poli');
        return $this->db->get_where('rekam_medis', array('tgl_periksa' => $tgl_periksa, 'status' => 4))->result_array();
    }

    public function getAllLaboratorium($tgl_periksa)
    {
        $this->db->order_by('rekam_medis.id_rekam_medis', 'ASC');
        $this->db->select('rekam_medis.*, pasien.*, poli.*');
        $this->db->join('pasien', 'pasien.kd_pasien = rekam_medis.kd_pasien');
        $this->db->join('poli', 'poli.kd_poli = rekam_medis.kd_poli');
        return $this->db->get_where('rekam_medis', array('tgl_periksa' => $tgl_periksa, 'status_lab' => 2))->result_array();
    }

    public function getAllKasir($tgl_periksa)
    {
        $this->db->order_by('rekam_medis.id_rekam_medis', 'ASC');
        $this->db->select('rekam_medis.*, pasien.*, poli.*');
        $this->db->join('pasien', 'pasien.kd_pasien = rekam_medis.kd_pasien');
        $this->db->join('poli', 'poli.kd_poli = rekam_medis.kd_poli');
        return $this->db->get_where('rekam_medis', array('tgl_periksa' => $tgl_periksa, 'status' => 5))->result_array();
    }

    public function getKunjunganById($id)
    {
        $this->db->order_by('rekam_medis.id_rekam_medis', 'ASC');
        $this->db->join('pasien', 'pasien.kd_pasien = rekam_medis.kd_pasien');
        $this->db->join('poli', 'poli.kd_poli = rekam_medis.kd_poli');
        $this->db->select(
            '
            rekam_medis.*, 
            pasien.*,
            poli.nama_poli,
            poli.biaya
            '
        );
        return $this->db->get_where('rekam_medis', array('id_rekam_medis' => $id))->row_array();
    }

    public function detailRekamMedis($id)
    {
        $this->db->order_by('rekam_medis.id_rekam_medis', 'ASC');
        $this->db->join('pasien', 'pasien.kd_pasien = rekam_medis.kd_pasien');
        $this->db->join('poli', 'poli.kd_poli = rekam_medis.kd_poli');
        $this->db->join('dokter', 'dokter.kd_dokter = rekam_medis.kd_dokter');
        $this->db->select(
            '
            dokter.*,
            rekam_medis.*, 
            pasien.*,
            poli.nama_poli,
            poli.biaya
            '
        );
        return $this->db->get_where('rekam_medis', array('id_rekam_medis' => $id))->row_array();
    }

    public function tambahKunjungan()
    {
        $tgl_periksa = date('Y-m-d');
        $kode = date('d-M-y');
        $kode = explode('-', $kode);

        $this->db->where('tgl_periksa', $tgl_periksa);
        $data = $this->db->order_by('id_rekam_medis', "desc")
            ->limit(1)
            ->get('rekam_medis')
            ->row();
        if ($data == null) {
            $kode_rekam_medis = $kode[0] . $kode[1] . $kode[2] . '-kunj-1';
        } else {
            for ($i = 0; $i < count($data); $i++) {
                if ($i + 1 == count($data)) {
                    $kd_rekam_medis = $data->kd_rekam_medis;
                    $kd_rekam_medis = explode('-', $kd_rekam_medis);
                    $cek = end($kd_rekam_medis);
                    $cek = $cek + 1;
                    $kode_rekam_medis = $kd_rekam_medis[0] . '-kunj-' . $cek;
                }
            }
        }

        $this->db->where('kd_poli', $this->input->post('poli'));
        $this->db->where('tgl_periksa', $tgl_periksa);
        $cek_antrian = $this->db->order_by('id_rekam_medis', "desc")
            ->limit(1)
            ->get('rekam_medis')
            ->row();



        if ($cek_antrian == null) {
            $antrian = 1;
        } else {
            $antrian = $cek_antrian->antrian + 1;
        }

        // $create_date = time();
        // $id = uniqid();
        $data = array(
            'kd_rekam_medis' => $kode_rekam_medis,
            'kd_transaksi' => '',
            'kd_pasien' => $this->input->post('kd_pasien', true),
            'kd_poli' => $this->input->post('poli', true),
            'kd_dokter' => '',
            'keluhan' => '',
            'diagnosa' => '',
            'tgl_periksa' => $tgl_periksa,
            'status' => 1,
            'status_lab' => '',
            'antrian' => $antrian,
            'kd_admin' => $this->session->userdata('kode_user')
        );


        $this->db->insert('rekam_medis', $data);
    }

    public function step1()
    {
        if ($this->input->post('lab', true) == null) {
            $lab = 1;
            $status = 3;
        } else {
            $lab = $this->input->post('lab', true);
            $status = 2;
        };
        $data = array(
            'antrian' => $this->input->post('antrian', true),
            'kd_rekam_medis' => $this->input->post('kd_rekam_medis', true),
            'kd_transaksi' => $this->input->post('kd_transaksi', true),
            'kd_pasien' => $this->input->post('kd_pasien', true),
            'kd_poli' => $this->input->post('kd_poli', true),
            'kd_dokter' => $this->session->userdata('kode_user'),
            'keluhan' => $this->input->post('keluhan', true),
            'diagnosa' => $this->input->post('diagnosa', true),
            'tgl_periksa' => $this->input->post('tgl_periksa', true),
            'kd_admin' => $this->input->post('kd_admin', true),
            'status' => $status,
            'status_lab' => $lab
        );

        $this->db->where('id_rekam_medis', $this->input->post('id_rekam_medis'));
        $this->db->update('rekam_medis', $data);
    }

    public function step2()
    {
        // set status

        // $update_date = time();

        // ambil data kunjungan
        $rekam_medis = $this->getKunjunganById($this->input->post('id_rekam_medis', true));

        $data = array(
            'kd_rekam_medis' => $rekam_medis['kd_rekam_medis'],
            'kd_transaksi' => $rekam_medis['kd_transaksi'],
            'kd_pasien' => $rekam_medis['kd_pasien'],
            'kd_poli' => $rekam_medis['kd_poli'],
            'kd_dokter' => $rekam_medis['kd_dokter'],
            'keluhan' => $rekam_medis['keluhan'],
            'diagnosa' => $rekam_medis['diagnosa'],
            'tgl_periksa' => $rekam_medis['tgl_periksa'],
            'antrian' => $rekam_medis['antrian'],
            'kd_admin' => $rekam_medis['kd_admin'],
            'status' => 4,
            'status_lab' => $rekam_medis['status_lab']
        );

        $this->db->where('id_rekam_medis', $this->input->post('id_rekam_medis'));
        $this->db->update('rekam_medis', $data);
    }

    public function step4()
    {
        // set status
        $update_date = time();

        // ambil data kunjungan
        $rekam_medis = $this->getKunjunganById($this->input->post('id_rekam_medis', true));

        $data = array(
            'kd_rekam_medis' => $rekam_medis['kd_rekam_medis'],
            'kd_transaksi' => $rekam_medis['kd_transaksi'],
            'kd_pasien' => $rekam_medis['kd_pasien'],
            'kd_poli' => $rekam_medis['kd_poli'],
            'kd_dokter' => $rekam_medis['kd_dokter'],
            'keluhan' => $rekam_medis['keluhan'],
            'diagnosa' => $rekam_medis['diagnosa'],
            'tgl_periksa' => $rekam_medis['tgl_periksa'],
            'antrian' => $rekam_medis['antrian'],
            'kd_admin' => $rekam_medis['kd_admin'],
            'status' => 5,
            'status_lab' => $rekam_medis['status_lab']
        );

        $this->db->where('id_rekam_medis', $this->input->post('id_rekam_medis'));
        $this->db->update('rekam_medis', $data);
    }

    public function step5()
    {
        // set status
        $update_date = time();

        // ambil data kunjungan
        $rekam_medis = $this->getKunjunganById($this->input->post('id_rekam_medis', true));

        $data = array(
            'kd_rekam_medis' => $rekam_medis['kd_rekam_medis'],
            'kd_transaksi' => $rekam_medis['kd_transaksi'],
            'kd_pasien' => $rekam_medis['kd_pasien'],
            'kd_poli' => $rekam_medis['kd_poli'],
            'kd_dokter' => $rekam_medis['kd_dokter'],
            'keluhan' => $rekam_medis['keluhan'],
            'diagnosa' => $rekam_medis['diagnosa'],
            'tgl_periksa' => $rekam_medis['tgl_periksa'],
            'antrian' => $rekam_medis['antrian'],
            'kd_admin' => $rekam_medis['kd_admin'],
            'status' => 6,
            'status_lab' => $rekam_medis['status_lab']
        );

        $this->db->where('id_rekam_medis', $this->input->post('id_rekam_medis'));
        $this->db->update('rekam_medis', $data);
    }

    public function hapusKunjungan($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('rekam_medis', ['id_rekam_medis' => $id]);
    }

    public function getRekamMedis($kd_pasien, $kd_poli)
    {
        $this->db->order_by('rekam_medis.id_rekam_medis', 'ASC');
        $this->db->select('rekam_medis.*, pasien.*, poli.*');
        $this->db->join('pasien', 'pasien.kd_pasien = rekam_medis.kd_pasien');
        $this->db->join('poli', 'poli.kd_poli = rekam_medis.kd_poli');
        return $this->db->get_where('rekam_medis', array('rekam_medis.kd_poli' => $kd_poli, 'rekam_medis.kd_pasien' => $kd_pasien, 'rekam_medis.status >' => 4))->result_array();
    }

    public function getAllRekamMedis()
    {
        $this->db->order_by('rekam_medis.tgl_periksa', 'DESC');
        $this->db->select('rekam_medis.*, pasien.*, poli.*,dokter.*');
        $this->db->join('pasien', 'pasien.kd_pasien = rekam_medis.kd_pasien');
        $this->db->join('dokter', 'dokter.kd_dokter = rekam_medis.kd_dokter');
        $this->db->join('poli', 'poli.kd_poli = rekam_medis.kd_poli');
        return $this->db->get_where('rekam_medis', array('rekam_medis.status >' => 4))->result_array();
    }

    public function getAllRekamMedisPasien($kode_user)
    {
        $this->db->order_by('rekam_medis.id_rekam_medis', 'DESC');
        $this->db->select('rekam_medis.*, pasien.*, poli.*,dokter.*');
        $this->db->join('pasien', 'pasien.kd_pasien = rekam_medis.kd_pasien');
        $this->db->join('dokter', 'dokter.kd_dokter = rekam_medis.kd_dokter');
        $this->db->join('poli', 'poli.kd_poli = rekam_medis.kd_poli');
        return $this->db->get_where('rekam_medis', array('rekam_medis.status >' => 4, 'rekam_medis.kd_pasien =' => $kode_user))->result_array();
    }

    public function stepLab()
    {
        $data = array(
            'status_lab' => 3
        );
        $this->db->where('id_rekam_medis', $this->input->post('id_rekam_medis'));
        $this->db->update('rekam_medis', $data);
    }
}
