<?php
	// Twig
	require_once './vendor/autoload.php';

	$loader = new Twig_Loader_Filesystem('./');
	$twig = new Twig_Environment($loader);

	// Routing
	$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
	$request_uri = $request_uri[0];

	if($request_uri === "/"):
		$CURRENT_PAGE = "index";
		$PAGE_TITLE = "Making links, connecting communities";
		$TEMPLATE_URL = "templates/pages/index.php";
	elseif($request_uri === "/results"):
		$CURRENT_PAGE = "search-results"; 
		$PAGE_TITLE = "Search results";
		$TEMPLATE_URL = "templates/pages/search/results.php";
	elseif($request_uri === "/services"):
		header('Location: /results?is_free=true&search_term=&location=');
	elseif(preg_match('/services/', $request_uri)):
		$CURRENT_PAGE = "service"; 
		$PAGE_TITLE = "Service";
		$TEMPLATE_URL = "templates/pages/search/service.php";
	elseif($request_uri === "/organisations"):
		header('Location: /');
	elseif(preg_match('/organisations/', $request_uri)):
		$CURRENT_PAGE = "organisation"; 
		$PAGE_TITLE = "Organisation ";
		$TEMPLATE_URL = "templates/pages/search/organisation.php";
	elseif($request_uri === "/shortlist"):
		$CURRENT_PAGE = "shortlist"; 
		$PAGE_TITLE = "Shortlist";
		$TEMPLATE_URL = "templates/pages/shortlist/index.php";
	elseif($request_uri === "/referral"):
		$CURRENT_PAGE = "referral";
		$PAGE_TITLE = "Referral form";
		$TEMPLATE_URL = "templates/pages/referral/index.php";
	elseif($request_uri === "/referral/external"):
		$CURRENT_PAGE = "referral";
		$PAGE_TITLE = "Referral form";
		$TEMPLATE_URL = "templates/pages/referral/external.php";
	elseif($request_uri === "/referral/internal"):
		$CURRENT_PAGE = "referral";
		$PAGE_TITLE = "Referral form";
		$TEMPLATE_URL = "templates/pages/referral/internal.php";
	elseif($request_uri === "/referral/who"):
		$CURRENT_PAGE = "referral";
		$PAGE_TITLE = "Referral form";
		$TEMPLATE_URL = "templates/pages/referral/who.php";
	elseif($request_uri === "/referral/you"):
		$CURRENT_PAGE = "referral";
		$PAGE_TITLE = "Referral form";
		$TEMPLATE_URL = "templates/pages/referral/you.php";
	elseif($request_uri === "/referral/client"):
		$CURRENT_PAGE = "referral";
		$PAGE_TITLE = "Referral form";
		$TEMPLATE_URL = "templates/pages/referral/client.php";
	elseif($request_uri === "/referral/consent"):
		$CURRENT_PAGE = "referral";
		$PAGE_TITLE = "Referral form";
		$TEMPLATE_URL = "templates/pages/referral/consent.php";
	elseif($request_uri === "/referral/complete"):
		$CURRENT_PAGE = "referral";
		$PAGE_TITLE = "Referral form";
		$TEMPLATE_URL = "templates/pages/referral/complete.php";
	elseif($request_uri === "/about"):
		$CURRENT_PAGE = "about"; 
		$PAGE_TITLE = "About us";
		$TEMPLATE_URL = "templates/pages/about/index.php";
	elseif($request_uri === "/contact"):
		$CURRENT_PAGE = "contact"; 
		$PAGE_TITLE = "Contact";
		$TEMPLATE_URL = "templates/pages/contact/index.php";
	else:
		header('HTTP/1.0 404 Not Found');
		$PAGE_TITLE = "404 Not Found";
		$TEMPLATE_URL = "templates/404.php";
	endif;
?>