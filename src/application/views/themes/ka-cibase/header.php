<!doctype html>
<html>

<head>
	
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title><?php if (isset($meta_title)) { _e($meta_title); } else { _e(KA_WEBSITE_NAME); } ?></title>
   	<meta name="description" content="<?php if (isset($meta_description)) { _e($meta_description); } else { _e(KA_WEBSITE_TAGLINE); } ?>" />

	<!-- CSS -->
	<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/ui-lightness/jquery-ui.min.css" />
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
	<link rel="stylesheet" href="<?php _e(base_url('assets/css/bootstrap.min.css')); ?>" />
	<link rel="stylesheet" href="<?php _e(base_url('assets/css/sweet-alert.css')); ?>" />
	<link rel="stylesheet" href="<?php _e(base_url('assets/css/jaithai.css')); ?>" />
	

	<!-- Javascript -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
	<script src="<?php _e(base_url('assets/js/bootstrap.min.js')); ?>"></script>
	<script src="<?php _e(base_url('assets/js/sweet-alert.js')); ?>"></script>
	<script src="<?php _e(base_url('assets/js/jaithai-20250710.js')); ?>"></script>


	<?php if (!KA_TEST) : ?>
		<script type="text/javascript" src="<?php _e(base_url('assets/js/googleanalytics.js')); ?>"></script>
	<?php endif; ?>

	<?php //custom JS files for each view (load when exists) ?>
	<?php if ($template == 'cart_view'): ?>
		<script type="text/javascript" src="<?php _e(base_url('assets/js/cart_view-20260105.js')); ?>"></script>
	<?php endif; ?>
	
	<!-- IE Conditional Comments -->
	<!--[if lt IE 9]>
		<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>	
		<link type="text/css" rel="stylesheet" href="<?php _e(base_url('assets/css/ie8.css')); ?>" media="screen" />
	<![endif]-->
		
</head>

<body>

	<div id="container" class="container">

		<?php if (KA_TEST) : ?>
			<div class="row" style="padding: 20px; color: #fff; background-color: #f00; font-weight: bold; text-align:center;">TESTING MODE</div>
		<?php endif; ?>	


		<header id="header" class="row">
			<div class="logo">
				<a href="./"><img src="<?php _e(base_url('assets/i/jai-thai-logo.png')); ?>" alt="Logo" class="img-responsive" /></a>
			</div>
		</header>
		<nav id="nav" class="navbar navbar-default navbar-static-top row" role="navigation">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div><!-- /.navbar-header -->

			<div class="collapse navbar-collapse" id="navbar">
				<ul class="nav navbar-nav">
                    <li><a href="<?php _e(site_url());?>">Home</a></li>
                    <li><a href="<?php _e(site_url('restaurant-menu.php')); ?>">Restaurant Menus</a></li>
                    <li><a href="https://order.jai-thai.com/en_SG">Delivery</a></li>
                    <li><a href="<?php _e(site_url('catering-menu.php')); ?>">Catering</a></li>
                    <li><a href="<?php _e(site_url('about-outlets.php'))?>">About Us</a></li>
                    <li><a href="<?php _e(site_url('cart.php'))?>">Cart</a></li>				</ul>
			</div><!-- /.navbar-collapse -->			
		</nav>
