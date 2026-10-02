<?php
	if ($orderdata['a_confirmationsent'] == "0000-00-00 00:00:00") {
		$pendingconfirmed = "(Pending)";
		$pdftitle = "Order";
	}
	else {
		$pendingconfirmed = "(Confirmed)";
		$pdftitle =  "Tax Invoice";
//		$pdftitle =  "Quotation";
	}
	if (isset($custom_pdf_title)) {
		$pendingconfirmed = "";
		$pdftitle = $custom_pdf_title;
	}
    $cart = $orderdata['items'];
    $cart = unserialize($cart);
?>

<p><strong style="font-size: 110%"><?php _e($pdftitle); ?> <?php _e(formatOrderNum($orderdata)); ?> <?php _e($pendingconfirmed); ?></strong></p>

<div class="orderdetailswrap">
	<table class="orderdetails" cellspacing="0" cellpadding="0" style="border-collapse: collapse; width: 100%; ">
	
		<tr>
			<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" nowrap="nowrap"><?php _e($pdftitle); ?> Number</th>
			<td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;"><?php _e(formatOrderNum($orderdata)); ?></td>
			<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" nowrap="nowrap">Date of Function</th>
			<td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;"><?php _e(date('d-M-Y', strtotime($orderdata['functiondate']))); ?></td>
		</tr>
		
		<?php if ($orderdata['deliverypickup'] == 'pickup'): ?>
			<tr>
				<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" nowrap="nowrap">Self-Collect Time</th>
				<td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;"><?php _e($orderdata['timestart']); ?></td>
				<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" nowrap="nowrap">Self-Collect Location</th>
				<td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">
                    <?php _e($orderdata['pickuplocation']); ?>
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
				<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" nowrap="nowrap">Ready to Eat Time</th>
				<td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;"><?php _e($orderdata['timestart']); ?></td>
                <th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" nowrap="nowrap">Collection Time</th>
                <?php if ($cart['chargeforcontainers']) : ?>
                    <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">-</td>
                <?php else: ?>
                    <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;"><?php _e($orderdata['timeend']); ?></td>
                <?php endif; ?>
			</tr>
            <tr>
                <th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" nowrap="nowrap">Type of Function</th>
                <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" colspan="3"><?php _e($orderdata['typeoffunction']); ?></td>
            </tr>

		<?php endif; ?>
		
		<tr>
			<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" nowrap="nowrap">Contact Person</th>
			<td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;"><?php _e($orderdata['name']); ?></td>
			<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" nowrap="nowrap">Email Address</th>
			<td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">
				<?php
				_e($orderdata['email']);
				if ($orderdata['email2']) {
					_e('<br/>' . $orderdata['email2']);
				}
				?>
			</td>
		</tr>
		<tr>
			<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" nowrap="nowrap">Telephone No</th>
			<td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;"><?php _e($orderdata['telephone']); ?></td>
			<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" nowrap="nowrap">Mobile No</th>
			<td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">
				<?php
				_e($orderdata['mobile']);
				if ($orderdata['mobile2']) {
					_e('<br/>' . $orderdata['mobile2']);
				}
				?>
			</td>
		</tr>
		
		<?php if($orderdata['deliverypickup'] == 'delivery'): ?>
			<tr>
                <th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" nowrap="nowrap">Delivery Address</th>
                <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">
                    <?php _e($orderdata["company"] ? $orderdata['company'] . "<br />": ""); ?>
                    <?php _e($orderdata['address'] ); ?>
					<?php _e($orderdata["unitnum"] ? $orderdata['unitnum'] : ""); ?>
					<?php _e($orderdata["buildingname"] ? "<br />" . $orderdata['buildingname'] : ""); ?>
					<?php _e("<br />Singapore " . $orderdata['postalcode']); ?>
					<?php _e(setuparea($orderdata['setuparea'], $orderdata['accessiblebylift'])); ?>
                    <?php if ($orderdata['cutleryrequired']) { _e("<br/>Cutlery Required:" . $orderdata['cutleryrequired']); } ?>
                    <?php if ($orderdata['tablesrequired']) { _e("<br/>Tables Required:" . $orderdata['tablesrequired']); } ?>
                </td>
                <th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" nowrap="nowrap">Billing Address</th>
                <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">
					<?php if ($orderdata['sameasdelivery']): ?>
                        <?php _e($orderdata["company"] ? $orderdata['company'] . "<br />": ""); ?>
						<?php _e($orderdata['address'] ); ?>
						<?php _e($orderdata["unitnum"] ? $orderdata['unitnum'] : ""); ?>
						<?php _e($orderdata["buildingname"] ? "<br />" . $orderdata['buildingname'] : ""); ?>
						<?php _e("<br />Singapore " . $orderdata['postalcode']); ?>
					<?php else: ?>
						<?php _e($orderdata["billcompany"] ? $orderdata['billcompany'] . "<br />": ""); ?>
						<?php _e($orderdata['billaddress'] ); ?>
						<?php _e($orderdata["billunitnum"] ? $orderdata['unitnum'] : ""); ?>
						<?php _e($orderdata["billbuildingname"] ? "<br />" . $orderdata['billbuildingname'] : ""); ?>
						<?php _e("<br />Singapore " . $orderdata['billpostalcode']); ?>
					<?php endif; ?>
                </td>
			</tr>
		<?php endif; ?>

		<tr>
			<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" nowrap="nowrap">Order Date</th>
			<td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;"><?php _e(date('d-M-Y', strtotime($orderdata['ordertime']))); ?></td>
			<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" nowrap="nowrap">Payment Mode</th>
			<td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">
                <?php _e($orderdata['paymentmode']); ?>
                <?php if (
	                ($orderdata['a_confirmationsent'] != "0000-00-00 00:00:00") &&
	                ($orderdata['a_paid'] == "0000-00-00 00:00:00") &&
	                ($orderdata['paymentmode'] == "Credit Card / Paypal")
                ): ?>
                    <br><a href="https://www.jai-thai.com/cart/acknowledgeorder?oh=<?php echo $orderdata['orderhash']; ?>">Payment Link</a>
                <?php endif; ?>
            </td>
		</tr>
		<tr>
			<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">Notes</th>
			<td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" colspan="3"><?php _e($orderdata['notes']); ?></td>
		</tr>

	</table>
