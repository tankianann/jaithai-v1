<?php  


/*
|--------------------------------------------------------------------------
| App Constants
|--------------------------------------------------------------------------
|
| These constants are used for the application
|
*/
define('KA_NO',					0);
define('KA_YES',				1);
define('KA_BCC',				true);
define('KA_BCC_EMAIL',			"jaithaiweb@gmail.com");
define('KA_TEST',				false);
define('KA_TEST_EMAIL',			"tankianann@gmail.com");

define('KA_WEBSITE_NAME',		'Jai Thai');
define('KA_WEBSITE_TAGLINE',	'Jai Thai Restaurant and Catering');
define('KA_CITHEME',			'themes/ka-cibase');
define('KA_CIADMINTHEME',		'themes/ka-jtadmin');
define('KA_FORM_SUBMITTED',		'formSubmitted');
define('KA_ADMIN_NAME',			'Jai Thai Catering');
define('KA_ADMIN_EMAIL',		'catering@jai-thai.com');
define('KA_NOTIFY_ADMIN_EMAIL',	'catering@jai-thai.com');
define('KA_PDF_DIRECTORY',		'assets/pdf/');
define('KA_VOUCHER_AMOUNT',		15);

date_default_timezone_set('Asia/Singapore');

if (!function_exists('_e')) {
	function _e($param) {
		echo $param;
	}
}
//end _e()


function formSubmitted() {
	
	return "<input type='hidden' name='" . KA_FORM_SUBMITTED . "' value='1' />";
	
}
//end formSubmitted


function showStatusMessage($msg) {
	if ($msg != "") {
		$msg_type = $msg['type'];
		$msg_text = $msg['text'];
		echo '<div class="' . $msg_type . '">' . $msg_text . '</div>';
	}
}//end showMessages()

