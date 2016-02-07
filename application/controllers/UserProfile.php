<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class userProfile extends CI_Controller {

	public function __construct() {
	    parent::__construct();
	    $this->load->model("common");
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

    public function index(){

    	$data['user_info'] = $user_info = $this->session->userdata('user_info');

    	$uid = $_GET['id'];
    	$data['profile'] = $this->common->getrow('subscribers',array("subID" => $uid));
    	$data['homes'] = $this->common->getall('homes',array('ownerID'=>$uid));
    	$data['reviews'] = $this->common->getall('ratings_reviews',array('to_userId'=>$uid));

    	$this->load->view('includes/head');
		$this->load->view('includes/nav',$data);
    	$this->load->view("user_view_page_profile");
    	$this->load->view('includes/footer2');

    }

}