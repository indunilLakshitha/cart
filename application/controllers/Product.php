<?php
class Product extends CI_Controller{


	function  __construct(){
        parent::__construct();
        
        $this->load->library('cart');
        $this->load->model('Product_model');
    }

	public function productDetails(){

		$pid=$this->input->get('pid');

		$this->load->model('Product_model');
		$productDetailsData=$this->Product_model->productDetails($pid);
		$this->load->helper('url');

		$this->load->view('components/header');
		$this->load->view('components/homeBanner');
		// $this->load->view('components/sidebar');
		$this->load->view('product/productDetails',['proDetails'=>$productDetailsData]);
		$this->load->view('components/footer');

	}

	
    function addToCart($proID){
        
        $product = $this->Product_model->getRows($proID);
        // return $product;
        $data = array(
            'id'    => $product['product_id'],
            'qty'    => 1,
            'price'    => $product['product_price'],
            'name'    => $product['product_name'],
            'image' => $product['product_image']
        );
        $this->cart->insert($data);
        
        return $data;
    }

}
