<?php
class users_controller extends base_controller {

	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		parent::__construct();
	}


	/*-------------------------------------------------------------------------------------------------
		Allows user to login 
	-------------------------------------------------------------------------------------------------*/
	public function login($error = NULL) {

		# First, set the content of the template with a view file
		$this->template->content = View::instance('v_users_login');

		$client_files_head = array("/css/users_login.css");
		$this->template->client_files_head = Utils::load_client_files($client_files_head);

		$client_files_body = array("/js/ElementValidation.js", "/js/login.js");
		$this->template->client_files_body = Utils::load_client_files($client_files_body);

		# Now set the <title> tag
		$this->template->title = "Login";

		# Pass data to the view
		$this->template->content->error = $error;

		# Render the view
		echo $this->template;

	} # End of method


	/*-------------------------------------------------------------------------------------------------
	 Process a post from login page
	-------------------------------------------------------------------------------------------------*/
	public function p_login() {
		#Validation
		$validRequest = true;
		if(!isset($_POST['email'])){
			$validRequest = false;
		}
		if(!isset($_POST['password'])){
			$validRequest = false;
		}

		if(!$validRequest)
		{
			Router::redirect('/users/signup');
		}


		# Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);

		# Hash submitted password so we can compare it against one in the db
		$_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

		# Search the db for this email and password
		# Retrieve the token if it's available
		$q = "SELECT token
	        FROM users
	        WHERE email = '".$_POST['email']."'
	        AND password = '".$_POST['password']."'";

		$token = DB::instance(DB_NAME)->select_field($q);

		# If we didn't find a matching token in the database, it means login failed
		if(!$token) {
			# Send them back to the login page
			Router::redirect("/users/login/1");

			# But if we did, login succeeded!
		} else {
			# Store this token in a cookie
			setcookie("token", $token, strtotime('+1 year'), '/');

			# Send them to the main page
			Router::redirect("/");
		}

	} # End of method


	/*-------------------------------------------------------------------------------------------------
		Deactivates user token
	-------------------------------------------------------------------------------------------------*/
	public function logout() {
		# Make sure user is logged in if they want to use anything in this controller
		if(!$this->user) {
			Router::redirect("/index/unauthorized");
		}
		
		# Generate and save a new token for next login
		$new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

		# Create the data array we'll use with the update method
		# In this case, we're only updating one field, so our array only has one entry
		$data = array("token" => $new_token);

		# Do the update
		DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");

		# Delete their token cookie by setting it to a date in the past - effectively logging them out
		setcookie("token", "", strtotime('-1 year'), '/');


		# Send them to the main page
		Router::redirect("/");

	} # End of method



}