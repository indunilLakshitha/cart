<?php
 
 class Register extends CI_Controller{
	
	function __construct(){
	
			parent::__construct();
			$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');


		}


	public function index(){
		
		$this->load->view('components/header');
		$this->load->view('components/homeBanner');
		$this->load->view('components/sidebar');
		$this->load->view('register');
		$this->load->view('components/footer');

	}

	public function signup(){
		$username=$this->input->post('username');
		$firstname=$this->input->post('firstname');
		$lastname=$this->input->post('lastname');
		$email=$this->input->post('email');
		$passsword=$this->input->post('password');
		$mobile=$this->input->post('mobile');

		$this->form_validation->set_rules('firstname','username','required|is_unique[user.username]');
		 
		if($this->form_validation->run()==FALSE){
			// $this->load->helper('url');
			// $this->load->helper('form');
			$this->load->view('components/header');
			$this->load->view('components/homeBanner');
			$this->load->view('components/sidebar');
			$this->load->view('register');
			$this->load->view('components/footer');
		}else{

			$this->load->model('Register_model');
			$data=[
				'username'=>$username,
				'firstname'=>$firstname,
				'lastname'=>$lastname,
				'email'=>$email,
				'password'=>md5($passsword),
				'mobile'=>$mobile,
				'ip'=>"sadsa",

			];

			$last_id=$this->Register_model->signupData($data);
			if($last_id){
				$this->session->set_flashdata('signupSuccess','you have suceddfully registered please login');

				redirect('register');
			}

		
		}
	}
 }
