<div id="content" class="row">
	<div class="col-sm-12">
	
	
<?php showStatusMessage($this->session->userdata('statusmessage')); ?>
<?php $this->session->unset_userdata('statusmessage'); ?>

<?php 
	if ($orderdata['a_confirmationsent'] == "0000-00-00 00:00:00") {
		$pendingconfirmed = "(Pending)";
		$numbertype = "Order Number";
	}
	else {
		$pendingconfirmed = "(Confirmed)";		
		$numbertype = "Invoice Number";
	}
?>

<h1>Order <?php _e(formatOrderNum($orderdata)); ?> <?php _e($pendingconfirmed); ?></h1>

<div class="orderdetailswrap">
	<table class="orderdetails">
	
		<tr>
			<th nowrap="nowrap"><?php _e($numbertype); ?></th>
			<td><?php _e(formatOrderNum($orderdata)); ?></td>
			<th nowrap="nowrap">Date of Function</th>
			<td><?php _e(date('d-M-Y', strtotime($orderdata['functiondate']))); ?></td>
		</tr>
		
		<?php if ($orderdata['deliverypickup'] == 'pickup'): ?>
			<tr>
				<th nowrap="nowrap">Self-Collect Time</th>
				<td><?php _e($orderdata['timestart']); ?></td>
				<th nowrap="nowrap">Self-Collect Location</th>
				<td><?php _e($orderdata['pickuplocation']); ?>
                    <?php
                    $address = [
                        JT_CW => "7 Clover Way <br/>Singapore 579080",
                        JT_PV => "27 Purvis Street #01-01 <br/>An Chuan Building <br/>Singapore 188604",
                        JT_CK => "200 Pandan Loop #08-06 <br/>Singapore 128388",
                    ];
                    _e("<br/>" . $address[$orderdata['pickuplocation']]);
                    ?>
                </td>
			</tr>
		<?php elseif($orderdata['deliverypickup'] == 'delivery'): ?>
			<tr>
				<th nowrap="nowrap">Ready to Eat Time</th>
				<td><?php _e($orderdata['timestart']); ?></td>
				<th nowrap="nowrap">Collection Time</th>
				<td><?php _e($orderdata['timeend']); ?></td>
			</tr>
            <tr>
                <th nowrap="nowrap">Type of Function</th>
                <td colspan="3"><?php _e($orderdata['typeoffunction']); ?></td>
            </tr>
		<?php endif; ?>
		
		<tr>
			<th nowrap="nowrap">Contact Person</th>
			<td><?php _e($orderdata['name']); ?></td>
			<th nowrap="nowrap">Email Address</th>
			<td>
			<?php
				_e($orderdata['email']);
				if ($orderdata['email2']) {
					_e('<br/>' . $orderdata['email2']);
				}
			?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">Telephone No</th>
			<td><?php _e($orderdata['telephone']); ?></td>
			<th nowrap="nowrap">Mobile No</th>
			<td>
			<?php
				_e($orderdata['mobile']);
				if ($orderdata['mobile2']) {
					_e('<br/>' . $orderdata['mobile2']);
				}
			?>
			</td>
		</tr>
		<tr>
            <th nowrap="nowrap">Delivery Address</th>
            <td>
                <?php _e($orderdata["company"] ? $orderdata['company'] . "<br />": ""); ?>
                <?php _e($orderdata['address'] ); ?>
				<?php _e($orderdata["unitnum"] ? $orderdata['unitnum'] : ""); ?>
				<?php _e($orderdata["buildingname"] ? "<br />" . $orderdata['buildingname'] : ""); ?>
				<?php _e("<br />Singapore " . $orderdata['postalcode']); ?>
				<?php _e(setuparea($orderdata['setuparea'], $orderdata['accessiblebylift'])); ?>
                <?php if ($orderdata['cutleryrequired']) { _e("<br/>Cutlery Required:" . $orderdata['cutleryrequired']); } ?>
                <?php if ($orderdata['tablesrequired']) { _e("<br/>Tables Required:" . $orderdata['tablesrequired']); } ?>
            </td>
            <th nowrap="nowrap">Billing Address</th>
            <td>
				<?php if ($orderdata['sameasdelivery']): ?>
                    <?php _e($orderdata["company"] ? $orderdata['company'] . "<br />": ""); ?>
					<?php _e($orderdata['address'] ); ?>
					<?php _e($orderdata["unitnum"] ? $orderdata['unitnum'] : ""); ?>
					<?php _e($orderdata["buildingname"] ? "<br />" . $orderdata['buildingname'] : ""); ?>
					<?php _e("<br />Singapore " . $orderdata['postalcode']); ?>
				<?php else: ?>
					<?php _e($orderdata["billcompany"] ? $orderdata['billcompany'] . "<br />": ""); ?>
					<?php _e($orderdata['billaddress'] ); ?>
					<?php _e($orderdata["billunitnum"] ? $orderdata['billunitnum'] : ""); ?>
					<?php _e($orderdata["billbuildingname"] ? "<br />" . $orderdata['billbuildingname'] : ""); ?>
					<?php _e("<br />Singapore " . $orderdata['billpostalcode']); ?>
				<?php endif; ?>
            </td>
		</tr>
		<tr>
			<th nowrap="nowrap">Order Date</th>
			<td><?php _e(date('d-M-Y', strtotime($orderdata['ordertime']))); ?></td>
			<th nowrap="nowrap">Payment Mode</th>
			<td><?php _e($orderdata['paymentmode']); ?></td>
		</tr>
		<tr>
			<th>Communication Preference</th>
			<td colspan="3"><?php _e($orderdata['communicationpreference']); ?></td>
		</tr>
		<tr>
			<th>Notes</th>
			<td colspan="3"><?php _e($orderdata['notes']); ?></td>
		</tr>

	</table>
