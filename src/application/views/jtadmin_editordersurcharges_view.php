<?php showStatusMessage($this->session->userdata('statusmessage')); ?>
<?php $this->session->unset_userdata('statusmessage'); ?>

<h1>Edit Order Surcharges</h1>

<?php _e(form_open() . formSubmitted()); ?>
<table class="shoppingcart">

	<thead>
		<tr>
			<th>Surcharge Desc</th>
			<th>Amount</th>
		</tr>
	</thead>
	
	<tbody>
		<?php 
			//add one additional line below
			$surcharges[''] = "";
		?>
	
		<?php foreach($surcharges as $key => $amount): ?>
		<tr>
			<td>
				<p><input type="text" name="desc[]" value="<?php _e($key); ?>" class="w350 textbox"/></p>
			</td>
			<td>
				<p>$ <input type="text" name="amount[]" value="<?php _e(sprintf("%0.2f", $amount)); ?>" class="w50 textbox price"/></p>
			</td>
		</tr>
		<?php endforeach;?>
	</tbody>
	
</table>
<input id="formsubmit" type="submit" name="formsubmit" class="button" value="Save Changes"> 
<a href="<?php _e(site_url('jtadmin/vieworder/' .  $this->uri->segment(3))) ?>" class="button">Cancel</a>
<?php _e(form_close()); ?>
