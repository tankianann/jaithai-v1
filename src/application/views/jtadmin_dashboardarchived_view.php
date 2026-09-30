<?php showStatusMessage($this->session->userdata('statusmessage')); ?>
<?php $this->session->unset_userdata('statusmessage'); ?>
<h1>Order Archive (<?php echo $year_filter; ?>)</h1>
<div class="controlpanel">
	<form method="get">
        <div class="orderby">
            <p><strong>Order By</strong></p>
            <div>
                <label><input type="radio" name="order" value="orderid" <?php if ($order == "orderid") { echo "checked='checked'";} ?>/> Order Number</label><br />
                <label><input type="radio" name="order" value="functiondate" <?php if ($order == "functiondate") { echo "checked='checked'";} ?>/> Function Date</label><br />
                <label><input type="radio" name="order" value="total" <?php if ($order == "total") { echo "checked='checked'";} ?>/> Total Amount</label><br />
            </div>
        </div>
        <div class="orderby">
            <p><strong>Year</strong></p>
            <div>
                <?php for ($i = date('Y'); $i >= 2013; $i--): ?>
                    <label><input type="radio" name="year" value="<?php echo $i ?>"
                    <?php if ($year_filter == $i) { echo "checked='checked'";} ?>/> <?php echo $i; ?>
                    </label><br />
                <?php endfor; ?>
            </div>
        </div>
        <div class="orderby">
            <button type="submit" class="w100 button">Submit</button>
        </div>
        <div class="clear"></div>
    </form>
</div>
<?php if (sizeof($orders)): ?>
	<table class="adminorderlist">
		<tr>
			<th class="w150">Order</th>
			<th>Details</th>
		</tr>
		<?php foreach($orders as $order): ?>
			<tr class="outlet-<?php _e($order['a_assignedoutlet']); ?>">
				<td nowrap="nowrap">
					<strong><?php _e(formatOrderNum($order)); ?></strong><br />
					<br />
					$<?php _e($order['ordertotalprice']); ?><br />
					(<?php _e($order['paymentmode']); ?>)<br />
					<br />
					<a href="<?php _e(site_url('jtadmin/vieworder/'. $order['id'])); ?>">View Order</a><br />
					<a href="<?php _e(site_url('jtadmin/unarchiveorder/' . $order['id'])) ?>">Unarchive</a><br />
				</td>
				<td>
					<?php if ($order['a_cancelled'] != "0000-00-00 00:00:00"):  ?>
						<div class="ordercancelled">Order Cancelled</div>
					<?php endif; ?>
					<table class="detailstable">
						<tr><th colspan="2" class="sectionhead dark">Function Details</th></tr>
							<tr>
								<th style="width: 80px">Food</th>
								<td>
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
							</tr>
						<?php if ($order['deliverypickup'] == "delivery"): ?>	
							<tr>
								<th>Details</th>
								<td>
									Delivery<br />
									<?php _e(date('d-M-Y', strtotime($order['functiondate']))); ?>
									(<?php _e($order['timestart']); ?> - <?php _e($order['timeend']); ?>)
								</td>
							</tr>
						<?php elseif ($order['deliverypickup'] == "pickup"): ?>
							<tr>
								<th>Date</th>
								<td>
									Self Collect @ <?php _e($order['pickuplocation']); ?><br />
									<?php _e(date('d-M-Y', strtotime($order['functiondate']))); ?>
									(<?php _e($order['timestart']); ?>)
								</td>
							</tr>
						<?php endif; ?>
						<tr>
							<th>Contact</th>
							<td>
								<?php _e($order['name']); ?><br />
								Email: <?php
									_e($order['email']);
									if ($order['email2']) {
										_e(" / " . $order['email2']);
									}
								?><br />
								Tel: <?php _e($order['telephone']); ?><br />
								Mob: <?php
									_e($order['mobile']);
									if ($order['mobile2']) {
										_e(" / " . $order['mobile2']);
									}
								?>
							</td>
						</tr>
					</table>
					<div class="sep"></div>		
				</td>

			</tr>
		<?php endforeach; ?>
		
	</table>
<?php else: ?>
	<p>No active orders.</p>
<?php endif; ?>
<div id="lightbox">
	<div class="lb-apiurl"><?php _e(site_url('jtadmin/ajax')) ?></div>
	<div class="lb-bkg"></div>
	<div class="lb-contentwrap"><div class="lb-content"></div></div>
</div>