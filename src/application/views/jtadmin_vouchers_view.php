<?php showStatusMessage($this->session->userdata('statusmessage')); ?>
<?php $this->session->unset_userdata('statusmessage'); ?>
<h1>Promo Voucher Templates</h1>
<p>These vouchers are to be printed and filled in, and delivered with the invoice along with the food delivery / collection.</p>
<div class="voucherdetailsswrap">
    <table class="voucherdetails">
        <tr>
            <th>Details</th>
            <th>To Fill In</th>
            <th>Download</th>
        </tr>
        <tr>
            <td>
                <strong>$30 East Coast Dine-In Voucher</strong><br/>
                <ul>
                    <li>Ala-carte items only.</li>
                    <li>Excluding 9th/10th May 2015 (Mothers' Day Weekend).</li>
                    <li>Any day of the week.</li>
                    <li>Min Spend $50.</li>
                </ul>
                <p>Promo ID: PROMO30ECVOUCHER</p>
            </td>
            <td>
                <ul>
                    <li>Voucher number - Catering order number.</li>
                    <li>Expiry date - 2 months from date of issue.</li>
                </ul>
            </td>
            <td>
                <a href="<?php _e(base_url('/assets/voucher-templates/promo30ecvoucher.pdf')); ?>" target="_blank">PDF</a>
                <br/><br/>
                <a href="<?php _e(base_url('/assets/voucher-templates/promo30ecvoucher.docx')); ?>" target="_blank">Word</a>
            </td>
        </tr>
    </table>
</div>


<h1>Feedback Vouchers</h1>

<?php if (sizeof($vouchers)): ?>
	<div class="voucherdetailsswrap">
		<table class="voucherdetails">
			<tr>
				<th class="w100">Voucher No</th>
				<th class="w50">Amount</th>
				<th class="w50">Name</th>
				<th class="w50">Email</th>
				<th class="w50">Date Issued</th>
				<th class="w50">Date Expire</th>
				<th class="w50">Date Used</th>
			</tr>
			<?php foreach($vouchers as $voucher): ?>
				<tr>
				    <td><?php _e($voucher['vouchernum']); ?></td>
				    <td>
				    	<?php if ($voucher['type'] == 'dollars'): ?>
							$<?php _e($voucher['amount']); ?>
				    	<?php elseif ($voucher['type'] == 'percent'): ?>
							<?php _e($voucher['amount']); ?>%
				    	<?php endif; ?>
					</td>
				    <td><?php _e($voucher['name']); ?></td>
				    <td><?php _e($voucher['email']); ?></td>
				    <td><?php _e(date('d-M-Y', strtotime($voucher['dateissue']))); ?></td>
				    <td><?php _e(date('d-M-Y', strtotime($voucher['dateexpire']))); ?></td>
				    <td>
				    	<?php if ("0000-00-00 00:00:00" == $voucher['dateused']): ?>
				    		Not Used Yet (<a href="#<?php _e($voucher['id']) ?>" class="lb-option">Use Now</a>)
				    	<?php else: ?>
				    		<?php _e(date('d-M-Y', strtotime($voucher['dateused']))); ?>
				    	<?php endif; ?>
				    </td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
<?php else: ?>
	<p>No vouchers sent yet.</p>
<?php endif; ?>


<div id="lightbox">
	<div class="lb-apiurl"><?php _e(site_url('jtadmin/ajaxusevoucher')) ?></div>
	<div class="lb-bkg"></div>
	<div class="lb-contentwrap"><div class="lb-content"></div></div>
</div>