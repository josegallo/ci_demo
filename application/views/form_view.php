<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php echo doctype('html5') //this avoid to write <!DOCTYPE html>?>
<html lang="en">
<head>
	<title><?php echo $title; ?></title>
	<?php echo link_tag('resources/css/style-example.css'); ?>
</head>
<body>
<div id="container">
	<h2><?php echo $page_header; ?></h2>
	<div id="body">
		<?php 
			if (isset($email) && isset($password)) {
				echo validation_errors();
				echo "Your username is: " . $email. '<br/>';
				echo "Your password is: " . $password. '<br/>';
				echo "Your pasword lenght is: " . $pass_length . '<br/>';
				echo "Form submitted from: " . $url . '<br/>';
			} else {
				echo validation_errors(); 
				echo form_open();
				echo '<label for = "username">Email:</label><br/>' . form_input('email', set_value('email')) . '<br/><br/>';
				echo '<label for = "password">Password:</label><br/>' . form_password('password', '') . '<br/><br/>';
				$url_sent_from = current_url();
				echo form_hidden('url', $url_sent_from);
				echo form_submit('mysubmit', 'Login!');
				echo form_close();
			}
			
		?>	
		
</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>