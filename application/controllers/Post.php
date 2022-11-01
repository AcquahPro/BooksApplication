<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Post_model');
        $this->load->helper('url_helper');

        if (!isset($this->session->userdata['loggedIn'])) {
			redirect(base_url()); 
		}
    }

    public function index()
	{
		$data['posts'] = $this->Post_model->get_all();
        $this->template->load('template', 'contents' , 'post/postlist', $data);
	}
    
    public function create()
	{
		$this->load->helper('form');
    	$this->load->library('form_validation');
		$this->template->load('template', 'contents' , 'post/createpost');
	}

    public function save(){
        $this->load->helper('form');
    	$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Post Name', 'required');
	    $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('posturl', 'post url', 'required');


        
        if ($this->form_validation->run() === FALSE)
	    {
			$this->create();
	    }
        else
        {
            $data = [
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),   
                'posturl' => $this->input->post('posturl')            
            ];

            $this->Post_model->insert($data);
            $this->index();
            
        }
	}


    public function delete($id){
		$this->Post_model->delete($id);
		$this->index();
	}

    public function edit($id){
		$this->load->helper('form');
    	$this->load->library('form_validation');
		$arrData['postedit'] = $this->Post_model->getById($id);

		$this->template->load('template', 'contents', 'post/editpost', $arrData);

        $this->form_validation->set_rules('name', 'Post Name', 'required');
	    $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('posturl', 'post url', 'required');


        if($this->form_validation->run() === FALSE){
            //$this->template->load('template', 'contents', 'paper/editpaper', $arrData);
        }

        else{
           
             
            $data = [
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),   
                'posturl' => $this->input->post('posturl')            
            ];

                  

            $this->Post_model->update($id, $data);
            redirect(base_url().'Post'); 
            
            
        }

    }

}

?>