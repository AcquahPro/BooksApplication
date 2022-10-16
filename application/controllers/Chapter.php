<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chapter extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Chapter_model');
        $this->load->helper('url_helper');
    }

    public function index()
	{
		$data['chapters'] = $this->Chapter_model->get_all_chapters();
        //$data['title'] = 'All Books';
        //$this->load->view('bookslist', $data);
        $this->template->load('template', 'contents' , 'chapter/chapterlist', $data);
	}
    
    public function create()
	{
		//$data['title'] = 'Create a new Book';
		$this->load->helper('form');
    	$this->load->library('form_validation');
        $data['allclasses'] = $this->Chapter_model->getAllClasses();
		//$this->load->view('createbook');	
		$this->template->load('template', 'contents' , 'chapter/createchapter', $data);
	}

    public function save(){
        $this->load->helper('form');
    	$this->load->library('form_validation');
		$this->form_validation->set_rules('classlevel', 'Classlevel', 'required');
	    $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('chaptername', 'Chaptername', 'required');
        $this->form_validation->set_rules('medium', 'Medium', 'required');

        if ($this->form_validation->run())
	    {
	        $ori_filename = $_FILES['pdffile']['name'];
            $newName = time()."".str_replace(' ','-',$ori_filename);
            $config = [
                'upload_path' => '././pdffiles/',
                'allowed_types' => 'pdf',
                'file_name' => $newName
            ];
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('pdffile'))
            {
                $error = array('error' => $this->upload->display_errors());

                $this->template->load('template', 'contents' , 'chapter/createchapter', $error);
            }
            else
            {
                $pdfName = $this->upload->data('file_name');
                $data = [
                    'classlevel' => $this->input->post('classlevel'),
                    'subject' => $this->input->post('subject'),
                    'chaptername' => $this->input->post('chaptername'),
                    'medium' => $this->input->post('medium'),
                    'pdffile' => $pdfName
                ];

                $this->Chapter_model->insert($data);
                $this->index();
            }
	    }
	    else
	    {
	        //$this->Subject_model->insert();
	        //$this->load->view('index.php/book');
	        $this->create();
	    }	    
	}
    public function delete($id){
		$deleteData = $this->Chapter_model->delete($id);
		$this->index();
	}

    //uncompleated
    public function edit($id){
		$this->load->helper('form');
    	$this->load->library('form_validation');
		$arrData['chapterForEdit'] = $this->Chapter_model->getChapterById($id);
		$this->template->load('template', 'contents', 'editChapter', $arrData);

		$this->form_validation->set_rules('class', 'Class', 'required');
	    $this->form_validation->set_rules('subject', 'Subject', 'required');

		if($this->form_validation->run()) {
			$class = $this->input->post('class');
			$subject = $this->input->post('subject');

			$UpdateData = $this->Book_model->update($id,$class,$subject);
			if($UpdateData){

				//$this->load->view('bookslist');
				redirect('/');
			}
		}
	}

    public function getallclasses() {
        $data['allclasses'] = $this->Chapter_model->getAllClasses();
        //var_dump($data['allclasses']);die;
    }

}

?>