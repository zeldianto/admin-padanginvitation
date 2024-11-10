<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testimoni extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Testimoni_model');
        $this->load->library('session');

        // Redirect ke login jika belum login
        if (!$this->session->userdata('user_id')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Testimoni | Padang Invitation';

        $user_role = $this->session->userdata('user_role');
        $user_slug = $this->session->userdata('user_slug');

        $data['slug'] = $user_slug;
        $data['site_url'] = get_json_config('site_url');

        if ($user_role === 'ADMIN') {
            // untuk admin

        } else if ($user_role === 'USER') {
            // untuk user
            $data['total_testimoni'] = $this->Testimoni_model->get_total_testimoni();
            // var_dump($data['total_testimoni']);
        } else {
            redirect('auth/login');
        }

        $this->load->view('testimoni', $data);
    }

    public function add()
    {
        // Ambil data dari form
        $star = $this->input->post('star');
        $testimoni = $this->input->post('testimoni');

        // Tambahkan data tamu
        $this->Testimoni_model->add_testimoni($star, $testimoni);

        // Redirect kembali ke halaman Buku Tamu
        redirect('testimoni');
    }

}
?>