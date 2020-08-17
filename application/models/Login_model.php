<?php

class Login_model extends CI_Model{

	public function login($uname,$pwd){
		
		$this->db->where('username',$uname);
		$this->db->where('password',$pwd);
		$res=$this->db->get('user');
		return $res->num_rows();
		

		

	}
}

