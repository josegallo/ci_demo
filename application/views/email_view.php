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
		echo "<h3> a preg_match(pattern, subject) solution first .... </h3>";
		echo "<br> This solution is partially correct:";
		
		function isValidEmailPartiallyCorrectSolution($email)
		{
			return filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/@.+\./', $email);
		}
		$email1 = "josegallo@gmail.com";
		$result1 = isValidEmailPartiallyCorrectSolution($email1) ? 'valid': 'not valid';
		echo "<br>". $email1 ." is " . $result1 . "<br>";
		
		$email2 = "josegallo@josegallo.---";
		$result2 = isValidEmailPartiallyCorrectSolution($email2) ? 'valid': 'not valid';
		echo "<br>". $email2 ." is " . $result2 . "<br>";
		
		$email3 = "josegallo@china.com.marketing";
		$result2 = isValidEmailPartiallyCorrectSolution($email3) ? 'valid': 'not valid';
		echo "<br>". $email3 ." is " . $result2 . "<br>";
		
		echo "<h3> valid_email()</h3>";
		echo "<br> This solution is correct:";
		
		$email1 = "josegallo@gmail.com";
		$result4 = valid_email($email1) ? 'valid': 'not valid';
		echo "<br>". $email1 ." is " . $result4 . "<br>";
		
		$email2 = "josegallo@josegallo.--";
		$result5 = valid_email($email2) ? 'valid': 'not valid';
		echo "<br>". $email2 ." is " . $result5 . "<br>";
		
		$email3 = "josegallo@china.marketing.com";
		$result6 = valid_email($email3) ? 'valid': 'not valid';
		echo "<br>". $email3 ." is " . $result6 . "<br>";
	?>	
	
</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>