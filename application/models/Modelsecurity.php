<?php

class Modelsecurity extends CI_Model {
    public function checkRegistrationRate($ip) {
        $this->db->where('ip_address', $ip);
        $this->db->where('created_at >=', date('Y-m-d H:i:s', strtotime('-1 hour')));
        $query = $this->db->get('tb_user');
        return ($query->num_rows() >= 3); // Batasi 3 pendaftaran per jam per IP
    }
}

?>