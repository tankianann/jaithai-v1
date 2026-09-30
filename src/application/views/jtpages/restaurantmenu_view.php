<?php showStatusMessage($this->session->userdata('statusmessage')); ?>
<?php $this->session->unset_userdata('statusmessage'); ?>
<div id="content" class="row">
	<div class="col-sm-12">
	
		<div class="row restaurantmenus-header">
			<div class="col-sm-6 col-xs-12">
				<h1>Restaurant Menus</h1>
				<p class="lead">Enjoy a meal of delicious authentic Thai food at pocket friendly prices!</p>
				<p>With set menus catering from individuals to a family of eight, we make it easy for you to enjoy our specialities!  Alternatively, you can pick from over 90 delectable dishes from our ala carte menu!</p>
			</div>
			<div class="col-sm-6 hidden-xs">
				<img src="<?php _e(base_url("/assets/i/thai-restaurant-in-singapore.jpg")); ?>" alt="Thai Restaurant in Singapore" class="img-responsive pull-right" />
			</div>
		</div><!-- /.row -->
				
		<div class="row restaurantmenus">
			<div  class="col-sm-6 col-md-4">
				<a href="<?php _e(site_url('menu-jaithai.php')); ?>">
					<h3>Jai Thai Menu</h3>
					<img src="<?php _e(base_url('assets/i/restaurant-menu/jaithai-menu.jpg')) ?>" alt="Jai Thai Menu" title="Jai Thai Menu" class="img-responsive" />
				</a>
			</div>
			<div class="col-sm-6 col-md-4">
				<a href="<?php _e(site_url('menu-individual-set.php')); ?>">
					<h3>Individual Set Menu</h3>
					<img src="<?php _e(base_url('assets/i/restaurant-menu/thai-individual-set-menus.jpg')) ?>" alt="Individual Set Menu" title="Individual Set Menu" class="img-responsive" />
				</a>
			</div>
			<div class="clearfix visible-sm visible-xs"></div>
			<div class="col-sm-6 col-md-4">
				<a href="<?php _e(site_url('menu-family-set.php')); ?>">
					<h3>Family Set Menu</h3>
					<img src="<?php _e(base_url('assets/i/restaurant-menu/thai-family-restaurant.jpg')) ?>" alt="Family Set Menu" title="Family Set Menu" class="img-responsive" />
				</a>
			</div>
			<?php /*
 			<div class="col-sm-6 col-md-3">
				<a href="<?php _e(site_url('menu-vegetarian.php')); ?>">
					<h3>Vegetarian Menu</h3>
					<img src="<?php _e(base_url('assets/i/restaurant-menu/thai-vegetarian-food.jpg')) ?>" alt="Thai Vegetarian Menu" title="Thai Vegetarian Menu" class="img-responsive" />
				</a>
			</div>
 			*/	?>
		</div>
	</div><!-- /content -->
</div>
