<div id="content" class="row">
	<div class="col-sm-12">
	
	
<?php showStatusMessage($this->session->userdata('statusmessage')); ?>
<?php $this->session->unset_userdata('statusmessage'); ?>

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

<h1>Help Us Better Ourselves!</h1>

<p>Thank you for choosing Jai Thai Restaurant to provide you with the most wallet-friendly authentic Thai cuisine. Kindly fill out the short survey below to help us so that we can better ourselves.</p>

<div class="orderdetailswrap">
	<table class="orderdetails">
	
		<tr>
			<th nowrap="nowrap"><?php _e($numbertype); ?></th>
			<td><?php _e(formatOrderNum($orderdata)); ?></td>
			<th nowrap="nowrap">Date of Function</th>
			<td><?php _e(date('d-M-Y', strtotime($orderdata['functiondate']))); ?></td>
		</tr>
		
		<?php if ($orderdata['deliverypickup'] == 'pickup'): ?>
			<tr>
				<th nowrap="nowrap">Self-Collect Time</th>
				<td><?php _e($orderdata['timestart']); ?></td>
				<th nowrap="nowrap">Self-Collect Location</th>
				<td><?php _e($orderdata['pickuplocation']); ?></td>
			</tr>
		<?php elseif($orderdata['deliverypickup'] == 'delivery'): ?>
			<tr>
				<th nowrap="nowrap">Ready to Eat Time</th>
				<td><?php _e($orderdata['timestart']); ?></td>
				<th nowrap="nowrap">Collection Time</th>
				<td><?php _e($orderdata['timeend']); ?></td>
			</tr>
            <tr>
                <th nowrap="nowrap">Type of Function</th>
                <td colspan="3"><?php _e($orderdata['typeoffunction']); ?></td>
            </tr>
		<?php endif; ?>
		
		<tr>
			<th nowrap="nowrap">Contact Person</th>
			<td><?php _e($orderdata['name']); ?></td>
			<th nowrap="nowrap">Email Address</th>
			<td><?php _e($orderdata['email']); ?></td>
		</tr>
		<tr>
			<th nowrap="nowrap">Telephone No</th>
			<td><?php _e($orderdata['telephone']); ?></td>
			<th nowrap="nowrap">Mobile No</th>
			<td><?php _e($orderdata['mobile']); ?></td>
		</tr>
		<tr>
            <th nowrap="nowrap">Delivery Address</th>
            <td>
                <?php _e($orderdata["company"] ? $orderdata['company'] . "<br />": ""); ?>
				<?php _e($orderdata['address'] ); ?>
				<?php _e($orderdata["unitnum"] ? $orderdata['unitnum'] : ""); ?>
				<?php _e($orderdata["buildingname"] ? "<br />" . $orderdata['buildingname'] : ""); ?>
				<?php _e("<br />Singapore " . $orderdata['postalcode']); ?>
				<?php _e(setuparea($orderdata['setuparea'], $orderdata['accessiblebylift'])); ?>
                <?php if ($orderdata['cutleryrequired']) { _e("<br/>Cutlery Required:" . $orderdata['cutleryrequired']); } ?>
                <?php if ($orderdata['tablesrequired']) { _e("<br/>Tables Required:" . $orderdata['tablesrequired']); } ?>
            </td>
            <th nowrap="nowrap">Billing Address</th>
            <td>
				<?php if ($orderdata['sameasdelivery']): ?>
                    <?php _e($orderdata["company"] ? $orderdata['company'] . "<br />": ""); ?>
					<?php _e($orderdata['address'] ); ?>
					<?php _e($orderdata["unitnum"] ? $orderdata['unitnum'] : ""); ?>
					<?php _e($orderdata["buildingname"] ? "<br />" . $orderdata['buildingname'] : ""); ?>
					<?php _e("<br />Singapore " . $orderdata['postalcode']); ?>
				<?php else: ?>
					<?php _e($orderdata["billcompany"] ? $orderdata['billcompany'] . "<br />": ""); ?>
					<?php _e($orderdata['billaddress'] ); ?>
					<?php _e($orderdata["billunitnum"] ? $orderdata['billunitnum'] : ""); ?>
					<?php _e($orderdata["billbuildingname"] ? "<br />" . $orderdata['billbuildingname'] : ""); ?>
					<?php _e("<br />Singapore " . $orderdata['billpostalcode']); ?>
				<?php endif; ?>
            </td>
		</tr>
		<tr>
			<th nowrap="nowrap">Order Date</th>
			<td><?php _e(date('d-M-Y', strtotime($orderdata['ordertime']))); ?></td>
			<th nowrap="nowrap">Payment Mode</th>
			<td><?php _e($orderdata['paymentmode']); ?></td>
		</tr>

	</table>
</div>

<?php _e(form_open() . formSubmitted()); ?>
<div class="feedbackform">
	
	<ol>
		<li>
			<div class="qn">How was your overall experience with Jai Thai Catering?</div>
			<div class="control"><?php _e(feedbackRating('qn1', 'qn1', '', '3', array('Not Good', 'Wonderful'))); ?></div>
		</li>
		<li>
			<div class="qn">How was the food?</div>
			<div class="control"><?php _e(feedbackRating('qn2', 'qn2', '', '3', array('Inedible', 'Delicious'))); ?></div>
		</li>
		<li>
			<div class="qn">How likely are you to recommend us to others?</div>
			<div class="control"><?php _e(feedbackRating('qn3', 'qn3', '', '3', array('Never', 'Definitely'))); ?></div>
		</li>
		<li>
			<div class="qn">How did you learn about Jai Thai catering?</div>
			<div class="control">
				<?php _e(feedbackCheckboxes('qn4', 'qn4', '', array(), array('From a Friend', 'Internet Search', 'On the Web', 'Visited our Restaurant', 'From an Ad', 'Repeat Customer'))); ?>
				<br />
				Others, please specify: <?php _e(feedbackTextbox('qn4a', 'qn4a', 'textbox w150', '')); ?> 
			</div>
		</li>
		<li>
			<div class="qn">Would you have any other comments and feedback?</div>
			<div class="control"><?php _e(feedbackTextArea('qn5', 'qn5', 'textbox w400 h100', '')); ?></div>
		</li>
		<li>
			<div class="qn">May we use your name and comments in our literature or website?</div>
			<div class="control"><?php _e(feedbackYesNo('qn6', 'qn6', '', 'Yes')); ?></div>
		</li>
	</ol>
	<input type="hidden" name="orderid" value="<?php _e($orderdata['id']) ?>" />
	<input id="formsubmit" type="submit" name="formsubmit" value="Send Feedback" class="btn btn-primary">
	
</div>
<?php _e(form_close()); ?>

	</div><!-- /content -->
</div>