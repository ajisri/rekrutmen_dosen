<?php

class Modellogin extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function read($table, $cond, $ordField, $ordType) {
        if ($cond != null) {
            $this->db->where($cond);
        }
        if ($ordField != null) {
            $this->db->order_by($ordField, $ordType);
        }
        $query = $this->db->get($table);
        return $query;
    }

    //CEK EMAIL      
   
    function get_user_by_email($email) {
        return $this->db->query("select * from tb_user where email='$email' order by id_user desc limit 1")->row();
    }
    function get_user_by_email_nik($email, $nik) {
        return $this->db->query("select * from tb_user where email='$email' and nik='$nik' order by id_user desc limit 1")->row();
    }
    function update_user($id, $data) {
        $this->db->where('id_user', $id);
        $this->db->update('tb_user', $data);
    }
    function get_user_by_id($id) {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('id_user', $id);
        $query = $this->db->get();
        return $query->row();
    }

}

?>