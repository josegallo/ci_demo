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
		echo heading('word_limiter()',3);
		$string = "Here is a nice text string consisting of eleven words.";
		$string = word_limiter($string,5); //truncates a string into the number of words specified
		echo $string;// Returns:  Here is a nice string
	
		echo heading('character_limiter()',3);
		$string = "Here is a nice text string consisting of eleven words.";
		$string = character_limiter($string, 32);//Truncates a string to the number of characters specified. It maintains the integrity of words 
		// Returns:  Here is a nice text string consis
		echo $string;
		
		echo heading('word_censor()',3);
		$disallowed = array('joputa', 'bastardo', 'polla', 'darn', 'shucks', 'golly', 'phooey');
		$string = "Eres un joputa and you shucks";
		$string = word_censor($string, $disallowed, 'Beep!');
		echo $string;
		
		echo heading('highlight_phrase()',3);
		$string = "Here is a nice text string about nothing in particular.";
		echo highlight_phrase($string, "nice text", '<span style="color:#990000;">', '</span>');
		
		echo heading('word_wrap()',3);//works for emails and files not browsers
		$string = "Here is a simple string of text that will help us demonstrate this function.";
		echo word_wrap($string, 100);
		
		// Would produce:
		// Here is a simple string
		// of text that will help us
		// demonstrate this
		// function.
		
		echo heading('ellipsize()',3);
		$str = 'this_string_is_entirely_too_long_and_might_break_my_design.jpg';
		echo ellipsize($str, 32, 0.6);
		
		echo heading('star_censor()',3);
		$disallowed = array('joputa', 'bastardo', 'polla', 'darn', 'shucks', 'golly', 'phooey');
		$string = "Eres un joputa and you shucks";
		
		$string = word_censor($string, $disallowed);
		echo $string;
				
		?>	
		
</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>