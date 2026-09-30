<?php if ( ! defined ( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Specialmenu extends KA_Controller
{

    public function index ()
    {


    }

    public function mothersday() {

        $displaydata = array();

        //get menu from menu db
        $menu = getJaiThaiMenu('MOTHERSDAY');
        $displaydata['menu'] = $menu;

        //initalize display data with some default values
        $displaydata['meta_title'] = "Mothers Day Special Set - Jai Siam Catering";
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
                $displaydata['template'] = 'mothersdaymenu_view';
                $this->load->view(KA_CITHEME . '/index', $displaydata);

            }
            else {

                //no errors, process the values
                //call some model to process the data here

                //add to cart
                $this->cart_model->addItem('MOTHERSDAY', $formdata);

                //display a success message
                $this->successMessage("Menu added to cart.");
                redirect('cart.php');

            }
        }
        else {

            //form not submitted

            //display the form with defaults
            $displaydata['formdata'] = $formdatadefaults;
            $displaydata['template'] = 'mothersdaymenu_view';
            $this->load->view(KA_CITHEME . '/index', $displaydata);

        }
    }
}
