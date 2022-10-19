<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Paper_model extends CI_Model {

    public function __construct() {
        $this->load->database('default');
        $this->load->library('session');
        parent::__construct();
    }

    public function get_all() {
        $this->db->select('*');
        $this->db->from('papers');
        $objQuery = $this->db->get();
        return $objQuery->result_array();
    }

    public function insert($data) {
    
    	return $this->db->insert('papers', $data);
    }

    function delete($id) {

        if ($this->db->delete('papers', array('id' => $id))) {
            return true;
        } else {
            return false;
        }
    }

    public function getById($id) {
        $this->db->select('*');
        $this->db->from('papers');
        $this->db->where('id', $id);
        $objQuery = $this->db->get();
        return $objQuery->result_array();
    }

    public function update($id, $data) {
    	    
        $this->db->where('id', $id);

        if ($this->db->update('papers', $data)) {
            return true;
        } else {
            return false;
        }
    }

    
}

?>