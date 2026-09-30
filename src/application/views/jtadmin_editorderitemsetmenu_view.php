<?php showStatusMessage($this->session->userdata('statusmessage')); ?>
<?php $this->session->unset_userdata('statusmessage'); ?>

<h1>Edit Order Item</h1>

<?php _e(form_open() . formSubmitted()); ?>
<table class="shoppingcart">

	<thead>
		<tr>
			<th colspan="3">
				<label>Menu Name</label><br/>
				<input type="text" name="title" value="<?php _e($cartitem['title']); ?>" class="w400 textbox"/>
			</th>
		</tr>
		<tr>
			<th>Menu Details</th>
			<th>Num Pax</th>
			<th>Total</th>
		</tr>
	</thead>
	
	<tbody>
		<tr>
			<td>
							
				<p>
					<label>Price Per Pax</label><br/>
					$ <input type="text" id="perpax" name="perpax" value="<?php _e($cartitem['perpax']); ?>" class="w50 textbox"/>
				</p>
				<p>
					<label>Dishes (One dish per line, excluding the Add-On Drink)</label><br/>
					<textarea name="dishes" class="textbox w400 h200"><?php _e(implode("\n", $cartitem['dishes'])); ?></textarea>					
				</p>
				<p>
					<label>Add On Drink</label><br/>
					<?php _e(selectBoxHelper("ADDON_DRINKS", "addondrink", "addondrink", "textbox w150", $cartitem['addondrink'])); ?>
				</p>
			</td>
			<td><input type="text" name="numpax" id="numpax" value="<?php _e($cartitem['numpax']); ?>" class="w50 textbox"/></td>
			<td><div class="foodprice"><?php _e(sprintf("$%0.2f", $cartitem['foodprice'])); ?></div></td>
		</tr>
	</tbody>

</table>
<input id="formsubmit" type="submit" name="formsubmit" class="button" value="Save Changes"> 
<a href="<?php _e(site_url('jtadmin/vieworder/' .  $this->uri->segment(3))) ?>" class="button">Cancel</a>
<?php _e(form_close()); ?>
