<?php showStatusMessage($this->session->userdata('statusmessage')); ?>
<?php $this->session->unset_userdata('statusmessage'); ?>

<h1>Edit Order Item</h1>

<?php _e(form_open() . formSubmitted()); ?>
<table class="shoppingcart">

	<thead>
		<tr>
			<th colspan="6">
				<label>Menu Name</label><br/>
				<input type="text" name="title" value="<?php _e($cartitem['title']); ?>" class="w400 textbox"/>
			</th>
		</tr>
		<tr>
			<th>Dish</th>
			<th>Serves</th>
			<th>Price</th>
			<th>Qty</th>
			<th>Total Serves</th>
			<th>Total Price</th>
		</tr>
	</thead>
	
	<tbody>
		<?php 
			//add 3 lines below to add new dishes 
			$dishes = $cartitem['dishes'];
			for ($i = 1; $i <= 3; $i++) {
				$dishes[] = array(
					'name' => '',
					'serves' => '',
					'price' => '',
					'qty' => ''
				);
			}
			
		?>
	
		<?php foreach($dishes as $key => $dish): ?>
		<tr>
			<td>
				<p><input type="text" name="name[]" value="<?php _e($dish['name']); ?>" class="w250 textbox"/></p>
			</td>
			<td>
				<p><input type="text" name="serves[]" value="<?php _e($dish['serves']); ?>" class="w50 textbox serves"/></p>
			</td>
			<td>
				<p>$ <input type="text" name="price[]" value="<?php _e(sprintf("%0.2f", $dish['price'])); ?>" class="w50 textbox price"/></p>
			</td>
			<td>
				<p><input type="text" name="qty[]" value="<?php _e($dish['qty']); ?>" class="w50 textbox qty"/></p>
			</td>
			<td>
				<div class="totalserves">
					<?php $servings = $dish['qty'] * $dish['serves']; ?>
					<?php _e($servings . " pax"); ?>
				</div>
			</td>
			<td>
				<div class="totalprice">
					<?php $price = $dish['qty'] * $dish['price']; ?>
					<?php _e(sprintf("$%0.2f", $price)); ?>
				</div>
			</td>
		</tr>
		<?php endforeach;?>
	</tbody>
	
</table>
<input id="formsubmit" type="submit" name="formsubmit" class="button" value="Save Changes"> 
<a href="<?php _e(site_url('jtadmin/vieworder/' .  $this->uri->segment(3))) ?>" class="button">Cancel</a>
<?php _e(form_close()); ?>
