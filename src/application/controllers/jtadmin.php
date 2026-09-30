<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jtadmin extends KA_Controller {

	public function index() {

		redirect('jtadmin/login');

	}
	//end index()

	public function login() {

		//initalize display data with some default values
		$displaydata = array();
		$displaydata['meta_title'] = KA_WEBSITE_NAME;
		$displaydata['meta_description'] = KA_WEBSITE_TAGLINE;

		if ($this->formSubmitted()) {

			//retrieve from POST
			$formdata = array();
			$formdata['username'] = $this->input->post('username');
			$formdata['password'] = $this->input->post('password');

			//no validation to be done - whatever value is submitted, pass to model to return
			$karesponse = $this->users_model->dologin($formdata['username'], $formdata['password']);
			if ($karesponse->success) {

				//set cookie
				$this->setLoggedInUser($karesponse->result);

				//display dashboard with success message
				$this->successMessage('Login successfully');
				redirect('jtadmin/dashboard');
			}
			else {

				//wrong username or password
				$this->errorMessage('Username or password is incorrect');

				//display the login form again
				$displaydata['template'] = 'jtadmin_login_view';
				$this->load->view(KA_CIADMINTHEME . '/index', $displaydata);

			}
		}
		else {

			//if cookie exists and is verified, autologin
			if ($this->canAutoLogin()) {
				redirect('jtadmin/dashboard');

			}
			else {
				//display the login screen
				$displaydata['template'] = 'jtadmin_login_view';
				$this->load->view(KA_CIADMINTHEME . '/index', $displaydata);
			}

		}


	}//end login()


	public function logout() {

		$this->clearLoggedInUser();

		$type = $this->uri->segment(3);

		if ($type == "unauthorized") {

			$this->errorMessage('Unauthorised. Logged out successfully.');
		}
		else {
			$this->successMessage('Logged out successfully.');

		}

		redirect('jtadmin');

	}//end logout()


	public function dashboard() {

		//check for permissions
		$this->limitAccess('110');

		//initalize display data with some default values
		$displaydata = array();
		$displaydata['meta_title'] = KA_WEBSITE_NAME;
		$displaydata['meta_description'] = KA_WEBSITE_TAGLINE;


		if ($this->formSubmitted()) {

			if ($this->input->post('formsubmit') != 'Reset') {
				//may need to filter by date
				$formdata['filtertype'] = $this->input->post('filtertype');
				$formdata['startdate'] = $this->input->post('startdate');
				$formdata['enddate'] = $this->input->post('enddate');

				$formdata['startdate'] = date('Y-m-d', strtotime($formdata['startdate']));
				$formdata['enddate'] = date('Y-m-d', strtotime($formdata['enddate']));


				$formdata['orderby'] = $this->input->post('orderby');

				$formdata['outlets'] = $this->input->post('outlets');
				if (!$formdata['outlets'] || !is_array($formdata['outlets'])) {
					$formdata['outlets'] = array();
				}

			}
			else {

				//reset settings

				//default filter
				$formdata['startdate'] = date("Y-m") . "-01";
				$formdata['enddate'] = date("Y-m-t");
				$formdata['filtertype'] = 'nofilter';

				//default sort
				$formdata['orderby'] = 'orderid';

				//default all outlets
				$formdata['outlets'] = array('NA', 'CW', '7C', 'EC', 'JS', 'PV', 'SP', 'CK');
			}


		}
		else {

			//load from cookie if exist, if cookie doesn't exist, use defaults

			$jtadmin_dashboard_filter = $this->session->userdata('jtadmin_dashboard_filter');
			if ($jtadmin_dashboard_filter) {
				$formdata['filtertype'] = $jtadmin_dashboard_filter[0];
				$formdata['startdate'] = $jtadmin_dashboard_filter[1];
				$formdata['enddate'] = $jtadmin_dashboard_filter[2];
			}
			else {
				//default filter
				$formdata['startdate'] = date("Y-m") . "-01";
				$formdata['enddate'] = date("Y-m-t");
				$formdata['filtertype'] = 'nofilter';
			}

			$jtadmin_dashboard_sort = $this->session->userdata('jtadmin_dashboard_sort');
			if ($jtadmin_dashboard_sort) {
				$formdata['orderby'] = $jtadmin_dashboard_sort;
			}
			else {
				//default sort
				$formdata['orderby'] = 'orderid';
			}

			$jtadmin_dashboard_outlets = $this->session->userdata('jtadmin_dashboard_outlets');
			if ($jtadmin_dashboard_outlets) {
				$formdata['outlets'] = $jtadmin_dashboard_outlets;
			}
			else {
				//default all outlets
				$formdata['outlets'] = array('NA', 'CW', '7C', 'EC', 'JS', 'SP', 'PV', 'CK');
			}

		}
		//set the parameters into cookies
		$jtadmin_dashboard_filter = array($formdata['filtertype'], $formdata['startdate'], $formdata['enddate']);
		$this->session->set_userdata('jtadmin_dashboard_filter', $jtadmin_dashboard_filter);
		$this->session->set_userdata('jtadmin_dashboard_sort', $formdata['orderby']);
		$this->session->set_userdata('jtadmin_dashboard_outlets', $formdata['outlets']);


		//prepare the parameters for the query
		$params = array();

		if ($formdata['filtertype'] == 'functiondate') {
			$params['functiondate >='] = $formdata['startdate'];
			$params['functiondate <='] = $formdata['enddate'];
		}

		$orderby = "";
		switch ($formdata['orderby']) {
			// create the sorting based on the orderby
			case 'functiondate':
				$orderby = "functiondate ASC, timestart ASC";
				break;
			case 'total':
				$orderby = "ordertotalprice ASC";
				break;
			case 'driver':
				$orderby = "a_assigneddriver ASC";
				break;
			case 'orderid':
				$orderby = "id DESC";
				break;
		}

		$wherein = array();
		if (sizeof($formdata['outlets'])) {
			$paramoutlets = array();

			foreach($formdata['outlets'] as $outlet) {
				if ($outlet == "NA") {
					$outlet = "";
				}
				$paramoutlets[] = $outlet;
			}
			$wherein['a_assignedoutlet'] = $paramoutlets;
		}


		//retrieve the slots based on user priveleges
		$loggedInUser = $this->getLoggedInUser();
		$params['a_archived'] = '0000-00-00 00:00:00';
		$params['a_credit'] = '0000-00-00 00:00:00';
		if ($loggedInUser['type'] == 'staff') {
			if ($loggedInUser['scope'] == 'EC') {
				$params['a_assignedoutlet'] = 'EC';
				$upcoming = $this->getupcomingorders('EC');
			}
			elseif ($loggedInUser['scope'] == 'PV') {
				$params['a_assignedoutlet'] = 'PV';
				$upcoming = $this->getupcomingorders('PV');
			} elseif ($loggedInUser['scope'] == 'JS') {
				$params['a_assignedoutlet'] = 'JS';
				$upcoming = $this->getupcomingorders('JS');
			}
			elseif ($loggedInUser['scope'] == 'CW') {
				$params['a_assignedoutlet'] = 'CW';
				$upcoming = $this->getupcomingorders('CW');
			}
			elseif ($loggedInUser['scope'] == '7C') {
				$params['a_assignedoutlet'] = '7C';
				$upcoming = $this->getupcomingorders('7C');
			}
			elseif ($loggedInUser['scope'] == 'SP') {
				$params['a_assignedoutlet'] = 'SP';
				$upcoming = $this->getupcomingorders('SP');
			}
            elseif ($loggedInUser['scope'] == 'CK') {
                $params['a_assignedoutlet'] = 'CK';
                $upcoming = $this->getupcomingorders('CK');
            }
		}
		else {
			$upcoming = $this->getupcomingorders();
		}

		$karesponse = $this->order_model->getOrdersWhere($params, $orderby, $wherein);
		$orders = $karesponse->result;

		$displaydata['jtuser'] = $loggedInUser;
		$displaydata['orders'] = $orders;
		$displaydata['formdata'] = $formdata;
		$displaydata['upcoming'] = $upcoming;
		$displaydata['template'] = 'jtadmin_dashboard_view';
		$this->load->view(KA_CIADMINTHEME . '/index', $displaydata);

	}//end dashboard()

    public function getpdf($type, $orderid)
    {
        $this->limitAccess('110');

        $query = $this->db->get_where('jt_orders', array('id' => $orderid));
        if (!$query->result()) {
            return "";
        }

        $order = $query->row_array();
        $pdffilename = formatOrderNum($order, false); //pdf filenames no outlet prefix

        $emaildata['orderdata'] = $order;

        switch ($type) {

            case 'foodtag':
                $thepdfhtml = $this->load->view('emails/foodtag_pdf_view', $emaildata, true);
                $thepdf = dompdf_createpdf300dpi($thepdfhtml, '', true);
                file_put_contents(KA_PDF_DIRECTORY . $pdffilename . "-foodtag.pdf", $thepdf);
                redirect('/assets/pdf/' . $pdffilename . "-foodtag.pdf");

            case 'timestamp':
                $thepdfhtml = $this->load->view('emails/timestamp_pdf_view', $emaildata, true);
                $thepdf = dompdf_createpdf300dpi($thepdfhtml, '', false);
                file_put_contents(KA_PDF_DIRECTORY . $pdffilename . "-ts.pdf", $thepdf);
                redirect('/assets/pdf/' . $pdffilename . "-ts.pdf");

            case 'dishlabels':
                $thepdfhtml = $this->load->view('emails/dishlabels_pdf_view', $emaildata, true);
                $thepdf = dompdf_createpdf300dpi($thepdfhtml, '', false);
                file_put_contents(KA_PDF_DIRECTORY . $pdffilename . "-dishlabels.pdf", $thepdf);
                redirect('/assets/pdf/' . $pdffilename . "-dishlabels.pdf");

            case 'invoice':
                $thepdfhtml = $this->load->view('emails/order_pdf_view', $emaildata, true);
                $thepdf = dompdf_createpdf($thepdfhtml, '', false);
                file_put_contents(KA_PDF_DIRECTORY . $pdffilename . ".pdf", $thepdf);
                redirect('/assets/pdf/' . $pdffilename . ".pdf");

            default:
                echo "";
        }

    }

	public function dashboardcredit() {

		//check for permissions
		$this->limitAccess('110');

		//initalize display data with some default values
		$displaydata = array();
		$displaydata['meta_title'] = KA_WEBSITE_NAME;
		$displaydata['meta_description'] = KA_WEBSITE_TAGLINE;


		if ($this->formSubmitted()) {

			if ($this->input->post('formsubmit') != 'Reset') {
				//may need to filter by date
				$formdata['filtertype'] = $this->input->post('filtertype');
				$formdata['startdate'] = $this->input->post('startdate');
				$formdata['enddate'] = $this->input->post('enddate');

				$formdata['startdate'] = date('Y-m-d', strtotime($formdata['startdate']));
				$formdata['enddate'] = date('Y-m-d', strtotime($formdata['enddate']));


				$formdata['orderby'] = $this->input->post('orderby');

				$formdata['outlets'] = $this->input->post('outlets');
				if (!$formdata['outlets'] || !is_array($formdata['outlets'])) {
					$formdata['outlets'] = array();
				}

			}
			else {

				//reset settings

				//default filter
				$formdata['startdate'] = date("Y-m") . "-01";
				$formdata['enddate'] = date("Y-m-t");
				$formdata['filtertype'] = 'nofilter';

				//default sort
				$formdata['orderby'] = 'orderid';

				//default all outlets
				$formdata['outlets'] = array('NA', 'CW', '7C', 'EC', 'JS', 'SP', 'PV', 'CK');
			}


		}
		else {

			//load from cookie if exist, if cookie doesn't exist, use defaults

			$jtadmin_dashboard_filter = $this->session->userdata('jtadmin_dashboard_filter');
			if ($jtadmin_dashboard_filter) {
				$formdata['filtertype'] = $jtadmin_dashboard_filter[0];
				$formdata['startdate'] = $jtadmin_dashboard_filter[1];
				$formdata['enddate'] = $jtadmin_dashboard_filter[2];
			}
			else {
				//default filter
				$formdata['startdate'] = date("Y-m") . "-01";
				$formdata['enddate'] = date("Y-m-t");
				$formdata['filtertype'] = 'nofilter';
			}

			$jtadmin_dashboard_sort = $this->session->userdata('jtadmin_dashboard_sort');
			if ($jtadmin_dashboard_sort) {
				$formdata['orderby'] = $jtadmin_dashboard_sort;
			}
			else {
				//default sort
				$formdata['orderby'] = 'orderid';
			}

			$jtadmin_dashboard_outlets = $this->session->userdata('jtadmin_dashboard_outlets');
			if ($jtadmin_dashboard_outlets) {
				$formdata['outlets'] = $jtadmin_dashboard_outlets;
			}
			else {
				//default all outlets
				$formdata['outlets'] = array('NA', 'CW', '7C', 'EC', 'JS', 'SP', 'PV', 'CK');
			}

		}
		//set the parameters into cookies
		$jtadmin_dashboard_filter = array($formdata['filtertype'], $formdata['startdate'], $formdata['enddate']);
		$this->session->set_userdata('jtadmin_dashboard_filter', $jtadmin_dashboard_filter);
		$this->session->set_userdata('jtadmin_dashboard_sort', $formdata['orderby']);
		$this->session->set_userdata('jtadmin_dashboard_outlets', $formdata['outlets']);


		//prepare the parameters for the query
		$params = array();

		if ($formdata['filtertype'] == 'functiondate') {
			$params['functiondate >='] = $formdata['startdate'];
			$params['functiondate <='] = $formdata['enddate'];
		}

		$orderby = "";
		switch ($formdata['orderby']) {
			// create the sorting based on the orderby
			case 'functiondate':
				$orderby = "functiondate ASC, timestart ASC";
				break;
			case 'total':
				$orderby = "ordertotalprice ASC";
				break;
			case 'driver':
				$orderby = "a_assigneddriver ASC";
				break;
			case 'orderid':
				$orderby = "id DESC";
				break;
		}

		$wherein = array();
		if (sizeof($formdata['outlets'])) {
			$paramoutlets = array();

			foreach($formdata['outlets'] as $outlet) {
				if ($outlet == "NA") {
					$outlet = "";
				}
				$paramoutlets[] = $outlet;
			}
			$wherein['a_assignedoutlet'] = $paramoutlets;
		}


		//retrieve the slots based on user priveleges
		$loggedInUser = $this->getLoggedInUser();
		$params['a_archived'] = '0000-00-00 00:00:00';
		$params['a_credit !='] = '0000-00-00 00:00:00';
		if ($loggedInUser['type'] == 'staff') {
			if ($loggedInUser['scope'] == 'EC') {
				$params['a_assignedoutlet'] = 'EC';
			}
			elseif ($loggedInUser['scope'] == 'PV') {
				$params['a_assignedoutlet'] = 'PV';
			} elseif ($loggedInUser['scope'] == 'JS') {
				$params['a_assignedoutlet'] = 'JS';
			}
			elseif ($loggedInUser['scope'] == 'CW') {
				$params['a_assignedoutlet'] = 'CW';
			}
			elseif ($loggedInUser['scope'] == '7C') {
				$params['a_assignedoutlet'] = '7C';
			}
            elseif ($loggedInUser['scope'] == 'CK') {
                $params['a_assignedoutlet'] = 'CK';
            }
		}

		$karesponse = $this->order_model->getOrdersWhere($params, $orderby, $wherein);
		$orders = $karesponse->result;

		$displaydata['jtuser'] = $loggedInUser;
		$displaydata['orders'] = $orders;
		$displaydata['formdata'] = $formdata;

		$displaydata['template'] = 'jtadmin_dashboardcredit_view';
		$this->load->view(KA_CIADMINTHEME . '/index', $displaydata);

	}//end dashboard()


	private function getupcomingorders($outlet = "") {

		$upcoming = array();

		//extract all the un archived functions by date
		$params = array();
		$params['a_credit'] = '0000-00-00 00:00:00';
		$params['a_archived'] = '0000-00-00 00:00:00';
		if ($outlet) {
			$params['a_assignedoutlet'] = $outlet;
		}
		$orderby = "functiondate ASC, timestart ASC";

		$karesponse = $this->order_model->getOrdersWhere($params, $orderby);
		if ($karesponse->success) {

			$orders = $karesponse->result;

			//if its in the next 3 days, put them in the upcoming array;

			$order_t1 = array();
			$order_t2 = array();
			$order_t3 = array();
			$order_t4 = array();
			$order_t1d = date('d-M-Y');
			$order_t2d = date('d-M-Y', time() + (24 * 60 * 60));
			$order_t3d = date('d-M-Y', time() + (2 * 24 * 60 * 60));
			$order_t4d = date('d-M-Y', time() + (3 * 24 * 60 * 60));

			foreach ($orders as $order) {
				$orderdate = date('d-M-Y', strtotime($order['functiondate']));
				if ($orderdate == $order_t1d) {
					$order_t1[] = $order;
				}
				if ($orderdate == $order_t2d) {
					$order_t2[] = $order;
				}
				if ($orderdate == $order_t3d) {
					$order_t3[] = $order;
				}
			}
			$upcoming = array(
				'Today (' . date('d/m', strtotime($order_t1d) ) . ')'   => $order_t1,
				'Tomorrow (' . date('d/m', strtotime($order_t2d) ) . ')' => $order_t2,
				'2 Days Later (' . date('d/m', strtotime($order_t3d) ) . ')' => $order_t3,
				'3 Days Later (' . date('d/m', strtotime($order_t4d) ) . ')' => $order_t4
			);
		}

		return $upcoming;

	}



	public function dashboardarchived() {

		//check for permissions
		$this->limitAccess('100');

		$year_filter = $this->input->get('year');
		if (!$year_filter) {
			$year_filter = date("Y");
		}

		//initalize display data with some default values
		$displaydata = array();
		$displaydata['meta_title'] = KA_WEBSITE_NAME;
		$displaydata['meta_description'] = KA_WEBSITE_TAGLINE;

		if (!$this->formSubmitted()) {

			$order = $this->input->get('order');
			if ($order) {
				//if there is a get parameter, use that, and override the userdata
				$this->session->set_userdata('jtadmin_dashboardarchive_sort', $order);
			}
			else {
				//else if there is a value in userdata, then use it
				$order = $this->session->userdata('jtadmin_dashboardarchive_sort');

				if (!$order) {
					//if not, then use orderid as the default (save it in the userdata)
					$orderby = 'orderid';
					$this->session->set_userdata('jtadmin_dashboardarchive_sort', $orderby);
				}
			}
			switch ($order) {
				// create the sorting based on the orderby
				case 'functiondate':
					$orderby = "functiondate ASC, timestart ASC";
					break;
				case 'total':
					$orderby = "ordertotalprice ASC";
					break;
				case 'orderid':
					$orderby = "id DESC";
					break;
			}


			$karesponse = $this->order_model->getOrdersWhere(
				array(
					'ordertime >' => $year_filter . '-01-01 00:00:00',
					'ordertime <' => $year_filter . '-12-31 23:59:59',
					'a_archived <>' => '0000-00-00 00:00:00',
				),
				$orderby);
			$displaydata['jtuser'] = $this->getLoggedInUser();
			$displaydata['order'] = $order;
			$displaydata['year_filter'] = $year_filter;
			$displaydata['orders'] = $karesponse->result;
			$displaydata['template'] = 'jtadmin_dashboardarchived_view';
			$this->load->view(KA_CIADMINTHEME . '/index', $displaydata);

		}

	}//end dashboardarchived()



	public function report() {

		//check for permissions
		$this->limitAccess('110');

		//initalize display data with some default values
		$displaydata = array();
		$displaydata['meta_title'] = KA_WEBSITE_NAME;
		$displaydata['meta_description'] = KA_WEBSITE_TAGLINE;

		if ($this->formSubmitted()) {

			//filtered reports
			$formdata['startdate'] = $this->input->post('startdate');
			$formdata['enddate'] = $this->input->post('enddate');
			$formdata['datetype'] = $this->input->post('datetype');

			$formdata['startdate'] = date('Y-m-d', strtotime($formdata['startdate']));
			$formdata['enddate'] = date('Y-m-d', strtotime($formdata['enddate']));

		}
		else {

			//default report
			$formdata['startdate'] = date("Y-m") . "-01";
			$formdata['enddate'] = date("Y-m-t");
			$formdata['datetype'] = 'functiondate';

		}

		$params = array();
		if ($formdata['datetype'] == 'orderdate') {
			$params['ordertime >='] = $formdata['startdate'] . "  00:00:00";
			$params['ordertime <='] = $formdata['enddate'] . "  23:59:59";
			$params['a_paid !='] = "0000-00-00 00:00:00";
			$params['a_cancelled'] = "0000-00-00 00:00:00";
			$orderby = "ordertime ASC";
		}
		elseif ($formdata['datetype'] == 'functiondate') {
			$params['functiondate >='] = $formdata['startdate'];
			$params['functiondate <='] = $formdata['enddate'];
			$params['a_paid !='] = "0000-00-00 00:00:00";
			$params['a_cancelled'] = "0000-00-00 00:00:00";
			$orderby = "functiondate ASC, timestart ASC";
		}

		//retrieve the slots based on user priveleges
		$loggedInUser = $this->getLoggedInUser();
		$karesponse = $this->order_model->getOrdersWhere($params, $orderby);
		if ($karesponse->success) {

			$orders = $karesponse->result;
			$displaydata['jtuser'] = $loggedInUser;
			$displaydata['formdata'] = $formdata;
			$displaydata['orders'] = $orders;
			$displaydata['template'] = 'jtadmin_report_view';
			$this->load->view(KA_CIADMINTHEME . '/index', $displaydata);

		}
		else {

			$displaydata['jtuser'] = $loggedInUser;
			$displaydata['formdata'] = $formdata;
			$displaydata['orders'] = $karesponse->result;
			$displaydata['template'] = 'jtadmin_report_view';
			$this->load->view(KA_CIADMINTHEME . '/index', $displaydata);
		}

	}//end report()




	public function feedback() {

		//check for permissions
		$this->limitAccess('100');


		//initalize display data with some default values
		$displaydata = array();
		$displaydata['meta_title'] = KA_WEBSITE_NAME;
		$displaydata['meta_description'] = KA_WEBSITE_TAGLINE;

		if ($this->formSubmitted()) {

			//do something

		}
		else {
			//display the dashboard screen
			$karesponse = $this->feedback_model->getFeedbacksWhere("");
			if ($karesponse->success) {

				$displaydata['jtuser'] = $this->getLoggedInUser();
				$displaydata['feedbacks'] = $karesponse->result;
				$displaydata['template'] = 'jtadmin_feedback_view';
				$this->load->view(KA_CIADMINTHEME . '/index', $displaydata);

			}
			else {

				$displaydata['jtuser'] = $this->getLoggedInUser();
				$displaydata['feedbacks'] = $karesponse->result;
				$displaydata['template'] = 'jtadmin_feedback_view';
				$this->load->view(KA_CIADMINTHEME . '/index', $displaydata);
			}
		}//formsubmitted

	}//end feedback()


	public function vouchers() {

	    //check for permissions
	    $this->limitAccess('100');

	    //initalize display data with some default values
	    $displaydata = array();
	    $displaydata['meta_title'] = KA_WEBSITE_NAME;
	    $displaydata['meta_description'] = KA_WEBSITE_TAGLINE;

	    if ($this->formSubmitted()) {

		    //do something

	    }
	    else {

			//retrieve all the vouchers
			$karesponse = $this->voucher_model->getVouchersWhere("");
			if ($karesponse->success) {

			    $displaydata['jtuser'] = $this->getLoggedInUser();
			    $displaydata['vouchers'] = $karesponse->result;
			    $displaydata['template'] = 'jtadmin_vouchers_view';
			    $this->load->view(KA_CIADMINTHEME . '/index', $displaydata);

			}
			else {

			    $displaydata['jtuser'] = $this->getLoggedInUser();
			    $displaydata['vouchers'] = $karesponse->result;
			    $displaydata['template'] = 'jtadmin_vouchers_view';
			    $this->load->view(KA_CIADMINTHEME . '/index', $displaydata);
			}

	    }//formsubmitted

	}//end vouchers()


	public function usevoucher() {


		$voucherid = $this->uri->segment(3);

		//get the full voucher details
		$karesponse = $this->voucher_model->getVoucher($voucherid);
		$voucher = $karesponse->result;

		//update the date used
		$where = array('id' => $voucherid);
		$toupdate = array('dateused' => date('Y-m-d H:i:s'));
		$karesponse = $this->voucher_model->updateVouchersWhere($toupdate, $where);

		//add status message and send back to admin dashboard
		$this->successMessage("Voucher " . $voucher['vouchernum'] . " marked as used.");
		redirect('jtadmin/vouchers');

	}// end usevoucher()



	public function vieworder() {

		//check for permissions
		$this->limitAccess('110');

		//initalize display data with some default values
		$displaydata = array();
		$displaydata['meta_title'] = KA_WEBSITE_NAME;
		$displaydata['meta_description'] = KA_WEBSITE_TAGLINE;

		$orderid = $this->uri->segment(3);

		//get the full order details
		$karesponse = $this->order_model->getOrder($orderid);
		$order = $karesponse->result;

		$displaydata['jtuser'] = $this->getLoggedInUser();
		$displaydata['orderdata'] = $order;
		$displaydata['template'] = "jtadmin_vieworder_view";
		$this->load->view(KA_CIADMINTHEME . '/index', $displaydata);


	}//end vieworder


	public function vieworderpdf() {

		//check for permissions
		$this->limitAccess('110');

		$custom_pdf_title = $this->input->post('custom_pdf_title');
		$send_to_customer = $this->input->post('send_to_customer');

		$orderid = $this->uri->segment(3);
		$thepdf = $this->order_model->generateCustomPDF($orderid, $custom_pdf_title);

		if ($send_to_customer == 'yes') {
			$this->order_model->sendCustomPDFEmail($orderid, $thepdf, $custom_pdf_title);
			$this->successMessage("Custom PDF (" . $custom_pdf_title . ") generated and sent to customer");
			redirect('jtadmin/dashboard');
		}
		else {
			$displaydata['thepdf'] = $thepdf;
			$this->load->view('jtadmin_vieworderpdf_view', $displaydata);
		}


	}//end vieworder


	public function addorderitem() {

		//check for permissions
		$this->limitAccess('100');

		//initalize display data with some default values
		$displaydata = array();
		$displaydata['meta_title'] = KA_WEBSITE_NAME;
		$displaydata['meta_description'] = KA_WEBSITE_TAGLINE;

		if ($this->formSubmitted()) {

			$menuname = $this->input->post('menuname');
			$newmenu = getDefaultJaiThaiMenu($menuname);

			//get the full order details
			$orderid = $this->uri->segment(3);
			$karesponse = $this->order_model->getOrder($orderid);
			$order = $karesponse->result;

			//add the new menu to the list of items
			$cart = $order['items'];
			$cart = unserialize($cart);
			$cartitems = $cart['items'];
			$cartitems[md5(date('ymdhis'))] = $newmenu;
			$cart['items'] = $cartitems;
			$cart = $this->cart_model->calculateCartTotals($cart);
			$cart = $this->surcharge_model->addSurcharges($order, $cart);

			//update order total price, and serialize the cart
			$totalprice = $this->order_model->calculateTotalPrice($order, $cart);
			$cart = serialize($cart);
			$order['items'] = $cart;
		    $order['ordertotalprice'] = $totalprice;

			//call some model to update the cart
			$karesponse = $this->order_model->updateOrdersWhere($order, array('id' => $orderid));
			if ($karesponse->success) {

				//regenerate the pdf
				$this->order_model->generateOrderPdf($orderid);

				//display a success message
				//redirect to display the confirmation

				$this->successMessage('Order Updated. Note that the order fees and totals and  has been recalculated based on the order items.');
				redirect('jtadmin/vieworder/'. $orderid);

			}
			else {

				//there are errors, display them
				//redirect to display the confirmation
				$this->errorMessage("Error.  Cannot amend order.");
				redirect('jtadmin/vieworder/'. $orderid);

			}//karesponse->success


		}
		else {
			//error - there should not be any GET request, redirect back to view order
			redirect('jtadmin/vieworder/' . $this->uri->segment(3));
		}

	}


	public function editorderdetails() {

		//check for permissions
		$this->limitAccess('100');

		//initalize display data with some default values
		$displaydata = array();
		$displaydata['meta_title'] = KA_WEBSITE_NAME;
		$displaydata['meta_description'] = KA_WEBSITE_TAGLINE;

		if ($this->formSubmitted()) {
			//update the order
			$orderid = $this->uri->segment(3);

			//get the full order details
			$karesponse = $this->order_model->getOrder($orderid);
			$order = $karesponse->result;


			$deliverypickup = $this->input->post('deliverypickup');

			$formdata = array();
			$errors = array();

			if ($deliverypickup == "pickup") {
				//pickup order

				//retrieve from POST, putting blank value for fields not relevant to the order type
				$formdata['deliverypickup'] = $deliverypickup;
				$formdata['pickuplocation'] = $this->input->post('pickuplocation');
				$formdata['functiondate'] = $this->input->post('functiondate');
				$formdata['timestart'] = $this->input->post('timestart');
				$formdata['timeend'] = "";
				$formdata['paymentmode'] = $this->input->post('paymentmode');
				$formdata['notes'] = $this->input->post('notes');
				$formdata['name'] = $this->input->post('name');
				$formdata['email'] = $this->input->post('email');
				$formdata['email2'] = $this->input->post('email2');
				$formdata['telephone'] = $this->input->post('telephone');
				$formdata['mobile'] = $this->input->post('mobile');
				$formdata['mobile2'] = $this->input->post('mobile2');
				$formdata['address'] = "";
				$formdata['buildingname'] = "";
				$formdata['postalcode'] = "";
				$formdata['setuparea'] = "";
				$formdata['sameasdelivery'] = 1;
				$formdata['billname'] = "";
				$formdata['billcompany'] = "";
				$formdata['billemail'] = "";
				$formdata['billtelephone'] = "";
				$formdata['billmobile'] = "";
				$formdata['billaddress'] = "";
				$formdata['billbuildingname'] = "";
				$formdata['billpostalcode'] = "";
				$formdata['billpostalcode'] = "";

				//pre validation processsing
				$formdata['pickuplocation'] = trim($formdata['pickuplocation']);
				$formdata['functiondate'] = date("Y-m-d", strtotime(trim($formdata['functiondate'])));
				$formdata['timestart'] = trim($formdata['timestart']);
				$formdata['paymentmode'] = trim($formdata['paymentmode']);
				$formdata['notes'] = trim($formdata['notes']);
				$formdata['name'] = trim($formdata['name']);
				$formdata['email'] = trim($formdata['email']);
				$formdata['telephone'] = trim($formdata['telephone']);
				$formdata['mobile'] = trim($formdata['mobile']);

				//validation
				if ($formdata['functiondate'] == "") {
					$errors[] = "Please enter your collection date.";
				}
				if ($formdata['name'] == "") {
					$errors[] = "Please enter your name.";
				}
				if ($formdata['email'] == "") {
					$errors[] = "Please enter your email.";
				}
				if ($formdata['mobile'] == "") {
					$errors[] = "Please enter your mobile.";
				}
				if ((substr($formdata['mobile'], 0, 1) != "8") &&
					(substr($formdata['mobile'], 0, 1) != "9")) {
					$errors[] = "Please enter a valid mobile number.";
				}

			}//pickup validation
			elseif ($deliverypickup == "delivery") {
				//delivery order

				//retrieve from POST, putting blank value for fields not relevant to the order type
				$formdata['deliverypickup'] = $deliverypickup;
				$formdata['pickuplocation'] = "";
				$formdata['functiondate'] = $this->input->post('functiondate');
				$formdata['timestart'] = $this->input->post('timestart');
				$formdata['timeend'] = $this->input->post('timeend');
				$formdata['paymentmode'] = $this->input->post('paymentmode');
				$formdata['notes'] = $this->input->post('notes');
				$formdata['name'] = $this->input->post('name');
				$formdata['email'] = $this->input->post('email');
				$formdata['email2'] = $this->input->post('email2');
				$formdata['telephone'] = $this->input->post('telephone');
				$formdata['mobile'] = $this->input->post('mobile');
				$formdata['mobile2'] = $this->input->post('mobile2');
				$formdata['company'] = $this->input->post('company');
				$formdata['address'] = $this->input->post('address');
				$formdata['buildingname'] = $this->input->post('buildingname');
				$formdata['postalcode'] = $this->input->post('postalcode');
				$formdata['unitnum'] = $this->input->post('unitnum');
				$formdata['setuparea'] = $this->input->post('setuparea');
				$formdata['sameasdelivery'] = $this->input->post('sameasdelivery');
				if ($formdata['sameasdelivery']) {
					$formdata['sameasdelivery'] = 1; //change the "on" into 1. if not specified, the value shd be empty.
				}

				if ($formdata['sameasdelivery']) {
					/*
					$formdata['billname'] = "";
					$formdata['billemail'] = "";
					$formdata['billtelephone'] = "";
					$formdata['billmobile'] = "";
					 */
					$formdata['billcompany'] = "";
					$formdata['billaddress'] = "";
					$formdata['billbuildingname'] = "";
					$formdata['billpostalcode'] = "";
				}
				else {
					/*
					$formdata['billname'] = $this->input->post('billname');
					$formdata['billemail'] = $this->input->post('billemail');
					$formdata['billtelephone'] = $this->input->post('billtelephone');
					$formdata['billmobile'] = $this->input->post('billmobile');
					 */
					$formdata['billcompany'] = $this->input->post('billcompany');
					$formdata['billaddress'] = $this->input->post('billaddress');
					$formdata['billbuildingname'] = $this->input->post('billbuildingname');
					$formdata['billpostalcode'] = $this->input->post('billpostalcode');
					$formdata['billunitnum'] = $this->input->post('billunitnum');
				}

				//pre validation processsing
				$formdata['functiondate'] = date("Y-m-d", strtotime(trim($formdata['functiondate'])));
				$formdata['timestart'] = trim($formdata['timestart']);
				$formdata['timeend'] = trim($formdata['timeend']);
				$formdata['paymentmode'] = trim($formdata['paymentmode']);
				$formdata['notes'] = trim($formdata['notes']);
				$formdata['name'] = trim($formdata['name']);
				$formdata['email'] = trim($formdata['email']);
				$formdata['email2'] = trim($formdata['email2']);
				$formdata['telephone'] = trim($formdata['telephone']);
				$formdata['mobile'] = trim($formdata['mobile']);
				$formdata['mobile2'] = trim($formdata['mobile2']);
				$formdata['company'] = trim($formdata['company']);
				$formdata['address'] = trim($formdata['address']);
				$formdata['buildingname'] = trim($formdata['buildingname']);
				$formdata['postalcode'] = trim($formdata['postalcode']);
				$formdata['unitnum'] = trim($formdata['unitnum']);
				if (!$formdata['sameasdelivery']) {
					/*
					$formdata['billname'] = trim($formdata['billname']);
					$formdata['billemail'] = trim($formdata['billemail']);
					$formdata['billtelephone'] = trim($formdata['billtelephone']);
					$formdata['billmobile'] = trim($formdata['billmobile']);
					 */
					$formdata['billcompany'] = trim($formdata['billcompany']);
					$formdata['billaddress'] = trim($formdata['billaddress']);
					$formdata['billbuildingname'] = trim($formdata['billbuildingname']);
					$formdata['billpostalcode'] = trim($formdata['billpostalcode']);
					$formdata['billunitnum'] = trim($formdata['billunitnum']);
				}

				//validation
				if ($formdata['functiondate'] == "") {
					$errors[] = "Please enter your function date.";
				}
				if ($formdata['name'] == "") {
					$errors[] = "Please enter your name.";
				}
				if ($formdata['email'] == "") {
					$errors[] = "Please enter your email.";
				}
				if ($formdata['mobile'] == "") {
					$errors[] = "Please enter your mobile.";
				}
				if ((substr($formdata['mobile'], 0, 1) != "8") &&
					(substr($formdata['mobile'], 0, 1) != "9")) {
					$errors[] = "Please enter a valid mobile number.";
				}
				if ($formdata['address'] == "") {
					$errors[] = "Please enter your delivery address.";
				}
				if ($formdata['postalcode'] == "") {
					$errors[] = "Please enter your delivery postal code.";
				}

				if (!$formdata['sameasdelivery']) {
					/*
					if ($formdata['billname'] == "") {
						$errors[] = "Please enter your billing name.";
					}
					if ($formdata['billemail'] == "") {
						$errors[] = "Please enter your billing email.";
					}
					if ($formdata['billtelephone'] == "") {
						$errors[] = "Please enter your billing telephone.";
					}
					if ($formdata['billmobile'] == "") {
						$errors[] = "Please enter your billing mobile.";
					}
					*/
					if ($formdata['billaddress'] == "") {
						$errors[] = "Please enter your billing address.";
					}
					if ($formdata['billpostalcode'] == "") {
						$errors[] = "Please enter your billing postal code.";
					}
				}

			} //delivery validation



			//check if validation went thru
			if (sizeof($errors)) {

				//there are errors, display them
				$errors = "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
				$this->errorMessage($errors);

				//load the values back into the order array
				foreach($formdata as $key => $value) {
					$order[$key] = $value;
				}

				//set the display data and display the form
				$displaydata['jtuser'] = $this->getLoggedInUser();
				$displaydata['orderdata'] = $order;
				$displaydata['template'] = "jtadmin_editorderdetails_view";
				$this->load->view(KA_CIADMINTHEME . '/index', $displaydata);

			}
			else {

				//no errors, process the values

				//transfer form data into order array
				foreach($formdata as $key => $value) {
					$order[$key] = $value;
				}

				//call some model to process the data here
				$karesponse = $this->order_model->updateOrdersWhere($order, array('id' => $orderid));
				if ($karesponse->success) {

					//update the order again for surcharges
					$karesponse = $this->order_model->getOrder($orderid);
					$order = $karesponse->result;
					$cart = $order['items'];
					$cart = unserialize($cart);
					$cart = $this->cart_model->calculateCartTotals($cart);
					$cart = $this->surcharge_model->addSurcharges($order, $cart);
					$totalprice = $this->order_model->calculateTotalPrice($order, $cart);
					$cart = serialize($cart);
					$order['items'] = $cart;
				    $order['ordertotalprice'] = $totalprice;
					$karesponse = $this->order_model->updateOrdersWhere($order, array('id' => $orderid));

					//regenerate the pdf
					$this->order_model->generateOrderPdf($orderid);

					//display a success message
					//redirect to display the confirmation

					$this->successMessage('Order Updated. Note that the order fees and totals have been recalculated based on the order items.');
					redirect('jtadmin/vieworder/'. $orderid);

				}
				else {

					//there are errors, display them
					$this->errorMessage("Error.  Cannot amend order.");

					//load the values back into the display data and display the form
					$displaydata['jtuser'] = $this->getLoggedInUser();
					$displaydata['orderdata'] = $order;
					$displaydata['template'] = "jtadmin_editorderdetails_view";
					$this->load->view(KA_CIADMINTHEME . '/index', $displaydata);

				}//karesponse->success

			}


		}
		else {

			//GET

			//view the form to edit the order

			$orderid = $this->uri->segment(3);

			//get the full order details
			$karesponse = $this->order_model->getOrder($orderid);
			$order = $karesponse->result;

			$displaydata['jtuser'] = $this->getLoggedInUser();
			$displaydata['orderdata'] = $order;
			$displaydata['template'] = "jtadmin_editorderdetails_view";
			$this->load->view(KA_CIADMINTHEME . '/index', $displaydata);

		}//formsubmitted
	}//end editorderdetails


	public function editorderitemsetmenu() {

		//check for permissions
		$this->limitAccess('100');

		//initalize display data with some default values
		$displaydata = array();
		$displaydata['meta_title'] = KA_WEBSITE_NAME;
		$displaydata['meta_description'] = KA_WEBSITE_TAGLINE;

		if ($this->formSubmitted()) {
			//update the order

			$orderid = $this->uri->segment(3);
			$cartitemkey = $this->uri->segment(4);

			//get the order details
			$karesponse = $this->order_model->getOrder($orderid);
			$order = $karesponse->result;

			//get the particular cart item
			$cart = $order['items'];
			$cart = unserialize($cart);
			$cartitems = $cart['items'];
			$cartitem = $cartitems[$cartitemkey];


			$formdata = array();
			$errors = array();

			//retrieve from POST
			$formdata['title'] = $this->input->post('title');
			$formdata['dishes'] = $this->input->post('dishes');
			$formdata['numpax'] = $this->input->post('numpax');
			$formdata['perpax'] = $this->input->post('perpax');
			$formdata['addondrink'] = $this->input->post('addondrink');

			//pre validation processsing
			$formdata['title'] = trim($formdata['title']);
			$formdata['dishes'] = explode("\n", trim($formdata['dishes']));
			$formdata['numpax'] = intval(trim($formdata['numpax']));
			$formdata['perpax'] = floatval(trim($formdata['perpax']));
			$formdata['addondrink'] = trim($formdata['addondrink']);

			//validation
			if ($formdata['title'] == "") {
				$errors[] = "Please enter the menu title.";
			}
			if (!sizeof($formdata['dishes'])) {
				$errors[] = "Please enter the dishes.";
			}
			if ($formdata['numpax'] == "") {
				$errors[] = "Please enter number of pax.";
			}
			if ($formdata['perpax'] == "") {
				$errors[] = "Please enter amount per pax.";
			}


			//check if validation went thru
			if (sizeof($errors)) {

				//there are errors, display them
				$errors = "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
				$this->errorMessage($errors);

				//transfer form data into order details
				foreach($formdata as $key => $value) {
					$cartitem[$key] = $value;
				}
				$cartitem['foodprice'] = round($cartitem['numpax'] * $cartitem['perpax']);

				//load display data and display the form
				$displaydata['jtuser'] = $this->getLoggedInUser();
				$displaydata['cartitem'] = $cartitem;
				$displaydata['template'] = "jtadmin_editorderitemsetmenu_view";
				$this->load->view(KA_CIADMINTHEME . '/index', $displaydata);

			}
			else {

				//no errors, process the values

				//transfer form data into order details
				foreach($formdata as $key => $value) {
					$cartitem[$key] = $value;
				}
				$cartitem['numdishes'] = sizeof($formdata['dishes']);
				$cartitem['foodprice'] = round($cartitem['numpax'] * $cartitem['perpax'], 2);

				//calculate totals and put back into the order array
				$cartitems[$cartitemkey] = $cartitem;
				$cart['items'] = $cartitems;
				$cart = $this->cart_model->calculateCartTotals($cart);
				$cart = $this->surcharge_model->addSurcharges($order, $cart);

				//update order total price, and serialize the cart
				$totalprice = $this->order_model->calculateTotalPrice($order, $cart);
				$cart = serialize($cart);
				$order['items'] = $cart;
			    $order['ordertotalprice'] = $totalprice;

				//call some model to process the data here
				$karesponse = $this->order_model->updateOrdersWhere($order, array('id' => $orderid));
				if ($karesponse->success) {

					//regenerate the pdf
					$this->order_model->generateOrderPdf($orderid);

					//display a success message
					//redirect to display the confirmation

					$this->successMessage('Order Updated.  Note that the order fees and totals and  has been recalculated based on the order items.');
					redirect('jtadmin/vieworder/'. $orderid);

				}
				else {

					//there are errors, display them
					$this->errorMessage("Error.  Cannot amend order.");

					//load display data and display the form
					$displaydata['jtuser'] = $this->getLoggedInUser();
					$displaydata['cartitem'] = $cartitem;
					$displaydata['template'] = "jtadmin_editorderitemsetmenu_view";
					$this->load->view(KA_CIADMINTHEME . '/index', $displaydata);

				}//karesponse->success

			}

		}
		else {

			//GET

			//view the form to edit the order

			$orderid = $this->uri->segment(3);
			$cartitemkey = $this->uri->segment(4);

			//get the order details
			$karesponse = $this->order_model->getOrder($orderid);
			$order = $karesponse->result;

			//get the particular cart item
			$cart = $order['items'];
			$cart = unserialize($cart);
			$cartitems = $cart['items'];
			$cartitem = $cartitems[$cartitemkey];

			$displaydata['jtuser'] = $this->getLoggedInUser();
			$displaydata['cartitem'] = $cartitem;
			$displaydata['template'] = "jtadmin_editorderitemsetmenu_view";
			$this->load->view(KA_CIADMINTHEME . '/index', $displaydata);

		}//formsubmitted

	}//end editorderitemsetmenu




	public function editorderitemalacarte() {

		//check for permissions
		$this->limitAccess('100');

		//initalize display data with some default values
		$displaydata = array();
		$displaydata['meta_title'] = KA_WEBSITE_NAME;
		$displaydata['meta_description'] = KA_WEBSITE_TAGLINE;

		if ($this->formSubmitted()) {
			//update the order

			$orderid = $this->uri->segment(3);
			$cartitemkey = $this->uri->segment(4);

			//get the order details
			$karesponse = $this->order_model->getOrder($orderid);
			$order = $karesponse->result;

			//get the particular cart item
			$cart = $order['items'];
			$cart = unserialize($cart);
			$cartitems = $cart['items'];
			$cartitem = $cartitems[$cartitemkey];


			$formdata = array();
			$errors = array();

			//retrieve from POST
			$formdata['title'] = $this->input->post('title');
			$dishnames = $this->input->post('name');
			$serves = $this->input->post('serves');
			$price = $this->input->post('price');
			$qty = $this->input->post('qty');

			//pre validation processsing
			$formdata['title'] = trim($formdata['title']);
			if (!is_array($dishnames)) { $dishnames = array(); }
			foreach ($dishnames as $key => $value) { $dishnames[$key] = trim($value); }
			if (!is_array($serves)) { $serves = array(); }
			foreach ($serves as $key => $value) { $serves[$key] = intval($value); }
			if (!is_array($price)) { $price = array(); }
			foreach ($price as $key => $value) { $price[$key] = round(floatval($value), 2); }
			if (!is_array($qty)) { $qty = array(); }
			foreach ($qty as $key => $value) { $qty[$key] = floatval($value); }

			//create the dishes array;
			$dishes = array();
			foreach($dishnames as $key => $value) {
				//only take the non-empty rows
				if ($value != "") {
					$dishes[] = array(
						'name' => $dishnames[$key],
						'serves' => $serves[$key],
						'price' => $price[$key],
						'qty' => $qty[$key]
					);
				}
			}
			$formdata['dishes'] = $dishes;

			//validation
			if ($formdata['title'] == "") {
				$errors[] = "Please enter the menu title.";
			}
			if (!sizeof($formdata['dishes'])) {
				$errors[] = "Please enter the dishes.";
			}


			//check if validation went thru
			if (sizeof($errors)) {

				//there are errors, display them
				$errors = "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
				$this->errorMessage($errors);

				//transfer form data into order details
				foreach($formdata as $key => $value) {
					$cartitem[$key] = $value;
				}

				//load display data and display the form
				$displaydata['jtuser'] = $this->getLoggedInUser();
				$displaydata['cartitem'] = $cartitem;
				$displaydata['template'] = "jtadmin_editorderitemalacarte_view";
				$this->load->view(KA_CIADMINTHEME . '/index', $displaydata);

			}
			else {

				//no errors, process the values

				//transfer form data into order details
				foreach($formdata as $key => $value) {
					$cartitem[$key] = $value;
				}
				$foodprice = 0.00;
				$numdishes = 0;
				foreach ($formdata['dishes'] as $dish) {
					$foodprice += $dish["qty"] * $dish['price'];
					$numdishes++;
				}
				$cartitem['numdishes'] = $numdishes;
				$cartitem['containerprice'] = 0;
				$cartitem['foodprice'] = $foodprice;

				//calculate totals and put back into the order array
				$cartitems[$cartitemkey] = $cartitem;
				$cart['items'] = $cartitems;
				$cart = $this->cart_model->calculateCartTotals($cart);
				$cart = $this->surcharge_model->addSurcharges($order, $cart);

				//update order total price, and serialize the cart
				$totalprice = $this->order_model->calculateTotalPrice($order, $cart);
				$cart = serialize($cart);
				$order['items'] = $cart;
			    $order['ordertotalprice'] = $totalprice;

				//call some model to process the data here
				$karesponse = $this->order_model->updateOrdersWhere($order, array('id' => $orderid));
				if ($karesponse->success) {

					//regenerate the pdf
					$this->order_model->generateOrderPdf($orderid);

					//display a success message
					//redirect to display the confirmation

					$this->successMessage('Order Updated.  Note that the order fees and totals and  has been recalculated based on the order items.');
					redirect('jtadmin/vieworder/'. $orderid);

				}
				else {

					//there are errors, display them
					$this->errorMessage("Error.  Cannot amend order.");

					//load display data and display the form
					$displaydata['jtuser'] = $this->getLoggedInUser();
					$displaydata['cartitem'] = $cartitem;
					$displaydata['template'] = "jtadmin_editorderitemalacarte_view";
					$this->load->view(KA_CIADMINTHEME . '/index', $displaydata);

				}//karesponse->success
			}


		}
		else {
			//view the form to edit the order

			$orderid = $this->uri->segment(3);
			$cartitemkey = $this->uri->segment(4);

			//get the order details
			$karesponse = $this->order_model->getOrder($orderid);
			$order = $karesponse->result;

			//get the particular cart item
			$cart = $order['items'];
			$cart = unserialize($cart);
			$cartitems = $cart['items'];
			$cartitem = $cartitems[$cartitemkey];

			$displaydata['jtuser'] = $this->getLoggedInUser();
			$displaydata['cartitem'] = $cartitem;
			$displaydata['template'] = "jtadmin_editorderitemalacarte_view";
			$this->load->view(KA_CIADMINTHEME . '/index', $displaydata);

		}//formsubmitted
	}//end editorderitemalacarte




	public function editordersurcharges() {

		//check for permissions
		$this->limitAccess('100');

		//initalize display data with some default values
		$displaydata = array();
		$displaydata['meta_title'] = KA_WEBSITE_NAME;
		$displaydata['meta_description'] = KA_WEBSITE_TAGLINE;

		if ($this->formSubmitted()) {
			//update the order

			$orderid = $this->uri->segment(3);

			//get the order details
			$karesponse = $this->order_model->getOrder($orderid);
			$order = $karesponse->result;

			//get the particular cart item
			$cart = $order['items'];
			$cart = unserialize($cart);


			//retrieve from POST
			$desc = $this->input->post('desc');
			$amount = $this->input->post('amount');

			//pre validation processsing
			if (!is_array($desc)) { $desc = array(); }
			foreach ($desc as $key => $value) { $desc[$key] = trim($value); }
			if (!is_array($amount)) { $amount = array(); }
			foreach ($amount as $key => $value) { $amount[$key] = round(floatval($value), 2); }

			//create the dishes array;
			$surcharges = array();
			foreach($desc as $key => $value) {
				//only take the non-empty rows
				if ($desc[$key] != "" && $amount[$key] != "") {
					$surcharges[$desc[$key]] = $amount[$key];
				}
			}

			//nothing to check for errors - anything not filled out is considered deleted.
			//processed to process the values

			if (sizeof($surcharges)) {
				$cart['surcharges'] = $surcharges;
			}
			else {
				if (array_key_exists('surcharges', $cart)) {
					unset($cart['surcharges']);
				}
			}
			//calculate totals and put back into the order array
			$cart = $this->cart_model->calculateCartTotals($cart);

			//update order total price, and serialize the cart
			$totalprice = $this->order_model->calculateTotalPrice($order, $cart);
			$cart = serialize($cart);
			$order['items'] = $cart;
		    $order['ordertotalprice'] = $totalprice;

			//call some model to process the data here
			$karesponse = $this->order_model->updateOrdersWhere($order, array('id' => $orderid));
			if ($karesponse->success) {

				//regenerate the pdf
				$this->order_model->generateOrderPdf($orderid);

				//display a success message
				//redirect to display the confirmation

				$this->successMessage('Surcharges Updated.  Note that the order fees and totals and  has been recalculated based on the order items.');
				redirect('jtadmin/vieworder/'. $orderid);

			}
			else {

				//there are errors, display them
				$this->errorMessage("Error.  Cannot amend order.");

				//load display data and display the form
				$displaydata['jtuser'] = $this->getLoggedInUser();
				$displaydata['surcharges'] = $surcharges;
				$displaydata['template'] = "jtadmin_editordersurcharges_view";
				$this->load->view(KA_CIADMINTHEME . '/index', $displaydata);

			}//karesponse->success

		}
		else {
			//view the form to edit the order

			$orderid = $this->uri->segment(3);

			//get the order details
			$karesponse = $this->order_model->getOrder($orderid);
			$order = $karesponse->result;

			//get the particular cart item
			$cart = $order['items'];
			$cart = unserialize($cart);

			$surcharges = array();
			if (array_key_exists('surcharges', $cart)) {
				$surcharges = $cart['surcharges'];
			}

			$displaydata['jtuser'] = $this->getLoggedInUser();
			$displaydata['surcharges'] = $surcharges;
			$displaydata['template'] = "jtadmin_editordersurcharges_view";
			$this->load->view(KA_CIADMINTHEME . '/index', $displaydata);

		}//formsubmitted
	}//end editordersurcharges




	public function editorderaddonfees() {

		//check for permissions
		$this->limitAccess('100');

		//initalize display data with some default values
		$displaydata = array();
		$displaydata['meta_title'] = KA_WEBSITE_NAME;
		$displaydata['meta_description'] = KA_WEBSITE_TAGLINE;

		if ($this->formSubmitted()) {
			//update the order
			$orderid = $this->uri->segment(3);

			//get the full order details
			$karesponse = $this->order_model->getOrder($orderid);
			$order = $karesponse->result;

			$formdata = array();
			$errors = array();

			//retrieve from POST, putting blank value for fields not submitted
			$formdata['deliveryprice'] = $this->input->post('deliveryprice');
			$formdata['containerprice'] = $this->input->post('containerprice');

			//pre validation processsing
			$formdata['deliveryprice'] = floatval(trim($formdata['deliveryprice']));
			$formdata['containerprice'] = floatval(trim($formdata['containerprice']));

			//validation
			//(no validation, sanitized data already)

			//check if validation went thru
			if (sizeof($errors)) {

				//there are errors, display them
				$errors = "<ul><li>" . implode("</li><li>", $errors) . "</li></ul>";
				$this->errorMessage($errors);

				//get the cart item from the order
				$cart = $order['items'];
				$cart = unserialize($cart);

				//load the values back into the cart array
				foreach($formdata as $key => $value) {
					$cart[$key] = $value;
				}

				//set the display data and display the form
				$displaydata['jtuser'] = $this->getLoggedInUser();
				$displaydata['cart'] = $cart;
				$displaydata['template'] = "jtadmin_editorderaddonfees_view";
				$this->load->view(KA_CIADMINTHEME . '/index', $displaydata);

			}
			else {

				//no errors, process the values

				//get the cart item from the order
				$cart = $order['items'];
				$cart = unserialize($cart);

				//transfer form data into cart array
				foreach($formdata as $key => $value) {
					$cart[$key] = $value;
				}

				//update order total price, and serialize the cart
				$totalprice = $this->order_model->calculateTotalPrice($order, $cart);
				$cart = serialize($cart);
				$order['items'] = $cart;
			    $order['ordertotalprice'] = $totalprice;

				//call some model to process the data here
				$karesponse = $this->order_model->updateOrdersWhere($order, array('id' => $orderid));
				if ($karesponse->success) {

					//regenerate the pdf
					$this->order_model->generateOrderPdf($orderid);

					//display a success message
					//redirect to display the confirmation

					$this->successMessage('Order Updated.');
					redirect('jtadmin/vieworder/'. $orderid);

				}
				else {

					//there are errors, display them
					$this->errorMessage("Error.  Cannot amend order.");

					//load the values back into the display data and display the form
					$displaydata['jtuser'] = $this->getLoggedInUser();
					$displaydata['cart'] = $cart;
					$displaydata['template'] = "jtadmin_editorderaddonfees_view";
					$this->load->view(KA_CIADMINTHEME . '/index', $displaydata);

				}//karesponse->success

			}


		}
		else {

			//GET

			//view the form to edit the order

			$orderid = $this->uri->segment(3);

			//get the full order details
			$karesponse = $this->order_model->getOrder($orderid);
			$order = $karesponse->result;

			//get the cart item
			$cart = $order['items'];
			$cart = unserialize($cart);

			$displaydata['jtuser'] = $this->getLoggedInUser();
			$displaydata['cart'] = $cart;
			$displaydata['template'] = "jtadmin_editorderaddonfees_view";
			$this->load->view(KA_CIADMINTHEME . '/index', $displaydata);

		}//formsubmitted
	}//end editorderaddonfees




	public function removeorderitem() {

		//check for permissions
		$this->limitAccess('100');

		$orderid = $this->uri->segment(3);
		$cartitemkey = $this->uri->segment(4);

		//get the order details
		$karesponse = $this->order_model->getOrder($orderid);
		$order = $karesponse->result;

		//get the particular cart item
		$cart = $order['items'];
		$cart = unserialize($cart);
		$cartitems = $cart['items'];
		unset($cartitems[$cartitemkey]);
		$cart['items'] = $cartitems;
		$cart = $this->cart_model->calculateCartTotals($cart);
		$cart = $this->surcharge_model->addSurcharges($order, $cart);

		//update order total price, and serialize the cart
		$totalprice = $this->order_model->calculateTotalPrice($order, $cart);
		$cart = serialize($cart);
		$order['items'] = $cart;
	    $order['ordertotalprice'] = $totalprice;

		//call some model to process the data here
		$karesponse = $this->order_model->updateOrdersWhere($order, array('id' => $orderid));
		if ($karesponse->success) {

				//regenerate the pdf
				$this->order_model->generateOrderPdf($orderid);

			//display a success message
			//redirect to display the confirmation

			$this->successMessage('Order item removed.  Note that the order fees and totals and  has been recalculated based on the order items.');
			redirect('jtadmin/vieworder/'. $orderid);

		}
		else {

			//there are errors, display them
			$this->errorMessage("Error.  Cannot remove item.");
			redirect('jtadmin/vieworder/'. $orderid);

		}//karesponse->success



	}//end editorderitemsetmenu






	public function assignoutlet() {

		//check for permissions
		$this->limitAccess('100');

		$orderid = $this->uri->segment(3);
		$branch = $this->uri->segment(4);

		//get the full order details
		$karesponse = $this->order_model->getOrder($orderid);
		$order = $karesponse->result;

		//update the assigned outlet
		$where = array('id' => $orderid);
		$toupdate = array('a_assignedoutlet' => $branch);
		$karesponse = $this->order_model->updateOrdersWhere($toupdate, $where);

		//regenerate the pdf
		$this->order_model->generateOrderPdf($orderid);

		//add status message and send back to admin dashboard
		$this->successMessage(formatOrderNum($order) . " outlet assigned to " . $branch);
		redirect('jtadmin/dashboard');

	}//end assignoutlet


	public function assigndriver() {

		//check for permissions
		$this->limitAccess('100');

		$orderid = $this->uri->segment(3);
		$drivername = $this->input->post("drivername");

		//get the full order details
		$karesponse = $this->order_model->getOrder($orderid);
		$order = $karesponse->result;

		//update the assigned driver
		$where = array('id' => $orderid);
		$toupdate = array('a_assigneddriver' => $drivername);
		$karesponse = $this->order_model->updateOrdersWhere($toupdate, $where);

		//regenerate the pdf
		$this->order_model->generateOrderPdf($orderid);

		//add status message and send back to admin dashboard
		$this->successMessage(formatOrderNum($order) . " driver assigned to " . $drivername);
		redirect('jtadmin/dashboard');

	}//end assigndriver


	public function addtocalendar() {

		//check for permissions
		$this->limitAccess('100');

		//http://www.google.com/calendar/event?action=TEMPLATE&text=Mini%20Party%20&dates=20130430T180000Z/20130430T210000Z&details=DEAC&location=AddRESS&trp=false&sprop=&sprop=name:Some%20Website
		$orderid = $this->uri->segment(3);

		//get the full order details
		$karesponse = $this->order_model->getOrder($orderid);
		$order = $karesponse->result;

		//update the order confirmation time
		$where = array('id' => $orderid);
		$toupdate = array('a_addedtocalendar' => date('Y-m-d H:i:s'));
		$karesponse = $this->order_model->updateOrdersWhere($toupdate, $where);

		//add status message and send back to admin dashboard
		$this->successMessage(formatOrderNum($order) . " added to calendar.");
		redirect('jtadmin/dashboard');


	}//end addtocalendar


	public function confirmorder() {

		//check for permissions
		$this->limitAccess('100');

		$orderid = $this->uri->segment(3);

		//get the full order details
		$karesponse = $this->order_model->getOrder($orderid);
		$order = $karesponse->result;

		//update the order confirmation time
		$where = array('id' => $orderid);
		$toupdate = array(
			'a_confirmationsent' => date('Y-m-d H:i:s'),
			'a_confirmationack' => '0000-00-00 00:00:00'
		);
		$karesponse = $this->order_model->updateOrdersWhere($toupdate, $where);

		//regenerate the pdf
		$this->order_model->generateOrderPdf($orderid);

		//send the confirmation email
		$this->order_model->sendConfirmationEmail($orderid);
		$this->order_model->sendConfirmationSMS($orderid);

		//add status message and send back to admin dashboard
		$this->successMessage(formatOrderNum($order) . " confirmed.");
		redirect('jtadmin/dashboard');

	}//end confirmorder


	public function acknowledgeorder() {

		//check for permissions
		$this->limitAccess('100');

		$orderid = $this->uri->segment(3);

		//get the full order details
		$karesponse = $this->order_model->getOrder($orderid);
		$order = $karesponse->result;

		//update the order confirmation ack
		$where = array('id' => $orderid);
		$toupdate = array('a_confirmationack' => date('Y-m-d H:i:s'));
		$karesponse = $this->order_model->updateOrdersWhere($toupdate, $where);

		//add status message and send back to admin dashboard
		$this->successMessage(formatOrderNum($order) . " marked as acknowledged.");
		redirect('jtadmin/dashboard');

	}//end acknowledgeorder


	public function payorder() {

		//check for permissions
		$this->limitAccess('100');

		$orderid = $this->uri->segment(3);
		$notify = $this->uri->segment(4);

		//get the full order details
		$karesponse = $this->order_model->getOrder($orderid);
		$order = $karesponse->result;

		//update the order confirmation ack
		$where = array('id' => $orderid);
		$toupdate = array('a_paid' => date('Y-m-d H:i:s'));
		$karesponse = $this->order_model->updateOrdersWhere($toupdate, $where);

		//regenerate the pdf
		$this->order_model->generateOrderReceiptPdf($orderid);

		//add status message and send back to admin dashboard
		if ($notify && $notify == 'notify') {
			$this->order_model->sendOrderPaidEmail($orderid);
		}
		$this->successMessage(formatOrderNum($order) . " marked as paid.");
		redirect('jtadmin/dashboard');

	}//end payorder


	public function unpayorder() {

		//check for permissions
		$this->limitAccess('100');

		$orderid = $this->uri->segment(3);
		$notify = $this->uri->segment(4);

		//get the full order details
		$karesponse = $this->order_model->getOrder($orderid);
		$order = $karesponse->result;

		//update the order confirmation ack
		$where = array('id' => $orderid);
		$toupdate = array('a_paid' => "0000-00-00 00:00:00");
		$karesponse = $this->order_model->updateOrdersWhere($toupdate, $where);

		$this->successMessage(formatOrderNum($order) . " marked as unpaid.");
		redirect('jtadmin/dashboard');

	}//end unpayorder


	public function payandarchiveorder() {

		//check for permissions
		$this->limitAccess('100');

		$orderid = $this->uri->segment(3);

		//get the full order details
		$karesponse = $this->order_model->getOrder($orderid);
		$order = $karesponse->result;

		//update the order confirmation ack
		$where = array('id' => $orderid);
		$toupdate = array('a_paid' => date('Y-m-d H:i:s'), 'a_archived' => date('Y-m-d H:i:s'));
		$karesponse = $this->order_model->updateOrdersWhere($toupdate, $where);

		//regenerate the pdf
		$this->order_model->generateOrderPdf($orderid);

		//add status message and send back to admin dashboard
		$this->successMessage(formatOrderNum($order) . " marked as paid and archived.");
		redirect('jtadmin/dashboard');

	}//end payandarchiveorder


	public function paythankarchiveorder() {

		//check for permissions
		$this->limitAccess('100');

		$orderid = $this->uri->segment(3);

		//get the full order details
		$karesponse = $this->order_model->getOrder($orderid);
		$order = $karesponse->result;

		$where = array('id' => $orderid);
		$toupdate = array('a_paid' => date('Y-m-d H:i:s'), 'a_archived' => date('Y-m-d H:i:s'));
		$karesponse = $this->order_model->updateOrdersWhere($toupdate, $where);



		//generate the voucher pdf
		$karesponse = $this->voucher_model->createVoucherForOrder($order);
		$voucherid = 0;
		if ($karesponse->success) {
			$voucherid = $karesponse->result;
			$this->voucher_model->generateVoucherPdf($voucherid);
		}

		//update the feedback sent
		$where = array('id' => $orderid);
		$toupdate = array('a_feedbacksent' => date('Y-m-d H:i:s'));
		$karesponse = $this->order_model->updateOrdersWhere($toupdate, $where);

		//send the email
		$this->order_model->sendThankCustomerEmail($orderid, $voucherid);

		//regenerate the pdf
		$this->order_model->generateOrderPdf($orderid);

		//add status message and send back to admin dashboard
		$this->successMessage(formatOrderNum($order) . " marked as paid, customer thanked with voucher and archived order.");
		redirect('jtadmin/dashboard');

	}//end paythankarchiveorder

	public function creditorder() {

		//check for permissions
		$this->limitAccess('100');

		$orderid = $this->uri->segment(3);

		//get the full order details
		$karesponse = $this->order_model->getOrder($orderid);
		$order = $karesponse->result;

		//update the order confirmation ack
		$where = array('id' => $orderid);
		$toupdate = array('a_credit' => date('Y-m-d H:i:s'));
		$karesponse = $this->order_model->updateOrdersWhere($toupdate, $where);

		//add status message and send back to admin dashboard
		$this->successMessage(formatOrderNum($order) . " marked as payment by credit.");
		redirect('jtadmin/dashboard');

	}//end creditorder

	public function uncreditorder() {

		//check for permissions
		$this->limitAccess('100');

		$orderid = $this->uri->segment(3);

		//get the full order details
		$karesponse = $this->order_model->getOrder($orderid);
		$order = $karesponse->result;

		//update the order confirmation ack
		$where = array('id' => $orderid);
		$toupdate = array('a_credit' => '0000-00-00 00:00:00');
		$karesponse = $this->order_model->updateOrdersWhere($toupdate, $where);

		//add status message and send back to admin dashboard
		$this->successMessage(formatOrderNum($order) . " marked as normal.");
		redirect('jtadmin/dashboard');

	}//end creditorder

	public function deliverorder() {

		//check for permissions
		$this->limitAccess('100');

		$orderid = $this->uri->segment(3);

		//get the full order details
		$karesponse = $this->order_model->getOrder($orderid);
		$order = $karesponse->result;

		//update the order confirmation ack
		$where = array('id' => $orderid);
		$toupdate = array('a_delivered' => date('Y-m-d H:i:s'));
		$karesponse = $this->order_model->updateOrdersWhere($toupdate, $where);

		//add status message and send back to admin dashboard
		$this->successMessage(formatOrderNum($order) . " marked as delivered.");
		redirect('jtadmin/dashboard');

	}//end deliverorder


	public function thankcustomer() {

		//check for permissions
		$this->limitAccess('100');

		$orderid = $this->uri->segment(3);

		//get the full order details
		$karesponse = $this->order_model->getOrder($orderid);
		$order = $karesponse->result;

		//generate the voucher pdf
		$karesponse = $this->voucher_model->createVoucherForOrder($order);
		$voucherid = 0;
		if ($karesponse->success) {
			$voucherid = $karesponse->result;
			$this->voucher_model->generateVoucherPdf($voucherid);
		}

		//update the feedback sent
		$where = array('id' => $orderid);
		$toupdate = array('a_feedbacksent' => date('Y-m-d H:i:s'));
		$karesponse = $this->order_model->updateOrdersWhere($toupdate, $where);

		//send the email
		$this->order_model->sendThankCustomerEmail($orderid, $voucherid);

		//add status message and send back to admin dashboard
		$this->successMessage(formatOrderNum($order) . " marked as thanked and voucher sent.");
		redirect('jtadmin/dashboard');

	}//end thankcustomer


	public function thankcustomernovoucher() {

		//check for permissions
		$this->limitAccess('100');

		$orderid = $this->uri->segment(3);

		//get the full order details
		$karesponse = $this->order_model->getOrder($orderid);
		$order = $karesponse->result;

		//update the feedback sent
		$where = array('id' => $orderid);
		$toupdate = array('a_feedbacksent' => date('Y-m-d H:i:s'));
		$karesponse = $this->order_model->updateOrdersWhere($toupdate, $where);

		//send the email
		$this->order_model->sendThankCustomerEmail($orderid);

		//add status message and send back to admin dashboard
		$this->successMessage(formatOrderNum($order) . " marked as thanked.");
		redirect('jtadmin/dashboard');

	}//end thankcustomer



	public function archiveorder() {

		//check for permissions
		$this->limitAccess('100');

		$orderid = $this->uri->segment(3);

		//get the full order details
		$karesponse = $this->order_model->getOrder($orderid);
		$order = $karesponse->result;

		//update the order confirmation ack
		$where = array('id' => $orderid);
		$toupdate = array('a_archived' => date('Y-m-d H:i:s'));
		$karesponse = $this->order_model->updateOrdersWhere($toupdate, $where);

		//add status message and send back to admin dashboard
		$this->successMessage(formatOrderNum($order) . " archived.");
		redirect('jtadmin/dashboard');

	}//end archiveorder


	public function cancelorder() {

		//check for permissions
		$this->limitAccess('100');

		$orderid = $this->uri->segment(3);

		//get the full order details
		$karesponse = $this->order_model->getOrder($orderid);
		$order = $karesponse->result;

		//update the order confirmation ack
		$where = array('id' => $orderid);
		$toupdate = array('a_cancelled' => date('Y-m-d H:i:s'));
		$karesponse = $this->order_model->updateOrdersWhere($toupdate, $where);

		//add status message and send back to admin dashboard
		$this->successMessage(formatOrderNum($order) . " cancelled.");
		redirect('jtadmin/dashboard');

	}//end cancelorder


	public function cancelandarchiveorder() {

		//check for permissions
		$this->limitAccess('100');

		$orderid = $this->uri->segment(3);

		//get the full order details
		$karesponse = $this->order_model->getOrder($orderid);
		$order = $karesponse->result;

		//update the order confirmation ack
		$where = array('id' => $orderid);
		$toupdate = array('a_cancelled' => date('Y-m-d H:i:s'), 'a_archived' => date('Y-m-d H:i:s'));
		$karesponse = $this->order_model->updateOrdersWhere($toupdate, $where);

		//add status message and send back to admin dashboard
		$this->successMessage(formatOrderNum($order) . " cancelled and archived.");
		redirect('jtadmin/dashboard');

	}//end cancelandarchiveorder

	public function uncancelorder() {

		//check for permissions
		$this->limitAccess('100');

		$orderid = $this->uri->segment(3);

		//get the full order details
		$karesponse = $this->order_model->getOrder($orderid);
		$order = $karesponse->result;

		//update the order confirmation ack
		$where = array('id' => $orderid);
		$toupdate = array('a_cancelled' => '0000-00-00 00:00:00');
		$karesponse = $this->order_model->updateOrdersWhere($toupdate, $where);

		//add status message and send back to admin dashboard
		$this->successMessage(formatOrderNum($order) . " restored.");
		redirect('jtadmin/dashboard');

	}//end uncancelorder

	public function unarchiveorder() {

		//check for permissions
		$this->limitAccess('100');

		$orderid = $this->uri->segment(3);

		//get the full order details
		$karesponse = $this->order_model->getOrder($orderid);
		$order = $karesponse->result;

		//update the order confirmation ack
		$where = array('id' => $orderid);
		$toupdate = array('a_archived' => '0000-00-00 00:00:00');
		$karesponse = $this->order_model->updateOrdersWhere($toupdate, $where);

		//add status message and send back to admin dashboard
		$this->successMessage(formatOrderNum($order) . " unarchived.");
		redirect('jtadmin/dashboardarchived');

	}//end unarchiveorder

	public function archivemany() {

		//check for permissions
		$this->limitAccess('100');

		$orderids = $this->input->post("selectedids");

		foreach($orderids as $orderid) {

			//update the achived status
			$where = array('id' => $orderid);
			$toupdate = array('a_archived' => date('Y-m-d H:i:s'));
			$karesponse = $this->order_model->updateOrdersWhere($toupdate, $where);
		}

		//add status message and send back to admin dashboard
		$this->successMessage("Selected orders have been archived.");
		redirect('jtadmin/dashboard');

	}//end archivemany


	public function creditmany() {

		//check for permissions
		$this->limitAccess('100');

		$orderids = $this->input->post("selectedids");

		foreach($orderids as $orderid) {

			//update the achived status
			$where = array('id' => $orderid);
			$toupdate = array('a_credit' => date('Y-m-d H:i:s'));
			$karesponse = $this->order_model->updateOrdersWhere($toupdate, $where);
		}

		//add status message and send back to admin dashboard
		$this->successMessage("Selected orders have marked as payment by credit.");
		redirect('jtadmin/dashboard');

	}//end creditmany



	public function paythankvoucherarchivemany() {

		//check for permissions
		$this->limitAccess('100');

		$orderids = $this->input->post("selectedids");

		foreach($orderids as $orderid) {

			//get the full order details
			$karesponse = $this->order_model->getOrder($orderid);
			$order = $karesponse->result;

			$where = array('id' => $orderid);
			$toupdate = array('a_paid' => date('Y-m-d H:i:s'), 'a_archived' => date('Y-m-d H:i:s'));
			$karesponse = $this->order_model->updateOrdersWhere($toupdate, $where);

			//generate the voucher pdf
			$karesponse = $this->voucher_model->createVoucherForOrder($order);
			$voucherid = 0;
			if ($karesponse->success) {
				$voucherid = $karesponse->result;
				$this->voucher_model->generateVoucherPdf($voucherid);
			}

			//update the feedback sent
			$where = array('id' => $orderid);
			$toupdate = array('a_feedbacksent' => date('Y-m-d H:i:s'));
			$karesponse = $this->order_model->updateOrdersWhere($toupdate, $where);

			//send the email
			$this->order_model->sendThankCustomerEmail($orderid, $voucherid);

			//regenerate the pdf
			$this->order_model->generateOrderPdf($orderid);

		}

		//add status message and send back to admin dashboard
		$this->successMessage("Selected orders have been marked as paid, thanked (with voucher) and archived.");
		redirect('jtadmin/dashboard');

	}//end archivemany



	/* AJAX FUNCTIONS */

	public function ajax() {

	    $orderid = $this->input->post('id');
	    $op = $this->input->post('op');

		if ($op == "archivemany" || $op == "paythankvoucherarchivemany") {

			$where = array('a_archived' => '0000-00-00 00:00:00');
			$orderby = "id ASC";
			$wherein = array('id' => $orderid);

			$karesponse = $this->order_model->getOrdersWhere($where, $orderby, $wherein);
		    $order = $karesponse->result;
		}
		elseif ($op == "creditmany") {

			$where = array('a_credit' => '0000-00-00 00:00:00');
			$orderby = "id ASC";
			$wherein = array('id' => $orderid);

			$karesponse = $this->order_model->getOrdersWhere($where, $orderby, $wherein);
			$order = $karesponse->result;
		}
		elseif ($op == 'assigndriver') {

		    $karesponse = $this->order_model->getOrder($orderid);
		    $order = $karesponse->result;

		    //if assign driver, need to retrieve the list of drivers
		    $drivers = $this->options_model->getOption('jtdrivers');
			$displaydata['drivers'] = unserialize($drivers);

	    }
	    else {

		    $karesponse = $this->order_model->getOrder($orderid);
		    $order = $karesponse->result;

	    }

	    $displaydata['order'] = $order;
	    $this->load->view('ajax/' . $op, $displaydata);
	}

	public function ajaxusevoucher() {

	    $voucherid = $this->input->post('id');

	    $karesponse = $this->voucher_model->getVoucher($voucherid);
	    $voucher = $karesponse->result;

	    $displaydata['voucher'] = $voucher;
	    $this->load->view('ajax/usevoucher', $displaydata);

	}

	public function ajaxorderremoveitem() {

	    $orderid = $this->uri->segment(3);
	    $cartitemkey = $this->input->post('cartitemkey');
	    $op = 'removeorderitem';

	    //get the order details
	    $karesponse = $this->order_model->getOrder($orderid);
	    $order = $karesponse->result;

	    //get the particular cart item
	    $cart = $order['items'];
	    $cart = unserialize($cart);
	    $cartitems = $cart['items'];
	    $cartitem = $cartitems[$cartitemkey];

	    $displaydata['cartitem'] = $cartitem;

	    $displaydata['cartitemkey'] = $cartitemkey;
	    $displaydata['orderid'] = $orderid;
	    $this->load->view('ajax/' . $op, $displaydata);

	}

	public function sendordersms() {

	    $orderid = $this->uri->segment(3);

	    $karesponse = $this->order_model->getOrder($orderid);
	    $order = $karesponse->result;


	    $this->load->helper('sms');
		$smsmsg = jt_compose_sms($order);
	    jt_send_sms($smsmsg);

		//echo $smsmsg;

	}


}
//end Class