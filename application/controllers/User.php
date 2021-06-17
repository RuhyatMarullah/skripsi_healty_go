<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('kode_user')) {
            redirect('login');
        }
    }
    public function index()
    {
        $data['judul'] = 'My Profile';
        $data['cek'] = 'profile';

        if ($this->session->userdata('status') == 'admin') {
            $data['user'] = $this->db->get_where('admin', ['kd_admin' => $this->session->userdata('kode_user')])->row_array();
            $data['user']['nama_user'] = $data['user']['nama_admin'];
        } elseif ($this->session->userdata('status') == 'dokter') {
            $data['user'] = $this->db->get_where('dokter', ['kd_dokter' => $this->session->userdata('kode_user')])->row_array();
            $data['user']['nama_user'] = $data['user']['nama_dokter'];
        } elseif ($this->session->userdata('status') == 'pasien') {
            $data['user'] = $this->db->get_where('pasien', ['kd_pasien' => $this->session->userdata('kode_user')])->row_array();
            $data['user']['nama_user'] = $data['user']['nama_pasien'];
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['judul'] = 'Edit Profile';
        $data['cek'] = 'edit_profile';

        if ($this->session->userdata('status') == 'admin') {
            $data['user'] = $this->db->get_where('admin', ['kd_admin' => $this->session->userdata('kode_user')])->row_array();
            $data['user']['nama_user'] = $data['user']['nama_admin'];
        } elseif ($this->session->userdata('status') == 'dokter') {
            $data['user'] = $this->db->get_where('dokter', ['kd_dokter' => $this->session->userdata('kode_user')])->row_array();
            $data['user']['nama_user'] = $data['user']['nama_dokter'];
        } elseif ($this->session->userdata('status') == 'pasien') {
            $data['user'] = $this->db->get_where('pasien', ['kd_pasien' => $this->session->userdata('kode_user')])->row_array();
            $data['user']['nama_user'] = $data['user']['nama_pasien'];
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar');
        $this->load->view('user/edit', $data);
        $this->load->view('templates/footer');
    }

    public function postEdit()
    {
        $img = $_FILES['img']['name'];

        if ($img) {
            $config['upload_path'] = './assets/img/profile/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '10000';


            $this->load->library('upload', $config);

            if ($this->session->userdata('status') == 'admin') {
                if ($this->upload->do_upload('img')) {
                    $new_img = $this->upload->data('file_name');
                    $this->db->set('img', $new_img);
                    $this->db->where('kd_admin', $this->session->userdata('kode_user'));
                    $this->db->update('admin');
                } else {
                    echo $this->upload->display_errors();
                }
            } elseif ($this->session->userdata('status') == 'dokter') {
                if ($this->upload->do_upload('img')) {
                    $new_img = $this->upload->data('file_name');
                    $this->db->set('img', $new_img);
                    $this->db->where('kd_dokter', $this->session->userdata('kode_user'));
                    $this->db->update('dokter');
                } else {
                    echo $this->upload->display_errors();
                }
            } elseif ($this->session->userdata('status') == 'pasien') {
                if ($this->upload->do_upload('img')) {
                    $new_img = $this->upload->data('file_name');
                    $this->db->set('img', $new_img);
                    $this->db->where('kd_pasien', $this->session->userdata('kode_user'));
                    $this->db->update('admin');
                } else {
                    echo $this->upload->display_errors();
                }
            }
        } else {
            redirect('user');
        }

        $old_img = $this->session->userdata('img');

        if ($old_img != 'default.jpg') {
            unlink(FCPATH . 'assets/img/profile/' . $old_img);
        }

        $this->session->set_userdata(['img' => $new_img]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile Berhasil Diubah!</div>');
        redirect('user');
    }
}
