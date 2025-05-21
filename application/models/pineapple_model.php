<?php
class Pineapple_model extends CI_Model {

    public function insert_profile($data) {
        $this->db->insert('pineapple', $data);

        if ($this->db->affected_rows() == 0) {
            $error = $this->db->error();
            echo "Pineapple insert error: " . $error['message'];
            exit;
        }

        return true;
    }

    public function update_profile($mango_id, $data) {
        
        $this->db->where('mango_id', $mango_id);
        return $this->db->update('pineapple', $data);
    }

    public function delete_profile($mango_id) {
        $this->db->where('mango_id', $mango_id);
        return $this->db->delete('pineapple');
    }

    public function get_profile_by_mango_id($mango_id) {
        $this->db->where('mango_id', $mango_id);
        return $this->db->get('pineapple')->row_array();
    }

    public function get_user_by_email_password($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        return $this->db->get('pineapple')->row_array();
    }
}
?>

