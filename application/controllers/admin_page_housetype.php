<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/***
 * Admin Page House Type Controller
 */
class admin_page_housetype extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->title = 'Admin Add House Type';
        $this->load->model('HouseTypeModel');
        $this->load->library('alert');
        $this->load->library("pagination");
        $this->load->library("paginatedesign");
    }
    
    /****
     * admin house page
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
            $config['base_url'] = base_url() . "admin_page_housetype/index";
            $config['total_rows'] = $this->HouseTypeModel->record_count();
            $config['per_page'] = 2;
            $config['uri_segment'] = 3;
            $this->pagination->initialize($config);

            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["results"] = $this->HouseTypeModel->fetch_house_type($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();
            $this->load->view('admin_includes/head',$data);
            $this->load->view('admin_includes/banner');
            $this->load->view('admin_includes/sidebar');
            $this->load->view('admin_includes/admin-pages/house-type');
            $this->load->view('admin_includes/admin-modals/add-house-type-modal');
            $this->load->view('admin_includes/footer');
         } else {
            redirect(base_url().'index.php/admin_logout/logout');
            exit();
        }
    }

    /***
     * Add house type
     * @param
     * @return string
     */
    public function addHouseTypeExec(){
        $description = $this->input->post('houseTypeDescription');
        $houseType = $this->HouseTypeModel->addHouseType($description);
        if ($houseType['valid']){
            $this->session->set_flashdata('success',$this->alert->successAlert('House type has been added successfully.'));
            redirect(base_url().'admin_page_housetype');
            exit();
        } else {
            $this->session->set_flashdata('error',$this->alert->errorAlert('Cannot add plan. House type has same name in list.'));
            redirect(base_url().'admin_page_housetype');
            exit();
        }
    }
    
    /***
     * Edit house type
     * @param
     * @return string
     */
    public function editHouseType(){
        $houseType = array(
            $this->input->post('id'),
            $this->input->post('description')
        );
        $house = $this->HouseTypeModel->editHouseType($houseType);
        if ($house['valid']) {
            echo 'House Type has successfully edited.';
        } else {
            echo 'Canot edit! The house type youve entered is already exist.';
        }
    }// end of function
    
    /***
     * Delete house type
     * @param
     * @return string
     */
    public function deleteHouseType(){
        $id = $this->input->post('id');
        $delete = $this->HouseTypeModel->deleteHouseType($id);
        if ($delete){
            echo 'House Type successfully deleted.';
        } else {
            echo 'Cannot delete house type.';
        }
    }
	
	
}