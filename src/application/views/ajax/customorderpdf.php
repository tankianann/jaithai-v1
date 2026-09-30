<div class="lb-close btn"></div>
<h3>Generate Custom Order PDF for <?php _e(formatOrderNum($order)); ?></h3>
<div class="lb-form">
	<?php _e(form_open(site_url('jtadmin/vieworderpdf/' . $order['id'])) . formSubmitted()); ?>
	<div>
		<label>PDF Title</label>
		<input type="text" name="custom_pdf_title" id="custom_pdf_title" value="" class="w200 textbox"/>
	</div>
	<div>
		<label>Send to Customer</label>
		<input type="checkbox" name="send_to_customer" id="send_to_customer" value="yes"/><br/><br/>
	</div>
	<div><input id="formsubmit" type="submit" name="formsubmit" class="button mleft150" value="Submit"></div>
	<?php _e(form_close()); ?>
</div>

