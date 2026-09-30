<table width="650">
	<tr><td>
        <img src="<?php _e(base_url('assets/images/emailheader.png')); ?>" alt="Jai Group"/>
	</td></tr>
	<tr><td>
		<p>
			Thank you for your order.  Your catering order is now confirmed.<br />
			A PDF copy of your order is attached.
		</p>
		<p style="padding: 10px; border: 2px solid #C00; background-color: #fee; font-size: 130%;">
			<?php if($orderdata['paymentmode'] == "Credit Card / Paypal") : ?>
				<strong><a href="<?php _e(site_url('acknowledgeorder.php?oh=' . $orderdata['orderhash']))?>">Action Required: Click here to acknowledge this confirmation and pay for the order.</a></strong>			
			<?php else: ?>
				<strong><a href="<?php _e(site_url('acknowledgeorder.php?oh=' . $orderdata['orderhash']))?>">Action Required: Click here to acknowledge this confirmation.</a></strong>
			<?php endif; ?>
		</p>	
	</td></tr>
	<tr><td>
		<?php $this->load->view("emails/inc-orderdetails_view"); ?>
	</td></tr>
</table>