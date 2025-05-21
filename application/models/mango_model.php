<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mango_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all_mango_with_pineapple() {
        $this->db->select('mango.id, mango.name, mango.age, pineapple.email');
        $this->db->from('mango');
        $this->db->join('pineapple', 'pineapple.mango_id = mango.id', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function insert_mango_with_pineapple($mango_data, $pineapple_data) {
    // Insert into mango table
    $this->db->insert('mango', $mango_data);
    $mango_id = $this->db->insert_id(); // Get the newly inserted mango ID

    // Insert into pineapple table
    $pineapple_data['mango_id'] = $mango_id;
    $this->db->insert('pineapple', $pineapple_data);
    
    return true;
}
public function get_mango_with_pineapple($id) {
    $this->db->select('mango.id, mango.name, mango.age, pineapple.email');
    $this->db->from('mango');
    $this->db->join('pineapple', 'pineapple.mango_id = mango.id', 'left');
    $this->db->where('mango.id', $id);
    $query = $this->db->get();
    return $query->row();
}

public function update_mango_with_pineapple($id, $mango_data, $pineapple_data) {
    // Update mango table
    $this->db->where('id', $id);
    $this->db->update('mango', $mango_data);

    // Update pineapple table (based on mango_id foreign key)
    $this->db->where('mango_id', $id);
    $this->db->update('pineapple', $pineapple_data);

    return true;
}
public function delete_mango_with_pineapple($id) {
    // First delete pineapple record(s) linked to mango
    $this->db->where('mango_id', $id);
    $this->db->delete('pineapple');

    // Then delete mango record
    $this->db->where('id', $id);
    $this->db->delete('mango');

    return true;
}
public function get_user_by_email($email) {
    $this->db->where('email', $email);
    $query = $this->db->get('pineapple');
    return $query->row();
}

}
