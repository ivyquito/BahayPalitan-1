<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class admin_logout extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->userData = array(
            'valid',
            'adminId',
            'adminFirstname',
            'adminLastname',
            'adminToken'
        );
    }
    
    public function logout(){
        $this->session->userdata($this->userData);
        $this->session->sess_destroy();
        redirect(base_url().'admin_login');
        exit();
    }
}
