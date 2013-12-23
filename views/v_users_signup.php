<div class="container">

	<form class="form-signup" role="form" method='POST' action="/users/p_signup" onsubmit="return validateform(this);">
		<h2 class="form-signup-heading">Please complete</h2>
		<input type="text" class="form-control" name="first_name" placeholder="First name" required autofocus>
		<input type="text" class="form-control" name="last_name" placeholder="Last name" required >
		<input type="text" id="email" class="form-control" name="email" placeholder="Email address" required >
		<input type="password" class="form-control"  id="password" name="password" placeholder="Password" data-toggle="tooltip" data-placement="right" title="Password must contain at least one upper case letter, one lower case letter and one number." required>
		<input type="password" class="form-control"  id="verifypassword" name="verifypassword" placeholder="Verify password" required>
		<button class="btn btn-lg btn-primary btn-block" type="submit" >Sign up</button>
		
		<?php if(isset($error)): ?>
			<?php if($error == 1):?>
				<div class="alert alert-danger">Input is Invalid. Please double check your entries.</div>
			<?php elseif($error == 2): ?>
				<div class="alert alert-danger">An account with that email exists. Please Login</div>
			<?php else: ?>
				<div class="alert alert-danger">Internal Error: Please try again</div>
			<?php endif; ?>
		<?php endif; ?>
		
		<div id="invalidInput" class="alert alert-danger"></div>
	</form>

</div> <!-- /container -->




