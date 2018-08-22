<?php
	// Twig
	require_once './vendor/autoload.php';

	$loader = new Twig_Loader_Filesystem('./');
	$twig = new Twig_Environment($loader);

	// Routing
	$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
	
	switch ($request_uri[0]) {
		case "/":
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "Making links, connecting communities";
			$TEMPLATE_URL = "templates/pages/index.php";
			break;
		case "/results":
			$CURRENT_PAGE = "Search Results"; 
			$PAGE_TITLE = "Search results for ";
			$TEMPLATE_URL = "templates/pages/search/results.php";
			break;
		case "/results/organisation":
			$CURRENT_PAGE = "Organisation"; 
			$PAGE_TITLE = "Organisation ";
			$TEMPLATE_URL = "templates/pages/search/organisation.php";
			break;
		case "/shortlist":
			$CURRENT_PAGE = "Shortlist"; 
			$PAGE_TITLE = "Shortlist";
			$TEMPLATE_URL = "templates/pages/shortlist/index.php";
			break;
		case "/referral":
			$CURRENT_PAGE = "Referral";
			$PAGE_TITLE = "Referral form";
			$TEMPLATE_URL = "templates/pages/referral/index.php";
			break;
		case "/about":
			$CURRENT_PAGE = "About"; 
			$PAGE_TITLE = "About us";
			$TEMPLATE_URL = "templates/pages/about/index.php";
			break;
		case "/contact":
			$CURRENT_PAGE = "Contact"; 
			$PAGE_TITLE = "Contact";
			$TEMPLATE_URL = "templates/pages/contact/index.php";
			break;
		default:
			header('HTTP/1.0 404 Not Found');
			$TEMPLATE_URL = "templates/404.php";
			break;
	}
?>