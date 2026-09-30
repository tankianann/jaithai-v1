<div class="lb-close btn"></div>
<h3>Acknowledge Order for <?php _e(formatOrderNum($order)); ?></h3>
<div class="lb-form">
	<p>Are you sure you want to mark order <?php _e(formatOrderNum($order)); ?> as acknowledged?</p>
	<p>
		<a href="<?php _e(site_url('jtadmin/acknowledgeorder/' . $order['id'])); ?>">Acknowledge Order</a>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="#" class="lb-close aligncenter">Cancel</a>
	</p>
</div>