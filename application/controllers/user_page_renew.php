<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_page_renew extends CI_Controller {

	public function __construct() {
        parent::__construct();

        $this->load->library("Mobile_Detect");
        if( $this->mobile_detect->isMobile() || $this->mobile_detect->isTablet() ){
        	redirect(_MOBILE_LINK_);
			exit();
        }
    }

	function index(){
		$this->check_session();
		$data['user_info'] 		= $user_info = $this->session->userdata('user_info');

		if(isset($_POST['confirm'])){
			$data['error'] =  $this->otherMethod();
		}else{
		
		$uid 					= $user_info->subID;
		$where['subID'] 		= $uid;
		$data['payment_info'] 	= $this->common->getrow('payment_info', $where);
		$plan 					= $user_info->planID;
		$data['myplanID'] 		= $plan;
		$data['plans'] 			= $this->common->getall('plans');
		}

		$this->load->view('includes/head');
		$this->load->view('includes/nav',$data);
		if($this->session->userdata('newplan') === NULL){
			$this->load->view('user_view_page_renew');
		}else{
			$this->load->view('user_view_page_renew2');
		}
		$this->load->view('includes/footer2');
		
	}
	function renew(){
		$this->check_session();

		$subscription 	= $this->input->post('subscription');
		$paymentMethod 	= $this->input->post('paymentMethod');
		if(empty($subscription) || empty($paymentMethod)){
			$this->session->set_flashdata('error','please select plan...');
			redirect(base_url().'user_page_renew');
			exit();
		}elseif($paymentMethod 	== 'same'){
				$user_info 	= $this->session->userdata('user_info');
				$uid		= $user_info->subID;
				$selected_plan 	= $this->common->getrow('plans', array('planID' => $subscription));
				if($selected_plan){
				redirect(base_url().'user_page_new_account');
				exit();
				}
				$plan_days 		= $selected_plan->planDesc;
				$arr 			= explode(' ',trim($plan_days));
				$plan_month 	= $arr[0];
				
				$current = date('Y-m-d');
				$date 			= new DateTime($current);
				$interval 		= new DateInterval('P'.$plan_month.'M');
				
				$date->add($interval);
				$sub_end 		= $date->format('Y-m-d');

				include 'paypal.php';
				$apiusername 	= 'brian-facilitator_api1.webpropix.com';
				$apipassword 	= 'DZYYKT2TLDHN9YBB';
				$aipsignature	= 'AI9b8TFaoJ1GLJGNWb912Gv4W.tlAVEC9VqbnCLbIymA4cKoQZZ21qWD';
				$returnurl 		= 'http://localhost/bahaypalitan/user_signup/payment_info'; 
				$cancelurl 		= 'http://localhost/bahaypalitan/user_signup/payment_info';

				$paypal = new Paypal($apiusername, $apipassword, $aipsignature, $returnurl, $cancelurl);

				$params = array(
					'total' => $selected_plan->planAmount,
					'cctype' => $selected_plan->card,
					'ccnumber' => $selected_plan->card_number,
					'exmonth' => $selected_plan->exmonth,
					'exyear' => $selected_plan->exyear,
					'cvv' => $selected_plan->cvv,
					'fnameoncard' => $selected_plan->card_fname,
					'lnameoncard' => $selected_plan->card_lname,
					'currency' => 'USD',
					'localecode' => 'US',									
					'street' => $selected_plan->street,
					'shipstreet2' => '',
					'city' => 'city',
					'state' => $selected_plan->province,
					'zip' => $selected_plan->zipcode,
					'country' => 'PH'
				);

				$result = $paypal->DoDirectPayment($params);
				$con = false;
				if($result[0] == NULL){
					$con = true; 
					$this->session->set_flashdata('error','payment connection error... ');
				}
				if (is_array($result) && sizeof($result) > 0 && $con == false)
				{
					if (strtoupper($result['ACK']) == 'SUCCESS')
					{
						
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

						$where = array('subID' => $new_id);
						$this->common->change('payment_info', $card_info);

						$this->session->set_userdata('complete',true);

						$new['planEnd']	= $sub_end;
						$new['planID']	= $subscription;
						$new_id 		= $this->common->change('subscribers', $ne, $where);
						$goo['form_id'] = $new_id;
						$goo['value']   = $selected_plan->planAmount;
						$goo['pay_date']   = date('Y-m-d h:i:s');

						$this->common->add('payment_records', $goo);
						$this->session->unset_userdata('newplan');
						redirect(base_url().'user_page_home');

					} else
						$this->session->set_flashdata('error', $result['L_LONGMESSAGE0']);
						redirect(base_url().'user_page_renew');
						exit();
				}

		}elseif($paymentMethod 	== 'other'){
			$this->session->set_userdata('newplan',$subscription);
			redirect(base_url().'user_page_renew');
			exit();
		}else{
			redirect(base_url().'user_page_renew'); 
			exit;
		}

	}

	function otherMethod(){

		if(isset($_POST['confirm'])){
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
			if(  	
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

				return 'empty field...';
				redirect(base_url().'user_page_renew');
				exit();
			}else{	
				$user_info 	= $this->session->userdata('user_info');
				$uid		= $user_info->subID;

				$subscription 	= $this->session->userdata('newplan');
				$selected_plan 	= $this->common->getrow('plans', array('planID' => $subscription));
				$plan_days 		= $selected_plan->planDesc;
				$arr 			= explode(' ',trim($plan_days));
				$plan_month 	= $arr[0];
				
				$current = date('Y-m-d');
				$date 			= new DateTime($current);
				$interval 		= new DateInterval('P'.$plan_month.'M');
				
				$date->add($interval);
				$sub_end 		= $date->format('Y-m-d');

				include 'paypal.php';
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
				$con = false;
				if($result[0] == NULL){
					$con = true; 
					return 'payment connection error... ';
				}
				if (is_array($result) && sizeof($result) > 0 && $con == false)
				{
					if (strtoupper($result['ACK']) == 'SUCCESS')
					{
						
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

						$where = array('subID' => $new_id);
						$this->common->change('payment_info', $card_info);

						$this->session->set_userdata('complete',true);

						$new['planEnd']	= $sub_end;
						$new['planID']	= $subscription;
						$new_id 		= $this->common->change('subscribers', $ne, $where);
						$this->session->unset_userdata('newplan');
						redirect(base_url().'');

					} else
						return $result['L_LONGMESSAGE0'];
				}
			}
		}else{
			redirect(base_url().'user_page_renew');
		}
	}

	function check_session(){
		if($this->session->userdata('user_info')==''){
				redirect(base_url().'user_page_home');
				exit();
		}
	}

}
?>