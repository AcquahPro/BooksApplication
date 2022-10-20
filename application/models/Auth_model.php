<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function __construct() {
        $this->load->database('default');
        $this->load->library('session');
        parent::__construct();
    }

    public function insert() {
    	$this->load->helper('url');

	    $data = array(
	        'username' => $this->input->post('username'),
	        'password' => $this->input->post('password')
	    );

	    return $this->db->insert('users', $data);
    }

    public function login($username, $password) {
        $q = $this->db->where('username', $username)->where('password', $password)->get('users');
        return $q->result();

    }
}

?>