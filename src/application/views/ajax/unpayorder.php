<div class="lb-close btn"></div>
<h3>Mark Order <?php _e(formatOrderNum($order)); ?> as Unpaid</h3>
<div class="lb-form">
	<p>Are you sure you want to mark order <?php _e(formatOrderNum($order)); ?> as unpaid?</p>
	<p>
        <a href="<?php _e(site_url('jtadmin/unpayorder/' . $order['id'])); ?>">Mark as Unpaid</a><br/><br/>
        <a href="#" class="lb-close aligncenter">Cancel</a>
	</p>
</div>