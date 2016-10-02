<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php echo doctype('html5')
//this avoid to write <!DOCTYPE html>
?>

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
		echo "method site_url(): " . site_url(). '<br/>'; 
		echo "method site_url(controller/method/params): " .site_url('home/mail_example') . '<br/>';
		$segments = array('controller','function','param1' ); 
		echo 'site_url($segments = array()): ' . site_url($segments).  '<br/>'; 
		
		echo 'base_url() = ' . base_url() .  '<br/>'; 
		echo "base_url('images/icons/edit.png') = " . base_url('images/icons/edit.png') .  '<br/>'; 
		
		echo "Current URL = " . current_url().  '<br/>'; 
		echo "URI string = " .uri_string() .'<br/>'; //returns whatever follows the base url
		
		$segments2 = array('home','html_example' );
		echo anchor($segments2, 'HTML example link', 'rel = "nofollow"').'<br/>'; //1st argument is the array, 2nd is the anchor text, 3rd is the attribute
		?>	
		
</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>