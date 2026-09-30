<?php showStatusMessage($this->session->userdata('statusmessage')); ?>
<?php $this->session->unset_userdata('statusmessage'); ?>
<div id="content" class="row">
	<div class="col-sm-12">
		<h1>Family Set Menu</h1>
		<div class="row">
			<div class="col-sm-9 col-sm-push-3">
			
				<div class="row familyset">
			
					<div class="col-sm-6">
						<div class="settitle">Set A </div>
						<div class="forpax">for 2 pax</div>
						<p>&bull; Tom Yum Seafood<br />
							&bull; Fish Chilli Sauce (Tilapia) <small>(or any cooking style)</small><br />
							&bull; Fried Mixed Vegetable<br />
							&bull; Steamed Rice</p>
					</div>
					<div class="col-sm-6">
						<div class="settitle">Set B </div>
						<div class="forpax">for 3 - 4 pax</div>
						<p>&bull; Prawn Cake<br />
							&bull; Tom Yum Seafood<br />
							&bull; Fish Chilli Sauce (Tilapia) <small>(or any cooking style)</small><br />
							&bull; Fried Chicken Cashew Nut<br />
							&bull; Fried Mixed Vegetable<br />
							&bull; Steamed Rice</p>
					</div>
					
					<div class='clearfix'></div>
					
					<div class="col-sm-6">
						<div class="settitle">Set C </div>
						<div class="forpax">for 5 - 6 pax</div>
						<p>&bull; Prawn Cake<br />
							&bull; Mango Salad<br />
							&bull; Tom Yum Seafood<br />
							&bull; Fish Chilli Sauce (Seabass) <small>(or any cooking style)</small><br />
							&bull; Fried Chicken Cashew Nut<br />
							&bull; Fried Mixed Vegetable<br />
							&bull; Steamed Rice</p>
					</div>
					<div class="col-sm-6">
						<div class="settitle">Set D </div>
						<div class="forpax">for 8 pax</div>
						<p>&bull; Prawn Spring Rolls<br />
							&bull; Mango Salad<br />
							&bull; Tom Yum Seafood<br />
							&bull; Fish Chilli Sauce (Seabass) <small>(or any cooking style)</small><br />
							&bull; Fried Chicken Cashew Nut<br />
							&bull; Prawn Tamarind Sauce<br />
							&bull; Fried Mixed Vegetable<br />
							&bull; Steamed Rice</p>
					</div>
				
				</div>
				
				<div class='clearfix'></div>
			</div><!-- /.col -->
			
			<div class="col-sm-3 col-sm-pull-9 hidden-xs">
				<img src="<?php _e(base_url('assets/i/restaurant-menu/family-set.jpg')); ?>" alt="Family Set" title="Family Set"/>
			</div><!-- /.col -->
			
		</div><!-- /.row -->

		<div class="col-sm-12 changerice">
			Add $1.50 per person to change to <br class="visible-sm visible-xs" />Pineapple Rice or Olive Rice
			<img src="<?php _e(base_url('assets/i/restaurant-menu/changerice.png')) ?>" alt="Pineapple Rice" class="hidden-xs"/>
		</div>


	</div><!-- /content -->
</div>