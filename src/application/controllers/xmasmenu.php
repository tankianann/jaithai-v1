<?php if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Xmasmenu extends KA_Controller
{

    public function index()
    {


    }

    //end index()

    public function xmasminiparty()
    {
        $displaydata = array ();

        //get menu from menu db
        $menu                  = getJaiThaiMenu('XMASSET');
        $displaydata[ 'menu' ] = $menu;

        //initalize display data with some default values
        $displaydata[ 'meta_title' ]       = "Christmas Mini Party @ $368 for 10 Pax - Jai Thai Catering";
        $displaydata[ 'meta_description' ] = $menu[ 'meta_description' ];

        //initialize form defaults data with form defaults
        $formdatadefaults = array ();

        $formdatadefaults[ 'fish' ]                = 'Steamed Salmon';
        $formdatadefaults[ 'meat' ]                = 'Black Pepper Braised Beef';
        $formdatadefaults[ 'longbean'.JT_VEGCTRL ] = JT_REG;
        $formdatadefaults[ 'noodle'.JT_VEGCTRL ]   = JT_REG;
        $formdatadefaults[ 'rice'.JT_VEGCTRL ]     = JT_REG;
        $formdatadefaults[ 'numpax' ]              = $menu[ 'minorder' ];

        if ($this->formSubmitted()) {

            //form submitted

            //retrieve from POST
            $formdata = array ();

            $formdata[ 'fish' ]                = $this->input->post('fish');
            $formdata[ 'meat' ]                = $this->input->post('meat');
            $formdata[ 'longbean'.JT_VEGCTRL ] = $this->input->post('longbean'.JT_VEGCTRL);
            $formdata[ 'noodle'.JT_VEGCTRL ]   = $this->input->post('noodle'.JT_VEGCTRL);
            $formdata[ 'rice'.JT_VEGCTRL ]     = $this->input->post('rice'.JT_VEGCTRL);
            $formdata[ 'numpax' ]              = $this->input->post('numpax');
            $formdata[ 'agreetnc' ]            = $this->input->post('agreetnc');

            //pre validation processsing
            $formdata[ 'numpax' ] = intval(trim($formdata[ 'numpax' ]));

            //validation
            $errors = array ();
            if ($formdata[ 'numpax' ] < $menu[ 'minorder' ]) {
                $errors[] = "Minimum order is ".$menu[ 'minorder' ]." pax";
            }
            if ($formdata[ 'numpax' ] % 10 != 0) {
                $errors[] = "This menu is only available in sets of 10 pax (Number of guests must be in multiples of 10)";
            }
            if ($formdata[ 'agreetnc' ] != "Y") {
                $errors[] = "Please acknowledge and check \"".$menu[ 'agreetnc' ]."\"";
            }

            //check if validation went thru
            if (sizeof($errors)) {

                //there are errors, display them
                $errors = "<ul><li>".implode("</li><li>", $errors)."</li></ul>";
                $this->errorMessage($errors);

                //load the values back into the display data and display the form
                $displaydata[ 'formdata' ] = $formdata;
                $displaydata[ 'template' ] = 'xmasmenu_view';
                $this->load->view(KA_CITHEME.'/index', $displaydata);

            } else {

                //no errors, process the values

                //unset the JT_REG entries to save cookie space (have to do this after validation
                //- in case of errors, we still need to return the value)
                foreach ($formdata as $key => $value) {
                    if ($value == JT_REG) {
                        unset($formdata[ $key ]);
                    }
                }

                //add to cart
                $this->cart_model->addItem('XMASSET', $formdata);

                //display a success message
                $this->successMessage("Menu added to cart.");
                redirect('cart.php');

            }
        } else {

            //form not submitted

            //display the form with defaults
            $displaydata[ 'formdata' ] = $formdatadefaults;
            $displaydata[ 'template' ] = 'xmasmenu_view';
            $this->load->view(KA_CITHEME.'/index', $displaydata);

        }
    }

    public function xmascatering()
    {

        $displaydata = array ();

        //get menu from menu db
        $menu                  = getJaiThaiMenu('XMASCATERING');
        $displaydata[ 'menu' ] = $menu;

        //initalize display data with some default values
        $displaydata[ 'meta_title' ]       = "Catering Singapore: ".$menu[ 'title' ]." @ \$".sprintf("%.2f",
                $menu[ 'perpax' ])."/Pax - Jai Thai";
        $displaydata[ 'meta_description' ] = $menu[ 'meta_description' ];

        //initialize form defaults data with form defaults
        $formdatadefaults = array ();

        $formdatadefaults[ 'fish' ]                = 'Steamed Salmon';
        $formdatadefaults[ 'meat' ]                = 'Black Pepper Braised Beef';
        $formdatadefaults[ 'longbean'.JT_VEGCTRL ] = JT_REG;
        $formdatadefaults[ 'noodle'.JT_VEGCTRL ]   = JT_REG;
        $formdatadefaults[ 'rice'.JT_VEGCTRL ]     = JT_REG;

        $formdatadefaults[ 'addondrink' ] = "No Drink";
        $formdatadefaults[ 'numpax' ]     = $menu[ 'minorder' ];

        if ($this->formSubmitted()) {

            //form submitted

            //retrieve from POST
            $formdata = array ();

            $formdata[ 'fish' ]                = $this->input->post('fish');
            $formdata[ 'meat' ]                = $this->input->post('meat');
            $formdata[ 'longbean'.JT_VEGCTRL ] = $this->input->post('longbean'.JT_VEGCTRL);
            $formdata[ 'noodle'.JT_VEGCTRL ]   = $this->input->post('noodle'.JT_VEGCTRL);
            $formdata[ 'rice'.JT_VEGCTRL ]     = $this->input->post('rice'.JT_VEGCTRL);

            $formdata[ 'addondrink' ] = $this->input->post('addondrink');
            $formdata[ 'numpax' ]     = $this->input->post('numpax');
            $formdata[ 'agreetnc' ]   = $this->input->post('agreetnc');

            //pre validation processsing
            $formdata[ 'numpax' ] = intval(trim($formdata[ 'numpax' ]));

            //validation
            $errors = array ();
            if ($formdata[ 'numpax' ] < $menu[ 'minorder' ]) {
                $errors[] = "Minimum order is ".$menu[ 'minorder' ]." pax";
            }

            //check if validation went thru
            if (sizeof($errors)) {

                //there are errors, display them
                $errors = "<ul><li>".implode("</li><li>", $errors)."</li></ul>";
                $this->errorMessage($errors);

                //load the values back into the display data and display the form
                $displaydata[ 'formdata' ] = $formdata;
                $displaydata[ 'template' ] = 'setmenu_view';
                $this->load->view(KA_CITHEME.'/index', $displaydata);

            } else {

                //no errors, process the values

                //unset the JT_REG entries to save cookie space (have to do this after validation
                //- in case of errors, we still need to return the value)
                foreach ($formdata as $key => $value) {
                    if ($value == JT_REG) {
                        unset($formdata[ $key ]);
                    }
                }

                //add to cart
                $this->cart_model->addItem('XMASCATERING', $formdata);

                //display a success message
                $this->successMessage("Menu added to cart.");
                redirect('cart.php');

            }
        } else {

            //form not submitted

            //display the form with defaults
            $displaydata[ 'formdata' ] = $formdatadefaults;
            $displaydata[ 'template' ] = 'setmenu_view';
            $this->load->view(KA_CITHEME.'/index', $displaydata);

        }
    }
}
