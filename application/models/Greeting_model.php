<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Greeting_model extends CI_Model
{
    public function get_all_greeting($limit, $offset)
    {
        $this->db->where('slug', $this->session->userdata('user_slug'));
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit, $offset);
        return $this->db->get('tbl_gretting')->result();
    }

    public function count_all_greeting()
    {
        $this->db->where('slug', $this->session->userdata('user_slug'));
        return $this->db->count_all_results('tbl_gretting');
    }

    public function get_greeting_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('tbl_gretting')->row();
    }

    public function update_status($id, $status)
    {
        $this->db->set('status', $status);
        $this->db->where('id', $id);
        return $this->db->update('tbl_gretting');
    }

    public function add_reply($id, $replyMessage)
    {
        $data = [
            'reply' => $replyMessage
        ];

        $this->db->where('id', $id);
        $this->db->update('tbl_gretting', $data);
    }


}
?>