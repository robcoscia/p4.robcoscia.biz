<?php

class index_controller extends base_controller {
	
	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		parent::__construct();
	} 
		
	/*-------------------------------------------------------------------------------------------------
	Accessed via http://localhost/index/index/
	-------------------------------------------------------------------------------------------------*/
	public function index() {	
		
		# Any method that loads a view will commonly start with this
		# First, set the content of the template with a view file
			$this->template->content = View::instance('v_index_index');
			
		# Now set the <title> tag
			$this->template->title = "Saanti Yoga";
	
		# CSS/JS includes
			
			$client_files_head = Array("/css/index_index.css");
	    	$this->template->client_files_head = Utils::load_client_files($client_files_head);
	    	/*
	    	$client_files_body = Array("");
	    	$this->template->client_files_body = Utils::load_client_files($client_files_body);   
	    	*/
	      					     		
		# Render the view
			echo $this->template;

	} # End of method
	
	/*-------------------------------------------------------------------------------------------------
	Accessed via http://localhost/index/unauthorized/
	-------------------------------------------------------------------------------------------------*/
	public function unauthorized() {

		# Set up the View
	    $this->template->content = View::instance('v_index_unauthorized');
	    
	    $this->template->title   = "Access Denied";
					
		# Render the View
	    echo $this->template;
	}	

	/*-------------------------------------------------------------------------------------------------
	Accessed via http://localhost/index/unauthorized/
	-------------------------------------------------------------------------------------------------*/
	public function underconstruction() {

		# Set up the View
	    $this->template->content = View::instance('v_index_underconstruction');
	    
	    $this->template->title   = "Under Construction";
					
		# Render the View
	    echo $this->template;
	}	
	
} # End of class
