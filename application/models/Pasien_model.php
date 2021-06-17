<?php
class Pasien_model extends CI_Model
{
    public function getALl()
    {
        $this->db->order_by('id_pasien', 'ASC');
        return $this->db->get('pasien')->result_array();
    }

    public function getPasienById($id)
    {
        $query = $this->db->get_where('pasien', array('id_pasien' => $id));
        return $query->row_array();
    }

    public function tambahPasien()
    {
        $data = $this->getALl();
        if ($data == null) {
            $kode_pasien = 'makmur-ps-1';
        } else {
            for ($i = 0; $i < count($data); $i++) {
                if ($i + 1 == count($data)) {
                    $kd_pasien = $data[$i]['kd_pasien'];
                    $kd_pasien = explode('-', $kd_pasien);
                    $cek = end($kd_pasien);
                    $cek = $cek + 1;
                    $kode_pasien = "makmur-ps-" . $cek;
                }
            }
        }

        // set password
        $pass = $this->input->post('tgl_lahir');
        $password = explode('-', $pass);
        $password = $password[2] . $password[1] . $password[0];

        // $create_date = time();
        // $id = uniqid();

        /* isert tbl pasien */
        $pasien = array(
            // 'id_pasien' => $id,
            'kd_pasien' => $kode_pasien,
            'nama_pasien' => $this->input->post('nama', true),
            'no_identitas' => $this->input->post('no_identitas', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'tgl_lahir' => $this->input->post('tgl_lahir', true),
            'alamat' => $this->input->post('alamat', true),
            'no_telp' => $this->input->post('no_telp', true),
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'img' => 'default.jpg'
            // 'date_create' => $create_date,
        );

        $this->db->insert('pasien', $pasien);

        /* insert tbl users */
        // $user = array(
        //     'id_user' => $id,
        //     'kode_user' => $kode_pasien,
        //     'nama_user' => $this->input->post('nama', true),
        //     'tgl_lahir' => $this->input->post('tgl_lahir', true),
        //     'alamat' => $this->input->post('alamat', true),
        //     'status' => 'pasien',
        //     'img' => 'default.jpg',
        //     'jabatan' => 'pasien',
        //     'no_telp' => $this->input->post('no_telp', true),
        //     'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
        //     'date_create' => $create_date,
        //     'password' => $password
        // );
        // $this->db->insert('users', $user);
    }

    public function ubahPasien()
    {

        $pass = $this->input->post('tgl_lahir');
        $password = explode('-', $pass);
        $password = $password[2] . $password[1] . $password[0];

        /* update tbl pasien */
        $data = array(
            'kd_pasien' => $this->input->post('kode_pasien', true),
            'nama_pasien' => $this->input->post('nama', true),
            'no_identitas' => $this->input->post('no_identitas', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'tgl_lahir' => $this->input->post('tgl_lahir', true),
            'alamat' => $this->input->post('alamat', true),
            'no_telp' => $this->input->post('no_telp', true),
            'password' => password_hash($password, PASSWORD_DEFAULT),
        );

        $this->db->where('id_pasien', $this->input->post('id_pasien'));
        $this->db->update('pasien', $data);

        /* update tbl users */
        /* $users = $this->db->get_where('users', array('id_user' =>  $this->input->post('id_pasien')))->row_array();

        // set password


        $user = array(
            'kode_user' => $this->input->post('kode_pasien', true),
            'nama_user' => $this->input->post('nama', true),
            'tgl_lahir' => $this->input->post('tgl_lahir', true),
            'alamat' => $this->input->post('alamat', true),
            'status' => 'pasien ',
            'img' => $users['img'],
            'jabatan' => 'pasien',
            'no_telp' => $this->input->post('no_telp', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'date_create' => $this->input->post('date_create', true),
            'password' => $password
        );
        $this->db->where('id_user', $this->input->post('id_pasien'));
        $this->db->update('users', $user); */
    }

    public function hapusPasien($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('pasien', ['id_pasien' => $id]);
        $this->db->delete('users', ['id_user' => $id]);
    }

    public function getByKodePasien($kode_pasien)
    {
        $query = $this->db->get_where('pasien', array('kd_pasien' => $kode_pasien));
        return $query->row_array();
    }
}
