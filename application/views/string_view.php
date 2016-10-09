<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
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
		echo heading('random_string()',3);//works for emails and files not browsers
		
		//random_string()
		// The first parameter specifies the type of string
		// the secondo parameter specifires the length
		echo random_string(); //default random letters and nums, 8 chars long
		echo heading("random_string('alpha'); ", 3);
		echo random_string('alpha'); //random just letters 8 chars
		echo br();
		
		echo heading("random_string('alpha', 200); ", 3); 
		echo random_string('alpha', 200); //	random letters 200 chars
		
		echo heading("random_string('alnum'); ", 3); 
		echo random_string('alnum'); //	random letters and nums 	
		
		echo heading("random_string('numeric'); ", 3); 
		echo random_string('numeric'); //	random nums, has zeros
		
		echo heading("random_string('unique'); ", 3); 
		$string = random_string('unique'); //	32 chars	
		echo $string;
		echo br();
		echo "Length = " . strlen($string);
		
		echo heading("random_string('sha1'); ", 3); 
		$string = random_string('sha1'); //	40 chars
		echo $string;
		echo br();
		echo 'Length '  . strlen($string);
		
		echo heading("alternator()", 3);
		for ($i=0; $i < 9; $i++) { 
			echo alternator('one ','two ');// . '<br>';
		}
		echo br();
		for ($i=0; $i < 10; $i++) { 
			echo alternator('one ','two ');// . '<br>';
		}
			
		//$i is a static variable inside the alternator funcion (you can see it on system>helpers>string_helper.php)
		//static vars are not destroyed after running the function
		//they persist in the function until the end of page execution
		//so in this case it stores the last value on the loop, that's explain the performance
		
		echo heading('repeter()',3); 
		echo repeater('Z', 10); //repeat 10 times Z
		
		echo heading('reduce_multiples()',3);
		$string = "Fred, Bill,,,,,, Joe,,,, Jimmy";
		echo 'orginal string = ' . $string; 
		echo br();
		echo 'output ' . reduce_multiples($string, ",") . '<br>'; //returns without , repetition
		
		echo heading('quotes_to_entities()', 3);
		$string = "Joe's \"dinner\"";
		echo 'orginal string = ' . $string; 
		echo br();
		echo quotes_to_entities($string);//results in "Joe&#39;s &quot;dinner&quot;"
		
		echo heading('reduce_double_slashes()', 3);
		$string = "https:///////www.google.es///////";
		echo 'orginal string = ' . $string; 
		echo br();
		echo reduce_double_slashes($string);//return a normal url: results in "https://www.google.es/"
		?>		
		
</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>