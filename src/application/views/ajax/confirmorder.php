<div class="lb-close btn"></div>
<h3>Confirm Order for <?php _e(formatOrderNum($order)); ?></h3>
<div class="lb-form">
	<p>Are you sure you want to confirm the order <?php _e(formatOrderNum($order)); ?>?</p>
	<p>The order confirmation email and SMS will be sent to the customer.</p>
	<p>
		<a href="<?php _e(site_url('jtadmin/confirmorder/' . $order['id'])); ?>">Confirm Order (Send Email and SMS)</a>
		&nbsp;&nbsp;&nbsp;
		<a href="#" class="lb-close aligncenter">Cancel</a>
	</p>
</div>