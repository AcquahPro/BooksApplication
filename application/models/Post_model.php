<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {

    public function __construct() {
        $this->load->database('default');
        $this->load->library('session');
        parent::__construct();
    }

    public function get_all() {
        $this->db->select('*');
        $this->db->from('posts');
        $objQuery = $this->db->get();
        return $objQuery->result_array();
    }

    public function insert($data) {
    
    	return $this->db->insert('posts', $data);
    }

    function delete($id) {

        if ($this->db->delete('posts', array('id' => $id))) {
            return true;
        } else {
            return false;
        }
    }

    public function getById($id) {
        $this->db->select('*');
        $this->db->from('posts');
        $this->db->where('id', $id);
        $objQuery = $this->db->get();
        return $objQuery->result_array();
    }

    public function update($id, $data) {
    	    
        $this->db->where('id', $id);

        if ($this->db->update('posts', $data)) {
            return true;
        } else {
            return false;
        }
    }

    
}

?>