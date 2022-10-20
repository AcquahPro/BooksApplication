<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paper extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Paper_model');
        $this->load->model('ClassLevel_model');
        $this->load->helper('url_helper');
    }

    public function index()
	{
		$data['papers'] = $this->Paper_model->get_all();
        $this->template->load('template', 'contents' , 'paper/paperlist', $data);
	}
    
    public function create()
	{
		$this->load->helper('form');
    	$this->load->library('form_validation');
        $data['allclasses'] = $this->ClassLevel_model->getAllClasses();
		$this->template->load('template', 'contents' , 'paper/createpaper', $data);
	}

    public function save(){
        
        $this->load->helper('form');
    	$this->load->library('form_validation');
		$this->form_validation->set_rules('classlevel', 'Classlevel', 'required');
	    $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('papername', 'Papername', 'required');
        $this->form_validation->set_rules('medium', 'Medium', 'required');
        $this->form_validation->set_rules('year', 'Year', 'required');
        $this->form_validation->set_rules('types', 'Type', 'required');
        
        if ($this->form_validation->run() === FALSE)
	    {
			$this->create();
	    }
        else
        {
            //$ori_filename = $_FILES['pdffile']['name'];
            //$newName = time()."".str_replace(' ','-',$ori_filename);
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
                    'papername' => $this->input->post('papername'),
                    'medium' => $this->input->post('medium'),
                    'year' => $this->input->post('year'),
                    'type' => $this->input->post('types'),
                    'pdffile' => $pdfName
                ];
                
                $this->Paper_model->insert($data);
                $this->index();
            }
            else
            {
                $data = array('error' => $this->upload->display_errors());
                $data['allclasses'] = $this->ClassLevel_model->getAllClasses();

                $this->template->load('template', 'contents', 'paper/createpaper', $data);
            }

        
            
        }
  
        
    }


    public function delete($id){
		$this->Paper_model->delete($id);
		$this->index();
	}

    public function edit($id){
		$this->load->helper('form');
    	$this->load->library('form_validation');
		$arrData['paperedit'] = $this->Paper_model->getById($id);
        $arrData['allclasses'] = $this->ClassLevel_model->getAllClasses();
		$this->template->load('template', 'contents', 'paper/editpaper', $arrData);

		$this->form_validation->set_rules('classlevel', 'Classlevel', 'required');
	    $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('papername', 'Papername', 'required');
        $this->form_validation->set_rules('medium', 'Medium', 'required');
        $this->form_validation->set_rules('year', 'Year', 'required');
        $this->form_validation->set_rules('types', 'Type', 'required');

        if($this->form_validation->run() === FALSE){
            //$this->template->load('template', 'contents', 'paper/editpaper', $arrData);
        }

        else{
           
                //$ori_filename = $_FILES['pdffile']['name'];
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
                        'papername' => $this->input->post('papername'),
                        'medium' => $this->input->post('medium'),
                        'year' => $this->input->post('year'),
                        'type' => $this->input->post('types'),
                        'pdffile' => $pdfName
                    ];
        
                    $this->Paper_model->update($id, $data);
                    redirect(base_url().'index.php/Paper'); 
                }

            else{
                $data = [
                    'class' => $this->input->post('classlevel'),
                    'subject' => $this->input->post('subject'),
                    'papername' => $this->input->post('papername'),
                    'medium' => $this->input->post('medium'),
                    'year' => $this->input->post('year'),
                    'type' => $this->input->post('types')
                ];
    
                $this->Paper_model->update($id, $data);
                redirect(base_url().'index.php/Paper'); 
            }
            
        }

	    
	}

}

?>