<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_home extends CI_Controller {
	public function __construct() {
        parent::__construct();

        $this->load->library("Mobile_Detect");
        if( $this->mobile_detect->isMobile() || $this->mobile_detect->isTablet() ){
        	redirect(_MOBILE_LINK_);
			exit();
        }
    }

	function index(){
		$data['user_info'] = $this->session->userdata('user_info');


		$data['god'] = $this->common->allhome(4);
		$this->load->view('includes/head');
		$this->load->view('includes/nav',$data);
		$this->load->view('user_view_home');
		$this->load->view('includes/footer');

	}
}