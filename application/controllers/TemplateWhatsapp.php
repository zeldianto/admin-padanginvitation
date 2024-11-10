<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TemplateWhatsapp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('TemplateWhatsapp_model');
        $this->load->library('session');

        // Redirect ke login jika belum login
        if (!$this->session->userdata('user_id')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Template Whatsapp | Padang Invitation';

        $user_role = $this->session->userdata('user_role');
        $user_slug = $this->session->userdata('user_slug');

        $data['slug'] = $user_slug;
        $data['site_url'] = get_json_config('site_url');

        $data['template'] = $this->TemplateWhatsapp_model->get_all_template_whatsapp();

        $this->load->view('template-whatsapp', $data);
    }

    // public function updateTemplateWhatsapp() {
    //     $template = $this->input->post('template');
    //     $this->Setting_model->update_template_whatsapp($template);

    //     redirect('setting');
    // }
}
?>