<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ImportantQuestion extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('ImportantQuestion_model');
        $this->load->model('ClassLevel_model');
        $this->load->helper('url_helper');
    }

    public function index()
	{
		$data['importantquestions'] = $this->ImportantQuestion_model->get_all();
        $this->template->load('template', 'contents' , 'import_ques/import_queslist', $data);
	}
    
    public function create()
	{
		//$data['title'] = 'Create a new Book';
		$this->load->helper('form');
    	$this->load->library('form_validation');
        $data['allclasses'] = $this->ClassLevel_model->getAllClasses();
		//$this->load->view('createbook');	
		$this->template->load('template', 'contents' , 'import_ques/createimportantquestion', $data);
	}

    public function save(){
        $this->load->helper('form');
    	$this->load->library('form_validation');
		$this->form_validation->set_rules('classlevel', 'Classlevel', 'required');
	    $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('questionname', 'Questionname', 'required');
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
                    'questionname' => $this->input->post('questionname'),
                    'medium' => $this->input->post('medium'),
                    'pdffile' => $pdfName
                ];

                $this->ImportantQuestion_model->insert($data);
                $this->index();
            }
            else
            {
                $data = array('error' => $this->upload->display_errors());
                $data['allclasses'] = $this->ClassLevel_model->getAllClasses();

                $this->template->load('template', 'contents', 'import_ques/createimportantquestion', $data);
            }       
            
        }
      
	}

    public function delete($id){
		$this->ImportantQuestion_model->delete($id);
		$this->index();
	}

    public function edit($id){
		$this->load->helper('form');
    	$this->load->library('form_validation');
		$arrData['questionForEdit'] = $this->ImportantQuestion_model->getById($id);
        $arrData['allclasses'] = $this->ClassLevel_model->getAllClasses();
		$this->template->load('template', 'contents', 'import_ques/editimportantquestion', $arrData);

		$this->form_validation->set_rules('classlevel', 'Classlevel', 'required');
	    $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('questionname', 'Questionname', 'required');
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
                        'questionname' => $this->input->post('questionname'),
                        'medium' => $this->input->post('medium'),
                        'pdffile' => $pdfName
                    ];
        
                    $this->ImportantQuestion_model->update($id, $data);
                    
                    redirect(base_url().'index.php/importantquestion'); 
                }

            else{
                $data = [
                    'class' => $this->input->post('classlevel'),
                    'subject' => $this->input->post('subject'),
                    'questionname' => $this->input->post('questionname'),
                    'medium' => $this->input->post('medium')
                    
                ];
    
                $this->ImportantQuestion_model->update($id, $data);
                
                redirect(base_url().'index.php/importantquestion');  
            }
            
        }



		if(isset($_FILES['pdffile'])){
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

                $this->template->load('template', 'contents', 'import_ques/createimportantquestion', $error);
            }


        }
	    if($this->form_validation->run()){
            $pdfName = $this->upload->data('file_name');
            $data = [
                'class' => $this->input->post('classlevel'),
                'subject' => $this->input->post('subject'),
                'questionname' => $this->input->post('questionname'),
                'medium' => $this->input->post('medium'),
                'pdffile' => $pdfName
            ];

            $this->ImportantQuestion_model->update($id, $data);
            
            redirect(base_url().'index.php/importantquestion'); 

        }
	}

}

?>