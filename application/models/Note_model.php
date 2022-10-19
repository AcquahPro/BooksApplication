<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Note_model extends CI_Model {

    public function __construct() {
        $this->load->database('default');
        $this->load->library('session');
        parent::__construct();
    }

    public function get_all() {
        $this->db->select('*');
        $this->db->from('notes');
        $objQuery = $this->db->get();
        return $objQuery->result_array();
    }

    public function insert($data) {
    
    	return $this->db->insert('notes', $data);
    }

    function delete($id) {

        if ($this->db->delete('notes', array('id' => $id))) {
            return true;
        } else {
            return false;
        }
    }

    public function getById($id) {
        $this->db->select('*');
        $this->db->from('notes');
        $this->db->where('id', $id);
        $objQuery = $this->db->get();
        return $objQuery->result_array();
    }

    public function update($id, $data) {
    	    
        $this->db->where('id', $id);

        if ($this->db->update('notes', $data)) {
            return true;
        } else {
            return false;
        }
    }

    
}

?>