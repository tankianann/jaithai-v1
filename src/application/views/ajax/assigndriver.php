<div class="lb-close btn"></div>
<h3>Assign Driver for <?php _e(formatOrderNum($order)); ?></h3>
<div class="lb-form">
	<?php _e(form_open(site_url('jtadmin/assigndriver/' . $order['id'])) . formSubmitted()); ?>
	<div>
		<label>Driver Name </label>
		<input type="text" name="drivername" id="drivername" value="<?php _e($order['a_assigneddriver']); ?>" class="w200 textbox"/>
		<div class='driverlist'>
			<div class="show"><img src="<?php _e(base_url('assets/images/dropdown-arrow.png')); ?>" alt="Select from a list" /></div>
			<ul>
				<?php if (is_array($drivers) && sizeof($drivers)): ?>
					<?php foreach ($drivers as $driver): ?>
						<li><a href="#"><?php _e($driver); ?></a></li>
					<?php endforeach; ?>
				<?php endif; ?>
			</ul>
		</div>
	
	</div>
	<div><input id="formsubmit" type="submit" name="formsubmit" class="button mleft150" value="Submit"></div>
	<?php _e(form_close()); ?>
</div>

