$(document).ready(function () {


	$( "#startdate" ).datepicker({
		dateFormat: 'd-M-yy',
		changeYear: true,
		changeMonth: true,
		onClose: function( selectedDate ) {
			$( "#enddate" ).datepicker( "option", "minDate", selectedDate ).focus();
		}
	});
	
	$( "#enddate" ).datepicker({
		dateFormat: 'd-M-yy',
		changeYear: true,
		changeMonth: true,
		onClose: function( selectedDate ) {
			$( "#startdate" ).datepicker( "option", "maxDate", selectedDate );
		}
	});
	
});