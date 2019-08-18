<?php  if ( ! defined('APPPATH')) exit('direct script access if forbidden');

/*
|--------------------------------------------------------------------------
|	Base Site URL
|--------------------------------------------------------------------------
*/
$config['base_url'] = 'http://localhost/GemFramework';

/*
|--------------------------------------------------------------------------
|	Default Controller
|--------------------------------------------------------------------------
*/
$config['default_controller'] = 'example';

/*
|--------------------------------------------------------------------------
|	Language
|--------------------------------------------------------------------------
*/
$config['language']	= 'english';


/*
|--------------------------------------------------------------------------
|	Encryption Key
|--------------------------------------------------------------------------
|	This key is not intended to be used on this server
|	Accordig to HIPPA the encryption key can not be on the same server
|	as the encrypted data or information.
|
|	Key must be a 256 Bit Key
|	Example : 4Xdn4945u317id27LUWjcfCV4wWNuY7N
*/
$config['encryption_key'] = '4Xdn4945u317id27LUWjcfCV4wWNuY7N';

/*
|--------------------------------------------------------------------------
|	404 Override
|	This overrides the default 404 functionality and lets you control the 
|	actions the framework takes.
|	to use it, change 404_override to true
|	and assign the controller/method to use for the 404 override. ex. 'example/lost'
|--------------------------------------------------------------------------
*/
$config['404_override'] = false;  
$config['404_path'] = '';