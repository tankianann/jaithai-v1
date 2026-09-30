<?php showStatusMessage($this->session->userdata('statusmessage')); ?>
<?php $this->session->unset_userdata('statusmessage'); ?>
<div id="content" class="row">
	<div class="col-sm-12">
	
	
		<h1>Jai Thai Menu</h1>
		
		<img src="<?php _e(base_url('assets/i/restaurant-menu/jaithai-menu-banner.jpg')); ?>" alt="Favourite Dishes" title="Favourites Dishes" class="img-responsive hidden-xs"/>

		<p class="foodmenu-legend">
			<img src="<?php _e(base_url('assets/i/speciality.png')); ?>" alt="Jai Thai Speciality" title="Jai Thai Speciality"/> Jai Thai's Speciality
			<img src="<?php _e(base_url('assets/i/spicy.gif')); ?>" alt="Spicy Dish" title="Spicy Dish"/> Spicy Dish &nbsp;&nbsp;
			<!-- <img src="<?php _e(base_url('assets/i/kid.gif')); ?>" alt="Kid's Favourite" title="Kid's Favourite"/> Kid's Favourite &nbsp;&nbsp; -->
		</p>

		<div class='row'>
			<div class="col-md-9 col-sm-12">

				<table class="foodmenu">
					<?php $i = 1; ?>
					<tr><th colspan="4">Appetizer (小吃)</th></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(1); ?><td>Prawn Cake</td></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(1); ?><td>Fish Cake</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(1); ?><td>Prawn Spring Rolls</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Vegetable Spring Rolls</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Deep Fried Bean Curd</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(1); ?><td>Mixed Platter</td></tr>
					<tr><th colspan="4">Salad (沙拉)</th></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(1); ?><td>Mango Salad</td></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(1); ?><td>Tang Hoon Seafood Salad</td></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Seafood Salad</td></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Beef Salad</td></tr>
					<tr><th colspan="4">Soup &amp; Curry (汤类和咖喱)</th></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(1); ?><td>Green Curry Chicken / Beef</td></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(1); ?><td>Green Curry Prawn / Fish</td></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Red Curry Chicken / Beef</td></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(1); ?><td>Red Curry Prawn / Fish</td></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Panang (Dried Curry) Chicken / Beef</td></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Panang (Dried Curry) Prawn / Fish</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Vegetable Seafood Soup</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Bean Curd Seafood Clear Soup</td></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(1); ?><td>Tom Yum Seafood (Clear Soup / Chilli Paste)</td></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(1); ?><td>Tom Yum Prawn (Clear Soup / Chilli Paste)</td></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Tom Yum Chicken (Clear Soup / Chilli Paste)</td></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Tom Kha Chicken (Blue Ginger Soup - Chicken)</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(1); ?><td>Beef Soup</td></tr>
					<tr><th colspan="4">Prawn ( 虾类)</th></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(1); ?><td>Fried Prawn with Chilli Paste</td></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(1); ?><td>Fried Prawn with Basil Leaf</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Fried Prawn with Curry Powder</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Fried Prawn with Pepper &amp; Garlic</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(1); ?><td>Fried Prawn with Tamarind Sauce</td></tr>
					<tr><th colspan="4">Squid (苏东类)</th></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Fried Squid with Pepper &amp; Garlic</td></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Fried Squid with Chilli Paste</td></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Fried Squid with Basil Leaf</td></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Steamed Squid with Chilli Lemon</td></tr>
					<tr><th colspan="4">Fish (鱼类)</th></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(1); ?><td>Deep Fried Fish Fillet with Chilli Sauce</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Deep Fried Fish Fillet with Pepper &amp; Garlic</td></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Deep Fried Fish Fillet with Basil Leaf</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(1); ?><td>Deep Fried Fish Fillet with Sweet &amp; Sour Sauce</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(1); ?><td>Deep Fried Fish Fillet with Tamarind Sauce</td></tr>
					<tr><th colspan="4">Beef (牛类)</th></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Steamed Tofu with Beef Basil</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Steamed Tofu with Beef Pepper &amp; Garlic</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Fried Beef with Pepper &amp; Garlic</td></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(1); ?><td>Fried Beef with Basil Leaf</td></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(1); ?><td>Fried Beef with Chilli Paste</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Fried Beef with Oyster Sauce</td></tr>
					<tr><th colspan="4">Chicken (鸡类)</th></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(1); ?><td>Steamed Tofu with Chicken Basil</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(1); ?><td>Steamed Tofu with Chicken Pepper &amp; Garlic</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(1); ?><td>Pandan Chicken</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(1); ?><td>Fried Chicken with Cashew Nut</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Deep Fried Lemon Leaf Chicken</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Stir Fried Chicken with Oyster Sauce</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Fried Chicken Pepper &amp; Garlic</td></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(1); ?><td>Fried Chicken with Basil Leaf</td></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Fried Chicken with Chilli Paste</td></tr>
					<tr><th colspan="4">Vegetable (疏菜)</th></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Fried Kang Kong</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Fried Kai Lan Oyster Sauce</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Fried Kai Lan Salted Fish</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Fried Kai Lan with Chinese Mushroom</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Fried Kai Lan with Prawn</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Fried Bean Sprout</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Fried Bean Sprout Salted Fish</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Fried Mixed Vegetable</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Fried Mixed Vegetable w/ Chinese Mushroom</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Fried Mixed Vegetable w/ Prawn</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Fried Cabbage Oyster Sauce</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Fried Cabbage with Chinese Mushroom</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Fried Cabbage with Prawn</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Fried Brocolli Oyster Sauce</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Fried Brocolli Chinese Mushroom</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Fried Brocolli Prawn</td></tr>
					<tr><th colspan="4">Rice &amp; Noodle (饭/面)</th></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Pineapple Rice</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Olive Rice</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Salted Fish Fried Rice</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Chicken / Beef Fried Rice</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Seafood Fried Rice</td></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Fried Rice with Chicken Basil Leaf</td></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Fried Rice with Seafood Basil Leaf</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(1); ?><td>Fried Tang Hoon</td></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Phad Kee Mao Chicken / Beef</td></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Phad Kee Mao Seafood</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Fried Bee Hoon with Dark Sauce Chicken</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Fried Bee Hoon with Dark Sauce Seafood</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Phad Thai Chicken</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(1); ?><td>Phad Thai Prawn</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(1); ?><td>Phad Thai Seafood</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(1); ?><td>Beef Noodle</td></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Tom Yum Chicken Noodle</td></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(1); ?><td>Tom Yum Seafood Noodle</td></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(1); ?><td>Green Curry Noodle</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Phad See Eiw Chicken</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Phad See Eiw Seafood</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Steamed Rice</td></tr>
					<tr><th colspan="4">Omelette (芙蓉蛋) </th></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Plain Omelette</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Vegetable Omelette</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Minced Chicken Omelette</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Prawn Meat Omelette</td></tr>
					<tr><th colspan="4">Tang Hoon Special (冬粉)</th></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(1); ?><td>Baked Prawn Tanghoon</td></tr>
					<tr><?php kidspicy(0); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Baked Beancurd Tanghoon</td></tr>
					<tr><th colspan="4">Basil Special </th></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Rice with Chicken Basil</td></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Rice with Beef Basil</td></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Rice with Fish Basil</td></tr>
					<tr><?php kidspicy(2); _e("<td>" . $i++ . ".</td>"); speciality(0); ?><td>Rice with Seafood Basil</td></tr>
				</table>
				<p>* All prices are subjected to 10% service charge.</p>


			
			</div>
			<div class="col-md-3 hidden-sm hidden-xs text-center">
				<img src="<?php _e(base_url('assets/i/restaurant-menu/mixed-platter.jpg')); ?>" alt="Mixed Platter" title="Mixed Platter"/>
				<br />Mixed Platter
				<br /><br />
				<br /><img src="<?php _e(base_url('assets/i/restaurant-menu/tom-yum-seafood.jpg')); ?>" alt="Fried Prawn with Tamarind Sauce" title="Fried Prawn with Tamarind Sauce"/>
				<br />Fried Prawn with Tamarind Sauce
				<br /><br />
				<br /><img src="<?php _e(base_url('assets/i/restaurant-menu/prawn-tamarind-sauce.jpg')); ?>" alt="Deep Fried Fish Fillet Chilli Sauce" title="Deep Fried Fish Fillet Chilli Sauce"/>
				<br />Deep Fried Fish Fillet<br />Chilli Sauce
				<img src="<?php _e(base_url('assets/i/restaurant-menu/steamed-toufu-chicken-basil.jpg')); ?>" alt="Steamed Tau Fu Chicken Basil Pepper and Garlic" title="Steamed Tau Fu Chicken Basil Pepper and Garlic"/>
				<br />Steamed Tofu w/ Chicken Basil
				<br /><br />
				<br /><img src="<?php _e(base_url('assets/i/restaurant-menu/fried-mixed-vegetables.jpg')); ?>" alt="Fried Mixed Vegetables" title="Fried Mixed Vegetables"/>
				<br />Fried Mixed Vegetables
				<br /><br />
				<br /><img src="<?php _e(base_url('assets/i/restaurant-menu/green-curry-noodle.jpg')); ?>" alt="Green Curry Noodle" title="Green Curry Noodle"/>
				<br />Green Curry Noodle
				<br /><br />
				<br /><img src="<?php _e(base_url('assets/i/restaurant-menu/beef-noodle.jpg')); ?>" alt="Beef Noodle" title="Beef Noodle"/>
				<br />Beef Noodle
				<br /><br />
				<br /><img src="<?php _e(base_url('assets/i/restaurant-menu/baked-tofu-tang-hoon.jpg')); ?>" alt="Baked Beancurd Tanghoon" title="Baked Beancurd Tanghoon"/>
				<br />Baked Beancurd Tanghoon
				<br /><br />
				<br /><img src="<?php _e(base_url('assets/i/restaurant-menu/rice-chicken-basil.jpg')); ?>" alt="Fried Rice with Chicken Basil Leaf" title="Fried Rice with Chicken Basil Leaf"/>
				<br />Rice with Chicken Basil
			</div>
		</div><!-- /.col -->


	</div><!-- /content -->
</div>