<?php
class classes_controller extends base_controller {

	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		parent::__construct();

	}

	/*-------------------------------------------------------------------------------------------------
	 Allows user to add a class
	-------------------------------------------------------------------------------------------------*/
	public function add() {
	
		# Make sure user is logged in if they want to use anything in this controller
		if(!$this->user) {
			Router::redirect("/index/unauthorized");
		}
		
		# Setup view
		$this->template->content = View::instance('v_classes_add');

		$this->template->title   = "Add Class";

		$client_files_head = array("/css/classes_add.css");
		$this->template->client_files_head = Utils::load_client_files($client_files_head);

		#$client_files_body = array("/js/ElementValidation.js", "/js/shout_out_utils.js");
		#$this->template->client_files_body = Utils::load_client_files($client_files_body);

		# Build the query
		$q = "SELECT
	            class_types.class_type_id,
	            class_types.type
	        FROM class_types where active_flg = 'Y'";

		# Run the query
		$this->template->content->classTypes = DB::instance(DB_NAME)->select_rows($q);

		# Build the query
		$q = "SELECT
	            teachers.teacher_id,
	            teachers.first_name,
	            teachers.last_name
	        FROM teachers where active_flg = 'Y'";

		# Run the query
		$this->template->content->teachers = DB::instance(DB_NAME)->select_rows($q);

		# Build the query
		$q = "SELECT
	            days.day_id,
	            days.long_name,
	            days.short_name
	        FROM days where active_flg = 'Y'";

		# Run the query
		$this->template->content->days = DB::instance(DB_NAME)->select_rows($q);

		# Render template
		echo $this->template;

		
	}
	
	public function p_add() {
		
		# Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
		$_POST = DB::instance(DB_NAME)->sanitize($_POST);
		
		# Unix timestamp of when this post was created / modified
		$_POST['created']  = Time::now();
		$_POST['modified'] = Time::now();
		$_POST['created_by']  = $this->user->email;
		$_POST['modified_by'] = $this->user->email;		
		unset($_POST['MAX_FILE_SIZE']);

		# Insert
		# Note we didn't have to sanitize any of the $_POST data because we're using the insert method which does it for us
		DB::instance(DB_NAME)->insert('classes', $_POST);

		
		# Send them to the main page
		Router::redirect("/");


	}
		
	public function display() {
	
		# Make sure user is logged in if they want to use anything in this controller
		#if(!$this->user) {
		#	Router::redirect("/index/unauthorized");
		#}
		
		# Setup view
		$this->template->content = View::instance('v_classes_display');

		$this->template->title   = "View Classes";

		$client_files_head = array("/css/classes_display.css");
		$this->template->client_files_head = Utils::load_client_files($client_files_head);

		#$client_files_body = array("/js/ElementValidation.js", "/js/shout_out_utils.js");
		#$this->template->client_files_body = Utils::load_client_files($client_files_body);
		
		# Retrieve days
		$q = "SELECT day_id, long_name
				FROM days";
		$days = DB::instance(DB_NAME)->select_rows($q);

		# Retrieve classes
		$t = "SELECT type, first_name, day_id, TIME_FORMAT(start_time, '%h:%i%p') as start_time, 
					TIME_FORMAT(end_time, '%h:%i%p') as end_time, description
				FROM classes
				JOIN class_types ON class_types.class_type_id = classes.class_type_id
				JOIN teachers ON teachers.teacher_id = classes.teacher_id
				Where type = 'yoga'";	
		foreach($days as $day){
			$qry = $t . "  and day_id = ";
			$qry .= $day['day_id'];
			$schedule[$day['day_id']] = DB::instance(DB_NAME)->select_rows($qry);
		}
		
		$this->template->content->days = $days;
		$this->template->content->schedule = $schedule;
		
		# Render template
		echo $this->template;

		
	}



}
?>