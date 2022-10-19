<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ImportantQuestion_model extends CI_Model {

    public function __construct() {
        $this->load->database('default');
        $this->load->library('session');
        parent::__construct();
    }

    public function get_all() {
        $this->db->select('*');
        $this->db->from('importantquestions');
        $objQuery = $this->db->get();
        return $objQuery->result_array();
    }

    public function insert($data) {
    
    	return $this->db->insert('importantquestions', $data);
    }



    function delete($id) {

        if ($this->db->delete('importantquestions', array('id' => $id))) {
            return true;
        } else {
            return false;
        }
    }

    public function getById($id) {
        $this->db->select('*');
        $this->db->from('importantquestions');
        $this->db->where('id', $id);
        $objQuery = $this->db->get();
        return $objQuery->result_array();
    }

    public function update($id, $data) {
    	    
        $this->db->where('id', $id);

        if ($this->db->update('importantquestions', $data)) {
            return true;
        } else {
            return false;
        }
    }

    
}

?>