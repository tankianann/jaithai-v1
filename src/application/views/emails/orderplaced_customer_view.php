<table width="650">
	<tr><td>
        <img src="<?php _e(base_url('assets/images/emailheader.png')); ?>" alt="Jai Group"/>
	</td></tr>
	<tr><td>	
		<p>
			Thank you for your order.  Your catering order has been placed and we will be in touch shortly.<br />
			Attached is a copy of your order details for your records.
		</p>	
	</td></tr>
	<tr><td>
		<?php $this->load->view("emails/inc-orderdetails_view"); ?>
	</td></tr>
</table>