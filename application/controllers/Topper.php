<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topper extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Topper_model');
        $this->load->model('ClassLevel_model');
        $this->load->helper('url_helper');
    }

    public function index()
	{
		$data['toppers'] = $this->Topper_model->get_all();
        $this->template->load('template', 'contents' , 'topper/topperlist', $data);
	}
    
    public function create()
	{
		$this->load->helper('form');
    	$this->load->library('form_validation');
        $data['allclasses'] = $this->ClassLevel_model->getAllClasses();
		$this->template->load('template', 'contents' , 'topper/createtopper', $data);
	}

    public function save(){
        $this->load->helper('form');
    	$this->load->library('form_validation');
		$this->form_validation->set_rules('classlevel', 'Classlevel', 'required');
	    $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('toppername', 'toppername', 'required');
        $this->form_validation->set_rules('medium', 'Medium', 'required');
        $this->form_validation->set_rules('year', 'Year', 'required');


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
                    'toppername' => $this->input->post('toppername'),
                    'medium' => $this->input->post('medium'),
                    'year' => $this->input->post('year'),
                    'pdffile' => $pdfName
                ];

                $this->Topper_model->insert($data);
                $this->index();
            }
            else
            {
                $data = array('error' => $this->upload->display_errors());
                $data['allclasses'] = $this->ClassLevel_model->getAllClasses();

                $this->template->load('template', 'contents', 'topper/createtopper', $data);
            }
          
        }

	}


    public function delete($id){
		$this->Topper_model->delete($id);
		$this->index();
	}

    public function edit($id){
		$this->load->helper('form');
    	$this->load->library('form_validation');
		$arrData['topperedit'] = $this->Topper_model->getById($id);
        $arrData['allclasses'] = $this->ClassLevel_model->getAllClasses();
		$this->template->load('template', 'contents', 'topper/edittopper', $arrData);

		$this->form_validation->set_rules('classlevel', 'Classlevel', 'required');
	    $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('toppername', 'toppername', 'required');
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
                        'toppername' => $this->input->post('toppername'),
                        'medium' => $this->input->post('medium'),
                        'year' => $this->input->post('year'),
                        'pdffile' => $pdfName
                    ];
    
                    $this->Topper_model->update($id, $data);
                    //$this->index();
                    redirect(base_url().'index.php/topper'); 
                }

            else{
                $data = [
                    'class' => $this->input->post('classlevel'),
                    'subject' => $this->input->post('subject'),
                    'toppername' => $this->input->post('toppername'),
                    'medium' => $this->input->post('medium'),
                    'year' => $this->input->post('year')
                ];

                $this->Topper_model->update($id, $data);
                //$this->index();
                redirect(base_url().'index.php/Topper'); 
            }
            
        }
        
	}

}

?>