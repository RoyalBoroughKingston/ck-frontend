<?php
	// Twig
	require_once __DIR__.'/../vendor/autoload.php';

	$loader = new Twig_Loader_Filesystem('./');
	$twig = new Twig_Environment($loader);

	// Routing
	$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
	$request_uri = $request_uri[0];

	if($request_uri === "/"):
		$CURRENT_PAGE = "index";
		$PAGE_TITLE = "Local Activities and Services in Kingston upon Thames";
		$DESCRIPTION = "Connected Kingston is a site dedicated to helping Kingston residents find local activities and navigate local services. Our goal is to help residents of Kingston stay happy, healthy and connected to each other. Our goal is maintaining and building Kingston’s community so we can all live our best lives.";
		$TEMPLATE_URL = "templates/pages/index.php";
	elseif($request_uri === "/results"):
		$CURRENT_PAGE = "search-results"; 
		$PAGE_TITLE = "Search results";
		$DESCRIPTION = "Connected Kingston is a site dedicated to helping Kingston residents find local activities and navigate local services. Our goal is to help residents of Kingston stay happy, healthy and connected to each other. Our goal is maintaining and building Kingston’s community so we can all live our best lives.";
		$TEMPLATE_URL = "templates/pages/search/results.php";
	elseif($request_uri === "/services"):
		header('Location: /');
	elseif(preg_match('/services/', $request_uri)):
		$CURRENT_PAGE = "service"; 
		$PAGE_TITLE = "";
		$DESCRIPTION = "Connected Kingston is a site dedicated to helping Kingston residents find local activities and navigate local services. Our goal is to help residents of Kingston stay happy, healthy and connected to each other. Our goal is maintaining and building Kingston’s community so we can all live our best lives.";
		$TEMPLATE_URL = "templates/pages/search/service.php";
	elseif($request_uri === "/organisations"):
		header('Location: /');
	elseif(preg_match('/organisations/', $request_uri)):
		$CURRENT_PAGE = "organisation"; 
		$PAGE_TITLE = "";
		$DESCRIPTION = "Connected Kingston is a site dedicated to helping Kingston residents find local activities and navigate local services. Our goal is to help residents of Kingston stay happy, healthy and connected to each other. Our goal is maintaining and building Kingston’s community so we can all live our best lives.";
		$TEMPLATE_URL = "templates/pages/search/organisation.php";
	elseif($request_uri === "/shortlist"):
		$CURRENT_PAGE = "shortlist"; 
		$PAGE_TITLE = "Shortlist";
		$DESCRIPTION = "Connected Kingston is a site dedicated to helping Kingston residents find local activities and navigate local services. Our goal is to help residents of Kingston stay happy, healthy and connected to each other. Our goal is maintaining and building Kingston’s community so we can all live our best lives.";
		$TEMPLATE_URL = "templates/pages/shortlist/index.php";
	elseif($request_uri === "/referral"):
		$CURRENT_PAGE = "referral";
		$PAGE_TITLE = "Referral form";
		$DESCRIPTION = "Connected Kingston is a site dedicated to helping Kingston residents find local activities and navigate local services. Our goal is to help residents of Kingston stay happy, healthy and connected to each other. Our goal is maintaining and building Kingston’s community so we can all live our best lives.";
		$TEMPLATE_URL = "templates/pages/referral/index.php";
	elseif($request_uri === "/about"):
		$CURRENT_PAGE = "about"; 
		$PAGE_TITLE = "Local Activities and Services in Kingston upon Thames";
		$DESCRIPTION = "Connected Kingston is a site dedicated to helping Kingston residents find local activities and navigate local services. Our goal is to help residents of Kingston stay happy, healthy and connected to each other. Our goal is maintaining and building Kingston’s community so we can all live our best lives.";
		$TEMPLATE_URL = "templates/pages/about/index.php";
	elseif($request_uri === "/contact"):
		$CURRENT_PAGE = "contact"; 
		$PAGE_TITLE = "Contact";
		$DESCRIPTION = "Connected Kingston is a site dedicated to helping Kingston residents find local activities and navigate local services. Our goal is to help residents of Kingston stay happy, healthy and connected to each other. Our goal is maintaining and building Kingston’s community so we can all live our best lives.";
		$TEMPLATE_URL = "templates/pages/contact/index.php";
	elseif($request_uri === "/terms-and-conditions"):
		$CURRENT_PAGE = "terms-and-conditions"; 
		$PAGE_TITLE = "Terms &amp; Conditions";
		$DESCRIPTION = "Connected Kingston is a site dedicated to helping Kingston residents find local activities and navigate local services. Our goal is to help residents of Kingston stay happy, healthy and connected to each other. Our goal is maintaining and building Kingston’s community so we can all live our best lives.";
		$TEMPLATE_URL = "templates/pages/terms-and-conditions/index.php";
	elseif($request_uri === "/privacy-policy"):
		$CURRENT_PAGE = "privacy-policy"; 
		$PAGE_TITLE = "Privacy Policy";
		$DESCRIPTION = "Connected Kingston is a site dedicated to helping Kingston residents find local activities and navigate local services. Our goal is to help residents of Kingston stay happy, healthy and connected to each other. Our goal is maintaining and building Kingston’s community so we can all live our best lives.";
		$TEMPLATE_URL = "templates/pages/privacy-policy/index.php";
	elseif($request_uri === "/duty-to-refer"):
		$CURRENT_PAGE = "duty-to-refer"; 
		$PAGE_TITLE = "Duty to refer";
		$DESCRIPTION = "Connected Kingston is a site dedicated to helping Kingston residents find local activities and navigate local services. Our goal is to help residents of Kingston stay happy, healthy and connected to each other. Our goal is maintaining and building Kingston’s community so we can all live our best lives.";
		$TEMPLATE_URL = "templates/pages/duty-to-refer/index.php";
	else:
		header('HTTP/1.0 404 Not Found');
		$PAGE_TITLE = "404 Not Found";
		$DESCRIPTION = "";
		$TEMPLATE_URL = "templates/404.php";
	endif;
?>
