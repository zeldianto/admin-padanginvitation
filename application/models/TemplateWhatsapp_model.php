<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TemplateWhatsapp_model extends CI_Model
{
    public function get_all_template_whatsapp()
    {
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get('tbl_template_whatsapp')->result();
    }
}
?>