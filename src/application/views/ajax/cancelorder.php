<div class="lb-close btn"></div>
<?php if ($order['a_cancelled'] == '0000-00-00 00:00:00'): ?>
<h3>Cancel Order <?php _e(formatOrderNum($order)); ?></h3>
<div class="lb-form">
    <p>Are you sure you want to cancel order <?php _e(formatOrderNum($order)); ?>?</p>
    <p>
        <a href="<?php _e(site_url('jtadmin/cancelorder/' . $order['id'])); ?>">Cancel Order</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="<?php _e(site_url('jtadmin/cancelandarchiveorder/' . $order['id'])); ?>">Cancel and Archive Order</a>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="#" class="lb-close aligncenter">Cancel</a>
    </p>
</div>
<?php else: ?>
<h3>Restore Order <?php _e(formatOrderNum($order)); ?></h3>
<div class="lb-form">
	<p>Are you sure you want to restore order <?php _e(formatOrderNum($order)); ?>?</p>
	<p>
		<a href="<?php _e(site_url('jtadmin/uncancelorder/' . $order['id'])); ?>">Restore Order</a>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="#" class="lb-close aligncenter">Cancel</a>
	</p>
</div>
<?php endif; ?>
