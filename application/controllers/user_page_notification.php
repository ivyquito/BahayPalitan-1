<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_page_notification extends CI_Controller {
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
				redirect(base_url().'index.php/user_login');
				exit();
		}
		
		$data['user_info'] 	= $user_info = $this->session->userdata('user_info');
		$data['note'] = $this->common->getall('notification',array('to_user'=>$user_info->subID),'date');
		$uid = $user_info->subID;
		$data['allhome'] = $this->common->getallhome($uid);
		$this->load->view('includes/head');
		$this->load->view('includes/nav',$data);
		$this->load->view('user_view_page_notification', $data);
		$this->load->view('includes/footer2');

	}

	function view(){
		if($this->session->userdata('user_info')==''){
				redirect(base_url().'index.php/user_login');
				exit();
		}

		if(isset($_GET['view'])):
			$view = $_GET['view'];
			$data['user_info'] 	= $user_info = $this->session->userdata('user_info');
			$where['notie_id'] 	= $view;
			$where['to_user'] 	= $user_info->subID;
			$data['view'] 		= $pass = $this->common->getrow('notification',$where);
			if($pass):
				if($pass->nstatus == 1):
					$this->common->change('notification', array('nstatus'=> 0),$where);
				endif;
				$this->load->view('includes/head');
				$this->load->view('includes/nav',$data);
				$this->load->view('user_view_page_notification_view', $data);
				$this->load->view('includes/footer2');
			else:
				redirect(base_url().'user_page_notification'); exit;
			endif;
		else:
			redirect(base_url().'user_page_notification'); exit;
		endif;
	}
	function delete(){
		if(isset($_GET['view'])):
			$view = $_GET['view'];
			$data['user_info'] 	= $user_info = $this->session->userdata('user_info');
			$where['notie_id'] 	= $view;
			$where['to_user'] 	= $user_info->subID;
			$pass = $this->common->remove('notification',$where);
			redirect(base_url().'user_page_notification'); exit;
		else:
			redirect(base_url().'user_page_notification'); exit;
		endif;
	}
}