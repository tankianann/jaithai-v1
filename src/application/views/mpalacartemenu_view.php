<div id="content" class="row">
	<div class="col-sm-12">

        <?php CNY_Helper::show_banner(); ?>

        <?php _e(form_open() . formSubmitted()); ?>

			<?php showStatusMessage($this->session->userdata('statusmessage')); ?>
			<?php $this->session->unset_userdata('statusmessage'); ?>

			<div class="row">
				<div class="col-sm-12">

					<h1><?php _e($menu['title']); ?></h1>
					<?php if (isset($menu['pdffile'])): ?>
						<div class="pdfdownload"><a target="_blank" href="<?php _e(base_url('assets/menupdf/' . $menu['pdffile'])); ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>  Download Menu PDF</a></div>
					<?php endif; ?>
					<div class="menudescription"><?php _e($menu['description']); ?></div>

                    <?php if ($menu['id'] == "CNYYUSHENG"): ?>
                        <img src="<?php _e(base_url('assets/i/catering-dishes/cny-yusheng.jpg')); ?>" alt="CNY Prosperity Yusheng" class="img-responsive" />
                    <?php else: ?>
                        <img src="<?php _e(base_url('assets/i/catering-dishes/mini-party-ala-carte.jpg')); ?>" alt="Thai Mini Party Takeaway" class="img-responsive" />
                    <?php endif; ?>


				</div>
			</div><!-- /.row -->



			<div class="row menudishes-alacarte">
				<div class="col-sm-12">
					<table>

						<?php $menudishes = $menu['dishes']; ?>
						<?php $dishnum = 1; ?>
						<tr class="headerrow">
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>Dish</td>
							<td>Serves</td>
							<td>Price</td>
							<td>Qty</td>
						</tr>

						<?php foreach ($menudishes as $controlname => $menudish) : ?>

							<?php if ($menudish['type'] == 'group'): ?>

								<?php $dishnum = 1; ?>
								<tr class="<?php _e($controlname); ?>">
									<th colspan="7"><?php _e($menudish['label']); ?></th>
								</tr>

							<?php elseif ($menudish['type'] == 'dish'): ?>

								<tr class="<?php _e($controlname); ?>">
									<?php kidspicy($menudish['spicykid']); ?>
									<td><?php _e($dishnum++); ?></td>
									<?php speciality($menudish['speciality']); ?>
									<td>
                                        <?php _e($menudish['label']); ?>
                                        <?php
                                            if (isset($menudish['vegecontrol'])) {
                                                showVegeControl($controlname . JT_VEGCTRL, $formdata[$controlname . JT_VEGCTRL]);
                                            }
                                        ?>
                                    </td>
									<td>
										<?php
											if ((strstr($controlname, 'tray') !== false) || $controlname == 'dessert3') {
												_e($menudish['serves'] . ' pieces');
											}
											elseif ((strstr($controlname, 'equipment') !== false)) {
												_e($menudish['serves'] . ' set');
											}
											elseif ($controlname == 'special4') {
												_e($menudish['serves'] . ' container');
											}
											else {
												_e($menudish['serves'] .  ' pax');
											}
										?>
									</td>
									<td>$<?php _e($menudish['price']); ?></td>
									<td><?php _e(selectBoxHelper("MPALACARTE_QTY", $controlname, $controlname, "textbox", $formdata[$controlname], $menudish['serves'])); ?></td>
								</tr>

							<?php endif; //menudish type ?>

						<?php endforeach; //menudishes ?>

					</table>
				</div>
			</div><!-- /.row menudishes-alacarte -->

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
						<input id="formsubmit" type="submit" name="formsubmit" value="Add to Cart" class="btn btn-danger">
					</div>
				</div>
			</div><!-- /.row menuorderform -->

		<?php _e(form_close()); ?>


	</div><!-- /content -->
</div>