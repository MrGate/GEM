<?php

	//	 ██████╗ ███████╗███╗   ███╗
	//	██╔════╝ ██╔════╝████╗ ████║
	//	██║  ███╗█████╗  ██╔████╔██║
	//	██║   ██║██╔══╝  ██║╚██╔╝██║
	//	╚██████╔╝███████╗██║ ╚═╝ ██║
	//	 ╚═════╝ ╚══════╝╚═╝     ╚═╝
	//       PHP MVC Framework	                            
	// =============================
	//   Security Focused Framework
	// =============================
	// By Randall Paul Perkins



	define ('ENVIRONMENT', 'development');

	switch (ENVIRONMENT)
	{
		case 'development':
			error_reporting(-1);
			ini_set('display_errors', 1);
		break;

		case 'testing':
		case 'production':
			error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT);
			ini_set('display_errors', 0);
		break;

		default:
			header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
			echo 'Gem Framework Error (0001)';
			exit(1); // EXIT_ERROR
	}


	$application_path  = 'application';
	$engine_path = 'engine';

	// SELF to check if were using the index.php file *
	define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

	// path to application folder *
	define('APPPATH', $application_path);

	// Path to the engine folder *
	define('BASEPATH', str_replace("\\", "/", $engine_path));

	define('GEM_VERSION', '0.1-dev');

	require BASEPATH . '/gem.php';


	$gem = new Gem();

	/* provide a check
	if(SELF == 'index.php') {
		require BASEPATH . "/bootstrap.php";
	}else{
		die('Please change filename back to index.php');
	}
	*/