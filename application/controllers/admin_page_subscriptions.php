<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_page_subscriptions extends CI_Controller {

public function __construct() {
        parent::__construct();
        $this->title = 'Admin Subscription Page';
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
            $data = array(
                'title' => $this->title,
            );
            $this->load->view('admin_includes/head',$data);
            $this->load->view('admin_includes/banner');
            $this->load->view('admin_includes/sidebar');
            $this->load->view('admin_includes/admin-pages/subscription');
            $this->load->view('admin_includes/footer');
        } else {
            redirect(base_url().'index.php/admin_logout/logout');
            exit();
        }
    }
	
}