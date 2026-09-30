<?php showStatusMessage($this->session->userdata('statusmessage')); ?>
<?php $this->session->unset_userdata('statusmessage'); ?>
<?php  
	$typeandoutlet_amount = array();
	$typeandoutlet_orders = array();
	$driver_amount = array();
	$driver_orders = array();
	$hour_amount = array();
	$hour_orders = array();
	$menu_amount = array();
	$menu_count = array();

	//initialize arrays
	$arraykeys = array('JS-pickup', 'JS-delivery', 'CW-pickup', 'CW-delivery', 
					   'EC-pickup', 'EC-delivery', 'PV-pickup', 'PV-delivery',
                       'SP-pickup', 'SP-delivery', 'CK-pickup', 'CK-delivery',
					   '-pickup', '-delivery',);
	foreach ($arraykeys as $arraykey) {
		$typeandoutlet_amount[$arraykey] = 0;
		$typeandoutlet_orders[$arraykey] = 0;
	}	

	foreach($orders as $order):

		//extract all the information into variables
		$orderdate = date('d-M-Y', strtotime($order['ordertime']));
		$functiondate = date('d-M-Y', strtotime($order['functiondate']));
		$functionhour = substr($order['timestart'], 0, 2);
		$amount = $order['ordertotalprice'];
		$deliverypickup = $order['deliverypickup'];
		$assignedoutlet = $order['a_assignedoutlet'];
		$driver = $order['a_assigneddriver'];
		
		$cart = unserialize($order['items']);
		$cartitems = $cart['items'];
		$deliveryprice = $cart['deliveryprice'];

		//populate the appropriate array
		
		//type and outlet
		$arraykey = $assignedoutlet . "-" . $deliverypickup;
		$typeandoutlet_amount[$arraykey] += $amount;
		$typeandoutlet_orders[$arraykey] ++;


		//driver
		if ($driver == "") { $driver = "Unassigned or Self Collect"; }
		$arraykey = $driver;
		
		if (!array_key_exists($arraykey, $driver_amount)) {
			$driver_amount[$arraykey] = 0;
		}
		$driver_amount[$arraykey] += $deliveryprice;
		
		if (!array_key_exists($arraykey, $driver_orders)) {
			$driver_orders[$arraykey] = 0;
		}
		$driver_orders[$arraykey] ++;

		//hour
		$arraykey = $functionhour . "00hrs - " . $functionhour . "59hrs";
		if (!array_key_exists($arraykey, $hour_amount)) {
			$hour_amount[$arraykey] = 0;
		}
		$hour_amount[$arraykey] += $amount;
		if (!array_key_exists($arraykey, $hour_orders)) {
			$hour_orders[$arraykey] = 0;
		}
		$hour_orders[$arraykey] ++;

		//menu
		foreach ($cartitems as $cartitem) {
		
			$arraykey = $cartitem['title'];
		
			if (!array_key_exists($arraykey, $menu_amount)) {
				$menu_amount[$arraykey] = 0;
			}
			$menu_amount[$arraykey] += $cartitem['foodprice'];
			if (!array_key_exists($arraykey, $menu_count)) {
				$menu_count[$arraykey] = 0;
			}
			$menu_count[$arraykey] ++;
		}

	endforeach;

	
?>
<h1>Report</h1>
<?php _e(form_open() . formSubmitted()); ?>
<div class="controlpanel">
	<p><strong>Filter By</strong></p>
	<div>
		<label class="w100">Date Type</label>
		<input type="radio" name="datetype" value="functiondate" <?php if($formdata['datetype'] == 'functiondate') { _e(' checked="checked" '); }  ?> id="datetype1"/>
		<label for="datetype1">Function Date</label>
		<input type="radio" name="datetype" value="orderdate" <?php if($formdata['datetype'] == 'orderdate') { _e(' checked="checked" '); }  ?> id="datetype2"/>
		<label for="datetype2">Order Date</label> &nbsp;
	</div>
	<div>
		<label class="w100" for="startdate">Start Date</label>
		<input type="text" name="startdate" id="startdate" value="<?php _e(date('d-M-Y', strtotime($formdata['startdate']))); ?>" class="w100 textbox datepicker" />
	</div>
	<div>
		<label class="w100" for="enddate">End Date</label>
		<input type="text" name="enddate" id="enddate" value="<?php _e(date('d-M-Y', strtotime($formdata['enddate']))); ?>" class="w100 textbox datepicker" />
	</div>
	<div>
		<input id="formsubmit" type="submit" name="formsubmit" class="button mleft100" value="Submit">
	</div>
</div>
<?php _e(form_close()); ?>



