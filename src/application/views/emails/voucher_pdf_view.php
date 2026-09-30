<?php 
	$bkgimg = base_url('assets/images/voucher-bkg-jaisiam.jpg');

	$vouchernum = $voucherdata['vouchernum'];
	$amount = $voucherdata['amount'];

	$dateissue = $voucherdata['dateissue'];
	$dateissue = date('d M Y', strtotime($dateissue));
	$dateexpire = $voucherdata['dateexpire'];
	$dateexpire = date('d M Y', strtotime($dateexpire));
?>
<div style="font-size: 80%; font-family: Arial;">

	<div style="font-family: 'Helvetica'; color:#000; text-align: center; font-size: 20px; padding: 20px; text-transform: uppercase;">
		<strong>Please Print This Voucher</strong>
	</div>

	<div style="position: relative; width: 700px; height: 430px;">
		<img src="<?php _e($_SERVER['DOCUMENT_ROOT'] . '/assets/images/voucher-bkg-jaisiam.jpg'); ?>" alt="Jai Siam Voucher" style="position: absolute"/>
		<div style="font-family: 'Helvetica'; position: absolute; width: 700px; top: 270px; text-align: center; color: #fff; font-size: 30px; font-weight: bold;"><?php _e("#" . $vouchernum); ?></div>
		<div style="font-family: 'Helvetica'; position: absolute; width: 700px; top: 310px; text-align: center; color: #fff; font-size: 20px; font-weight: bold;">Expiry Date: <?php _e($dateexpire); ?> - Multiple Use Allowed</div>
	</div>

	<div style="font-family: 'Helvetica'; color:#f15f22; font-size: 14px; padding: 20px; margin: 25px 2px 0 2px; border: 1px solid #333;">
		<p><strong>Terms & Conditions:</strong></p>
		<ul>
			<li>Please print and present this voucher before ordering.</li>
			<li>This voucher is for multiple use and strictly not valid after expiry date.</li>
			<li>Voucher is not exchangeable for cash.</li>
			<li>Valid only for ala carte items and not in conjunction with any promotion and discount cards.</li>
			<li>Valid for dine-in only.</li>
			<li>Applicable with minimum spending of $50.</li>
			<li>Management reserves the rights to amend the privileges or terms and conditions without prior notice.</li>
			<li>Validity for 1 month from the date of issue.</li>
		</ul>
		<p><strong>This voucher can be used only at:</strong></p>
		<p>Jai Siam East Coast Branch<br/>205 East Coast Road Singapore 428904 <br/>Tel: 6 346 4940<br><span style="background-color: #FFFF00">*** Not Valid for Friday, Saturday and Sunday Dinner at East Coast Branch ***</span></p>
	</div>

</div>