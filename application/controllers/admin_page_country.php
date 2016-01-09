<?php

class admin_page_country extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->title = 'Admin - Country';
        $this->load->library('alert');
        $this->load->model('CountryModel');
        $this->load->library("pagination");
        $this->load->library("paginatedesign");
    }
    
    public function index(){
        if ( $this->session->has_userdata('valid') &&
             $this->session->has_userdata('adminFirstname') &&
             $this->session->has_userdata('adminLastname') &&
             $this->session->has_userdata('adminToken')) 
        {
            $data['title'] = $this->title;
            $config = $this->paginatedesign->bootstrapPagination();
            $config['base_url'] = base_url() . "admin_page_country/index";
            $config['total_rows'] = $this->CountryModel->record_count();
            $config['per_page'] = 10;
            $config['uri_segment'] = 3;
            $this->pagination->initialize($config);

            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["results"] = $this->CountryModel->fetch_country($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();
            
            $this->load->view('admin_includes/head',$data);
            $this->load->view('admin_includes/banner');
            $this->load->view('admin_includes/sidebar');
            $this->load->view('admin_includes/admin-pages/country');
            $this->load->view('admin_includes/footer');
        } else {
            redirect(base_url().'index.php/admin_logout/logout');
            exit();
        }
    }
    
    public function addExec(){
        if ( $this->session->has_userdata('valid') &&
             $this->session->has_userdata('adminFirstname') &&
             $this->session->has_userdata('adminLastname') &&
             $this->session->has_userdata('adminToken')) 
        {
            
            $countryName = $this->CountryModel->addCountry($this->input->post('countryName'));
            if ($countryName){
                $this->session->set_flashdata('success',$this->alert->successAlert('Country has been added successfully.'));
                redirect(base_url().'index.php/admin_page_country');
                exit();
            } else {
                $this->session->set_flashdata('error',$this->alert->errorAlert('Country name has already in the list.'));
                redirect(base_url().'index.php/admin_page_country');
                exit();
            }
        } else {
            redirect(base_url().'index.php/admin_logout/logout');
            exit();
        }
    }
    
    public function editCountry() {
        if ( $this->session->has_userdata('valid') &&
             $this->session->has_userdata('adminFirstname') &&
             $this->session->has_userdata('adminLastname') &&
             $this->session->has_userdata('adminToken')) 
        {
            $data = array(
                'id' => $this->input->post('id'),
                'status' => $this->input->post('status')
            );
            $countryEdit = $this->CountryModel->editCountry($data);
            if ($countryName){
                $this->session->set_flashdata('success',$this->alert->successAlert('Successfully edited.'));
                redirect(base_url().'index.php/admin_page_country');
                exit();
            } else {
                $this->session->set_flashdata('error',$this->alert->errorAlert('Error cannot update country.'));
                redirect(base_url().'index.php/admin_page_country');
                exit();
            }
        } else {
            redirect(base_url().'index.php/admin_logout/logout');
            exit();
        }
    }
    
}
