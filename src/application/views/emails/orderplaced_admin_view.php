<table width="650">
	<tr><td>
        <img src="<?php _e(base_url('assets/images/emailheader.png')); ?>" alt="Jai Group"/>
	</td></tr>
	<tr><td>	
		<p>
			A new order has been placed on Jai-Thai.com.<br />
			You can manage the order in the <a href="<?php _e(site_url('jtadmin')); ?>">Jai-Thai Catering Admin module.</a>
		</p>	
	</td></tr>
	<tr><td>
		<?php $this->load->view("emails/inc-orderdetails_view"); ?>
	</td></tr>
</table>