<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class JTMenu extends KA_Controller {

	public function index() {
	
	
	}
	//end index()
	
	public function cateringMenuA() {
		
		$displaydata = array();

		//get menu from menu db
		$menu = getJaiThaiMenu('CATERA');
		$displaydata['menu'] = $menu;

		//initalize display data with some default values
		$displaydata['meta_title'] = "Catering Singapore: " . $menu['title'] . " @ \$" . sprintf("%.2f", $menu['perpax']) . "/Pax - Jai Thai";
		$displaydata['meta_description'] = $menu['meta_description'];
	
		//initialize form defaults data with form defaults
		$formdatadefaults = array();

		$formdatadefaults['mixedveg' . JT_VEGCTRL] = JT_REG;
		$formdatadefaults['phadthai' . JT_VEGCTRL] = JT_REG;

		$formdatadefaults['greencurrychoice'] = "Thai Green Curry Chicken";
		$formdatadefaults['dessertchoice'] = "Thai Red Ruby";
		$formdatadefaults['addondrink'] = "No Drink";
		$formdatadefaults['numpax'] = $menu['minorder'];
		
		if ($this->formSubmitted()) {
			
			//form submitted
			
			//retrieve from POST
			$formdata = array();

			$formdata['mixedveg' . JT_VEGCTRL] = $this->input->post('mixedveg' . JT_VEGCTRL);
			$formdata['phadthai' . JT_VEGCTRL] = $this->input->post('phadthai' . JT_VEGCTRL);

			$formdata['greencurrychoice'] = $this->input->post('greencurrychoice');
			$formdata['dessertchoice'] = $this->input->post('dessertchoice');
			$formdata['addondrink'] = $this->input->post('addondrink');
			$formdata['numpax'] = $this->input->post('numpax');

			//pre validation processsing
			$formdata['numpax'] = intval(trim($formdata['numpax']));

			//validation
			$errors = array();
			if ($formdata['numpax'] < $menu['minorder']) { 
				$errors[] = "Minimum order is " . $menu['minorder'] . " pax"; 
			}
			
			//check if validation went thru
			if (sizeof($errors)) {
				
				//there are errors, display them
				$errors = "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
				$this->errorMessage($errors);
				
				//load the values back into the display data and display the form
				$displaydata['formdata'] = $formdata;
				$displaydata['template'] = 'setmenu_view';
				$this->load->view(KA_CITHEME . '/index', $displaydata);
				
			}
			else {
				
				//no errors, process the values

                //unset the JT_REG entries to save cookie space (have to do this after validation
                //- in case of errors, we still need to return the value)
                foreach($formdata as $key => $value) {
                    if ($value == JT_REG) {
                        unset($formdata[$key]);
                    }
                }

				//add to cart
				$this->cart_model->addItem('CATERA', $formdata);

				//display a success message
				$this->successMessage("Menu added to cart.");
				redirect('cart.php');
								
			}
		}
		else {
			
			//form not submitted
			
			//display the form with defaults
			$displaydata['formdata'] = $formdatadefaults;
			$displaydata['template'] = 'setmenu_view';
			$this->load->view(KA_CITHEME . '/index', $displaydata);
			
		}		
	}
	//end cateringMenuA
	
	
	public function cateringMenuB() {

		$displaydata = array();

		//get menu from menu db
		$menu = getJaiThaiMenu('CATERB');
		$displaydata['menu'] = $menu;

		//initalize display data with some default values
		$displaydata['meta_title'] = "Catering Singapore: " . $menu['title'] . " @ \$" . sprintf("%.2f", $menu['perpax']) . "/Pax - Jai Thai";
		$displaydata['meta_description'] = $menu['meta_description'];
	
		//initialize form defaults data with form defaults
		$formdatadefaults = array();

		$formdatadefaults['mixedveg' . JT_VEGCTRL] = JT_REG;
		$formdatadefaults['phadthai' . JT_VEGCTRL] = JT_REG;

		$formdatadefaults['greencurrychoice'] = "Thai Green Curry Chicken";
		$formdatadefaults['dessertchoice'] = "Thai Red Ruby";
		$formdatadefaults['addondrink'] = "No Drink";
		$formdatadefaults['numpax'] = $menu['minorder'];
		
		if ($this->formSubmitted()) {
			
			//form submitted
			
			//retrieve from POST
			$formdata = array();

			$formdata['mixedveg' . JT_VEGCTRL] = $this->input->post('mixedveg' . JT_VEGCTRL);
			$formdata['phadthai' . JT_VEGCTRL] = $this->input->post('phadthai' . JT_VEGCTRL);

			$formdata['greencurrychoice'] = $this->input->post('greencurrychoice');
			$formdata['dessertchoice'] = $this->input->post('dessertchoice');
			$formdata['addondrink'] = $this->input->post('addondrink');
			$formdata['numpax'] = $this->input->post('numpax');
			
			//pre validation processsing
			$formdata['numpax'] = intval(trim($formdata['numpax']));

			//validation
			$errors = array();
			if ($formdata['numpax'] < $menu['minorder']) { 
				$errors[] = "Minimum order is " . $menu['minorder'] . " pax"; 
			}
			
			//check if validation went thru
			if (sizeof($errors)) {
				
				//there are errors, display them
				$errors = "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
				$this->errorMessage($errors);
				
				//load the values back into the display data and display the form
				$displaydata['formdata'] = $formdata;
				$displaydata['template'] = 'setmenu_view';
				$this->load->view(KA_CITHEME . '/index', $displaydata);
				
			}
			else {
				
				//no errors, process the values

                //unset the JT_REG entries to save cookie space (have to do this after validation
                //- in case of errors, we still need to return the value)
                foreach($formdata as $key => $value) {
                    if ($value == JT_REG) {
                        unset($formdata[$key]);
                    }
                }

				//add to cart
				$this->cart_model->addItem('CATERB', $formdata);

				//display a success message
				$this->successMessage("Menu added to cart.");
				redirect('cart.php');
							
			}
		}
		else {
			
			//form not submitted
			
			//display the form with defaults
			$displaydata['formdata'] = $formdatadefaults;
			$displaydata['template'] = 'setmenu_view';
			$this->load->view(KA_CITHEME . '/index', $displaydata);
			
		}		
	}
	//end cateringMenuB


	public function cateringMenuC() {


		$displaydata = array();

		//get menu from menu db
		$menu = getJaiThaiMenu('CATERC');
		$displaydata['menu'] = $menu;

		//initalize display data with some default values
		$displaydata['meta_title'] = "Catering Singapore: " . $menu['title'] . " @ \$" . sprintf("%.2f", $menu['perpax']) . "/Pax - Jai Thai";
		$displaydata['meta_description'] = $menu['meta_description'];
	
		//initialize form defaults data with form defaults
		$formdatadefaults = array();

		$formdatadefaults['mixedveg' . JT_VEGCTRL] = JT_REG;
		$formdatadefaults['phadthai' . JT_VEGCTRL] = JT_REG;
		$formdatadefaults['pineapplerice' . JT_VEGCTRL] = JT_REG;
		$formdatadefaults['oliverice' . JT_VEGCTRL] = JT_REG;

		$formdatadefaults['currysoupchoice'] = "Thai Green Curry Chicken";
		$formdatadefaults['ricechoice'] = "Pineapple Rice";
		$formdatadefaults['dessertchoice'] = "Thai Red Ruby";
		$formdatadefaults['addondrink'] = "No Drink";
		$formdatadefaults['numpax'] = $menu['minorder'];
		
		if ($this->formSubmitted()) {
			
			//form submitted
			
			//retrieve from POST
			$formdata = array();

			$formdata['mixedveg' . JT_VEGCTRL] = $this->input->post('mixedveg' . JT_VEGCTRL);
			$formdata['phadthai' . JT_VEGCTRL] = $this->input->post('phadthai' . JT_VEGCTRL);
			$formdata['pineapplerice' . JT_VEGCTRL] = $this->input->post('pineapplerice' . JT_VEGCTRL);
			$formdata['oliverice' . JT_VEGCTRL] = $this->input->post('oliverice' . JT_VEGCTRL);

			$formdata['currysoupchoice'] = $this->input->post('currysoupchoice');
			$formdata['ricechoice'] = $this->input->post('ricechoice');
			$formdata['dessertchoice'] = $this->input->post('dessertchoice');
			$formdata['addondrink'] = $this->input->post('addondrink');
			$formdata['numpax'] = $this->input->post('numpax');
			
			//pre validation processsing
			$formdata['numpax'] = intval(trim($formdata['numpax']));

			//validation
			$errors = array();
			if ($formdata['numpax'] < $menu['minorder']) { 
				$errors[] = "Minimum order is " . $menu['minorder'] . " pax"; 
			}
			
			//check if validation went thru
			if (sizeof($errors)) {
				
				//there are errors, display them
				$errors = "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
				$this->errorMessage($errors);
				
				//load the values back into the display data and display the form
				$displaydata['formdata'] = $formdata;
				$displaydata['template'] = 'setmenu_view';
				$this->load->view(KA_CITHEME . '/index', $displaydata);
				
			}
			else {
				
				//no errors, process the values

                //unset the JT_REG entries to save cookie space (have to do this after validation
                //- in case of errors, we still need to return the value)
                foreach($formdata as $key => $value) {
                    if ($value == JT_REG) {
                        unset($formdata[$key]);
                    }
                }

				//add to cart
				$this->cart_model->addItem('CATERC', $formdata);

				//display a success message
				$this->successMessage("Menu added to cart.");
				redirect('cart.php');
				
			}
		}
		else {
			
			//form not submitted
			
			//display the form with defaults
			$displaydata['formdata'] = $formdatadefaults;
			$displaydata['template'] = 'setmenu_view';
			$this->load->view(KA_CITHEME . '/index', $displaydata);
			
		}		
	}
	//end cateringMenuC
	
	
	public function cateringMenuD() {

		$displaydata = array();

		//get menu from menu db
		$menu = getJaiThaiMenu('CATERD');
		$displaydata['menu'] = $menu;

		//initalize display data with some default values
		$displaydata['meta_title'] = "Catering Singapore: " . $menu['title'] . " @ \$" . sprintf("%.2f", $menu['perpax']) . "/Pax - Jai Thai";
		$displaydata['meta_description'] = $menu['meta_description'];
	
		//initialize form defaults data with form defaults
		$formdatadefaults = array();

		$formdatadefaults['tomyumchoice'] = "Tom Yum Seafood Clear Soup (Aromatic with Herbal and Spices Taste)";
		$formdatadefaults['broccolichimush' . JT_VEGCTRL] = JT_REG;
		$formdatadefaults['phadthai' . JT_VEGCTRL] = JT_REG;
		$formdatadefaults['pineapplerice' . JT_VEGCTRL] = JT_REG;
		$formdatadefaults['oliverice' . JT_VEGCTRL] = JT_REG;

		$formdatadefaults['ricechoice'] = "Pineapple Rice";
		$formdatadefaults['dessertchoice'] = "Thai Red Ruby";
		$formdatadefaults['addondrink'] = "No Drink";
		$formdatadefaults['numpax'] = $menu['minorder'];

		if ($this->formSubmitted()) {
			
			//form submitted
			
			//retrieve from POST
			$formdata = array();

			$formdata['broccolichimush' . JT_VEGCTRL] = $this->input->post('broccolichimush' . JT_VEGCTRL);
			$formdata['phadthai' . JT_VEGCTRL] = $this->input->post('phadthai' . JT_VEGCTRL);
			$formdata['pineapplerice' . JT_VEGCTRL] = $this->input->post('pineapplerice' . JT_VEGCTRL);
			$formdata['oliverice' . JT_VEGCTRL] = $this->input->post('oliverice' . JT_VEGCTRL);

			$formdata['tomyumchoice'] = $this->input->post('tomyumchoice');
			$formdata['ricechoice'] = $this->input->post('ricechoice');
			$formdata['dessertchoice'] = $this->input->post('dessertchoice');
			$formdata['addondrink'] = $this->input->post('addondrink');
			$formdata['numpax'] = $this->input->post('numpax');
			
			//pre validation processsing
			$formdata['numpax'] = intval(trim($formdata['numpax']));

			//validation
			$errors = array();
			if ($formdata['numpax'] < $menu['minorder']) { 
				$errors[] = "Minimum order is " . $menu['minorder'] . " pax"; 
			}
			
			//check if validation went thru
			if (sizeof($errors)) {
				
				//there are errors, display them
				$errors = "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
				$this->errorMessage($errors);
				
				//load the values back into the display data and display the form
				$displaydata['formdata'] = $formdata;
				$displaydata['template'] = 'setmenu_view';
				$this->load->view(KA_CITHEME . '/index', $displaydata);
				
			}
			else {
				
				//no errors, process the values

                //unset the JT_REG entries to save cookie space (have to do this after validation
                //- in case of errors, we still need to return the value)
                foreach($formdata as $key => $value) {
                    if ($value == JT_REG) {
                        unset($formdata[$key]);
                    }
                }

				//add to cart
				$this->cart_model->addItem('CATERD', $formdata);

				//display a success message
				$this->successMessage("Menu added to cart.");
				redirect('cart.php');
							
			}
		}
		else {
			
			//form not submitted
			
			//display the form with defaults
			$displaydata['formdata'] = $formdatadefaults;
			$displaydata['template'] = 'setmenu_view';
			$this->load->view(KA_CITHEME . '/index', $displaydata);
			
		}		
	}
	//end cateringMenuD


	public function cateringDIYA() {
		
		$displaydata = array();

		//get menu from menu db
		$menu = getJaiThaiMenu('DIYA');
		$displaydata['menu'] = $menu;

		//initalize display data with some default values
		$displaydata['meta_title'] = "Catering Singapore: " . $menu['title'] . " @ \$" . sprintf("%.2f", $menu['perpax']) . "/Pax - Jai Thai";
		$displaydata['meta_description'] = $menu['meta_description'];
		
		//initialize form defaults data with form defaults
		$formdatadefaults = array();

		$formdatadefaults['mixedveg' . JT_VEGCTRL] = JT_REG;
		$formdatadefaults['phadthai' . JT_VEGCTRL] = JT_REG;

		$formdatadefaults['fishchoice'] = "Deep Fried Fish with Thai Chilli Sauce";
		$formdatadefaults['currychoice'] = "Thai Red Curry";
		$formdatadefaults['ricechoice'] = "Steamed Rice";
		$formdatadefaults['dessertchoice'] = "Thai Red Ruby";
		$formdatadefaults['drinkchoice'] = "Lime Juice";
		$formdatadefaults['numpax'] = $menu['minorder'];

		if ($this->formSubmitted()) {
			
			//form submitted
			
			//retrieve from POST
			$formdata = array();

			$formdata['mixedveg' . JT_VEGCTRL] = $this->input->post('mixedveg' . JT_VEGCTRL);
			$formdata['phadthai' . JT_VEGCTRL] = $this->input->post('phadthai' . JT_VEGCTRL);

			$formdata['fishchoice'] = $this->input->post('fishchoice');
			$formdata['currychoice'] = $this->input->post('currychoice');
			$formdata['ricechoice'] = $this->input->post('ricechoice');
			$formdata['dessertchoice'] = $this->input->post('dessertchoice');
			$formdata['drinkchoice'] = $this->input->post('drinkchoice');
			$formdata['numpax'] = $this->input->post('numpax');

			//pre validation processsing
			$formdata['numpax'] = intval(trim($formdata['numpax']));
			//validation
			$errors = array();
			if ($formdata['numpax'] < $menu['minorder']) { 
				$errors[] = "Minimum order is " . $menu['minorder'] . " pax"; 
			}
			
			//check if validation went thru
			if (sizeof($errors)) {
				
				//there are errors, display them
				$errors = "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
				$this->errorMessage($errors);
				
				//load the values back into the display data and display the form
				$displaydata['formdata'] = $formdata;
				$displaydata['template'] = 'setmenu_view';
				$this->load->view(KA_CITHEME . '/index', $displaydata);
				
			}
			else {
				
				//no errors, process the values

                //unset the JT_REG entries to save cookie space (have to do this after validation
                //- in case of errors, we still need to return the value)
                foreach($formdata as $key => $value) {
                    if ($value == JT_REG) {
                        unset($formdata[$key]);
                    }
                }
				
				//add to cart
				$this->cart_model->addItem('DIYA', $formdata);

				//display a success message
				$this->successMessage("Menu added to cart.");
				redirect('cart.php');
				
			}
		}
		else {
			
			//form not submitted
			
			//display the form with defaults
			$displaydata['formdata'] = $formdatadefaults;
			$displaydata['template'] = 'setmenu_view';
			$this->load->view(KA_CITHEME . '/index', $displaydata);
			
		}		
	}
	//end cateringDIYA


	public function cateringDIYB() {
		
		$displaydata = array();

		//get menu from menu db
		$menu = getJaiThaiMenu('DIYB');
		$displaydata['menu'] = $menu;

		//initalize display data with some default values
		$displaydata['meta_title'] = "Catering Singapore: " . $menu['title'] . " @ \$" . sprintf("%.2f", $menu['perpax']) . "/Pax - Jai Thai";
		$displaydata['meta_description'] = $menu['meta_description'];
		
		//initialize form defaults data with form defaults
		$formdatadefaults = array();

		$formdatadefaults['mixedveg' . JT_VEGCTRL] = JT_REG;
		$formdatadefaults['phadthai' . JT_VEGCTRL] = JT_REG;
		$formdatadefaults['tanghoon' . JT_VEGCTRL] = JT_REG;
		$formdatadefaults['tomyumbeehoon' . JT_VEGCTRL] = JT_REG;
		$formdatadefaults['beehoon' . JT_VEGCTRL] = JT_REG;

		$formdatadefaults['fishchoice'] = "Deep Fried Fish with Thai Chilli Sauce";
		$formdatadefaults['currychoice'] = "Thai Red Curry";
		$formdatadefaults['chickenchoice'] = "Fried Chicken with Basil Leaf";
		$formdatadefaults['noodlechoice'] = "Phad Thai";
		$formdatadefaults['ricechoice'] = "Steamed Rice";
		$formdatadefaults['dessertchoice'] = "Thai Red Ruby";
		$formdatadefaults['drinkchoice'] = "Lime Juice";
		$formdatadefaults['numpax'] = $menu['minorder'];

		if ($this->formSubmitted()) {
			
			//form submitted
			
			//retrieve from POST
			$formdata = array();

			$formdata['mixedveg' . JT_VEGCTRL] = $this->input->post('mixedveg' . JT_VEGCTRL);
			$formdata['phadthai' . JT_VEGCTRL] = $this->input->post('phadthai' . JT_VEGCTRL);
			$formdata['tanghoon' . JT_VEGCTRL] = $this->input->post('tanghoon' . JT_VEGCTRL);
			$formdata['tomyumbeehoon' . JT_VEGCTRL] = $this->input->post('tomyumbeehoon' . JT_VEGCTRL);
			$formdata['beehoon' . JT_VEGCTRL] = $this->input->post('beehoon' . JT_VEGCTRL);

			$formdata['fishchoice'] = $this->input->post('fishchoice');
			$formdata['currychoice'] = $this->input->post('currychoice');
			$formdata['chickenchoice'] = $this->input->post('chickenchoice');
			$formdata['noodlechoice'] = $this->input->post('noodlechoice');
			$formdata['ricechoice'] = $this->input->post('ricechoice');
			$formdata['dessertchoice'] = $this->input->post('dessertchoice');
			$formdata['drinkchoice'] = $this->input->post('drinkchoice');
			$formdata['numpax'] = $this->input->post('numpax');

			//pre validation processsing
			$formdata['numpax'] = intval(trim($formdata['numpax']));
			//validation
			$errors = array();
			if ($formdata['numpax'] < $menu['minorder']) { 
				$errors[] = "Minimum order is " . $menu['minorder'] . " pax"; 
			}
			
			//check if validation went thru
			if (sizeof($errors)) {
				
				//there are errors, display them
				$errors = "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
				$this->errorMessage($errors);
				
				//load the values back into the display data and display the form
				$displaydata['formdata'] = $formdata;
				$displaydata['template'] = 'setmenu_view';
				$this->load->view(KA_CITHEME . '/index', $displaydata);
				
			}
			else {
				
				//no errors, process the values

                //unset the JT_REG entries to save cookie space (have to do this after validation
                //- in case of errors, we still need to return the value)
                foreach($formdata as $key => $value) {
                    if ($value == JT_REG) {
                        unset($formdata[$key]);
                    }
                }
				
				//add to cart
				$this->cart_model->addItem('DIYB', $formdata);

				//display a success message
				$this->successMessage("Menu added to cart.");
				redirect('cart.php');
								
			}
		}
		else {
			
			//form not submitted
			
			//display the form with defaults
			$displaydata['formdata'] = $formdatadefaults;
			$displaydata['template'] = 'setmenu_view';
			$this->load->view(KA_CITHEME . '/index', $displaydata);
			
		}		
	}
	//end cateringDIYB


	public function cateringDIYC() {

		$displaydata = array();

		//get menu from menu db
		$menu = getJaiThaiMenu('DIYC');
		$displaydata['menu'] = $menu;

		//initalize display data with some default values
		$displaydata['meta_title'] = "Catering Singapore: " . $menu['title'] . " @ \$" . sprintf("%.2f", $menu['perpax']) . "/Pax - Jai Thai";
		$displaydata['meta_description'] = $menu['meta_description'];
		
		//initialize form defaults data with form defaults
		$formdatadefaults = array();

		$formdatadefaults['mixedveg' . JT_VEGCTRL] = JT_REG;
		$formdatadefaults['phadthai' . JT_VEGCTRL] = JT_REG;
		$formdatadefaults['tanghoon' . JT_VEGCTRL] = JT_REG;
		$formdatadefaults['tomyumbeehoon' . JT_VEGCTRL] = JT_REG;
		$formdatadefaults['beehoon' . JT_VEGCTRL] = JT_REG;
		$formdatadefaults['pineapplerice' . JT_VEGCTRL] = JT_REG;
		$formdatadefaults['oliverice' . JT_VEGCTRL] = JT_REG;
		$formdatadefaults['tomyumfriedrice' . JT_VEGCTRL] = JT_REG;

		$formdatadefaults['saladchoice'] = "Mango Salad";
		$formdatadefaults['fishchoice'] = "Deep Fried Fish with Thai Chilli Sauce";
		$formdatadefaults['tomyumchoice'] = "Tom Yum Seafood Clear Soup (Aromatic with Herbal and Spices Taste)";
		$formdatadefaults['chickenchoice'] = "Fried Chicken with Basil Leaf";
		$formdatadefaults['prawnchoice'] = "Fried Prawn with Chilli Paste";
		$formdatadefaults['noodlechoice'] = "Phad Thai";
		$formdatadefaults['ricechoice'] = "Pineapple Rice";
		$formdatadefaults['dessertchoice'] = "Thai Red Ruby";
		$formdatadefaults['drinkchoice'] = "Lime Juice";
		$formdatadefaults['numpax'] = $menu['minorder'];

		if ($this->formSubmitted()) {
			
			//form submitted
			
			//retrieve from POST
			$formdata = array();

			$formdata['mixedveg' . JT_VEGCTRL] = $this->input->post('mixedveg' . JT_VEGCTRL);
			$formdata['phadthai' . JT_VEGCTRL] = $this->input->post('phadthai' . JT_VEGCTRL);
			$formdata['tanghoon' . JT_VEGCTRL] = $this->input->post('tanghoon' . JT_VEGCTRL);
			$formdata['tomyumbeehoon' . JT_VEGCTRL] = $this->input->post('tomyumbeehoon' . JT_VEGCTRL);
			$formdata['beehoon' . JT_VEGCTRL] = $this->input->post('beehoon' . JT_VEGCTRL);
			$formdata['pineapplerice' . JT_VEGCTRL] = $this->input->post('pineapplerice' . JT_VEGCTRL);
			$formdata['oliverice' . JT_VEGCTRL] = $this->input->post('oliverice' . JT_VEGCTRL);
			$formdata['tomyumfriedrice' . JT_VEGCTRL] = $this->input->post('tomyumfriedrice' . JT_VEGCTRL);

			$formdata['saladchoice'] = $this->input->post('saladchoice');
			$formdata['fishchoice'] = $this->input->post('fishchoice');
			$formdata['tomyumchoice'] = $this->input->post('tomyumchoice');
			$formdata['chickenchoice'] = $this->input->post('chickenchoice');
			$formdata['prawnchoice'] = $this->input->post('prawnchoice');
			$formdata['noodlechoice'] = $this->input->post('noodlechoice');
			$formdata['ricechoice'] = $this->input->post('ricechoice');
			$formdata['dessertchoice'] = $this->input->post('dessertchoice');
			$formdata['drinkchoice'] = $this->input->post('drinkchoice');
			$formdata['numpax'] = $this->input->post('numpax');

			//pre validation processsing
			$formdata['numpax'] = intval(trim($formdata['numpax']));
			//validation
			$errors = array();
			if ($formdata['numpax'] < $menu['minorder']) { 
				$errors[] = "Minimum order is " . $menu['minorder'] . " pax"; 
			}
			
			//check if validation went thru
			if (sizeof($errors)) {
				
				//there are errors, display them
				$errors = "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
				$this->errorMessage($errors);
				
				//load the values back into the display data and display the form
				$displaydata['formdata'] = $formdata;
				$displaydata['template'] = 'setmenu_view';
				$this->load->view(KA_CITHEME . '/index', $displaydata);
				
			}
			else {
				
				//no errors, process the values

                //unset the JT_REG entries to save cookie space (have to do this after validation
                //- in case of errors, we still need to return the value)
                foreach($formdata as $key => $value) {
                    if ($value == JT_REG) {
                        unset($formdata[$key]);
                    }
                }
				
				//add to cart
				$this->cart_model->addItem('DIYC', $formdata);

				//display a success message
				$this->successMessage("Menu added to cart.");
				redirect('cart.php');
								
			}
		}
		else {
			
			//form not submitted
			
			//display the form with defaults
			$displaydata['formdata'] = $formdatadefaults;
			$displaydata['template'] = 'setmenu_view';
			$this->load->view(KA_CITHEME . '/index', $displaydata);
			
		}		
	}
	//end cateringDIYC


	public function cateringDIYD() {
		
		$displaydata = array();

		//get menu from menu db
		$menu = getJaiThaiMenu('DIYD');
		$displaydata['menu'] = $menu;

		//initalize display data with some default values
		$displaydata['meta_title'] = "Catering Singapore: " . $menu['title'] . " @ \$" . sprintf("%.2f", $menu['perpax']) . "/Pax - Jai Thai";
		$displaydata['meta_description'] = $menu['meta_description'];
		
		//initialize form defaults data with form defaults
		$formdatadefaults = array();

		$formdatadefaults['broccolichimush' . JT_VEGCTRL] = JT_REG;
		$formdatadefaults['phadthai' . JT_VEGCTRL] = JT_REG;
		$formdatadefaults['pineapplerice' . JT_VEGCTRL] = JT_REG;
		$formdatadefaults['oliverice' . JT_VEGCTRL] = JT_REG;
		$formdatadefaults['tomyumfriedrice' . JT_VEGCTRL] = JT_REG;

		$formdatadefaults['saladchoice'] = "Mango Salad";
		$formdatadefaults['fishchoice'] = "Deep Fried Fish with Thai Chilli Sauce";
		$formdatadefaults['tomyumchoice'] = "Tom Yum Seafood Clear Soup (Aromatic with Herbal and Spices Taste)";
		$formdatadefaults['chickenchoice'] = "Fried Chicken with Basil Leaf";
		$formdatadefaults['prawnchoice'] = "Fried Prawn with Chilli Paste";
		$formdatadefaults['squidchoice'] = "Fried Squid with Chilli Paste";
		$formdatadefaults['ricechoice'] = "Pineapple Rice";
		$formdatadefaults['dessertchoice'] = "Thai Red Ruby";
		$formdatadefaults['drinkchoice'] = "Lime Juice";
		$formdatadefaults['numpax'] = $menu['minorder'];

		if ($this->formSubmitted()) {
			
			//form submitted
			
			//retrieve from POST
			$formdata = array();

			$formdata['broccolichimush' . JT_VEGCTRL] = $this->input->post('broccolichimush' . JT_VEGCTRL);
			$formdata['phadthai' . JT_VEGCTRL] = $this->input->post('phadthai' . JT_VEGCTRL);
			$formdata['pineapplerice' . JT_VEGCTRL] = $this->input->post('pineapplerice' . JT_VEGCTRL);
			$formdata['oliverice' . JT_VEGCTRL] = $this->input->post('oliverice' . JT_VEGCTRL);
			$formdata['tomyumfriedrice' . JT_VEGCTRL] = $this->input->post('tomyumfriedrice' . JT_VEGCTRL);

			$formdata['saladchoice'] = $this->input->post('saladchoice');
			$formdata['fishchoice'] = $this->input->post('fishchoice');
			$formdata['tomyumchoice'] = $this->input->post('tomyumchoice');
			$formdata['chickenchoice'] = $this->input->post('chickenchoice');
			$formdata['prawnchoice'] = $this->input->post('prawnchoice');
			$formdata['squidchoice'] = $this->input->post('squidchoice');
			$formdata['ricechoice'] = $this->input->post('ricechoice');
			$formdata['dessertchoice'] = $this->input->post('dessertchoice');
			$formdata['drinkchoice'] = $this->input->post('drinkchoice');
			$formdata['numpax'] = $this->input->post('numpax');

			//pre validation processsing
			$formdata['numpax'] = intval(trim($formdata['numpax']));
			//validation
			$errors = array();
			if ($formdata['numpax'] < $menu['minorder']) { 
				$errors[] = "Minimum order is " . $menu['minorder'] . " pax"; 
			}
			
			//check if validation went thru
			if (sizeof($errors)) {
				
				//there are errors, display them
				$errors = "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
				$this->errorMessage($errors);
				
				//load the values back into the display data and display the form
				$displaydata['formdata'] = $formdata;
				$displaydata['template'] = 'setmenu_view';
				$this->load->view(KA_CITHEME . '/index', $displaydata);
				
			}
			else {
				
				//no errors, process the values

                //unset the JT_REG entries to save cookie space (have to do this after validation
                //- in case of errors, we still need to return the value)
                foreach($formdata as $key => $value) {
                    if ($value == JT_REG) {
                        unset($formdata[$key]);
                    }
                }

				//add to cart
				$this->cart_model->addItem('DIYD', $formdata);

				//display a success message
				$this->successMessage("Menu added to cart.");
				redirect('cart.php');
				
			}
		}
		else {
			
			//form not submitted
			
			//display the form with defaults
			$displaydata['formdata'] = $formdatadefaults;
			$displaydata['template'] = 'setmenu_view';
			$this->load->view(KA_CITHEME . '/index', $displaydata);
			
		}		
	}
	//end cateringDIYD


	public function vegetarianMenuA() {

		$displaydata = array();

		//get menu from menu db
		$menu = getJaiThaiMenu('VEGEA');
		$displaydata['menu'] = $menu;

		//initalize display data with some default values
		$displaydata['meta_title'] = "Vegan Catering Singapore: " . $menu['title'] . " @ \$" . sprintf("%.2f", $menu['perpax']) . "/Pax - Jai Thai";
		$displaydata['meta_description'] = $menu['meta_description'];
	
		//initialize form defaults data with form defaults
		$formdatadefaults = array();
		$formdatadefaults['dessertchoice'] = "Thai Red Ruby";
		$formdatadefaults['addondrink'] = "No Drink";
		$formdatadefaults['numpax'] = $menu['minorder'];
		
		if ($this->formSubmitted()) {
			
			//form submitted
			
			//retrieve from POST
			$formdata = array();
			$formdata['dessertchoice'] = $this->input->post('dessertchoice');
			$formdata['addondrink'] = $this->input->post('addondrink');
			$formdata['numpax'] = $this->input->post('numpax');
			
			//pre validation processsing
			$formdata['numpax'] = intval(trim($formdata['numpax']));
			
			//validation
			$errors = array();
			if ($formdata['numpax'] < $menu['minorder']) { 
				$errors[] = "Minimum order is " . $menu['minorder'] . " pax"; 
			}
			
			//check if validation went thru
			if (sizeof($errors)) {
				
				//there are errors, display them
				$errors = "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
				$this->errorMessage($errors);
				
				//load the values back into the display data and display the form
				$displaydata['formdata'] = $formdata;
				$displaydata['template'] = 'setmenu_view';
				$this->load->view(KA_CITHEME . '/index', $displaydata);
				
			}
			else {
				
				//no errors, process the values
				//call some model to process the data here

				//add to cart
				$this->cart_model->addItem('VEGEA', $formdata);

				//display a success message
				$this->successMessage("Menu added to cart.");
				redirect('cart.php');
				
			}
		}
		else {
			
			//form not submitted
			
			//display the form with defaults
			$displaydata['formdata'] = $formdatadefaults;
			$displaydata['template'] = 'setmenu_view';
			$this->load->view(KA_CITHEME . '/index', $displaydata);
			
		}
	}
	//end vegetarianMenuA


	public function vegetarianMenuB() {

		$displaydata = array();

		//get menu from menu db
		$menu = getJaiThaiMenu('VEGEB');
		$displaydata['menu'] = $menu;

		//initalize display data with some default values
		$displaydata['meta_title'] = "Vegan Catering Singapore: " . $menu['title'] . " @ \$" . sprintf("%.2f", $menu['perpax']) . "/Pax - Jai Thai";
		$displaydata['meta_description'] = $menu['meta_description'];
	
		//initialize form defaults data with form defaults
		$formdatadefaults = array();
		$formdatadefaults['dessertchoice'] = "Thai Red Ruby";
		$formdatadefaults['addondrink'] = "No Drink";
		$formdatadefaults['numpax'] = $menu['minorder'];
		
		if ($this->formSubmitted()) {
			
			//form submitted
			
			//retrieve from POST
			$formdata = array();
			$formdata['dessertchoice'] = $this->input->post('dessertchoice');
			$formdata['addondrink'] = $this->input->post('addondrink');
			$formdata['numpax'] = $this->input->post('numpax');
			
			//pre validation processsing
			$formdata['numpax'] = intval(trim($formdata['numpax']));
			
			//validation
			$errors = array();
			if ($formdata['numpax'] < $menu['minorder']) { 
				$errors[] = "Minimum order is " . $menu['minorder'] . " pax"; 
			}
			
			//check if validation went thru
			if (sizeof($errors)) {
				
				//there are errors, display them
				$errors = "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
				$this->errorMessage($errors);
				
				//load the values back into the display data and display the form
				$displaydata['formdata'] = $formdata;
				$displaydata['template'] = 'setmenu_view';
				$this->load->view(KA_CITHEME . '/index', $displaydata);
				
			}
			else {
				
				//no errors, process the values
				//call some model to process the data here

				//add to cart
				$this->cart_model->addItem('VEGEB', $formdata);

				//display a success message
				$this->successMessage("Menu added to cart.");
				redirect('cart.php');
				
			}
		}
		else {
			
			//form not submitted
			
			//display the form with defaults
			$displaydata['formdata'] = $formdatadefaults;
			$displaydata['template'] = 'setmenu_view';
			$this->load->view(KA_CITHEME . '/index', $displaydata);
			
		}
	}//end vegetarianMenuB


	public function vegetarianMenuC() {
		

		$displaydata = array();

		//get menu from menu db
		$menu = getJaiThaiMenu('VEGEC');
		$displaydata['menu'] = $menu;

		//initalize display data with some default values
		$displaydata['meta_title'] = "Vegan Catering Singapore: " . $menu['title'] . " @ \$" . sprintf("%.2f", $menu['perpax']) . "/Pax - Jai Thai";
		$displaydata['meta_description'] = $menu['meta_description'];
	
		//initialize form defaults data with form defaults
		$formdatadefaults = array();
		$formdatadefaults['vegetablechoice'] = "Vegan Fried Mixed Vegetable";
		$formdatadefaults['noodlechoice'] = "Vegan Phad Thai";
		$formdatadefaults['ricechoice'] = "Vegan Pineapple Rice";
		$formdatadefaults['dessertchoice'] = "Thai Red Ruby";
		$formdatadefaults['addondrink'] = "No Drink";
		$formdatadefaults['numpax'] = $menu['minorder'];
		
		if ($this->formSubmitted()) {
			
			//form submitted
			
			//retrieve from POST
			$formdata = array();
			$formdata['vegetablechoice'] = $this->input->post('vegetablechoice');
			$formdata['noodlechoice'] = $this->input->post('noodlechoice');
			$formdata['ricechoice'] = $this->input->post('ricechoice');
			$formdata['dessertchoice'] = $this->input->post('dessertchoice');
			$formdata['addondrink'] = $this->input->post('addondrink');
			$formdata['numpax'] = $this->input->post('numpax');
			
			//pre validation processsing
			$formdata['numpax'] = intval(trim($formdata['numpax']));
			
			//validation
			$errors = array();
			if ($formdata['numpax'] < $menu['minorder']) { 
				$errors[] = "Minimum order is " . $menu['minorder'] . " pax"; 
			}
			
			//check if validation went thru
			if (sizeof($errors)) {
				
				//there are errors, display them
				$errors = "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
				$this->errorMessage($errors);
				
				//load the values back into the display data and display the form
				$displaydata['formdata'] = $formdata;
				$displaydata['template'] = 'setmenu_view';
				$this->load->view(KA_CITHEME . '/index', $displaydata);
				
			}
			else {
				
				//no errors, process the values
				//call some model to process the data here

				//add to cart
				$this->cart_model->addItem('VEGEC', $formdata);

				//display a success message
				$this->successMessage("Menu added to cart.");
				redirect('cart.php');
				
			}
		}
		else {
			
			//form not submitted
			
			//display the form with defaults
			$displaydata['formdata'] = $formdatadefaults;
			$displaydata['template'] = 'setmenu_view';
			$this->load->view(KA_CITHEME . '/index', $displaydata);
			
		}	
	}//end vegetarianMenuC
	

	public function vegetarianMenuD() {
		$displaydata = array();

		$menu = getJaiThaiMenu('VEGED');
		$displaydata['menu'] = $menu;
		$displaydata['meta_title'] = "Vegan Catering Singapore: " . $menu['title'] . " @ \$" . sprintf("%.2f", $menu['perpax']) . "/Pax - Jai Thai";
		$displaydata['meta_description'] = $menu['meta_description'];

		$formdatadefaults = array();
		$formdatadefaults['saladchoice'] = "Vegan Mango Salad";
		$formdatadefaults['tomyumchoice'] = "Tom Yum Vegan Clear Soup (Aromatic with Herbal and Spices Taste)";
		$formdatadefaults['vegetablechoice'] = "Vegan Fried Mixed Vegetable";
		$formdatadefaults['noodlechoice'] = "Vegan Phad Thai";
		$formdatadefaults['ricechoice'] = "Vegan Pineapple Rice";
		$formdatadefaults['dessertchoice'] = "Thai Red Ruby";
		$formdatadefaults['addondrink'] = "No Drink";
		$formdatadefaults['numpax'] = $menu['minorder'];

		if ($this->formSubmitted()) {
			$formdata = array();
			$formdata['saladchoice'] = $this->input->post('saladchoice');
			$formdata['tomyumchoice'] = $this->input->post('tomyumchoice');
			$formdata['vegetablechoice'] = $this->input->post('vegetablechoice');
			$formdata['noodlechoice'] = $this->input->post('noodlechoice');
			$formdata['ricechoice'] = $this->input->post('ricechoice');
			$formdata['dessertchoice'] = $this->input->post('dessertchoice');
			$formdata['addondrink'] = $this->input->post('addondrink');
			$formdata['numpax'] = intval(trim($this->input->post('numpax')));

			$errors = array();
			if ($formdata['numpax'] < $menu['minorder']) {
				$errors[] = "Minimum order is " . $menu['minorder'] . " pax";
			}

			if (sizeof($errors)) {
				$errors = "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
				$this->errorMessage($errors);
				$displaydata['formdata'] = $formdata;
				$displaydata['template'] = 'setmenu_view';
				$this->load->view(KA_CITHEME . '/index', $displaydata);
			}
			else {
				$this->cart_model->addItem('VEGED', $formdata);
				$this->successMessage("Menu added to cart.");
				redirect('cart.php');
			}
		}
		else {
			$displaydata['formdata'] = $formdatadefaults;
			$displaydata['template'] = 'setmenu_view';
			$this->load->view(KA_CITHEME . '/index', $displaydata);
		}
	}//end vegetarianMenuD

	
	public function miniPartySet() {
		

		$displaydata = array();

		//get menu from menu db
		$menu = getJaiThaiMenu('MPSET');
		$displaydata['menu'] = $menu;

		//initalize display data with some default values
		$displaydata['meta_title'] = "Mini Parties and Corporate Takeaways Package @ $10.00 Per Person - Jai Thai Catering";
		$displaydata['meta_description'] = $menu['meta_description'];
	
		//initialize form defaults data with form defaults
		$formdatadefaults = array();

        $formdatadefaults['phadthai' . JT_VEGCTRL] = "Regular";
        $formdatadefaults['pineapplerice' . JT_VEGCTRL] = "Regular";

        $formdatadefaults['greencurrychoice'] = "Green Curry Chicken";
		$formdatadefaults['addondrink'] = "No Drink";
		$formdatadefaults['numpax'] = $menu['minorder'];
		
		if ($this->formSubmitted()) {
			
			//form submitted
			
			//retrieve from POST
			$formdata = array();

            $formdata['phadthai' . JT_VEGCTRL] = $this->input->post('phadthai' . JT_VEGCTRL);
            $formdata['pineapplerice' . JT_VEGCTRL] = $this->input->post('pineapplerice' . JT_VEGCTRL);

            $formdata['greencurrychoice'] = $this->input->post('greencurrychoice');
			$formdata['addondrink'] = $this->input->post('addondrink');
			$formdata['numpax'] = $this->input->post('numpax');
			$formdata['agreetnc']  = $this->input->post('agreetnc');
			
			//pre validation processsing
			$formdata['numpax'] = intval(trim($formdata['numpax']));
			
			//validation
			$errors = array();
			 
			if ($formdata['numpax'] < $menu['minorder']) { 
				$errors[] = "Minimum order is " . $menu['minorder'] . " pax"; 
			}

			if ($formdata['agreetnc'] != "Y") { 
				$errors[] = "Please acknowledge and check \"" . $menu['agreetnc'] . "\""; 
			}
			
			
			
			//check if validation went thru
			if (sizeof($errors)) {
				
				//there are errors, display them
				$errors = "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
				$this->errorMessage($errors);
				
				//load the values back into the display data and display the form
				$displaydata['formdata'] = $formdata;
				$displaydata['template'] = 'setmenu_view';
				$this->load->view(KA_CITHEME . '/index', $displaydata);
				
			}
			else {
				
				//no errors, process the values

                //unset the JT_REG entries to save cookie space (have to do this after validation
                //- in case of errors, we still need to return the value)
                foreach($formdata as $key => $value) {
                    if ($value == JT_REG) {
                        unset($formdata[$key]);
                    }
                }

				//add to cart
				$this->cart_model->addItem('MPSET', $formdata);

				//display a success message
				$this->successMessage("Menu added to cart.");
				redirect('cart.php');
								
			}
		}
		else {
			
			//form not submitted
			
			//display the form with defaults
			$displaydata['formdata'] = $formdatadefaults;
			$displaydata['template'] = 'setmenu_view';
			$this->load->view(KA_CITHEME . '/index', $displaydata);
			
		}	
	}//end miniPartySet

	public function miniPartyAlaCarte() {
		
		$displaydata = array();

		//get menu from menu db
		$menu = getJaiThaiMenu('MPALACARTE');
		$displaydata['menu'] = $menu;

		//initalize display data with some default values
		$displaydata['meta_title'] = "Mini Party and Potluck Catering Ala Carte Menu - Jai Thai Catering";
		$displaydata['meta_description'] = $menu['meta_description'];
		
		//initialize form defaults data with form defaults
		$formdatadefaults = array();
		$menudishes = $menu['dishes'];
		foreach ($menudishes as $controlname => $menudish) {
			if ($menudish['type'] == "dish") {
				$formdatadefaults[$controlname] = "0";
			}
            if (isset($menudish['vegecontrol'])) {
                $formdatadefaults[$controlname . JT_VEGCTRL] = JT_REG;
            }
		}

		if ($this->formSubmitted()) {
			
			//form submitted
			
			//retrieve from POST
			$formdata = array();
			$formdata['agreetnc']  = $this->input->post('agreetnc');
			foreach($menudishes as $controlname => $menudish) {
				if ($menudish['type'] == "dish") {
					$formdata[$controlname] = $this->input->post($controlname);
				}
                if (isset($menudish['vegecontrol'])) {
                    $formdata[$controlname . JT_VEGCTRL] = $this->input->post($controlname . JT_VEGCTRL);
                }
			}

			//pre validation processsing
			$foodprice = 0.00;
			$numcontainers = 0;
			foreach ($menudishes as $controlname => $menudish) {
				if ($menudish['type'] == "dish") {
					if ($formdata[$controlname] > 0) {
						$foodprice += $formdata[$controlname] * $menudish['price'];
						$numcontainers++; 
					}
				}
			}
			
			//validation
			$errors = array(); 
			if ($formdata['agreetnc'] != "Y") { 
				$errors[] = "Please acknowledge and check \"" . $menu['agreetnc'] . "\""; 
			}
			/* 
			if (!$this->cart_model->hitMinimumOrder()) {
				//for mpalacarte, if one of the items in the cart has already hit the minimum order, then no need to check for minimum order
				if ($foodprice < $menu['minorder']) { 
					$errors[] = "Minimum order is $" . $menu['minorder']; 
				}
			}	
			*/
			 
			//check if validation went thru
			if (sizeof($errors)) {
				
				//there are errors, display them
				$errors = "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
				$this->errorMessage($errors);
				
				//load the values back into the display data and display the form
				$displaydata['formdata'] = $formdata;
				$displaydata['template'] = 'mpalacartemenu_view';
				$this->load->view(KA_CITHEME . '/index', $displaydata);
				
			}
			else {
				
				//no errors, process the values

                //unset the JT_REG entries to save cookie space (have to do this after validation
                //- in case of errors, we still need to return the value)
                foreach($formdata as $key => $value) {
                    if ($value == JT_REG) {
                        unset($formdata[$key]);
                    }
                }

				//add to cart
				$this->cart_model->addItem('MPALACARTE', $formdata);

				//display a success message
				$this->successMessage("Menu added to cart.");
				redirect('cart.php');
				
			}
		}
		else {
			
			//form not submitted
			
			//display the form with defaults
			$displaydata['formdata'] = $formdatadefaults;
			$displaydata['template'] = 'mpalacartemenu_view';
			$this->load->view(KA_CITHEME . '/index', $displaydata);
			
		}				
		
	}
	//end miniPartyAlaCarte
	
	
	public function bento() {
		
		$displaydata = array();

		//get menu from menu db
		$menu = getJaiThaiMenu('BENTO');
		$displaydata['menu'] = $menu;

		//initalize display data with some default values
		$displaydata['meta_title'] = "Bento Set Catering Singapore - Jai Thai Catering";
		$displaydata['meta_description'] = $menu['meta_description'];
		
		//initialize form defaults data with form defaults
		$formdatadefaults = array();
		$menudishes = $menu['dishes'];
		foreach ($menudishes as $controlname => $menudish) {
			if ($menudish['type'] == "dish") {
				$formdatadefaults[$controlname] = "0";
			}
		}

		if ($this->formSubmitted()) {
			
			//form submitted
			
			//retrieve from POST
			$formdata = array();
			$formdata['agreetnc']  = $this->input->post('agreetnc');
			foreach($menudishes as $controlname => $menudish) {
				if ($menudish['type'] == "dish") {
					$formdata[$controlname] = $this->input->post($controlname);
				}				
			}

			//pre validation processsing
			$foodprice = 0.00;
			foreach ($menudishes as $controlname => $menudish) {
				if ($menudish['type'] == "dish") {
					if ($formdata[$controlname] > 0) {
						$foodprice += $formdata[$controlname] * $menudish['price'];
					}
				}
			}
			
			//validation
			$errors = array();
			if ($formdata['agreetnc'] != "Y") { 
				$errors[] = "Please acknowledge and check \"" . $menu['agreetnc'] . "\""; 
			}
			/* 
			if (!$this->cart_model->hitMinimumOrder()) {
				//for mpalacarte, if one of the items in the cart has already hit the minimum order, then no need to check for minimum order
				if ($foodprice < $menu['minorder']) { 
					$errors[] = "Minimum order is $" . $menu['minorder']; 
				}
			}
			*/
			
			//check if validation went thru
			if (sizeof($errors)) {
				
				//there are errors, display them
				$errors = "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
				$this->errorMessage($errors);
				
				//load the values back into the display data and display the form
				$displaydata['formdata'] = $formdata;
				$displaydata['template'] = 'bentomenu_view';
				$this->load->view(KA_CITHEME . '/index', $displaydata);
				
			}
			else {
				
				//no errors, process the values
				//call some model to process the data here
				
				//add to cart
				$this->cart_model->addItem('BENTO', $formdata);

				//display a success message
				$this->successMessage("Menu added to cart.");
				redirect('cart.php');
				
			}
		}
		else {
			
			//form not submitted
			
			//display the form with defaults
			$displaydata['formdata'] = $formdatadefaults;
			$displaydata['template'] = 'bentomenu_view';
			$this->load->view(KA_CITHEME . '/index', $displaydata);
			
		}		
	}
	//end bento	


	public function sanook() {

		$displaydata = array();

		//get menu from menu db
		$menu = getJaiThaiMenu('SANOOK');
		$displaydata['menu'] = $menu;

		//initalize display data with some default values
		$displaydata['meta_title'] = "SaNook Set - Easy Self Collection Mini Party Set - Jai Thai Catering";
		$displaydata['meta_description'] = $menu['meta_description'];

		//initialize form defaults data with form defaults
		$formdatadefaults = array();
		$menudishes = $menu['dishes'];
		foreach ($menudishes as $controlname => $menudish) {
			if ($menudish['type'] == "dish") {
				$formdatadefaults[$controlname] = "0";
			}
		}

		if ($this->formSubmitted()) {

			//form submitted

			//retrieve from POST
			$formdata = array();
			$formdata['agreetnc']  = $this->input->post('agreetnc');
			foreach($menudishes as $controlname => $menudish) {
				if ($menudish['type'] == "dish") {
					$formdata[$controlname] = $this->input->post($controlname);
				}
			}

			//pre validation processsing
			$foodprice = 0.00;
			foreach ($menudishes as $controlname => $menudish) {
				if ($menudish['type'] == "dish") {
					if ($formdata[$controlname] > 0) {
						$foodprice += $formdata[$controlname] * $menudish['price'];
					}
				}
			}

			//validation
			$errors = array();
			if ($formdata['agreetnc'] != "Y") {
				$errors[] = "Please acknowledge and check \"" . $menu['agreetnc'] . "\"";
			}

			if ($foodprice < $menu['minorder']) {
				$errors[] = "Minimum order is 1 set";
			}

			//check if validation went thru
			if (sizeof($errors)) {

				//there are errors, display them
				$errors = "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
				$this->errorMessage($errors);

				//load the values back into the display data and display the form
				$displaydata['formdata'] = $formdata;
				$displaydata['template'] = 'sanookmenu_view';
				$this->load->view(KA_CITHEME . '/index', $displaydata);

			}
			else {

				//no errors, process the values
				//call some model to process the data here

				//add to cart
				$this->cart_model->addItem('SANOOK', $formdata);

				//display a success message
				$this->successMessage("Menu added to cart.");
				redirect('cart.php');

			}
		}
		else {

			//form not submitted

			//display the form with defaults
			$displaydata['formdata'] = $formdatadefaults;
			$displaydata['template'] = 'sanookmenu_view';
			$this->load->view(KA_CITHEME . '/index', $displaydata);

		}
	}
	//end sanook

    public function chaiyo() {

        $displaydata = array();

        //get menu from menu db
        $menu = getJaiThaiMenu('CHAIYO');
        $displaydata['menu'] = $menu;

        //initalize display data with some default values
        $displaydata['meta_title'] = "Chaiyo Set - Easy Self Collection Mini Party Set - Jai Thai Catering";
        $displaydata['meta_description'] = $menu['meta_description'];

        //initialize form defaults data with form defaults
        $formdatadefaults = array();

        $formdatadefaults['mixedveg' . JT_VEGCTRL] = JT_REG;
        $formdatadefaults['pineapplerice' . JT_VEGCTRL] = JT_REG;
        $formdatadefaults['oliverice' . JT_VEGCTRL] = JT_REG;

        $formdatadefaults['fishchoice'] = "Deep Fried Fish Fillet with Sweet & Sour Sauce";
        $formdatadefaults['greencurrychoice'] = "Green Curry Chicken";
        $formdatadefaults['addondrink'] = "No Drink";
        $formdatadefaults['numpax'] = $menu['minorder'];

        if ($this->formSubmitted()) {

            //form submitted

            //retrieve from POST
            $formdata = array();

            $formdata['mixedveg' . JT_VEGCTRL] = $this->input->post('mixedveg' . JT_VEGCTRL);
            $formdata['pineapplerice' . JT_VEGCTRL] = $this->input->post('pineapplerice' . JT_VEGCTRL);
            $formdata['oliverice' . JT_VEGCTRL] = $this->input->post('oliverice' . JT_VEGCTRL);

            $formdata['fishchoice'] = $this->input->post('fishchoice');
            $formdata['greencurrychoice'] = $this->input->post('greencurrychoice');
            $formdata['addondrink'] = $this->input->post('addondrink');
            $formdata['numpax'] = $this->input->post('numpax');

            $formdata['agreetnc']  = $this->input->post('agreetnc');

            //pre validation processsing
            $formdata['numpax'] = intval(trim($formdata['numpax']));

            //validation
            $errors = array();
            if ($formdata['numpax'] < $menu['minorder']) {
                $errors[] = "Minimum order is " . $menu['minorder'] . " pax";
            }
            if ($formdata['agreetnc'] != "Y") {
                $errors[] = "Please acknowledge and check \"" . $menu['agreetnc'] . "\"";
            }

            //check if validation went thru
            if (sizeof($errors)) {

                //there are errors, display them
                $errors = "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
                $this->errorMessage($errors);

                //load the values back into the display data and display the form
                $displaydata['formdata'] = $formdata;
                $displaydata['template'] = 'setmenu_view';
                $this->load->view(KA_CITHEME . '/index', $displaydata);

            }
            else {

                //no errors, process the values

                //unset the JT_REG entries to save cookie space (have to do this after validation
                //- in case of errors, we still need to return the value)
                foreach($formdata as $key => $value) {
                    if ($value == JT_REG) {
                        unset($formdata[$key]);
                    }
                }

                //add to cart
                $this->cart_model->addItem('CHAIYO', $formdata);

                //display a success message
                $this->successMessage("Menu added to cart.");
                redirect('cart.php');

            }
        }
        else {

            //form not submitted

            //display the form with defaults
            $displaydata['formdata'] = $formdatadefaults;
            $displaydata['template'] = 'setmenu_view';
            $this->load->view(KA_CITHEME . '/index', $displaydata);

        }
    }
    public function chaiyovegan() {

        $displaydata = array();

        //get menu from menu db
        $menu = getJaiThaiMenu('CHAIYOVEGAN');
        $displaydata['menu'] = $menu;

        //initalize display data with some default values
        $displaydata['meta_title'] = "Chaiyo Vegan Set - Easy Self Collection Mini Party Set - Jai Thai Catering";
        $displaydata['meta_description'] = $menu['meta_description'];

        //initialize form defaults data with form defaults
        $formdatadefaults = array();

        $formdatadefaults['beancurdchoice'] = "Fried Bean Curd with Basil Leaf";
        $formdatadefaults['addondrink'] = "No Drink";
        $formdatadefaults['numpax'] = $menu['minorder'];

        if ($this->formSubmitted()) {

            //form submitted

            //retrieve from POST
            $formdata = array();

            $formdata['beancurdchoice'] = $this->input->post('beancurdchoice');
            $formdata['addondrink'] = $this->input->post('addondrink');
            $formdata['numpax'] = $this->input->post('numpax');

            $formdata['agreetnc']  = $this->input->post('agreetnc');

            //pre validation processsing
            $formdata['numpax'] = intval(trim($formdata['numpax']));

            //validation
            $errors = array();
            if ($formdata['numpax'] < $menu['minorder']) {
                $errors[] = "Minimum order is " . $menu['minorder'] . " pax";
            }
            if ($formdata['agreetnc'] != "Y") {
                $errors[] = "Please acknowledge and check \"" . $menu['agreetnc'] . "\"";
            }

            //check if validation went thru
            if (sizeof($errors)) {

                //there are errors, display them
                $errors = "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
                $this->errorMessage($errors);

                //load the values back into the display data and display the form
                $displaydata['formdata'] = $formdata;
                $displaydata['template'] = 'setmenu_view';
                $this->load->view(KA_CITHEME . '/index', $displaydata);

            }
            else {

                //no errors, process the values

                //unset the JT_REG entries to save cookie space (have to do this after validation
                //- in case of errors, we still need to return the value)
                foreach($formdata as $key => $value) {
                    if ($value == JT_REG) {
                        unset($formdata[$key]);
                    }
                }

                //add to cart
                $this->cart_model->addItem('CHAIYOVEGAN', $formdata);

                //display a success message
                $this->successMessage("Menu added to cart.");
                redirect('cart.php');

            }
        }
        else {

            //form not submitted

            //display the form with defaults
            $displaydata['formdata'] = $formdatadefaults;
            $displaydata['template'] = 'setmenu_view';
            $this->load->view(KA_CITHEME . '/index', $displaydata);

        }
    }

    public function sawasdee() {

        $displaydata = array();

        //get menu from menu db
        $menu = getJaiThaiMenu('SAWASDEE');
        $displaydata['menu'] = $menu;

        //initalize display data with some default values
        $displaydata['meta_title'] = "Sawasdee Set - Easy Self Collection Mini Party Set - Jai Thai Catering";
        $displaydata['meta_description'] = $menu['meta_description'];

        //initialize form defaults data with form defaults
        $formdatadefaults = array();

        $formdatadefaults['pineapplerice' . JT_VEGCTRL] = JT_REG;
        $formdatadefaults['phadthai' . JT_VEGCTRL] = JT_REG;

        $formdatadefaults['fishchoice'] = "Deep Fried Fish Fillet with Tamarind Sauce";
        $formdatadefaults['greencurrychoice'] = "Green Curry Chicken";
        $formdatadefaults['addondrink'] = "No Drink";
        $formdatadefaults['numpax'] = $menu['minorder'];

        if ($this->formSubmitted()) {

            //form submitted

            //retrieve from POST
            $formdata = array();

            $formdata['mixedveg' . JT_VEGCTRL] = $this->input->post('mixedveg' . JT_VEGCTRL);
            $formdata['pineapplerice' . JT_VEGCTRL] = $this->input->post('pineapplerice' . JT_VEGCTRL);
            $formdata['phadthai' . JT_VEGCTRL] = $this->input->post('phadthai' . JT_VEGCTRL);

            $formdata['fishchoice'] = $this->input->post('fishchoice');
            $formdata['greencurrychoice'] = $this->input->post('greencurrychoice');
            $formdata['addondrink'] = $this->input->post('addondrink');
            $formdata['numpax'] = $this->input->post('numpax');

            $formdata['agreetnc']  = $this->input->post('agreetnc');

            //pre validation processsing
            $formdata['numpax'] = intval(trim($formdata['numpax']));

            //validation
            $errors = array();
            if ($formdata['numpax'] < $menu['minorder']) {
                $errors[] = "Minimum order is " . $menu['minorder'] . " pax";
            }
            if ($formdata['agreetnc'] != "Y") {
                $errors[] = "Please acknowledge and check \"" . $menu['agreetnc'] . "\"";
            }

            //check if validation went thru
            if (sizeof($errors)) {

                //there are errors, display them
                $errors = "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
                $this->errorMessage($errors);

                //load the values back into the display data and display the form
                $displaydata['formdata'] = $formdata;
                $displaydata['template'] = 'setmenu_view';
                $this->load->view(KA_CITHEME . '/index', $displaydata);

            }
            else {

                //no errors, process the values

                //unset the JT_REG entries to save cookie space (have to do this after validation
                //- in case of errors, we still need to return the value)
                foreach($formdata as $key => $value) {
                    if ($value == JT_REG) {
                        unset($formdata[$key]);
                    }
                }

                //add to cart
                $this->cart_model->addItem('SAWASDEE', $formdata);

                //display a success message
                $this->successMessage("Menu added to cart.");
                redirect('cart.php');

            }
        }
        else {

            //form not submitted

            //display the form with defaults
            $displaydata['formdata'] = $formdatadefaults;
            $displaydata['template'] = 'setmenu_view';
            $this->load->view(KA_CITHEME . '/index', $displaydata);

        }
    }

    public function sawasdeevegan() {

        $displaydata = array();

        //get menu from menu db
        $menu = getJaiThaiMenu('SAWASDEEVEGAN');
        $displaydata['menu'] = $menu;

        //initalize display data with some default values
        $displaydata['meta_title'] = "Sawasdee Vegan Set - Easy Self Collection Mini Party Set - Jai Thai Catering";
        $displaydata['meta_description'] = $menu['meta_description'];

        //initialize form defaults data with form defaults
        $formdatadefaults = array();

        $formdatadefaults['beancurdchoice'] = "Fried Bean Curd with Basil Leaf";
        $formdatadefaults['addondrink'] = "No Drink";
        $formdatadefaults['numpax'] = $menu['minorder'];

        if ($this->formSubmitted()) {

            //form submitted

            //retrieve from POST
            $formdata = array();

            $formdata['beancurdchoice'] = $this->input->post('beancurdchoice');
            $formdata['addondrink'] = $this->input->post('addondrink');
            $formdata['numpax'] = $this->input->post('numpax');

            $formdata['agreetnc']  = $this->input->post('agreetnc');

            //pre validation processsing
            $formdata['numpax'] = intval(trim($formdata['numpax']));

            //validation
            $errors = array();
            if ($formdata['numpax'] < $menu['minorder']) {
                $errors[] = "Minimum order is " . $menu['minorder'] . " pax";
            }
            if ($formdata['agreetnc'] != "Y") {
                $errors[] = "Please acknowledge and check \"" . $menu['agreetnc'] . "\"";
            }

            //check if validation went thru
            if (sizeof($errors)) {

                //there are errors, display them
                $errors = "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
                $this->errorMessage($errors);

                //load the values back into the display data and display the form
                $displaydata['formdata'] = $formdata;
                $displaydata['template'] = 'setmenu_view';
                $this->load->view(KA_CITHEME . '/index', $displaydata);

            }
            else {

                //no errors, process the values

                //unset the JT_REG entries to save cookie space (have to do this after validation
                //- in case of errors, we still need to return the value)
                foreach($formdata as $key => $value) {
                    if ($value == JT_REG) {
                        unset($formdata[$key]);
                    }
                }

                //add to cart
                $this->cart_model->addItem('SAWASDEEVEGAN', $formdata);

                //display a success message
                $this->successMessage("Menu added to cart.");
                redirect('cart.php');

            }
        }
        else {

            //form not submitted

            //display the form with defaults
            $displaydata['formdata'] = $formdatadefaults;
            $displaydata['template'] = 'setmenu_view';
            $this->load->view(KA_CITHEME . '/index', $displaydata);

        }
    }

    public function chokdee() {

        $displaydata = array();

        //get menu from menu db
        $menu = getJaiThaiMenu('CHOKDEE');
        $displaydata['menu'] = $menu;

        //initalize display data with some default values
        $displaydata['meta_title'] = "Chokdee Set - Easy Self Collection Mini Party Set - Jai Thai Catering";
        $displaydata['meta_description'] = $menu['meta_description'];

        //initialize form defaults data with form defaults
        $formdatadefaults = array();

        $formdatadefaults['pineapplerice' . JT_VEGCTRL] = JT_REG;
        $formdatadefaults['tanghoon' . JT_VEGCTRL] = JT_REG;

        $formdatadefaults['fishchoice'] = "Deep Fried Fish Fillet with Tamarind Sauce";
        $formdatadefaults['tomyumchoice'] = "Tom Yum Seafood Soup (Clear Soup)";
        $formdatadefaults['addondrink'] = "No Drink";
        $formdatadefaults['numpax'] = $menu['minorder'];

        if ($this->formSubmitted()) {

            //form submitted

            //retrieve from POST
            $formdata = array();

            $formdata['pineapplerice' . JT_VEGCTRL] = $this->input->post('pineapplerice' . JT_VEGCTRL);
            $formdata['tanghoon' . JT_VEGCTRL] = $this->input->post('tanghoon' . JT_VEGCTRL);

            $formdata['fishchoice'] = $this->input->post('fishchoice');
            $formdata['tomyumchoice'] = $this->input->post('tomyumchoice');
            $formdata['addondrink'] = $this->input->post('addondrink');
            $formdata['numpax'] = $this->input->post('numpax');

            $formdata['agreetnc']  = $this->input->post('agreetnc');

            //pre validation processsing
            $formdata['numpax'] = intval(trim($formdata['numpax']));

            //validation
            $errors = array();
            if ($formdata['numpax'] < $menu['minorder']) {
                $errors[] = "Minimum order is " . $menu['minorder'] . " pax";
            }
            if ($formdata['agreetnc'] != "Y") {
                $errors[] = "Please acknowledge and check \"" . $menu['agreetnc'] . "\"";
            }

            //check if validation went thru
            if (sizeof($errors)) {

                //there are errors, display them
                $errors = "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
                $this->errorMessage($errors);

                //load the values back into the display data and display the form
                $displaydata['formdata'] = $formdata;
                $displaydata['template'] = 'setmenu_view';
                $this->load->view(KA_CITHEME . '/index', $displaydata);

            }
            else {

                //no errors, process the values

                //unset the JT_REG entries to save cookie space (have to do this after validation
                //- in case of errors, we still need to return the value)
                foreach($formdata as $key => $value) {
                    if ($value == JT_REG) {
                        unset($formdata[$key]);
                    }
                }

                //add to cart
                $this->cart_model->addItem('CHOKDEE', $formdata);

                //display a success message
                $this->successMessage("Menu added to cart.");
                redirect('cart.php');

            }
        }
        else {

            //form not submitted

            //display the form with defaults
            $displaydata['formdata'] = $formdatadefaults;
            $displaydata['template'] = 'setmenu_view';
            $this->load->view(KA_CITHEME . '/index', $displaydata);

        }
    }

    public function chokdeevegan() {

        $displaydata = array();

        //get menu from menu db
        $menu = getJaiThaiMenu('CHOKDEEVEGAN');
        $displaydata['menu'] = $menu;

        //initalize display data with some default values
        $displaydata['meta_title'] = "Chokdee Vegan Set - Easy Self Collection Mini Party Set - Jai Thai Catering";
        $displaydata['meta_description'] = $menu['meta_description'];

        //initialize form defaults data with form defaults
        $formdatadefaults = array();

        $formdatadefaults['beancurdchoice'] = "Fried Bean Curd with Basil Leaf";
        $formdatadefaults['addondrink'] = "No Drink";
        $formdatadefaults['numpax'] = $menu['minorder'];

        if ($this->formSubmitted()) {

            //form submitted

            //retrieve from POST
            $formdata = array();

            $formdata['beancurdchoice'] = $this->input->post('beancurdchoice');
            $formdata['addondrink'] = $this->input->post('addondrink');
            $formdata['numpax'] = $this->input->post('numpax');

            $formdata['agreetnc']  = $this->input->post('agreetnc');

            //pre validation processsing
            $formdata['numpax'] = intval(trim($formdata['numpax']));

            //validation
            $errors = array();
            if ($formdata['numpax'] < $menu['minorder']) {
                $errors[] = "Minimum order is " . $menu['minorder'] . " pax";
            }
            if ($formdata['agreetnc'] != "Y") {
                $errors[] = "Please acknowledge and check \"" . $menu['agreetnc'] . "\"";
            }

            //check if validation went thru
            if (sizeof($errors)) {

                //there are errors, display them
                $errors = "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
                $this->errorMessage($errors);

                //load the values back into the display data and display the form
                $displaydata['formdata'] = $formdata;
                $displaydata['template'] = 'setmenu_view';
                $this->load->view(KA_CITHEME . '/index', $displaydata);

            }
            else {

                //no errors, process the values

                //unset the JT_REG entries to save cookie space (have to do this after validation
                //- in case of errors, we still need to return the value)
                foreach($formdata as $key => $value) {
                    if ($value == JT_REG) {
                        unset($formdata[$key]);
                    }
                }

                //add to cart
                $this->cart_model->addItem('CHOKDEEVEGAN', $formdata);

                //display a success message
                $this->successMessage("Menu added to cart.");
                redirect('cart.php');

            }
        }
        else {

            //form not submitted

            //display the form with defaults
            $displaydata['formdata'] = $formdatadefaults;
            $displaydata['template'] = 'setmenu_view';
            $this->load->view(KA_CITHEME . '/index', $displaydata);

        }
    }

    public function thaicelebration() {


        $displaydata = array();

        //get menu from menu db
        $menu = getJaiThaiMenu('THAICELEBRATION');
        $displaydata['menu'] = $menu;

        //initalize display data with some default values
        $displaydata['meta_title'] = "Delicious Thai Catering Set for 10 Pax @ $37.50 Per Person - Jai Thai Catering";
        $displaydata['meta_description'] = $menu['meta_description'];

        //initialize form defaults data with form defaults
        $formdatadefaults = array();

        $formdatadefaults['cabbage' . JT_VEGCTRL] = "Regular";
        $formdatadefaults['tofu' . JT_VEGCTRL] = "Regular";

        $formdatadefaults['addondrink'] = "No Drink";
        $formdatadefaults['numpax'] = $menu['minorder'];

        if ($this->formSubmitted()) {

            //form submitted

            //retrieve from POST
            $formdata = array();

            $formdata['cabbage' . JT_VEGCTRL] = $this->input->post('cabbage' . JT_VEGCTRL);
            $formdata['tofu' . JT_VEGCTRL] = $this->input->post('tofu' . JT_VEGCTRL);

            $formdata['addondrink'] = $this->input->post('addondrink');
            $formdata['numpax'] = $this->input->post('numpax');
            $formdata['agreetnc']  = $this->input->post('agreetnc');

            //pre validation processsing
            $formdata['numpax'] = intval(trim($formdata['numpax']));

            //validation
            $errors = array();

            if ($formdata['numpax'] < $menu['minorder']) {
                $errors[] = "Minimum order is " . $menu['minorder'] . " pax";
            }

            if ($formdata['agreetnc'] != "Y") {
                $errors[] = "Please acknowledge and check \"" . $menu['agreetnc'] . "\"";
            }



            //check if validation went thru
            if (sizeof($errors)) {

                //there are errors, display them
                $errors = "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
                $this->errorMessage($errors);

                //load the values back into the display data and display the form
                $displaydata['formdata'] = $formdata;
                $displaydata['template'] = 'setmenu_view';
                $this->load->view(KA_CITHEME . '/index', $displaydata);

            }
            else {

                //no errors, process the values

                //unset the JT_REG entries to save cookie space (have to do this after validation
                //- in case of errors, we still need to return the value)
                foreach($formdata as $key => $value) {
                    if ($value == JT_REG) {
                        unset($formdata[$key]);
                    }
                }

                //add to cart
                $this->cart_model->addItem('THAICELEBRATION', $formdata);

                //display a success message
                $this->successMessage("Menu added to cart.");
                redirect('cart.php');

            }
        }
        else {

            //form not submitted

            //display the form with defaults
            $displaydata['formdata'] = $formdatadefaults;
            $displaydata['template'] = 'setmenu_view';
            $this->load->view(KA_CITHEME . '/index', $displaydata);

        }
    }//end thaicelebration


}
//end Class
