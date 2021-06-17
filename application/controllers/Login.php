<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        if ($this->session->userdata('kode_user')) {
            redirect('user');
        }

        $this->form_validation->set_rules('username', 'Kode User', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login/index');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // jika user ada
            if ($user = $this->db->get_where('admin', ['kd_admin' => $username])->row_array()) {
                if (password_verify($password, $user['password'])) {

                    // berhasil
                    $data = [
                        'nama_user' => $user['nama_admin'],
                        'kode_user' => $user['kd_admin'],
                        'level' => $user['level'],
                        'status' => 'admin',
                        'img' => $user['img']
                    ];
                    $this->session->set_userdata($data);
                    redirect('user');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('login');
                }
            } elseif ($user = $this->db->get_where('dokter', ['kd_dokter' => $username])->row_array()) {
                if (password_verify($password, $user['password'])) {
                    // berhasil
                    $data = [
                        'nama_user' => $user['nama_dokter'],
                        'kode_user' => $user['kd_dokter'],
                        'level' => $user['level'],
                        'status' => 'dokter',
                        'img' => $user['img']
                    ];
                    $this->session->set_userdata($data);
                    redirect('user');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('login');
                }
            } elseif ($user = $this->db->get_where('pasien', ['kd_pasien' => $username])->row_array()) {
                if (password_verify($password, $user['password'])) {
                    // berhasil
                    $data = [
                        'nama_user' => $user['nama_pasien'],
                        'kode_user' => $user['kd_pasien'],
                        'status' => 'pasien',
                        'level' => $user['level'],
                        'img' => $user['img']
                    ];
                    $this->session->set_userdata($data);
                    redirect('user');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><strong>Kode User</strong> is not found!</div>');
                redirect('login');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('nama_user');
        $this->session->unset_userdata('kode_user');
        $this->session->unset_userdata('jabatan');
        $this->session->unset_userdata('status');
        $this->session->unset_userdata('img');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('login');
    }
}
