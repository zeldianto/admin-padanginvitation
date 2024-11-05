<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guestbook extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Guestbook_model');
        $this->load->library('session');

        // Redirect ke login jika belum login
        if (!$this->session->userdata('user_id')) {
            redirect('auth');
        }
    }

    public function index()
    {
        // Load the pagination library
        $this->load->library('pagination');

        // Set pagination configuration
        $config['base_url'] = base_url('index.php/guestbook/index');
        $config['total_rows'] = $this->Guestbook_model->count_all_guests();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;

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
        $config['base_url'] = base_url('index.php/guestbook/index');
        $config['total_rows'] = $this->Guestbook_model->count_all_guests();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;

        // Initialize pagination
        $this->pagination->initialize($config);

        // Get page number from URI segment or default to 0
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // Pass the page variable to view
        $data['page'] = $page;

        // Fetch the guests with limit and offset
        $data['guests'] = $this->Guestbook_model->get_all_guests($config['per_page'], $page);
        $data['pagination'] = $this->pagination->create_links();

        // Load view
        $this->load->view('guestbook', $data);
    }

    public function add()
    {
        // Ambil data dari form
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');

        // Tambahkan data tamu
        $this->Guestbook_model->add_guest($name, $phone);

        // Redirect kembali ke halaman Buku Tamu
        redirect('guestbook');
    }
}
?>