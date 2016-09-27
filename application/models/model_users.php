<?php

	class Model_users extends CI_Model {
		
		function __construct() {
			parent::__construct();//Call the model constructor
		}
		
		function getFirstNames() {
			$query = $this->db->query('SELECT firstname FROM users'); //returns an object when ready
		
			if ($query->num_rows() > 0){ //returns true if more than one was found
				return $query->result();//return an arrays of objects
			} else {
			return NULL;
			}
		}	
		
		function getUsers() {
			$query = $this->db->query('SELECT * FROM users'); //returns an object when ready
			
			if ($query->num_rows() > 0){ //returns true if more than one was found
				return $query->result();//return an arrays of objects
			} else {
				return NULL;
			}
		}
	}
	
 ?>
