<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_login extends CI_Controller {
	public function __construct() {
        parent::__construct();

        $this->load->library("Mobile_Detect");
        if( $this->mobile_detect->isMobile() || $this->mobile_detect->isTablet() ){
        	redirect(_MOBILE_LINK_);
			exit();
        }
    }
	function index(){
		if($this->session->userdata('user_info')!=''){
				redirect(base_url().'index.php/user_page_home');
				exit();
		}
		$this->load->view('includes/head');
		$this->load->view('user_view_login');
		$this->load->view('includes/footer');

	}
	function check_login()
	{
			if($_POST){
				$uname 	= trim($this->input->post('inputUser'));
				$pass 	= trim($this->input->post('inputPassword'));
				$where = array(
				'email' => $uname,
				'password'	=> sha1($pass),
				);
				if(empty($uname) || empty($pass)){
					$err = 'empty field';
				}else{
					$where = array(
					'username' => $uname,
					'password'	=> sha1($pass),
					);

					if($getval= $this->common->getrow('subscribers',$where)){
						$this->session->set_userdata('user_info',$getval);
						$now = date('Y-m-d');
						if($getval->planEnd >= $now){
							$this->session->set_userdata('islogged', true);
							redirect(base_url().'user_page_home');
							exit();
						}else{
							$this->session->set_userdata('sub',true);
							redirect(base_url().'user_page_renew');
							exit();
						}
					}else{
						//$this->session->set_userdata($array());
						$this->session->set_flashdata('error', 'Wrong username / password');
						header('location:'.base_url().'index.php/user_login');
					}
				}
			}else{
				redirect(base_url().'index.php/user_login');
			}
		
	}
	
}