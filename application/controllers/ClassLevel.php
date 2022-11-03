<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClassLevel extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('ClassLevel_model');
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
		$this->template->load('template', 'contents' , 'classlevel/createclass');
	}

    public function save(){
		$this->load->helper('form');
    	$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required');
	    $this->form_validation->set_rules('subjectcategory', 'Subjectcategory', 'required');

	    if ($this->form_validation->run() === FALSE)
	    {
	        $this->load->view('createclass');
	    }
	    else
	    {
	        $this->ClassLevel_model->insert();
	        //$this->load->view('index.php/book');
	        redirect('/');
	    }
	}

	public function getSubjectsByClass()
	{
        
        $c = $_REQUEST['q'];
		
	$newstr = str_replace('%', ' ', $c);
	$nclass = substr($newstr, 0, -2);
        $this->ClassLevel_model->getSubjectsByClassFromBooks($nclass);
	}
}

?>
