<?php showStatusMessage($this->session->userdata('statusmessage')); ?>
<?php $this->session->unset_userdata('statusmessage'); ?>

<?php /*
<?php if (date("Y-m-d") >= '2015-05-30' && date('Y-m-d') <= '2015-05-31'): ?>
	<div class="row promonote" style="margin-top: 0; text-align: center; font-size: 1.1em;">
		Get a <strong>S$30 Jai Thai East Coast Dine-In Voucher*</strong> when you order a
		<a href="<?php _e(site_url('catering-menu.php#set')); ?>">Set</a>,
		<a href="<?php _e(site_url('catering-menu.php#diy')); ?>">DIY</a> or
		<a href="<?php _e(site_url('catering-menu.php#vegetarian')); ?>">Vegetarian</a> catering menu order with us, from now till 31 May 2015!<br/>
		Hurry! Only <del>100</del> <?php _e(fake_daily_promo_claimed("2015-06-01", 4, 2.38)); ?> vouchers left to give away!
	</div>
<?php endif; ?>

<div class="row">
	<a href="<?php _e(site_url('xmas-mini-party.php')) ?>" style="display:block; cursor: pointer;"><img src="<?php _e(base_url('assets/i/xmas-banner.png')); ?>" alt="Jai Thai" class="img-responsive"/></a>
</div>
<div class="row">
	<a href="<?php _e(site_url('cny-mini-party.php')) ?>" style="display:block; cursor: pointer;"><img src="<?php _e(base_url('assets/i/cny-banner.png')); ?>" alt="Jai Thai" class="img-responsive"/></a>
</div>
 */ ?>


<div id="hero" class="row">
	<img src="<?php _e(base_url('assets/i/jai-thai-banner-2024.jpg')); ?>" alt="Jai Thai" class="img-responsive" />
<!--	<img src="--><?php //_e(base_url('/assets/i/cny2025-closure-banner.jpg')); ?><!--" alt="Jai Thai" class="img-responsive" />-->
</div><!-- /hero -->

<div id="content" class="row">

	<div id="intropara" class="col-md-8 col-sm-12">
		<h1>Sawasdee kha. Welcome to Jai Thai.</h1>
		<p class="lead">Discover authentic Thai cuisine at wallet friendly prices! At Jai Thai, each dish is prepared
			and cooked using natural traditional herbs and spices. &raquo;</p>
	</div>
	<div class="col-md-4 hidden-sm hidden-xs">
		<img src="<?php _e(base_url('assets/i/jaithai-hearts.png')); ?>" alt="Jai Thai" class="img-responsive"  id="jaithaihearts"/>
	</div>

</div><!-- /#content -->

<?php //CNY_Helper::outlet_opening_hours_banner(); ?>

<div id="homemenus" class="row">
	 <div class="col-md-4 col-sm-6">
		<h2>Restaurant Menus</h2>
		<p><a href="<?php _e(site_url('restaurant-menu.php')); ?>"><img
					src="<?php _e(base_url('assets/i/home-restaurantmenus.jpg')); ?>" alt="Restaurant Menus"
					class="img-responsive homemenus-img"/></a></p>
		<p>Enjoy a taste of our authentic Thai food at one of our four restaurants.</p>
		<ul class="arrbullet">
			<li><a href="<?php _e(site_url('menu-jaithai.php')); ?>">Restaurant Menus</a></li>
			<li><a href="<?php _e(site_url('menu-individual-set.php')); ?>">Individual Set Menus</a></li>
			<li><a href="<?php _e(site_url('menu-family-set.php')); ?>">Family Set Menus</a></li>
<!--		<li><a href="--><?php //_e(site_url('menu-vegetarian.php')); ?><!--">Vegetarian Menus</a></li>-->
		</ul>
		 <p><strong>Restaurant Enquiries</strong></p>
		 <ul class="nobullet">
			 <li>Email: <a href="mailto:enquiry@jai-thai.com">enquiry@jai-thai.com</a></li>
		 </ul>
	 </div>
	<div class="col-md-4 col-sm-6">
		<h2>Catering Services</h2>
		<p>
			<a href="<?php _e(site_url('catering-menu.php')); ?>">
				<img src="<?php _e(base_url('assets/i/home-cateringmenus.jpg')); ?>" alt="Restaurant Menus" class="img-responsive homemenus-img"/>
			</a>
		</p>
		<p>Check out our variety of catering menus.</p>
		<ul class="arrbullet">
			<li><a href="<?php _e(site_url('catering-menu.php#promotion')); ?>">Promotion Menus Catering</a></li>
			<li><a href="<?php _e(site_url('catering-menu.php#set')); ?>">Set Catering</a></li>
			<li><a href="<?php _e(site_url('catering-menu.php#diy')); ?>">DIY Catering</a></li>
			<li><a href="<?php _e(site_url('catering-menu.php#vegetarian')); ?>">Vegetarian Catering</a></li>
			<li><a href="<?php _e(site_url('catering-menu.php#miniparty-set')); ?>">Mini Party Set Menu</a></li>
			<li><a href="<?php _e(site_url('catering-menu.php#miniparty-diy')); ?>">Mini Party DIY Menu</a></li>
			<li><a href="<?php _e(site_url('catering-menu.php#bento')); ?>">Bento Catering</a></li>
		</ul>
		<p><strong>Catering Enquiries</strong></p>
		<ul class="nobullet">
			<li>Call: 8118 3202 (Ms Anne)</li>
			<li>Email: <a href="mailto:catering@jai-thai.com">catering@jai-thai.com</a></li>
		</ul>
 		<p><strong>Halal Catering</strong></p>
		<ul class="nobullet">
			<li>For Halal catering, please order from JaiSiam.sg<br/>
				<a href="https://www.jaisiam.sg"><img src="<?php _e(base_url('assets/i/jai-siam-logo.png')); ?>" alt="Jai Siam" class="jaisiam img-responsive"/></a>
			</li>
		</ul>
	</div>
	<div class='clearfix visible-sm'></div>
	<div class="col-md-4 col-sm-12">
		<p class='h2'>Our Outlets</p>
		<ul class="nobullet outlets">
			<li><strong>Purvis Street</strong><small> (No Reservations)</small><br/>27 Purvis Street <br/>#01-01 An Chuan Building <br/>Singapore 188604<br/>Tel: 6336 6908<br/></li>
			<li><a href="<?php _e(site_url('about-outlets.php')); ?>">Outlet Locations / Opening Hours »</a></li>
			<li><a target="_blank" href="https://www.facebook.com/JaiThaiSG"><i class="fa fa-lg fa-facebook-official" aria-hidden="true"></i> Like Us on Facebook!</a></li>
		</ul>
	</div>
</div><!-- /#homemenus -->

