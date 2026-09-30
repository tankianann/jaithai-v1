$(document).ready(function () {

	$('.price').change(function () {
		$(this).val(parseFloat($(this).val()).toFixed(2));
		calculateFoodPrice($(this));
	});

	$('.serves').change(function () {
		$(this).val(parseInt($(this).val()));
		calculateFoodPrice($(this));
	});

	$('.qty').change(function () {
		$(this).val(parseFloat($(this).val()).toFixed(1));
		calculateFoodPrice($(this));
	});
	
	function calculateFoodPrice($row) {
		
		$row = $row.parent().parent().parent(); //why parentsUntil doesn't work?!
		
		qty = $row.find('.qty').val();
		serves = $row.find('.serves').val();
		price = $row.find('.price').val();
		
		totalprice = price * qty;
		totalserves = serves * qty;
		
		$row.find(".totalprice").html("$" + totalprice.toFixed(2)); 
		$row.find(".totalserves").html(totalserves + " pax"); 
	}
	
});