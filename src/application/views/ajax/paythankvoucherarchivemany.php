<div class="lb-close btn"></div>
<h3>Pay, Thank with Voucher, Archive Orders </h3>
<div class="lb-form">
	<?php _e(form_open(site_url('jtadmin/paythankvoucherarchivemany')) . formSubmitted()); ?>
		<p>Are you sure you want to (1) Mark Paid, (2) Thank with Voucher and (3) Archive the following orders?</p>
		<p>
			<?php foreach($order as $thisorder) { ?>
				<input id="cb<?php _e($thisorder['id']) ?>" name="selectedids[]" type="checkbox" value="<?php _e($thisorder['id']) ?>" checked="checked"/>
				<label for="cb<?php _e($thisorder['id']) ?>"><?php _e(formatOrderNum($thisorder)); ?></label><br />
			<?php } ?>
		</p>
		<p>
			<a href="#" class="submitthisform">Process Selected Orders</a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="#" class="lb-close aligncenter">Cancel</a>
		</p>
	<?php _e(form_close()); ?>
</div>