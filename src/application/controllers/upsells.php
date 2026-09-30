<?php if ( ! defined ( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Upsells extends KA_Controller
{
    public function index ()
    {

    }

    public function selfheatingsets ()
    {
        $formdata = array ();
        $formdata[ 'agreetnc' ] = 'Y';
        $formdata[ 'equipment4' ] = $this->input->post('equipment4');

        $this->cart_model->addItem ( 'MPALACARTE', $formdata );

        $this->successMessage ( "Self heating sets added to cart." );
        redirect ( 'cart.php' );
    }
}
