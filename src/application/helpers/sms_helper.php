<?php
define('CLICKATELL_USERNAME', jaithai_env('JAITHAI_CLICKATELL_USERNAME', ''));
define('CLICKATELL_PASSWORD', jaithai_env('JAITHAI_CLICKATELL_PASSWORD', ''));
define('CLICKATELL_API_ID', jaithai_env('JAITHAI_CLICKATELL_API_ID', ''));

function do_sms($from, $to, $text) {
	if (
		! jaithai_outbound_enabled()
		|| CLICKATELL_USERNAME === ''
		|| CLICKATELL_PASSWORD === ''
		|| CLICKATELL_API_ID === ''
	) {
		return false;
	}

	$banned_numbers = array_filter(array_map('trim', explode(',', jaithai_env('JAITHAI_SMS_BANNED_NUMBERS', ''))));

	if (in_array ($to, $banned_numbers)) {
		return "";
	}

	/* $from must be from a verified sender id setup in Clickatell API */

	$smsurl = "http://api.clickatell.com/http/sendmsg?" .
		"user=" . CLICKATELL_USERNAME .
		"&password=" . CLICKATELL_PASSWORD .
		"&api_id=" . CLICKATELL_API_ID .
		"&from=" . urlencode($from) .
		"&to=" . urlencode($to) .
		"&text=" . urlencode($text) .
		"&concat=3";

	$ch = curl_init();
	$timeout = 10; // set to zero for no timeout
	curl_setopt ($ch, CURLOPT_URL, $smsurl);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$file_contents = curl_exec($ch);
	curl_close($ch);

	//file_put_contents("aaa.txt", $file_contents);
	return $file_contents;
}

function jt_compose_sms($order) {

	//first extract the menus
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

	//format the SMS - put segments in an array then implode
	$smsmessage = array();
	if ($order['deliverypickup'] == "pickup") {
		$smsmessage[] = "Pickup: ";
	}
	else {
		$smsmessage[] = "Delivery: ";
	}

	$smsmessage[] = implode(" + ", $listofmenus);
	$smsmessage[] = " (" . formatOrderNum($order) . ") @ ";
	$smsmessage[] = date('j-M (D)', strtotime($order['functiondate'])) . " ";
	$smsmessage[] = $order['timestart'] . " at ";

	if ($order['deliverypickup'] == "pickup") {
		$smsmessage[] = $order['pickuplocation'] . " ";
	}
	else {
		$smsmessage[] = $order['address'] . " Singapore " . $order['postalcode'] . " ";
	}

	if ($order['paymentmode'] == "Cheque") {
		$smsmessage[] = "CHQ ";
	}
	elseif ($order['paymentmode'] == "Cash") {
		$smsmessage[] = "CSH ";
	}
	$smsmessage[] = $order['ordertotalprice'];
	$smsmessage = implode("", $smsmessage);
	return $smsmessage;

}

function jt_send_sms($text) {
	$from = jaithai_env('JAITHAI_SMS_DEFAULT_FROM', '');
	$to = jaithai_env('JAITHAI_SMS_DEFAULT_TO', '');

	if ($from === '' || $to === '') {
		return false;
	}

	return do_sms($from, $to, $text);
}

?>
