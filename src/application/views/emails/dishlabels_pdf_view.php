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
		}
        .dish {
            box-sizing: border-box;
            position: relative;
			font-family: Helvetica;
            width: 50%;
            float: left;
            text-align: center;
            color: #4F250D;
            height: 49.5%;
            border: 1px dashed #c3c3c3;
            font-size: 1.5em;
            font-weight: bold;
			background-image: url("<?php echo site_url(); ?>/assets/images/dishlabel-bkg.jpg");
            background-size: cover;
            background-position: center left;
		}
		.logo {
			position: absolute;
			top: 900px;
			left: 0;
			width: 100%;
		}
		.dishname {
			position: absolute;
			top: 1050px;
			left: 0;
            box-sizing: border-box;
            padding-left: 10%;
            padding-right: 10%;
			width: 80%;
		}
    </style>
</head>
<body>
    <table class="container">
        <tr>
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

            <td class="dish">
                <div class="logo">
                    <?php if (in_array ($orderdata['a_assignedoutlet'], array('SP', 'CK'))): ?>
                        <img src="<?php echo site_url(); ?>/assets/images/jaisiam-logo.png" alt="Jai Siam Logo" style="width: 400px; height: auto;"/>
                    <?php else: ?>
                        <img src="<?php echo site_url(); ?>/assets/images/jaithai-logo.png" alt="Jai Thai Logo" style="width: 440px; height: auto;"/>
                    <?php endif; ?>
                </div>
                <div class="dishname">
                    <?php echo $dish; ?>
                </div>
            </td>
            <?php if ($col % 2 == 0): ?></tr><tr><?php endif; ?>
            <?php
            endforeach;
        endforeach;
        ?>
            <?php if ($col % 2 == 1): ?><td class="dish"></td><?php endif; ?>
        </tr>
    </table>
</body>
</html>