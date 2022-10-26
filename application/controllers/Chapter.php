<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chapter extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Chapter_model');
        $this->load->model('ClassLevel_model');
        $this->load->helper('url_helper');

        if (!isset($this->session->userdata['loggedIn'])) {
			redirect(base_url()); 
		}
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


        if ($this->form_validation->run() === FALSE)
	    {
			$this->create();
	    }
        else
        {
            $newName = time();
            $config = [
                'upload_path' => '././pdffiles/',
                'allowed_types' => 'pdf',
                'file_name' => $newName
            ];
            $this->load->library('upload', $config);
            
            
            if($this->upload->do_upload('pdffile'))
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
            else
            {
                $data = array('error' => $this->upload->display_errors());
                $data['allclasses'] = $this->ClassLevel_model->getAllClasses();
                $this->template->load('template', 'contents', 'chapter/createchapter', $data);
            }
         
        }
	    
	}



    public function delete($id){
		$deleteData = $this->Chapter_model->delete($id);
		$this->index();
	}

    public function edit($id){
		$this->load->helper('form');
    	$this->load->library('form_validation');
		$arrData['chapterForEdit'] = $this->Chapter_model->getChapterById($id);
        $arrData['allclasses'] = $this->Chapter_model->getAllClasses();
		$this->template->load('template', 'contents', 'chapter/editChapter', $arrData);

		$this->form_validation->set_rules('classlevel', 'Classlevel', 'required');
	    $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('chaptername', 'Chaptername', 'required');
        $this->form_validation->set_rules('medium', 'Medium', 'required');


        if($this->form_validation->run() === FALSE){
            //$this->template->load('template', 'contents', 'paper/editpaper', $arrData);
        }

        else{
                $newName = time();
                $config = [
                    'upload_path' => '././pdffiles/',
                    'allowed_types' => 'pdf',
                    'file_name' => $newName
                ];
                $this->load->library('upload', $config);
                
                if($this->upload->do_upload('pdffile')){
                    $pdfName = $this->upload->data('file_name');

                    $data = [
                        'classlevel' => $this->input->post('classlevel'),
                        'subject' => $this->input->post('subject'),
                        'chaptername' => $this->input->post('chaptername'),
                        'medium' => $this->input->post('medium'),
                        'pdffile' => $pdfName
                    ];
        
                    $this->Chapter_model->update($id, $data);
                    
                    redirect(base_url().'index.php/chapter');  
                }

            else{
                $data = [
                    'classlevel' => $this->input->post('classlevel'),
                    'subject' => $this->input->post('subject'),
                    'chaptername' => $this->input->post('chaptername'),
                    'medium' => $this->input->post('medium')
                ];
    
                $this->Chapter_model->update($id, $data);
                    
                redirect(base_url().'index.php/chapter'); 
            }
            
        }

        
    }

}

?>