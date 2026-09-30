<div class="lb-close btn"></div>
<h3>Add To Calendar for <?php _e(formatOrderNum($order)); ?></h3>
<div class="lb-form">
	<?php //print_r($order); ?>
	
<?php 
	
	//desc
	$cart = unserialize($order['items']); 
	$cartitems = $cart['items'];
	$listofmenus = array();
	foreach ($cartitems as $cartitem):
		if ($cartitem['menutype'] == JT_SETMENU) {
			$listofmenus[] = $cartitem['title'] . " (" . $cartitem['numpax'] . " pax)";
		}
		elseif ($cartitem['menutype'] == JT_ALACARTEMENU) {
			$listofmenus[] = $cartitem['title'];
		}
	endforeach;
	if ($order['deliverypickup'] == "pickup") {
		$deliverypickup = "Pickup";
	}
	else {
		$deliverypickup = "Delivery";
	}
	
	$description = $deliverypickup . ": " . urlencode(implode(" + ", $listofmenus));
	
	//date and time
	$functiondate = strtotime($order['functiondate']);
	$functiondate = date('Ymd', $functiondate);


	$timestart = $order['timestart'];
	$timeend = $order['timeend'];
	if ($timestart) { 
		$timestart = substr($timestart, 0, 4);
	}
	if ($timeend && $timeend != "-") { 
		$timeend = substr($timeend, 0, 4);
	}
	else {
		$timeend = $timestart;
	}
	$timestart = urlencode($functiondate . "T" . $timestart);
	$timeend = urlencode($functiondate . "T" . $timeend);
	
	//location
	if ($order['deliverypickup'] == "pickup") {
		$location = urlencode($order['pickuplocation']);
	}
	else {
		$location = urlencode($order['address'] . " " . $order['unitnum'] . " Singapore " . $order['postalcode']);
	}

	//customer details
	$details = urlencode(formatOrderNum($order) . "\n" . $order['name'] . "\n" . $order['mobile'] . "\n". $order['email']);
	
	$url = "https://www.google.com/calendar/render?action=TEMPLATE&hl=en_GB&text=" . $description . 
					"&dates=" . $timestart . "00/" . $timeend . "00&location=" . $location . 
					"&ctz=Asia/Singapore&details=" . $details . "&sf=true&output=xml";	

	//sms message
	$this->load->helper('sms');
	$smsmsg = jt_compose_sms($order);

	?>	
	
	<p><a target="_blank" href="<?php _e($url); ?>">Add the event</a> to  to your Google Calendar.</p>
	<p><a title="<?php _e(htmlentities($smsmsg)); ?>" href="<?php _e(site_url('jtadmin/sendordersms/' . $order['id'])); ?>" class='jtsendsms'>Send an SMS</a> to yourself</p>
	<p>
		<a href="<?php _e(site_url('jtadmin/addtocalendar/' . $order['id'])); ?>">Mark as Added</a>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="#" class="lb-close aligncenter">Cancel</a>
	</p>
</div>