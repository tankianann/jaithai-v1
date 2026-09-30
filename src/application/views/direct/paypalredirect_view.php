<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Redirecting to Paypal</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(function () {
			$('#paypalsubmitbutton').click();
			$('#thelink').click(function () { $('#paypalsubmitbutton').click(); });	
		});
	</script>
	<style>
		/*form { display: none; }*/
		body { padding-top: 50px; }
		p { text-align: center; margin: 10px auto; font-family: Arial; font-size: 12px; }
	</style>
</head>

<body>
<p><strong>Redirecting to Paypal</strong></p>
<!--<p><a id="thelink" href="#">Click here if you are not redirected in 10 seconds</a></p>-->
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="lc" value="SG">
<input type="hidden" name="business" value="<?php echo $merchantcode; ?>">
<input type="hidden" name="item_name" value="<?php echo $itemname; ?>">
<input type="hidden" name="amount" value="<?php echo $amount; ?>">
<input type="hidden" name="custom" value="<?php echo $customvariable; ?>">
<input type="hidden" name="currency_code" value="SGD">
<input type="hidden" name="button_subtype" value="services">
<input type="hidden" name="no_note" value="1">
<input type="hidden" name="no_shipping" value="1">
<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
<input type="hidden" name="notify_url" value="<?php echo $notifyurl; ?>">
<input type="hidden" name="cancel_return" value="<?php echo $cancelurl; ?>">
<input type="hidden" name="return" value="<?php echo $returnurl; ?>">
<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
	<p><input type="submit" id="paypalsubmitbutton" value="Click here if you are not redirected in 10 seconds" name="submit"></p>
</form>
</body>
</html>


