<?php

class loader {

	public $this;

	/**
	 *	The config path
	 *
	 *	$var string
	 */
	protected $gem_config_path = '';

	/**
	 *	The models path
	 *
	 *	$var string
	 */
	protected $gem_model_path = '';

	/**
	 *	The libraries path
	 *
	 *	$var string
	 */
	protected $gem_librarie_path = '';

	/**
	 *	The views path
	 *
	 *	$var string
	 */
	protected $gem_view_path = '';

	/**
	 * Class constructor
	 *
	 * Setup locations and settings
	 *
	 * @return	void
	 */
	public function __construct()
	{
		// define some of the paths
		if(file_exists(APPPATH . '/config/config.php'))
		{
			$this->gem_config_path = APPPATH . '/config/';
		}else{
			$this->gem_config_path = APPPATH . '/config/' . ENVIRONMENT . '/';
		}
		
		$this->gem_model_path = APPPATH . '/model/';
		$this->gem_librarie_path = APPPATH . '/libraries/';
		$this->gem_view_path = APPPATH . '/views/';
		
		$this->gem_core_librarie_path = BASEPATH . '/libraries/';
	}



	// loader functions

	public function config($config)
	{

		if (empty($config))
		{
			return $this;
		}

		require $this->gem_config_path . $config . '.php';

	}

	public function model($model)
	{

		if (empty($model))
		{
			return $this;
		}

		require_once $this->gem_model_path . $model . '.php';
		// $this->$model = new $model();
		return new $model();

	}

	public function library($library)
	{

		if (empty($library))
		{
			return $this;
		}

		require_once $this->gem_librarie_path . $library . '.php';
		return new $library();

	}
	
	public function core_library($library)
	{

		if (empty($library))
		{
			return $this;
		}

		require_once $this->gem_core_librarie_path . $library . '.php';
		return new $library();

	}

	public function view($view, $data = array(), $buffer = FALSE)
	{

		if (empty($view))
		{
			return $this;
		}

		// expose all the data for the view
		extract($data);

		if($buffer == TRUE)
		{
			// capture the buffer
			ob_start();

			if(is_array($view))
			{
				foreach($view as $file)
				{	
					require $this->gem_view_path . $file . '.php';
				}

			}else{
				require $this->gem_view_path . $view . '.php';
			}

			$buffer = ob_get_contents();
			ob_end_clean();
			return $buffer;

		}else{
			// check to see if there is more then one view
			if(is_array($view))
			{

				foreach($view as $file)
				{
					require $this->gem_view_path . $file . '.php';
				}

			}else{
				require $this->gem_view_path . $view . '.php';
			}
		}

	}


}