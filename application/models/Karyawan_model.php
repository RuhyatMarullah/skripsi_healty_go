<?php
class Karyawan_model extends CI_Model
{
    public function getALl()
    {
        $this->db->order_by('id_admin', 'ASC');
        $this->db->where('level >', 1);
        return $this->db->get('admin')->result_array();
    }

    public function getKaryawanById($id)
    {
        $query = $this->db->get_where('admin', array('id_admin' => $id));
        return $query->row_array();
    }

    public function tambahKaryawan()
    {
        $data = $this->getALl();
        if ($data == null) {
            $kode_karyawan = 'makmur-kr-1';
        } else {
            for ($i = 0; $i < count($data); $i++) {
                if ($i + 1 == count($data)) {
                    $kd_karyawan = $data[$i]['kd_admin'];
                    $kd_karyawan = explode('-', $kd_karyawan);
                    $cek = end($kd_karyawan);
                    $cek = $cek + 1;
                    $kode_karyawan = "makmur-kr-" . $cek;
                }
            }
        }


        // set password
        $pass = $this->input->post('tgl_lahir');
        $password = explode('-', $pass);
        $password = $password[2] . $password[1] . $password[0];



        /* insert tbl dokter */
        $karyawan = array(
            'kd_admin' => $kode_karyawan,
            'nama_admin' => $this->input->post('nama', true),
            'no_identitas' => $this->input->post('no_identitas', true),
            'tgl_lahir' => $this->input->post('tgl_lahir', true),
            'alamat' => $this->input->post('alamat', true),
            'level' => $this->input->post('jabatan', true),
            'no_telp' => $this->input->post('no_telp', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'img' => 'default.jpg'
        );

        $this->db->insert('admin', $karyawan);

        /* insert tbl users */
        /* $user = array(
            'id_user' => $id,
            'kode_user' => $kode_karyawan,
            'nama_user' => $this->input->post('nama', true),
            'tgl_lahir' => $this->input->post('tgl_lahir', true),
            'alamat' => $this->input->post('alamat', true),
            'status' => 'karyawan',
            'img' => 'default.jpg',
            'jabatan' => $this->input->post('jabatan', true),
            'no_telp' => $this->input->post('no_telp', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'date_create' => $create_date,

        );
        $this->db->insert('users', $user); */
    }

    public function ubahKaryawan()
    {
        $pass = $this->input->post('tgl_lahir');
        $password = explode('-', $pass);
        $password = $password[0] . $password[1] . $password[2];

        $karyawan = array(
            'kd_admin' => $this->input->post('kode_karyawan', true),
            'nama_admin' => $this->input->post('nama', true),
            'no_identitas' => $this->input->post('no_identitas', true),
            'tgl_lahir' => $this->input->post('tgl_lahir', true),
            'alamat' => $this->input->post('alamat', true),
            'level' => $this->input->post('jabatan', true),
            'no_telp' => $this->input->post('no_telp', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'password' => password_hash($password, PASSWORD_DEFAULT),
        );

        $this->db->where('id_admin', $this->input->post('id_karyawan'));
        $this->db->update('admin', $karyawan);

        /* update tbl users */
        /* $users = $this->db->get_where('users', array('id_user' =>  $this->input->post('id_karyawan')))->row_array();

        // set password


        $user = array(
            'kode_user' => $this->input->post('kode_karyawan', true),
            'nama_user' => $this->input->post('nama', true),
            'tgl_lahir' => $this->input->post('tgl_lahir', true),
            'alamat' => $this->input->post('alamat', true),
            'status' => 'karyawan',
            'img' => $users['img'],
            'jabatan' => $this->input->post('jabatan', true),
            'no_telp' => $this->input->post('no_telp', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'date_create' => $this->input->post('date_create', true),
            'password' => $password
        );
        $this->db->where('id_user', $this->input->post('id_karyawan'));
        $this->db->update('users', $user); */
    }

    public function hapusKaryawan($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('tb_karyawan', ['id_karyawan' => $id]);
        $this->db->delete('users', ['id_user' => $id]);
    }

    public function getJabatan()
    {
        $this->db->where('id >', 1);
        $this->db->where('id <', 6);
        return $this->db->get('roles')->result_array();
    }
}
