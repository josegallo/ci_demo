<div id= "register_form">
	<h1>Create and account!</h1>
	<?php 
		echo form_open('home/create_menber');
		echo form_input('first_name', set_value('first_name', 'First Name	')); //set value, field value and default value
		echo form_input('last_name', set_value('last_name', 'Last Name')); //set value, field name and default name
		echo form_input('email', set_value('email', 'Email Adress'));
		echo form_input('username', set_value('username', 'Username'));
		echo form_password('password', '', 'placeholder = "Password" class = "password"');
		echo form_password('password_confirm', '', 'placeholder = "Confirm Password" class = "password_confirm"');
		echo form_submit('submit', 'Create Member');
	?>
	<?php echo validation_errors('<p class = "error">'); ?>
</div> <!-- end register_form -->
