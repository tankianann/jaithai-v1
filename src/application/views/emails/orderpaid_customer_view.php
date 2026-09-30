<table width="650">
	<tr><td>
        <img src="<?php _e(base_url('assets/images/emailheader.png')); ?>" alt="Jai Group"/>
	</td></tr>
	<tr><td>
		<p>
			Thank you for your order.  The payment for your catering order has been received.<br />
			A PDF copy of your order is attached.
		</p>
	</td></tr>
	<tr><td>
		<?php $this->load->view("emails/inc-orderdetails_view"); ?>
	</td></tr>
</table>