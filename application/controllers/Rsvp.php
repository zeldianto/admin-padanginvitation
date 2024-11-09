<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rsvp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rsvp_model');
        $this->load->library('session');

        // Redirect ke login jika belum login
        if (!$this->session->userdata('user_id')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'RSVP | Padang Invitation';        

        $user_slug = $this->session->userdata('user_slug');
        
        // Load the pagination library
        $this->load->library('pagination');

        // Custom pagination style
        $config['full_tag_open'] = '<nav class="pagination mt-4 flex justify-center">';
        $config['full_tag_close'] = '</nav>';

        $config['num_tag_open'] = '<span class="px-2 py-1 mx-2 rounded hover:bg-gray-200">';
        $config['num_tag_close'] = '</span>';

        $config['cur_tag_open'] = '<span class="px-3 py-1 bg-pink-600 text-white mx-2 rounded">';
        $config['cur_tag_close'] = '</span>';

        $config['next_tag_open'] = '<span class="px-2 py-1 mx-2 rounded hover:bg-gray-200">';
        $config['next_tag_close'] = '</span>';

        $config['prev_tag_open'] = '<span class="px-2 py-1 mx-2 rounded hover:bg-gray-200">';
        $config['prev_tag_close'] = '</span>';

        $config['first_tag_open'] = '<span class="px-2 py-1 mx-2 rounded hover:bg-gray-200">';
        $config['first_tag_close'] = '</span>';

        $config['last_tag_open'] = '<span class="px-2 py-1 mx-2 rounded hover:bg-gray-200">';
        $config['last_tag_close'] = '</span>';

        // Optional: Customizing the text for "next" and "previous" links
        $config['next_link'] = 'Selanjutnya';
        $config['prev_link'] = 'Sebelumnya';

        // Set pagination configuration
        $config['base_url'] = base_url('index.php/rsvp/index');
        $config['total_rows'] = $this->Rsvp_model->count_all_rsvp();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;

        // Initialize pagination
        $this->pagination->initialize($config);

        // Get page number from URI segment or default to 0
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // Pass the page variable to view
        $data['page'] = $page;

        // Fetch the guests with limit and offset
        $data['rsvp'] = $this->Rsvp_model->get_all_rsvp($config['per_page'], $page);
        $data['pagination'] = $this->pagination->create_links();
        
        // Ambil data summary
        $data['total_attending_guests'] = $this->Rsvp_model->get_total_attending_guests($user_slug);
        $data['total_not_attending_guests'] = $this->Rsvp_model->get_total_not_attending_guests($user_slug);
        $data['total_not_confirm'] = $this->Rsvp_model->get_total_not_confirm($user_slug);
        // var_dump($data['total_not_confirm']);
        // Load view
        $this->load->view('rsvp', $data);
    }

}
?>