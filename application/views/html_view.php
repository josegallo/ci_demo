<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php echo doctype('html5')
//this avoid to write <!DOCTYPE html>
?>

<html lang="en">
<head>

	<?php echo meta('description', 'Qillo la descripción')?>

	<?php 
		$meta = array(
			array('name' => 'robots', 'content' => 'no-cache'),
			array('name' => 'keywords', 'content' => 'php, mysql, oop, MVC'),
			array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 
					'type' =>'equiv')
		);
		echo meta($meta);
	?>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo link_tag('resources/style.css'); ?>

</head>
<body>

<div id="container">
	<h2><?php echo $page_header; ?></h2>

	<div id="body">
		<?php 
			echo heading('Heading 3', 3);
			echo heading('Heading 5', 5); 
			echo heading ('Important message', 4, 'class= "important"');
			
			echo nbs(5); //add spaces 
			echo img('http://www.w3schools.com/colors/img_colormap.gif');
			echo br();
			$image_attr = array(
				'src' => 'http://adelapereira.com/wp-content/uploads/2016/09/Cita1440-te-suena-1.jpg', 
				'alt' => 'logo', 
				'height' => '65'	,
				'width' => '65'	,
				'title' => 'Adela',
				'class' => 'picture'
			);
			echo img($image_attr);
			
			$list = array(
				'item1',
				'item2',
				'item3',
				'item4',
			 );
			 
			 $attrs = array(
			 	'class' => 'list' ,
			 	'id' => 'mylist'
			 );
			 
			 echo ul($list, $attrs);
			 
			 $complexList = array(
			 	'item1' => array(
								'item1',
								'item2',
								'item3',
								'item4',
			 			),
			 	'item2' => array(
								'item1',
								'item2',
								'item3',
								'item4',
			 			),
			 	'item3' => array(
								'item1',
								'item2',
								'item3',
								'item1' => array(
									'item1',
									'item2',
									'item3',
									'item4',
				 					)
			 			),
			 );
			
			echo ul($complexList, $attrs);
		?>	
		
</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>