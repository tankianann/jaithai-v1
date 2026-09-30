$(document).ready(function () {
	
	$(".lb-option").on('click', function () {
		
		voucherid = $(this).attr('href').substring(1);
		apiurl = $(".lb-apiurl").text();
		
		$.post(
			apiurl,
			{
				id: voucherid,
			},
			function (data) {
				$('.lb-content').html(data);
				
			}
		);		
		$("#lightbox").fadeIn(200);
		return false;
		
	});
	
	$("#lightbox").on(
		'click',
		'.lb-close, .lb-bkg',
		function () {
			$("#lightbox").hide();
			return false;
		}
	);
	
	
});
