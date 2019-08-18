<?php  if ( ! defined('APPPATH')) exit('direct script access is forbidden');

class Example extends Gem_controller
{
	public function index()
	{
		$this->load->view("welcome_message");
	}
	
	public function core_forms_test()
	{
		$this->forms = $this->load->core_library('forms');
		
		$formHtml = $this->forms->open('example/test')->element_text('example')->element_submit('Submit')->close()->getHtml();
		echo $formHtml;
	}

}