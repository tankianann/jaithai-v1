<?php 


function getMenuDisplayColumns($id) {
	
	$cols = "";
	switch($id):
	
		case "CATERA": 
		case "CATERB":
		case "CATERC":
		case "CATERD":
		case "VEGEA":
		case "VEGEB":
		case "VEGEC":
		case "VEGED":
        case "MPSET":
		case "MPALACARTE":
		case "BENTO":
        case "CNY15SET":
        case "XMASSET":
			$cols = 1;
			break;

		case "DIYA":
		case "DIYB":
		case "DIYC":
		case "DIYD":
			$cols = 2;
			break;

		
	endswitch;
	
	return $cols; 
	
}

function getMenuImages($id) {
	
	$images = array();
	switch($id):
	
		case "CATERA":
			$images[] = array('prawn-cake.jpg', 'Prawn Cake');
			$images[] = array('phad-thai.jpg', 'Phad Thai');
			break;
					
		case "CATERB":
			$images[] = array('fried-mixed-vegetables.jpg', 'Fried Mixed Vegetables');
			$images[] = array('pandan-chicken.jpg', 'Pandan Chicken');
			$images[] = array('phad-thai.jpg', 'Phad Thai');
			break;
					
		case "CATERC":
			$images[] = array('tom-yum-clear-soup.jpg', 'Tom Yum Clear Soup');
			$images[] = array('fried-chicken-cashew-nut.jpg', 'Fried Chicken Cashew Nut');
			$images[] = array('olive-rice.jpg', 'Olive Rice');
			break;
					
		case "CATERD":
			$images[] = array('mixed-thai-appetizers.jpg', 'Mixed Thai Appetizers');
			$images[] = array('fried-prawn-tamarind-sauce.jpg', 'Fried Prawn with Tamarind Sauce');
			$images[] = array('pineapple-rice.jpg', 'Thai Pineapple Rice');
			break;
					
		case "DIYA":
			$images[] = array('prawn-cake.jpg', 'Prawn Cake');
			$images[] = array('red-curry-chicken.jpg', 'Red Curry Chicken');
			$images[] = array('fried-mixed-vegetables.jpg', 'Fried Mixed Vegetables');
			$images[] = array('fried-tang-hoon.jpg', 'Fried Tang Hoon');
			break;
					
		case "DIYB":
			$images[] = array('fried-prawn-tamarind-sauce.jpg', 'Fried Prawn with Tamarind Sauce');
			$images[] = array('lemon-leaf-chicken.jpg', 'Lemon Leaf Chicken');
			$images[] = array('red-curry-chicken.jpg', 'Red Curry Chicken');
			$images[] = array('olive-rice.jpg', 'Olive Rice');
			break;
					
		case "DIYC":
			$images[] = array('fried-chicken-cashew-nut.jpg', 'Fried Chicken Cashew Nut');
			$images[] = array('tom-yum-clear-soup.jpg', 'Tom Yum Clear Soup');
			$images[] = array('fried-mixed-vegetables.jpg', 'Fried Mixed Vegetables');
			$images[] = array('phad-thai.jpg', 'Phad Thai');
			$images[] = array('pineapple-rice.jpg', 'Thai Pineapple Rice');
			break;
					
		case "DIYD":
			$images[] = array('thai-mango-salad.jpg', 'Thai Mango Salad');
			$images[] = array('fried-prawn-tamarind-sauce.jpg', 'Fried Prawn with Tamarind Sauce');
			$images[] = array('pandan-chicken.jpg', 'Pandan Chicken');
			$images[] = array('red-curry-chicken.jpg', 'Red Curry Chicken');
			$images[] = array('olive-rice.jpg', 'Olive Rice');
			break;
					
		case "VEGEA":
			$images[] = array('fried-mixed-vegetables.jpg', 'Fried Mixed Vegetables');
			$images[] = array('pineapple-rice.jpg', 'Thai Pineapple Rice');
			break;
					
		case "VEGEB":
			$images[] = array('thai-mango-salad.jpg', 'Thai Mango Salad');
			$images[] = array('olive-rice.jpg', 'Olive Rice');
			break;
					
		case "VEGEC":
			$images[] = array('fried-mixed-vegetables.jpg', 'Fried Mixed Vegetables');
			$images[] = array('pineapple-rice.jpg', 'Thai Pineapple Rice');
			break;

		case "VEGED":
			break;
					
		case "MPSET":
			$images[] = array('mixed-thai-appetizers.jpg', 'Mixed Thai Appetizers');
			$images[] = array('phad-thai.jpg', 'Phad Thai');
			break;

        case "CNY15SET":
            $images[] = array('thai-prosperity-yusheng.jpg', 'Jai Thai Mango Prosperity Yusheng with King Topshell');
            $images[] = array('pineapple-rice.jpg', 'Thai Pineapple Rice');
            break;

		case "XMASSET":
        case "MPALACARTE":
        case "BENTO":

    endswitch;
	
	return $images; 
	
	
}

function showVegeControl($controlname, $selection) {

    ?>
        <span class="vegecontrol">
            <select name="<?php _e($controlname) ?>">
                <option value=<?php _e(JT_REG); ?> <?php if ($selection == JT_REG) { _e(" selected='selected'"); } ?>>Regular</option>
                <option value=<?php _e(JT_VEG); ?> <?php if ($selection == JT_VEG) { _e(" selected='selected'"); } ?>>Vegan</option>
            </select>
        </span>
    <?php

}
