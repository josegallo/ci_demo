<?php

	class Model_membership extends CI_Model {
		
		function __construct() {
			parent::__construct();//Call the model constructor
		}
		
		function create_member() {
			//$username = $this->input->post('username');
			
			$new_member_insert_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')) //md5 to encrypt password
			);
			
			$insert = $this->db->insert('users', $new_member_insert_data); //insert multidimensional array into table users of our db
			return $insert;
		}
	}
	
 ?>
