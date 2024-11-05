<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Dashboard_model');
        $this->load->library('session');

        // Redirect ke login jika belum login
        if (!$this->session->userdata('user_id')) {
            redirect('auth');
        }
    }

    public function index() {
        // Ambil slug dari session
        $user_slug = $this->session->userdata('user_slug');
        
        // Ambil data summary
        $data['total_views'] = $this->Dashboard_model->get_total_views($user_slug);
        $data['total_greetings'] = $this->Dashboard_model->get_total_greetings($user_slug);
        $data['total_attending_guests'] = $this->Dashboard_model->get_total_attending_guests($user_slug);
        // var_dump($data);
        // Load view dashboard dan kirimkan data summary
        $this->load->view('dashboard', $data);
    }
}
?>
