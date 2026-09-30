$(document).ready(function () {

	if ($('.menu-CNY2023FAMILYSET').length) {

		$('#choosedeliveryorpickup input#pickuporder').click();
		$(".pickuporder").show();
		$(".deliveryorder").hide();
		$("#choosedeliveryorpickup").hide();
	}

	$("input[name=postalcode]").on('change', function () {
		postalCode = $(this).val().trim();
		$.get(
			'https://www.jai-thai.com/ajax/checkPostalSurcharge/' + postalCode + "/",
			{},
			function (data) {
				if (data == '1') {
					alert('There will be an additional $10 transport surcharge for deliveries to Sentosa island');
					//swal('Sentosa Island Surcharge', 'There will be an additional $10 transport surcharge for deliveries to Sentosa island', 'info');
				}
			},
			'text'
		);

	});


	$(".datepicker")
		.datepicker(
			{
				minDate: "+1D",
				maxDate: "+12M",
				dateFormat: 'DD, d-M-yy',
				onClose: function (datetext, inst) {

					var can_place_order = true;
					var thedate = new moment(datetext, 'dddd, D-MMM-YYYY');
					thedate = thedate.format('YYYY-MM-DD')

					switch (thedate) {

						case '2017-05-31':
							swal('Company Retreat', 'We will be having our company retreat on the 30-31 May 2017, and will not be able to provide catering on these days. Any inconvenience caused is regretted.');
							can_place_order = false;
							break;

						case '2017-02-07':

							var upsell_text = {
								title: "Make Your Toast to Prosperity!",
								text: "Would you like to add Jai Thai Mango Prosperity Yusheng @ $2 per pax?",
								showCancelButton: true,
								confirmButtonText: "Yes!",
								cancelButtonText: "No, thank you.",
								closeOnConfirm: false,
								closeOnCancel: false
							};

							var upsell_order = {
								title: "Jai Thai Mango Prosperity Yusheng",
								text: "Please choose the number of servings of Jai Thai Mango Prosperity Yusheng you need." +
								"<div style='margin-top: 10px'><select id='upsellqty'>" +
								"<option value='1'>Serves 20 pax ($40)</option>" +
								"<option value='1.5'>Serves 30 pax ($60)</option>" +
								"<option value='2'>Serves 40 pax ($80)</option>" +
								"<option value='2.5'>Serves 50 pax ($100)</option>" +
								"<option value='3'>Serves 60 pax ($120)</option>" +
								"<option value='3.5'>Serves 70 pax ($140)</option>" +
								"<option value='4'>Serves 80 pax ($160)</option>" +
								"<option value='4.5'>Serves 90 pax ($180)</option>" +
								"<option value='5'>Serves 100 pax ($200)</option>" +
								"<option value='5.5'>Serves 110 pax ($220)</option>" +
								"<option value='6'>Serves 120 pax ($240)</option>" +
								"<option value='6.5'>Serves 130 pax ($260)</option>" +
								"<option value='7'>Serves 140 pax ($280)</option>" +
								"<option value='7.5'>Serves 150 pax ($300)</option>" +
								"<option value='8'>Serves 160 pax ($320)</option>" +
								"<option value='8.5'>Serves 170 pax ($340)</option>" +
								"<option value='9'>Serves 180 pax ($360)</option>" +
								"<option value='9.5'>Serves 190 pax ($380)</option>" +
								"<option value='10'>Serves 200 pax ($400)</option>" +
								"</select></div>",
								showCancelButton: true,
								confirmButtonText: "Add to Order",
								cancelButtonText: "Cancel",
								closeOnConfirm: false,
								closeOnCancel: false
							};

							var menu_unavailable = {
								title: "Menu Unavailable",
								text: "Our Mini Party Set Menu, Set Catering Menu A, and DIY Catering Menu A will NOT be available between 25 Jan 2017 - 07 Feb 2017",
								type: "info"
							};

							var cny_surcharges = {
								title: "CNY Surcharges and Dish Availability",
								text: "There will be an additional 20% surcharge, and the delivery charge will be S$80 for Catering Order and $40 for Mini Party Order on this date." +
								"<br/><br/>Additionally, for our vegetable dishes, only Fried Mixed Vegetables and Fried Mixed Vegetables with Chinese Mushrooms will be available.",
								type: "info"
							};

							swal(upsell_text,
								function (isConfirm) {
									if (isConfirm) {
										swal(upsell_order,
											function (isConfirm) {
												if (isConfirm) {
													window.location.href = "https://www.jai-thai.com/cnymenu/addyusheng/" + $("#upsellqty").val();
												}
												else {
													if ($('.menu-CATERA, .menu-DIYA, .menu-MPSET').length) {
														swal(menu_unavailable);
														can_place_order = false;
													}
													else {
														swal(cny_surcharges);
													}

													if (can_place_order) {
														$('.formsubmit').removeAttr('disabled');
													}
													else {
														$('.formsubmit').attr('disabled', 'disabled');
													}
												}
											}
										);
									}
									else {
										if ($('.menu-CATERA, .menu-DIYA, .menu-MPSET').length) {
											swal(menu_unavailable);
											can_place_order = false;
										}
										else {
											swal(cny_surcharges);
										}

										if (can_place_order) {
											$('.formsubmit').removeAttr('disabled');
										}
										else {
											$('.formsubmit').attr('disabled', 'disabled');
										}
									}
								}
							);
							break;
						case '2022-12-31':
							swal('We\'re Fully Booked!', 'Sorry! Our catering slots are fully booked for 31 December 2022. Any inconvenience caused is regretted.');
							can_place_order = false;
							break;

						case '2023-01-20':
						case '2023-01-21':
						case '2023-01-22':
						case '2023-01-23':
						case '2023-01-24':
						case '2023-01-25':
						case '2023-01-26':
						case '2023-01-27':
						case '2023-01-28':
						case '2023-01-29':
						case '2023-01-30':
						case '2023-01-31':
						case '2023-02-01':
						case '2023-02-02':
						case '2023-02-03':
						case '2023-02-04':
						case '2023-02-05':

							var upsell_text = {
								title: "Make Your Toast to Prosperity!",
								text: "Would you like to add Jai Thai Mango Prosperity Yusheng @ $3.88 per pax?",
								showCancelButton: true,
								confirmButtonText: "Yes!",
								cancelButtonText: "No, thank you.",
								closeOnConfirm: false,
								closeOnCancel: true
							};

							var upsell_order = {
								title: "Jai Thai Mango Prosperity Yusheng",
								text: "Please choose the number of servings of Jai Thai Mango Prosperity Yusheng you need." +
									"<div style='margin-top: 10px'><select id='upsellqty'>" +
									"<option value='1'>Serves 10 pax ($38.80)</option>" +
									"<option value='1.5'>Serves 15 pax ($58.20)</option>" +
									"<option value='2'>Serves 20 pax ($77.60)</option>" +
									"<option value='2.5'>Serves 25 pax ($97.00)</option>" +
									"<option value='3'>Serves 30 pax ($116.40)</option>" +
									"<option value='3.5'>Serves 35 pax ($135.80)</option>" +
									"<option value='4'>Serves 40 pax ($155.20)</option>" +
									"<option value='4.5'>Serves 45 pax ($174.60)</option>" +
									"<option value='5'>Serves 50 pax ($194.00)</option>" +
									"<option value='5.5'>Serves 55 pax ($213.40)</option>" +
									"<option value='6'>Serves 60 pax ($232.80)</option>" +
									"<option value='6.5'>Serves 65 pax ($252.20)</option>" +
									"<option value='7'>Serves 70 pax ($271.60)</option>" +
									"<option value='7.5'>Serves 75 pax ($291.00)</option>" +
									"<option value='8'>Serves 80 pax ($310.40)</option>" +
									"<option value='8.5'>Serves 85 pax ($329.80)</option>" +
									"<option value='9'>Serves 90 pax ($349.20)</option>" +
									"<option value='9.5'>Serves 95 pax ($368.60)</option>" +
									"<option value='10'>Serves 100 pax ($388.00)</option>" +
									"</select></div>",
								showCancelButton: true,
								confirmButtonText: "Add to Order",
								cancelButtonText: "Cancel",
								closeOnConfirm: false,
								closeOnCancel: true
							};

							var menu_unavailable = {
								title: "Menu Unavailable",
								text: "For orders between 20 Jan 2023 - 05 Feb 2023, only our CNY Catering Menus will be available.",
								type: "info"
							};

							swal(upsell_text, function (isConfirm) {
								if (isConfirm) {
									swal(upsell_order, function (isConfirm) {
											if (isConfirm) {
												window.location.href = "https://www.jai-thai.com/cnymenu/addupsells/" + $("#upsellqty").val();
											}
										}
									);
								}
							});

							if ($('.menu-CATERA, .menu-CATERB, .menu-CATERC, .menu-CATERD,' +
								  '.menu-DIYA, .menu-DIYB, .menu-DIYC, .menu-DIYD,' +
								  '.menu-VEGEA, .menu-VEGEB, .menu-VEGEC,' +
								  '.menu-MPSET, .menu-MPALACARTE, .menu-SANOOK, menu-BENTO,' +
							      '.menu-XMASSET').length) {
								swal(menu_unavailable);
								can_place_order = false;
							}

							if (can_place_order) {
								$('.formsubmit').removeAttr('disabled');
							}
							else {
								$('.formsubmit').attr('disabled', 'disabled');
							}

						default:
							if (can_place_order) {
								$('.formsubmit').removeAttr('disabled');
							}
							else {
								$('.formsubmit').attr('disabled', 'disabled');
							}
					}
				}
			}
		)
		.attr("readonly", "readonly")
		.attr("placeholder", "")
		.removeClass('w250').addClass('w200');

	function showHidePickupDelivery() {
		$(".pickuporder").hide();
		$(".deliveryorder").hide();
		if ($("#choosedeliveryorpickup").length) {
			theid = $('#choosedeliveryorpickup input:checked').attr('id');
			$("." + theid).show();
		}
		else {
			$(".deliveryorder").show();
		}

	}

	$('#choosedeliveryorpickup input').on('click', function () {
		showHidePickupDelivery();
	});
	showHidePickupDelivery();


	function showHideBillingDetails() {
		if ($("#sameasdelivery:checked").length) {
			$('#billingdetails').hide();
		}
		else {
			$('#billingdetails').show();
		}
	}

	$("#sameasdelivery").on('click', function () {
		showHideBillingDetails();
	});
	showHideBillingDetails();


	/* Cross Browser Placeholder */
	if (!Modernizr.input.placeholder) {
		$('[placeholder]').focus(function () {
			var input = $(this);
			if (input.val() == input.attr('placeholder')) {
				input.val('');
				input.removeClass('placeholder');
			}
		})
			.blur(function () {
				var input = $(this);
				if (input.val() == '' || input.val() == input.attr('placeholder')) {
					input.addClass('placeholder');
					input.val(input.attr('placeholder'));
				}
			})
			.blur();
		$('[placeholder]').parents('form').submit(function () {
			$(this).find('[placeholder]').each(function () {
				var input = $(this);
				if (input.val() == input.attr('placeholder')) {
					input.val('');
				}
			})
		});
	}

});