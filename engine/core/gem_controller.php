<?php

class Gem_controller 
{

	public function __construct()
	{
		require BASEPATH . '/core/loader.php';
		$this->load = new loader();
	}

}