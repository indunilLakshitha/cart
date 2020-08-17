<?php
 
 class Home extends CI_Controller{

	public function index(){

		$this->load->model('Product_model');
		$FeaturePro=$this->Product_model->getFeatureProduct();
		// print_r($FeaturePro);exit;
		$this->load->helper('url');
		$this->load->view('components/header');
		$this->load->view('components/homeBanner');
		$this->load->view('components/sidebar');
		$this->load->view('home',['featurePro'=>$FeaturePro]);
		$this->load->view('components/footer');
		$this->load->library('session');


	}
 }

