<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
    }

    public function index() {
        $data['title'] = 'Login | Padang Invitation';
        $this->load->view('login', $data);
    }

    public function login() {
        $access = $this->input->post('access');
        
        // Validasi akses hanya 6 digit angka
        if (strlen($access) !== 6 || !ctype_digit($access)) {
            $this->session->set_flashdata('error', 'Access harus berupa 6 digit angka.');
            redirect('login');
        }

        // Cek akses pada database
        $user = $this->User_model->get_user_by_access($access);

        if ($user) {
            // Set session user
            $this->session->set_userdata('user_id', $user->id);
            $this->session->set_userdata('user_name', $user->name);
            $this->session->set_userdata('user_role', $user->roles);
            $this->session->set_userdata('user_slug', $user->slug);
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('error', 'Access tidak valid.');
            redirect('login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}
?>
