<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_page_home extends CI_Controller {
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
		$uid 	= $user_info->subID;

		$this->load->library('pagination'); 
		$config = array();
		$config["base_url"] =  base_url()."user_page_home/index";
		$total_row = sizeof($this->common->getallhome($uid));
		$config["total_rows"] = $total_row;
		$config["per_page"] = 6;
		$config['uri_segment'] = 3;
		//$config['use_page_numbers'] = TRUE;
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
		

		
		$page 	= ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['allhome'] = $this->common->fetch_homes($config["per_page"], $page, $uid);
		$data["links"] 	 = $this->pagination->create_links();

		$this->load->view('includes/head');
		$this->load->view('includes/nav',$data);
		$this->load->view('user_view_page_home', $data);
		$this->load->view('includes/footer2');

	}
	function search(){
		
		if($this->session->userdata('user_info')==''){
				redirect(base_url().'index.php/user_login');
				exit();
		}
		$data['user_info'] 	= $user_info = $this->session->userdata('user_info');
		$uid 	= $user_info->subID;
		
		$search = false;
 
		if(	isset($_GET['search']) && isset($_GET['q']) && !empty($_GET['q'])){
			$q = $_GET['q'];
			$this->session->set_flashdata('q',$q);
			$search = true;
		}
		if($this->session->flashdata('q') != NULL){
			$q = $this->session->flashdata('q')!=NULL ? $this->session->flashdata('q') : '';
			$this->session->set_flashdata('q', $q);
			$search = true;
		}

		$this->load->library('pagination'); 
		$config = array();
		$config["base_url"] = isset($search) && $search == true ?  base_url() . "user_page_home/search" : base_url() . "user_page_home/index";
		$total_row = isset($search) && $search == true ? sizeof($this->common->search_count($uid,$q)) : sizeof($this->common->getallhome($uid));
		$config["total_rows"] = $total_row;
		$config["per_page"] = 6;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$this->pagination->initialize($config);
		

		
		$page 	= ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		//$page 	= $config["per_page"] * $page;
        $data['allhome'] =  isset($search) && $search == true ? $this->common->search_homes($config["per_page"], $page,$uid,$q) : $this->common->fetch_homes($config["per_page"], $page,$uid);
		$data["links"] 	 = $this->pagination->create_links();

		$this->load->view('includes/head');
		$this->load->view('includes/nav',$data);
		$this->load->view('user_view_page_home', $data);
		$this->load->view('includes/footer2');

	}
}