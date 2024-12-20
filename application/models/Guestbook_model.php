<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guestbook_model extends CI_Model
{
    public function get_all_guests($limit, $offset) {
        $this->db->where('slug', $this->session->userdata('user_slug'));
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit, $offset);
        return $this->db->get('tbl_guest')->result();
    }

    public function get_setting_by_slug()
    {
        $this->db->select('tbl_template_whatsapp.content');
        $this->db->from('tbl_order');
        $this->db->join('tbl_template_whatsapp', 'tbl_order.template_whatsapp = tbl_template_whatsapp.id');
        $this->db->where('tbl_order.slug', $this->session->userdata('user_slug'));
        $this->db->limit(1);

        return $this->db->get()->row_array();
    }
    
    public function count_all_guests() {
        $this->db->where('slug', $this->session->userdata('user_slug'));
        return $this->db->count_all_results('tbl_guest');
    }

    public function add_guest($name, $phone) {
        $data = [
            'name' => $name,
            'phone' => $phone,
            'view' => 0,
            'slug' => $this->session->userdata('user_slug'),
        ];
        $this->db->insert('tbl_guest', $data);
    }
}
?>