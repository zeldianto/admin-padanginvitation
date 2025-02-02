<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FileRename extends CI_Controller {

    public function index() {
        $this->load->view('generator-file-name');
    }

    public function process_files() {
        // Load library upload
        $this->load->library('upload');

        // Ambil prefix dari input
        $prefix = $this->input->post('file_prefix', true);

        // Lokasi folder sementara untuk upload file
        $upload_path = './uploads/temp/';
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        // Konfigurasi upload
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'jpg|png|jpeg|pdf|docx|txt|gif|mp3|webp'; // Tentukan tipe file yang diperbolehkan
        $this->upload->initialize($config);

        // Ambil file yang diunggah
        $files = $_FILES['files'];

        // Array untuk menyimpan file yang telah diubah namanya
        $renamed_files = [];

        foreach ($files['name'] as $index => $file_name) {
            // Set data untuk setiap file
            $_FILES['file']['name'] = $files['name'][$index];
            $_FILES['file']['type'] = $files['type'][$index];
            $_FILES['file']['tmp_name'] = $files['tmp_name'][$index];
            $_FILES['file']['error'] = $files['error'][$index];
            $_FILES['file']['size'] = $files['size'][$index];

            // Upload file
            if ($this->upload->do_upload('file')) {
                $data = $this->upload->data();

                // Buat nama file baru
                $new_file_name = $prefix . '-' . ($index + 1) . $data['file_ext'];
                $old_file_path = $data['full_path'];
                $new_file_path = $upload_path . $new_file_name;

                // Rename file
                if (rename($old_file_path, $new_file_path)) {
                    $renamed_files[] = $new_file_path;
                }
            } else {
                echo $this->upload->display_errors();
            }
        }

        // Jika ada file yang berhasil diubah namanya
        if (!empty($renamed_files)) {
            // Buat file ZIP untuk diunduh
            $this->load->library('zip');
            foreach ($renamed_files as $file) {
                $this->zip->read_file($file, basename($file));
            }

            // Unduh file ZIP
            $zip_name = 'Renamed_Files_' . time() . '.zip';
            $this->zip->download($zip_name);
        } else {
            echo "Tidak ada file yang diunggah atau diganti namanya.";
        }
    }
}
