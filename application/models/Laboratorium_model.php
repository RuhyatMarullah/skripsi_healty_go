<?php
class Laboratorium_model extends CI_Model
{
    public function getHasilLab($id)
    {
        return  $this->db->get_where('laboratorium', array('kd_rekam_medis' => $id))->result_array();
    }

    public function getMasterLab()
    {
        return  $this->db->get('master_lab')->result_array();
    }

    public function getLab($kd_master_lab)
    {
        return  $this->db->get_where('master_lab', array('kd_master_lab' => $kd_master_lab))->row_array();
    }

    public function tambahLab()
    {
        /* cek obat sudah ada apa belum di table resep */
        $laboratorium = $this->db->get_where(
            'laboratorium',
            [
                'pemeriksaan' => $this->input->post('pemeriksaan', true),
                'kd_rekam_medis' => $this->input->post('kd_rekam_medis', true)
            ]
        )->row_array();

        $nilai_rujukan = explode('-', $this->input->post('nilai_rujukan', true));

        if ($this->input->post('hasil', true) < $nilai_rujukan[0]) {
            $keterangan = 'Rendah';
        } elseif ($this->input->post('hasil', true) > $nilai_rujukan[1]) {
            $keterangan = 'Tinggi';
        } else {
            $keterangan = 'Normal';
        }


        if ($laboratorium != null) {
            /* update laboratorium */

            $data = array(
                'hasil' => $this->input->post('hasil', true),
                'keterangan' => $keterangan
            );

            $this->db->where('id_laboratorium', $laboratorium['id_laboratorium']);
            $this->db->update('laboratorium', $data);
        } else {
            /* insert table laboratorium */

            $data = array(
                'kd_rekam_medis' => $this->input->post('kd_rekam_medis', true,),
                'pemeriksaan' => $this->input->post('pemeriksaan', true),
                'keterangan' => $keterangan,
                'hasil' => $this->input->post('hasil', true),
                'nilai_rujukan' => $this->input->post('nilai_rujukan', true),
                'satuan' => $this->input->post('satuan', true),
            );
            $this->db->insert('laboratorium', $data);
        }

        return array('status' => true);
    }

    public function tambahPemesanan()
    {
        // $create_date = time();
        // $id = uniqid();
        $obat = $this->db->get_where('obat', ['kd_obat' => $this->input->post('kd_obat', true)])->row_array();

        $jml_obat = $obat['jml_obat'] - $this->input->post('banyak_obat', true);
        if ($jml_obat < 0) {
            return array('status' => false, 'jml_obat' => $obat['jml_obat']);
        }

        /* update tbl obat */
        $data_obat = array(
            'kd_obat' => $obat['kd_obat'],
            'nama_obat' => $obat['nama_obat'],
            'harga_obat' => $obat['harga_obat'],
            'jml_obat' => $jml_obat,
            'kd_admin' => $obat['kd_admin'],
            'keterangan' => $obat['keterangan'],
        );
        $this->db->where('id_obat', $obat['id_obat']);
        $this->db->update('obat', $data_obat);

        /* cek obat sudah ada apa belum di table resep */
        $resep = $this->db->get_where(
            'resep',
            [
                'kd_obat' => $this->input->post('kd_obat', true),
                'kd_rekam_medis' => $this->input->post('kd_rekam_medis', true)
            ]
        )->row_array();

        $cara_pemakaian = $this->input->post('penggunaan') . 'x/hari ' . $this->input->post('status');
        if ($resep != null) {
            /* update resep */
            $banyak_obat = $resep['banyak_obat'] + $this->input->post('banyak_obat', true);
            $data = array(
                'kd_rekam_medis' => $this->input->post('kd_rekam_medis', true),
                'kd_obat' => $this->input->post('kd_obat', true),
                'cara_pemakaian' => $cara_pemakaian,
                'banyak_obat' => $banyak_obat,
                'kd_dokter' => $this->session->userdata('kode_user'),
            );

            $this->db->where('id_resep', $resep['id_resep']);
            $this->db->update('resep', $data);
        } else {
            /* insert table pemesana obat */

            $data = array(
                'kd_rekam_medis' => $this->input->post('kd_rekam_medis', true,),
                'kd_obat' => $this->input->post('kd_obat', true),
                'cara_pemakaian' => $cara_pemakaian,
                'banyak_obat' => $this->input->post('banyak_obat', true),
                'kd_dokter' => $this->session->userdata('kode_user'),
            );
            $this->db->insert('resep', $data);
        }

        return array('status' => true);
    }

    public function hapusPemesanan($id)
    {
        $resep = $this->db->get_where('resep', ['id_resep' => $id])->row_array();
        $obat = $this->db->get_where('obat', ['kd_obat' => $resep['kd_obat']])->row_array();
        $jml_obat = $obat['jml_obat'] + $resep['banyak_obat'];
        $data_obat = array(
            'kd_obat' => $obat['kd_obat'],
            'nama_obat' => $obat['nama_obat'],
            'harga_obat' => $obat['harga_obat'],
            'jml_obat' => $jml_obat,
            'kd_admin' => $obat['kd_admin'],
            'keterangan' => $obat['keterangan'],
        );
        $this->db->where('id_obat', $obat['id_obat']);
        $this->db->update('obat', $data_obat);

        $this->db->delete('resep', ['id_resep' => $id]);
    }
}
