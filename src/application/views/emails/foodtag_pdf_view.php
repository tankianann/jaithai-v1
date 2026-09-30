<?php
$this->load->helper('dishlabels');
?>
<html>
<head>
    <style>
        @page, body, html {
            margin: 0;
            padding: 0;
        }
        .container {
			margin: 0;
			padding: 0;
            width: 100%;
            border-collapse: collapse;
            max-width: 100%;
		}
        .dish {
            box-sizing: border-box;
            position: relative;
            float: left;
			font-family: Helvetica;
            text-align: center;
            color: #4F250D;
            height: calc(122px * 3);
            width: calc(122px * 6);
            border: 1px dashed #c3c3c3;
            font-size: 1.1em;
            letter-spacing: -0.02em;
			background-size: cover;
            background-position: center left;
		}
		.logo {
            position: absolute;
			top: calc(122px * 0.5);
            margin-left: auto;
            margin-right: auto;
			width: 100%;
		}
		.dishname {
			position: absolute;
			top: calc(122px * 1.4);
			left: 0;
            box-sizing: border-box;
            padding-left: 10%;
            padding-right: 10%;
			width: 80%;
            line-height: 1.1em;
		}
    </style>
</head>
<body>
    <div class="container">
        <?php
        $col = 0;
        $items = $orderdata['items'];
        $items = unserialize($items);
        foreach ($items['items'] as $cartItem):
            foreach ($cartItem['dishes'] as $dish):
                $col++;
                if (is_array($dish)) { $dish = $dish['name']; }
                $dish = dishlabel($dish);
                if ($dish === false) {
                    continue;
                }
            ?>
            <div class="dish">
                <div class="logo">
                    <?php if (in_array ($orderdata['a_assignedoutlet'], array('SP', 'CK'))): ?>
                        <img src="<?php echo site_url(); ?>/assets/images/jaisiam-logo.png" alt="Jai Siam Logo" style="width: 400px; height: auto"/>
                    <?php else: ?>
                        <img src="<?php echo site_url(); ?>/assets/images/jaithai-logo.png" alt="Jai Thai Logo" style="width: 360px; height: auto; margin-top: -30px;"/>
                    <?php endif; ?>
                </div>
                <div class="dishname">
                    <?php echo $dish; ?>
                </div>
            </div>
                <?php if ($col % 3 == 0): ?><div style="clear:both"></div><?php endif; ?>
            <?php
            endforeach;
        endforeach;
        ?>
    </div>
</body>
</html>