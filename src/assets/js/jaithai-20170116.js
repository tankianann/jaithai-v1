$(document).ready(function ($) {

	//tooltip
	if ($('.dotooltip').length) {
		$('.dotooltip').tooltip();
	}

	//for menus with pick 2, make sure only 2 selected
	$(".pick2 input[type=checkbox]").on('click', function () {
		var boxes = $(this).parentsUntil('.pick2').find("input[type=checkbox]:checked");
		if (boxes.length > 2) {
			swal("Select 2 Dishes", "You have already selected 2 choices.  Please deselect one before selecting another.", "info");
			return false;
		}
		else {
			//process the vegecontrol display only if not checking the 3rd checkbox
			var $pick2 = $(this).parentsUntil(".pick2");
			showSelectedVegeControls($pick2);
			return true;
		}
	});

	//show or hide the vegecontrol (for pick 1)
	$(".pick1 input[type=radio]").on("click", function () {

		var $pick1 = $(this).parentsUntil(".pick1");
		showSelectedVegeControls($pick1);

	});


	function showSelectedVegeControls($pick1pick2) {
		$pick1pick2.find("input").not(":checked").parent().parent().find(".vegecontrol").hide().find("select").val("REG");
		$pick1pick2.find("input:checked").parent().parent().find(".vegecontrol").show();
	}

	$(".pick1, .pick2").find(".vegecontrol").hide();
	$(".pick1, .pick2").find("input:checked").parent().parent().find(".vegecontrol").show();


	$('.timestart').on('change', function () {
		var all_times = [
			'9:00 AM', '9:15 AM', '9:30 AM', '9:45 AM',
			'10:00 AM', '10:15 AM', '10:30 AM', '10:45 AM',
			'11:00 AM', '11:15 AM', '11:30 AM', '11:45 AM',
			'12:00 PM', '12:15 PM', '12:30 PM', '12:45 PM',
			'1:00 PM', '1:15 PM', '1:30 PM', '1:45 PM',
			'2:00 PM', '2:15 PM', '2:30 PM', '2:45 PM',
			'3:00 PM', '3:15 PM', '3:30 PM', '3:45 PM',
			'4:00 PM', '4:15 PM', '4:30 PM', '4:45 PM',
			'5:00 PM', '5:15 PM', '5:30 PM', '5:45 PM',
			'6:00 PM', '6:15 PM', '6:30 PM', '6:45 PM',
			'7:00 PM', '7:15 PM', '7:30 PM', '7:45 PM',
			'8:00 PM', '8:15 PM', '8:30 PM', '8:45 PM',
			'9:00 PM', '9:15 PM', '9:30 PM', '9:45 PM',
			'10:00 PM', '10:15 PM', '10:30 PM', '10:45 PM',
			'11:00 PM', '11:15 PM', '11:30 PM', '11:45 PM',
			'12:00 AM'
		];


		//based on selected start time, find out the options for the end time (maximum 4 hours)
		var timestart = $(this).val();
		var timeend = [];
		for (var i = 0; i < all_times.length; i++) {
			if (timestart == all_times[i]) {
				var startIndex = i + 2;
				var endIndex = i + 12;
				i = startIndex;
				while (i < all_times.length && i <= endIndex) {
					timeend.push(all_times[i]);
					i++;
				}
				break;
			}
		}

		//now that we found the options, we re-populate the endtime select box
		for (i = 0; i < timeend.length; i++) {
			var label = timeend[i];
			switch (timeend[i]) {
				case "10:30 PM":
					label = "10:30 PM (Additional $25 surcharge)";
					break;
				case "11:00 PM":
					label = "11:00 PM (Additional $50 surcharge)";
					break;
				case "11:30 PM":
					label = "11:30 PM (Additional $75 surcharge)";
					break;
				case "12:00 AM":
					label = "12:00 AM (Additional $100 surcharge)";
					break;
				case "10:15 PM":
				case "10:45 PM":
				case "11:15 PM":
				case "11:45 PM":
					label = "";
					break;
			}

			if (label != '') {
				timeend[i] = "<option value='" + timeend[i] + "'>" + label + "</option>"
			}
		}

		//and make the last available option the selected one
		$('#timeend')
			.html(timeend.toString())
			.find('option:last-child')
			.attr('selected', 'selected')
			.change();

	}).change();

	//catering menus tabs
	$('nav.cateringmenus-nav a').on('click', function (event) {
		event.preventDefault();
		menuid = $(this).attr('class');
		$('div.cateringmenu').hide().filter("#menu-" + menuid).show();
		$('nav.cateringmenus-nav a').removeClass('active').filter(this).addClass('active');
		window.location.hash = menuid;
		return false;
	});

	$('input[name=postalcode]').on('blur', function () {
		postalcode = $(this).val();
		if (postalcode.substr(0, 3) == '637' || postalcode.substr(0, 3) == '627') {
			swal('No Delivery Service', 'Sorry, we are unable to deliver orders to Tuas / Jurong Island.', 'error');
			$('input[name=formsubmit]').attr('disabled', 'disabled');
		}
		else {
			$('input[name=formsubmit]').removeAttr('disabled');
		}
	});

});


$(window).ready(function ($) {

	//catering menus tabs, when loaded
	if ($("nav.cateringmenus-nav").length) {
		if (window.location.hash) {
			var hash = window.location.hash.substring(1); //Put hash in variable, and remove the # character
			if (hash != "") {
				setTimeout(function () {
					$('nav.cateringmenus-nav a.' + hash).click();
				}, 100);
			}
		}
		else {
			$('nav.cateringmenus-nav li:first-child a').click();
		}
	}

});
