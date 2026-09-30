<div id="content" class="row">
	<div class="col-sm-12">
	
	
		<?php showStatusMessage($this->session->userdata('statusmessage')); ?>
		<?php $this->session->unset_userdata('statusmessage'); ?>
		
		<h1>Shopping Cart</h1>

		<div class="row">
			<div class="col-sm-12">

                <?php CNY_Helper::show_banner(); ?>

                <?php
					//show upsell message if we havent' shown before
//                    if (($this->session->userdata('cart_upsell_before') != "1")) {
//                        $this->session->set_userdata('cart_upsell_before', "1");
//                        CNY_Helper::show_upsell();
//                    }
                ?>

                <table class="shoppingcart">
				
					<thead>
						<tr>
							<th>S/No</th>
							<th>Menu Details</th>
							<th>Num Pax</th>
							<th>Total</th>
						</tr>
					</thead>
					
					<tbody>
						
						<?php $i = 1;?>
						<?php $cartitems = $cart['items']; ?>
                        <?php $cart_has_cny_menu = false; ?>
                        <?php $cart_has_mini_party_menu = false; ?>

                        <?php if (is_array($cartitems) && sizeof($cartitems)) : ?>
						
							<?php foreach($cartitems as $key => $cartitem): ?>
                                <?php
                                    if (in_array($cartitem['menuid'], ['CNY2026JOY', 'CNY2026FORTUNE', 'CNY2026PROSPERITY', 'CNY2026FAMILYSET'])) {
                                        $cart_has_cny_menu = true;
                                    }
                                    if (in_array($cartitem['menuid'], ['MPSET', 'MPALACARTE', 'SANOOK', 'MOTHERSDAY', 'CHAIYO',
                                        'SAWASDEE', 'CHOKDEE', 'CHAIYOVEGAN', 'SAWASDEEVEGAN', 'CHOKDEEVEGAN', 'THAICELEBRATION'])) {
                                        $cart_has_mini_party_menu = true;
                                    }
                                ?>
								<?php if ($cartitem['menutype'] == JT_SETMENU): ?>
									<tr class="menu-<?php _e($cartitem['menuid']); ?>">
										<td><?php _e($i++); ?></td>
										<td>
											<p><strong>
												<?php _e($cartitem['title']) ?>
												<?php if ($cartitem['addondrink'] != "No Drink"): ?>
													 (with Drink)
												<?php endif;?>								
												@ $<?php _e($cartitem['perpax']) ?> Per Pax
											</strong></p>
											<ol>
												<?php foreach($cartitem['dishes'] as $dish): ?>
													<li><?php _e($dish); ?></li>
												<?php endforeach;?>
												<?php if ($cartitem['addondrink'] != "No Drink"): ?>
													<li><?php _e($cartitem['addondrink']); ?></li>
												<?php endif;?>
											</ol>
											<p class="itemcontrol">
												<?php // if the cart has more than one item, and this is the only one that hit minimum order, don't allow to remove ?>
												<?php if (sizeof($cartitems) > 1 && ($cart['hitmin'] == 1) && ($cartitem['hitmin'])) : ?>
													(<span title="This item is required, to allow your other items that don't hit the minimum order.">Required for minimum order</span>)
												<?php else: ?>
													(<a href="<?php _e('cart/remove/' . $key)?>">Remove</a>)
												<?php endif; ?>
											</p>
										</td>
										<td><?php _e($cartitem['numpax']) ?> pax</td>
										<td><?php _e(sprintf("$%0.2f", $cartitem['foodprice'])); ?></td>
									</tr>
									
								<?php elseif ($cartitem['menutype'] == JT_ALACARTEMENU): ?>
					
									<tr class="menu-<?php _e($cartitem['menuid']); ?>">
										<td><?php _e($i++); ?></td>
										<td>
											<p><strong><?php _e($cartitem['title']) ?></strong></p>
											<ol>
												<?php foreach($cartitem['dishes'] as $dish): ?>
													<li><?php _e($dish['name']); ?></li>
												<?php endforeach;?>
											</ol>
											<p class="itemcontrol">
												<?php // if the cart has more than one item, and this is the only one that hit minimum order, don't allow to remove ?>
												<?php if (sizeof($cartitems) > 1 && ($cart['hitmin'] == 1) && ($cartitem['hitmin'])) : ?>
													(<span title="This item is required, to allow your other items that don't hit the minimum order.">Required for minimum order</span>)
												<?php else: ?>
													(<a href="<?php _e('cart/remove/' . $key)?>">Remove</a>)
												<?php endif; ?>
											</p>
										</td>
										<td>
											<p>&nbsp;</p>
											<p>
                                                <?php
                                                foreach($cartitem['dishes'] as $dish):
                                                    if (in_array($dish['name'], [
                                                        'Chafing Set Rental - 2 Dishes to 1 Set (Delivery charge of $90 applies)',
                                                        'Dessert Bowl with Spoon',
                                                        'Porcelain Plate with Stainless Steel Fork & Spoon',
                                                        'Disposable Self Heating Set',
                                                    ])) {
                                                        _e($dish['qty'] . " Sets<br />");
                                                    }
                                                    else {
                                                        $servings = $dish['qty'] * $dish['serves'];
                                                        _e("Serves " . $servings . " pax<br />");
                                                    }

                                                    //pad a few lines below, depending on how many <br /> the dish name has (bento sets)
                                                    $num_brs = substr_count($dish['name'], "<br />");
                                                    while ($num_brs > 0) { _e('<br />'); $num_brs--; }
                                                endforeach;
                                                ?>
											</p>
										</td>
										<td>
											<p>&nbsp;</p>
											<p>
												<?php foreach($cartitem['dishes'] as $dish): ?>
													<?php $price = $dish['qty'] * $dish['price']; ?>
													<?php _e(sprintf("$%0.2f", $price)); ?><br />
													<?php 
														//pad a few lines below, depending on how many <br /> the dish name has (bento sets)
														$num_brs = substr_count($dish['name'], "<br />");
														while ($num_brs > 0) { _e('<br />'); $num_brs--; }
													?>
												<?php endforeach;?>
											</p>
										</td>
									</tr>
                                <?php elseif ($cartitem['menutype'] == JT_MISCITEM): ?>

                                    <tr>
                                        <td><?php _e($i++); ?></td>
                                        <td>
                                            <p><strong><?php _e($cartitem['title']) ?></strong></p>
                                        </td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>

								<?php endif; ?>
							
							<?php endforeach; ?>

                            <?php if ($cart_has_mini_party_menu): ?>
                                <tr><td colspan="4">
                                        <div style="text-align: center; font-size: 120%; padding: 20px 0;">
                                            <p>You have selected menus that are served in disposable trays and containers.</p>
                                            <p>Keep your food warm and ready to serve by adding a disposable self-heating sets?</p>
                                            <form action="<?php _e(site_url('/upsells/selfheatingsets')); ?>" method="post">
                                                <label>Number of Sets ($6 / set)</label>
                                                <select name="equipment4" id="equipment4" class="textbox"><option value="0" selected="selected">0 set</option><option value="1">1 set</option><option value="2">2 sets</option><option value="3">3 sets</option><option value="4">4 sets</option><option value="5">5 sets</option><option value="6">6 sets</option><option value="7">7 sets</option><option value="8">8 sets</option><option value="9">9 sets</option><option value="10">10 sets</option></select>
                                                <button type="submit" class="btn btn-danger">Add to Order</button>
                                            </form>
                                        </div>
                                    </td></tr>
                            <?php endif; ?>

                            <?php
                                $upsell_menu = site_url('/jtmenu/minipartyalacarte');
                                if ($cart_has_cny_menu) {
                                    $upsell_menu = site_url('/cnymenu/cnyaddons');
                                }
                            ?>
							<tr><td colspan="4">
								<div class="upsell">
									<a class="btn btn-lg btn-danger" href="<?php _e($upsell_menu);?>">Add Ala Carte / Side Orders &raquo;</a></a>
								</div>
							</td></tr>

						<?php else: ?>
						
							<tr><td colspan="4">
								<div class="emptycart">You have no items in your cart</div>
							</td></tr>
						
						<?php endif; //emptycart ?>
					</tbody>
					
					<tfoot>
						<?php if (is_array($cartitems) && sizeof($cartitems)) : ?>
							<tr>
								<th>&nbsp;</th>
								<td class="itemcontrol">(<a href="<?php _e('cart/clear')?>">Clear Cart</a>)</td>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
							</tr>
						<?php endif; //emptycart ?>	
						<tr>
							<th>&nbsp;</th>
							<th>Food Total</th>
							<th>&nbsp;</th>
							<th><?php _e(sprintf("$%0.2f", $cart['foodprice'])); ?></th>
						</tr>				
						<?php if ($cart['chargeforcontainers'] && $cart['containerprice'] > 0): ?>
							<tr>
								<th>&nbsp;</th>
								<th>Container Fee Total</th>
								<th>&nbsp;</th>
								<th><?php _e(sprintf("$%0.2f", $cart['containerprice'])); ?></th>
							</tr>		
						<?php endif; ?>	
						<tr>
							<th>&nbsp;</th>
							<th>Transportation Fee</th>
							<th>&nbsp;</th>
							<th>
								<div class="deliveryorder"><?php _e(sprintf("$%0.2f", $cart['deliveryprice'])); ?></div>
								<div class="pickuporder">$0.00</div>
							</th>
						</tr>
						<tr>
							<th>&nbsp;</th>
							<th>Sub Total</th>
							<th>&nbsp;</th>
							<th>
								<div class="deliveryorder">
									<?php if ($cart['chargeforcontainers'] && $cart['containerprice'] > 0): ?>
										<?php _e(sprintf("$%0.2f", $cart['foodprice'] + $cart['containerprice'] + $cart['deliveryprice'])); ?>
									<?php else: ?>
										<?php _e(sprintf("$%0.2f", $cart['foodprice'] + $cart['deliveryprice'])); ?>
									<?php endif; ?>
								</div>
								<div class="pickuporder"><?php _e(sprintf("$%0.2f", $cart['foodprice'] + $cart['containerprice'])); ?></div>
							</th>
						</tr>
                        <tr>
                            <th>&nbsp;</th>
                            <th>GST</th>
                            <th>&nbsp;</th>
                            <th>
                                <div class="deliveryorder">
									<?php if ($cart['chargeforcontainers'] && $cart['containerprice'] > 0): ?>
										<?php _e(sprintf("$%0.2f", ($cart['foodprice'] + $cart['containerprice'] + $cart['deliveryprice']) *0.09)); ?>
									<?php else: ?>
										<?php _e(sprintf("$%0.2f", ($cart['foodprice'] + $cart['deliveryprice'])*0.09)); ?>
									<?php endif; ?>
                                </div>
                                <div class="pickuporder"><?php _e(sprintf("$%0.2f", ($cart['foodprice'] + $cart['containerprice'])*0.09)); ?></div>
                            </th>
                        </tr>
                        <tr>
                            <th>&nbsp;</th>
                            <td><strong>Total</strong> (Note that your order total with all applicable surcharges will be recalculated and sent to you in an order confirmation)</td>
                            <th>&nbsp;</th>
                            <th>
                                <div class="deliveryorder">
									<?php if ($cart['chargeforcontainers'] && $cart['containerprice'] > 0): ?>
										<?php _e(sprintf("$%0.2f", ($cart['foodprice'] + $cart['containerprice'] + $cart['deliveryprice']) * 1.09)); ?>
									<?php else: ?>
										<?php _e(sprintf("$%0.2f", ($cart['foodprice'] + $cart['deliveryprice'])*1.09)); ?>
									<?php endif; ?>
                                </div>
                                <div class="pickuporder"><?php _e(sprintf("$%0.2f", ($cart['foodprice'] + $cart['containerprice'])*1.09)); ?></div>
                            </th>
                        </tr>
					</tfoot>
					
				</table>
				
				
			</div><!-- /.col -->
		</div><!-- /.row -->
		

		
		<?php if (is_array($cartitems) && sizeof($cartitems)) : ?>
		
			<?php if ($cart['allowpickup']): ?>
				<div id="choosedeliveryorpickup" class="row">
					<div class="col-sm-12">
						<p><strong>Please select self collect or delivery:</strong></p>
						<input type="radio" id="pickuporder" name="choosedeliveryorpickup" <?php if ($formdata['deliverypickup'] == "pickup") { _e('checked="checked"'); } ?> />
						<label for="pickuporder" class="checkboxlabel w100">Self Collect</label>
						<input type="radio" id="deliveryorder" name="choosedeliveryorpickup" <?php if ($formdata['deliverypickup'] == "delivery") { _e('checked="checked"'); } ?>  />
						<label for="deliveryorder" class="checkboxlabel">Delivery</label>
					</div><!-- /.col -->
				</div><!-- /.row -->
			<?php endif; ?>

			<div class="row orderform">
				<div class="col-sm-12">
					<div class="pickuporder">
						<?php _e(form_open() . formSubmitted()); ?>
							<h2>Self Collection Order Form</h2>
							<input type="hidden" name="deliverypickup" value="pickup" />
							<div><label>Branch *</label><?php _e(selectBoxHelper("PICKUP_LOCATIONS", "pickuplocation", "pickuplocation", "textbox w100", $formdata['pickuplocation'], $cart['pickuplocations'])); ?></div>
							<div><label>Date *</label><input type="text" name="functiondate" value="<?php _e($formdata['functiondate']); ?>" class="w250 textbox datepicker" placeholder="DD-MMM-YYYY (e.g. 05-Jan-2014)"/></div>
							<div><label>Time You Want to Collect *</label><?php _e(selectBoxHelper("PICKUPDELIVERY_TIME", "timestart", "timestart", "textbox w250 timestart", $formdata['timestart'])); ?></div>
							<div><label>Payment Mode *</label><?php _e(selectBoxHelper("PAYMENT_MODE", "paymentmode", "paymentmode", "textbox w250", $formdata['paymentmode'])); ?></div>
							<div><label>Notes</label><textarea name="notes" class="textbox w400 h50"><?php _e($formdata['notes']); ?></textarea></div>
							<br />
							<div><h3>Your Particulars:</h3></div>
							<div><label>Name *</label><input type="text" name="name" value="<?php _e($formdata['name']); ?>" class="w200 textbox"/></div>
							<div><label>Email *</label><input type="text" name="email" value="<?php _e($formdata['email']); ?>" class="w200 textbox"/></div>
							<div><label>Telephone No</label><input type="text" name="telephone" value="<?php _e($formdata['telephone']); ?>" class="w200 textbox"/></div>
							<div><label>Mobile No *</label><input type="text" name="mobile" value="<?php _e($formdata['mobile']); ?>" class="w200 textbox"/></div>
                            <div><label>Company Name</label><input type="text" name="company" value="<?php _e($formdata['company']); ?>" class="w200 textbox"/></div>
							<br />
                            <div><h3>Your Order:</h3></div>
                            <div><label>Cutlery Required *</label><select name="cutleryrequired" class="textbox w300">
                                    <option name="" value="">- Please Select -</option>
                                    <?php
                                    $options = [
                                        "Yes",
                                        "No",
                                    ];
                                    foreach ($options as $option): ?>
                                        <option value="<?php echo $option ?>" <?php if ($formdata['cutleryrequired'] == $option) { echo " selected='selected'"; } ?>><?php echo $option; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
							<div>
								<label>How do you want us to communicate with you</label>
								<input type="radio" value="SMS Email" id="smsemail" name="communicationpreference" <?php if ($formdata['communicationpreference'] == "SMS Email") { _e('checked="checked"'); } ?> />
								<label for="smsemail" class="checkboxlabel">SMS and email Only</label>
								<input type="radio" value="SMS Email Call" id="smsemailcall" name="communicationpreference" <?php if ($formdata['communicationpreference'] == "SMS Email Call") { _e('checked="checked"'); } ?>  />
								<label for="smsemailcall" class="checkboxlabel">I prefer to also speak to a friendly catering consultant</label>
							</div>
                            <label style="width: auto;"><input type="checkbox" name="agreetnc" value="agree" id="agreetnc" /> I agree to the catering <a href="/jtpages/terms" target="_blank">terms and conditions.</a></label>
                            <br/>
                            <br/>
							<div><input id="formsubmit" type="submit" name="formsubmit" class="btn btn-danger formsubmit" value="Submit Order"></div>
						<?php _e(form_close()); ?>
					</div>
					<div class="deliveryorder">
						<?php _e(form_open() . formSubmitted()); ?>
							<h2>Delivery Order Form</h2>
							<input type="hidden" name="deliverypickup" value="delivery" />
							<div><label>Date *</label><input type="text" name="functiondate" value="<?php _e($formdata['functiondate']); ?>" class="textbox w250 datepicker" placeholder="DD-MMM-YYYY (e.g. 05-Jan-2014)"/></div>
							<div><label>Time You Want to Eat *</label><?php _e(selectBoxHelper("PICKUPDELIVERY_TIME", "timestart", "timestart", "textbox w250 timestart", $formdata['timestart'])); ?> (Our team will arrive and set up the catering before this time)</div>
							<?php if ($cart['chargeforcontainers']): //if we are charging for containers, it means that there is no collection ?>
								<input type="hidden" name="timeend" value="-"/>
							<?php else: ?>
								<div><label>Collection Time *</label><?php _e(selectBoxHelper("COLLECTION_TIME", "timeend", "timeend", "textbox w250", $formdata['timeend'])); ?></div>
							<?php endif; ?>
							<div><label>Payment Mode *</label><?php _e(selectBoxHelper("PAYMENT_MODE", "paymentmode", "paymentmode", "textbox w250", $formdata['paymentmode'])); ?></div>
							<div><label>Notes</label><textarea name="notes" class="textbox w400 h50"><?php _e($formdata['notes']); ?></textarea></div>
							<br />

							<div><h3>Deliver To:</h3></div>
							<div><label>Name *</label><input type="text" name="name" value="<?php _e($formdata['name']); ?>" class="w200 textbox"/></div>
							<div><label>Email *</label><input type="text" name="email" value="<?php _e($formdata['email']); ?>" class="w200 textbox"/></div>
							<div><label>Telephone No</label><input type="text" name="telephone" value="<?php _e($formdata['telephone']); ?>" class="w200 textbox"/></div>
							<div><label>Mobile No *</label><input type="text" name="mobile" value="<?php _e($formdata['mobile']); ?>" class="w200 textbox"/></div>
                            <div><label>Company Name</label><input type="text" name="company" value="<?php _e($formdata['company']); ?>" class="w200 textbox"/></div>

							<div><label>Postal Code *</label><input type="text" name="postalcode" value="<?php _e($formdata['postalcode']); ?>" id="postalcode" class="w100 textbox"/>
                                <button type="button" class="sgpostal" data-src="postalcode" data-target-address="address" data-target-building="buildingname">Search</button>
                            </div>
                            <div><label>Unit No</label><input type="text" name="unitnum" value="<?php _e($formdata['unitnum']); ?>" class="w100 textbox"/></div>
                            <div><label>Block No / Street *</label><input type="text" name="address" value="<?php _e($formdata['address']); ?>" id="address" class="w400 textbox"/></div>
                            <div><label>Building Name</label><input type="text" name="buildingname" value="<?php _e($formdata['buildingname']); ?>" id="buildingname" class="w400 textbox"/></div>

                            <div><h3>Your Function:</h3></div>
                            <?php if ($cart['chargeforcontainers']): //if we are charging for containers, it means that there is no collection ?>
                                <input type="hidden" name="typeoffunction" value="Others"/>
                                <input type="hidden" name="setuparea" value="Others"/>
                                <input type="hidden" name="tablesrequired" value="No"/>
                                <input type="hidden" name="accessiblebylift" value="Y"/>
                            <?php else: ?>
                                <div><label>Type of Function *</label><select name="typeoffunction" class="textbox w300">
                                        <option name="" value="">- Please Select -</option>
                                        <?php
                                        $function_list = [
                                            "Baby Full Moon (Boy)",
                                            "Baby Full Moon (Girl)",
                                            "Birthday",
                                            "Birthday (1st)",
                                            "Birthday (16th)",
                                            "Birthday (18th)",
                                            "Birthday (21st)",
                                            "Birthday (Pioneer)",
                                            "Charity",
                                            "Church Function",
                                            "Corporate Function",
                                            "Festive Celebration",
                                            "Funeral / Wake",
                                            "Housewarming",
                                            "Prayer Function",
                                            "School Function",
                                            "Wedding",
                                            "Others",
                                        ];
                                        foreach ($function_list as $function): ?>
                                            <option value="<?php echo $function ?>" <?php if ($formdata['typeoffunction'] == $function) { echo " selected='selected'"; } ?>><?php echo $function; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div><label>Catering Set Up Area</label><select name="setuparea" class="textbox w300">
                                        <option name="" value="">- Please Select -</option>
                                        <?php
                                        $function_list = [
                                            "Pantry",
                                            "Function Room",
                                            "Meeting Room",
                                            "Corridor",
                                            "Void Deck",
                                            "Others",
                                        ];
                                        foreach ($function_list as $function): ?>
                                            <option value="<?php echo $function ?>" <?php if ($formdata['setuparea'] == $function) { echo " selected='selected'"; } ?>><?php echo $function; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div><label>Catering Set Up Area Accessiblity *</label><select name="accessiblebylift" class="textbox w300">
                                        <option value="">- Please Select -</option>
                                        <option value="Y" <?php if ($formdata['accessiblebylift'] == "Y") { echo " selected='selected'"; } ?>>Accessible by Lift (No additional charge)</option>
                                        <option value="1" <?php if ($formdata['accessiblebylift'] == "1") { echo " selected='selected'"; } ?>>Requires Stair Access - 1 Level ($30 surcharge)</option>
                                        <option value="2" <?php if ($formdata['accessiblebylift'] == "2") { echo " selected='selected'"; } ?>>Requires Stair Access - 2 Levels ($60 surcharge)</option>
                                        <option value="3" <?php if ($formdata['accessiblebylift'] == "3") { echo " selected='selected'"; } ?>>Requires Stair Access - 3 Levels ($90 surcharge)</option>
                                        <option value="4" <?php if ($formdata['accessiblebylift'] == "4") { echo " selected='selected'"; } ?>>Requires Stair Access - 4 Levels ($120 surcharge)</option>
                                        <option value="5" <?php if ($formdata['accessiblebylift'] == "5") { echo " selected='selected'"; } ?>>Requires Stair Access - 5 Levels ($150 surcharge)</option>
                                    </select>
                                </div>
                                <div><label>Tables Required for Catering Setup *</label><select name="tablesrequired" class="textbox w300">
                                        <option name="" value="">- Please Select -</option>
                                        <?php
                                        $options = [
                                            "Yes",
                                            "No",
                                        ];
                                        foreach ($options as $option): ?>
                                            <option value="<?php echo $option ?>" <?php if ($formdata['tablesrequired'] == $option) { echo " selected='selected'"; } ?>><?php echo $option; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            <?php endif; ?>
                            <div><label>Cutlery Required *</label><select name="cutleryrequired" class="textbox w300">
                                    <option name="" value="">- Please Select -</option>
                                    <?php
                                    $options = [
                                        "Yes",
                                        "No",
                                    ];
                                    foreach ($options as $option): ?>
                                        <option value="<?php echo $option ?>" <?php if ($formdata['cutleryrequired'] == $option) { echo " selected='selected'"; } ?>><?php echo $option; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
							<div>
								<input type="checkbox" name="sameasdelivery" id="sameasdelivery" <?php if ($formdata['sameasdelivery'] == 1) { _e('checked="checked"'); } ?> />
								<label for="sameasdelivery" class="checkboxlabel w200">Bill to same address</label>
							</div>
							<br />
							<div id="billingdetails">
								<div><h3>Bill To:</h3></div>
								<div><label>Name *</label><input type="text" name="billname" value="<?php _e($formdata['billname']); ?>" class="w200 textbox"/></div>
								<div><label>Email *</label><input type="text" name="billemail" value="<?php _e($formdata['billemail']); ?>" class="w200 textbox"/></div>
								<div><label>Telephone No</label><input type="text" name="billtelephone" value="<?php _e($formdata['billtelephone']); ?>" class="w200 textbox"/></div>
								<div><label>Mobile No *</label><input type="text" name="billmobile" value="<?php _e($formdata['billmobile']); ?>" class="w200 textbox"/></div>
                                <div><label>Company Name</label><input type="text" name="billcompany" value="<?php _e($formdata['billcompany']); ?>" class="w200 textbox"/></div>

								<div><label>Postal Code *</label><input type="text" name="billpostalcode" value="<?php _e($formdata['billpostalcode']); ?>" id="billpostalcode" class="w100 textbox"/>
                                    <button type="button" class="sgpostal" data-src="billpostalcode" data-target-address="billaddress" data-target-building="billbuildingname">Search</button>
                                </div>
                                <div><label>Unit No</label><input type="text" name="billunitnum" value="<?php _e($formdata['billunitnum']); ?>" class="w100 textbox"/></div>
                                <div><label>Block No / Street *</label><input type="text" name="billaddress" value="<?php _e($formdata['billaddress']); ?>" id="billaddress" class="w400 textbox"/></div>
                                <div><label>Building Name</label><input type="text" name="billbuildingname" value="<?php _e($formdata['billbuildingname']); ?>" id="billbuildingname" class="w400 textbox"/></div>
								<br />
							</div>
							<div>
								<label>How Do You Want Us to Communicate With You?</label>
								<input type="radio" value="SMS Email" id="smsemail" name="communicationpreference" <?php if ($formdata['communicationpreference'] == "SMS Email") { _e('checked="checked"'); } ?> />
								<label for="smsemail" class="checkboxlabel">SMS and email Only</label>
								<input type="radio" value="SMS Email Call" id="smsemailcall" name="communicationpreference" <?php if ($formdata['communicationpreference'] == "SMS Email Call") { _e('checked="checked"'); } ?>  />
								<label for="smsemailcall" class="checkboxlabel">I prefer to also speak to a friendly catering consultant</label>
							</div>
                            <label style="width: auto;"><input type="checkbox" name="agreetnc" value="agree" id="agreetnc" /> I agree to the catering <a href="/jtpages/terms" target="_blank">terms and conditions.</a></label>
                            <br/>
                            <br/>
							<div><input id="formsubmit" type="submit" name="formsubmit" class="btn btn-danger formsubmit" value="Submit Order"></div>
						<?php _e(form_close()); ?>
					</div>
				</div><!-- /.col -->
			</div><!-- /.row -->
		
		<?php endif; //emptycart ?>	

	</div><!-- /.col -->
</div><!-- /.row -->

