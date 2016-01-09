<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_signup extends CI_Controller {
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
		$data = '';
		if(isset($_POST['register'])){
				$fname 		= trim($this->input->post('fname'));
				$mname 		= trim($this->input->post('mname'));
				$lname 		= trim($this->input->post('lname'));
				$gender 	= trim($this->input->post('gender'));
				$birthdate 	= trim($this->input->post('birthdate'));
				$contact 	= trim($this->input->post('contact'));
				$email 		= trim($this->input->post('email'));
				$uname 		= trim($this->input->post('uname'));
				$password 	= trim($this->input->post('password'));
				$confirm 	= trim($this->input->post('confirm'));
				
				if(	empty($fname) || 
					empty($mname) ||
					empty($lname) ||
					empty($gender) ||
					empty($birthdate) ||
					empty($contact) ||
					empty($email) ||
					empty($uname) ||
					empty($password) ||
					empty($confirm)){
					$data['error'] = 'empty field...';
				}elseif(ctype_alpha($fname)=== false || ctype_alpha($lname)=== false || ctype_alpha($fname)=== false){
					$data['error'] = 'Name should be in character...';
				}elseif(!is_numeric($contact)){
					$data['error'] = 'Contact should be number...';
				}elseif(strlen($password) < 6 && strlen($confirm) < 6){
					$data['error'] = 'Password should aleast 6...';
				}elseif($password != $confirm){
					$data['error'] = 'Password did not match...';
				}else{
					$new_info = array(
					'fname' => $fname,
					'mname' => $mname,
					'lname' => $lname,
					'gender' => $gender,
					'birthdate' => $birthdate,
					'emailAdd' => $email,
					'contactno' => $contact,
					'username' => $uname,
					'password' => sha1($password),
					);
						$this->session->set_userdata('new_info', $new_info);
						redirect(base_url().'user_signup/payment_info');
				}
					
		}
		$this->load->view('includes/head');
		$this->load->view('user_view_signup',$data);
		$this->load->view('includes/footer');

	}
	
	function payment_info(){
		if($this->session->userdata('user_info')!=''){
				redirect(base_url().'user_page_home');
				exit();
		}
		
		$data ='';
		if(isset($_POST['submit'])){
			$subscription 	= trim($this->input->post('subscription'));
			$card 			= trim($this->input->post('card'));
			$card_number	= trim($this->input->post('card_number'));
			$cvv	 		= trim($this->input->post('cvv'));
			$exmonth 		= trim($this->input->post('exmonth'));
			$exyear	 		= trim($this->input->post('exyear'));
			$card_fname 	= trim($this->input->post('card_fname'));
			$card_lname 	= trim($this->input->post('card_lname'));
			$street 		= trim($this->input->post('street'));
			$city 			= trim($this->input->post('city'));
			$province 		= trim($this->input->post('province'));
			$zipcode 		= trim($this->input->post('zipcode'));
			if( empty($subscription) || 	
				empty($card) ||  			
				empty($card_number) || 	
				empty($exmonth) || 	
				empty($exyear) || 	
				empty($cvv) || 	 		
				empty($card_fname) ||  	
				empty($card_lname) ||  	
				empty($street) ||  		
				empty($city) ||  			
				empty($province) || 		
				empty($zipcode)){

				$data['error'] = 'empty field...';
				
			}else{	
				
				$selected_plan 	= $this->common->getrow('plans', array('planID' => $subscription));
				$plan_days 		= $selected_plan->planDesc;
				$arr 			= explode(' ',trim($plan_days));
				$plan_month 	= $arr[0];
				
				$current = date('Y-m-d');
				$date 			= new DateTime($current);
				$interval 		= new DateInterval('P'.$plan_month.'M');
				
				$date->add($interval);
				$sub_end 		= $date->format('Y-m-d');

				include'paypal.php';
				$apiusername 	= 'brian-facilitator_api1.webpropix.com';
				$apipassword 	= 'DZYYKT2TLDHN9YBB';
				$aipsignature	= 'AI9b8TFaoJ1GLJGNWb912Gv4W.tlAVEC9VqbnCLbIymA4cKoQZZ21qWD';
				$returnurl 		= 'http://localhost/bahaypalitan/user_signup/payment_info'; 
				$cancelurl 		= 'http://localhost/bahaypalitan/user_signup/payment_info';

				$paypal = new Paypal($apiusername, $apipassword, $aipsignature, $returnurl, $cancelurl);

				$params = array(
					'total' => $selected_plan->planAmount,
					'cctype' => $card,
					'ccnumber' => $card_number,
					'exmonth' => $exmonth,
					'exyear' => $exyear,
					'cvv' => $cvv,
					'fnameoncard' => $card_fname,
					'lnameoncard' => $card_lname,
					'currency' => 'USD',
					'localecode' => 'US',									
					'street' => $street,
					'shipstreet2' => '',
					'city' => 'city',
					'state' => $province,
					'zip' => $zipcode,
					'country' => 'PH'
				);

				$result = $paypal->DoDirectPayment($params);
				if (is_array($result) AND sizeof($result))
				{
					if (strtoupper($result['ACK']) == 'SUCCESS')
					{
						$new_info 		= $this->session->userdata('new_info');
						$new_id 		= $this->common->add_and_get_id('subscribers', $new_info);

						$card_info = array(				
						'subID' 		=> $new_id,	
						'card' 			=> $card, 			
						'card_number' 	=> $card_number,
						'card_cvv' 		=> $cvv,	
						'card_fname' 	=> $card_fname,	
						'card_lname' 	=> $card_lname,	
						'card_street' 	=> $street,	
						'card_city' 	=> $city,		
						'card_province' => $province,		
						'card_zipcode' 	=> $zipcode 	
						);
						$this->common->add('payment_info', $card_info);
						$newdata = array('from_id'=>$new_id, 'value'=>$selected_plan->planAmount,'pay_date'=> date('Y-m-d'));
						$this->common->add('payment_records',$newdata);
						$update = array(
						'planID' 	=> $subscription,
						'planEnd' 	=> $sub_end,
						'started' 	=> date('Y-m-d'));

						$where = array('subID' => $new_id);
						$this->common->change('subscribers',$update ,$where);
						$this->session->unset_userdata('new_info');
						$this->session->set_userdata('complete',true);

						$where = array(
						'subID' => $new_id,	
						);

						$getval= $this->common->getrow('subscribers',$where);
						$this->session->set_userdata('user_info',$getval);
						redirect(base_url().'user_signup/update_complete');

					} else
						$data['error'] = $result['L_LONGMESSAGE0'];
				}
				//$paypal->error('Authorization to PayPal failed', $logs);

			}
			
		}
		$data['plans'] = $this->common->getall('plans');
		$this->load->view('includes/head');
		$this->load->view('user_view_signup2',$data);
		$this->load->view('includes/footer');
	}
	function update_profile(){
				$this->load->view('includes/head');
				$this->load->view('user_view_signupMakeProfile');
				$this->load->view('includes/footer');
	}
	function update_complete(){
		if($this->session->userdata('complete')!=NULL){
			$this->session->unset_userdata('complete');
			$this->load->view('includes/head');
			$this->load->view('user_view_signupDone');
			$this->load->view('includes/footer');
		}else{
			redirect(base_url().'user_signup');
		}
	}
	
}