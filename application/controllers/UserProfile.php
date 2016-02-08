<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class userProfile extends CI_Controller {

	public function __construct() {
	    parent::__construct();
	    $this->load->model("common");
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

    public function index(){

    	$data['user_info'] = $user_info = $this->session->userdata('user_info');
    	$subID = $user_info->subID;
    	$uid = $_GET['id'];
    	$data['profile'] = $this->common->getrow('subscribers',array("subID" => $uid));
    	$data['homes'] = $this->common->getall('homes',array('ownerID'=>$uid));
    	$data['reviews'] = $this->common->getall('ratings_reviews',array('to_userId'=>$uid));
		$where = array(
				"rate_to" 		=> $uid,
				"rate_from"		=> $subID
			);
    	$user_rating = $this->common->getrow3('ratings_user', $where);
    	if($user_rating !== NULL)
    	{
    		$data['rate_value'] = $user_rating->rate_number;
    	}
    	else
    	{
    		$data['rate_value'] = 0;
    	}

    	$data['userRate_review'] = $this->common->getall('ratings_user',array('rate_to'=>$uid));

    	$this->load->library('pagination'); 
		$config = array();
		$config["base_url"] =  base_url()."/userProfile/?id=$uid";
		$total_row = sizeof($data['homes']);
		$config["total_rows"] = $total_row;
		$config["per_page"] = 3;
		$config['uri_segment'] = 3;
		$config['page_query_string'] = TRUE;
		
		//$config['num_links'] = $total_row;
       	$config['full_tag_open'] = '<nav class="pull-right"><ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav><!--pagination-->';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		
		
		$offset = (isset($_GET["per_page"])) ? $_GET["per_page"]: 0; 		

		$data['homes'] = $this->common->fetch_homes_user($config["per_page"], $offset, $uid);
		$data["links"] 	 = $this->pagination->create_links();


    	$this->load->view('includes/head');
		$this->load->view('includes/nav',$data);
    	$this->load->view("user_view_page_profile");
    	$this->load->view('includes/footer2');

    }

    public function rate_user()
    {
		$data['user_info'] = $user_info = $this->session->userdata('user_info');
		$myid = $user_info->subID;
		$user_to = $this->input->post('user_to');
		$rateValue = $this->input->post('rateValue');
		$data = array(
				"rate_from" 	=> $myid,
				"rate_to" 		=> $user_to,
				"rate_number"	=> $rateValue
			);

		$where = array(
				"rate_to" 		=> $user_to,
				"rate_from"		=> $myid
			);
		$checkData = $this->common->getrow2('ratings_user', $where);
		if(!empty($checkData))
		{
			$update = $this->common->change('ratings_user',$data, $where);
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
			$insert = $this->common->add('ratings_user',$data);
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
	function submit_comment()
	{
		$data['user_info'] = $user_info = $this->session->userdata('user_info');
		$myid = $user_info->subID;
		$user_to			= $this->input->post('user_to');
		$comment 			= $this->input->post('comment');

		$data = array("comment" => $comment);
		$where = array(
				"rate_to" 		=> $user_to,
				"rate_from"		=> $myid
			);
		$checkData = $this->common->getrow2('ratings_user', $where);
		if(!empty($checkData))
		{
			$update = $this->common->change('ratings_user',$data, $where);
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
			$insert = $this->common->add('ratings_user',$data);
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
}