</div>

<table class="shoppingcart" style="margin-top: 20px; border-collapse: collapse; width: 100%;">

	<thead>
		<tr>
			<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">S/No</th>
			<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">Menu Details</th>
			<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">Num Pax</th>
			<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">Total</th>
		</tr>
	</thead>
	
	<tbody>
	
		<?php $i = 1;?>
		<?php $cartitems = $cart['items']; ?>
		
		<?php if (is_array($cartitems) && sizeof($cartitems)) : ?>
		
			<?php foreach($cartitems as $key => $cartitem): ?>
			
				<?php if ($cartitem['menutype'] == JT_SETMENU): ?>
					<tr>
						<td style="text-align:left; vertical-align: top; padding: 5px; border-left: 1px solid #333; border-right: 1px solid #333;"><?php _e($i++); ?></td>
						<td style="text-align:left; vertical-align: top; padding: 5px; border-left: 1px solid #333; border-right: 1px solid #333;">
							<p style="margin-top: 0; padding-top: 0;"><strong>
								<?php _e($cartitem['title']) ?>
								<?php if ($cartitem['addondrink'] != "No Drink"): ?>
									 (with Drink)
								<?php endif;?>								
								@ $<?php _e($cartitem['perpax']) ?> Per Pax
							</strong></p>
                            <?php if (orderUsesUnnumberedSetMenu($orderdata['id'])): ?>
                                <?php foreach($cartitem['dishes'] as $dish) { _e($dish . "<br />"); }  ?>
                            <?php else : ?>
							<ol>
								<?php foreach($cartitem['dishes'] as $dish): ?>
									<li><?php _e($dish); ?></li>
								<?php endforeach;?>
								<?php if ($cartitem['addondrink'] != "No Drink"): ?>
									<li><?php _e($cartitem['addondrink']); ?></li>
								<?php endif;?>
							</ol>
                            <?php endif;?>
						</td>
						<td style="text-align:left; vertical-align: top; padding: 5px; border-left: 1px solid #333; border-right: 1px solid #333;"><?php _e($cartitem['numpax']) ?> pax</td>
						<td style="text-align:left; vertical-align: top; padding: 5px; border-left: 1px solid #333; border-right: 1px solid #333;"><?php _e(sprintf("$%0.2f", $cartitem['foodprice'])); ?></td>
					</tr>
					
				<?php elseif ($cartitem['menutype'] == JT_ALACARTEMENU): ?>
	
					<tr>
						<td style="text-align:left; vertical-align: top; padding: 5px; border-left: 1px solid #333; border-right: 1px solid #333;"><?php _e($i++); ?></td>
						<td style="text-align:left; vertical-align: top; padding: 5px; border-left: 1px solid #333; border-right: 1px solid #333;">
							<p style="margin-top: 0; padding-top: 0;"><strong><?php _e($cartitem['title']) ?></strong></p>
							<ol>
								<?php foreach($cartitem['dishes'] as $dish): ?>
									<li><?php _e($dish['name']); ?></li>
								<?php endforeach;?>
							</ol>
						</td>
						<td style="text-align:left; vertical-align: top; padding: 5px; border-left: 1px solid #333; border-right: 1px solid #333;">
							<p style="margin-top: 0; padding-top: 0;">&nbsp;</p>
							<p style="margin-top: 0; padding-top: 0;">
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
						<td style="text-align:left; vertical-align: top; padding: 5px; border-left: 1px solid #333; border-right: 1px solid #333;">
							<p style="margin-top: 0; padding-top: 0;">&nbsp;</p>
							<p style="margin-top: 0; padding-top: 0;">
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
                        <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;"><?php _e($i++); ?></td>
                        <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">
                            <p style="margin-top: 0; padding-top: 0;"><strong><?php _e($cartitem['title']) ?></strong></p>
                        </td>
                        <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">&nbsp;</td>
                        <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">&nbsp;</td>
                    </tr>

				<?php endif; ?>
			
			<?php endforeach; ?>
			
		<?php else: ?>
		
			<tr><td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" colspan="4">
				<div class="emptycart">You have no items in your cart</div>
			</td></tr>
		
		<?php endif; //emptycart ?>
	</tbody>
	
	<tfoot>
		<tr>
			<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">&nbsp;</th>
			<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">Food Total</th>
			<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">&nbsp;</th>
			<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;"><?php _e(sprintf("$%0.2f", $cart['foodprice'])); ?></th>
		</tr>

		<?php if ($cart['chargeforcontainers'] && $cart['containerprice'] > 0): ?>
			<tr>
				<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">&nbsp;</th>
				<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">Container Fee Total</th>
				<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">&nbsp;</th>
				<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;"><?php _e(sprintf("$%0.2f", $cart['containerprice'])); ?></th>
			</tr>		
		<?php endif; ?>

		<tr>
			<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">&nbsp;</th>
			<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">Transportation Fee</th>
			<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">&nbsp;</th>
			<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">
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
						<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">&nbsp;</th>
						<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;"><?php _e($key); ?></th>
						<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">&nbsp;</th>
						<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;"><?php _e(sprintf("$%0.2f", $value)); ?></th>
					</tr>
					<?php
				endforeach;
			endif;
		endif;
		?>

		<tr>
			<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">&nbsp;</th>
			<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">Grand Total</th>
			<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">&nbsp;</th>
			<th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;"><?php _e(sprintf("$%0.2f", $orderdata['ordertotalprice'])); ?></th>
		</tr>
	</tfoot>
	
