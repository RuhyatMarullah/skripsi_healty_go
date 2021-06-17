<?php
class Obat_model extends CI_Model
{
    public function getALl()
    {
        $this->db->order_by('id_obat', 'ASC');
        return $this->db->get('obat')->result_array();
    }

    public function getALlStep2()
    {
        $this->db->order_by('id_obat', 'ASC');
        return $this->db->get_where('obat', ['jml_obat >' => 0])->result_array();
    }

    public function getObatById($id)
    {
        $query = $this->db->get_where('obat', array('id_obat' => $id));
        return $query->row_array();
    }

    public function tambahObat()
    {
        $data = $this->getALl();
        if ($data == null) {
            $kode_obat = 'makmur-obt-1';
        } else {
            for ($i = 0; $i < count($data); $i++) {
                if ($i + 1 == count($data)) {
                    $kd_obat = $data[$i]['kd_obat'];
                    $kd_obat = explode('-', $kd_obat);
                    $cek = end($kd_obat);
                    $cek = $cek + 1;
                    $kode_obat = "makmur-obt-" . $cek;
                }
            }
        }
        // $id = uniqid();
        $obat = array(
            // 'id_obat' => $id,
            'kd_obat' => $kode_obat,
            'nama_obat' => $this->input->post('nama_obat', true),
            'keterangan' => $this->input->post('keterangan_obat', true),
            'jml_obat' => $this->input->post('jml_obat', true),
            'harga_obat' => $this->input->post('harga_obat', true),
            'kd_admin' => $this->session->userdata('kode_user')
        );

        $this->db->insert('obat', $obat);
    }

    public function ubahObat()
    {
        $data = array(
            'kd_obat' => $this->input->post('kode_obat', true),
            'nama_obat' => $this->input->post('nama_obat', true),
            'keterangan' => $this->input->post('keterangan_obat', true),
            'harga_obat' => $this->input->post('harga_obat', true),
            'jml_obat' => $this->input->post('jml_obat', true),
            'kd_admin' => $this->session->userdata('kode_user')
        );

        $this->db->where('id_obat', $this->input->post('id_obat'));
        $this->db->update('obat', $data);
    }

    public function hapusObat($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('obat', ['id_obat' => $id]);
    }
}
