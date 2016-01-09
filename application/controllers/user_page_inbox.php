<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_page_inbox extends CI_Controller {
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
				redirect(base_url().'user_login');
				exit();
		}
		
		$data['user_info'] 	= $user_info = $this->session->userdata('user_info');
		$data['inbox'] = $this->common->getall('messages',array('toID'=>$user_info->subID));
		$uid = $user_info->subID;
		$data['inbox'] = $this->common->getinbox($uid);
		$data['allhome'] = $this->common->getallhome($uid);
		$this->load->view('includes/head');
		$this->load->view('includes/nav',$data);
		$this->load->view('user_view_page_inbox', $data);
		$this->load->view('includes/footer2');

	}
	function view(){
		if(isset($_GET['view'])):
			$view = $_GET['view'];
			$data['user_info'] 	= $user_info = $this->session->userdata('user_info');
			$where['msgId'] 	= $view;
			$where['toId'] 		= $user_info->subID;
			$data['view'] 		= $pass = $this->common->inboxview($where);
			if($pass):
				if($pass->mstatus == 1):
					$this->common->change('messages', array('mstatus'=> 0),$where);
				endif;
				$this->load->view('includes/head');
				$this->load->view('includes/nav',$data);
				$this->load->view('user_view_page_inbox_view', $data);
				$this->load->view('includes/footer2');
			else:
				redirect(base_url().'user_page_inbox'); exit;
			endif;
		else:
			redirect(base_url().'user_page_inbox'); exit;
		endif;
	}
	function delete(){
		if(isset($_GET['view'])):
			$view = $_GET['view'];
			$data['user_info'] 	= $user_info = $this->session->userdata('user_info');
			$where['msgId'] 	= $view;
			$where['toId'] 		= $user_info->subID;
			$pass = $this->common->remove('messages',$where);
			redirect(base_url().'user_page_inbox'); exit;
		else:
			redirect(base_url().'user_page_inbox'); exit;
		endif;
	}
}