<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->helper('url_helper');
        $this->load->library('session');
        
    }

 	public function index()
	{
        $this->load->helper('form');
        $this->template->load('authtemplate', 'contents', 'auth/login');
	}

    public function welcome(){
		if(isset($_SESSION['loggedIn'])){
            //echo "loggedin";die;
			$this->template->load('template', 'contents', 'auth/welcome');
		}
        else{
            //echo "NOT loggedin";die;
            $this->login();
        }
    }

    public function login(){
        $this->load->helper('form');
    	$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
	    $this->form_validation->set_rules('password', 'password', 'trim|required');

        if ($this->form_validation->run() === FALSE)
	    {
			$this->index();
	    }
        else{

            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $result = $this->Auth_model->login($username, $password);

            if(count($result)>0){
                $newdata  = array('id'=>$result[0]->id, 'username'=>$result[0]->username, 'logged_in' => TRUE);

                //$this->session->set_userdata('loggedIn', $newdata);
                $this->session->set_userdata('loggedIn',TRUE);

                $this->welcome();

            }
            else{
                $this->index();
            }
            
        }


    }


    public function register(){
        $this->load->helper('form');
        if(isset($_SESSION['loggedIn'])){
			$this->template->load('template', 'contents', 'auth/register');
		}
        else{
            $this->login();
        }
    }

    public function adduser(){
        $this->load->helper('form');
    	$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
	    $this->form_validation->set_rules('password', 'password', 'trim|required');

        if ($this->form_validation->run() === FALSE)
	    {
			$this->index();
	    }
        else{

            $data = [
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            ];

            $this->Auth_model->insert($data);

            $this->index();
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        $this->index();
    }


}