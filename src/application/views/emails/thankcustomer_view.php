<table width="650">
	<tr><td>
        <img src="<?php _e(base_url('assets/images/emailheader.png')); ?>" alt="Jai Group"/>
	</td></tr>
	<tr><td>	
		<p>Sawasdee kha valued customer!</p>
		<p>I hope you and your guest enjoyed your meal!</p>
		<p>Let me take this opportunity to thank you for choosing Jai Thai Restaurant to provide you with the most wallet-friendly authentic Thai cuisine. We appreciate your confidence in us and your order, and we would also appreciate any feedback you may have for us so that we can better ourselves.</p>
		<?php if (sizeof($voucherdata)): //check if voucherdata is provided ?>
			<p>I would also like to invite you to dine at our restaurants! For that, I have attached a <?php _e(sprintf('%0d%% discount', $voucherdata['amount'])); ?> voucher for you.</p>
		<?php endif; ?>
		<p>Please let us know if you or your guests would like us to cater for any future functions you may have, we are more than happy to help! </p>
		<p style="padding: 10px; border: 2px solid #C00; background-color: #fee; font-size: 130%;">
			<strong><a href="<?php _e(site_url('leavefeedback.php?oh=' . $orderdata['orderhash']))?>">Please click here to leave your feedback.</a></strong>
		</p>	
		<p>We look forward to seeing you again in future.</p>
		<p>Khob Khun Kha.</p>
		<p>&nbsp;</p>
		<p><em>Warmest regards,</em></p>
		<p><em>Anne<br />(Mobile 8118 3202)</em></p>
	</td></tr>
</table>