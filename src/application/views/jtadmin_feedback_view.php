<?php showStatusMessage($this->session->userdata('statusmessage')); ?>
<?php $this->session->unset_userdata('statusmessage'); ?>
<h1>Feedback Received</h1>
<div class="feedbackquestions">
	<p><strong>Feedback Questions</strong></p>
	<ol>
		<li>
			<div class="qn">How was your overall experience with Jai Thai Catering? (1 = Not Good, 5 = Wonderful)</div>
		</li>
		<li>
			<div class="qn">How was the food? (1 = Inedible, 5 = Delicious)</div>
		</li>
		<li>
			<div class="qn">How likely are you to recommend us to others?  (1 = Never, 5 = Definitely)</div>
		</li>
		<li>
			<div class="qn">How did you learn about Jai Thai catering?</div>
		</li>
		<li>
			<div class="qn">Would you have any other comments and feedback?</div>
		</li>
		<li>
			<div class="qn">May we use your name and comments in our literature or website?</div>
		</li>
	</ol>
</div>

<?php if (sizeof($feedbacks)): ?>
	<div class="feedbackdetailsswrap">
		<table class="feedbackdetails">
			<tr>
				<th class="w100">Order ID</th>
				<th class="w50">Q1</th>
				<th class="w50">Q2</th>
				<th class="w50">Q3</th>
				<th class="w100">Q4</th>
				<th>Q5</th>
				<th class="w50">Q6</th>
			</tr>
			<?php foreach($feedbacks as $feedback): ?>
				<tr>
					<td><a href="<?php _e(site_url('jtadmin/vieworder/' . $feedback['orderid'])) ?>"><?php _e(formatOrderNum($feedback, true)); ?></a></td>
					<td><?php _e($feedback['qn1']); ?></td>
					<td><?php _e($feedback['qn2']); ?></td>
					<td><?php _e($feedback['qn3']); ?></td>
					<td>
						<?php _e($feedback['qn4']); ?>
						<?php if ($feedback['qn4a']) { _e($feedback['qn4a']); } ?>
					</td>
					<td><?php _e($feedback['qn5']); ?></td>
					<td><?php _e($feedback['qn6']); ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
<?php else: ?>
	<p>No feedback received yet.</p>
<?php endif; ?>
<div id="lightbox">
	<div class="lb-apiurl"><?php _e(site_url('jtadmin/ajax')) ?></div>
	<div class="lb-bkg"></div>
	<div class="lb-contentwrap"><div class="lb-content"></div></div>
</div>