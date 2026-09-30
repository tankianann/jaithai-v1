<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jtpages extends KA_Controller {

	public function index() {
	    
//		if (! ( $this->session->userdata('remembrance')
//			|| $this->session->userdata('statusmessage') )  ) {
//			redirect('/remembrance.php');
//		}

//		if (! ( $this->session->userdata('promo')
//			|| $this->session->userdata('statusmessage') )  ) {
//			redirect('/promo.php');
//		}

		//initalize display data with some default values
		$displaydata = array();
		$displaydata['meta_title'] = 'Jai Thai Restaurant and Thai Catering Singapore';
		$displaydata['meta_description'] = 'Jai Thai offers authentic thai food cooked using traditional herbs and spices. Drop by one of our 4 outlets, or arrange for us to cater for your next event!';
		$displaydata['template'] = 'jtpages/index_view';
		$this->load->view(KA_CITHEME . '/index', $displaydata);

	}
	//end index()

	public function remembrance() {

		$this->session->set_userdata('remembrance', '1');

		$displaydata = array();
		$displaydata['meta_title'] = 'In remembrance of His Majesty King Bhumibol Adulyadej';
		$displaydata['meta_description'] = 'In remembrance of His Majesty King Bhumibol Adulyadej';
		$this->load->view('/jtpages/rememberance', $displaydata);

	}
	//end index()

	public function promo ()
	{
		$this->session->set_userdata('promo', '1');

		$displaydata = array();
		$displaydata['meta_title'] = 'Celebrate Christmas and Chinese New Year with Jai Thai!';
		$displaydata['meta_description'] = 'Celebrate Christmas and Chinese New Year with Jai Thai!';
		$this->load->view('/jtpages/promo', $displaydata);
	}

	public function restaurantmenu() {

		//initalize display data with some default values
		$displaydata = array();
		$displaydata['meta_title'] = 'Thai Restaurant Singapore - Jai Thai Restaurant';
		$displaydata['meta_description'] = 'Discover the savoury thai cuisine at Jai Thai! With set menus for 1-8 pax and up to 90 ala carte dishes, you will be sure to find something to fill your tummy.';
		$displaydata['template'] = 'jtpages/restaurantmenu_view';
		$this->load->view(KA_CITHEME . '/index', $displaydata);

	}
	//end restaurantmenu()

	public function menufamilyset() {

		//initalize display data with some default values
		$displaydata = array();
		$displaydata['meta_title'] = 'Thai Restaurant Family Set Menu - Jai Thai Restaurant';
		$displaydata['meta_description'] = 'Come to Jai Thai restaurant for a meal together with a friend, or even better - bring your whole family! Our family sets from anything from 2 to 8 people.';
		$displaydata['template'] = 'jtpages/menufamilyset_view';
		$this->load->view(KA_CITHEME . '/index', $displaydata);

	}
	//end menufamilyset()

	public function menuindividualset() {

		//initalize display data with some default values
		$displaydata = array();
		$displaydata['meta_title'] = 'Individual Thai Cuisine Set Menus - Jai Thai Restaurant';
		$displaydata['meta_description'] = 'Fancy an savoury thai meal without bursting your budget? Enjoy one of Jai Thai\'s individual set meals. Each set comes with main course, a drink and a dessert!';
		$displaydata['template'] = 'jtpages/menuindividualset_view';
		$this->load->view(KA_CITHEME . '/index', $displaydata);

	}
	//end menuindividualset()

	public function menujaithai() {

		//initalize display data with some default values
		$displaydata = array();
		$displaydata['meta_title'] = 'Jai Thai Restaurant Menu';
		$displaydata['meta_description'] = 'Discover delectable thai cuisine at Jai Thai Restaurant! With over 90 dishes ranging from tom yum soup to beef noodles, you will definitely find something to enjoy.';
		$displaydata['template'] = 'jtpages/menujaithai_view';
		$this->load->view(KA_CITHEME . '/index', $displaydata);

	}
	//end menujaithai()

	public function menuvegetarian() {

		//initalize display data with some default values
		$displaydata = array();
		$displaydata['meta_title'] = 'Singapore Thai Vegetarian Menus - Jai Thai Restaurant';
		$displaydata['meta_description'] = 'Who says vegetarian food cannot be savoury? Take on these thai vegetarian dishes from Jai Thai Restaurant, and give in your tummy\'s cravings!';
		$displaydata['template'] = 'jtpages/menuvegetarian_view';
		$this->load->view(KA_CITHEME . '/index', $displaydata);

	}
	//end menuvegetarian()

	public function cateringmenu() {

		//initalize display data with some default values
		$displaydata = array();
		$displaydata['meta_title'] = 'Singapore Catering Menus and Packages - Jai Thai Restaurant';
		$displaydata['meta_description'] = 'Let us help cater for your next event! With both set and ala carte thai catering menus, you\'ll definitely find a catering package to suit your needs.';
		$displaydata['template'] = 'jtpages/cateringmenu_view';
		$this->load->view(KA_CITHEME . '/index', $displaydata);

	}
	//end cateringmenu()


	public function aboutachievements() {

		//initalize display data with some default values
		$displaydata = array();
		$displaydata['meta_title'] = 'Achievements - Jai Thai Restaurant';
		$displaydata['meta_description'] = 'Jai Thai Restaurant has been offering the delicious Thai food at wallet friendly prices since 1999! Check out some of our achievements!';
		$displaydata['template'] = 'jtpages/aboutachievements_view';
		$this->load->view(KA_CITHEME . '/index', $displaydata);

	}
	//end aboutachievements()

	public function abouthistory() {

		//initalize display data with some default values
		$displaydata = array();
		$displaydata['meta_title'] = 'History - Jai Thai Restaurant';
		$displaydata['meta_description'] = 'Want to find out how Jai Thai came about? Read our story, and you\'ll find why and how we are able we bring you such authentic delicious thai food!';
		$displaydata['template'] = 'jtpages/abouthistory_view';
		$this->load->view(KA_CITHEME . '/index', $displaydata);

	}
	//end abouthistory()

	public function aboutoutlets() {

		//initalize display data with some default values
		$displaydata = array();
		$displaydata['meta_title'] = 'Jai Thai Restaurant Outlets Singapore';
		$displaydata['meta_description'] = 'Since 1999, we have been serving authentic Thai cuisine through our restaurants and catering services. Drop by one of our 4 outlets in Singapore today!';
		$displaydata['template'] = 'jtpages/aboutoutlets_view';
		$this->load->view(KA_CITHEME . '/index', $displaydata);

	}
	//end aboutoutlets()

	public function terms() {

		//initalize display data with some default values
		$displaydata = array();
		$displaydata['meta_title'] = 'Jai Thai Catering Terms and Conditions';
		$displaydata['meta_description'] = 'Here are our catering terms and conditions.';
		$displaydata['template'] = 'jtpages/terms_view';
		$this->load->view(KA_CITHEME . '/index', $displaydata);

	}
	//end aboutoutlets()
}
//end Class