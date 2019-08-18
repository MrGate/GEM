<?php  if ( ! defined('APPPATH')) exit('direct script access is forbidden');

class Example extends Gem_controller
{
	public function index()
	{
		$this->load->view("welcome_message");
	}

}