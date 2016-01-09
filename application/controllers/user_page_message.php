<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_page_message extends CI_Controller {

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
		if(isset($_GET['homeId']) && !empty($_GET['homeId'])){
			$userId = $_GET['homeId'];
			

			$data['owner_info'] = $chk = $this->common->getrow('subscribers', array('subID'=>$userId));
			if($chk){
				if(isset($_POST['sendbtn'])){
					$msg	 = trim($this->input->post('msg'));
					if($msg == NULL){
						$this->session->set_flashdata('error', 'Empty fields...');
					}else{
						$newdata = array(
									'toID'=>$chk->subID,
									'fromID'=>$user_info->subID,
									'content'=>$msg,
									'sendDate'=>date('Y-m-d H:i:s'),
									'mstatus'=>'1',
									);
						$this->common->insert('messages',$newdata);
						$this->session->set_flashdata('success', 'Message sent...');
						unset($_POST);
						$link = isset($_GET['no']) ? '&no='.$_GET['no']: '';
						$link = isset($_GET['backlink']) ? '&backlink='.$_GET['backlink']: '';  
						redirect(base_url().'index.php/user_page_message?homeId='.$chk->subID.$link);
						exit();
					}
				}
				
				$this->load->view('includes/head');
				$this->load->view('includes/nav',$data);
				$this->load->view('user_view_page_message');
				$this->load->view('includes/footer2');
			}
		}else{
			redirect(base_url().'index.php/user_page_home'); 
            exit();
		}
		

	}
	
	
}