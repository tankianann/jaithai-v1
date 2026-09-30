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
	
	//retrieve the allowpickup from cart items
	$cart = $orderdata['items'];
	$cart = unserialize($cart);
	
?>

<h1>Invoice <?php _e(formatOrderNum($orderdata)); ?> <?php _e($pendingconfirmed); ?></h1>

<?php _e(form_open() . formSubmitted()); ?>
<div class="orderdetailswrap">
	<table class="orderdetails">
		<tr>
			<th>Order Type</th>
			<td colspan="3">
				<?php if ($cart['allowpickup']): ?>
					<?php _e(selectBoxHelper("ORDER_TYPE", "deliverypickup", "deliverypickup", "textbox w100", $orderdata['deliverypickup'])); ?>
				<?php else: ?>
					Delivery <br />
					<label>(Remove catering items in this order to allow self collect)</label>
					<input id="deliverypickup" type="hidden" name="deliverypickup" value="delivery">
				<?php endif; ?>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap"><?php _e($numbertype); ?></th>
			<td><?php _e(formatOrderNum($orderdata)); ?></td>
			<th nowrap="nowrap">Date of Function</th>
			<td><input type="text" name="functiondate" value="<?php _e(date('l, d-M-Y', strtotime($orderdata['functiondate']))); ?>" class="textbox w150 datepicker" readonly="readonly" /></td>
		</tr>
		<tr>
			<th nowrap="nowrap">
				<span class="pickup-options">Self-Collect Time</span>
				<span class="delivery-options">Ready to Eat Time</span>
			</th>
			<td><?php _e(selectBoxHelper("ADMIN_PICKUPDELIVERY_TIME", "timestart", "timestart", "textbox w100", $orderdata['timestart'])); ?></td>
			<th nowrap="nowrap">
				<span class="pickup-options">Self-Collect Location</span>
				<span class="delivery-options">Collection Time</span>
			</th>
			<td>
				<span class="pickup-options"><?php _e(selectBoxHelper("PICKUP_LOCATIONS", "pickuplocation", "pickuplocation", "textbox w100", $orderdata['pickuplocation'], array(JT_CW, JT_PV, JT_CK))); ?></span>
				<span class="delivery-options"><?php _e(selectBoxHelper("COLLECTION_TIME", "timeend", "timeend", "textbox w100", $orderdata['timeend'])); ?></span>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">Contact Person</th>
			<td><input type="text" name="name" value="<?php _e($orderdata['name']); ?>" class="w200 textbox"/></td>
			<th nowrap="nowrap">Email Address</th>
			<td>
				<input type="text" name="email" value="<?php _e($orderdata['email']); ?>" class="w200 textbox"/>
				<br/>
				<input type="text" name="email2" value="<?php _e($orderdata['email2']); ?>" class="w200 textbox"/>
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">Telephone No</th>
			<td><input type="text" name="telephone" value="<?php _e($orderdata['telephone']); ?>" class="w200 textbox"/></td>
			<th nowrap="nowrap">Mobile No</th>
			<td>
				<input type="text" name="mobile" value="<?php _e($orderdata['mobile']); ?>" class="w200 textbox"/>
				<br/>
				<input type="text" name="mobile2" value="<?php _e($orderdata['mobile2']); ?>" class="w200 textbox"/>
			</td>
		</tr>
		<tr class="delivery-options">
			<th nowrap="nowrap">Delivery Address</th>
			<td>
                <label>Company</label><br/>
                <textarea name="company" class="textbox w200 h50"><?php _e($orderdata['company']); ?></textarea><br/>
                <label>Street</label><br/>
                <textarea name="address" class="textbox w200 h50"><?php _e($orderdata['address']); ?></textarea><br/>
                <label>Building Name</label><br/>
                <textarea name="buildingname" class="textbox w200 h50"><?php _e($orderdata['buildingname']); ?></textarea><br/>
				<label>Postal Code</label><br/>
				<input type="text" name="postalcode" value="<?php _e($orderdata['postalcode']); ?>" class="w100 textbox"/><br/>
                <label>Unit No</label><br/>
                <input type="text" name="unitnum" value="<?php _e($orderdata['unitnum']); ?>" class="w100 textbox"/><br/>
                <label>Set Up Area</label><br/>
                <textarea name="setuparea" class="textbox w200 h50"><?php _e($orderdata['setuparea']); ?></textarea>
			</td>
			<th nowrap="nowrap">Billing Address</th>
			<td>
				<div>
					<input type="checkbox" name="sameasdelivery" id="sameasdelivery" <?php if ($orderdata['sameasdelivery'] == 1) { _e('checked="checked"'); } ?> />
					<label for="sameasdelivery" class="checkboxlabel w200">Bill to same address</label>
				</div>
				<div id="billingdetails">
                    <label>Company</label><br/>
                    <textarea name="billcompany" class="textbox w200 h50"><?php _e($orderdata['billcompany']); ?></textarea><br/>
					<label>Street</label><br/>
					<textarea name="billaddress" class="textbox w200 h50"><?php _e($orderdata['billaddress']); ?></textarea><br/>
                    <label>Building Name</label><br/>
                    <textarea name="billbuildingname" class="textbox w200 h50"><?php _e($orderdata['billbuildingname']); ?></textarea><br/>
					<label>Postal Code</label><br/>
					<input type="text" name="billpostalcode" value="<?php _e($orderdata['billpostalcode']); ?>" class="w100 textbox"/>
                    <label>Unit No</label><br/>
                    <input type="text" name="billunitnum" value="<?php _e($orderdata['billunitnum']); ?>" class="w100 textbox"/>
				</div>	
			</td>
		</tr>
		<tr>
			<th nowrap="nowrap">Order Date</th>
			<td><?php _e(date('d-M-Y', strtotime($orderdata['ordertime']))); ?></td>
			<th nowrap="nowrap">Payment Mode</th>
			<td><?php _e(selectBoxHelper("PAYMENT_MODE_JTADMIN", "paymentmode", "paymentmode", "textbox w150", $orderdata['paymentmode'])); ?></td>
		</tr>
		<tr>
			<th>Notes</th>
			<td colspan="3"><textarea name="notes" class="textbox w400 h50"><?php _e($orderdata['notes']); ?></textarea></td>
		</tr>
	</table>
</div>
<input id="formsubmit" type="submit" name="formsubmit" class="button" value="Save Changes"> 
<a href="<?php _e(site_url('jtadmin/vieworder/' .  $orderdata['id'])) ?>" class="button">Cancel</a>
<?php _e(form_close()); ?>		



