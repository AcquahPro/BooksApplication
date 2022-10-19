<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Video_model');
        $this->load->model('ClassLevel_model');
        $this->load->helper('url_helper');
    }

    public function index()
	{
		$data['videos'] = $this->Video_model->get_all();
        $this->template->load('template', 'contents' , 'video/videolist', $data);
	}
    
    public function create()
	{
		$this->load->helper('form');
    	$this->load->library('form_validation');
        $data['allclasses'] = $this->ClassLevel_model->getAllClasses();
		$this->template->load('template', 'contents' , 'video/videolist', $data);
	}

    public function save(){
        $this->load->helper('form');
    	$this->load->library('form_validation');
        $data['allclasses'] = $this->ClassLevel_model->getAllClasses();
		$this->form_validation->set_rules('classlevel', 'Classlevel', 'required');
	    $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('videoname', 'Videoname', 'required');
        $this->form_validation->set_rules('medium', 'Medium', 'required');
        $this->form_validation->set_rules('videolink', 'Videolink', 'required');

        if ($this->form_validation->run())
	    {

            $data = [
                'class' => $this->input->post('classlevel'),
                'subject' => $this->input->post('subject'),
                'videoname' => $this->input->post('videoname'),
                'medium' => $this->input->post('medium'),
                'videolink' => $this->input->post('videolink'),
                
            ];

            $this->Video_model->insert($data);
            $this->index();
        }
	    
	    else
	    {
	        $this->template->load('template', 'contents' , 'video/videolist', $data);
	    }	    
	}
    public function delete($id){
		$this->Topper_model->delete($id);
		$this->index();
	}

    public function edit($id){
		$this->load->helper('form');
    	$this->load->library('form_validation');
		$arrData['videoedit'] = $this->Topper_model->getById($id);
        $arrData['allclasses'] = $this->ClassLevel_model->getAllClasses();
		$this->template->load('template', 'contents', 'topper/edittopper', $arrData);

		$this->form_validation->set_rules('classlevel', 'Classlevel', 'required');
	    $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('videoname', 'Videoname', 'required');
        $this->form_validation->set_rules('medium', 'Medium', 'required');
        $this->form_validation->set_rules('videolink', 'Videolink', 'required');

		if ($this->form_validation->run())
	    {
	        
            $data = [
                'class' => $this->input->post('classlevel'),
                'subject' => $this->input->post('subject'),
                'videoname' => $this->input->post('videoname'),
                'medium' => $this->input->post('medium'),
                'videolink' => $this->input->post('videolink'),
            ];

            $this->Video_model->update($id, $data);
            $this->index();
            
	    }
	    else
	    {
	        $this->template->load('template', 'contents', 'topper/edittopper', $arrData);
	    }
	}

}

?>