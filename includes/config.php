<?php
	switch ($_SERVER['REQUEST_URI']) {
		case "/search":
			$CURRENT_PAGE = "Search"; 
			$PAGE_TITLE = "Search";
			$TEMPLATE_URL = "templates/pages/search.php";
			break;
		case "/about":
			$CURRENT_PAGE = "About"; 
			$PAGE_TITLE = "About";
			$TEMPLATE_URL = "templates/pages/about.php";
			break;
		case "/contact":
			$CURRENT_PAGE = "Contact"; 
			$PAGE_TITLE = "Contact";
			$TEMPLATE_URL = "templates/pages/contact.php";
			break;
		default:
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "Making links, connecting communities";
			$TEMPLATE_URL = "templates/pages/index.php";
	}
?>