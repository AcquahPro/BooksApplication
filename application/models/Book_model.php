<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Book_model extends CI_Model {

    public function __construct() {
        $this->load->database('default');
        $this->load->library('session');
        parent::__construct();
    }

    public function get_all_books() {
        $this->db->select('*');
        $this->db->from('books');
        $objQuery = $this->db->get();
        return $objQuery->result_array();
    }

    public function insert() {
    	$this->load->helper('url');

	    //$slug = url_title($this->input->post('title'), 'dash', TRUE);

	    $data = array(
	        'class' => $this->input->post('class'),
	        //'slug' => $slug,
	        'subject' => $this->input->post('subject')
	    );

	    return $this->db->insert('books', $data);



        // if ($this->db->insert('books', $arrData)) {
        //     return true;
        // } else {
        //     return false;
        // }
    }



    function delete($id) {

        if ($this->db->delete('books', array('bookId' => $id))) {
            return true;
        } else {
            return false;
        }
    }

    public function getBookById($id) {
        $this->db->select('*');
        $this->db->from('books');
        $this->db->where('bookId', $id);
        $objQuery = $this->db->get();
        return $objQuery->result_array();
    }

    

    public function update($id,$class,$subject) {
    	// $data = array(
	    //     'class' => $this->input->post('class'),
	    //     //'slug' => $slug,
	    //     'subject' => $this->input->post('subject')
	    // );

    	
	    $data['class'] = $class;
	    $data['subject'] = $subject;
	    
        	$this->db->where('bookId', $id);

        if ($this->db->update('books', $data)) {
            return true;
        } else {
            return false;
        }
    }
}

?>