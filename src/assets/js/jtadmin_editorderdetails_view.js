$(document).ready(function () {

	$( ".datepicker" )
		.datepicker({ 
				dateFormat: 'DD, d-M-yy'
		})
		.attr("readonly", "readonly");

	function showHidePickupDelivery() {
		$(".pickup-options").hide();
		$(".delivery-options").hide();
		if ($("#deliverypickup").length) {
			pickupdelivery = $('#deliverypickup').val();
			$("." + pickupdelivery + "-options").show();
		}
		else {
			$(".delivery").show();
		}
		
	}
	$('#deliverypickup').on('change', function() { showHidePickupDelivery(); });
	showHidePickupDelivery();

	function showHideBillingDetails() {
		if ($("#sameasdelivery:checked").length) {
			$('#billingdetails').hide();
		}
		else {
			$('#billingdetails').show();
		}
	}
	
	$("#sameasdelivery").on('click', function () { showHideBillingDetails(); });
	showHideBillingDetails();
	
	
});