$(document).ready(function () {

	$('#perpax').change(function () {
		$(this).val(parseFloat($(this).val()).toFixed(2));
		calculateFoodPrice();
	});

	$('#numpax').change(function () {
		$(this).val(parseInt($(this).val()));
		calculateFoodPrice();
	});
	
	function calculateFoodPrice() {
		foodprice = $("#numpax").val() * $('#perpax').val();
		$(".foodprice").html("$" + foodprice.toFixed(2));
		
	}
	
});