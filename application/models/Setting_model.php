<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting_model extends CI_Model
{
    public function get_all_template_whatsapp($status)
    {
        $this->db->where('status', $status);
        // $this->db->order_by('created_at', 'DESC');
        return $this->db->get('tbl_template_whatsapp')->result_array();
    }
    public function get_my_order()
    {
        $this->db->select('template_whatsapp');
        $this->db->where('slug', $this->session->userdata('user_slug'));
        $this->db->limit(1);
        return $this->db->get('tbl_order')->row_array();
    }
    public function update_template_whatsapp($template)
    {
        $this->db->set('template_whatsapp', $template);
        $this->db->where('slug', $this->session->userdata('user_slug'));
        return $this->db->update('tbl_order');
    }
}
?>