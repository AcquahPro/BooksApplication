<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Note extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Note_model');
        $this->load->model('ClassLevel_model');
        $this->load->helper('url_helper');

        if(!isset($_SESSION['loggedIn'])){
			$this->template->load('authtemplate', 'contents', 'auth/login');
		}
    }

    public function index()
	{
		$data['notes'] = $this->Note_model->get_all();
        $this->template->load('template', 'contents' , 'note/notelist', $data);
	}
    
    public function create()
	{
		$this->load->helper('form');
    	$this->load->library('form_validation');
        $data['allclasses'] = $this->ClassLevel_model->getAllClasses();
		$this->template->load('template', 'contents' , 'note/createnote', $data);
	}

    public function save(){
        $this->load->helper('form');
    	$this->load->library('form_validation');
		$this->form_validation->set_rules('classlevel', 'Classlevel', 'required');
	    $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('notename', 'Notename', 'required');
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
                    'class' => $this->input->post('classlevel'),
                    'subject' => $this->input->post('subject'),
                    'notename' => $this->input->post('notename'),
                    'medium' => $this->input->post('medium'),
                    'pdffile' => $pdfName
                ];

                $this->Note_model->insert($data);
                $this->index();
            }
            else
            {
                $data = array('error' => $this->upload->display_errors());
                $data['allclasses'] = $this->ClassLevel_model->getAllClasses();

                $this->template->load('template', 'contents', 'note/createnote', $data);
            }
   
        }   
        
	}


    public function delete($id){
		$this->Note_model->delete($id);
		$this->index();
	}

    public function edit($id){
		$this->load->helper('form');
    	$this->load->library('form_validation');
		$arrData['notedit'] = $this->Note_model->getById($id);
        $arrData['allclasses'] = $this->ClassLevel_model->getAllClasses();
		$this->template->load('template', 'contents', 'note/editnote', $arrData);

		$this->form_validation->set_rules('classlevel', 'Classlevel', 'required');
	    $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('notename', 'Notename', 'required');
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
                        'class' => $this->input->post('classlevel'),
                        'subject' => $this->input->post('subject'),
                        'notename' => $this->input->post('notename'),
                        'medium' => $this->input->post('medium'),
                        'pdffile' => $pdfName
                    ];
        
                    $this->Note_model->update($id, $data);
                    //$this->index();
                    redirect(base_url().'index.php/Note');
                }

            else{
                $data = [
                    'class' => $this->input->post('classlevel'),
                    'subject' => $this->input->post('subject'),
                    'notename' => $this->input->post('notename'),
                    'medium' => $this->input->post('medium')
                ];
    
                $this->Note_model->update($id, $data);
                //$this->index();
                redirect(base_url().'index.php/Note');
            }
            
        }  
	    
	}

}

?>