<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Syllabus extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Syllabus_model');
        $this->load->model('ClassLevel_model');
        $this->load->helper('url_helper');
    }

    public function index()
	{
		$data['syllabus'] = $this->Syllabus_model->get_all();
        $this->template->load('template', 'contents' , 'syllabus/syllabuslist', $data);
	}
    
    public function create()
	{
		$this->load->helper('form');
    	$this->load->library('form_validation');
        $data['allclasses'] = $this->ClassLevel_model->getAllClasses();
		$this->template->load('template', 'contents' , 'syllabus/createsyllabus', $data);
	}

    public function save(){
        $this->load->helper('form');
    	$this->load->library('form_validation');
		$this->form_validation->set_rules('classlevel', 'Classlevel', 'required');
	    $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('syllabusname', 'syllabusname', 'required');
        $this->form_validation->set_rules('medium', 'Medium', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');

        
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
                    'name' => $this->input->post('syllabusname'),
                    'medium' => $this->input->post('medium'),
                    'type' => $this->input->post('type'),
                    'pdffile' => $pdfName
                ];

                $this->Syllabus_model->insert($data);
                $this->index();
            }
            else
            {
                $error = array('error' => $this->upload->display_errors());
                $error['allclasses'] = $this->ClassLevel_model->getAllClasses();

                $this->template->load('template', 'contents', 'syllabus/createsyllabus', $error);
            }
          
        }

	}


    public function delete($id){
		$this->Syllabus_model->delete($id);
		$this->index();
	}

    public function edit($id){
		$this->load->helper('form');
    	$this->load->library('form_validation');
		$arrData['syllabusedit'] = $this->Syllabus_model->getById($id);
        $arrData['allclasses'] = $this->ClassLevel_model->getAllClasses();
		$this->template->load('template', 'contents', 'syllabus/editsyllabus', $arrData);

		$this->form_validation->set_rules('classlevel', 'Classlevel', 'required');
	    $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('medium', 'Medium', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');

		
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
                        'name' => $this->input->post('name'),
                        'medium' => $this->input->post('medium'),
                        'type' => $this->input->post('type'),
                        'pdffile' => $pdfName
                    ];
    
                    $this->Syllabus_model->update($id, $data);
                    //$this->index(); 
                    redirect(base_url().'index.php/Syllabus'); 
                }

            else{
                $data = [
                    'class' => $this->input->post('classlevel'),
                    'subject' => $this->input->post('subject'),
                    'name' => $this->input->post('name'),
                    'medium' => $this->input->post('medium'),
                    'type' => $this->input->post('type')
                ];

                $this->Syllabus_model->update($id, $data);
                //$this->index();
                redirect(base_url().'index.php/Syllabus'); 
            }
            
        }
	}

}

?>