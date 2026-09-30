<?php 


function feedbackRating($id, $name, $class, $selected, $labels) {
	
	$controls = "";
	for ($i = 1; $i <= 5; $i++) {
		$checked = "";
		if ($selected == $i) {
			$checked = " checked='checked'";
		}
		$controls .= "<td><input type='radio' id='$id-$i' name='$name' class='$class' value='$i' $checked/></td>";
	}

	$retval = "<table class='feedbackrating'>";
	$retval .= "<tr><td></td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td></td></tr>";
	$retval .= "<tr><td class='w100'>" . $labels[0] . "</td>" . $controls . "<td class='w100'>" . $labels[1] . "</td></tr>";
	$retval .= "</table>";
	
	return $retval;

}//end feedbackRating()


function feedbackTextArea($id, $name, $class, $value) {

	$retval = "<textarea id='$id' name='$name' class='$class'>" . htmlspecialchars($value). "</textarea>";
	return $retval;

}//end feedbackTextArea()

function feedbackTextBox($id, $name, $class, $value) {

	$retval = "<input id='$id' name='$name' class='$class' value='". htmlspecialchars($value) . "'>";
	return $retval;

}//end feedbackTextBox()


function feedbackYesNo($id, $name, $class, $selected) {
	
	$checked = '';
	if ($selected == "Yes") {
		$checked = " checked='checked'";
	}
	$retval = "<label><input type='radio' id='$id-yes' name='$name' class='$class' value='Yes' $checked/> Yes</label><br />";

	$checked = '';
	if ($selected == "No") {
		$checked = " checked='checked'";
	}
	$retval .= "<label><input type='radio' id='$id-no' name='$name' class='$class' value='No' $checked/> No</label>";
	
	return $retval;

}//end feedbackYesNo()

function feedbackCheckboxes($id, $name, $class, $selected, $labels) {
	
	$retval = array();
	$i = 1;
	foreach($labels as $label) {
		$checked = "";
		if (in_array($label, $selected)) {
			$checked = "checked='checked'";
		}
		$retval[] = "<label><input type='checkbox' id='$id-$i' name='" . $name . "[]' class='$class' value='$label' $checked/> $label</label>";
		$i++;

	}
	return implode("<br />", $retval);

}//end feedbackCheckboxes()
