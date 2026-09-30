<div id="content" class="row">
	<div class="col-sm-12">

        <?php CNY_Helper::show_banner(); ?>

		<?php _e(form_open() . formSubmitted()); ?>
			<?php showStatusMessage($this->session->userdata('statusmessage')); ?>
			<?php $this->session->unset_userdata('statusmessage'); ?>

			<div class="row">
				<div class="col-sm-12">

					<h1><?php _e($menu['title']); ?></h1>
					<div class="menudescription"><?php _e($menu['description']); ?></div>

				</div>
			</div><!-- /.row -->

			<div class="row menudishes <?php _e($menu['id']); ?>">
				<div class="col-sm-12">


					<div class="row">

						<?php $menudishes = $menu['dishes']; ?>
						<?php
							$menudisplaycolumns = getMenuDisplayColumns($menu['id']);
							$olclass = '';
							$imgcolclass = '';
							if ($menudisplaycolumns == 1) {
								$olclass = 'col-sm-6';
								$imgcolclass = 'col-sm-6 hidden-xs';
							}
							if ($menudisplaycolumns == 2) {
								$olclass = 'col-md-4 col-sm-6';
								$imgcolclass = 'col-md-4 hidden-sm hidden-xs';
							}
						?>

						<ol class="<?php _e($olclass); ?>">

							<?php foreach ($menudishes as $menudish) : ?>

								<?php if ($menudish['type'] == "fixed") : ?>

									<li class="<?php _e($menudish['type']); ?>">

                                        <?php _e($menudish['label']); ?>

                                        <?php
                                            if (isset($menudish['vegecontrol'])) {
                                                showVegeControl($menudish['vegecontrol'], $formdata[$menudish['vegecontrol']]);
                                            }
                                        ?>
                                        <?php
                                            if (isset($menudish['dishnote'])) {
                                                _e($menudish['dishnote']);
                                            }
                                        ?>
                                    </li>

								<?php elseif ($menudish['type'] == 'pick1') : ?>

									<li class="<?php _e($menudish['type']); ?>"><?php _e($menudish['label']); ?>

										<ul>
											<?php foreach($menudish['choices'] as $choice) :  ?>

												<?php
													if ($formdata[$menudish['controlname']] == $choice['label']) {
														$selected = " checked='checked'";
													}
													else {
														$selected = "";
													}
												?>

												<li>
													<label>
														<input type="radio" name="<?php _e($menudish['controlname']) ?>" value="<?php _e($choice['label']);?>" <?php _e($selected); ?>/>
														<?php _e($choice['label']);?>
													</label>
                                                    <?php
                                                        if (isset($choice['vegecontrol'])) {
                                                            showVegeControl($choice['vegecontrol'], $formdata[$choice['vegecontrol']]);
                                                        }
                                                    ?>
												</li>

											<?php endforeach; //choices ?>

										</ul>

									</li>

								<?php elseif ($menudish['type'] == 'pick2') : ?>



									<li class="<?php _e($menudish['type']); ?>"><?php _e($menudish['label']); ?>

										<ul>
											<?php foreach($menudish['choices'] as $choice) :  ?>

												<?php
													$selected = "";
													foreach($formdata[$menudish['controlname']] as $checkeddish) {
														if ($checkeddish == $choice["label"]) {
															$selected = " checked='checked'";
														}
													}
												?>

												<li>
													<label>
														<input type="checkbox" name="<?php _e($menudish['controlname']) ?>[]" value="<?php _e($choice['label']);?>" <?php _e($selected); ?>/>
														<?php _e($choice['label']);?>
                                                    </label>
                                                    <?php
                                                        if (isset($choice['vegecontrol'])) {
                                                            showVegeControl($choice['vegecontrol'], $formdata[$choice['vegecontrol']]);
                                                        }
                                                    ?>
												</li>

											<?php endforeach; //choices ?>

										</ul>

									</li>

								<?php elseif ($menudish['type'] == 'group') : ?>

									<?php //separator ?>
									</ol><ol class="<?php _e($olclass); ?>" start="<?php _e($menudish['nextnum']) ?>">
								<?php endif; //menudish type ?>

							<?php endforeach; //menudishes ?>
						</ol><!-- /.col -->
						<div class="imgcol <?php _e($imgcolclass); ?>">
							<?php $menuimages = getMenuImages($menu['id']); ?>
							<?php foreach ($menuimages as $image): ?>
								<img src="<?php _e(base_url('assets/i/catering-dishes/' . $image[0])); ?>" alt="<?php _e($image[1]); ?>" title="<?php _e($image[1]); ?>" data-toggle="tooltip" data-placement="left" class="pull-right img-responsive dotooltip" style="max-width: 400px; height: auto;" />
							<?php endforeach; ?>
						</div>
						<div class="clearfix"></div>
					</div><!-- /.row -->



					<?php if (!$menu['hasdrink']): //only delivery orders with no drink will be shown this option?>
						<div class="row">
							<div class="col-sm-12 addondrink">
								<p>Kindly note that there is no drink for this menu.  Drinks can be ordered at $1 per pax.</p>
								<label>Drink choice</label>
								<?php if ($menu['hascontainercharge']): ?>
									<?php _e(selectBoxHelper("PACKET_DRINKS", "addondrink", "addondrink", "textbox w200", $formdata['addondrink'])); ?>
								<?php else: ?>
									<?php _e(selectBoxHelper("ADDON_DRINKS", "addondrink", "addondrink", "textbox w200", $formdata['addondrink'])); ?>
								<?php endif; ?>
							</div>
						</div>
					<?php endif; ?>


				</div>
			</div><!-- /.row menudishes -->


			<div class="clearfix"></div>

			<div class="row tnc">
				<div class="col-sm-12">
					<h4>Terms &amp; Conditions</h4>
					<ul>
						<?php foreach($menu['tnc'] as $tnc): ?>
							<li><?php _e($tnc); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div><!-- /.row tnc -->


			<div class="row menuorderform">
				<div class="col-sm-12">
					<h4>Place Your Order for <?php _e($menu['title']); ?></h4>
					<?php if ($menu['agreetnc']): ?>
						<div class="checkbox">
							<label>
								<input type="checkbox" name="agreetnc" value="Y"> <?php _e($menu['agreetnc']); ?>
							</label>
						</div>
					<?php else: ?>
						<input type="hidden" name="agreetnc" value="Y">
					<?php endif; ?>
					<div>
						<label for="numpax">Number of Guests</label>
						<input id="numpax" type="textbox" name="numpax" value="<?php _e($formdata['numpax']); ?>" class="textbox w50">
						<input id="formsubmit" type="submit" name="formsubmit" value="Add to Cart" class="btn btn-danger">
					</div>
				</div>
			</div><!-- /.row menuorderform -->

		<?php _e(form_close()); ?>


	</div><!-- /content -->
</div>