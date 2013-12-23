function validateform(signUpForm) {
	
	if(VerifyEmail(signUpForm.email.value))
	{
		$('#invalidInput').css("visibility", "hidden");
	}
	else
	{
		$('#invalidInput').html("The Email address is invalid.");
		$('#invalidInput').css("visibility", "visible");
		return false;
	}

	if(VerifyPassword(signUpForm.password.value))
	{
		$('#invalidInput').css("visibility", "hidden");
	}
	else
	{
		$('#invalidInput').html("Password must contain at least one upper case letter, one lower case letter and one number.");
		$('#invalidInput').css("visibility", "visible");
		return false;
	}	
	
	if (signUpForm.password.value !== signUpForm.verifypassword.value) {
		$('#invalidInput').html("The Passwords do not match.");
		$('#invalidInput').css("visibility", "visible");
		return false;
	}
	
			
	return true;
}