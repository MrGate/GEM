<?php

class Gem_model
{

	public $db;
	public $db_host = '';
	public $db_user = '';
	public $db_pass = '';
	public $db_name = '';

	public function __construct()
	{

		require APPPATH . '/config/' . ENVIRONMENT . '/database.php';

		$this->db_host 		= $config['db_host'];
		$this->db_user		= $config['db_user'];
		$this->db_pass 		= $config['db_pass'];
		$this->db_name 		= $config['db_name'];

		$this->init();
	}

	protected function init()
	{
		// load the database library
		require_once BASEPATH . '/core/database.php';
		// assign a handle that are models can use
		$this->db = new database($this->db_host, $this->db_user, $this->db_pass, $this->db_name);

	}

	public function test()
	{
		echo 'hello';
	}

}