<?php

class Product_model extends CI_Model{


	function __construct() {
        $this->proTable = 'product';
        $this->custTable = 'users';
        $this->ordTable = 'orders';
        $this->ordItemsTable = 'order_items';
    }


	public function getFeatureProduct(){
	$this->db->where('product_type',1);
	$this->db->limit(4);	
	$res=$this->db->get('product');
	
	return $res->result();

	

	}

	public function productDetails($pid){

		$this->db->where('product_id',$pid);
		$res=$this->db->get('product');
		return $res->row();
	}

	
    public function getRows($id = ''){
        $this->db->select('*');
        $this->db->from($this->proTable);
        $this->db->where('status', '1');
        if($id){
            $this->db->where('product_id', $id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('name', 'asc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        
        return !empty($result)?$result:false;
    }
    
  
    
 
 
    

    public function insertOrder($data){
        if(!array_key_exists("created", $data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified", $data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }
        
        $insert = $this->db->insert($this->ordTable, $data);

        return $insert?$this->db->insert_id():false;
    }
    
   
    public function insertOrderItems($data = array()) {
        
        $insert = $this->db->insert_batch($this->ordItemsTable, $data);

        return $insert?true:false;
    }
}
