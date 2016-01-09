<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_page_houseareas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->title = 'Admin House Area Page';
        $this->load->library('alert');
        $this->load->model('HouseAreaTypeModel');
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
            $config['base_url'] = base_url() . "admin_page_houseareas/index";
            $config['total_rows'] = $this->HouseAreaTypeModel->record_count();
            $config['per_page'] = 3;
            $config['uri_segment'] = 3;
            $this->pagination->initialize($config);

            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["results"] = $this->HouseAreaTypeModel->fetch_area_type($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();
        
            $this->load->view('admin_includes/head',$data);
            $this->load->view('admin_includes/banner');
            $this->load->view('admin_includes/sidebar');
            $this->load->view('admin_includes/admin-pages/housearea');
            $this->load->view('admin_includes/admin-modals/add-area-type-modal');
            $this->load->view('admin_includes/footer');
        } else {
            redirect(base_url().'index.php/admin_logout/logout');
            exit();
        }
    }
    
    /***
     * Add House Area type exec
     * @param 
     * @return string
     */
    public function addHouseAreaTypeExec(){
        $description = $this->input->post('houseAreaTypeDescription');
        $houseAreaType = $this->HouseAreaTypeModel->addHouseAreaType($description);
        if ($houseAreaType['valid']){
            $this->session->set_flashdata('success',$this->alert->successAlert('House area type has been added successfully.'));
            redirect(base_url().'admin_page_houseareas');
            exit();
        } else {
            $this->session->set_flashdata('error',$this->alert->errorAlert('Cannot add house area type. House area type has same name in list.'));
            redirect(base_url().'admin_page_houseareas');
            exit();
        }
    }
    
    public function editHouseAreaType(){
        $data = array(
            $this->input->post('id'),
            $this->input->post('description')
        );
        $houseAreaType = $this->HouseAreaTypeModel->editHouseAreaType($data);
        if ($houseAreaType['valid']) {
            echo 'House area type edited successfully.';
        } else {
            echo 'Cannot update. House area type already exist.';
        }
    }
    
    public function deleteHouseAreaType(){
        $id = $this->input->post('id');
        $houseAreaType = $this->HouseAreaTypeModel->deleteHouseAreaType($id);
        if ($houseAreaType) {
            echo 'House area type deleted successfully.';
        } else {
            echo 'Cannot delete house area type.';
        }
    }
}