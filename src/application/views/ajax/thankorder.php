<div class="lb-close btn"></div>
<h3>Thank Customer for Order <?php _e(formatOrderNum($order)); ?></h3>
<div class="lb-form">
	<p>Are you sure you want to send thank you letter and $<?php _e(KA_VOUCHER_AMOUNT); ?> voucher for Order <?php _e(formatOrderNum($order)); ?>?</p>
	<p>
		<a href="<?php _e(site_url('jtadmin/thankcustomer/' . $order['id'])); ?>">Send Thank You Email and Voucher</a>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="<?php _e(site_url('jtadmin/thankcustomernovoucher/' . $order['id'])); ?>">Send Thank You Email (No Voucher)</a>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="#" class="lb-close aligncenter">Cancel</a>
	</p>
</div>