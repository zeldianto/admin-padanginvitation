<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function get_user_by_access($access) {
        $this->db->where('access', $access);
        return $this->db->get('tbl_user')->row();
    }
}
?>
