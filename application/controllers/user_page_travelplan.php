<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_page_travelplan extends CI_Controller {
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
		if($this->session->userdata('user_info')==''){
				redirect(base_url().'index.php/user_page_home');
				exit();
		}	
		$data['user_info'] = $user_info = $this->session->userdata('user_info');
		$uid = $user_info->subID;
		$this->load->library('pagination'); 
		$config = array();
		$config["base_url"] = base_url() . "user_page_travelplan/travelplanrecord";
		$total_row = sizeof($this->common->countalltravelplan($uid));
		$config["total_rows"] = $total_row;
		$config["per_page"] = 6;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$this->pagination->initialize($config);
		

		
		$page 	= ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$page 	= $config["per_page"] * $page;
        $data['records'] = $this->common->alltravelplan($config["per_page"], $page,$uid);
		$data["links"] 	 = $this->pagination->create_links();
		
		$this->load->view('includes/head');
		$this->load->view('includes/nav',$data);
		$this->load->view('user_view_page_travelplanrecord');
		$this->load->view('includes/footer2');	
		/*$data['user_info'] = $user_info = $this->session->userdata('user_info');

		$check = $this->common->getrow('travel_plan', array('subID'=>$user_info->subID));
		if($check){
			$data['myplan'] = $this->common->myplan($user_info->subID);
			$page = 'user_view_page_travelplan';
			$data['total_row'] = sizeof($this->common->countalltravelplan($user_info->subID));
		}
		else{
			redirect(base_url().'user_page_travelplan/add');
		}

		$this->load->view('includes/head');
		$this->load->view('includes/nav',$data);
		$this->load->view($page);
		$this->load->view('includes/footer2');*/
		
	}
	function add(){
		if($this->session->userdata('user_info')==''){
				redirect(base_url().'index.php/user_page_home');
				exit();
		}

		$data['user_info'] = $user_info = $this->session->userdata('user_info');
		$naa_balay = $this->common->getall('homes', array('ownerID' => $user_info->subID));
		if(count($naa_balay) == 0){
			$this->session->set_flashdata('error','Add your home first before creating travel plan...');
			redirect(base_url().'user_page_myhome');
			exit;
		}
		if(isset($_POST['travel_plan'])){
			$startdate 	= trim($this->input->post('startdate'));
			$enddate 	= trim($this->input->post('enddate'));
			$location 	= trim($this->input->post('location'));
			$maxguest 	= trim($this->input->post('maxguest'));
			$amenities	= trim($this->input->post('amenities'));

			$current = date('Y-m-d');
			$date 			= new DateTime($current);
			$interval 		= new DateInterval('P1M');
			
			$date->add($interval);
			$min_month 		= $date->format('Y-m-d');


			if(empty($startdate) || empty($enddate) || empty($location) || empty($maxguest) || empty($amenities)):
				$data['error'] = 'empty field(s)...';
			elseif($this->common->getrow('homes', array('ownerID' => $user_info->subID,'locID'=>$location))):
				$data['error'] = 'Your travel location is the same with your home location...';
			elseif($min_month > $startdate):
				$data['error'] = 'Starting date plan should have a minimum 1 month before...';
			elseif($enddate < $startdate):
				$data['error'] = 'Please check the end date...';
			elseif(!is_numeric($maxguest)):
				$data['error'] = 'Max Guest is not number...';
			else:
				$insert = array(
				'subID' => $user_info->subID,
				'PStartDate' => $startdate,
				'PEndDate' => $enddate,
				'locID' => $location,
				'PMaxGuests' => $maxguest,
				'PAmenities' => $amenities);
				$this->common->add('travel_plan',$insert);
				$wr['ownerID'] = $user_info->subID;
				if($this->common->getall('homes',$wr)){
					echo '<br/>test';
					$update['swapStatus'] = 'ACTIVE';
					$this->common->change('homes', $update, $wr);
				}else{echo '<br/>fak!';}
				$this->session->set_flashdata('success','Travel plan successfully saved!');
				redirect(base_url().'user_page_travelplan');
				exit();
			endif;

		}

		
		$data['loc'] = $this->common->getall('locations',array('status'=>'active'));

		$this->load->view('includes/head');
		$this->load->view('includes/nav',$data);
		$this->load->view('user_view_page_addtravelplan');
		$this->load->view('includes/footer2');
	}
	function addNew(){
		if($this->session->userdata('user_info')==''){
				redirect(base_url().'index.php/user_page_home');
				exit();
		}

		$data['user_info'] = $user_info = $this->session->userdata('user_info');
		$naa_balay = $this->common->getall('homes', array('ownerID' => $user_info->subID));
		if(count($naa_balay) == 0){
			$this->session->set_flashdata('error','Add your home first before creating travel plan...');
			redirect(base_url().'user_page_myhome');
			exit;
		}
		if(isset($_POST['add_new_travel_plan'])){
			$startdate 	= trim($this->input->post('startdate'));
			$enddate 	= trim($this->input->post('enddate'));
			$location 	= trim($this->input->post('location'));
			$maxguest 	= trim($this->input->post('maxguest'));
			$amenities	= trim($this->input->post('amenities'));

			$current = date('Y-m-d');
			$date 			= new DateTime($current);
			$interval 		= new DateInterval('P1M');
			
			$date->add($interval);
			$min_month 		= $date->format('Y-m-d');


			if(empty($startdate) || empty($enddate) || empty($location) || empty($maxguest) || empty($amenities)):
				$data['error'] = 'empty field(s)...';
			elseif($this->common->getrow('homes', array('ownerID' => $user_info->subID,'locID'=>$location))):
				$data['error'] = 'Your travel location is the same with your home location...';
			elseif($min_month > $startdate):
				$data['error'] = 'Starting date plan should have a minimum 1 month before...';
			elseif($enddate < $startdate):
				$data['error'] = 'Please check the end date...';
			elseif(!is_numeric($maxguest)):
				$data['error'] = 'Max Guest is not number...';
			else:
				$insert = array(
				'subID' => $user_info->subID,
				'PStartDate' => $startdate,
				'PEndDate' => $enddate,
				'locID' => $location,
				'PMaxGuests' => $maxguest,
				'PAmenities' => $amenities);
				$this->common->add('travel_plan',$insert);
				$wr['ownerID'] = $user_info->subID;
				if($this->common->getall('homes',$wr)){
					echo '<br/>test';
					$update['swapStatus'] = 'ACTIVE';
					$this->common->change('homes', $update, $wr);
				}else{echo '<br/>fak!';}
				$this->session->set_flashdata('success','New Travel Plan successfully saved!');
				redirect(base_url().'user_page_travelplan');
				exit();
			endif;

		}

		
		$data['loc'] = $this->common->getall('locations',array('status'=>'active'));

		$this->load->view('includes/head');
		$this->load->view('includes/nav',$data);
		$this->load->view('user_view_page_addnewtravelplan');
		$this->load->view('includes/footer2');
	}
	function edit(){
		if($this->session->userdata('user_info')==''){
				redirect(base_url().'index.php/user_page_home');
				exit();
		}

		$data['user_info'] = $user_info = $this->session->userdata('user_info');

		if(isset($_POST['edit_travel_plan'])){
			$startdate 	= trim($this->input->post('startdate'));
			$enddate 	= trim($this->input->post('enddate'));
			$location 	= trim($this->input->post('location'));
			$maxguest 	= trim($this->input->post('maxguest'));
			$amenities	= trim($this->input->post('amenities'));

			$current = date('Y-m-d');
			$date 			= new DateTime($current);
			$interval 		= new DateInterval('P1M');
			
			$date->add($interval);
			$min_month 		= $date->format('Y-m-d');

			if(empty($startdate) || empty($enddate) || empty($location) || empty($maxguest) || empty($amenities)):
				$data['error'] = 'empty field(s)...';
			elseif($startdate < $min_month):
				$data['error'] = 'start date plan should 1 month before...';
			elseif($enddate < $startdate):
				$data['error'] = 'Please check the end date...';
			elseif(!is_numeric($maxguest)):
				$data['error'] = 'Max Guest is not number...';
			else:
				$update = array(
				'subID' => $user_info->subID,
				'PStartDate' => $startdate,
				'PEndDate' => $enddate,
				'locID' => $location,
				'PMaxGuests' => $maxguest,
				'PAmenities' => $amenities);
				$this->common->change('travel_plan', $update, array('subID'=>$user_info->subID));
				redirect(base_url().'user_page_travelplan');
				exit();
			endif;

		}
		$data['loc'] = $this->common->getall('locations',array('status'=>'active'));
		$data['myplan'] = $this->common->myplan($user_info->subID);
		if(!$data['myplan']){
			redirect(base_url().'user_page_travelplan');
		}
		$this->load->view('includes/head');
		$this->load->view('includes/nav',$data);
		$this->load->view('user_view_page_edittravelplan');
		$this->load->view('includes/footer2');
	}

	function editTravel(){	
		if($this->session->userdata('user_info')==''){
				redirect(base_url().'index.php/user_page_home');
				exit();
		}

		$data['user_info'] = $user_info = $this->session->userdata('user_info');
		//$uid               = $user_info->subID;
		//if(isset($_GET['TravelPlanID']) && isset($_GET['subID'])){
		$travelplanid = $_GET['TravelPlanID'];
		$subid = $_GET['subID'];
		//$data['viewtravel'] = $this->common->getviewhome($travelplanid,$subid);
		//$data['viewhome'] = $home = $this->common->getviewhome($userId,$homeId);
		if(isset($_POST['edit_travel_plan'])){
			$startdate 	= trim($this->input->post('startdate'));
			$enddate 	= trim($this->input->post('enddate'));
			$location 	= trim($this->input->post('location'));
			$maxguest 	= trim($this->input->post('maxguest'));
			$amenities	= trim($this->input->post('amenities'));

			$current = date('Y-m-d');
			$date 			= new DateTime($current);
			$interval 		= new DateInterval('P1M');
			
			$date->add($interval);
			$min_month 		= $date->format('Y-m-d');

			if(empty($startdate) || empty($enddate) || empty($location) || empty($maxguest) || empty($amenities)):
				$data['error'] = 'empty field(s)...';
			elseif($startdate < $min_month):
				$data['error'] = 'start date plan should 1 month before...';
			elseif($enddate < $startdate):
				$data['error'] = 'Please check the end date...';
			elseif(!is_numeric($maxguest)):
				$data['error'] = 'Max Guest is not number...';
			else:
				$update = array(
				'TravelPlanID' => $user_info->TravelPlanID,
				'subID' => $user_info->subID,
				'PStartDate' => $startdate,
				'PEndDate' => $enddate,
				'locID' => $location,
				'PMaxGuests' => $maxguest,
				'PAmenities' => $amenities);
				$this->common->change('travel_plan', $update, array('subID'=>$subid,'TravelPlanID'=>$travelplanid));
				redirect(base_url().'user_page_travelplan');
				exit();
			endif;

		}

		$data['loc'] = $this->common->getall('locations',array('status'=>'active'));
		$data['myplan'] = $this->common->myplan2($travelplanid,$subid);
		if(!$data['myplan']){
			redirect(base_url().'user_page_travelplan');
		}
		$this->load->view('includes/head');
		$this->load->view('includes/nav',$data);
		$this->load->view('user_view_page_edittravelplan');
		$this->load->view('includes/footer2');
	}

	function records(){
		if($this->session->userdata('user_info')==''){
				redirect(base_url().'index.php/user_page_home');
				exit();
		}
		$data['user_info'] = $user_info = $this->session->userdata('user_info');
		$uid = $user_info->subID;
		$this->load->library('pagination'); 
		$config = array();
		$config["base_url"] = base_url() . "user_page_travelplan/records";
		$total_row = sizeof($this->common->countallplan($uid));
		$config["total_rows"] = $total_row;
		$config["per_page"] = 6;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$this->pagination->initialize($config);
		

		
		$page 	= ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$page 	= $config["per_page"] * $page;
        $data['records'] = $this->common->allplan($config["per_page"], $page,$uid);
		$data["links"] 	 = $this->pagination->create_links();
		
		$this->load->view('includes/head');
		$this->load->view('includes/nav',$data);
		$this->load->view('user_view_page_travelrecord');
		$this->load->view('includes/footer2');
		
	}
	function travelplanrecord(){
		if($this->session->userdata('user_info')==''){
				redirect(base_url().'index.php/user_page_home');
				exit();
		}
		$data['user_info'] = $user_info = $this->session->userdata('user_info');
		$uid = $user_info->subID;
		$this->load->library('pagination'); 
		$config = array();
		$config["base_url"] = base_url() . "user_page_travelplan/travelplanrecord";
		$total_row = sizeof($this->common->countalltravelplan($uid));
		$config["total_rows"] = $total_row;
		$config["per_page"] = 6;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$this->pagination->initialize($config);
		

		
		$page 	= ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$page 	= $config["per_page"] * $page;
        $data['records'] = $this->common->alltravelplan($config["per_page"], $page,$uid);
		$data["links"] 	 = $this->pagination->create_links();
		
		$this->load->view('includes/head');
		$this->load->view('includes/nav',$data);
		$this->load->view('user_view_page_travelplanrecord');
		$this->load->view('includes/footer2');
		
	}
	
}