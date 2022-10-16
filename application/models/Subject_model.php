<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subject_model extends CI_Model {

    public function __construct() {
        $this->load->database('default');
        $this->load->library('session');
        parent::__construct();
    }

    public function insert() {
    	$this->load->helper('url');
	    $data = array(
	        'name' => $this->input->post('name'),
	        //'slug' => $slug,
	        'subjectCategory' => $this->input->post('subjectcategory')
	    );

	    return $this->db->insert('subjects', $data);

    }
}

?>