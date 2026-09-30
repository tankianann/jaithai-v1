<div class="lb-close btn"></div>
<h3>Credit Orders </h3>
<div class="lb-form">
	<?php _e(form_open(site_url('jtadmin/creditmany')) . formSubmitted()); ?>
		<p>Are you sure you want to mark these orders as credit?</p>
		<p>
			<?php foreach($order as $thisorder) { ?>
				<input id="cb<?php _e($thisorder['id']) ?>" name="selectedids[]" type="checkbox" value="<?php _e($thisorder['id']) ?>" checked="checked"/>
				<label for="cb<?php _e($thisorder['id']) ?>"><?php _e(formatOrderNum($thisorder)); ?></label><br />
			<?php } ?>
		</p>
		<p>
			<a href="#" class="submitthisform">Credit Selected Orders</a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="#" class="lb-close aligncenter">Cancel</a>
		</p>
	<?php _e(form_close()); ?>
</div>