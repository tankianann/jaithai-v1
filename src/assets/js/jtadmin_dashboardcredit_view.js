$(document).ready(function () {

	// datepicker
	$(document).ready(function () {
	
		$( "#startdate" ).datepicker({
			dateFormat: 'dd-M-yy',
			changeYear: true,
			changeMonth: true,
			showButtonPanel: true,
			onClose: function( selectedDate ) {
				$( "#enddate" ).datepicker( "option", "minDate", selectedDate ).focus();
			}
		});
		
		$( "#enddate" ).datepicker({
			dateFormat: 'dd-M-yy',
			changeYear: true,
			changeMonth: true,
			showButtonPanel: true,
			onClose: function( selectedDate ) {
				$( "#startdate" ).datepicker( "option", "maxDate", selectedDate );
			}
		});
		
	});	
	
	
	/* Dashboard Lightbox */
	$(".lb-option").on('click', function () {
		
		orderid = $(this).attr('href').substring(1);
		apiurl = $(".lb-apiurl").text();
		option = $(this).parentsUntil('td').parent().attr('class');
		
		$.post(
			apiurl,
			{
				id: orderid,
				op: option
			},
			function (data) {
				$('.lb-content').html(data);
				
			}
		);		
		$("#lightbox").fadeIn(200);
		return false;
	});
	
	/* Show or hide Archivemany button based on number of checkboxes selected */
	$("input.compactcheckbox").on('click', function () {
		if ($("input.compactcheckbox:checked").length) {
			$("a#archivemany").show();
		}
		else {
			$("a#archivemany").hide();
		}
	});
	$("a#archivemany").hide();
	
	/* Dashboard archive many */
	$("#archivemany").on('click', function () {
		
		var orderids = new Array();
		$("input.compactcheckbox:checked").each(function () {
			orderids.push($(this).val());
		});
		
		if (orderids.length > 0) {
			
			/* only show the lightbox if at least one order selected */
			apiurl = $(".lb-apiurl").text();
			option = "archivemany";
			
			$.post(
				apiurl,
				{
					id: orderids,
					op: option
				},
				function (data) {
					$('.lb-content').html(data);
					
				}
			);		
			$("#lightbox").fadeIn(200);

		}
		else {
			
			swal("Error", "Please select one or more orders to archive", "error");
			
		}
		
		return false;
	});	


	/* Close lightbox */
	$("#lightbox").on(
		'click',
		'.lb-close, .lb-bkg',
		function () {
			$("#lightbox").hide();
			return false;
		}
	);
	
	$('#lightbox').on(
		'click',
		'.submitthisform',
		function () {
			$(this).parentsUntil('form').parent().submit();
		}
	)
	
	
	//tabs
	$('.dbview a').on('click', function () {
		href = $(this).attr('href');
		$('.dbviewtab').fadeOut(200).filter(href).fadeIn(200);
		return false;
	});
	$('.dbview a:first-child').click();
	
	//viewexpanded
	$('a.viewexpanded').on('click', function() {
		href = $(this).attr('href');
		href = href.substring(1);
		$('.dbviewtab')
			.fadeOut(200)
			.filter('#expanded')
			.fadeIn({
				duration: 200,
				complete: function() {
					$("html, body").animate(
						{ 	
							scrollTop: 	$('#expanded.dbviewtab #' + href).offset().top
						},
						1000,
						"easeInOutQuint"
					);
				}
			});
		return false;
	});
	
	//backtotop
	$('a.backtotop').on('click', function() {
		$("html, body").animate(
			{ 	
				scrollTop: 	0
			},
			1000,
			"easeInOutQuint"
		);
		return false;
	});
	
	
	/* driverlist population */
	$('#lightbox').on(
		'click',
		'.driverlist .show',
		 function () {
			$('.driverlist ul').slideToggle(100);
			return false;
		}
	);
	$('#lightbox').on(
		'click',
		'.driverlist a',
		 function () {
			drivername = $(this).html();
			$('input#drivername').val(drivername);
			$('.driverlist ul').slideUp(100);
			return false;
		}
	);
	
	/* Send SMS */
	$('#lightbox').on(
		'click',
		'a.jtsendsms',
		 function () {
		 	$.get(
		 		$(this).attr('href'),
		 		function (data) {
			 		swal("SMS Sent", "SMS Sent.  You should receive it in 3 mins.", "success");
		 		}
		 	);
			return false;
		}
	);
	
	
});