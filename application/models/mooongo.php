<?php
class Mango_model extends CI_Model {

    public function insert_user($data) {
        $this->db->insert('mango', $data);

        if ($this->db->affected_rows() == 0) {
            $error = $this->db->error();
            exit;
        }

        return $this->db->insert_id();
    }

    public function get_user($name) {
        $this->db->where('name', $name);
        return $this->db->get('mango')->row_array();
    }

    public function get_user_by_email_password($email, $password) {
        $this->db->select('mango.id, mango.name');
        $this->db->from('mango');
        $this->db->join('pineapple', 'pineapple.mango_id = mango.id');
        $this->db->where('pineapple.email', $email);
        $this->db->where('pineapple.password', $password);
        return $this->db->get()->row_array();
    }

    public function get_all_users() {
        $this->db->select('mango.id, mango.name, mango.age, pineapple.email');
        $this->db->from('mango');
        $this->db->join('pineapple', 'pineapple.mango_id = mango.id');
        return $this->db->get()->result_array();
    }

    public function get_user_by_id($id) {
        $this->db->select('mango.id, mango.name, mango.age, pineapple.email');
        $this->db->from('mango');
        $this->db->join('pineapple', 'pineapple.mango_id = mango.id');
        $this->db->where('mango.id', $id);
        return $this->db->get()->row_array();
    }

    public function update_user($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('mango', $data);
    }

    public function delete_user($id) {
        $this->db->where('id', $id);
        return $this->db->delete('mango');
    }
}
?>
