<div class="lb-close btn"></div>
<h3>Credit Order for <?php _e(formatOrderNum($order)); ?></h3>
<div class="lb-form">
	<p>Are you sure you want to mark order <?php _e(formatOrderNum($order)); ?> as payment by credit?</p>
	<p>
		<a href="<?php _e(site_url('jtadmin/creditorder/' . $order['id'])); ?>">Mark as Credit Payment</a>
		&nbsp;&nbsp;&nbsp;
		<a href="<?php _e(site_url('jtadmin/uncreditorder/' . $order['id'])); ?>">Mark as Normal Payment</a>
	</p>
</div>