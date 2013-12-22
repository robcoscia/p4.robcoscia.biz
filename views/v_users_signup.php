<div class="container">

	<form class="form-signup" role="form" method='POST' action="/users/p_signup">
		<h2 class="form-signup-heading">Please complete</h2>
		<input type="text" class="form-control" name="first_name" placeholder="First name" required autofocus>
		<input type="text" class="form-control" name="last_name" placeholder="Last name" required >
		<input type="text" class="form-control" name="email" placeholder="Email address" required >
		<input type="password" class="form-control"  id="password" name="password" placeholder="Password" required>
		<input type="password" class="form-control"  id="verifypassword" name="verifypassword" placeholder="Verify password" required>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
		
		<?php if(isset($error)): ?>
			<?php if($error == 1):?>
				<div class="alert alert-danger">Input is Invalid. Please double check your entries.</div>
			<?php elseif($error == 2): ?>
				<div class="alert alert-danger">An account with that email exists. Please Login</div>
			<?php else: ?>
				<div class="alert alert-danger">Internal Error: Please try again</div>
			<?php endif; ?>
		<?php endif; ?>
	</form>

</div> <!-- /container -->




