<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Setting_model');
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
            $data['template'] = $this->Setting_model->get_all_template_whatsapp(1);
            $order = $this->Setting_model->get_my_order();
            $data['template_whatsapp'] = $order ? $order['template_whatsapp'] : 1;
            // var_dump($data);
        } else {
            redirect('auth/login');
        }

        $this->load->view('setting', $data);
    }

    public function updateTemplateWhatsapp() {
        $template = $this->input->post('template');
        $this->Setting_model->update_template_whatsapp($template);

        redirect('setting');
    }
}
?>