<?php showStatusMessage($this->session->userdata('statusmessage')); ?>
<?php $this->session->unset_userdata('statusmessage'); ?>
<div id="content" class="row">
	<div class="col-sm-12">

		<div class="row cateringmenus-header">
			<div class="col-sm-6 col-xs-12">
				<h1>Catering Menus</h1>
				<p class="lead">Planning a party or function?  Select from our variety of catering menus!</p>
				<p>Whether you like to pick a pre-set range of dishes, or select your own dishes, we have a catering package for you!</p>
			</div>
			<div class="col-sm-6 hidden-xs">
				<img src="<?php _e(base_url("/assets/i/singapore-catering.jpg")); ?>" alt="Singapore Catering" class="img-responsive pull-right" />
			</div>
		</div><!-- /.row -->

        <?php CNY_Helper::show_banner(); ?>

        <nav class="row cateringmenus-nav">
			<div class="col-sm-12">
				<ul>
<!--                    <li><a href="#menu-cny2026" class="cny2026">CNY 2026</a></li>-->
					<li><a href="#menu-set" class="set">Set Catering</a></li>
					<li><a href="#menu-diy" class="diy">DIY Catering</a></li>
					<li><a href="#menu-vegan" class="vegan">Vegan Catering</a></li>
					<li><a href="#menu-miniparty-set" class="miniparty-set">Mini Party Sets</a></li>
					<li><a href="#menu-vegan-miniparty-set" class="vegan-miniparty-set">Vegan Mini Party Sets</a></li>
					<li><a href="#menu-miniparty-diy" class="miniparty-diy">Mini Party DIY</a></li>
					<li><a href="#menu-bento" class="bento">Bento</a></li>
				</ul>
			</div>
		</nav>
		
		<div class="row cateringmenus">
			<div class="col-sm-12">

					<?php /*
                <div id="menu-cny2026" class="cateringmenu">
                    <h2>CNY 2026</h2>
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="<?php _e(site_url('cnymenu/cnyjoy')); ?>">
                                <img src="<?php _e(base_url('assets/i/catering-menu/cnyjoy.jpg')) ?>" alt="CNY 2026 Joy Set Menu" title="CNY 2026 Joy Set Menu" class="img-responsive" data-toggle="tooltip" data-placement="top"  />
                            </a>
                        </div>
                        <div class="col-sm-8">
                            <h3>CNY 2026 Joy - Festive Catering Set Menu</h3>
                            <p>9 Course @ $24.90 per person<br />Drinks available with addition of $1.00 / pax<br />Minimum 40 pax</p>
                            <p><a href="<?php _e(site_url('cnymenu/cnyjoy')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <a href="<?php _e(site_url('cnymenu/cnyfortune')); ?>">
                                <img src="<?php _e(base_url('assets/i/catering-menu/cnyfortune.jpg')) ?>" alt="CNY 2026 Fortune Set Menu" title="CNY 2026 Fortune Set Menu" class="img-responsive" data-toggle="tooltip" data-placement="top"  />
                            </a>
                        </div>
                        <div class="col-sm-8">
                            <h3>CNY 2026 Fortune - Festive Catering Set Menu</h3>
                            <p>10 Course @ $26.90 per person<br />Drinks available with addition of $1.00 / pax<br />Minimum 35 pax</p>
                            <p><a href="<?php _e(site_url('cnymenu/cnyfortune')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <a href="<?php _e(site_url('cnymenu/cnyprosperity')); ?>">
                                <img src="<?php _e(base_url('assets/i/catering-menu/cnyprosperity.jpg')) ?>" alt="CNY 2026 Prosperity Set Menu" title="CNY 2026 Prosperity Set Menu" class="img-responsive" data-toggle="tooltip" data-placement="top"  />
                            </a>
                        </div>
                        <div class="col-sm-8">
                            <h3>CNY 2026 Prosperity - Festive Catering Set Menu</h3>
                            <p>13 Course @ $29.90 per person<br />Drinks available with addition of $1.00 / pax<br />Minimum 30 pax</p>
                            <p><a href="<?php _e(site_url('cnymenu/cnyprosperity')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
                        </div>
                    </div>

 					<div class="row">
						<div class="col-sm-4">
                            <a href="<?php _e(site_url('cnymenu/cnyfamilyset')); ?>">
								<img src="<?php _e(base_url('assets/i/catering-menu/cny-miniparty-set.jpg')) ?>" alt="CNY Mini Party Menu" title="CNY Menu" class="img-responsive" data-toggle="tooltip" data-placement="top"  />
							</a>
						</div>
						<div class="col-sm-8">
							<h3>CNY 2026 Takeaway Family Set</h3>
							<p>9 Dishes for 10 Pax @ $288<br />Food served in disposable trays / containers<br />Delivery available for orders more than 20 pax.</p>
							<p><a href="<?php _e(site_url('cnymenu/cnyfamilyset')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
						</div>
					</div>
                </div>

                    */ ?>

                    <?php /*
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="<?php _e(site_url('xmasmenu/xmascatering')); ?>">
                                <img src="<?php _e(base_url('assets/i/catering-menu/xmas-set.jpg')) ?>" alt="Thai Mixed Platter Appetizers" title="Mixed Platter" class="img-responsive dotooltip" data-toggle="tooltip" data-placement="top"  />
                            </a>
                        </div>
                        <div class="col-sm-8">
                            <h3>XMas and New Year Catering</h3>
                            <p>10 Course @ $29.80 Plus GST Per Person
                                <br />Drinks available with addition of $1.00 / pax
                                <br />Minimum 30 pax
                                <br /><span style="color: #c00; font-weight: bold;">FREE 1 box of Premium Brownie worth $38!</span>
                            </p>
                            <p><a href="<?php _e(site_url('xmasmenu/xmascatering')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-4">
                            <a href="<?php _e(site_url('xmasmenu/xmasminiparty')); ?>">
                                <img src="<?php _e(base_url('assets/i/catering-menu/xmas-set.jpg')) ?>" alt="Thai Mixed Platter Appetizers" title="Mixed Platter" class="img-responsive dotooltip" data-toggle="tooltip" data-placement="top"  />
                            </a>
                        </div>
                        <div class="col-sm-8">
                            <h3>XMas and New Year Mini Party Set</h3>
                            <p>$328 Plus GST Per Set - 10 Dishes for 10 Pax
                                <br />Food served in disposable trays / containers
                                <br />Delivery and self collection available
                                <br />Minimum 10 pax for delivery orders
                                <br /><span style="color: #c00; font-weight: bold;">FREE 1 box of Premium Brownie worth $38!</span>
                            </p>
                            <p><a href="<?php _e(site_url('xmasmenu/xmasminiparty')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
                        </div>
                    </div>
                    */ ?>

                    <?php /*
                     <div class="row">
                        <div class="col-sm-4">
                            <a href="<?php _e(site_url('xmasmenu/xmasminiparty')); ?>">
                                <img src="<?php _e(base_url('assets/i/catering-menu/xmas-set.jpg')) ?>" alt="Special Xmas Set Menu" title="XMAS Menu" class="img-responsive" data-toggle="tooltip" data-placement="top"  />
                            </a>
                        </div>
                        <div class="col-sm-8">
                            <h3>XMas and New Year Mini Party Set</h3>
                            <p>$328 Plus GST Per Set - 9 Dishes for 10 Pax<br />Food served in disposable trays / containers<br />Delivery and self collection available<br />Minimum 1 set (10 pax). Order quantity in multiples of 10 pax.</p>
                            <p><a href="<?php _e(site_url('xmasmenu/xmasminiparty')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
                        </div>
                    </div>
                    */ ?>

					<?php /*
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="<?php _e(site_url('cnymenu/cnyhappiness')); ?>">
                                <img src="<?php _e(base_url('assets/i/catering-menu/cnyhappiness.jpg')) ?>" alt="CNY 2025 Happiness Set Menu" title="CNY 2025 Happiness Set Menu" class="img-responsive" data-toggle="tooltip" data-placement="top"  />
                            </a>
                        </div>
                        <div class="col-sm-8">
                            <h3>CNY 2025 Happiness - Festive Catering Set Menu</h3>
                            <p>9 Course @ $23.90 per person<br />Drinks available with addition of $1.00 / pax<br />Minimum 40 pax</p>
                            <p><a href="<?php _e(site_url('cnymenu/cnyhappiness')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <a href="<?php _e(site_url('cnymenu/cnydelight')); ?>">
                                <img src="<?php _e(base_url('assets/i/catering-menu/cnydelight.jpg')) ?>" alt="CNY 2025 Delight Set Menu" title="CNY 2025 Delight Set Menu" class="img-responsive" data-toggle="tooltip" data-placement="top"  />
                            </a>
                        </div>
                        <div class="col-sm-8">
                            <h3>CNY 2025 Delight - Festive Catering Set Menu</h3>
                            <p>10 Course @ $25.90 per person<br />Drinks available with addition of $1.00 / pax<br />Minimum 35 pax</p>
                            <p><a href="<?php _e(site_url('cnymenu/cnydelight')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <a href="<?php _e(site_url('cnymenu/cnytreasure')); ?>">
                                <img src="<?php _e(base_url('assets/i/catering-menu/cnytreasure.jpg')) ?>" alt="CNY 2025 Treasure Set Menu" title="CNY 2025 Treasure Set Menu" class="img-responsive" data-toggle="tooltip" data-placement="top"  />
                            </a>
                        </div>
                        <div class="col-sm-8">
                            <h3>CNY 2025 Treasure - Festive Catering Set Menu</h3>
                            <p>13 Course @ $28.90 per person<br />Drinks available with addition of $1.00 / pax<br />Minimum 30 pax</p>
                            <p><a href="<?php _e(site_url('cnymenu/cnytreasure')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
                        </div>
                    </div>

 					<div class="row">
						<div class="col-sm-4">
                            <a href="<?php _e(site_url('cnymenu/cnyfamilyset')); ?>">
								<img src="<?php _e(base_url('assets/i/catering-menu/cny-miniparty-set.jpg')) ?>" alt="CNY Mini Party Menu" title="CNY Menu" class="img-responsive" data-toggle="tooltip" data-placement="top"  />
							</a>
						</div>
						<div class="col-sm-8">
							<h3>CNY 2025 Takeaway Family Set</h3>
							<p>9 Dishes for 10 Pax @ $288<br />Food served in disposable trays / containers<br />Self collection only</p>
							<p><a href="<?php _e(site_url('cnymenu/cnyfamilyset')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
						</div>
					</div>

                    <div class="row">
                        <div class="col-sm-4">
                            <a href="<?php _e(site_url('cnymenu/yusheng')); ?>">
                                <img src="<?php _e(base_url('assets/i/catering-menu/cny-yusheng.jpg')) ?>" alt="CNY Mini Party Menu" title="CNY Menu" class="img-responsive" data-toggle="tooltip" data-placement="top"  />
                            </a>
                        </div>
                        <div class="col-sm-8">
                            <h3>CNY 2025 Prosperity Yusheng</h3>
                            <p>Make your toast to prosperity with our Mango Prosperity Yusheng with King Topshell or Fruits!</p>
                            <p><a href="<?php _e(site_url('cnymenu/yusheng')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
                        </div>
                    </div>
                    */ ?>

                    <?php /*
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="<?php _e(site_url('/specialmenu/mothersday')); ?>">
                                <img src="<?php _e(base_url('assets/i/catering-menu/mothersday-set.jpg')) ?>" alt="Mothers Day Set" title="Mothers Day Set" class="img-responsive dotooltip" data-toggle="tooltip" data-placement="top"  />
                            </a>
                        </div>
                        <div class="col-sm-8">
                            <h3>Mother's Day Set Menu</h3>
                            <p>8 Dishes from $188.00<br/>Serves 6 - 10 Pax Per Set<br />Food served in disposable trays / containers<br />Delivery and Self collection Available</p>
                            <p><a href="<?php _e(site_url('/specialmenu/mothersday')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
                        </div>
                    </div>
                    */ ?>
				<div id="menu-set" class="cateringmenu">
					<h2>Set Catering Menus</h2>

					<div class="row">
						<div class="col-sm-4">
							<a href="<?php _e(site_url('/jtmenu/cateringmenua')); ?>">
								<img src="<?php _e(base_url('assets/i/catering-menu/set-catering-menu-a.jpg')) ?>" alt="Set Catering Menu A" title="Set Catering Menu A" class="img-responsive dotooltip" data-toggle="tooltip" data-placement="top"  />
							</a>
						</div>
						<div class="col-sm-8">
							<h3>Set Catering Menu A</h3>
							<p>7 Dishes (No Drink) @ $14.00 / pax<br />Drinks available with addition of $1.00 / pax<br />Minimum 40 pax</p>
							<p><a href="<?php _e(site_url('/jtmenu/cateringmenua')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<a href="<?php _e(site_url('/jtmenu/cateringmenub')); ?>">
								<img src="<?php _e(base_url('assets/i/catering-menu/set-catering-menu-b.jpg')) ?>" alt="Set Catering Menu B" title="Set Catering Menu B" class="img-responsive dotooltip" data-toggle="tooltip" data-placement="top"  />
							</a>
						</div>
						<div class="col-sm-8">
							<h3>Set Catering Menu B</h3>
							<p>9 Dishes (No Drink) @ $17.00 / pax<br />Drinks available with addition of $1.00 / pax<br />Minimum 30 pax</p>
							<p><a href="<?php _e(site_url('/jtmenu/cateringmenub')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<a href="<?php _e(site_url('/jtmenu/cateringmenuc')); ?>">
								<img src="<?php _e(base_url('assets/i/catering-menu/set-catering-menu-c.jpg')) ?>" alt="Set Catering Menu C" title="Set Catering Menu C" class="img-responsive dotooltip" data-toggle="tooltip" data-placement="top"  />
							</a>
						</div>
						<div class="col-sm-8">
							<h3>Set Catering Menu C</h3>
							<p>10 Dishes (No Drink) @ $20.00 / pax<br />Drinks available with addition of $1.00 / pax<br />Minimum 30 pax</p>
							<p><a href="<?php _e(site_url('/jtmenu/cateringmenuc')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<a href="<?php _e(site_url('/jtmenu/cateringmenud')); ?>">
								<img src="<?php _e(base_url('assets/i/catering-menu/set-catering-menu-d.jpg')) ?>" alt="Set Catering Menu D" title="Set Catering Menu D" class="img-responsive dotooltip" data-toggle="tooltip" data-placement="top"  />
							</a>
						</div>
						<div class="col-sm-8">
							<h3>Set Catering Menu D</h3>
							<p>11 Dishes (No Drink) @ $24.00 / pax<br />Drinks available with addition of $1.00 / pax<br />Minimum 30 pax</p>
							<p><a href="<?php _e(site_url('/jtmenu/cateringmenud')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
						</div>
					</div>
				</div>
				<div id="menu-diy" class="cateringmenu">
					<h2>DIY Catering Menus</h2>
					<div class="row">
						<div class="col-sm-4">
							<a href="<?php _e(site_url('/jtmenu/cateringdiya')); ?>">
								<img src="<?php _e(base_url('assets/i/catering-menu/diy-catering-menu-a.jpg')) ?>" alt="DIY Catering Menu A" title="DIY Catering Menu A" class="img-responsive dotooltip" data-toggle="tooltip" data-placement="top" />
							</a>
						</div>						
						<div class="col-sm-8">
							<h3>DIY Catering Menu A</h3>
							<p>7 Dishes + Drink @ $15.90/ pax<br />Minimum 40 pax</p>
							<p><a href="<?php _e(site_url('/jtmenu/cateringdiya')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
						</div>											
					</div>
					<div class="row">
						<div class="col-sm-4">
							<a href="<?php _e(site_url('/jtmenu/cateringdiyb')); ?>">
								<img src="<?php _e(base_url('assets/i/catering-menu/diy-catering-menu-b.jpg')) ?>" alt="DIY Catering Menu B" title="DIY Catering Menu B" class="img-responsive dotooltip" data-toggle="tooltip" data-placement="top" />
							</a>
						</div>						
						<div class="col-sm-8">
							<h3>DIY Catering Menu B</h3>
							<p>9 Dishes + Drink @ $18.90 / pax<br />Minimum 30 pax</p>
							<p><a href="<?php _e(site_url('/jtmenu/cateringdiyb')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
						</div>											
					</div>
					<div class="row">
						<div class="col-sm-4">
							<a href="<?php _e(site_url('/jtmenu/cateringdiyc')); ?>">
								<img src="<?php _e(base_url('assets/i/catering-menu/diy-catering-menu-c.jpg')) ?>" alt="DIY Catering Menu C" title="DIY Catering Menu C" class="img-responsive dotooltip" data-toggle="tooltip" data-placement="top" />
							</a>
						</div>						
						<div class="col-sm-8">
							<h3>DIY Catering Menu C</h3>
							<p>10 Dishes + Drink @ $21.90 / pax<br />Minimum 30 pax</p>
							<p><a href="<?php _e(site_url('/jtmenu/cateringdiyc')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
						</div>											
					</div>
					<div class="row">
						<div class="col-sm-4">
							<a href="<?php _e(site_url('/jtmenu/cateringdiyd')); ?>">
								<img src="<?php _e(base_url('assets/i/catering-menu/diy-catering-menu-d.jpg')) ?>" alt="DIY Catering Menu D" title="DIY Catering Menu D" class="img-responsive dotooltip" data-toggle="tooltip" data-placement="top" />
							</a>
						</div>						
						<div class="col-sm-8">
							<h3>DIY Catering Menu D</h3>
							<p>11 Dishes + Drink @ $25.90 / pax<br />Minimum 30 pax</p>
							<p><a href="<?php _e(site_url('/jtmenu/cateringdiyd')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
						</div>											
					</div>
				</div>
				<div id="menu-vegan" class="cateringmenu">
					<h2>Vegan Catering Menus</h2>
					<div class="row">
						<div class="col-sm-4">
							<a href="<?php _e(site_url('/jtmenu/vegetarianmenua')); ?>">
								<img src="<?php _e(base_url('assets/i/catering-menu/vegan-catering-menu-a.jpg')) ?>" alt="Vegan Catering Menu A" title="Vegan Catering Menu A" class="img-responsive dotooltip" data-toggle="tooltip" data-placement="top" />
							</a>
						</div>						
						<div class="col-sm-8">
							<h3>Vegan Catering Menu A</h3>
							<p>7 Dishes (No Drink) @ $14.00 / pax<br />Drinks available with addition of $1.00 / pax<br />Minimum 40 pax</p>
							<p><a href="<?php _e(site_url('/jtmenu/vegetarianmenua')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
						</div>											
					</div>
					<div class="row">
						<div class="col-sm-4">
							<a href="<?php _e(site_url('/jtmenu/vegetarianmenub')); ?>">
								<img src="<?php _e(base_url('assets/i/catering-menu/vegan-catering-menu-b.jpg')) ?>" alt="Vegan Catering Menu B" title="Vegan Catering Menu B" class="img-responsive dotooltip" data-toggle="tooltip" data-placement="top" />
							</a>
						</div>						
						<div class="col-sm-8">
							<h3>Vegan Catering Menu B</h3>
							<p>9 Dishes (No Drink) @ $17.00 / pax<br />Drinks available with addition of $1.00 / pax<br />Minimum 30 pax</p>
							<p><a href="<?php _e(site_url('/jtmenu/vegetarianmenub')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
						</div>											
					</div>
					<div class="row">
						<div class="col-sm-4">
							<a href="<?php _e(site_url('/jtmenu/vegetarianmenuc')); ?>">
								<img src="<?php _e(base_url('assets/i/catering-menu/vegan-catering-menu-c.jpg')) ?>" alt="Vegan Catering Menu C" title="Vegan Catering Menu C" class="img-responsive dotooltip" data-toggle="tooltip" data-placement="top" />
							</a>
						</div>						
						<div class="col-sm-8">
							<h3>Vegan Catering Menu C</h3>
							<p>10 Dishes (No Drink) @ $20.00 / pax<br />Drinks available with addition of $1.00 / pax<br />Minimum 30 pax</p>
							<p><a href="<?php _e(site_url('/jtmenu/vegetarianmenuc')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
						</div>											
					</div>
				</div>
				<div id="menu-miniparty-set" class="cateringmenu">
					<h2>Mini Party Sets</h2>
					<div class="row">
						<div class="col-sm-4">
							<a href="<?php _e(site_url('jtmenu/thaicelebration')); ?>">
								<img src="<?php _e(base_url('assets/i/catering-menu/mini-party-sets.jpg')) ?>" alt="Thai Celebration Set Menu" title="Thai Celebration Set Menu" class="img-responsive dotooltip" data-toggle="tooltip" data-placement="top"  />
							</a>
						</div>
						<div class="col-sm-8">
							<h3>Thai Celebration Set (Serves 10 Pax)</h3>
							<p>8 Dishes (No Drink) @ $37.50 / pax
								<br />Food served in disposable trays / containers
								<br />Delivery and self collection available
								<br />Minimum 10 pax for delivery orders
							<p><a href="<?php _e(site_url('/jtmenu/thaicelebration')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
						</div>
					</div>

					<div class="row">
                        <div class="col-sm-4">
                            <a href="<?php _e(site_url('jtmenu/chaiyo')); ?>">
                                <img src="<?php _e(base_url('assets/i/catering-menu/mini-party-sets.jpg')) ?>" alt="Chaiyo Set Menu" title="Chaiyo Set Menu" class="img-responsive dotooltip" data-toggle="tooltip" data-placement="top"  />
                            </a>
                        </div>
                        <div class="col-sm-8">
                            <h3>Chaiyo Set Menu</h3>
                            <p>6 Dishes (No Drink) @ $19.90 / pax
                                <br />Food served in disposable trays / containers
                                <br />Delivery and self collection available
                                <br />Minimum 10 pax for delivery orders
                                <br /><span style="color: #c00; font-weight: bold;">FREE 10 pcs of Thai Coconut Jelly!</span>
                            </p>
                            <p><a href="<?php _e(site_url('/jtmenu/chaiyo')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
                        </div>
					</div>

					<div class="row">
                        <div class="col-sm-4">
                            <a href="<?php _e(site_url('jtmenu/sawasdee')); ?>">
                                <img src="<?php _e(base_url('assets/i/catering-menu/mini-party-sets.jpg')) ?>" alt="Sawasdee Set Menu" title="Sawasdee Set Menu" class="img-responsive dotooltip" data-toggle="tooltip" data-placement="top"  />
                            </a>
                        </div>
                        <div class="col-sm-8">
                            <h3>Sawasdee Set Menu</h3>
                            <p>8 Dishes (No Drink) @ $23.90 / pax
                                <br />Food served in disposable trays / containers
                                <br />Delivery and self collection available
                                <br />Minimum 10 pax for delivery orders
                                <br /><span style="color: #c00; font-weight: bold;">FREE 10 pcs of Thai Coconut Jelly!</span>
                            </p>
                            <p><a href="<?php _e(site_url('/jtmenu/sawasdee')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <a href="<?php _e(site_url('jtmenu/chokdee')); ?>">
                                <img src="<?php _e(base_url('assets/i/catering-menu/mini-party-sets.jpg')) ?>" alt="Chokdee Set Menu" title="Chokdee Set Menu" class="img-responsive dotooltip" data-toggle="tooltip" data-placement="top"  />
                            </a>
                        </div>
                        <div class="col-sm-8">
                            <h3>Chokdee Set Menu</h3>
                            <p>8 Dishes (No Drink) @ $26.90 / pax
                                <br />Food served in disposable trays / containers
                                <br />Delivery and self collection available
                                <br />Minimum 10 pax for delivery orders
                                <br /><span style="color: #c00; font-weight: bold;">FREE 10 pcs of Thai Coconut Jelly!</span>
                            <p><a href="<?php _e(site_url('/jtmenu/chokdee')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
                        </div>
                    </div>

				</div>
				<div id="menu-vegan-miniparty-set" class="cateringmenu">
					<h2>Vegan Mini Party Sets</h2>

					<div class="row">
						<div class="col-sm-4">
							<a href="<?php _e(site_url('jtmenu/chaiyovegan')); ?>">
                                <img src="<?php _e(base_url('assets/i/catering-menu/vegan-mini-party-sets.jpg')) ?>" alt="Chaiyo Vegan Set Menu" title="Chaiyo Vegan Set Menu" class="img-responsive dotooltip" data-toggle="tooltip" data-placement="top"  />
                            </a>
                        </div>
                        <div class="col-sm-8">
                            <h3>Chaiyo Vegan Set Menu</h3>
                            <p>6 Dishes (No Drink) @ $19.90 / pax
                                <br />Food served in disposable trays / containers
                                <br />Delivery and self collection available
                                <br />Minimum 10 pax for delivery orders
                                <br /><span style="color: #c00; font-weight: bold;">FREE 10 pcs of Thai Coconut Jelly!</span>
                            </p>
                            <p><a href="<?php _e(site_url('/jtmenu/chaiyovegan')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <a href="<?php _e(site_url('jtmenu/sawasdeevegan')); ?>">
                                <img src="<?php _e(base_url('assets/i/catering-menu/vegan-mini-party-sets.jpg')) ?>" alt="Sawasdee Vegan Set Menu" title="Sawasdee Vegan Set Menu" class="img-responsive dotooltip" data-toggle="tooltip" data-placement="top"  />
                            </a>
                        </div>
                        <div class="col-sm-8">
                            <h3>Sawasdee Vegan Set Menu</h3>
                            <p>8 Dishes (No Drink) @ $23.90 / pax
                                <br />Food served in disposable trays / containers
                                <br />Delivery and self collection available
                                <br />Minimum 10 pax for delivery orders
                                <br /><span style="color: #c00; font-weight: bold;">FREE 10 pcs of Thai Coconut Jelly!</span>
                            </p>
                            <p><a href="<?php _e(site_url('/jtmenu/sawasdeevegan')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <a href="<?php _e(site_url('jtmenu/chokdeevegan')); ?>">
                                <img src="<?php _e(base_url('assets/i/catering-menu/vegan-mini-party-sets.jpg')) ?>" alt="Chokdee Vegan Set Menu" title="Chokdee Vegan Set Menu" class="img-responsive dotooltip" data-toggle="tooltip" data-placement="top"  />
                            </a>
                        </div>
                        <div class="col-sm-8">
                            <h3>Chokdee Vegan Set Menu</h3>
                            <p>8 Dishes (No Drink) @ $26.90 / pax
                                <br />Food served in disposable trays / containers
                                <br />Delivery and self collection available
                                <br />Minimum 10 pax for delivery orders
                                <br /><span style="color: #c00; font-weight: bold;">FREE 10 pcs of Thai Coconut Jelly!</span>
                            <p><a href="<?php _e(site_url('/jtmenu/chokdeevegan')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
                        </div>
                    </div>

                </div>
				<div id="menu-miniparty-diy" class="cateringmenu">
					<h2>Mini Party DIY Menus</h2>
					<div class="row">
						<div class="col-sm-4">
							<a href="<?php _e(site_url('/jtmenu/minipartyalacarte')); ?>">
								<img src="<?php _e(base_url('assets/i/catering-menu/mini-party-diy.jpg')) ?>" alt="Mini Party DIY Menu" title="Mini Party DIY Menu" class="img-responsive dotooltip" data-toggle="tooltip" data-placement="top"  />
							</a>
						</div>
						<div class="col-sm-8">
							<h3>Mini Party DIY Menu</h3>
							<p>Pick your own dishes and number of servings for each dish<br />Food served in disposable trays / containers<br />Delivery and self collection available<br />Minimum $200 for delivery orders</p>
							<p><a href="<?php _e(site_url('/jtmenu/minipartyalacarte')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
						</div>
					</div>
				</div>
				<div id="menu-bento" class="cateringmenu">
					<h2>Bento Catering Menu</h2>
					<div class="row">
						<div class="col-sm-4">
							<a href="<?php _e(site_url('/jtmenu/bento')); ?>">
								<img src="<?php _e(base_url('assets/i/catering-menu/bento.jpg')) ?>" alt="Bento Set Menu" title="Bento Set Menu" class="img-responsive dotooltip" data-toggle="tooltip" data-placement="top" />
							</a>
						</div>						
						<div class="col-sm-8">
							<h3>Bento Set Menu</h3>
							<p>Pick from our delectable bento boxes choices<br />Food served in disposable bento box, suitable for individual serving<br />Delivery and self collection available<br />Minimum $200 for delivery orders</p>
							<p><a href="<?php _e(site_url('/jtmenu/bento')); ?>" class='btn btn-danger'>View Menu &raquo;</a></p>
						</div>											
					</div>					
				</div>
			</div>			
		</div><!-- /.row -->
	</div><!-- /content -->
</div>
