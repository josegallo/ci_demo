<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
</head>
<body>

<div id="container">
	<h2><?php echo $page_header; ?></h2>

	<div id="body">
	<?php 
		echo '<h3>element() examples</h3>'; //element function
		$ci_array = array('name' => 'Jose', 'height' => '90kg', 'lang' => 'english');
		//returns Jose
		echo element ('name', $ci_array) . '<br/>';
		//returns Null ('nothing')
		echo element('age', $ci_array) . 'this returning nothing'. '<br/>';
		//specifies what return on the case that nothing is found
		echo element('age', $ci_array, 'not there'). '<br/>';
		
		echo '<h3>random_element() examples</h3>'; //random_element
		$cards  = array( 9,
				10,
				"Jack",
				"Queen",
				"King",
				"Ace"
				);
				
		echo random_element($cards); // random_element function
		
		echo '<h3>elements()</h3>'; //elements( ) function
		
		$new_array = elements(array('name', 'height', 'age'), $ci_array);
		print_r($new_array) . '<br/>'; //convert the array into string and print it
		
		echo '<br/>';
		$value = $new_array['name']; //get the value of key name
		echo $value;
		
		$value = $new_array['name'] ? 'returned true' : 'returned false'; 
		//if name is not null return 'returned true', else return 'returned false'
		echo '<br/>'. $value;
		
		$value = $new_array['age'] ? 'returned true' : 'returned false';
		//if name is not null return 'returned true', else return 'returned false'
		echo '<br/>'. $value;
		
	?>	
	
</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>