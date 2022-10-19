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

                $this->template->load('template', 'contents' , 'syllabus/createsyllabus', $error);
            }
            else
            {
                $pdfName = $this->upload->data('file_name');
                $data = [
                    'class' => $this->input->post('classlevel'),
                    'subject' => $this->input->post('subject'),
                    'syllabusname' => $this->input->post('syllabusname'),
                    'medium' => $this->input->post('medium'),
                    'type' => $this->input->post('type'),
                    'pdffile' => $pdfName
                ];

                $this->Syllabus_model->insert($data);
                $this->index();
            }
	    }
	    else
	    {
	        $this->index();
	    }	    
	}
    public function delete($id){
		$this->Topper_model->delete($id);
		$this->index();
	}

    public function edit($id){
		$this->load->helper('form');
    	$this->load->library('form_validation');
		$arrData['syllabusedit'] = $this->Topper_model->getById($id);
        $arrData['allclasses'] = $this->ClassLevel_model->getAllClasses();
		$this->template->load('template', 'contents', 'syllabus/editsyllabus', $arrData);

		$this->form_validation->set_rules('classlevel', 'Classlevel', 'required');
	    $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('syllabusname', 'syllabusname', 'required');
        $this->form_validation->set_rules('medium', 'Medium', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');

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

                $this->template->load('template', 'contents', 'syllabus/editsyllabus', $error);
            }
            else
            {
                $pdfName = $this->upload->data('file_name');
                $data = [
                    'class' => $this->input->post('classlevel'),
                    'subject' => $this->input->post('subject'),
                    'syllabusname' => $this->input->post('syllabusname'),
                    'medium' => $this->input->post('medium'),
                    'type' => $this->input->post('type'),
                    'pdffile' => $pdfName
                ];

                $this->Syllabus_model->update($id, $data);
                $this->index();
            }
	    }
	    else
	    {
	        $this->template->load('template', 'contents', 'syllabus/editsyllabus', $arrData);
	    }
	}

}

?>