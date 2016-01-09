<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_page_subscription extends CI_Controller {
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
		$data['user_info'] 		= $user_info = $this->session->userdata('user_info');
		$uid 					= $user_info->subID;
		$where['subID'] 		= $uid;
		$data['payment_info'] 	= $this->common->getrow('payment_info', $where);
		$plan 					= $user_info->planID;
		$where2['planID'] 		= $plan;
		$data['plan'] 			= $this->common->getrow('plans', $where2);
		
		$datestr= $user_info->planEnd;
		$date 	= strtotime($datestr);
		$diff 	= $date-time();
		$days 	= floor($diff/(60*60*24));
		$hours	= round(($diff-$days*60*60*24)/(60*60));
		$data['days_left']['days']	= $days;
		$data['days_left']['hours']	= $hours;
		$this->load->view('includes/head');
		$this->load->view('includes/nav',$data);
		$this->load->view('user_view_page_subscription');
		$this->load->view('includes/footer2');
		
	}
	
	
}