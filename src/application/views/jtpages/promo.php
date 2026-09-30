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
	<style>
		body {
			background-color: #f36d21;
			padding: 20px 0;
			text-align: center;
		}
		img {
			border: 5px solid #fff;
			box-shadow: 1px 1px 2px #222;
		}
		a {
			display: block;
			cursor: pointer;
		}
		p {
			margin-bottom: 30px;
		}
	</style>
</head>

<body>

<div id="container" class="container">
<!--	<p><a href="--><?php //_e(site_url('/xmas-mini-party.php'));?><!--"><img src="--><?php //_e(base_url('assets/i/xmas-promo-banner.png')) ?><!--" class='img-responsive' alt="Xmas Menu Banner"/></a></p>-->
	<p><a href="<?php _e(site_url('/cny-mini-party.php'));?>"><img src="<?php _e(base_url('assets/i/cny-promo-banner.png')) ?>" class='img-responsive' alt="CNY Menu Banner"/></a></p>
	<p><a href="/" class="btn btn-default">Continue to Jai Thai website</a></p>
</div>

</body>

</html>
