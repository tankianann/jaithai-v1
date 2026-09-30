<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends KA_Controller
{

	public function index()
	{
		//nothing
	}

	public function checkPostalSurcharge()
	{
		$postalCode = $this->uri->segment(3);
		$this->load->helper('sentosa');
		if (isInSentosa($postalCode)) {
			echo "1";
		}
		else {
			echo "0";
		}
	}

    public function getPostalAddress()
    {
        $postalCode = $this->uri->segment(3);
        $this->load->helper('onemap');
        header('Content-Type: application/json');
        try {
            $data = OneMapHelper::lookup($postalCode);
            echo json_encode($data);
        }
        catch (Exception $e) {
            echo json_encode(array('error' => $e->getMessage()));
        }
        exit;
    }

}
//end Class