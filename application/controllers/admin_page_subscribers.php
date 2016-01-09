<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_page_subscribers extends CI_Controller {

public function __construct() {
        parent::__construct();
        $this->title = 'Admin Subscribers Page';
        $this->load->library('alert');
        $this->load->model('SubscriberModel');
        $this->load->library("pagination");
        $this->load->library("paginatedesign");
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
            $data['title'] = $this->title;
            $config = $this->paginatedesign->bootstrapPagination();
            $config['base_url'] = base_url() . "admin_page_subscribers/index";
            $config['total_rows'] = $this->SubscriberModel->record_count();
            $config['per_page'] = 5;
            $config['uri_segment'] = 3;
            $this->pagination->initialize($config);

            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["results"] = $this->SubscriberModel->fetch_subscribers($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();
            $this->load->view('admin_includes/head',$data);
            $this->load->view('admin_includes/banner');
            $this->load->view('admin_includes/sidebar');
            $this->load->view('admin_includes/admin-pages/subscriber');
            $this->load->view('admin_includes/footer');
        } else {
            redirect(base_url().'index.php/admin_logout/logout');
            exit();
        }
    }
    
    public function deleteSubscriber(){
        $id = $this->input->post('id');
        $delete = $this->SubscriberModel->deleteSubscriber($id);
        if($delete) {
            echo 'Subscriber successfully deleted.';
        } else {
            echo 'Cannot delete subscriber';
        }
    }
	
}