<div>

	<p>&nbsp;</p>
	<p>Report excludes all orders marked cancelled.</p>
	<h3>Order Report by Type and Outlet</h3>
	<table class="adminorderlist">
		<tr>
			<th rowspan="2">&nbsp;</th>
			<th colspan="8">Amount</th>
			<th colspan="8">Num Order</th>
		</tr>
		<tr>
			<th>JS</th>
			<th>CW</th>
			<th>PV</th>
			<th>EC</th>
			<th>SP</th>
			<th>CK</th>
			<th>-</th>
			<th>Total</th>
			<th>JS</th>
			<th>CW</th>
			<th>PV</th>
			<th>EC</th>
			<th>SP</th>
			<th>CK</th>
			<th>-</th>
			<th>Total</th>
		</tr>
		<tr>
			<td>Delivery</td>
			<td><?php _e(sprintf("$%0.2f", $typeandoutlet_amount['JS-delivery'])); ?></td>
			<td><?php _e(sprintf("$%0.2f", $typeandoutlet_amount['CW-delivery'])); ?></td>
			<td><?php _e(sprintf("$%0.2f", $typeandoutlet_amount['PV-delivery'])); ?></td>
			<td><?php _e(sprintf("$%0.2f", $typeandoutlet_amount['EC-delivery'])); ?></td>
			<td><?php _e(sprintf("$%0.2f", $typeandoutlet_amount['SP-delivery'])); ?></td>
			<td><?php _e(sprintf("$%0.2f", $typeandoutlet_amount['CK-delivery'])); ?></td>
			<td><?php _e(sprintf("$%0.2f", $typeandoutlet_amount['-delivery'])); ?></td>
			<th><?php _e(sprintf("$%0.2f", 
							$typeandoutlet_amount['JS-delivery'] +
							$typeandoutlet_amount['CW-delivery'] +
							$typeandoutlet_amount['PV-delivery'] +
							$typeandoutlet_amount['EC-delivery'] +
							$typeandoutlet_amount['SP-delivery'] +
							$typeandoutlet_amount['CK-delivery'] +
							$typeandoutlet_amount['-delivery'])); ?></th>
			<td><?php _e($typeandoutlet_orders['JS-delivery']); ?></td>
			<td><?php _e($typeandoutlet_orders['CW-delivery']); ?></td>
			<td><?php _e($typeandoutlet_orders['PV-delivery']); ?></td>
			<td><?php _e($typeandoutlet_orders['EC-delivery']); ?></td>
			<td><?php _e($typeandoutlet_orders['SP-delivery']); ?></td>
			<td><?php _e($typeandoutlet_orders['CK-delivery']); ?></td>
			<td><?php _e($typeandoutlet_orders['-delivery']); ?></td>
			<th><?php _e($typeandoutlet_orders['JS-delivery'] +
							$typeandoutlet_orders['CW-delivery'] +
							$typeandoutlet_orders['PV-delivery'] +
							$typeandoutlet_orders['EC-delivery'] +
							$typeandoutlet_orders['SP-delivery'] +
							$typeandoutlet_orders['CK-delivery'] +
							$typeandoutlet_orders['-delivery']); ?></th>
		</tr>
		<tr>
			<td>Self Collect</td>
			<td><?php _e(sprintf("$%0.2f", $typeandoutlet_amount['JS-pickup'])); ?></td>
			<td><?php _e(sprintf("$%0.2f", $typeandoutlet_amount['CW-pickup'])); ?></td>
			<td><?php _e(sprintf("$%0.2f", $typeandoutlet_amount['PV-pickup'])); ?></td>
			<td><?php _e(sprintf("$%0.2f", $typeandoutlet_amount['EC-pickup'])); ?></td>
			<td><?php _e(sprintf("$%0.2f", $typeandoutlet_amount['SP-pickup'])); ?></td>
			<td><?php _e(sprintf("$%0.2f", $typeandoutlet_amount['CK-pickup'])); ?></td>
			<td><?php _e(sprintf("$%0.2f", $typeandoutlet_amount['-pickup'])); ?></td>
			<th><?php _e(sprintf("$%0.2f", 
							$typeandoutlet_amount['JS-pickup'] +
							$typeandoutlet_amount['CW-pickup'] +
							$typeandoutlet_amount['PV-pickup'] +
							$typeandoutlet_amount['EC-pickup'] +
							$typeandoutlet_amount['SP-pickup'] +
							$typeandoutlet_amount['CK-pickup'] +
							$typeandoutlet_amount['-pickup'])); ?></th>
			<td><?php _e($typeandoutlet_orders['JS-pickup']); ?></td>
			<td><?php _e($typeandoutlet_orders['CW-pickup']); ?></td>
			<td><?php _e($typeandoutlet_orders['PV-pickup']); ?></td>
			<td><?php _e($typeandoutlet_orders['EC-pickup']); ?></td>
			<td><?php _e($typeandoutlet_orders['SP-pickup']); ?></td>
			<td><?php _e($typeandoutlet_orders['CK-pickup']); ?></td>
			<td><?php _e($typeandoutlet_orders['-pickup']); ?></td>
			<th><?php _e($typeandoutlet_orders['JS-pickup'] +
							$typeandoutlet_orders['CW-pickup'] +
							$typeandoutlet_orders['PV-pickup'] +
							$typeandoutlet_orders['EC-pickup'] +
							$typeandoutlet_orders['SP-pickup'] +
							$typeandoutlet_orders['CK-pickup'] +
							$typeandoutlet_orders['-pickup']); ?></th>
		</tr>
		<tr>
			<th>Total</th>
			<th><?php _e(sprintf("$%0.2f", $typeandoutlet_amount['JS-delivery'] + $typeandoutlet_amount['JS-pickup'])); ?></th>
			<th><?php _e(sprintf("$%0.2f", $typeandoutlet_amount['CW-delivery'] + $typeandoutlet_amount['CW-pickup'])); ?></th>
			<th><?php _e(sprintf("$%0.2f", $typeandoutlet_amount['PV-delivery'] + $typeandoutlet_amount['PV-pickup'])); ?></th>
			<th><?php _e(sprintf("$%0.2f", $typeandoutlet_amount['EC-delivery'] + $typeandoutlet_amount['EC-pickup'])); ?></th>
			<th><?php _e(sprintf("$%0.2f", $typeandoutlet_amount['SP-delivery'] + $typeandoutlet_amount['SP-pickup'])); ?></th>
			<th><?php _e(sprintf("$%0.2f", $typeandoutlet_amount['CK-delivery'] + $typeandoutlet_amount['CK-pickup'])); ?></th>
			<th><?php _e(sprintf("$%0.2f", $typeandoutlet_amount['-delivery'] + $typeandoutlet_amount['-pickup'])); ?></th>
			<th><?php _e(sprintf("$%0.2f", 
							$typeandoutlet_amount['JS-delivery'] + $typeandoutlet_amount['JS-pickup'] + 
							$typeandoutlet_amount['CW-delivery'] + $typeandoutlet_amount['CW-pickup'] + 
							$typeandoutlet_amount['PV-delivery'] + $typeandoutlet_amount['PV-pickup'] + 
							$typeandoutlet_amount['EC-delivery'] + $typeandoutlet_amount['EC-pickup'] + 
							$typeandoutlet_amount['SP-delivery'] + $typeandoutlet_amount['SP-pickup'] +
							$typeandoutlet_amount['CK-delivery'] + $typeandoutlet_amount['CK-pickup'] +
							$typeandoutlet_amount['-delivery'] + $typeandoutlet_amount['-pickup'])); ?></th>
			<th><?php _e($typeandoutlet_orders['JS-delivery'] + $typeandoutlet_orders['JS-pickup']); ?></th>
			<th><?php _e($typeandoutlet_orders['CW-delivery'] + $typeandoutlet_orders['CW-pickup']); ?></th>
			<th><?php _e($typeandoutlet_orders['PV-delivery'] + $typeandoutlet_orders['PV-pickup']); ?></th>
			<th><?php _e($typeandoutlet_orders['EC-delivery'] + $typeandoutlet_orders['EC-pickup']); ?></th>
			<th><?php _e($typeandoutlet_orders['SP-delivery'] + $typeandoutlet_orders['SP-pickup']); ?></th>
			<th><?php _e($typeandoutlet_orders['CK-delivery'] + $typeandoutlet_orders['CK-pickup']); ?></th>
			<th><?php _e($typeandoutlet_orders['-delivery'] + $typeandoutlet_orders['-pickup']); ?></th>
			<th><?php _e($typeandoutlet_orders['JS-delivery'] + $typeandoutlet_orders['JS-pickup'] + 
							$typeandoutlet_orders['CW-delivery'] + $typeandoutlet_orders['CW-pickup'] + 
							$typeandoutlet_orders['PV-delivery'] + $typeandoutlet_orders['PV-pickup'] + 
							$typeandoutlet_orders['EC-delivery'] + $typeandoutlet_orders['EC-pickup'] + 
							$typeandoutlet_orders['SP-delivery'] + $typeandoutlet_orders['SP-pickup'] +
							$typeandoutlet_orders['CK-delivery'] + $typeandoutlet_orders['CK-pickup'] +
							$typeandoutlet_orders['-delivery'] + $typeandoutlet_orders['-pickup']); ?></th>
		</tr>
	</table>


	<p>&nbsp;</p>
	<h3>Order Report by Driver</h3>
	<?php ksort($driver_amount); ?>
	<?php ksort($driver_orders); ?>
	<table class="adminorderlist">
		<tr>
			<th>Driver</th>
			<th>Num Order</th>
			<th>Total Delivery Fee</th>
		</tr>
		<?php foreach($driver_amount as $key => $value): ?>
			<tr>
				<td><?php _e($key); ?></td>
				<td><?php _e($driver_orders[$key]); ?></td>
				<td><?php _e(sprintf("$%0.2f",$driver_amount[$key])); ?></td>
			</tr>
		<?php endforeach; ?>
	</table>


	<p>&nbsp;</p>
	<h3>Order Report by Function Hour</h3>
	<?php ksort($hour_orders); ?>
	<table class="adminorderlist">
		<tr>
			<th>Hour</th>
			<th>Num Order</th>
			<th>Amount</th>
		</tr>
		<?php foreach($hour_orders as $key => $value): ?>
			<tr>
				<td><?php _e($key); ?></td>
				<td><?php _e($hour_orders[$key]); ?></td>
				<td><?php _e(sprintf("$%0.2f", $hour_amount[$key])); ?></td>
			</tr>
		<?php endforeach; ?>
	</table>


	<p>&nbsp;</p>
	<h3>Order Report by Menus Ordered</h3>
	<?php ksort($menu_amount); ?>
	<?php ksort($menu_count); ?>
	<table class="adminorderlist">
		<tr>
			<th>Menu</th>
			<th>Num Order</th>
			<th>Amount</th>
		</tr>
		<?php foreach($menu_count as $key => $value): ?>
			<tr>
				<td><?php _e($key); ?></td>
				<td><?php _e($menu_count[$key]); ?></td>
				<td><?php _e(sprintf('$%0.2f', $menu_amount[$key])); ?></td>
			</tr>
		<?php endforeach; ?>
	</table>


	<p>&nbsp;</p>
	<h3>Order List</h3>
	<?php if (sizeof($orders)): ?>
		<table class="adminorderlist">
			<tr>
				<th>Order Date</th>
				<th>Function Date</th>
				<th>Order</th>
				<th>Customer</th>
				<th>Amount</th>
				<th>Driver</th>
			</tr>
			<?php foreach($orders as $order): ?>
				<tr>
					<td nowrap="nowrap">
						<?php _e(date('d-M-Y', strtotime($order['ordertime']))); ?>
					</td>
					<td nowrap="nowrap">
						<?php _e(date('d-M-Y', strtotime($order['functiondate']))); ?><br />
						<?php _e($order['timestart']); ?>
					</td>
					<td nowrap="nowrap">
						<strong><a href="<?php _e(site_url('jtadmin/vieworder/'. $order['id'])); ?>"><?php _e(formatOrderNum($order)); ?></a></strong><br />
						<?php 
							$cart = unserialize($order['items']); 
							$cartitems = $cart['items'];
							$description = "";
							foreach ($cartitems as $cartitem):
								if ($cartitem['menutype'] == JT_SETMENU) {
									$description .= $cartitem['title'] . " (" . $cartitem['numpax'] . " pax) <br/>";
								}
								elseif ($cartitem['menutype'] == JT_ALACARTEMENU) {
									$description .= $cartitem['title'] . "<br/>";
								}
								elseif ($cartitem['menutype'] == JT_MISCITEM) {
									$description .= $cartitem['title'] . "<br/>";
								}
							endforeach;
							_e($description);
						?>
						
					</td>
					<td>
						<strong><?php _e($order['name']); ?> (<?php _e($order['mobile']); ?>)</strong><br />
						<?php if ($order['deliverypickup'] == "delivery"): ?>
							<?php _e($order['address']); ?> <?php _e($order['unitnum']); ?>
							Singapore <?php _e($order['postalcode']); ?>
						<?php elseif ($order['deliverypickup'] == "pickup"): ?>
							Pickup: <?php _e($order['pickuplocation']); ?>
						<?php endif; ?>
					</td>
					<td>
						$<?php _e($order['ordertotalprice']); ?><br/>
						<?php _e($order['paymentmode']); ?>
					</td>
					<td><?php _e($order['a_assigneddriver']); ?></td>
				</tr>		
	
			<?php endforeach; ?>
			
		</table>
	<?php else: ?>
		<p>No orders.</p>
	<?php endif; ?>	
	
</div>