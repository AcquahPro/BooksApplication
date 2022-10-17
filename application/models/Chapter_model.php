<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Chapter_model extends CI_Model {

    public function __construct() {
        $this->load->database('default');
        $this->load->library('session');
        parent::__construct();
    }

    public function get_all_chapters() {
        $this->db->select('*');
        $this->db->from('chapters');
        $objQuery = $this->db->get();
        return $objQuery->result_array();
    }

    public function insert($data) {
        //var_dump($data);die;
    	return $this->db->insert('chapters', $data);
    }



    function delete($id) {

        if ($this->db->delete('chapters', array('chapterId' => $id))) {
            return true;
        } else {
            return false;
        }
    }

    public function getChapterById($id) {
        $this->db->select('*');
        $this->db->from('chapters');
        $this->db->where('chapterId', $id);
        $objQuery = $this->db->get();
        return $objQuery->result_array();
    }

    public function getAllClasses(){
        $this->db->select('*');
        $this->db->from('classlevel');
        $allclasses = $this->db->get();
        return $allclasses->result_array();
    }
    
    public function getSubjectsByClass($classlevel){
        //$classlevel = "Class 1";
        $this->db->select('subjectCategory');
        $this->db->from('classlevel');
        $this->db->where('name', $classlevel);
        $subCat = $this->db->get()->result_array();
   
        $s = $subCat[0]["subjectCategory"];
        //$s = array_shift($subCat);
        //$s = "volvo";
        //echo($s);die;
        $this->db->select('*');
        $this->db->from('subjects');
        $this->db->where('subjectCategory', $s);
        $subjbyclass = $this->db->get()->result_array();
        //var_dump($subjbyclass->result_array());die;
        //return $subjbyclass;

        $output = '<option value="">Select Subject</option>';
        foreach ($subjbyclass as $row) {
            echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
            //$output = '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
            
            //echo $output;
        }
        return $output;
    }

    public function update($id, $data) {
    	    
        $this->db->where('chapterId', $id);

        if ($this->db->update('chapters', $data)) {
            return true;
        } else {
            return false;
        }
    }

    
}

?>