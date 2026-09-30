<img src="<?php _e($_SERVER['DOCUMENT_ROOT'] . '/assets/images/pdfheader.png'); ?>" alt="Jai Group Header"/>
<div style="font-size: 100%;">
    <?php
    if ($orderdata['a_confirmationsent'] == "0000-00-00 00:00:00") {
        $pendingconfirmed = "(Pending)";
        $pdftitle = "Delivery Order";
    }
    else {
        $pendingconfirmed = "(Confirmed)";
        $pdftitle =  "Delivery Order";
    }
    $cart = $orderdata['items'];
    $cart = unserialize($cart);
    ?>

    <p><strong style="font-size: 110%"><?php _e($pdftitle); ?> <?php _e(formatOrderNum($orderdata)); ?> <?php _e($pendingconfirmed); ?></strong></p>

    <div class="orderdetailswrap">
        <table class="orderdetails" cellspacing="0" cellpadding="0" style="border-collapse: collapse; width: 100%; ">

            <tr>
                <th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" nowrap="nowrap"><?php _e($pdftitle); ?> #</th>
                <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;"><?php _e(formatOrderNum($orderdata)); ?></td>
                <th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" nowrap="nowrap">Date of Function</th>
                <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;"><?php _e(date('d-M-Y', strtotime($orderdata['functiondate']))); ?></td>
            </tr>

            <?php if ($orderdata['deliverypickup'] == 'pickup'): ?>
                <tr>
                    <th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" nowrap="nowrap">Self-Collect Time</th>
                    <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;"><?php _e($orderdata['timestart']); ?></td>
                    <th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" nowrap="nowrap">Self-Collect Location</th>
                    <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">
                        <?php _e($orderdata['pickuplocation']); ?>
                        <?php
                        $address = [
                            JT_CW => "7 Clover Way <br/>Singapore 579080",
                            JT_PV => "27 Purvis Street #01-01 <br/>An Chuan Building <br/>Singapore 188604",
                            JT_CK => "200 Pandan Loop #08-06 <br/>Singapore 128388",
                        ];
                        _e("<br/>" . $address[$orderdata['pickuplocation']]);
                        ?>
                    </td>
                </tr>
            <?php elseif($orderdata['deliverypickup'] == 'delivery'): ?>
                <tr>
                    <th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" nowrap="nowrap">Ready to Eat Time</th>
                    <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;"><?php _e($orderdata['timestart']); ?></td>
                    <th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" nowrap="nowrap">Collection Time</th>
                    <?php if ($cart['chargeforcontainers']) : ?>
                        <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">-</td>
                    <?php else: ?>
                        <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;"><?php _e($orderdata['timeend']); ?></td>
                    <?php endif; ?>
                </tr>
                <tr>
                    <th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" nowrap="nowrap">Type of Function</th>
                    <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" colspan="3"><?php _e($orderdata['typeoffunction']); ?></td>
                </tr>
            <?php endif; ?>

            <tr>
                <th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" nowrap="nowrap">Contact Person</th>
                <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;"><?php _e($orderdata['name']); ?></td>
                <th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" nowrap="nowrap">Email Address</th>
                <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">
                    <?php
                    _e($orderdata['email']);
                    if ($orderdata['email2']) {
                        _e('<br/>' . $orderdata['email2']);
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" nowrap="nowrap">Telephone No</th>
                <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;"><?php _e($orderdata['telephone']); ?></td>
                <th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" nowrap="nowrap">Mobile No</th>
                <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">
                    <?php
                    _e($orderdata['mobile']);
                    if ($orderdata['mobile2']) {
                        _e('<br/>' . $orderdata['mobile2']);
                    }
                    ?>
                </td>
            </tr>

            <?php if($orderdata['deliverypickup'] == 'delivery'): ?>
                <tr>
                    <th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" nowrap="nowrap">Delivery Address</th>
                    <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">
                        <?php _e($orderdata["company"] ? $orderdata['company'] . "<br />": ""); ?>
                        <?php _e($orderdata['address'] ); ?>
                        <?php _e($orderdata["unitnum"] ? $orderdata['unitnum'] : ""); ?>
                        <?php _e($orderdata["buildingname"] ? "<br />" . $orderdata['buildingname'] : ""); ?>
                        <?php _e("<br />Singapore " . $orderdata['postalcode']); ?>
                        <?php _e(setuparea($orderdata['setuparea'], $orderdata['accessiblebylift'])); ?>
                        <?php if ($orderdata['cutleryrequired']) { _e("<br/>Cutlery Required:" . $orderdata['cutleryrequired']); } ?>
                        <?php if ($orderdata['tablesrequired']) { _e("<br/>Tables Required:" . $orderdata['tablesrequired']); } ?>
                    </td>
                    <th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" nowrap="nowrap">Billing Address</th>
                    <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">
                        <?php if ($orderdata['sameasdelivery']): ?>
                            <?php _e($orderdata["company"] ? $orderdata['company'] . "<br />": ""); ?>
                            <?php _e($orderdata['address'] ); ?>
                            <?php _e($orderdata["unitnum"] ? $orderdata['unitnum'] : ""); ?>
                            <?php _e($orderdata["buildingname"] ? "<br />" . $orderdata['buildingname'] : ""); ?>
                            <?php _e("<br />Singapore " . $orderdata['postalcode']); ?>
                        <?php else: ?>
                            <?php _e($orderdata["billcompany"] ? $orderdata['billcompany'] . "<br />": ""); ?>
                            <?php _e($orderdata['billaddress'] ); ?>
                            <?php _e($orderdata["billunitnum"] ? $orderdata['billunitnum'] : ""); ?>
                            <?php _e($orderdata["billbuildingname"] ? "<br />" . $orderdata['billbuildingname'] : ""); ?>
                            <?php _e("<br />Singapore " . $orderdata['billpostalcode']); ?>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endif; ?>

            <tr>
                <th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" nowrap="nowrap">Order Date</th>
                <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;"><?php _e(date('d-M-Y', strtotime($orderdata['ordertime']))); ?></td>
                <th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" nowrap="nowrap">Payment Mode</th>
                <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">
                    <?php _e($orderdata['paymentmode']); ?>
                    <?php if (
                        ($orderdata['a_confirmationsent'] != "0000-00-00 00:00:00") &&
                        ($orderdata['a_paid'] == "0000-00-00 00:00:00") &&
                        ($orderdata['paymentmode'] == "Credit Card / Paypal")
                    ): ?>
                        <br><a href="https://www.jai-thai.com/cart/acknowledgeorder?oh=<?php echo $orderdata['orderhash']; ?>">Payment Link</a>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">Notes</th>
                <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" colspan="3"><?php _e($orderdata['notes']); ?></td>
            </tr>

        </table>
    </div>

    <table class="shoppingcart" style="margin-top: 20px; border-collapse: collapse; width: 100%;">

        <thead>
        <tr>
            <th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">S/No</th>
            <th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">Menu Details</th>
            <th style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">Num Pax</th>
        </tr>
        </thead>

        <tbody>

        <?php $i = 1;?>
        <?php $cartitems = $cart['items']; ?>

        <?php if (is_array($cartitems) && sizeof($cartitems)) : ?>

            <?php foreach($cartitems as $key => $cartitem): ?>

                <?php if ($cartitem['menutype'] == JT_SETMENU): ?>
                    <tr>
                        <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;"><?php _e($i++); ?></td>
                        <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">
                            <p style="margin-top: 0; padding-top: 0;"><strong>
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
                        </td>
                        <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;"><?php _e($cartitem['numpax']) ?> pax</td>
                    </tr>

                <?php elseif ($cartitem['menutype'] == JT_ALACARTEMENU): ?>

                    <tr>
                        <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;"><?php _e($i++); ?></td>
                        <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">
                            <p style="margin-top: 0; padding-top: 0;"><strong><?php _e($cartitem['title']) ?></strong></p>
                            <ol>
                                <?php foreach($cartitem['dishes'] as $dish): ?>
                                    <li><?php _e($dish['name']); ?></li>
                                <?php endforeach;?>
                            </ol>
                        </td>
                        <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">
                            <p style="margin-top: 0; padding-top: 0;">&nbsp;</p>
                            <p style="margin-top: 0; padding-top: 0;">
                                <?php foreach($cartitem['dishes'] as $dish): ?>
                                    <?php $servings = $dish['qty'] * $dish['serves']; ?>
                                    <?php _e("Serves " . $servings . " pax"); ?><br />
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
                        <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;"><?php _e($i++); ?></td>
                        <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">
                            <p style="margin-top: 0; padding-top: 0;"><strong><?php _e($cartitem['title']) ?></strong></p>
                        </td>
                        <td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;">&nbsp;</td>
                    </tr>

                <?php endif; ?>

            <?php endforeach; ?>

        <?php else: ?>

            <tr><td style="text-align:left; vertical-align: top; padding: 5px; border: 1px solid #333;" colspan="4">
                    <div class="emptycart">You have no items in your cart</div>
                </td></tr>

        <?php endif; //emptycart ?>
        </tbody>

    </table>

    <div class="food-ready" style="float:right; margin: 20px 0 0 20px; padding: 15px; border: 2px solid #a00; color: #a00; font-weight: bold;">
        License No: <?php _e(getLicenseNumber($orderdata)); ?><br>
        Food Ready to Eat on<br />
        <?php _e(date('d M Y', strtotime($orderdata['functiondate']))); ?> at <?php _e($orderdata['timestart']); ?><br />
        <?php
        function addThreeHours($time) {
            $dateTime = DateTime::createFromFormat('h:i A', $time);
            if (!$dateTime) {
                return "Invalid time format. Please use 'h:i A' (e.g., '11:45 AM').";
            }
            $dateTime->modify('+3 hours');
            return $dateTime->format('h:i A');
        }
        ?>
        To be consumed by <?php _e(addThreeHours($orderdata['timestart'])); ?>
    </div>

    <div class="tnc">
        <p><strong>Notes:</strong></p>
        <ul>
            <?php if ($cart['chargeforcontainers']) : ?>
                <li>Food will be prepared in disposable trays, no buffet table set-up.</li>
                <li>Disposable plates, forks &amp; spoons and chilli sauce will be provided.</li>
            <?php else: ?>
                <li>Complete buffet layout with warmers, tables, and tablecloth will be provided.</li>
                <li>Full set of disposable wares (plates, forks and spoons, chilli, serviettes and garbage bags).</li>
            <?php endif; ?>

        </ul>
    </div>



    <?php if ($orderdata['a_assigneddriver'] != ""): ?>
        (Assigned Driver: <?php _e($orderdata['a_assigneddriver']); ?>)
    <?php endif; ?>

</div>