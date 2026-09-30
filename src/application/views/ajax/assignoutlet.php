<div class="lb-close btn"></div>
<h3>Assign Outlet for <?php _e(formatOrderNum($order)); ?></h3>
<div class="lb-form">
	<p>Select outlet to assign to:</p>
	<p class="assignoutletbuttons">
		<a href="<?php _e(site_url('jtadmin/assignoutlet/' . $order['id'] . "/CW")); ?>">Clover Way</a>
        <a href="<?php _e(site_url('jtadmin/assignoutlet/' . $order['id'] . "/JS")); ?>">JS</a>
		<a href="<?php _e(site_url('jtadmin/assignoutlet/' . $order['id'] . "/SP")); ?>">SingPost</a>
		<a href="<?php _e(site_url('jtadmin/assignoutlet/' . $order['id'] . "/PV")); ?>">Purvis</a>
		<a href="<?php _e(site_url('jtadmin/assignoutlet/' . $order['id'] . "/CK")); ?>">Central Kitchen</a>
	</p>
</div>