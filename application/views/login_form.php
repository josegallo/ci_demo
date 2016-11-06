<div id= "login_form">
	<?php if (isset($account_created)) { ?>
		<h3><?php echo $account_created; ?></h3>
	<?php } else {?> 
		<h1>Login, please</h1>
	<?php } ?>
		
	<?php
	echo form_open('home/validate_credentials'); //points to base_url/login/validates_credentails
	//its the same that action = base_url/login/validates_credentials
	//$data = array(
    //    'name'          => 'username',
    //    'placeholder'   => 'username', );
	//echo form_input($data);
	//echo form_input('username', '','placeholder="username"');
	echo form_input('username', 'Username','placeholder="Username" class = username');//(name, value, additional attribrutes)
	echo form_password('password', '', 'placeholder="Password" class = "password"');//(name, value, additional attribrutes)
	echo form_submit('submit', 'Login');
	echo anchor('signup', 'Create Account'); //signup method of home controller
	echo form_close();
	 ?>
</div> <!-- end login_form -->
