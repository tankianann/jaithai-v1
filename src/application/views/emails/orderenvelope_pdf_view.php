<?php
$cart = $orderdata['items'];
$cart = unserialize($cart);
?>
<?php //this part is the envelope ?>
<div style="font-size: 80%;">

    <?php //panel 1 ?>
	<div style="position: relative; width: 700px; height: 314px; border-bottom: 1px dotted #bbb;">
        <?php
        $bkgimg = "";
        if (in_array ($orderdata['a_assignedoutlet'], array('SP'))): /* different header for jai siam */
            $bkgimg = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/jaisiam-pdfenvheader.png';
        else :
            $bkgimg = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/jaithai-pdfenvheader.png';
        endif;
        ?>
		<img src="<?php _e($bkgimg); ?>" style="position: absolute; top: 0; left: 0;"/>

		<?php 
			if ($orderdata['a_confirmationsent'] == "0000-00-00 00:00:00") {
				$pendingconfirmed = "(Pending)";
				$numbertype = "Order Number";
			}
			else {
				$pendingconfirmed = "(Confirmed)";		
				$numbertype = "Invoice Number";
			}
		?>
		<div class="orderdetailswrap">
			<table class="orderdetails" cellspacing="0" cellpadding="0" style="color: #000; position: absolute; top: 50px; border-collapse: collapse; width: 70%; margin: 0 auto;">
			
				<tr>
					<th style="text-align:left; vertical-align: top; padding-bottom: 1px; width: 130px" nowrap="nowrap"><?php _e($numbertype); ?></th>
					<td style="text-align:left; vertical-align: top; padding-bottom: 1px; "><?php _e(formatOrderNum($orderdata)); ?></td>
				</tr>
				<tr>
					<th style="text-align:left; vertical-align: top; padding-bottom: 1px; " nowrap="nowrap">Date of Function</th>
					<td style="text-align:left; vertical-align: top; padding-bottom: 1px; "><?php _e(date('d-M-Y', strtotime($orderdata['functiondate']))); ?></td>
				</tr>
				
				<?php if ($orderdata['deliverypickup'] == 'pickup'): ?>
					<tr>
						<th style="text-align:left; vertical-align: top; padding-bottom: 1px; " nowrap="nowrap">Self-Collect Time</th>
						<td style="text-align:left; vertical-align: top; padding-bottom: 1px; "><?php _e($orderdata['timestart']); ?></td>
					</tr>
					<tr>
						<th style="text-align:left; vertical-align: top; padding-bottom: 1px; " nowrap="nowrap">Self-Collect Location</th>
						<td style="text-align:left; vertical-align: top; padding-bottom: 1px; "><?php _e($orderdata['pickuplocation']); ?></td>
					</tr>
				<?php elseif($orderdata['deliverypickup'] == 'delivery'): ?>
					<tr>
						<th style="text-align:left; vertical-align: top; padding-bottom: 1px; " nowrap="nowrap">Ready to Eat Time</th>
						<td style="text-align:left; vertical-align: top; padding-bottom: 1px; "><?php _e($orderdata['timestart']); ?></td>
					</tr>
                    <?php if ($cart['chargeforcontainers']) : ?>
                        <tr>
                            <th style="text-align:left; vertical-align: top; padding-bottom: 1px; " nowrap="nowrap">Collection Time</th>
                            <td style="text-align:left; vertical-align: top; padding-bottom: 1px; ">-</td>
                        </tr>
                    <?php else: ?>
                        <tr>
                            <th style="text-align:left; vertical-align: top; padding-bottom: 1px; " nowrap="nowrap">Collection Time</th>
                            <td style="text-align:left; vertical-align: top; padding-bottom: 1px; "><?php _e($orderdata['timeend']); ?></td>
                        </tr>
                    <?php endif; ?>
				<?php endif; ?>
				
				<tr>
					<th style="text-align:left; vertical-align: top; padding-bottom: 1px; " nowrap="nowrap">Contact Person</th>
					<td style="text-align:left; vertical-align: top; padding-bottom: 1px; "><?php _e($orderdata['name']); ?></td>
				</tr>
				<tr>
					<th style="text-align:left; vertical-align: top; padding-bottom: 1px; " nowrap="nowrap">Telephone No</th>
					<td style="text-align:left; vertical-align: top; padding-bottom: 1px; "><?php _e($orderdata['telephone']); ?></td>
				</tr>
				<tr>
					<th style="text-align:left; vertical-align: top; padding-bottom: 1px; " nowrap="nowrap">Mobile No</th>
					<td style="text-align:left; vertical-align: top; padding-bottom: 1px; "><?php _e($orderdata['mobile']); ?></td>
				</tr>

				<?php if($orderdata['deliverypickup'] == 'delivery'): ?>
				<tr>
					<th style="text-align:left; vertical-align: top; padding-bottom: 1px; " nowrap="nowrap">Delivery Address</th>
					<td style="text-align:left; vertical-align: top; padding-bottom: 1px; " >
                        <?php _e($orderdata["company"] ? $orderdata['company'] . "<br />": ""); ?>
                        <?php _e($orderdata['address'] ); ?>
						<?php _e($orderdata["unitnum"] ? $orderdata['unitnum'] : ""); ?>
						<?php _e($orderdata["buildingname"] ? "<br />" . $orderdata['buildingname'] : ""); ?>
						<?php _e("<br />Singapore " . $orderdata['postalcode']); ?>
                    </td>
				</tr>
				<?php endif; ?>

				<tr>
					<th style="text-align:left; vertical-align: top; padding-bottom: 1px; " nowrap="nowrap">Grand Total</th>
					<td style="text-align:left; vertical-align: top; padding-bottom: 1px; " ><?php _e(sprintf("$%0.2f", $orderdata['ordertotalprice'])); ?> (<?php _e($orderdata['paymentmode']); ?>)</td>
				</tr>
				<tr>
					<th style="text-align:left; vertical-align: top; padding-bottom: 1px;">Notes</th>
					<td style="text-align:left; vertical-align: top; padding-bottom: 1px;"><?php _e($orderdata['notes']); ?></td>
				</tr>
			</table>
		</div>
	</div>

	<?php //panel 2 ?>
	<div style="height: 295px; padding-top: 100px; border-bottom: 1px dotted #bbb; ">
		<div style="border: 3px double #f37126; width: 400px; margin: 0 auto; padding: 10px 10px 10px 100px;">
			<p>
				Thank you for your support and entrust us for your special event.<br />  
				If you are paying by cheque, please make cheque payable to
			</p>
			<p>
				[&nbsp;&nbsp;]&nbsp;&nbsp;Thai Kitchen Pte Ltd.<br />
				[&nbsp;&nbsp;]&nbsp;&nbsp;Thaicoon Aunt Pte Ltd.<br />
				[&nbsp;&nbsp;]&nbsp;&nbsp;Jai Thai Restaurant Pte. Ltd.<br />
				[&nbsp;&nbsp;]&nbsp;&nbsp;Jai Siam Pte. Ltd.
			</p>			
		</div>
	</div>

	<?php //panel 3 ?>
	<div style="height: 295px;">
		<div style="font-size: 16px; text-align: center; padding-top: 120px; margin-bottom: 5px; color: #f37126;"><strong>Jai Thai Restaurant</strong></div>
		<div style="font-size: 11px; text-align: center; color: #444">
			<strong>Jln Pemimpin Branch</strong> 7 Clover Way Singapore 579080 Tel: 6 258 0228<br />
			<strong>Purvis Street Branch</strong> 27 Purvis Street #01-01 An Chuan Building Singapore 188604 Tel: 6 336 6908<br />
		</div>
	</div>


</div>

<?php
// put the invoice after the envelope
$emaildata['orderdata'] = $orderdata;
$this->load->view('emails/order_pdf_view', $emaildata);
?>