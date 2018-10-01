<?php
	include("includes/config.php");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US">
<head>
	<title>Connected Kingston - <?php print $PAGE_TITLE;?></title>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<link rel="canonical" href="https://connectedkingston.co.uk" />
	<meta name="description" content="<?php print $DESCRIPTION; ?>" />
	<meta itemprop="image">
	<meta property="og:image">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="format-detection" content="telephone=no">

	<!-- Typekit -->
	<link rel="stylesheet" href="https://use.typekit.net/bjq5bor.css">

	<!-- Vendor styles -->
	<link href="/assets/dist/vendor.css?t=1" media="screen, projection" rel="stylesheet" />

	<!-- Site styles -->
	<link href="/assets/dist/app.css?t=1" media="screen, projection" rel="stylesheet" />

	<!-- Print styles -->
	<link rel="stylesheet" type="text/css" media="print" href="/assets/dist/print.css?t=1" />

	<!-- Icons -->
	<link rel="apple-touch-icon" sizes="57x57" href="/assets/dist/img/icons/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/assets/dist/img/icons/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/assets/dist/img/icons/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/assets/dist/img/icons/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/assets/dist/img/icons/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/assets/dist/img/icons/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/assets/dist/img/icons/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/assets/dist/img/icons/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/assets/dist/img/icons/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/assets/dist/img/icons/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/assets/dist/img/icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/assets/dist/img/icons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/assets/dist/img/icons/favicon-16x16.png">
	<link rel="manifest" href="/assets/dist/img/icons/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/assets/dist/img/icons/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
</head>

<body>
	<a href="#app" class="skip">Skip to content</a>

	<?php include('templates/_snippets/header.php'); ?>

	<main id="app" class="page page--<?php echo $CURRENT_PAGE; ?>" role="main">
		<banner></banner>
		<div class="flex-container">
			<div class="flex-col flex-col--12">
				<?php include('templates/_components/breadcrumbs.php'); ?>
			</div>
		</div>

		<?php echo $twig->render($TEMPLATE_URL); ?>	
	</main>

	<?php include('templates/_snippets/footer.php'); ?>

	<!-- SCRIPTS -->
	<script src="/assets/dist/manifest.js?t=1"></script>
  	<script src="/assets/dist/vendor.js?t=1"></script>
	<script src="/assets/dist/app.js?t=1"></script>

	<script type='text/javascript'>
		window.__lo_site_id = 123958;
		(function() {
			var wa = document.createElement('script'); wa.type = 'text/javascript'; wa.async = true;
			wa.src = 'https://d10lpsik1i8c69.cloudfront.net/w.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(wa, s);
		})();
	</script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-124057892-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	  gtag('config', 'UA-124057892-1');
	</script>

	<!-- ~~~~~~~~~~~~ BUILT BY ~~~~~~~~~~~~
		 AAAAAAA YYY  YYY UU    UU PPPPPPP
		AA     AA YY  YY  UU    UU PP   PP
		AAAAAAAAA  YYYY   UU    UU PPPPPPP
		AA     AA   YY    UU    UU PP
		AA     AA   YY     UUUUUU  PP
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

</body>
</html>