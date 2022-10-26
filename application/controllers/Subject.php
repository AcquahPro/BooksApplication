<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Subject_model');
        $this->load->helper('url_helper');

		if (!isset($this->session->userdata['loggedIn'])) {
			redirect(base_url()); 
		}
    }

    public function create()
	{
		$data['title'] = 'Create a new Book';
		$this->load->helper('form');
    	$this->load->library('form_validation');
		//$this->load->view('createbook');	
		$this->template->load('template', 'contents' , 'subject/createsubject');
	}

    public function save(){
		$this->load->helper('form');
    	$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required');
	    $this->form_validation->set_rules('subjectcategory', 'Subjectcategory', 'required');

	    if ($this->form_validation->run() === FALSE)
	    {
	        $this->load->view('createsubject');
	    }
	    else
	    {
	        $this->Subject_model->insert();
	        //$this->load->view('index.php/book');
	        redirect('/');
	    }
	}
}

?>