<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends CI_Model
{
    public function get_all_order($limit, $offset)
    {
        $this->db->select('tbl_order.slug,tbl_order.date, tbl_order.created_at, tbl_user.name, tbl_user.access'); // Menentukan kolom yang ingin diambil
        $this->db->from('tbl_order');
        $this->db->join('tbl_user', 'tbl_user.slug = tbl_order.slug', 'left'); // Melakukan join dengan tbl_user
        $this->db->order_by('tbl_order.created_at', 'DESC');
        $this->db->limit($limit, $offset);

        return $this->db->get()->result();
    }

    public function count_all_order()
    {
        return $this->db->count_all('tbl_order');
    }

    public function add_order($name, $url, $date)
    {
        $this->db->trans_begin(); // Mulai transaksi

        // Cek apakah slug sudah ada di tabel tbl_order
        $existing_order = $this->db->get_where('tbl_order', ['slug' => $url])->row();
        if ($existing_order) {
            $this->db->trans_rollback();
            return false;
        }

        // Jika slug tidak ada, lanjutkan untuk insert ke tbl_order
        $dataOrder = [
            'slug' => $url,
            'date' => $date,
        ];
        $this->db->insert('tbl_order', $dataOrder);

        // Siapkan data untuk tabel tbl_user
        $random_digits = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT); // Generate 4 digit random
        $access_code = date('m') . $random_digits; // Kombinasi bulan dan random 4 digit
        $dataUser = [
            'name' => $name,
            'access' => $access_code,
            'slug' => $url,
            'roles' => 'USER',
        ];
        $this->db->insert('tbl_user', $dataUser);

        // Periksa apakah semua proses berhasil
        if ($this->db->trans_status() === FALSE) {
            // Jika ada kesalahan, rollback transaksi
            $this->db->trans_rollback();
            return false;
        } else {
            // Jika sukses, commit transaksi
            $this->db->trans_commit();
            return true;
        }
    }


}
?>