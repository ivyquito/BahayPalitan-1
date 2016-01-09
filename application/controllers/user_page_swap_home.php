<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_page_swap_home extends CI_Controller {

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
		$uid = $user_info->subID;
		$myplan = $this->common->getrow('travel_plan',array('subID'=>$user_info->subID));
		$where = array(
			'homes.locID'=>$myplan->locID,
			'homes.swapStatus'=>'ACTIVE',
			'homes.maxGuests' => 2,
			'travel_plan.PStartDate'=>$myplan->PStartDate,
			'travel_plan.PEndDate'=>$myplan->PEndDate
			);
		$get_all_my_home = $this->common->getall('homes', array('ownerID'=>$uid));
		$variable = $this->common->getall('home_swap','','date_swapped');
		$swapped_record = array();
		if($get_all_my_home){
			foreach ($variable as $swap_home){ 
				foreach($get_all_my_home as $pass_val){
					//$test = $this->common->swapped($pass_val->homeID);
					///$get_all_my_home = $this->common->getall('homes', array('ownerID'=>$uid));
					//$test_in_array = $test;

					if(($swap_home->swap_home == $pass_val->homeID OR $swap_home->swap_home_to == $pass_val->homeID) AND 
					($swap_home->action == 'swapped' OR $swap_home->action == 'done' OR 
					$swap_home->action == 'done-pending')){

					//if(count($test_in_array)>0){
						//foreach($test_in_array as $ger):
						//foreach ($ger as $key => $value) { 
							if($swap_home->swap_home != $pass_val->homeID){ 
								$swapped_record[] = $this->common->gethome_id($swap_home->swap_home); 
							}elseif($swap_home->swap_home_to != $pass_val->homeID){ 
								$swapped_record[] = $this->common->gethome_id($swap_home->swap_home_to); 
							}else{
								continue;
							}
						//}
						//endforeach;
					}
				}
			}
		}
		
		//pagintaion 
		$this->load->library('pagination');
		$config = array();
		$config["base_url"] = base_url() . "user_page_swap_home/index";
		$total_row = sizeof($swapped_record);
		$config["total_rows"] = $total_row;
		$config["per_page"] = $per_page = 6;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = $total_row;
		$config['cur_tag_open']  = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$this->pagination->initialize($config);

		$start	 = $per_page * ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$counter = 0;
		$xx		 = 0;
		$haystack = array();
		foreach($swapped_record as $got){
				if($start <= $xx && $per_page >= $counter){
				$haystack[] = $got;
				$counter++;
				}
				$xx++;
		}

		foreach($haystack as $nae){
			echo $nae->homeID;
		}
		$data['match_homes'] = $haystack;
		$data["links"] 	 	= $this->pagination->create_links();
		$this->load->view('includes/head');
		$this->load->view('includes/nav',$data);
		$this->load->view('user_view_page_swap_home', $data);
		$this->load->view('includes/footer2');

	}
}