<?php showStatusMessage($this->session->userdata('statusmessage')); ?>
<?php $this->session->unset_userdata('statusmessage'); ?>
<div id="content" class="row">
	<div class="col-sm-12">
	
		<h1 class="menu">Individual Set Menu (各人套餐) - Lunch Only</h1>
		<p><strong>Serves with choice of</strong></p>
		<ul>
			<li>Lime Juice / Ice Lemon Tea / Hot Coffee / Hot Tea / Chinese Tea  柠檬冰茶／咖啡／茶／中国茶</li>
		</ul>
		
		<div class="row indivset">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<p><img src="<?php _e(base_url('assets/i/restaurant-menu/tom-yum-noodle-set.jpg')); ?>" alt="Tom Yum Noodle Set" title="Tom Yum Noodle Set" class="img-responsive"/></p>
				<p class="settitle">Tom Yum Rice Set</p>
<!--				<p class="setprice">$8.80</p>-->
			</div><!-- /.col -->
			<div class="col-md-3 col-sm-6 col-xs-12">
				<p><img src="<?php _e(base_url('assets/i/restaurant-menu/green-curry-set.jpg')); ?>" alt="Green Curry Set" title="Green Curry Set" class="img-responsive"/></p>
				<p class="settitle">Green Curry Rice Set</p>
<!--				<p class="setprice">$8.80</p>-->
			</div><!-- /.col -->
			<div class="col-md-3 col-sm-6 col-xs-12">
				<p><img src="<?php _e(base_url('assets/i/restaurant-menu/phad-thai-set.jpg')); ?>" alt="Phad Thai Set" title="Phad Thai Set" class="img-responsive"/></p>
				<p class="settitle">Phad Thai Set</p>
<!--				<p class="setprice">$7.80</p>-->
			</div><!-- /.col -->
			<div class="col-md-3 col-sm-6 col-xs-12">
				<p><img src="<?php _e(base_url('assets/i/restaurant-menu/beef-noodle-set.jpg')); ?>" alt="Beef Noodle Set" title="Beef Noodle Set" class="img-responsive"/></p>
				<p class="settitle">Beef Noodle Set</p>
<!--				<p class="setprice">$7.80</p>-->
			</div><!-- /.col -->
		</div><!-- /.row -->
		
		<div class="clearfix"></div>
		
		<div class="row indivset">
			<div class="col-sm-4">
				<p><img src="<?php _e(base_url('assets/i/restaurant-menu/rice-fish-basil-set.jpg')); ?>" alt="Rice with Fish Basil" title="Rice with Fish Basil" class="img-responsive"/></p>
				<p class="settitle">Rice with Fish Basil<br />Rice with Fish Tamarind<br />Rice with Fish Chilli Sauce</p>
<!--				<p class="setprice">$8.80</p>-->
			</div><!-- /.col -->
			<div class="col-sm-4">
				<p><img src="<?php _e(base_url('assets/i/restaurant-menu/pineapple-rice-set.jpg')); ?>" alt="Pineapple Rice Set" title="Pineapple Rice Set" class="img-responsive"/></p>
				<p class="settitle">Pineapple Rice Set</p>
<!--				<p class="setprice">$11.80</p>-->
				<p>* Pineapple Rice<br />
				* Thai Sping Roll<br />
				* Thai Green Curry<br />
				* Fish with Chilli Sauce<br />
				* Pandan Chicken<p>
			</div><!-- /.col -->
			<div class="col-sm-4">
				<p><img src="<?php _e(base_url('assets/i/restaurant-menu/olive-rice-set.jpg')); ?>" alt="Olive Rice Set" title="Olive Rice Set" class="img-responsive"/></p>
				<p class="settitle">Olive Rice Set</p>
<!--				<p class="setprice">$11.80</p>-->
				<p>* Olive Rice<br />
				* Mango Salad<br />
				* Tau Fu Green Curry<br />
				* Fish with Chilli Sauce<br />
				* Fried Mixed Vegetable<p>
			</div><!-- /.col -->
		</div><!-- /.row -->



	</div><!-- /content -->
</div>