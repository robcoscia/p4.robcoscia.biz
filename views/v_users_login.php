<div class="container">

	<form class="form-signin" role="form" method='POST' action="/users/p_login">
		<h2 class="form-signin-heading">Please sign in</h2>
		<input type="text" class="form-control" name="email" placeholder="Email address" required autofocus>
		<input type="password" class="form-control" name="password" placeholder="Password" required>
		<label class="checkbox">
		  	<input type="checkbox" value="remember-me"> Remember me
		</label>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		
		<?php if(isset($error)): ?>
			<?php if($error == 1):?>
				<div class="alert alert-danger">Login failed. Please double check your email and password.</div>
			<?php elseif($error == 2): ?>
				<div class="alert alert-danger">An account with that email exists. Please Login</div>
			<?php else: ?>
				<div class="alert alert-danger">Internal Error: Please try again</div>
			<?php endif; ?>
		<?php endif; ?>
	</form>
	
</div> <!-- /container -->

