<?php showStatusMessage($this->session->userdata('statusmessage')); ?>
<?php $this->session->unset_userdata('statusmessage'); ?>

<h1>Edit Order Fees</h1>


<?php _e(form_open() . formSubmitted()); ?>
<div class="orderdetailswrap">
	<table class="orderdetails">
		<tr>
			<th nowrap="nowrap">Container Fee ($)</th>
			<td><input type="text" name="containerprice" value="<?php _e(sprintf('%.2f', $cart['containerprice'])); ?>" class="w200 textbox"/></td>
		</tr>
		<tr>
			<th nowrap="nowrap">Delivery Fee ($)</th>
			<td><input type="text" name="deliveryprice" value="<?php _e(sprintf('%.2f', $cart['deliveryprice'])); ?>" class="w200 textbox"/></td>
		</tr>
	</table>
</div>
<input id="formsubmit" type="submit" name="formsubmit" class="button" value="Save Changes"> 
<a href="<?php _e(site_url('jtadmin/vieworder/'  .  $this->uri->segment(3))) ?>" class="button">Cancel</a>
<?php _e(form_close()); ?>