 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_page_viewhome extends CI_Controller {
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
		$data['user_info'] = $user_info = $this->session->userdata('user_info');
		$myid = $user_info->subID;
		
		if(isset($_GET['homeId']) && isset($_GET['no'])){
		$userId = $_GET['homeId'];
		$homeId = $_GET['no'];
		$data['confirm'] = 0; 
		$qyue['fromuser'] = $myid;
		$qyue['homeID']   = $homeId;
		$data['reported'] = $this->common->getrow('abuse_reports',$qyue);
		$data['viewhome'] = $home = $this->common->getviewhome($userId,$homeId);
			if($home){
			//check pwede ba ka swap
			$data['myswapstatus'] = false;
			$check['swapStatus'] = 'ACTIVE';
			$check['ownerID'] 	 = $myid;
			$myhome = $this->common->getrow('homes', $check);
			if($myhome){
				$data['myswapstatus'] = true;
			}
			//check swap status
			$data['currently_swap'] = false;
			$ownerId = $userId;
			$data['more_photos'] = $this->common->getall('more_photos',array('homeid'=>$ownerId));

			//get all my homes
			$myhomes = $this->common->getall('homes', array('ownerID'=>$user_info->subID));
			$im_swap_home 		= false;
			$swap_home_to_me 	= false;
			$data['myhomeswap']	= '';
			$data['swapstatus'] = '';
			$waiting_to			= '';
			$swapped 			= '';
			foreach ($myhomes as $value) {
				
				$data1 ="swap_home = {$value->homeID} AND swap_home_to = {$homeId} AND (action = 'pending' OR action = 'done-pending' OR action = 'swapped')";
				$query1 = $this->common->getrow('home_swap',$data1);
				if($query1){ 
					$im_swap_home = true;
					$data['swapstatus'] = $query1->action;
					$data['swap_id'] = $query1->swap_id;
					$swapped = $query1->action;
					$data['myhomeswap']	= $value->homeID;
					$waiting_to	= $query1->waiting_to;
				}
				$data2 ="swap_home = {$homeId} AND swap_home_to = {$value->homeID} AND (action = 'pending' OR action = 'done-pending' OR action = 'swapped')";
				$query2 = $this->common->getrow('home_swap',$data2);
				if($query2){
					$swap_home_to_me = true;
					$data['swapstatus'] = $query2->action;
					$data['swap_id'] = $query2->swap_id;
					$data['confirm'] = 1;
					$swapped = $query2->action;
					$data['myhomeswap']	= $value->homeID;
					$waiting_to	= $query2->waiting_to;
				}
			}
			if($waiting_to !== ''){
				$data['check_swap'] = $waiting_to;
			}else{ 
				$data['check_swap']='';
			}

			//find if currnetly swap
			if($this->common->check_current_swap($myid)){
				$data['currently_swap'] = true;
			}

			//get all reviews
			$data['reviews'] = $reviews = $this->common->getreviews($homeId, $myid);
			$ctr = 0;
			$safety = 0;
			$comfort = 0;
			$cleanliness = 0;
			$environment = 0;
			$accessibility = 0;
			$hospitality = 0;
			$honesty = 0;
			$reliability = 0;
			$overallimpression = 0;
			foreach ($reviews as $value) {
				$safety 			= $safety + $value->safety;
				$comfort 			= $comfort + $value->comfort;
				$cleanliness 		= $cleanliness + $value->cleanliness;
				$environment 		= $environment + $value->environment;
				$accessibility 		= $accessibility + $value->accessibility;
				$hospitality 		= $hospitality + $value->hospitality;
				$honesty 			= $honesty + $value->honesty;
				$reliability 		= $reliability + $value->reliability;
				$overallimpression 	= $overallimpression + $value->overallimpression;
				$ctr++;
			}
				if($ctr != 0):
				$a['safety'] 			= $safety / $ctr;
				$a['comfort'] 			= $comfort / $ctr;
				$a['cleanliness']		= $cleanliness / $ctr;
				$a['environment'] 		= $environment / $ctr;
				$a['accessibility'] 	= $accessibility / $ctr ;
				$a['hospitality'] 		= $hospitality / $ctr ;
				$a['honesty'] 			= $honesty / $ctr;
				$a['reliability'] 		= $reliability / $ctr;
				$a['overallimpression'] = $overallimpression / $ctr;
				else:
				$a = '';
				endif;
			$data['total'] 	= $ctr;
			$data['rate'] 	= $a;
			if($swapped == 'swapped' || $swapped == 'done-pending'){ 
				$br['from_userID'] 	 = $myid;
				$br['to_userId'] 	 = $userId;
				$br['homeID'] 		 = $homeId;
				$data['done_reviews']= $this->common->getrow('ratings_reviews',$br);
			}else{
				$data['done_reviews'] = '';
			}

			$this->load->view('includes/head');
			$this->load->view('includes/nav',$data);
			$this->load->view('user_view_page_view');
			$this->load->view('includes/footer2');
			}else{redirect(base_url().'user_page_home');}
		}else{
			redirect(base_url().'user_page_home');
            exit();
		}

	}

	function swap(){
		$user_info = $this->session->userdata('user_info');
		
		if(isset($_POST['swap'])){
			$uid = $user_info->subID;
			$ownerid = trim($this->input->post('ownerId'));
			$homeid = trim($this->input->post('homeId'));
			
			//check home owner plan
			$ownerplan = $this->common->myplan($ownerid);
			//check if user have the same home location plan
			$agay = "ownerID = {$user_info->subID} AND locID = '{$ownerplan->locID}' AND maxGuests >= {$ownerplan->PMaxGuests}";
			$naa = $this->common->getrow('homes',$agay);
			if(!$naa){
				$this->session->set_flashdata('error','Home owner travel plan don\'t have the same location with your home(s).');
				redirect(base_url().'user_page_viewhome?homeId='.$ownerid.'&no='.$homeid);
				exit;
			}
			//get home to swap
			$to_swap 	= $this->common->getviewhome($ownerid, $homeid);
				if(!$to_swap){
					redirect(base_url().'user_page_home');
				}
			//get my home
			$myhomedata = $this->common->getviewhome($user_info->subID,$naa->homeID);



				$dis = $naa; // $this->common->getrow('homes',array('ownerID' => $uid ));
				if($dis){
					
					if(empty($ownerid) || empty($homeid)){
						redirect(base_url().'user_page_home');
					}else{
						if($to_swap->locID !== $myhomedata->locID):
						$data = array(	
						'to_user'=>$ownerid,
						'from_user'=>$user_info->subID,
						'content' => $user_info->fname.' '.$user_info->lname.' want to swap with your home.	View '.$user_info->fname.' '.$user_info->lname.'\'s <a href="'.base_url().'user_page_viewhome?homeId='.$user_info->subID.'&no='.$dis->homeID.'">home</a>',
						'nstatus' => 1,
						'date' => date('Y-m-d h:i:s'));
						$data2 = array(	
						'swap_home'=>$myhomedata->homeID,
						'swap_home_to'=>$homeid,
						'action' => 'pending');
						$this->common->add('notification',$data);
						$this->common->add('home_swap',$data2);
						redirect(base_url().'user_page_viewhome?homeId='.$ownerid.'&no='.$homeid);
						else:
						$this->session->set_flashdata('error','You cannot swap home with the same location...');
						redirect(base_url().'user_page_viewhome?homeId='.$ownerid.'&no='.$homeid);
						
						endif;
					}
				}else{
					$this->session->set_flashdata('error', 'Please post your home before you can swap home...');
					redirect(base_url().'user_page_viewhome?homeId='.$ownerid.'&no='.$homeid);exit;
				}
		}else{
			redirect(base_url().'user_page_home');
		}
	}

	function confirm(){
		$user_info = $this->session->userdata('user_info');
		
		if(isset($_POST['confirm_swap'])){
			$uid 		= $user_info->subID;
			$ownerid 	= trim($this->input->post('ownerId'));
			$homeid 	= trim($this->input->post('homeId'));
			$myhomeswap = trim($this->input->post('myhomeswap'));
			
			$wer = "homeID=".$myhomeswap." AND swapstatus ='ACTIVE'";
			$ownerhome = $this->common->getrow('homes',$wer);

			if(!$ownerhome){
				$this->session->set_flashdata('error', 'His/Her Home is not available...');
				redirect(base_url().'user_page_viewhome?homeId='.$ownerid.'&no='.$homeid);
				exit;
			}

			$po = array('ownerID'=>$uid,'homeID' => $myhomeswap);
			$dis = $this->common->getrow('homes',$po);

			if($dis){
				
				if(empty($ownerid) || empty($homeid)){
					redirect(base_url().'user_page_home');
				}else{
					$wer = "homeID=".$myhomeswap." AND swapstatus='ACTIVE'";
					$myhome = $this->common->getrow('homes',$wer);

					if(!$myhome){
						$this->session->set_flashdata('error','Not available for swapping');
						redirect(base_url().'user_page_viewhome?homeId='.$ownerid.'&no='.$homeid);
					exit;
					}

					$data = array(	
						'to_user'=>$ownerid,
						'from_user'=>$user_info->subID,
						'content' => $user_info->fname.' '.$user_info->lname.' confirmed home swapping.	View '.$user_info->fname.' '.$user_info->lname.'\'s <a href="'.base_url().'user_page_viewhome?homeId='.$user_info->subID.'&no='.$dis->homeID.'">home</a>',
						'nstatus' => 1,
						'date' => date('Y-m-d h:i:s'));
					
					$owner = $this->common->getrow('subscribers',array('subID'=>$ownerid));
					$update_notie = array(	
						'to_user'=>$user_info->subID,
						'from_user'=>0,
						'content' => 'You are now currently swapped with '.$owner->fname.' '.$owner->lname.'.	View '.$owner->fname.' '.$owner->lname.'\'s <a href="'.base_url().'user_page_viewhome?homeId='.$ownerid.'&no='.$homeid.'">home</a>',
						'nstatus' => 1,
						'date' => date('Y-m-d h:i:s'));

					$change_where = array(	
						'swap_home'=>$homeid,
						'swap_home_to'=>$myhomeswap );
					
					$total1 = $dis->dealNegotiation + 1;
					$total2 = $ownerhome->dealNegotiation + 1;

					
					$change_home1['swapStatus'] 		= 'INACTIVE';
					$change_home1['dealNegotiation'] 	= $total1;
					$change_home2['swapStatus'] 		= 'INACTIVE';
					$change_home2['dealNegotiation'] 	= $total2;
					//my home update
					$this->common->change('homes', $change_home1, array('ownerID' => $user_info->subID,'homeID'=>$myhomeswap));
					//ka swap home update
					$this->common->change('homes', $change_home2, array('ownerID' => $ownerid,'homeID'=>$homeid));
					$this->common->add('notification',$data);
					$this->common->add('notification',$update_notie);
					$this->common->change('home_swap',array('action' => 'swapped','date_swapped'=> date('Y-m-d h:i:s')),$change_where);

					$input[] 	= $this->common->getrow('travel_plan', array('subID'=>$ownerid));
					$input[] 	= $this->common->getrow('travel_plan', array('subID'=>$user_info->subID,));
					foreach ($input as $value) {
						$in = array(
								'tr_amenities' 	=> $value->PAmenities,
								'tr_maxGuests'	=> $value->PMaxGuests,
								'tr_startDate' 	=> $value->PStartDate,
								'tr_pEndDate'	=> $value->PEndDate,
								'tr_locID'		=> $value->locID,
								'tr_subID'		=> $value->subID
								);
						$this->common->add('travel_records',$in);
					}

					redirect(base_url().'user_page_viewhome?homeId='.$ownerid.'&no='.$homeid);
					exit;
					
				}
			}else{
				$this->session->set_flashdata('error', 'You home is not available...');
				redirect(base_url().'user_page_viewhome?homeId='.$ownerid.'&no='.$homeid);
				exit;
			}
		}else{
			redirect(base_url().'user_page_home');
		}
	}

	function reviews_home(){
		if(isset($_POST['post'])){
				$comment 	= trim($this->input->post('comment'));
				$rate 		= trim($this->input->post('rate'));
				$ownerID 	= trim($this->input->post('homeId'));
				$homeID 	= trim($this->input->post('no'));
				$myhomeswap 	= trim($this->input->post('myhomeswap'));

				$overallimpression 	= trim($this->input->post('overallimpression'));
				$reliability 		= trim($this->input->post('reliability'));
				$honesty 			= trim($this->input->post('honesty'));
				$hospitality 		= trim($this->input->post('hospitality'));
				$accessibility 		= trim($this->input->post('accessibility'));
				$environment 		= trim($this->input->post('environment'));
				$cleanliness 		= trim($this->input->post('cleanliness'));
				$comfort 			= trim($this->input->post('comfort'));
				$safety 			= trim($this->input->post('safety'));

				if(empty($comment) || empty($ownerID) || empty($homeID)){
					$this->session->set_flashdata('error','empty field...');
					redirect(base_url().'user_page_viewhome?homeId='.$ownerID.'&no='.$homeID);
				}else{
					$data['user_info'] = $this->session->userdata('user_info');
					$uid = $data['user_info']->subID;
					$swap_home = $this->common->check_swap($myhomeswap,$homeID);
					if($swap_home){
						$insert['comment']	 	= $comment;
						$insert['to_userId'] 	= $ownerID;
						$insert['from_userID'] 	= $uid;
						$insert['homeID'] 		= $homeID;

						$insert['safety'] 			= $safety;
						$insert['comfort'] 			= $comfort;
						$insert['cleanliness'] 		= $cleanliness;
						$insert['environment'] 		= $environment;
						$insert['accessibility']	= $accessibility;
						$insert['hospitality'] 		= $hospitality;
						$insert['honesty'] 			= $honesty;
						$insert['reliability'] 		= $reliability;
						$insert['overallimpression']= $overallimpression;

						$this->common->add('ratings_reviews',$insert);
						$this->session->set_flashdata('success','You can now confirm or done swapping...');
						redirect(base_url().'user_page_viewhome?homeId='.$ownerID.'&no='.$homeID);
					}else{
						$this->session->set_flashdata('error','Something wrong...');
						redirect(base_url().'user_page_viewhome?homeId='.$ownerID.'&no='.$homeID);
						
					}
				}
			
		}
	}
	function done(){
		if(isset($_POST['done'])){
			$data['user_info'] = $user_info = $this->session->userdata('user_info');
			$uid = $data['user_info']->subID;
			$ownerid 	= trim($this->input->post('ownerId'));
			$homeid 	= trim($this->input->post('homeId'));
			$myhomeswap = trim($this->input->post('myhomeswap'));
			
			//check if naka rate na cya
			$swap_home = $this->common->check_current_swap($myhomeswap);
			$check['to_userId']		= $ownerid;
			$check['from_userID']	= $uid;
			$check['homeID']		= $homeid;
			$chck = $this->common->getrow('ratings_reviews',$check);
			if($chck){
				
				if($swap_home->action === 'swapped'){

					$change['action'] = 'done-pending';
					$change['waiting_to'] = $ownerid;

					$data = array(	
					'to_user'=>$ownerid,
					'from_user'=>$user_info->subID,
					'content' => $user_info->fname.' '.$user_info->lname.' is waiting for your Done swapping home confirmation.',
					'nstatus' => 1,
					'date' => date('Y-m-d h:i:s'));
					$this->common->add('notification',$data);

					$this->session->set_flashdata('success','Waiting to home owner confirmation.');

				}elseif($swap_home->action === 'done-pending'){
					$whr['ownerID'] = $uid;
					$whr2['ownerID'] = $ownerid;
					$update['swapStatus'] = 'ACTIVE';
					$this->common->change('homes',$update,$whr);
					$this->common->change('homes',$update,$whr2);

					$change['action'] = 'done';
					$change['waiting_to'] = 0;


					$data = array(	
					'to_user'=>$ownerid,
					'from_user'=>$user_info->subID,
					'content' => $user_info->fname.' '.$user_info->lname.' confirmed done swapping with your home. You can now swap with other home.',
					'nstatus' => 1,
					'date' => date('Y-m-d h:i:s'));
					$this->common->add('notification',$data);
					$this->session->set_flashdata('success','You can now swap home with other.');
				}
				$swap_update['swap_id'] = $swap_home->swap_id; 
				$this->common->change('home_swap',$change,$swap_update);
				
				redirect(base_url().'user_page_viewhome?homeId='.$ownerid.'&no='.$homeid); 
			}else{
				$this->session->set_flashdata('error','You are require to rate and comment this home.');
				redirect(base_url().'user_page_viewhome?homeId='.$ownerid.'&no='.$homeid); 
			}
			//$dis = $this->common->getrow('homes',array('ownerID' => $uid,'swapStatus'=>'DEACTIVE'));
			
		}
	}
	function cancel(){
		$user_info = $this->session->userdata('user_info');
		
		if(isset($_POST['cancel_swap'])){
			$uid = $user_info->subID;
			$ownerid 	= trim($this->input->post('ownerId'));
			$homeid 	= trim($this->input->post('homeId'));
			$myhomeswap = trim($this->input->post('myhomeswap'));
			$delni = array('swap_home_to' => $myhomeswap,'swap_home'=> $homeid, 'action'=>'pending' );
			
			$dis = $this->common->remove('home_swap', $delni);

			if($dis){
					$res = $this->common->getrow('homes',array('homeID'=>$homeid,'ownerID'=>$ownerid));
					$upni['cancelledNegotiation'] = $res->cancelledNegotiation + 1;
					$this->common->change('homes',$upni,array('homeID'=>$homeid,'ownerID'=>$ownerid));
				
					redirect(base_url().'user_page_viewhome?homeId='.$ownerid.'&no='.$homeid);
					exit;
					
				
			}else{
				redirect(base_url().'user_page_viewhome?homeId='.$ownerid.'&no='.$homeid);
				exit;
			}
		}else{
			redirect(base_url().'user_page_home');
		}
	}
	function report(){
		$user_info = $this->session->userdata('user_info');

		if(isset($_POST['report'])){
			$uid = $user_info->subID;
			$ownerid 	= trim($this->input->post('ownerId'));
			$homeid 	= trim($this->input->post('homeId'));
			$lni = array('homeID' => $homeid,'ownerID'=> $ownerid);
			$dis = $this->common->getrow('homes', $lni);

			if($dis){
					$addni['homeID'] = $homeid;
					$addni['fromuser'] = $user_info->subID;
					$this->common->add('abuse_reports',$addni);
				
					redirect(base_url().'user_page_viewhome?homeId='.$ownerid.'&no='.$homeid);
					exit;
					
				
			}else{
				redirect(base_url().'user_page_viewhome?homeId='.$ownerid.'&no='.$homeid);
				exit;
			}
		}else{
			redirect(base_url().'user_page_home');
		}
	}

	function submit_comment()
	{
		$session_info 		= $this->session->userdata('user_info');
		$subsID				= $session_info->subID;
		$toID				= $this->input->post('ownerID');
		$homeID 			= $this->input->post('homeID');
		$comment 			= $this->input->post('comment');

		$data = array("comment" => $comment);
		$where = array(
				"homeID" 		=> $homeID,
				"from_userID"	=> $subsID
			);
		$checkData = $this->common->getrow2('ratings_reviews', $where);
		if(!empty($checkData))
		{
			$update = $this->common->update_rate($where, $data);
			if($update == 1)
			{
				echo "1";
			}
			else
			{
				echo "0";
			}
		}
		else
		{
			$insert = $this->common->insert_rate($data);
			if($insert == 1)
			{
				echo "1";
			}
			else
			{
				echo "0";
			}
		}
	}

	function rate_house()
	{
		$session_info 		= $this->session->userdata('user_info');
		$subsID				= $session_info->subID;
		$toID				= $this->input->post('ownerID');
		$homeID 			= $this->input->post('homeID');
		$rateValue 			= $this->input->post('rateValue');
		$rateDescription 	= $this->input->post('rateDescription');

		if($rateDescription == "Safety")
		{
			$data = array("safety" => $rateValue, "homeID" => $homeID, "from_userID" => $subsID, "to_userId" => $toID);
		}
		else if($rateDescription == "Comfort")
		{
			$data = array("comfort" => $rateValue, "homeID" => $homeID, "from_userID" => $subsID, "to_userId" => $toID);
		}
		else if($rateDescription == "Cleanliness")
		{
			$data = array("cleanliness" => $rateValue, "homeID" => $homeID, "from_userID" => $subsID, "to_userId" => $toID);
		}
		else if($rateDescription == "Environment")
		{
			$data = array("environment" => $rateValue, "homeID" => $homeID, "from_userID" => $subsID, "to_userId" => $toID);
		}
		else if($rateDescription == "Accessibility")
		{
			$data = array("accessibility" => $rateValue, "homeID" => $homeID, "from_userID" => $subsID, "to_userId" => $toID);
		}
		else if($rateDescription == "Hospitality")
		{
			$data = array("hospitality" => $rateValue, "homeID" => $homeID, "from_userID" => $subsID, "to_userId" => $toID);
		}
		else if($rateDescription == "Honesty")
		{
			$data = array("honesty" => $rateValue, "homeID" => $homeID, "from_userID" => $subsID, "to_userId" => $toID);
		}		
		else if($rateDescription == "Reliability")
		{
			$data = array("reliability" => $rateValue, "homeID" => $homeID, "from_userID" => $subsID, "to_userId" => $toID);
		}		
		else if($rateDescription == "Overallimpression")
		{
			$data = array("overallimpression" => $rateValue, "homeID" => $homeID, "from_userID" => $subsID, "to_userId" => $toID);
		}
		$where = array(
				"homeID" 		=> $homeID,
				"from_userID"	=> $subsID
			);
		$checkData = $this->common->getrow2('ratings_reviews', $where);
		if(!empty($checkData))
		{
			$update = $this->common->update_rate($where, $data);
			if($update == 1)
			{
				echo "success";
			}
			else
			{
				echo "fail";
			}
		}
		else
		{
			$insert = $this->common->insert_rate($data);
			if($insert == 1)
			{
				echo "success";
			}
			else
			{
				echo "fail";
			}
		}

	}
}