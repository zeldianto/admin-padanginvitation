<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rsvp_model extends CI_Model
{
    public function get_all_rsvp($limit, $offset)
    {
        $this->db->where('confirm !=', "");
        $this->db->where('confirm IS NOT NULL');
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit, $offset);
        return $this->db->get('tbl_guest')->result();
    }

    public function count_all_rsvp()
    {
        $this->db->where('confirm !=', "");
        $this->db->where('confirm IS NOT NULL');
        return $this->db->count_all_results('tbl_guest');
    }

    public function get_total_attending_guests($slug)
    {
        $this->db->where('slug', $slug);
        $this->db->where('confirm', 'HADIR');
        return $this->db->count_all_results('tbl_guest');
    }

    public function get_total_not_attending_guests($slug)
    {
        $this->db->where('slug', $slug);
        $this->db->where('confirm', 'TIDAK HADIR');
        return $this->db->count_all_results('tbl_guest');
    }

    public function get_total_not_confirm($slug)
    {
        $this->db->where('slug', $slug);
        $this->db->where('confirm', "");
        $this->db->or_where('confirm IS NULL');
        return $this->db->count_all_results('tbl_guest');
    }

}
?>