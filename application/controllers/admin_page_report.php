<?php

class admin_page_report extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->title = 'Admin - Report Abuse';
        $this->load->library('alert');
        $this->load->model('ReportModel');
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
            $config['base_url'] = base_url() . "admin_page_report/index";
            $config['total_rows'] = $this->ReportModel->record_count();
            $config['per_page'] = 10;
            $config['uri_segment'] = 3;
            $this->pagination->initialize($config);

            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["results"] = $this->ReportModel->fetch_report($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();
            
            $this->load->view('admin_includes/head',$data);
            $this->load->view('admin_includes/banner');
            $this->load->view('admin_includes/sidebar');
            $this->load->view('admin_includes/admin-pages/report');
            $this->load->view('admin_includes/footer');
        } else {
            redirect(base_url().'index.php/admin_logout/logout');
            exit();
        }
    }
    
    public function view($get){
        if ( $this->session->has_userdata('valid') &&
             $this->session->has_userdata('adminFirstname') &&
             $this->session->has_userdata('adminLastname') &&
             $this->session->has_userdata('adminToken')) 
        {
            
            if(isset($get)){
                $data['viewhome'] = $home = $this->common->getviewhome2($get);
                    
                    //get all reviews
                    $data['reviews'] = $reviews = $this->common->getreviews($get);
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
                        $safety             = $safety + $value->safety;
                        $comfort            = $comfort + $value->comfort;
                        $cleanliness        = $cleanliness + $value->cleanliness;
                        $environment        = $environment + $value->environment;
                        $accessibility      = $accessibility + $value->accessibility;
                        $hospitality        = $hospitality + $value->hospitality;
                        $honesty            = $honesty + $value->honesty;
                        $reliability        = $reliability + $value->reliability;
                        $overallimpression  = $overallimpression + $value->overallimpression;
                        $ctr++;
                    }
                        if($ctr != 0):
                        $a['safety']            = $safety / $ctr;
                        $a['comfort']           = $comfort / $ctr;
                        $a['cleanliness']       = $cleanliness / $ctr;
                        $a['environment']       = $environment / $ctr;
                        $a['accessibility']     = $accessibility / $ctr ;
                        $a['hospitality']       = $hospitality / $ctr ;
                        $a['honesty']           = $honesty / $ctr;
                        $a['reliability']       = $reliability / $ctr;
                        $a['overallimpression'] = $overallimpression / $ctr;
                        else:
                        $a = '';
                        endif;
                    $data['total']  = $ctr;
                    $data['rate']   = $a;
                    

                    $this->load->view('admin_includes/head',$data);
                    $this->load->view('admin_includes/banner');
                    $this->load->view('admin_includes/sidebar');
                    $this->load->view('admin_includes/admin-pages/reportview');
                    $this->load->view('admin_includes/footer');
            }else{redirect(base_url().'admin_page_report');}
                

        } else {
            redirect(base_url().'index.php/admin_logout/logout');
            exit();
        }
    }

    public function deactive(){
        if ( $this->session->has_userdata('valid') &&
             $this->session->has_userdata('adminFirstname') &&
             $this->session->has_userdata('adminLastname') &&
             $this->session->has_userdata('adminToken')) 
        {
            
            if($_POST){

                $got['ownerID']    = trim($this->input->post('ownerId'));
                $got['homeID']     = trim($this->input->post('homeId'));
                $this->common->change('homes',array('swapStatus'=>'DEACTIVE'),$got);
                redirect(base_url().'admin_page_report/view/'.$got['homeID']);
            }else{redirect(base_url().'admin_page_report');}
                

        } else {
            redirect(base_url().' index.php/admin_logout/logout');
            exit();
        }
    }
    
    
    
}
