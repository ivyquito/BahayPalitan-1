<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_page_match_home extends CI_Controller {

	public function __construct() {
        parent::__construct();
        if($this->session->userdata('sub')!=''){
				redirect(base_url().'user_page_renew');
				exit();
		}
		$this->load->library("Mobile_Detect");
        if( $this->mobile_detect->isMobile() || $this->mobile_detect->isTablet() ){
        	redirect(_MOBILE_LINK_);
			exit();
        }

    }

	function index(){
		$data['user_info'] 	= $user_info = $this->session->userdata('user_info');
		$uid = $user_info->subID;
		$myplan = $this->common->getrow2('travel_plan',array('subID'=>$user_info->subID));
		if(empty($myplan)){
			$this->session->set_flashdata('error','Set your travel plan first before viewing match home.');
			redirect(base_url().'user_page_travelplan');
			exit();
		}
		$myhomes = $this->common->getall('homes',array('ownerID'=>$user_info->subID));
		foreach ($myhomes as $value) {
			$gr[] = $value->locID;
		}

		// $where 	= 	"homes.ownerID <> ".$uid." AND homes.locID = ".$myplan->locID." AND homes.swapStatus ='ACTIVE'".
		// 			"AND (travel_plan.PStartDate = '".$myplan->PStartDate."'".
		// 			"AND travel_plan.PEndDate <= '".$myplan->PEndDate."')".
		// 			"AND homes.maxGuests >= ".$myplan->PMaxGuests;

					//"AND (travel_plan.PStartDate BETWEEN '".$myplan->PStartDate."' AND '".$myplan->PEndDate."')".
					//"AND (travel_plan.PEndDate BETWEEN '".$myplan->PStartDate."' AND '".$myplan->PEndDate."')";
					//"AND homes.maxGuests = ".$myplan->PMaxGuests;
		//$compare = $this->common->match_home($where);
		//echo count($compare);
		$in = array();
		$haystack = array();
		$listMatch = array();
		$matchHome = array();

		foreach($myplan as $plan){
			$fetch = $this->common->filterMatch($uid,$plan->PStartDate,$plan->PEndDate);
			if(!empty($fetch))
				$listMatch[] = $fetch;
			//

		}


		foreach ($listMatch as $test) {
			$matchHome =  $this->common->match_home(array('ownerID' => $test->subID,'travel_plan.locID' => $test->locID));
		}



		$haystack = $matchHome;




		// foreach($compare as $out){
		// 	$true = false;
		// 	$kani = $this->common->getrow('travel_plan', array('subID' => $out->subID));
		// 	foreach($myhomes as $akongbalay){
		// 		if($kani->locID == $akongbalay->locID && $kani->PMaxGuests <= $akongbalay->maxGuests){
		// 			$true = true;
		// 		}
		// 	}
		// 	if($true == true){
		// 		$haystack[] = $out;
		// 	}
		// }
		//echo count($haystack);
		//pagintaion
		$this->load->library('pagination');
		$config = array();
		$config["base_url"] = base_url() . "user_page_match_home/index";
		$total_row = sizeof($haystack);
		$config["total_rows"] = $total_row;
		$config["per_page"] = $per_page = 6;
		$config['cur_tag_open']  = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$this->pagination->initialize($config);

		$start	 = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$counter = 0;
		$xx		 = 0;
		$haystack2 = array();
		foreach($haystack as $got){
				if($start <= $xx && $per_page >= $counter){
				$haystack2[] = $got;
				$counter++;
				}
				$xx++;
		}

		$data['match_home'] = $haystack2;
		$data["links"] 	 	= $this->pagination->create_links();

		$this->load->view('includes/head');
		$this->load->view('includes/nav',$data);
		$this->load->view('user_view_page_match_home', $data);
		$this->load->view('includes/footer2');

	}
}