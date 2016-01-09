<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_page_home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->title = 'Admin Home Page';
        $this->load->library('alert');
    }

    /***
     * Plan
     * @param
     * @return 
     */
    public function index(){
        if ( $this->session->has_userdata('valid') &&
             $this->session->has_userdata('adminFirstname') &&
             $this->session->has_userdata('adminLastname') &&
             $this->session->has_userdata('adminToken')) 
        {   
            $count  = count($this->common->getall('subscribers'));
            $active = count($this->common->getall('subscribers',array('status' => 1)));
            $inactive = count($this->common->getall('subscribers',array('status' => 0)));
            $abuse_reports = count($this->common->getall('abuse_reports'));
            $value = $this->common->getsum('payment_records','value');
            $data = array(
                'subcounter' => $count,
                'active' => $active,
                'inactive' => $inactive,
                'abuse_reports' => $abuse_reports,
                'totalamount' => $value,
                'title' => $this->title,
            );
            $this->load->view('admin_includes/head',$data);
            $this->load->view('admin_includes/banner');
            $this->load->view('admin_includes/sidebar');
            $this->load->view('admin_includes/admin-pages/homepage');
            $this->load->view('admin_includes/footer');
        } else {
            redirect(base_url().'index.php/admin_logout/logout');
            exit();
        }
    }	
	
}