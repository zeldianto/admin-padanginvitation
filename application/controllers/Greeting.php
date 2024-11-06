<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Greeting extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Greeting_model');
        $this->load->library('session');

        // Redirect ke login jika belum login
        if (!$this->session->userdata('user_id')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Kartu Ucapan | Padang Invitation';
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
        $config['base_url'] = base_url('index.php/greeting/index');
        $config['total_rows'] = $this->Greeting_model->count_all_greeting();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;

        // Initialize pagination
        $this->pagination->initialize($config);

        // Get page number from URI segment or default to 0
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // Pass the page variable to view
        $data['page'] = $page;

        // Fetch the guests with limit and offset
        $data['greeting'] = $this->Greeting_model->get_all_greeting($config['per_page'], $page);
        $data['pagination'] = $this->pagination->create_links();

        // Load view
        $this->load->view('greeting', $data);
    }

    public function update_status($id)
    {
        // Ambil data greeting berdasarkan ID untuk mendapatkan status saat ini
        $greeting = $this->Greeting_model->get_greeting_by_id($id);

        // Cek apakah data greeting ditemukan
        if ($greeting) {
            // Toggle status: jika status saat ini 1, ubah jadi 0; jika 0, ubah jadi 1
            $new_status = ($greeting->status == 1) ? 0 : 1;

            // Update status di database
            $this->Greeting_model->update_status($id, $new_status);

            // Redirect kembali ke halaman index dengan pesan sukses
            $this->session->set_flashdata('success', 'Status berhasil diubah.');
        } else {
            // Jika data tidak ditemukan, berikan pesan error
            $this->session->set_flashdata('error', 'Data tidak ditemukan.');
        }

        // Ambil URL halaman sebelumnya dari referer
        $previous_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'greeting/index';

        // Redirect ke halaman sebelumnya atau ke index jika referer tidak ditemukan
        redirect($previous_url);
    }

    public function reply()
    {
        // Validasi input
        $id = $this->input->post('id_greeting');
        $message = $this->input->post('message');
        if (empty($message)) {
            $this->session->set_flashdata('error', 'Pesan tidak boleh kosong.');
            redirect('greeting');
        }

        // Panggil model untuk update balasan
        $this->Greeting_model->add_reply($id, $message);

        $this->session->set_flashdata('success', 'Balasan berhasil dikirim.');
        
        // Ambil URL halaman sebelumnya dari referer
        $previous_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'greeting/index';

        // Redirect ke halaman sebelumnya atau ke index jika referer tidak ditemukan
        redirect($previous_url);
    }

}
?>