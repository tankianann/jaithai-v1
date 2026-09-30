<?php if ( ! defined ( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class CNYMenu extends KA_Controller
{

    public function index ()
    {


    }
    //end index()

    public function cnyjoy()
    {
        $displaydata = array();

        $menu_id = 'CNY2026JOY';
        $menu = getJaiThaiMenu($menu_id);
        $displaydata['menu'] = $menu;

        //initalize display data with some default values
        $displaydata['meta_title'] = "CNY 2026 Catering Singapore: " . $menu['title'] . " @ \$" . sprintf("%.2f", $menu['perpax']) . "/Pax - Jai Thai";
        $displaydata['meta_description'] = $menu['meta_description'];

        //initialize form defaults data with form defaults
        $formdatadefaults = array();

        $formdatadefaults['mixedveg' . JT_VEGCTRL] = JT_REG;
        $formdatadefaults['pineapplerice' . JT_VEGCTRL] = JT_REG;
        $formdatadefaults['eggfriedrice' . JT_VEGCTRL] = JT_REG;
        $formdatadefaults['phadthai' . JT_VEGCTRL] = JT_REG;

        $formdatadefaults['appetizerchoice'] = "Spring Rolls";
        $formdatadefaults['greencurrychoice'] = "Green Curry Chicken";
        $formdatadefaults['fishchoice'] = "Deep Fried Fish Fillet with Pepper & Garlic Sauce";
        $formdatadefaults['ricechoice'] = "Pineapple Rice";
        $formdatadefaults['dessertchoice'] = "Tapioca with Coconut Milk";
        $formdatadefaults['addondrink'] = "No Drink";
        $formdatadefaults['numpax'] = $menu['minorder'];

        if ($this->formSubmitted()) {

            //form submitted

            //retrieve from POST
            $formdata = array();

            $formdata['mixedveg' . JT_VEGCTRL] = $this->input->post('mixedveg' . JT_VEGCTRL);
            $formdata['pineapplerice' . JT_VEGCTRL] = $this->input->post('pineapplerice' . JT_VEGCTRL);
            $formdata['eggfriedrice' . JT_VEGCTRL] = $this->input->post('eggfriedrice' . JT_VEGCTRL);
            $formdata['phadthai' . JT_VEGCTRL] = $this->input->post('phadthai' . JT_VEGCTRL);

            $formdata['appetizerchoice'] = $this->input->post('appetizerchoice');
            $formdata['greencurrychoice'] = $this->input->post('greencurrychoice');
            $formdata['fishchoice'] = $this->input->post('fishchoice');
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
                $this->cart_model->addItem($menu_id, $formdata);

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

    public function cnyfortune()
    {
        $displaydata = array();

        $menu_id = 'CNY2026FORTUNE';
        $menu = getJaiThaiMenu($menu_id);
        $displaydata['menu'] = $menu;

        //initalize display data with some default values
        $displaydata['meta_title'] = "CNY 2026 Catering Singapore: " . $menu['title'] . " @ \$" . sprintf("%.2f", $menu['perpax']) . "/Pax - Jai Thai";
        $displaydata['meta_description'] = $menu['meta_description'];

        //initialize form defaults data with form defaults
        $formdatadefaults = array();

        $formdatadefaults['mixedveg' . JT_VEGCTRL] = JT_REG;
        $formdatadefaults['pineapplerice' . JT_VEGCTRL] = JT_REG;
        $formdatadefaults['eggfriedrice' . JT_VEGCTRL] = JT_REG;
        $formdatadefaults['oliverice' . JT_VEGCTRL] = JT_REG;
        $formdatadefaults['phadthai' . JT_VEGCTRL] = JT_REG;
        $formdatadefaults['friedtanghoon' . JT_VEGCTRL] = JT_REG;

        $formdatadefaults['appetizerchoice'] = "Spring Rolls";
        $formdatadefaults['appetizer2choice'] = "Thai Fish Cake";
        $formdatadefaults['greencurrychoice'] = "Green Curry Chicken";
        $formdatadefaults['fishchoice'] = "Deep Fried Fish Fillet with Pepper & Garlic Sauce";
        $formdatadefaults['chickenchoice'] = "Chicken with Cashew Nut";
        $formdatadefaults['ricechoice'] = "Pineapple Rice";
        $formdatadefaults['noodlechoice'] = "Phad Thai";
        $formdatadefaults['dessertchoice'] = "Tapioca with Coconut Milk";
        $formdatadefaults['addondrink'] = "No Drink";
        $formdatadefaults['numpax'] = $menu['minorder'];

        if ($this->formSubmitted()) {

            //form submitted

            //retrieve from POST
            $formdata = array();

            $formdata['mixedveg' . JT_VEGCTRL] = $this->input->post('mixedveg' . JT_VEGCTRL);
            $formdata['pineappllerice' . JT_VEGCTRL] = $this->input->post('pineapplerice' . JT_VEGCTRL);
            $formdata['eggfriedrice' . JT_VEGCTRL] = $this->input->post('eggfriedrice' . JT_VEGCTRL);
            $formdata['oliverice' . JT_VEGCTRL] = $this->input->post('oliverice' . JT_VEGCTRL);
            $formdata['phadthai' . JT_VEGCTRL] = $this->input->post('phadthai' . JT_VEGCTRL);
            $formdata['friedtanghoon' . JT_VEGCTRL] = $this->input->post('friedtanghoon' . JT_VEGCTRL);

            $formdata['appetizerchoice'] = $this->input->post('appetizerchoice');
            $formdata['appetizer2choice'] = $this->input->post('appetizer2choice');
            $formdata['greencurrychoice'] = $this->input->post('greencurrychoice');
            $formdata['fishchoice'] = $this->input->post('fishchoice');
            $formdata['chickenchoice'] = $this->input->post('chickenchoice');
            $formdata['ricechoice'] = $this->input->post('ricechoice');
            $formdata['noodlechoice'] = $this->input->post('noodlechoice');
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
                $this->cart_model->addItem($menu_id, $formdata);

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

    public function cnyprosperity()
    {
        $displaydata = array();

        $menu_id = 'CNY2026PROSPERITY';
        $menu = getJaiThaiMenu($menu_id);
        $displaydata['menu'] = $menu;

        //initalize display data with some default values
        $displaydata['meta_title'] = "CNY 2026 Catering Singapore: " . $menu['title'] . " @ \$" . sprintf("%.2f", $menu['perpax']) . "/Pax - Jai Thai";
        $displaydata['meta_description'] = $menu['meta_description'];

        //initialize form defaults data with form defaults
        $formdatadefaults = array();

        $formdatadefaults['pineapplerice' . JT_VEGCTRL] = JT_REG;
        $formdatadefaults['eggfriedrice' . JT_VEGCTRL] = JT_REG;
        $formdatadefaults['oliverice' . JT_VEGCTRL] = JT_REG;
        $formdatadefaults['phadthai' . JT_VEGCTRL] = JT_REG;
        $formdatadefaults['friedtanghoon' . JT_VEGCTRL] = JT_REG;

        $formdatadefaults['greencurrychoice'] = "Green Curry Chicken";
        $formdatadefaults['ricechoice'] = "Pineapple Rice";
        $formdatadefaults['noodlechoice'] = "Phad Thai";
        $formdatadefaults['dessertchoice'] = "Tapioca with Coconut Milk";
        $formdatadefaults['addondrink'] = "No Drink";
        $formdatadefaults['numpax'] = $menu['minorder'];

        if ($this->formSubmitted()) {

            //form submitted

            //retrieve from POST
            $formdata = array();

            $formdata['pineapplerice' . JT_VEGCTRL] = $this->input->post('pineapplerice' . JT_VEGCTRL);
            $formdata['eggfriedrice' . JT_VEGCTRL] = $this->input->post('eggfriedrice' . JT_VEGCTRL);
            $formdata['oliverice' . JT_VEGCTRL] = $this->input->post('oliverice' . JT_VEGCTRL);
            $formdata['phadthai' . JT_VEGCTRL] = $this->input->post('phadthai' . JT_VEGCTRL);
            $formdata['friedtanghoon' . JT_VEGCTRL] = $this->input->post('friedtanghoon' . JT_VEGCTRL);

            $formdata['greencurrychoice'] = $this->input->post('greencurrychoice');
            $formdata['ricechoice'] = $this->input->post('ricechoice');
            $formdata['noodlechoice'] = $this->input->post('noodlechoice');
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
                $this->cart_model->addItem($menu_id, $formdata);

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

    public function cnyfamilyset()
    {
        $displaydata = array();

        $menu_id = 'CNY2026FAMILYSET';
        $menu = getJaiThaiMenu($menu_id);
        $displaydata['menu'] = $menu;

        //initalize display data with some default values
        $displaydata['meta_title'] = "CNY 2026 Catering Singapore: " . $menu['title'] . " @ \$" . sprintf("%.2f", $menu['perpax']) . "/Pax - Jai Thai";
        $displaydata['meta_description'] = $menu['meta_description'];

        //initialize form defaults data with form defaults
        $formdatadefaults = array();

        $formdatadefaults['mixedveg' . JT_VEGCTRL] = JT_REG;
        $formdatadefaults['eggfriedrice' . JT_VEGCTRL] = JT_REG;
        $formdatadefaults['pineapplerice' . JT_VEGCTRL] = JT_REG;
        $formdatadefaults['oliverice' . JT_VEGCTRL] = JT_REG;
        $formdatadefaults['friedtanghoon' . JT_VEGCTRL] = JT_REG;
        $formdatadefaults['phadthai' . JT_VEGCTRL] = JT_REG;

        $formdatadefaults['appetizerchoice'] = "Spring Rolls";
        $formdatadefaults['appetizer2choice'] = "Prawn Cake";
        $formdatadefaults['chickenchoice'] = "Green Curry Chicken";
        $formdatadefaults['fishchoice'] = "Deep Fried Fish Fillet with Thai Tamarind Sauce";
        $formdatadefaults['prawnchoice'] = "Stir Fried Prawn with Chilli Paste";
        $formdatadefaults['ricechoice'] = "Egg Fried Rice";
        $formdatadefaults['noodlechoice'] = "Fried Tang Hoon";

        $formdatadefaults['numpax'] = $menu['minorder'];


        if ($this->formSubmitted()) {

            //form submitted

            //retrieve from POST
            $formdata = array();

            $formdata['mixedveg' . JT_VEGCTRL] = $this->input->post('mixedveg' . JT_VEGCTRL);
            $formdata['eggfriedrice' . JT_VEGCTRL] = $this->input->post('eggfriedrice' . JT_VEGCTRL);
            $formdata['pineapplerice' . JT_VEGCTRL] = $this->input->post('pineapplerice' . JT_VEGCTRL);
            $formdata['oliverice' . JT_VEGCTRL] = $this->input->post('oliverice' . JT_VEGCTRL);
            $formdata['friedtanghoon' . JT_VEGCTRL] = $this->input->post('friedtanghoon' . JT_VEGCTRL);
            $formdata['phadthai' . JT_VEGCTRL] = $this->input->post('phadthai' . JT_VEGCTRL);

            $formdata['appetizerchoice'] = $this->input->post('appetizerchoice');
            $formdata['appetizer2choice'] = $this->input->post('appetizer2choice');
            $formdata['chickenchoice'] = $this->input->post('chickenchoice');
            $formdata['fishchoice'] = $this->input->post('fishchoice');
            $formdata['prawnchoice'] = $this->input->post('prawnchoice');
            $formdata['ricechoice'] = $this->input->post('ricechoice');
            $formdata['noodlechoice'] = $this->input->post('noodlechoice');

            $formdata['numpax'] = $this->input->post('numpax');
            $formdata[ 'agreetnc' ] = $this->input->post ( 'agreetnc' );

            //pre validation processsing
            $formdata['numpax'] = intval(trim($formdata['numpax']));

            //validation
            $errors = array();
            if ($formdata['numpax'] < $menu['minorder']) {
                $errors[] = "Minimum order is " . $menu['minorder'] . " pax";
            }
            if ( $formdata[ 'agreetnc' ] != "Y" ) {
                $errors[] = "Please acknowledge and check \"" . $menu[ 'agreetnc' ] . "\"";
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
                $this->cart_model->addItem($menu_id, $formdata);

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

    public function cnyaddons() {

        $displaydata = array();

        //get menu from menu db
        $menu = getJaiThaiMenu('CNY2026ADDONS');
        $displaydata['menu'] = $menu;

        //initalize display data with some default values
        $displaydata['meta_title'] = "CNY 2026 Add On Dishes - Jai Thai Catering";
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
                $this->cart_model->addItem('CNY2026ADDONS', $formdata);

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

    public function yusheng() {

        $displaydata = array();

        //get menu from menu db
        $menu = getJaiThaiMenu('CNY2025YUSHENG');
        $displaydata['menu'] = $menu;

        //initalize display data with some default values
        $displaydata['meta_title'] = "CNY 2025 Prosperity Yusheng - Jai Thai Catering";
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
                $this->cart_model->addItem('CNY2025YUSHENG', $formdata);

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

    public function addupsells ()
    {

        //create the menu order
        $formdata = array ();
        $formdata[ 'agreetnc' ] = 'Y';
        $formdata[ 'yusheng1' ] = $this->uri->segment ( 3 );

        //add to cart
        $this->cart_model->addItem ( 'CNY2024ADDONS', $formdata );

        //display a success message
        $this->successMessage ( "Jai Thai Mango Prosperity Yusheng added to cart." );
        redirect ( 'cart.php' );

    }
}
//end Class