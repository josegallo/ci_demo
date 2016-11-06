<?php

	class Model_membership extends CI_Model {
		
		function __construct() {
			parent::__construct();//Call the model constructor
		}
		
		public function validate()
		{	
			$this->db->where('username', $this->input->post('username')); //where username = $username
			$this->db->where('password', md5($this->input->post('password'))); //where password = desencriptyed passwords
			$result = $this->db->get('users'); //select users of previous query
			//recomended to check print_r($query) to check what throughs
			//print_r($result);
			
			if ($result->num_rows()  == 1) {
				return TRUE;
			}
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
			//if the insertion is done $insert = TRUE
			return $insert;
		}
		
		public function check_if_username_exists($username)
		{
			$this->db->where('username', $username); //where username = $username
			$result = $this->db->get('users'); //select users of previous query
			
			if ($result->num_rows() > 0) {
				return FALSE; //username taken
			} else {
				return TRUE; //username can be reg'd
			}
		}
		
		public function check_if_email_exists($email)
		{
			$this->db->where('email', $email); //where email = $email
			$result = $this->db->get('users'); //select users of previous query
			
			if ($result->num_rows() > 0) {
				return FALSE; //username taken
			} else {
				return TRUE; //username can be reg'd
			}
		}
		
	}
	
 ?>
