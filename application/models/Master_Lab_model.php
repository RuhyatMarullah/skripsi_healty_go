<?php
class Master_Lab_model extends CI_Model
{
    public function getAll()
    {
        return  $this->db->get('master_lab')->result_array();
    }

    public function getMasterLabById($id)
    {
        return  $this->db->get_where('master_lab', array('id' => $id))->row_array();
    }

    public function tambahMasterLab()
    {
        $data = $this->getALl();
        if ($data == null) {
            $kode_master_lab = 'makmur-lab-1';
        } else {
            for ($i = 0; $i < count($data); $i++) {
                if ($i + 1 == count($data)) {
                    $kd_master_lab = $data[$i]['kd_master_lab'];
                    $kd_master_lab = explode('-', $kd_master_lab);
                    $cek = end($kd_master_lab);
                    $cek = $cek + 1;
                    $kode_master_lab = "makmur-lab-" . $cek;
                }
            }
        }

        /* insert tbl master lab */
        $data = array(
            'kd_master_lab' => $kode_master_lab,
            'pemeriksaan' => $this->input->post('pemeriksaan', true),
            'satuan' => $this->input->post('satuan', true),
            'nilai_rujukan_pria' => $this->input->post('nilai_rujukan_pria', true),
            'nilai_rujukan_wanita' => $this->input->post('nilai_rujukan_wanita', true)
        );

        $this->db->insert('master_lab', $data);
    }

    public function ubahMasterLab()
    {
        /* update tbl master lab */
        $data = array(
            'kd_master_lab' => $this->input->post('kd_master_lab', true),
            'pemeriksaan' => $this->input->post('pemeriksaan', true),
            'satuan' => $this->input->post('satuan', true),
            'nilai_rujukan_pria' => $this->input->post('nilai_rujukan_pria', true),
            'nilai_rujukan_wanita' => $this->input->post('nilai_rujukan_wanita', true)
        );

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('master_lab', $data);
    }
}
