<div class="lb-close btn"></div>
<h3>Remove Order Item</h3>
<div class="lb-form">
	<p>Are you sure you want to remove the item <?php _e($cartitem['title']); ?> form this order?</p>
	<p>
		<a href="<?php _e(site_url('jtadmin/removeorderitem/' . $orderid . "/" . $cartitemkey)); ?>">Remove Item</a>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="#" class="lb-close aligncenter">Cancel</a>
	</p>
</div>