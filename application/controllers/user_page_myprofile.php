<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_page_myprofile extends CI_Controller {
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
		$this->logcheck();

		$data['user_info'] = $user_info = $this->session->userdata('user_info');

		if (isset($_POST['Update'])) {
			$image 			= $_FILES['image'];
			if($image != ""):
				
					$dir = 'uploads/';				
					
					$target_dir 	= "uploads/";
					$target_file 	= $target_dir . basename($_FILES["image"]["name"]);
					$imageFileType 	= pathinfo($target_file,PATHINFO_EXTENSION);
					$newname 		= 'profile'.$user_info->subID.'_'.date('Ymdhis');
					$uploadtarget 	= $target_dir . $newname .'.'.$imageFileType;

					move_uploaded_file($image['tmp_name'], $uploadtarget);

					$newdata['profilepic'] = $newname.'.'.$imageFileType;
					$where['subID'] = $user_info->subID;
					$kwaa = $this->common->getrow('subscribers',$where);
					if(file_exists($dir.$user_info->profilepic)){
						unlink($dir.$user_info->profilepic);
					}

					$solud = $this->common->change('subscribers',$newdata,$where);
					unset($_POST);

					if($solud){
						$user_info->profilepic = $newdata['profilepic'];
						$this->session->set_userdata($user_info);
						redirect(base_url().'user_page_myprofile');
					}

			endif;
		}

		
		/*$location = $user_info->locID;
		$loc = $this->common->getrow('locations',array('locID',$location));
		$data['loc'] = $loc->cityName;*/
		$this->load->view('includes/head');
		$this->load->view('includes/nav',$data);
		$this->load->view('user_view_page_myprofile');
		$this->load->view('includes/footer2');

	}
	function edit(){
		$this->logcheck();
		$data['user_info'] = $user_info = $this->session->userdata('user_info');

		if($_POST){
			$fname 		= trim($this->input->post('fname'));
			$mname 		= trim($this->input->post('mname'));
			$lname 		= trim($this->input->post('lname'));
			$gender 	= trim($this->input->post('gender'));
			$bday 		= trim($this->input->post('bday'));
			$email 		= trim($this->input->post('email'));
			$contact 	= trim($this->input->post('contact'));
			if(empty($fname) || empty($mname) || empty($lname) || empty($gender) || empty($bday) || empty($email) || empty($contact)):
				$data['error'] = 'empty field(s)...';
			else:
				$updata['fname'] 	= $fname;
				$updata['mname']	= $mname;
				$updata['lname'] 	= $lname;	
				$updata['gender'] 	= $gender;
				$updata['birthdate']= $bday;	
				$updata['emailAdd'] = $email; 	
				$updata['contactno']= $contact;
				$this->common->change('subscribers',$updata, array('subID' => $user_info->subID));
				$user_info = $this->common->getrow('subscribers',array('subID' => $user_info->subID));
				$this->session->set_userdata('user_info',$user_info); 
				redirect(base_url().'user_page_myprofile');
				exit;
			endif;
		}
		$this->load->view('includes/head');
		$this->load->view('includes/nav',$data);
		$this->load->view('user_view_page_myprofile_edit');
		$this->load->view('includes/footer2');
	}

	function logcheck(){

		if($this->session->userdata('user_info')==''){
				redirect(base_url().'user_login');
				exit();
		}
	}
}