</table>

<?php
	$qr = "";
    if ($orderdata['paymentmode'] == "PayNow"):
        $qr = base_url('assets/images/paynow-qr-code-thaikitchen.png');
        ?>
        <div style="float: right; margin-left: 20px;">
            <img style="margin-top: 30px; width: 130px; height: 130px" src="<?php _e($qr); ?>" alt="QR Code"/>
            <div style="margin-top: 5px;">Scan to PayNow</div>
        </div>
    <?php
    endif;
?>

<div class="tnc">
    <p><strong>Notes:</strong></p>
	<ul>
		<?php if (($orderdata['paymentmode'] == "Cheque") && ($orderdata['a_assignedoutlet'] != "")): ?>
			<li>Payment mode: Cheque payable to "<strong style='font-size: 110%; color: #ff0000;'><?php _e(outletbusinessname($orderdata['a_assignedoutlet'])); ?></strong>"</li>
		<?php elseif ($orderdata['paymentmode'] == "Bank Transfer"): ?>
            <li>Payment mode: Bank Transfer<br />
                Bank Account Name: Thai Kitchen Pte Ltd<br />
                Bank Name: CIMB<br />
                Bank Code: 7986, Branch Code: 001, Account Number: 2000950743</li>
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
            <li>Your order will only be processed to kitchen upon receiving payment.</li>
		<?php if ($cart['chargeforcontainers']) : ?>
			<li>Food will be prepared in disposable trays, no buffet table set-up.</li>
			<li>Disposable plates, forks &amp; spoons and chilli sauce will be provided.</li>
		<?php else: ?>
			<li>Complete buffet layout with warmers, tables, and tablecloth will be provided.</li>
			<li>Full set of disposable wares (plates, forks and spoons, chilli, serviettes and garbage bags).</li>
		<?php endif; ?>
		
	</ul>
</div>

<?php if ($orderdata['a_assigneddriver'] != ""): ?>
	(Assigned Driver: <?php _e($orderdata['a_assigneddriver']); ?>)
<?php endif; ?>
