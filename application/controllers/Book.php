<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Book_model');
        $this->load->helper('url_helper');
    }

 	public function index()
	{
		$data['books'] = $this->Book_model->get_all_books();
        $data['title'] = 'All Books';
        $this->load->view('bookslist', $data);
	}

	public function create()
	{
		$data['title'] = 'Create a new Book';
		$this->load->helper('form');
    	$this->load->library('form_validation');
		$this->load->view('createbook');	
	}

	public function saveBook(){
		$this->load->helper('form');
    	$this->load->library('form_validation');
		$this->form_validation->set_rules('class', 'Class', 'required');
	    $this->form_validation->set_rules('subject', 'Subject', 'required');

	    if ($this->form_validation->run() === FALSE)
	    {
	        $this->load->view('createbook');
	    }
	    else
	    {
	        $this->Book_model->insert();
	        $this->load->view('book');
	    }
	}

	public function edit($id){
		$this->load->helper('form');
    	$this->load->library('form_validation');
		$arrData['bookForEdit'] = $this->Book_model->getBookById($id);
		$this->load->view('editBook', $arrData);

		$this->form_validation->set_rules('class', 'Class', 'required');
	    $this->form_validation->set_rules('subject', 'Subject', 'required');

		if($this->form_validation->run()) {
			$class = $this->input->post('class');
			$subject = $this->input->post('subject');

			$UpdateData = $this->Book_model->update($id,$class,$subject);
			if($UpdateData){

				//$this->load->view('bookslist');
				redirect('book');
			}
		}
	}

	public function updateBook($id){
		$this->load->helper('form');
    	$this->load->library('form_validation');
		$this->form_validation->set_rules('class', 'Class', 'required');
	    $this->form_validation->set_rules('subject', 'Subject', 'required');

	    if ($this->form_validation->run() === FALSE)
	    {
	        $this->load->view('editBook');
	    }
	    else
	    {
	        $this->Book_model->update();
	        $this->load->view('bookslist');
	    }
	}

	public function delete($id){
		$deleteData = $this->Book_model->delete($id);
		redirect('book');
	}

}