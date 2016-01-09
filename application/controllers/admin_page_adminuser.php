<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_page_adminuser extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->title = 'Admin - Add User';
        $this->load->model('AdminModel');
        $this->load->library('alert');
        $this->load->library("pagination");
        $this->load->library("paginatedesign");
    }
    
    public function index() {
        if ( $this->session->has_userdata('valid') &&
             $this->session->has_userdata('adminFirstname') &&
             $this->session->has_userdata('adminLastname') &&
             $this->session->has_userdata('adminToken')) 
        {
            $data['title'] = $this->title;
            $this->load->view('admin_includes/head',$data);
            $this->load->view('admin_includes/banner');
            $this->load->view('admin_includes/sidebar');
            $this->load->view('admin_includes/admin-pages/add_admin');
            $this->load->view('admin_includes/footer');
        } else {
            redirect(base_url().'index.php/admin_logout/logout');
            exit();
        }
    }
    
    public function add_exec(){
        if ( $this->session->has_userdata('valid') &&
             $this->session->has_userdata('adminFirstname') &&
             $this->session->has_userdata('adminLastname') &&
             $this->session->has_userdata('adminToken')) 
        {
            $data['title'] = $this->title;
            $validate = array(
                array(
                    'field' => 'adminUsername',
                    'label' => 'Username',
                    'rules' => 'required|min_length[5]|is_unique[admin.username]'
                ),
                array(
                    'field' => 'adminPassword',
                    'label' => 'Password',
                    'rules' => 'required|min_length[6]'
                ),
                array(
                    'field' => 'adminFirstname',
                    'label' => 'First Name',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'adminLastname',
                    'label' => 'Last Name',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'adminEmail',
                    'label' => 'Email',
                    'rules' => 'required|valid_email'
                ),
                array(
                    'field' => 'adminBirthdate',
                    'label' => 'Birth Date',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'adminGender',
                    'label' => 'Gender',
                    'rules' => 'required'
                )
            );
            $this->form_validation->set_rules($validate);
            if($this->form_validation->run() == false) {
                $this->index();
            } else {
                $user = array(
                    $this->input->post('adminUsername'),
                    $this->input->post('adminPassword'),
                    $this->input->post('adminFirstname'),
                    $this->input->post('adminLastname'),
                    $this->input->post('adminEmail'),
                    $this->input->post('adminBirthdate'),
                    $this->input->post('adminGender')
                );
                $add = $this->AdminModel->add($user);
                if ($add) {
                    $this->session->set_flashdata('success',$this->alert->successAlert('Admin user has successfully added.'));
                    redirect(base_url().'index.php/admin_page_adminuser/adminList');
                    exit();
                } else {
                    $this->session->set_flashdata('error',$this->alert->successAlert('Cannot add admin user.'));
                    redirect(base_url().'index.php/admin_page_adminuser');
                    exit();
                }
            }
        } else {
            redirect(base_url().'index.php/admin_logout/logout');
            exit();
        }
    }
    
    public function adminList() {
        if ( $this->session->has_userdata('valid') &&
             $this->session->has_userdata('adminFirstname') &&
             $this->session->has_userdata('adminLastname') &&
             $this->session->has_userdata('adminToken')) 
        {
            $config = $this->paginatedesign->bootstrapPagination();
            $data['title'] = 'Admin - List';
            $config['base_url'] = base_url() . "admin_page_adminuser/adminList";
            $config['total_rows'] = $this->AdminModel->record_count();
            $config['per_page'] = 1;
            $config['uri_segment'] = 3;
            $this->pagination->initialize($config);

            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["results"] = $this->AdminModel->fetch_admin($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();
            $this->load->view('admin_includes/head',$data);
            $this->load->view('admin_includes/banner');
            $this->load->view('admin_includes/sidebar');
            $this->load->view('admin_includes/admin-pages/admin_list');
            $this->load->view('admin_includes/footer');
        } else {
            redirect(base_url().'index.php/admin_logout/logout');
            exit();
        }
    }
    
    public function setting() {
        if ( $this->session->has_userdata('valid') &&
             $this->session->has_userdata('adminFirstname') &&
             $this->session->has_userdata('adminLastname') &&
             $this->session->has_userdata('adminToken')) 
        {
            $result = $this->AdminModel->myAccount();
            $data = array(
                'firstname' => $result->admin_firstname,
                'lastname' => $result->admin_lastname,
                'email' => $result->admin_email,
                'birthdate' => $result->admin_birthdate,
                'gender' => $result->admin_gender
            );
            $data['title'] = 'Admin - Settings';
            $this->load->view('admin_includes/head',$data);
            $this->load->view('admin_includes/banner');
            $this->load->view('admin_includes/sidebar');
            $this->load->view('admin_includes/admin-pages/admin_settings');
            $this->load->view('admin_includes/footer');
        } else {
            redirect(base_url().'index.php/admin_logout/logout');
            exit();
        }
    }
    
    public function settingExec(){
        $validate = array(
            array(
                'field' => 'adminFirstname',
                'label' => 'Firstname',
                'rules' => 'required'
            ),
            array(
                'field' => 'adminLastname',
                'label' => 'Lastname',
                'rules' => 'required'
            ),
            array(
                'field' => 'adminEmail',
                'label' => 'Email',
                'rules' => 'required|valid_email'
            ),
            array(
                'field' => 'adminBirthdate',
                'label' => 'Birth Date',
                'rules' => 'required'
            ),
            array(
                'field' => 'adminGender',
                'label' => 'Gender',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($validate);
        if ($this->form_validation->run() == false) {
            $this->setting();
        } else {
            $admin = array(
               'admin_firstname' => $this->input->post('adminFirstname'),
               'admin_lastname' => $this->input->post('adminLastname'),
               'admin_email' => $this->input->post('adminEmail'),
               'admin_birthdate' => $this->input->post('adminBirthdate'),
               'admin_gender' => $this->input->post('adminGender')
            );
            $result = $this->AdminModel->accountUpdate($admin);
            if ($result) {
                $this->session->set_flashdata('success',$this->alert->successAlert('Admin user has successfully updated.'));
                redirect(base_url().'index.php/admin_page_adminuser/setting');
            } else {
                $this->session->set_flashdata('error',$this->alert->successAlert('Cannot update account.'));
                redirect(base_url().'index.php/admin_page_adminuser/setting');
            }
        }
    }
    
}
