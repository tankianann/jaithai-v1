<!DOCTYPE html>
<html>

<head>
	
	<meta charset="utf-8" />
	<title><?php if (isset($meta_title)) { _e($meta_title); } else { _e(KA_WEBSITE_NAME); } ?></title>
   	<meta name="description" content="<?php if (isset($meta_description)) { _e($meta_description); } else { _e(KA_WEBSITE_TAGLINE); } ?>" />

    <link rel="stylesheet" href="<?php _e(base_url('assets/css/sweet-alert.css')); ?>" />
	<link rel="stylesheet" href="<?php _e(base_url('assets/css/jtadmin.css?20241126')); ?>" media="screen" />
	<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/ui-lightness/jquery-ui.css" type="text/css" media="all" />
	<link rel="icon" href="./favicon.ico" type="image/x-icon" />
	
	<!-- JS: JQuery, JQueryUI, ChromeFrame, Modernizr, Prefix Free -->	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
	<script src="<?php _e(base_url('assets/js/modernizr.js')); ?>"></script>
	<script src="<?php _e(base_url('assets/js/prefixfree.js')); ?>"></script>
    <script src="<?php _e(base_url('assets/js/sweet-alert.js')); ?>"></script>
 	<script src="<?php _e(base_url('assets/js/jtadmin.js')); ?>"></script>
 	
 	<!-- Need to find a way to load js only when the file is found -->
	<script src="<?php _e(base_url('assets/js/' . $template . '.js')); ?>"></script>
	
	<!-- IE Conditional Comments -->
	<!--[if lt IE 9]>
		<link rel="stylesheet" href="<?php _e(base_url('assets/css/ie8.css')); ?>" media="screen" />
	<![endif]-->
	
	
</head>

<body>

	<?php if (KA_TEST) : ?>
		<div style="padding: 10px; color: #fff; background-color: #c00; font-weight: bold; text-align:center;">TESTING MODE</div>
	<?php endif; ?>


	<div id="container">

		<?php if(isset($jtuser)): ?>
			<?php if ($jtuser['type'] == 'admin'): ?>
				<div id="jtadmmenu">
					<ul>
						<li><a href="<?php _e(site_url('jtadmin/dashboard')) ?>">Dashboard</a></li>
						<li><a href="<?php _e(site_url('jtadmin/dashboardcredit')) ?>">Credit</a></li>
						<li><a href="<?php _e(site_url('jtadmin/dashboardarchived')) ?>">Archived</a></li>
						<li><a href="<?php _e(site_url('jtadmin/feedback')) ?>">Feedback</a></li>
						<li><a href="<?php _e(site_url('jtadmin/vouchers')) ?>">Vouchers</a></li>
						<li><a href="<?php _e(site_url('jtadmin/report')) ?>">Reports</a></li>
						<li><a href="<?php _e(site_url('jtadmin/logout')) ?>">Logout</a></li>
					</ul>
					<div class="clear"></div>
				</div>
			<?php else: ?>
				<div id="jtadmmenu">
					<ul>
						<li><a href="<?php _e(site_url('jtadmin/dashboard')) ?>">Dashboard</a></li>
						<li><a href="<?php _e(site_url('jtadmin/logout')) ?>">Logout</a></li>
					</ul>
					<div class="clear"></div>
				</div>
			<?php endif; ?>
		<?php endif; ?>
		
		<div id="content">
		
		
			

