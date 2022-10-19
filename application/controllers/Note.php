<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Note extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Note_model');
        $this->load->model('ClassLevel_model');
        $this->load->helper('url_helper');
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

                $this->template->load('template', 'contents' , 'note/createnote', $error);
            }
            else
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
	    }
	    else
	    {
	        $this->index();
	    }	    
	}
    public function delete($id){
		$deleteData = $this->Note_model->delete($id);
		$this->index();
	}

    //check
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

                $this->template->load('template', 'contents', 'note/createnote', $error);
            }


        }
	    if($this->form_validation->run()){
            $pdfName = $this->upload->data('file_name');
            $data = [
                'class' => $this->input->post('classlevel'),
                'subject' => $this->input->post('subject'),
                'notename' => $this->input->post('notename'),
                'medium' => $this->input->post('medium'),
                //'pdffile' => $pdfName
            ];

            $this->Note_model->update($id, $data);
            //$this->index();
            redirect(base_url().'index.php/Note'); 

        }

        
	    
	}

}

?>