</div>

	
<?php $cart = $orderdata['items']; ?>
<?php $cart = unserialize($cart); ?>

<table class="shoppingcart">

	<thead>
		<tr>
			<th>S/No</th>
			<th>Menu Details</th>
			<th>Num Pax</th>
			<th>Total</th>
		</tr>
	</thead>
	
	<tbody>
	
		<?php $i = 1;?>
		<?php $cartitems = $cart['items']; ?>
		
		<?php if (is_array($cartitems) && sizeof($cartitems)) : ?>
		
			<?php foreach($cartitems as $key => $cartitem): ?>
			
				<?php if ($cartitem['menutype'] == JT_SETMENU): ?>
					<tr>
						<td><?php _e($i++); ?></td>
						<td>
							<p><strong>
								<?php _e($cartitem['title']) ?>
								<?php if ($cartitem['addondrink'] != "No Drink"): ?>
									 (with Drink)
								<?php endif;?>								
								@ $<?php _e($cartitem['perpax']) ?> Per Pax
							</strong></p>
							<ol>
								<?php foreach($cartitem['dishes'] as $dish): ?>
									<li><?php _e($dish); ?></li>
								<?php endforeach;?>
								<?php if ($cartitem['addondrink'] != "No Drink"): ?>
									<li><?php _e($cartitem['addondrink']); ?></li>
								<?php endif;?>
							</ol>
						</td>
						<td><?php _e($cartitem['numpax']) ?> pax</td>
						<td><?php _e(sprintf("$%.2f", $cartitem['foodprice'])); ?></td>
					</tr>
					
				<?php elseif ($cartitem['menutype'] == JT_ALACARTEMENU): ?>
	
					<tr>
						<td><?php _e($i++); ?></td>
						<td>
							<p><strong><?php _e($cartitem['title']) ?></strong></p>
							<ol>
								<?php foreach($cartitem['dishes'] as $dish): ?>
									<li><?php _e($dish['name']); ?></li>
								<?php endforeach;?>
							</ol>
						</td>
						<td>
							<p>&nbsp;</p>
							<p>
								<?php foreach($cartitem['dishes'] as $dish): ?>
									<?php $servings = $dish['qty'] * $dish['serves']; ?>
									<?php _e("Serves " . $servings . " pax"); ?><br />
									<?php 
										//pad a few lines below, depending on how many <br /> the dish name has (bento sets)
										$num_brs = substr_count($dish['name'], "<br />");
										while ($num_brs > 0) { _e('<br />'); $num_brs--; }
									?>
								<?php endforeach;?>
							</p>
						</td>
						<td>
							<p>&nbsp;</p>
							<p>
								<?php foreach($cartitem['dishes'] as $dish): ?>
									<?php $price = $dish['qty'] * $dish['price']; ?>
									<?php _e(sprintf("$%0.2f", $price)); ?><br />
									<?php 
										//pad a few lines below, depending on how many <br /> the dish name has (bento sets)
										$num_brs = substr_count($dish['name'], "<br />");
										while ($num_brs > 0) { _e('<br />'); $num_brs--; }
									?>
								<?php endforeach;?>
							</p>
						</td>
					</tr>
                <?php elseif ($cartitem['menutype'] == JT_MISCITEM): ?>

                    <tr>
                        <td><?php _e($i++); ?></td>
                        <td>
                            <p><strong><?php _e($cartitem['title']) ?></strong></p>
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>

				<?php endif; ?>
			
			<?php endforeach; ?>
			
		<?php else: ?>
		
			<tr><td colspan="4">
				<div class="emptycart">You have no items in your cart</div>
			</td></tr>
		
		<?php endif; //emptycart ?>
	</tbody>
	
	<tfoot>
		<tr>
			<th>&nbsp;</th>
			<th>Food Total</th>
			<th>&nbsp;</th>
			<th><?php _e(sprintf("$%0.2f", $cart['foodprice'])); ?></th>
		</tr>
		<?php if ($cart['chargeforcontainers'] && $cart['containerprice'] > 0): ?>
			<tr>
				<th>&nbsp;</th>
				<th>Container Fee Total</th>
				<th>&nbsp;</th>
				<th><?php _e(sprintf("$%0.2f", $cart['containerprice'])); ?></th>
			</tr>		
		<?php endif; ?>	
		<tr>
			<th>&nbsp;</th>
			<th>Transportation Fee</th>
			<th>&nbsp;</th>
			<th>
				<?php if ($orderdata['deliverypickup'] == 'pickup'): ?>
					$0.00
				<?php elseif($orderdata['deliverypickup'] == 'delivery'): ?>
					<?php _e(sprintf("$%0.2f", $cart['deliveryprice'])); ?>
				<?php endif; ?>
			</th>
		</tr>
		<?php
		if (array_key_exists('surcharges', $cart)):
			$surcharges = $cart['surcharges'];
			if (is_array($surcharges) && sizeof($surcharges)):
				foreach($surcharges as $key => $value):
					?>
					<tr>
						<th>&nbsp;</th>
						<th><?php _e($key); ?></th>
						<th>&nbsp;</th>
						<th><?php _e(sprintf("$%0.2f", $value)); ?></th>
					</tr>
					<?php
				endforeach;
			endif;
		endif;
		?>
		<tr>
			<th>&nbsp;</th>
			<th>Grand Total</th>
			<th>&nbsp;</th>
			<th><?php _e(sprintf("$%0.2f", $orderdata['ordertotalprice'])); ?></th>
		</tr>
	</tfoot>
	
