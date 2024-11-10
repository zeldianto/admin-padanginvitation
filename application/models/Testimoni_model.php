<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testimoni_model extends CI_Model
{

    public function get_total_testimoni()
    {
        $this->db->where('slug', $this->session->userdata('user_slug'));
        return $this->db->count_all_results('tbl_testimoni');
    }
    public function add_testimoni($star, $testimoni) {
        $data = [
            'slug' => $this->session->userdata('user_slug'),
            'name' => $this->session->userdata('user_name'),
            'star' => $star,
            'testimoni' => $testimoni,
        ];
        $this->db->insert('tbl_testimoni', $data);
    }
    
}
?>