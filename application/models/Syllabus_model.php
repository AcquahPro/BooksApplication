<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Syllabus_model extends CI_Model {

    public function __construct() {
        $this->load->database('default');
        $this->load->library('session');
        parent::__construct();
    }

    public function get_all() {
        $this->db->select('*');
        $this->db->from('syllabusblueprint');
        $objQuery = $this->db->get();
        return $objQuery->result_array();
    }

    public function insert($data) {
    
    	return $this->db->insert('syllabusblueprint', $data);
    }

    function delete($id) {

        if ($this->db->delete('syllabusblueprint', array('id' => $id))) {
            return true;
        } else {
            return false;
        }
    }

    public function getById($id) {
        $this->db->select('*');
        $this->db->from('syllabusblueprint');
        $this->db->where('id', $id);
        $objQuery = $this->db->get();
        return $objQuery->result_array();
    }

    public function update($id, $data) {
    	    
        $this->db->where('id', $id);

        if ($this->db->update('syllabusblueprint', $data)) {
            return true;
        } else {
            return false;
        }
    }

    
}

?>