</table>

<div class="tnc">
	<p><strong>Notes:</strong></p>
	<ul>
	
		<?php if (($orderdata['paymentmode'] == "Cheque") && ($orderdata['a_assignedoutlet'] != "")): ?>
			<li>Payment mode: Cheque payable to "<strong style='font-size: 110%; color: #ff0000;'><?php _e(outletbusinessname($orderdata['a_assignedoutlet'])); ?></strong>"</li>
		<?php elseif ($orderdata['paymentmode'] == "PayNow"): ?>
            <li>Payment mode: PayNow to 201008118H002 (Thai Kitchen Pte Ltd)<br />
                Please indicate order number <strong><?php _e(formatOrderNum($orderdata)); ?></strong> in the transfer note.</li>
		<?php elseif ($orderdata['paymentmode'] == "PayNow UEN"): ?>
            <li>Payment mode: PayNow to 201008118H002 (Thai Kitchen Pte Ltd)<br />
                Please indicate order number <strong><?php _e(formatOrderNum($orderdata)); ?></strong> in the transfer note.</li>
		<?php elseif ($orderdata['paymentmode'] == "PayNow UEN (Thaicoon Aunt)"): ?>
            <li>Payment mode: PayNow to 201019918Z (Thaicoon Aunt Pte Ltd)<br />
                Please indicate order number <strong><?php _e(formatOrderNum($orderdata)); ?></strong> in the transfer note.</li>
		<?php else : ?>
			<li>Payment mode: <?php _e($orderdata['paymentmode']); ?></li>
		<?php endif; ?>
		
		<?php if ($cart['chargeforcontainers']) : ?>
			<li>Food will be prepared in disposable trays, no buffet table set-up.</li>
			<li>Disposable plates, forks &amp; spoons and chilli sauce will be provided.</li>
		<?php else: ?>
			<li>Complete buffet layout with warmers, tables, and tablecloth will be provided.</li>
			<li>Full set of disposable wares (plates, forks and spoons, chilli, serviettes and garbage bags).</li>
		<?php endif; ?>
		
	</ul>
</div>



<p><a href="<?php _e(site_url()); ?>">Back to Home Page</a> </p>

<?php if (!KA_TEST) : //Adwords Tracking Pixel ?>

	<!-- Google Code for Catering Order Placed Conversion Page -->
	<script type="text/javascript">
	/* <![CDATA[ */
	var google_conversion_id = 1046832504;
	var google_conversion_language = "en";
	var google_conversion_format = "3";
	var google_conversion_color = "ffffff";
	var google_conversion_label = "-mAdCNjprQkQ-MqV8wM";
	var google_conversion_value = 0;
	var google_remarketing_only = false;
	/* ]]> */
	</script>
	<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
	</script>
	<noscript>
	<div style="display:inline;">
	<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1046832504/?value=0&amp;label=-mAdCNjprQkQ-MqV8wM&amp;guid=ON&amp;script=0"/>
	</div>
	</noscript>

<?php endif;  ?>


	</div><!-- /content -->
</div>