$(document).ready(function(){
	console.log('hi');
	$(':text').click(function(){
		current_input_val = $(this).val();//when user click inside the username box current input val = input(text)
		console.log(current_input_val);
		$(this).select(); //selects the text in input box
	}).focusout(function(){ //when focus out the input box
		if($(this).val() == '') { // if no text
			$(this).val(current_input_val); //the value is still the previous one introduced
			console.log(current_input_val);
		} //end of if
	}); //end of $(':text').click.focusout
	
	$(':password').focusin(function(){
		if ($(this).attr("placeholder") !== undefined){ //if there are not placeholder
			$(this).removeAttr('placeholder'); //remove the attribute placeholder
		}
	});
	
	$(':password.password').focusout(function(){ 
		$(this).attr("placeholder", "Password"); //return back the password placeholder when focusout
	});
	
	$(':password.password_confirm').focusout(function(){ 
		$(this).attr("placeholder", "Confirm Password"); //return back the Confirm Password placeholder when focusout
	});
}); //end of document
