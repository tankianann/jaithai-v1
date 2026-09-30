<div class="lb-close btn"></div>
<h3>Pay Order for <?php _e(formatOrderNum($order)); ?></h3>
<div class="lb-form">
	<p>Are you sure you want to mark order <?php _e(formatOrderNum($order)); ?> as paid?</p>
	<p>
		<a href="<?php _e(site_url('jtadmin/payorder/' . $order['id'] . '/notify')); ?> ">Pay Order and Notify Customer</a><br/><br/>
        <a href="<?php _e(site_url('jtadmin/payorder/' . $order['id'])); ?>">Pay Order (No Notification)</a><br/><br/>
        <a href="#" class="lb-close aligncenter">Cancel</a>
	</p>
</div>