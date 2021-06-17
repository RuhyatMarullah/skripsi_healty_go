<?php
class Doctor_model extends CI_Model
{
    public function getALl()
    {
        $this->db->order_by('id_dokter', 'ASC');
        return $this->db->get('dokter')->result_array();
    }

    public function getDokterById($id)
    {
        $this->db->select('dokter.*,  poli.*');
        $this->db->join('poli', 'poli.kd_poli = dokter.kd_poli');
        $query = $this->db->get_where('dokter', array('id_dokter' => $id));
        return $query->row_array();
    }

    public function getPoli()
    {
        return $this->db->get('poli')->result_array();
    }

    public function tambahDokter()
    {
        $data = $this->getALl();
        if ($data == null) {
            $kode_dokter = 'makmur-dr-1';
        } else {
            for ($i = 0; $i < count($data); $i++) {
                if ($i + 1 == count($data)) {
                    $kd_dokter = $data[$i]['kd_dokter'];
                    $kd_dokter = explode('-', $kd_dokter);
                    $cek = end($kd_dokter);
                    $cek = $cek + 1;
                    $kode_dokter = "makmur-dr-" . $cek;
                }
            }
        }

        //set level
        if ($this->input->post('poli') == 'makmur-pl-1') {
            $level = 5;
        } elseif ($this->input->post('poli') == 'makmur-pl-2') {
            $level = 6;
        } elseif ($this->input->post('poli') == 'makmur-pl-3') {
            $level = 7;
        }

        // set password
        $pass = $this->input->post('tgl_lahir');
        $password = explode('-', $pass);
        $password = $password[2] . $password[1] . $password[0];

        // $create_date = time();
        // $id = uniqid();
        /* insert tbl dokter */
        $dokter = array(
            'kd_dokter' => $kode_dokter,
            'kd_poli' => $this->input->post('poli', true),
            'alamat' => $this->input->post('alamat', true),
            'no_telp' => $this->input->post('no_telp', true),
            'no_identitas' => $this->input->post('no_identitas', true),
            // 'date_create' => $create_date,
            'nama_dokter' => $this->input->post('nama', true),
            'tgl_lahir' => $this->input->post('tgl_lahir', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'level' => $level,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'img' => 'default.jpg'
        );
        $this->db->insert('dokter', $dokter);

        /* insert tbl users */
        /* $user = array(
            'id_user' => $id,
            'kode_user' => $kode_dokter,
            'nama_user' => $this->input->post('nama', true),
            'tgl_lahir' => $this->input->post('tgl_lahir', true),
            'alamat' => $this->input->post('alamat', true),
            'status' => 'dokter',
            'img' => 'default.jpg',
            'jabatan' => $jabatan,
            'no_telp' => $this->input->post('no_telp', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'date_create' => $create_date,
            'password' => $password
        );
        $this->db->insert('users', $user); */
    }

    public function ubahDokter()
    {
        if ($this->input->post('poli') == 'makmur-pl-1') {
            $level = 5;
        } elseif ($this->input->post('poli') == 'makmur-pl-2') {
            $level = 6;
        } elseif ($this->input->post('poli') == 'makmur-pl-3') {
            $level = 7;
        }

        // set password
        $pass = $this->input->post('tgl_lahir');
        $password = explode('-', $pass);
        $password = $password[2] . $password[1] . $password[0];


        /* update tbl dokter */
        $data = array(
            'kd_dokter' => $this->input->post('kd_dokter', true),
            'kd_poli' => $this->input->post('poli', true),
            'alamat' => $this->input->post('alamat', true),
            'no_telp' => $this->input->post('no_telp', true),
            'no_identitas' => $this->input->post('no_identitas', true),
            // 'date_create' => $this->input->post('date_create', true),
            'nama_dokter' => $this->input->post('nama', true),
            'tgl_lahir' => $this->input->post('tgl_lahir', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'level' => $level,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        );

        $this->db->where('id_dokter', $this->input->post('id_dokter'));
        $this->db->update('dokter', $data);

        /* update tbl users */
        // $users = $this->db->get_where('users', array('id_user' =>  $this->input->post('id_dokter')))->row_array();

        //set jabatan
        /* if ($this->input->post('poli') == 'makmur-pl-1') {
            $jabatan = 'umum';
        } elseif ($this->input->post('poli') == 'makmur-pl-2') {
            $jabatan = 'gigi';
        } elseif ($this->input->post('poli') == 'makmur-pl-3') {
            $jabatan = 'anak';
        }

        $user = array(
            'kode_user' => $this->input->post('kode_dokter', true),
            'nama_user' => $this->input->post('nama', true),
            'tgl_lahir' => $this->input->post('tgl_lahir', true),
            'alamat' => $this->input->post('alamat', true),
            'status' => 'dokter',
            'img' => $users['img'],
            'jabatan' => $jabatan,
            'no_telp' => $this->input->post('no_telp', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'date_create' => $this->input->post('date_create', true),
            'password' => $password
        );
        $this->db->where('id_user', $this->input->post('id_dokter'));
        $this->db->update('users', $user); */
    }

    public function hapusDokter($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('tb_dokter', ['id_dokter' => $id]);
        $this->db->delete('users', ['id_user' => $id]);
    }
}
