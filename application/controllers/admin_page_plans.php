<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/***
 * Admin Page Plan Controller
 */

class admin_page_plans extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->title = 'Admin Add Plan';
        $this->load->model('PlanModel');
        $this->load->library('alert');
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
            $config = $this->paginatedesign->bootstrapPagination();
            $config['base_url'] = base_url() . "admin_page_plans/index";
            $config['total_rows'] = $this->PlanModel->record_count();
            $config['per_page'] = 6;
            $config['uri_segment'] = 3;
            $this->pagination->initialize($config);

            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["results"] = $this->PlanModel->fetch_plans($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();
            $data['title'] = $this->title;
            $this->load->view('admin_includes/head',$data);
            $this->load->view('admin_includes/banner');
            $this->load->view('admin_includes/sidebar');
            $this->load->view('admin_includes/admin-pages/plan');
            $this->load->view('admin_includes/admin-modals/add-plan-modal');
            $this->load->view('admin_includes/footer');
        } else {
            redirect(base_url().'index.php/admin_logout/logout');
            exit();
        }
    }
    
    /***
     * Add plan exec
     * @param
     * @return string
     */
    public function addPlanExec() {
        $planValidate = array(
            array(
                'field' => 'planName',
                'label' => 'Plan Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'planDescription',
                'label' => 'Plan Description',
                'rules' => 'required'
            ),
            array(
                'field' => 'planAmount',
                'label' => 'Plan Amount',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($planValidate);
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $data = array(
                $this->input->post('planName'),
                $this->input->post('planDescription'),
                $this->input->post('planAmount')
            );
            $plan = $this->PlanModel->addPlan($data);
            if ($plan['valid']){
                $this->session->set_flashdata('success',$this->alert->successAlert('Plan has been added successfully.'));
                redirect(base_url().'admin_page_plans');
                exit();
            } else {
                $this->session->set_flashdata('error',$this->alert->errorAlert('Cannot add plan. Plan has same name in list.'));
                redirect(base_url().'admin_page_plans');
                exit();
            }
        }
    }// end of function
	
    
    /***
     * Edit plan
     * @param
     * @return boolean
     */
    public function editPlan(){
        $data = array(
            $this->input->post('id'),
            $this->input->post('name'),
            $this->input->post('description'),
            $this->input->post('amount')
        );
        $plan = $this->PlanModel->editPlan($data);
        if ($plan['valid']){
            echo 'Record successfully updated';
        } else {
            echo 'Cannot update. Plan name is already exist.';
        }
    }// end of function
    
    public function deletePlan(){
        $id = $this->input->post('id');
        $this->PlanModel->deletePlan($id);
        echo 'Record successfully deleted.';
    }
	
}