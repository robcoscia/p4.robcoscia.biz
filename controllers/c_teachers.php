<?php
class teachers_controller extends base_controller {

	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		parent::__construct();

	}

	/*-------------------------------------------------------------------------------------------------
	 Allows user to add a teacher
	-------------------------------------------------------------------------------------------------*/
	public function add() {
	
		# Make sure user is logged in if they want to use anything in this controller
		if(!$this->user) {
			Router::redirect("/index/unauthorized");
		}
		
		# Setup view
		$this->template->content = View::instance('v_teachers_add');

		$this->template->title   = "Add Teacher";

		$client_files_head = array("/css/teachers_add.css");
		$this->template->client_files_head = Utils::load_client_files($client_files_head);

		#$client_files_body = array("/js/ElementValidation.js", "/js/shout_out_utils.js");
		#$this->template->client_files_body = Utils::load_client_files($client_files_body);

		# Render template
		echo $this->template;
		
	}
	
	
	public function p_add() {
		
		# Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);
		
		# Unix timestamp of when this post was created / modified
		$_POST['created']  = Time::now();
		$_POST['modified'] = Time::now();
		$_POST['created_by']  = $this->user['email'];
		$_POST['modified_by'] = $this->user['email'];
		unset($_POST['MAX_FILE_SIZE']);

		# Insert
		# Note we didn't have to sanitize any of the $_POST data because we're using the insert method which does it for us
		DB::instance(DB_NAME)->insert('teachers', $_POST);

		
		# Send them to the main page
		Router::redirect("/");


	}
	
	
}
?>