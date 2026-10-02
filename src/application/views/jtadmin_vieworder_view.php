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

<h1>Invoice <?php _e(formatOrderNum($orderdata)); ?> <?php _e($pendingconfirmed); ?></h1>

<?php if ($orderdata['a_assignedoutlet'] != "" && $jtuser[ 'type' ] == 'admin'):  ?>
    <div class="pdf-documents">
        <a class="pdf-icon" href="<?php _e(base_url('assets/pdf/' . formatOrderNum($orderdata, false) . '.pdf')); ?>">Invoice</a>
        <a class="pdf-icon" href="<?php _e(base_url('assets/pdf/' . formatOrderNum($orderdata, false) . '-env.pdf')); ?>">Envelope</a>
    </div>
<?php endif; ?>

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
				<td><?php _e($orderdata['pickuplocation']); ?></td>
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
		
		<?php if ($orderdata['deliverypickup'] == 'delivery'): ?>
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
		<?php endif;  ?>
		
		<tr>
			<th nowrap="nowrap">Order Date</th>
			<td><?php _e(date('d-M-Y h:ia', strtotime($orderdata['ordertime']))); ?></td>
			<th nowrap="nowrap">Payment Mode</th>
			<td><?php _e($orderdata['paymentmode']); ?></td>
		</tr>
		<tr>
			<th>Notes</th>
			<td colspan="3"><?php _e($orderdata['notes']); ?></td>
		</tr>

		<?php if ($jtuser['type'] == 'admin'): ?>
			<tr>
				<td colspan="4"><div class="itemcontrol">(<a href="<?php _e(site_url('jtadmin/editorderdetails/'. $orderdata['id'])); ?>">Edit Order Details</a>)</div>	</td>
			</tr>
		<?php endif; ?>
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
            <?php if ($jtuser[ 'type' ] == 'admin'): ?>
			    <th>Total</th>
            <?php endif; ?>
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
                                <?php if ($jtuser[ 'type' ] == 'admin'): ?>
								@ $<?php _e($cartitem['perpax']) ?> Per Pax
                                <?php endif; ?>
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
							<p class="itemcontrol">
								<?php if ($jtuser['type'] == 'admin'): ?>
									(<a href="<?php _e(site_url('jtadmin/editorderitemsetmenu/'. $orderdata['id'] . "/" . $key)); ?>">Edit</a>) 
									<?php if (sizeof($cartitems) > 1): //only can remove if more than one item ?>
										(<a href="#<?php _e($key); ?>" class="lb-option">Remove</a>)
									<?php endif; ?>
								<?php endif; ?>
							</p>
						</td>
						<td><?php _e($cartitem['numpax']) ?> pax</td>
                        <?php if ($jtuser[ 'type' ] == 'admin'): ?>
                            <td><?php _e(sprintf("$%0.2f", $cartitem['foodprice'])); ?></td>
                        <?php endif; ?>
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
							<p class="itemcontrol">
								<?php if ($jtuser['type'] == 'admin'): ?>
									(<a href="<?php _e(site_url('jtadmin/editorderitemalacarte/'. $orderdata['id'] . "/" . $key)); ?>">Edit</a>) 
									<?php if (sizeof($cartitems) > 1): //only can remove if more than one item ?>
										(<a href="#<?php _e($key); ?>" class="lb-option">Remove</a>)
									<?php endif; ?>
								<?php endif; ?>
							</p>
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
                        <?php if ($jtuser[ 'type' ] == 'admin'): ?>
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
                        <?php endif; ?>
					</tr>
                <?php elseif ($cartitem['menutype'] == JT_MISCITEM): ?>

                    <tr>
                        <td><?php _e($i++); ?></td>
                        <td>
                            <p><strong><?php _e($cartitem['title']) ?></strong></p>
                            <p class="itemcontrol">
                                <?php if ($jtuser['type'] == 'admin'): ?>
                                    <?php if (sizeof($cartitems) > 1): //only can remove if more than one item ?>
                                        (<a href="#<?php _e($key); ?>" class="lb-option">Remove</a>)
                                    <?php endif; ?>
                                <?php endif; ?>
                            </p>
                        </td>
                        <td>&nbsp;</td>
                        <?php if ($jtuser[ 'type' ] == 'admin'): ?>
                            <td>&nbsp;</td>
                        <?php endif; ?>
                    </tr>

                <?php endif; ?>
			
			<?php endforeach; ?>
			
		<?php else: ?>
		
			<tr><td colspan="4">
				<div class="emptycart">You have no items in your cart</div>
			</td></tr>
		
		<?php endif; //emptycart ?>
		
			<?php if ($jtuser['type'] == 'admin'): ?>
				<tr>
					<td>&nbsp;</td>
					<td>
						<?php _e(form_open('jtadmin/addorderitem/' . $orderdata['id']) . formSubmitted()); ?>
							<label class="itemcontrol">Add New Item</label><br/>
							<?php if ($orderdata['deliverypickup'] == 'delivery'): ?>
								<?php _e(selectBoxHelper("ALL_MENUS", "menuname", "menuname", "textbox w150", "")); ?>
								<input id="formsubmit" type="submit" name="formsubmit" class="button" value="Add"> 
							<?php elseif($orderdata['deliverypickup'] == 'pickup'): ?>
								<?php  _e(selectBoxHelper("PICKUP_MENUS", "menuname", "menuname", "textbox w150", "")); ?>
								<input id="formsubmit" type="submit" name="formsubmit" class="button" value="Add"> 
								<br /><label>(Change order type to 'delivery' to add catering menus)</label>
							<?php endif; ?>
						<?php _e(form_close()); ?>
					</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			<?php endif; ?>
	</tbody>

    <?php if ($jtuser[ 'type' ] == 'admin'): ?>
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
				<th>
					Container Fee Total

					<?php if ($jtuser['type'] == 'admin'): ?>
						<span class="itemcontrol">
						 (<a href="<?php _e(site_url('jtadmin/editorderaddonfees/'. $orderdata['id'])); ?>">Edit</a>) 
						</span>
					<?php endif; ?>
				</th>
				<th>&nbsp;</th>
				<th><?php _e(sprintf("$%0.2f", $cart['containerprice'])); ?></th>
			</tr>		
		<?php endif; ?>	
		
		
		<tr>
			<th>&nbsp;</th>
			<th>
				Transportation Fee
				
				<?php if ($jtuser['type'] == 'admin'): ?>
					<span class="itemcontrol">
					 (<a href="<?php _e(site_url('jtadmin/editorderaddonfees/'. $orderdata['id'])); ?>">Edit</a>) 
					</span>
				<?php endif; ?>
			</th>
			<th>&nbsp;</th>
			<th>
				<?php if ($orderdata['deliverypickup'] == 'pickup'): ?>
					$0.00
				<?php elseif($orderdata['deliverypickup'] == 'delivery'): ?>
					<?php _e(sprintf("$%0.2f", $cart['deliveryprice'])); ?>
				<?php endif; ?>
			</th>
		</tr>

		<?php //surcharges ?>
		<?php if ($jtuser['type'] == 'admin'): ?>
            <tr>
                <th>&nbsp;</th>
                <th>
					<span class="itemcontrol">
					(<a href="<?php _e(site_url('jtadmin/editordersurcharges/'. $orderdata['id'])); ?>">Edit Surcharges</a>)
					</span>
                </th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
		<?php endif; ?>

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
	<?php endif; ?>
</table>

<?php if ($jtuser[ 'type' ] == 'admin'): ?>
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
    <?php if ($orderdata['a_assigneddriver'] != ""): ?>
        (Assigned Driver: <?php _e($orderdata['a_assigneddriver']); ?>)
    <?php endif; ?>
<?php endif; ?>

<div id="lightbox">
	<div class="lb-apiurl"><?php _e(site_url('jtadmin/ajaxorderremoveitem/' . $orderdata['id'])) ?></div>
	<div class="lb-bkg"></div>
	<div class="lb-contentwrap"><div class="lb-content"></div></div>
</div>
