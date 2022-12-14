<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookApi extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Book_model');
        $this->load->helper('url_helper');
		$this->load->model('ClassLevel_model');

		// if (!isset($this->session->userdata['loggedIn'])) {
		// 	redirect(base_url()); 
		// }		

    }

 	public function index()
	{
		echo json_encode($this->Book_model->get_all_books());
	}

    public function getbyid($id)
    {
        echo $this->Book_model->getBookById($id);
    }

	public function create()
	{
		$data['title'] = 'Create a new Book';
		$this->load->helper('form');
    	$this->load->library('form_validation');
		$data['allclasses'] = $this->ClassLevel_model->getAllClasses();
		//$this->load->view('createbook');	
		$this->template->load('template', 'contents' , 'book/createbook', $data);
	}

	public function saveBook(){
		$this->load->helper('form');
    	$this->load->library('form_validation');
		$this->form_validation->set_rules('class', 'Class', 'required');
	    $this->form_validation->set_rules('subject', 'Subject', 'required');

	    if ($this->form_validation->run() === FALSE)
	    {
	        //$this->template->load('template', 'contents' , 'book/createbook', $data);
			$this->create();
	    }
	    else
	    {
	        $this->Book_model->insert();
	        $this->template->load('template', 'contents', 'auth/welcome');
	    }
	}

	public function edit($id){
		$this->load->helper('form');
    	$this->load->library('form_validation');
		$arrData['bookForEdit'] = $this->Book_model->getBookById($id);
		$this->template->load('template', 'contents', 'editBook', $arrData);

		$this->form_validation->set_rules('class', 'Class', 'required');
	    $this->form_validation->set_rules('subject', 'Subject', 'required');

		if($this->form_validation->run()) {
			$class = $this->input->post('class');
			$subject = $this->input->post('subject');

			$UpdateData = $this->Book_model->update($id,$class,$subject);
			if($UpdateData){
				redirect(base_url().'index.php/book');				
			}
		}
	}


	public function delete($id){
		$this->Book_model->delete($id);
		redirect(base_url().'index.php/auth/welcome');
	}

}