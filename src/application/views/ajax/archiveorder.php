<div class="lb-close btn"></div>
<h3>Archive Order <?php _e(formatOrderNum($order)); ?></h3>
<div class="lb-form">
	<p>Are you sure you want to archive order <?php _e(formatOrderNum($order)); ?>?</p>
	<p>
		<a href="<?php _e(site_url('jtadmin/archiveorder/' . $order['id'])); ?>">Archive Order</a><br/><br/>
		<a href="<?php _e(site_url('jtadmin/payandarchiveorder/' . $order['id'])); ?>">Pay and Archive Order</a><br/><br/>
		<a href="<?php _e(site_url('jtadmin/paythankarchiveorder/' . $order['id'])); ?>">Pay, Thank Customer (with Voucher) and Archive Order</a><br/><br/>
		<a href="#" class="lb-close aligncenter">Cancel</a>
	</p>
</div>