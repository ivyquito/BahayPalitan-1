<?php
/***
 * Admin Login Controller
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('AdminLoginModel');
        $this->load->library('encrypt');
        $this->load->library('alert');
        $this->title = 'Admin Login';
    }
    
    /***
     * admin login index
     * @param
     * @return 
     */
    function index(){
        $data = array(
            'title' => $this->title
        );
        $this->load->view('admin_includes/head',$data);
        $this->load->view('admin_includes/admin-pages/login');
    }
    
    /***
     * admin login exec redirection
     * @param 
     * @return boolean
     */
    function login_exec(){
        $validateLogin = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($validateLogin);
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password'))
            );
            $login = $this->AdminLoginModel->checkData($data);
            if ($login['valid']) {
                $this->session->set_userdata($login);
                redirect(base_url().'admin_page_home');
                exit();
            } else {
                $this->session->set_flashdata('error',$this->alert->errorAlert('Invalid Password / Username.'));
                redirect(base_url().'admin_login');
                exit();
            }
        }
    }
	
	
}