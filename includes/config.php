<?php
	// Twig
	require_once './vendor/autoload.php';

	$loader = new Twig_Loader_Filesystem('./');
	$twig = new Twig_Environment($loader);

	// Routing
	$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
	
	switch ($request_uri[0]) {
		case "/":
			$CURRENT_PAGE = "index";
			$PAGE_TITLE = "Making links, connecting communities";
			$TEMPLATE_URL = "templates/pages/index.php";
			break;
		case "/results":
			$CURRENT_PAGE = "search-results"; 
			$PAGE_TITLE = "Search results for ";
			$TEMPLATE_URL = "templates/pages/search/results.php";
			break;
		case "/results/service":
			$CURRENT_PAGE = "service"; 
			$PAGE_TITLE = "Service";
			$TEMPLATE_URL = "templates/pages/search/service.php";
			break;
		case "/results/service/organisation":
			$CURRENT_PAGE = "organisation"; 
			$PAGE_TITLE = "Organisation ";
			$TEMPLATE_URL = "templates/pages/search/organisation.php";
			break;
		case "/shortlist":
			$CURRENT_PAGE = "shortlist"; 
			$PAGE_TITLE = "Shortlist";
			$TEMPLATE_URL = "templates/pages/shortlist/index.php";
			break;
		case "/referral/external":
			$CURRENT_PAGE = "referral";
			$PAGE_TITLE = "Referral form";
			$TEMPLATE_URL = "templates/pages/referral/external.php";
			break;
		case "/referral/internal":
			$CURRENT_PAGE = "referral";
			$PAGE_TITLE = "Referral form";
			$TEMPLATE_URL = "templates/pages/referral/internal.php";
			break;
		case "/referral/who":
			$CURRENT_PAGE = "referral";
			$PAGE_TITLE = "Referral form";
			$TEMPLATE_URL = "templates/pages/referral/who.php";
			break;
		case "/referral/you":
			$CURRENT_PAGE = "referral";
			$PAGE_TITLE = "Referral form";
			$TEMPLATE_URL = "templates/pages/referral/you.php";
			break;
		case "/referral/client":
			$CURRENT_PAGE = "referral";
			$PAGE_TITLE = "Referral form";
			$TEMPLATE_URL = "templates/pages/referral/client.php";
			break;
		case "/referral/consent":
			$CURRENT_PAGE = "referral";
			$PAGE_TITLE = "Referral form";
			$TEMPLATE_URL = "templates/pages/referral/consent.php";
			break;
		case "/referral/complete":
			$CURRENT_PAGE = "referral";
			$PAGE_TITLE = "Referral form";
			$TEMPLATE_URL = "templates/pages/referral/complete.php";
			break;
		case "/about":
			$CURRENT_PAGE = "about"; 
			$PAGE_TITLE = "About us";
			$TEMPLATE_URL = "templates/pages/about/index.php";
			break;
		case "/contact":
			$CURRENT_PAGE = "contact"; 
			$PAGE_TITLE = "Contact";
			$TEMPLATE_URL = "templates/pages/contact/index.php";
			break;
		default:
			header('HTTP/1.0 404 Not Found');
			$TEMPLATE_URL = "templates/404.php";
			break;
	}
?>