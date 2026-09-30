<?php
$readyToEat = new DateTime($orderdata['functiondate'] . " " . $orderdata['timestart']);
$consumedBy = clone $readyToEat;
$consumedBy->modify('+3 hours');

$items = $orderdata['items'];
$items = unserialize($items);
?>
<div style="line-height: 1.3em; text-align: center; font-size: 1.5em; font-family: 'Arial', 'sans-serif'; height: 100%; width: 100%; background-position: center center; background-repeat: no-repeat; background-size: cover; background-image: url(<?php echo site_url() . '/assets/images/timestamp-bkg.jpg'; ?>);">
    <div style="padding-top: 600px;">
        <?php if (in_array ($orderdata['a_assignedoutlet'], array('SP', 'CK'))): ?>
            <img src="<?php _e(site_url() . '/assets/images/jaisiam-logo.png'); ?>" alt="Jai Siam Logo" style="width: 700px; height: auto;"/>
        <?php else: ?>
            <img src="<?php _e(site_url() . '/assets/images/jaithai-logo.png'); ?>" alt="Jai Thai Logo" style="width: 700px; height: auto;"/>
        <?php endif; ?>
    </div>

    <div>
        <div style="margin-top: 130px;"><strong>Catering license no:</strong><br/><?php _e(getLicenseNumber($orderdata)); ?></div>
        <div style="margin-top: 50px;"><strong>Food ready to eat on:</strong><br/><?php echo $readyToEat->format('j F Y \a\t g:i A') ?></div>
        <div style="margin-top: 50px;"><strong>To be consumed by:</strong><br/><?php echo $consumedBy->format('j F Y \a\t g:i A') ?></div>
    </div>

    <div style="font-size: 90%; color: #555;">
        <div style="margin-top: 150px;"><?php _e(formatOrderNum($orderdata)); ?></div>
        <div>Hotline: 8118 3202</div>
    </div>
</div>