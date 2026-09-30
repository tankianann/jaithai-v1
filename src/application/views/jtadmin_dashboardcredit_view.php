<?php showStatusMessage ( $this->session->userdata ( 'statusmessage' ) ); ?>
<?php $this->session->unset_userdata ( 'statusmessage' ); ?>
	<h1>Orders Dashboard</h1>
	<div class="controlpanel">

		<?php _e ( form_open () . formSubmitted () ); ?>
		<div class="filterby">
			<p><strong>Filter By</strong></p>
			<p>
				<input type="radio" name="filtertype"
					   value="nofilter" <?php if ( $formdata[ 'filtertype' ] == 'nofilter' ) {
					_e ( ' checked="checked" ' );
				} ?> id="filtertype1"/>
				<label for="filtertype1">No Filter</label>
				<br/>
				<input type="radio" name="filtertype"
					   value="functiondate" <?php if ( $formdata[ 'filtertype' ] == 'functiondate' ) {
					_e ( ' checked="checked" ' );
				} ?> id="filtertype2"/>
				<label for="filtertype2">Function Date Between</label>
				<br/>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="text" name="startdate" id="startdate"
					   value="<?php _e ( date ( 'd-M-Y', strtotime ( $formdata[ 'startdate' ] ) ) ); ?>"
					   class="w75 textbox datepicker"/> and
				<input type="text" name="enddate" id="enddate"
					   value="<?php _e ( date ( 'd-M-Y', strtotime ( $formdata[ 'enddate' ] ) ) ); ?>"
					   class="w75 textbox datepicker"/>
			</p>
		</div>

		<div class="orderby">
			<p><strong>Order By</strong></p>
			<p>
				<input type="radio" name="orderby" value="orderid" <?php if ( $formdata[ 'orderby' ] == 'orderid' ) {
					_e ( ' checked="checked" ' );
				} ?> id="orderby1"/> Order Number<br/>
				<input type="radio" name="orderby"
					   value="functiondate" <?php if ( $formdata[ 'orderby' ] == 'functiondate' ) {
					_e ( ' checked="checked" ' );
				} ?> id="orderby2"/> Function Date<br/>
				<input type="radio" name="orderby" value="driver" <?php if ( $formdata[ 'orderby' ] == 'driver' ) {
					_e ( ' checked="checked" ' );
				} ?> id="orderby2"/> Driver<br/>
			</p>
		</div>

		<?php if ( $jtuser[ 'type' ] == 'admin' ): ?>
			<div class="showhide">
				<p><strong>Show / Hide</strong></p>
				<p>
					<input type="checkbox" id="outlet-" name="outlets[]"
						   value="NA" <?php if ( in_array ( 'NA', $formdata[ 'outlets' ] ) ) {
						_e ( 'checked="checked"' );
					} ?>/> <label for="outlet-">Unassigned</label><br/>
					<input type="checkbox" id="outlet-CW" name="outlets[]"
						   value="CW" <?php if ( in_array ( 'CW', $formdata[ 'outlets' ] ) ) {
						_e ( 'checked="checked"' );
					} ?>/> <label for="outlet-CW">Clover</label><br/>

                    <input type="checkbox" id="outlet-JS" name="outlets[]"
                           value="JS" <?php if ( in_array ( 'JS', $formdata[ 'outlets' ] ) ) {
						_e ( 'checked="checked"' );
					} ?>/> <label for="outlet-JS">JS</label><br/>

					<input type="checkbox" id="outlet-SP" name="outlets[]"
						   value="SP" <?php if ( in_array ( 'SP', $formdata[ 'outlets' ] ) ) {
						_e ( 'checked="checked"' );
					} ?>/> <label for="outlet-SP">Sing Post</label><br/>

                    <input type="checkbox" id="outlet-PV" name="outlets[]"
						   value="PV" <?php if ( in_array ( 'PV', $formdata[ 'outlets' ] ) ) {
						_e ( 'checked="checked"' );
					} ?>/> <label for="outlet-PV">Purvis</label><br/>

                    <input type="checkbox" id="outlet-CK" name="outlets[]"
                           value="CK" <?php if ( in_array ( 'CK', $formdata[ 'outlets' ] ) ) {
                        _e ( 'checked="checked"' );
                    } ?>/> <label for="outlet-CK">Central Kitchen</label><br/>
                </p>
			</div>
		<?php endif; ?>

		<div class="submitbuttons">
			<input id="formsubmit" type="submit" name="formsubmit" class="w100 button" value="Submit"><br/>
			<input id="formreset" type="submit" name="formsubmit" class="w100 button" value="Reset">
		</div>

		<?php _e ( form_close () ); ?>


		<div class="clear"></div>
	</div><!-- /.controlpanel -->

	<div>
	<span class="dbview">
		<a href="#expanded"><img src="<?php _e ( base_url ( '/assets/images/expanded-icon.png' ) ) ?>" alt="Expanded"
								 title="Expanded" width="32" height="32"/></a>
		<a href="#compact"><img src="<?php _e ( base_url ( '/assets/images/compact-icon.png' ) ) ?>" alt="Compact"
								title="Compact" width="32" height="32"/></a>
	</span>
		<a id="archivemany" href="#archivemany"><img
				src="<?php _e ( base_url ( '/assets/images/archivemany-icon.png' ) ) ?>"
				alt="Archive Selected" title="Archive Selected" width="32"
				height="32"/></a>
	</div>

	<div>
		<div id="compact" class='dbviewtab'>

			<?php if ( sizeof ( $orders ) ): ?>
				<table class="adminorderlist">
					<tr>
						<?php if ( $jtuser[ 'type' ] == 'admin' ): ?>
							<th>&nbsp;</th>
						<?php endif; //user is admin ?>
						<th>Date</th>
						<th>Time</th>
						<th>Order</th>
						<th>Customer</th>
						<th>Amount</th>
						<th>Driver</th>
					</tr>
					<?php foreach ( $orders as $order ): ?>
						<tr class="outlet-<?php _e ( $order[ 'a_assignedoutlet' ] ); ?> <?php _e ( formatOrderNum ( $order ) ); ?>">
							<?php if ( $jtuser[ 'type' ] == 'admin' ): ?>
								<td nowrap="nowrap">
									<input class="compactcheckbox" type="checkbox"
										   value="<?php _e ( $order[ 'id' ] ); ?>"/>
								</td>
							<?php endif; //user is admin ?>
							<td nowrap="nowrap" class="archiveorder">
								<?php _e ( date ( 'D, d-M-Y', strtotime ( $order[ 'functiondate' ] ) ) ); ?>
							</td>
							<td nowrap="nowrap"><?php _e ( $order[ 'timestart' ] ); ?></td>
							<td>
								<strong><a href="#<?php _e ( formatOrderNum ( $order ) ); ?>"
										   class='viewexpanded'><?php _e ( formatOrderNum ( $order ) ); ?></a></strong><br/>
								<?php
								$cart = unserialize ( $order[ 'items' ] );
								$cartitems = $cart[ 'items' ];
								$description = "";
								foreach ( $cartitems as $cartitem ):
									if ( $cartitem[ 'menutype' ] == JT_SETMENU ) {
										$description .= $cartitem[ 'title' ] . " (" . $cartitem[ 'numpax' ] . " pax) <br/>";
									} elseif ( $cartitem[ 'menutype' ] == JT_ALACARTEMENU ) {
										$description .= $cartitem[ 'title' ] . "<br/>";
									} elseif ( $cartitem[ 'menutype' ] == JT_MISCITEM ) {
										$description .= $cartitem[ 'title' ] . "<br/>";
									}
								endforeach;
								_e ( $description );
								?>

							</td>
							<td>
								<strong><?php _e ( $order[ 'name' ] ); ?> (<?php _e ( $order[ 'mobile' ] ); ?>)</strong><br/>
								<?php if ( $order[ 'deliverypickup' ] == "delivery" ): ?>
									<?php _e ( $order[ 'address' ] ); ?><br/>
									Singapore <?php _e ( $order[ 'postalcode' ] ); ?>
									<?php _e(accessibleByLift($order['accessiblebylift'])); ?>
								<?php elseif ( $order[ 'deliverypickup' ] == "pickup" ): ?>
									Pickup: <?php _e ( $order[ 'pickuplocation' ] ); ?>
								<?php endif; ?>
							</td>
							<td>$<?php _e ( $order[ 'ordertotalprice' ] ); ?>
                                <br/><span style='color: #c00'><?php _e ( $order[ 'paymentmode' ] ); ?>
									<?php if ($order[ 'a_paid' ] != "0000-00-00 00:00:00") { echo " (Paid)"; } ?></span>
                            </td>
							<td><?php _e ( $order[ 'a_assigneddriver' ] ); ?></td>
						</tr>

					<?php endforeach; ?>

				</table>
			<?php else: ?>
				<p>No credit orders.</p>
			<?php endif; ?>

		</div>


		<div id="expanded" class='dbviewtab'>

			<?php if ( sizeof ( $orders ) ): ?>
				<table class="adminorderlist">
					<tr>
						<th>Order</th>
						<th>Details</th>
						<th>Total</th>
						<th>&nbsp;</th>
					</tr>
					<?php foreach ( $orders as $order ): ?>
						<tr id="<?php _e ( formatOrderNum ( $order ) ); ?>"
							class="outlet-<?php _e ( $order[ 'a_assignedoutlet' ] ); ?>">
							<td nowrap="nowrap">
								<strong><?php _e ( formatOrderNum ( $order ) ); ?></strong><br/>

								<a href="<?php _e ( site_url ( 'jtadmin/vieworder/' . $order[ 'id' ] ) ); ?>">View
									Order</a><br/>

								<?php //show invoice link only if PDF has been generated (when outlet is assigned) ?>
								<?php if ( $order[ 'a_assignedoutlet' ] != "" ): ?>
									<table class="pdf-documents">
										<tr>
											<td>
												<div class="pdf-documents">
													<a class="pdf-icon"
													   href="<?php _e ( base_url ( 'assets/pdf/' . formatOrderNum ( $order, false ) . '.pdf' ) ); ?>">Invoice</a>
												</div>
											</td>
										</tr>
                                        <tr>
                                            <td>
                                                <div class="pdf-documents">
                                                    <a class="pdf-icon"
                                                       href="<?php _e ( base_url ( 'assets/pdf/' . formatOrderNum ( $order, false ) . '-do.pdf' ) ); ?>">Delivery Order</a>
                                                </div>
                                            </td>
                                        </tr>
										<tr>
											<td>
												<div class="pdf-documents">
													<a class="pdf-icon"
													   href="<?php _e ( base_url ( 'assets/pdf/' . formatOrderNum ( $order, false ) . '-env.pdf' ) ); ?>">Envelope</a>
												</div>
											</td>
										</tr>
										<tr>
											<td class="customorderpdf">
												<div class="pdf-documents">
													<a class="lb-option pdf-icon"
													   href="#<?php _e ( $order[ 'id' ] ); ?>">Custom</a>
												</div>
											</td>
										</tr>
									</table>
								<?php endif; ?>

							</td>
							<td>
								<?php if ( $order[ 'a_cancelled' ] != "0000-00-00 00:00:00" ): ?>
									<div class="ordercancelled">Order Cancelled</div>
								<?php endif; ?>
								<table class="detailstable">
									<tr>
										<th colspan="2" class="sectionhead dark">Function Details</th>
									</tr>
									<?php if ( $order[ 'deliverypickup' ] == "delivery" ): ?>
										<tr>
											<th style="width: 80px">Food</th>
											<td>
												<?php
												$cart = unserialize ( $order[ 'items' ] );
												$cartitems = $cart[ 'items' ];
												$description = "";
												foreach ( $cartitems as $cartitem ):
													if ( $cartitem[ 'menutype' ] == JT_SETMENU ) {
														$description .= $cartitem[ 'title' ] . " (" . $cartitem[ 'numpax' ] . " pax) <br/>";
													} elseif ( $cartitem[ 'menutype' ] == JT_ALACARTEMENU ) {
														$description .= $cartitem[ 'title' ] . "<br/>";
													} elseif ( $cartitem[ 'menutype' ] == JT_MISCITEM ) {
														$description .= $cartitem[ 'title' ] . "<br/>";
													}
												endforeach;
												_e ( $description );
												?>
											</td>
										</tr>
										<tr>
											<th>Type</th>
											<td>
												Delivery
												<?php if ( $order[ 'a_assigneddriver' ] != "" ): ?>
													(Driver: <?php _e ( $order[ 'a_assigneddriver' ] ); ?>)
												<?php endif; ?>
											</td>
										</tr>
										<tr>
											<th>Date</th>
											<td><?php _e ( date ( 'D, d-M-Y', strtotime ( $order[ 'functiondate' ] ) ) ); ?></td>
										</tr>
										<tr>
											<th>Time</th>
											<td><?php _e ( $order[ 'timestart' ] ); ?>
												- <?php _e ( $order[ 'timeend' ] ); ?></td>
										</tr>
										<tr>
											<th>Address</th>
											<td>
												<?php _e ( $order[ 'address' ] ); ?><br/>
												Singapore <?php _e ( $order[ 'postalcode' ] ); ?>
												<?php _e(accessibleByLift($order['accessiblebylift'])); ?>
												[<a target="_blank"
													href="https://www.google.com.sg/maps/place/Singapore+<?php _e ( $order[ 'postalcode' ] ); ?>/">Map</a>]
											</td>
										</tr>
									<?php elseif ( $order[ 'deliverypickup' ] == "pickup" ): ?>
										<tr>
											<th style="width: 80px">Food</th>
											<td>
												<?php
												$cart = unserialize ( $order[ 'items' ] );
												$cartitems = $cart[ 'items' ];
												$description = "";
												foreach ( $cartitems as $cartitem ):
													if ( $cartitem[ 'menutype' ] == JT_SETMENU ) {
														$description .= $cartitem[ 'title' ] . " (" . $cartitem[ 'numpax' ] . " pax) <br/>";
													} elseif ( $cartitem[ 'menutype' ] == JT_ALACARTEMENU ) {
														$description .= $cartitem[ 'title' ] . "<br/>";
													} elseif ( $cartitem[ 'menutype' ] == JT_MISCITEM ) {
														$description .= $cartitem[ 'title' ] . "<br/>";
													}
												endforeach;
												_e ( $description );
												?>
											</td>
										</tr>
										<tr>
											<th style="width: 80px">Type</th>
											<td>Self Collect</td>
										</tr>
										<tr>
											<th>Date</th>
											<td><?php _e ( date ( 'D, d-M-Y', strtotime ( $order[ 'functiondate' ] ) ) ); ?></td>
										</tr>
										<tr>
											<th>Time</th>
											<td><?php _e ( $order[ 'timestart' ] ); ?></td>
										</tr>
										<tr>
											<th>Location</th>
											<td><?php _e ( $order[ 'pickuplocation' ] ); ?></td>
										</tr>
									<?php endif; ?>
								</table>
								<table class="detailstable">
									<tr>
										<th colspan="2" class="sectionhead">
											Contact Details
											<?php if ($order[ 'communicationpreference' ] )  {
												_e ( "(" . $order[ 'communicationpreference' ] . ")");
											} ?>
										</th>
									</tr>
									<tr>
										<th style="width: 80px">Name</th>
										<td><?php _e ( $order[ 'name' ] ); ?></td>
									</tr>
									<tr>
										<th>Email</th>
										<td>
											<?php
											_e($order['email']);
											if ($order['email2']) {
												_e('<br/>' . $order['email2']);
											}
											?>
										</td>
									</tr>
									<tr>
										<th>Tel No</th>
										<td><?php _e ( $order[ 'telephone' ] ); ?></td>
									</tr>
									<tr>
										<th>Mobile No</th>
										<td>
											<?php
											_e($order['mobile']);
											if ($order['mobile2']) {
												_e('<br/>' . $order['mobile2']);
											}
											?>
										</td>
									</tr>
									<tr>
										<th>Billing</th>
										<td>
											<?php if ( $order[ 'sameasdelivery' ] ): ?>
												Same Contact
											<?php else: ?>
												Different Contact
											<?php endif; ?>
										</td>
									</tr>
								</table>
								<a class='backtotop' href="#">Back To Top</a>
								<div class="sep"></div>
							</td>
							<td nowrap="nowrap">
								<div class="ordertotalprice">$<?php _e ( $order[ 'ordertotalprice' ] ); ?></div>
                                <span style='color: #c00'><?php _e ( $order[ 'paymentmode' ] ); ?>
									<?php if ($order[ 'a_paid' ] != "0000-00-00 00:00:00") { echo " (Paid)"; } ?></span>
							</td>
							<?php
							$order_controls = [];
							$order_controls[ 'assignoutlet' ] = [
								'label' => 'Assigned Outlet',
								'yes_no' => ( $order[ 'a_assignedoutlet' ] != "" ),
								'yes_admin_control' => true,
								'no_admin_control' => true,
							];
							$order_controls[ 'assigndriver' ] = [
								'label' => 'Assigned Driver',
								'yes_no' => ( $order[ 'a_assigneddriver' ] != "" ),
								'yes_admin_control' => true,
								'no_admin_control' => true,
							];
							$order_controls[ 'confirmorder' ] = [
								'label' => 'Confirmed',
								'yes_no' => ( $order[ 'a_confirmationsent' ] != "0000-00-00 00:00:00" ),
								'yes_admin_control' => true,
								'no_admin_control' => true,
							];
							$order_controls[ 'acknowledgeorder' ] = [
								'label' => 'Acknowledged',
								'yes_no' => ( $order[ 'a_confirmationack' ] != "0000-00-00 00:00:00" ),
								'yes_admin_control' => false,
								'no_admin_control' => true,
							];
							if ($order[ 'a_paid' ] == "0000-00-00 00:00:00") {
								$order_controls[ 'payorder' ] = [
									'label' => 'Paid',
									'yes_no' => ( $order[ 'a_paid' ] != "0000-00-00 00:00:00" ),
									'yes_admin_control' => false,
									'no_admin_control' => true,
								];
							}
							else {
								$order_controls[ 'unpayorder' ] = [
									'label' => 'Paid',
									'yes_no' => ( $order[ 'a_paid' ] != "0000-00-00 00:00:00" ),
									'yes_admin_control' => true,
									'no_admin_control' => false,
								];
							}
							$order_controls[ 'creditorder' ] = [
								'label' => 'Credit',
								'yes_no' => ( $order[ 'a_credit' ] != "0000-00-00 00:00:00" ),
								'yes_admin_control' => true,
								'no_admin_control' => true,
							];
							$order_controls[ 'thankorder' ] = [
								'label' => 'Thanked',
								'yes_no' => ( $order[ 'a_feedbacksent' ] != "0000-00-00 00:00:00" ),
								'yes_admin_control' => false,
								'no_admin_control' => true,
							];
							$order_controls[ 'leavefeedbackorder' ] = [
								'label' => 'Left Feedback',
								'yes_no' => ( $order[ 'a_feedbackreceived' ] != "0000-00-00 00:00:00" ),
								'yes_admin_control' => false,
								'no_admin_control' => false,
							];
							$order_controls[ 'archiveorder' ] = [
								'label' => 'Archived',
								'yes_no' => ( $order[ 'a_archived' ] != "0000-00-00 00:00:00" ),
								'yes_admin_control' => false,
								'no_admin_control' => true,
							];
							$order_controls[ 'cancelorder' ] = [
								'label' => 'Cancelled',
								'yes_no' => ( $order[ 'a_cancelled' ] != "0000-00-00 00:00:00" ),
								'yes_admin_control' => true,
								'no_admin_control' => true,
							];
							?>
							<td nowrap="nowrap">
								<table class="detailstable">
									<?php foreach ( $order_controls as $key => $value ): ?>
										<tr>
											<th nowrap="nowrap"><?php _e ( $value[ 'label' ] ); ?></th>
											<td class="<?php _e ( $key ) ?>">
												<?php if ( $value[ 'yes_no' ] ): ?>
													<span class="status-yes">
														<?php if ($value['yes_admin_control'] && ($jtuser[ 'type' ] == 'admin') ): ?>
															<a href="#<?php _e ( $order[ 'id' ] ); ?>"  class="lb-option">Yes</a>
														<?php else: ?>
															Yes
														<?php endif; ?>
													</span>
												<?php else: ?>
													<span class="status-no">
														<?php if ($value['no_admin_control'] && ($jtuser[ 'type' ] == 'admin') ): ?>
															<a href="#<?php _e ( $order[ 'id' ] ); ?>"  class="lb-option">No</a>
														<?php else: ?>
															No
														<?php endif; ?>
													</span>
												<?php endif; ?>
											</td>
										</tr>
									<?php endforeach; ?>
								</table>
							</td>
						</tr>
					<?php endforeach; ?>

				</table>
			<?php else: ?>
				<p>No credit orders.</p>
			<?php endif; ?>

		</div>

	</div>


<?php if ( $jtuser[ 'type' ] == 'admin' ): ?>
	<div id="lightbox">
		<div class="lb-apiurl"><?php _e ( site_url ( 'jtadmin/ajax' ) ) ?></div>
		<div class="lb-bkg"></div>
		<div class="lb-contentwrap">
			<div class="lb-content"></div>
		</div>
	</div>
<?php endif; ?>