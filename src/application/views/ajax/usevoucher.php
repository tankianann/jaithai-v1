<div class="lb-close btn"></div>
<h3>Use Voucher <?php _e($voucher['vouchernum']); ?></h3>
<div class="lb-form">
	<p>Are you sure you want mark the voucher <?php _e($voucher['vouchernum']); ?> as used?</p>
	<p>
		<a href="<?php _e(site_url('jtadmin/usevoucher/' . $voucher['id'])); ?>">Mark as Used</a>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="#" class="lb-close aligncenter">Cancel</a>
	</p>
</div>

