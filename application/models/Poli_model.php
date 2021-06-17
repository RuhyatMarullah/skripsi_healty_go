<?php
class Poli_model extends CI_Model
{
    public function getALl()
    {
        $this->db->order_by('id_poli', 'ASC');
        return $this->db->get('poli')->result_array();
    }

    public function getPoliById($id)
    {
        $query = $this->db->get_where('poli', array('id_poli' => $id));
        return $query->row_array();
    }

    public function tambahPoli()
    {
        $data = $this->getALl();
        if ($data == null) {
            $kode_poli = 'makmur-pl-1';
        } else {
            for ($i = 0; $i < count($data); $i++) {
                if ($i + 1 == count($data)) {
                    $kd_poli = $data[$i]['kd_poli'];
                    $kd_poli = explode('-', $kd_poli);
                    $cek = end($kd_poli);
                    $cek = $cek + 1;
                    $kode_poli = "makmur-pl-" . $cek;
                }
            }
        }
        $create_date = time();
        // $id = uniqid();
        $data = array(
            'kd_poli' => $kode_poli,
            'nama_poli' => $this->input->post('nama_poli', true),
            'biaya' => $this->input->post('biaya_poli', true),
            // 'date_create' => $create_date,
        );

        $this->db->insert('poli', $data);
    }

    public function ubahPoli()
    {
        $data = array(
            'kd_poli' => $this->input->post('kode_poli', true),
            'nama_poli' => $this->input->post('nama_poli', true),
            'biaya' => $this->input->post('biaya_poli', true),
        );

        $this->db->where('id_poli', $this->input->post('id_poli'));
        $this->db->update('poli', $data);
    }

    public function hapusPoli($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('poli', ['id_poli' => $id]);
    }
}
