<?php

class Gem 
{

	protected $url = '';

	protected $controller = '';

	protected $method = 'index';

	protected $params = array();

	// Lost vars
	protected $lost_check = false;
	protected $lost_override;
	protected $lost_path;
	
	public $this;
	

	public function __construct()
	{
		// grab the config file
		require APPPATH . '/config/' . ENVIRONMENT . '/config.php'; 
		 
		require_once BASEPATH . '/core/gem_controller.php';
		require_once BASEPATH . '/core/gem_model.php';

		// set the default controller form the config file
		$this->controller = $config['default_controller'];
		
		$this->lost_override = $config['404_override'];
		$this->lost_path = $config['404_path'];
		
		$this->router();
	}
	
	function lost($type = "Page")
	{
		if($this->lost_override == false)
		{
			// simple default message for 404.
			die("Error 404 : ".$type." not found error");
		}
		else
		{
			// Allow the user to handle the 404 page error
			$overrideVars = explode("/", $this->lost_path);
			$this->controller = $overrideVars[0];
			$this->method = $overrideVars[1];
		}
	}

	function router()
	{
		// check if url exist before we assign it
		if(isset($_GET['url'])) {
			$this->url = $_GET['url'];
		}
		
		// lets parse this $this->url
		if( isset( $this->url ) ){
			$urlArgs = explode( '/', filter_var( rtrim( $this->url, '/' ), FILTER_SANITIZE_URL ) );
		}else { $urlArgs = NULL; }

		// if the controller exist then set it
		if( file_exists( APPPATH . '/controller/' . $urlArgs[0] . '.php' ) )
		{
			$this->controller = $urlArgs[0];
			unset($urlArgs[0]);
		}
		else
		{
			$this->lost_check = true; // there lost, so we set a check.
			// Lost function override
			$this->lost('Page');
		}

		// load the controller
		require_once APPPATH . '/controller/' . $this->controller . '.php';

		// make the controller a new object
		$this->controller = new $this->controller;

		if($this->lost_check == false)
		{
			// check if a method was passed via URL
			if( isset( $urlArgs[1] ) )
			{
				if(method_exists($this->controller, $urlArgs[1]))
				{
					$this->method = $urlArgs[1];
					unset($urlArgs[1]);
				}
				else
				{
					$this->lost_check = true;
					$this->lost('Method');
				}
			}
			else
			{
				if(!method_exists($this->controller, "index"))
				{
					die("[ERROR] " . $urlArgs[0] . " Has no index method");
				}
			}

			// get params if they exist
			$this->params = $urlArgs ? array_values($urlArgs) : array();
		}
		
		// start the function and pass args 
		call_user_func_array( array( $this->controller, $this->method ), $this->params);

	}

	public function version()
	{
		return GEM_VERSION;
	}


}