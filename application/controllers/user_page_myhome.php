<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_page_myhome extends CI_Controller {
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
		$data['user_info'] = $user_info = $this->session->userdata('user_info');
		
			if(isset($_POST['savehome'])){
				$locationData = array(
						"countryID"		 => 	1,
						"cityName"		 => 	$this->input->post('formatted_address'),
						"latitude"		 => 	$this->input->post('lat'),
						"longitude"		 => 	$this->input->post('lng'),
						"status"		 => 	'active'
					);

				$insertLocation = $this->common->addLocation($locationData);
				if($insertLocation == "success")
				{
					$getLoc = $this->common->getLastRowLocation();
					$locID = $getLoc->locID;

					// $locID 			= trim($this->input->post('locID'));
					$image 			= $_FILES['image'];
					$areaType 		= trim($this->input->post('areaType'));
					$houseType 		= trim($this->input->post('houseType'));
					$HomePostType	= trim($this->input->post('homePostType'));
					$amenities 		= trim($this->input->post('amenities'));
					$maxGuests 		= trim($this->input->post('maxGuests'));
					$checking 		= false;
					

					// if(!empty($ownerID) && !empty($areaType) && !empty($houseType) && !empty($image) && !empty($locID) && !empty($amenities) && !empty($maxGuests) && !empty($swapStatus) && !empty($dealNeg) && !empty($cancelledNeg))
					if($areaType != "" && $houseType != "" && $image != "" && $locID != "" && $amenities != "" && $maxGuests != "")
					{	
						$checking = true;
					}else{
						
						$data['error'] =  'Please Fill up all Fields..';
					}
					if(!is_numeric($maxGuests)){
						$checking = false;
						$data['error'] =  'Max Guests field is not number..';
					}
					if($checking == true){
						$target_dir 	= "uploads/";
						$target_file 	= $target_dir . basename($_FILES["image"]["name"]);
						$imageFileType 	= pathinfo($target_file,PATHINFO_EXTENSION);
						$newname 		= 'home'.$user_info->subID.'_'.date('Ymdhis');
						$uploadtarget 	= $target_dir . $newname .'.'.$imageFileType;

						//$dir = '/uploads/';				
						//$path = $dir.'main_'.$user_info->subID.date('Y-m-i');
						//$path = $dir.$image['name'];
						move_uploaded_file($image['tmp_name'], $uploadtarget);

						$newdata = array(
							'ownerID'	=> $user_info->subID, 
							'ATypeID'	=> $areaType, 
							'HTypeID'	=> $houseType, 
							'locID'		=> $locID, 
							'photos'	=> $newname.'.'.$imageFileType, 
							'amenities'	=> $amenities, 
							'maxGuests'	=> $maxGuests, 
							'swapStatus'=> 'ACTIVE', 
							'homePostType'=> $HomePostType, 
							'dealNegotiation'=> 0, 
							'cancelledNegotiation'=> 0
							);
						$solud = $this->common->add_and_get_id('homes',$newdata);
						if($this->common->getrow('travel_plan', array('subID'=>$user_info->subID))){
							$update['swapStatus'] = 'ACTIVE';
							$wr['homeID'] 	= $solud->homeID;
							$wr['ownerID'] 	= $user_info->subID;
							$this->common->change('homes', $update, $wr);
						}
						unset($_POST);
						
						if($solud){
							if($this->common->getrow('travel_plan', array('subID'=>$user_info->subID))){
								$this->session->set_flashdata('success', 'Home successfully added.');
								redirect(base_url().'user_page_myhome');
								exit;
							}else{
								$this->session->set_flashdata('success', 'You can now add your travel plan.');
								redirect(base_url().'user_page_travelplan');
								exit;
							}
						}
					}

				}
				else
				{
					echo "<script>
							alert('Fail to insert location.');
						</script>";
				}


			}
			
		
		$uid = $user_info->subID;
		$check = $this->common->getall('homes',array('ownerID'=>$uid));
		$data['counthome']	= count($check);
		if(count($check) == 1){
		$bk = $this->common->getrow('homes',array('ownerID'=>$uid));
		redirect(base_url().'user_page_myhome/myhome/'.$bk->homeID);
		exit(); 
		}elseif(count($check) > 1){
		$data['more_homes'] = $this->common->gethomes($uid);
		}else{
			$data['area_type'] = $this->common->getall('area_type');
			$data['house_type'] = $this->common->getall('house_type');
			$data['locations'] = $this->common->getall('locations');
		}
		
		$this->load->view('includes/head');
		$this->load->view('includes/nav',$data);
		if($check){
		$this->load->view('user_view_page_myhomes', $data);	
		}else{
		$this->load->view('user_view_page_addhome', $data);
		}
		$this->load->view('includes/footer2');

	}
	function change_home_photo($home){
		if($this->session->userdata('user_info')==''){
				redirect(base_url().'index.php/user_login');
				exit();
		}
		echo $home;
		$data['user_info'] = $user_info = $this->session->userdata('user_info');
		if($_POST){
					$image 			= $_FILES['new_photo'];
					if($image == ''){
						$this->session->set_flashdata('error','empty file...');
						//redirect(base_url().'user_page_myhome/myhome/'.$home);
						exit();
					}else{
					$target_dir 	= "uploads/";
					$target_file 	= $target_dir . basename($_FILES["new_photo"]["name"]);
					$imageFileType 	= pathinfo($target_file,PATHINFO_EXTENSION);
					$newname 		= 'home'.$user_info->subID.'_'.date('Ymdhis');
					$uploadtarget 	= $target_dir . $newname .'.'.$imageFileType;

					//$dir = '/uploads/';				
					//$path = $dir.'main_'.$user_info->subID.date('Y-m-i');
					//$path = $dir.$image['name'];
					move_uploaded_file($image['tmp_name'], $uploadtarget);
					$nii = $this->common->getrow('homes',array('homeID'=>$home));
					unlink($target_dir.$nii->photos);
					$newdata = array(
						'photos'	=> $newname.'.'.$imageFileType
						);

					$this->common->change('homes',$newdata, array('homeID' => $home));
					unset($_POST);
					redirect(base_url().'user_page_myhome/myhome/'.$home); exit;
				}
		}
	}
	function add_home(){
		if($this->session->userdata('user_info')==''){
				redirect(base_url().'index.php/user_login');
				exit();
		}
		$data['user_info'] = $user_info = $this->session->userdata('user_info');


		$data['area_type'] = $this->common->getall('area_type');
		$data['house_type'] = $this->common->getall('house_type');
		$data['locations'] = $this->common->getall('locations');
		$this->load->view('includes/head');
		$this->load->view('includes/nav',$data);
		$this->load->view('user_view_page_addhome', $data);
		$this->load->view('includes/footer2');
	}
	function add_home_photos($num){
		if($this->session->userdata('user_info')==''){
				redirect(base_url().'index.php/user_login');
				exit();
		}
		$data['user_info'] = $user_info = $this->session->userdata('user_info');
		$home = $this->common->getrow('homes',array('ownerID'=> $user_info->subID,'homeID' => $num));
		if(!$home){
			redirect(base_url().'user_page_myhome');
				exit();
		}

		$uploadOk = 1;
		// Check if image file is a actual image or fake image
		if(isset($_POST["upload"])) {
		    $check = getimagesize($_FILES["photo"]["tmp_name"]);
		    if($check !== false) {
		        $uploadOk = 1;
		    } else {
		        $this->session->set_flashdata('error', 'File is not an image.');
		        $uploadOk = 0;
		    }

		    $target_dir 	= "uploads/";
			$target_file 	= $target_dir . basename($_FILES["photo"]["name"]);
			$imageFileType 	= pathinfo($target_file,PATHINFO_EXTENSION);
			$newname 		= $user_info->subID.'_'.date('Ymdhis');
			$uploadtarget 	= $target_dir . $newname .'.'.$imageFileType;
		
			// Check file size
			if ($_FILES["photo"]["size"] > 500000) {
			    $this->session->set_flashdata('error', 'Sorry, your file is too large.');
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				$this->session->set_flashdata('error', 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
			    $uploadOk = 0;
			}
			if( $uploadOk == 1){
				
			    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $uploadtarget)) {
			    	$insert = array(
			    				'homeID'=> $home->homeID,
			    				'image' => $newname.'.'.$imageFileType
			    				);
			    	$this->common->add('more_photos',$insert);
			        $this->session->set_flashdata("success","The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.");

			    } else {
			        $this->session->set_flashdata('error', 'Sorry, there was an error uploading your file.');
			    }
			}
			redirect(base_url().'user_page_myhome/myhome/'.$num);
		}

	}
	function myhome_delete($home_id){
		if($this->session->userdata('user_info')==''){
				redirect(base_url().'user_login');
				exit();
		}
		if($home_id == NULL){
				redirect(base_url().'user_page_myhome');
				exit();
		}
		$data['user_info'] 	= $user_info = $this->session->userdata('user_info');
		$uid 				= $user_info->subID;
		$my['ownerID'] = $uid;
		$my['homeID'] 	= $home_id;
		$my2['homeID'] 	= $home_id;
		$ni = $this->common->getrow('homes',$my);
		if($ni){
			$target_dir 	= "uploads/";
			if($ni->photos != null){
				if(file_exists($target_dir.$ni->photos)){
					unlink($target_dir.$ni->photos);
				}
			}
			$nee = $this->common->getall('more_photos',$my2);
			if($nee){
				foreach($nee as $kani){
					if(file_exists($target_dir.$kani->image)){
						unlink($target_dir.$kani->image);
					}
				}
				$this->common->remove('more_photos',$my2);
			}
			$this->common->remove('homes',$my);
		}
		redirect(base_url().'user_page_myhome');
		exit();
	}
	function myhome($home_id){ 
		if($this->session->userdata('user_info')==''){
				redirect(base_url().'user_login');
				exit();
		}
		if($home_id == NULL){
				redirect(base_url().'user_page_myhome');
				exit();
		}

		$data['user_info'] 	= $user_info = $this->session->userdata('user_info');
		$uid 				= $user_info->subID;
		$counthome 			= $this->common->getall('homes',array('ownerID'=>$uid));
		$data['counthome']	= count($counthome);

		$check 	= $this->common->getrow('homes',array('ownerID'=>$uid,'homeID' =>$home_id));
		if($check){
			//get all reviews
			$data['reviews'] = $reviews = $this->common->getreviews_myhome($home_id);
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

			$home['ownerID'] = $uid;
			$home['homeID'] = $home_id;
			$data['myhome'] = $this->common->getmyhome($home);
			$data['more_photos'] = $this->common->getall('more_photos', array('homeID'=>$check->homeID));
		}else{
			redirect(base_url().'user_page_myhome');
		}

		$this->load->view('includes/head');
		$this->load->view('includes/nav',$data);
		$this->load->view('user_view_page_myhome', $data);	
		$this->load->view('includes/footer2');
	}
	function edit_home($num){
		if($this->session->userdata('user_info')==''){
				redirect(base_url().'user_login');
				exit();
		}
		if($num == NULL){
				redirect(base_url().'user_page_myhome');
				exit();
		}

		$data['user_info'] 	= $user_info = $this->session->userdata('user_info');
		$uid 				= $user_info->subID;


		$check 	= $this->common->getrow('homes',array('ownerID'=>$uid,'homeID' =>$num));	
		if($check){
			$home['ownerID'] = $uid;
			$home['homeID'] = $num;
			$data['myhome'] = $this->common->getmyhome($home);
		}else{
			redirect(base_url().'user_page_myhome');
			exit;
		}

		$data['area_type'] = $this->common->getall('area_type');
		$data['house_type'] = $this->common->getall('house_type');
		$data['locations'] = $this->common->getall('locations');

		$this->load->view('includes/head');
		$this->load->view('includes/nav',$data);
		$this->load->view('user_view_page_edithome', $data);	
		$this->load->view('includes/footer2');
	}
	function update_home($num){
		if($this->session->userdata('user_info')==''){
				redirect(base_url().'user_login');
				exit();
		}
		if($num == NULL){
				redirect(base_url().'user_page_myhome');
				exit();
		}

		$data['user_info'] 	= $user_info = $this->session->userdata('user_info');
		$uid 				= $user_info->subID;
		


		$check 	= $this->common->getrow('homes',array('ownerID'=>$uid,'homeID' =>$num));
		if($check){
			$locID = $this->input->post('locationId');
			$locationData = array(
					"cityName"			=> $this->input->post('formatted_address'),
					"latitude"			=> $this->input->post('lat'),
					"longitude"			=> $this->input->post('lng')
				);
			$upLocation = $this->common->updateLocation($locID,$locationData);

			if($upLocation == "success")
			{
				// $locID 			= trim($this->input->post('locID'));
				$areaType 		= trim($this->input->post('areaType'));
				$houseType 		= trim($this->input->post('houseType'));
				$amenities 		= trim($this->input->post('amenities'));
				$maxGuests 		= trim($this->input->post('maxGuests'));
				if(empty($locID) || empty($areaType) || empty($houseType) || empty($amenities) || empty($maxGuests)){
					$this->session->set_flashdata('error','Emtpy Field(s)...');
				}
				else{
					$update = array(
						'locID'		=> $locID,
						'ATypeID'	=> $areaType,
						'HTypeID'	=> $houseType,
						'amenities'	=> $amenities,
						'maxGuests'	=> $maxGuests,
						);
					$this->common->change('homes',$update,array('ownerID'=>$uid,'homeID' =>$num));
					redirect(base_url().'user_page_myhome/myhome/'.$num);
				}
			}
			else
			{
				echo "<script>
					alert('false');
				</script>";
			}
		}else{
			redirect(base_url().'user_page_myhome');
			exit;
		}
	}
}