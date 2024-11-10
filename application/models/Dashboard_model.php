<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function get_summary_data($access)
    {
        $this->db->where('access', $access);
        return $this->db->get('tbl_user')->row();
    }

    public function get_total_views($slug)
    {
        $this->db->select_sum('view');
        $this->db->where('slug', $slug);
        $result = $this->db->get('tbl_guest')->row();
        return isset($result->view) ? $result->view : 0;
    }

    public function get_total_greetings($slug)
    {
        $this->db->where('slug', $slug);
        return $this->db->count_all_results('tbl_gretting');
    }

    public function get_total_attending_guests($slug)
    {
        $this->db->where('slug', $slug);
        $this->db->where('confirm', 'HADIR');
        return $this->db->count_all_results('tbl_guest');
    }

    public function get_total_order()
    {
        return $this->db->count_all_results('tbl_order');
    }
}
?>