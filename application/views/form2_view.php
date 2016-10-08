<?php 
//defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo doctype('html5') //this avoid to write <!DOCTYPE html>?>
<html lang="en">
<head>
	<title><?php echo $title; ?></title>
	<?php echo link_tag('resources/style.css'); ?>
</head>
<body>
<div id="container">
	<h2><?php echo $page_header; ?></h2>

	<div id="body">	

		<?php 
		if (isset($success)) {
			//print_r($success);
			foreach ($success as $key => $value) {
				echo $key . ' =>' . $value . '<br>';
			}
		} else {
		echo validation_errors(); //show the errors messages on screen
		
		echo form_fieldset('Email');
		
		$hidden = array ( //Quickest way to add hidden input fields!
					'order_time'		=> date("Y-m-d H:i:s"),
					'current_url'	=> current_url()
		);
		echo form_open('', '', $hidden);//( form action/target URI string, Html atributes(array), $hidden or $hidden = array(hidden fields))
		
		$data = array(
					'name'		=> 'email',
					'id'			=> 'email',
					'placeholder'=> 'Type your email here',
					'maxlength'	=> '100',
					'size'		=> '50',
					'style'		=> 'width:150px',
		);
		echo form_input($data);
		echo form_fieldset_close();
		
		echo br();
		
		echo form_fieldset('Choose your shirt size (dropdown)');
		$options = array(
					'small'		=> 'Small shirt',
					'medium'		=> 'Medium shirt',
					'large'		=> 'Large shirt',
					'xlarge'		=> 'Extra Large Shirt'
		);
		echo form_dropdown('shirt_size', $options, 'small');
		echo form_fieldset_close();
		
		echo br();
		
		echo form_fieldset('What stripes do you want on your shirt? (multi-select)');
		$options = array(
					'value 1'		=>'black stripes',
					'value 2'		=>'red stripes',
					'value 3'		=>'blue stripes',
					'value 4'		=>'green stripes'
			);
	
		echo form_multiselect('stripe_choice[]', $options, array('value 2'));
		echo form_fieldset_close();
		
		echo br();
		
		echo form_fieldset('Terms and Conditions (checkout)');
		echo 'Do you agree to our terms and conditions? ' . form_checkbox('terms', 'accept', FALSE);
		echo form_fieldset_close();
		
		echo br();
		
		echo form_fieldset('Do you want free shipping? (Radio form)');
	
			echo 'Yes ' . form_radio('free_shipping', '1', FALSE); //
			echo 'No '  . form_radio('free_shipping', '1', TRUE);
			
		echo form_fieldset_close();
			
		echo form_submit('mysubmit', 'Submit');
		echo form_close();
		}
		
		?>	
		
</div>
	
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>