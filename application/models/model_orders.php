<?php
	class Model_orders extends CI_Model {
		
	function __construct()
		{
			parent::__construct(); //Call the Model Constructor
		}
	function insert_order($order) // the order array gets passed in
	{
		//following will return TRUE on successful insert
		
		//insert_string() creates a sql: 
		//INSERT INTO orders (id, email, order_time, shirt_size, stripe_choice, free_shipping)
		//VALUES (NULL, 'anthony@...', 'datatime var', 'large', stripes_var','1')
		//Values are automatically escaped, producing safer queries.
		
		$sql = $this->db->insert_string('orders', $order); //'orders' = name of the bbdd table, $order y the array of date to pass in
		$query = $this->db->query($sql);
		if ($query==TRUE) {
			return TRUE;
		} else {
			$last_query = $this->db->last_query();
			return $last_query;
		}
	}
	
	}
	
?>
