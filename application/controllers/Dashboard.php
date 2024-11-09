<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_model');
        $this->load->library('session');

        // Redirect ke login jika belum login
        if (!$this->session->userdata('user_id')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard | Padang Invitation';

        $user_role = $this->session->userdata('user_role');
        $user_slug = $this->session->userdata('user_slug');

        $data['slug'] = $user_slug;
        $data['site_url'] = get_json_config('site_url');

        if ($user_role === 'ADMIN') {
            // untuk admin

        } else if ($user_role === 'USER') {
            // untuk user
            $data['total_views'] = $this->Dashboard_model->get_total_views($user_slug);
            $data['total_greetings'] = $this->Dashboard_model->get_total_greetings($user_slug);
            $data['total_attending_guests'] = $this->Dashboard_model->get_total_attending_guests($user_slug);
            // var_dump($data);
        } else {
            redirect('auth/login');
        }

        $this->load->view('dashboard', $data);
    }
}
?>