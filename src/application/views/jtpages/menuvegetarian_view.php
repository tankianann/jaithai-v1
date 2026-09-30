<?php showStatusMessage($this->session->userdata('statusmessage')); ?>
<?php $this->session->unset_userdata('statusmessage'); ?>
<div id="content" class="row">
	<div class="col-sm-12">
	
	
		<h1>Vegetarian Menu</h1>
		
		<table class="vegemenu">
			<?php $n = 1; ?>
			<tr><th colspan="2">Appetizers</th><th>S</th><th>M</th><th>L</th></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Deep Fried Bean Curd</td><td>$5</td><td>$7</td><td>$10</td></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Vegetarian Spring Rolls</td><td>$5</td><td>$7</td><td>$10</td></tr>
			<tr><th colspan="5">Salad</th></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Mango Salad</td><td>$6</td><td>$9</td><td>$12</td></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Carrot Salad</td><td>$6</td><td>$9</td><td>$12</td></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Tang Hoon Salad</td><td>$6</td><td>$9</td><td>$12</td></tr>
			<tr><th colspan="5">Soup</th></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Tom Yum Soup</td><td>$6</td><td>$9</td><td>$12</td></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Tom Kha Soup (Blue Ginger Soup)</td><td>$6</td><td>$9</td><td>$12</td></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Green Curry</td><td>$6</td><td>$9</td><td>$12</td></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Red Curry</td><td>$6</td><td>$9</td><td>$12</td></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Panang Curry</td><td>$6</td><td>$9</td><td>$12</td></tr>
			<tr><th colspan="5">Bean Curd</th></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Steamed Tofu with Basil Sauce</td><td>$8</td></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Steamed Tofu with Pepper &amp; Garlic</td><td>$8</td></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Baked Bean Curd Tang Hoon</td><td>$10</td></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Bean Curd Basil Leaf</td><td>$7</td><td>$10</td><td>14</td></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Bean Curd with Pepper & Garlic</td><td>$7</td><td>$10</td><td>14</td></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Bean Curd with Cashew Nut</td><td>$7</td><td>$10</td><td>14</td></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Baked Bean Curd Tamarind Sauce</td><td>$7</td><td>$10</td><td>14</td></tr>
			<tr><th colspan="5">Vegetable</th></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Fried Kang Kong</td><td>$6</td><td>$9</td><td>$12</td></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Fried Kai Lan</td><td>$6</td><td>$9</td><td>$12</td></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Fried Kai Lan Chinese Mushroom</td><td>$6</td><td>$9</td><td>$12</td></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Mixed Vegetable</td><td>$6</td><td>$9</td><td>$12</td></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Mixed Vegetable Chinese Mushroom</td><td>$6</td><td>$9</td><td>$12</td></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Fried Broccoli</td><td>$7</td><td>$10</td><td>14</td></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Fried Broccoli Chinese Mushroom</td><td>$7</td><td>$10</td><td>14</td></tr>
			<tr><th colspan="5">Rice &amp; Noodle</th></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Olive Rice</td><td>$5</td><td>$8</td><td>$10</td></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Pineapple Rice</td><td>$5</td><td>$8</td><td>$10</td></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Fried Rice Vegetarian</td><td>$6</td><td>$9</td><td>$12</td></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Fried Rice Basil Leaf</td><td>$6</td><td>$9</td><td>$12</td></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Phad Thai Vegetarian</td><td>$6</td><td>$9</td><td>$12</td></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Fried Tang Hoon Vegetarian</td><td>$6</td><td>$9</td><td>$12</td></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Phad See Eiw Vegetarian</td><td>$6</td><td>$9</td><td>$12</td></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Phad Kee Mao Vegetarian</td><td>$6</td><td>$9</td><td>$12</td></tr>
			<tr><td><?php echo $n++; ?>.</td><td>Fried Bee Hoon Vegetarian</td><td>$6</td><td>$9</td><td>$12</td></tr>
		</table>



	</div><!-- /content -->
</div>