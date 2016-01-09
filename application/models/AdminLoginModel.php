<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/***
 * Admin Login Model
 */
class AdminLoginModel extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('random');
    }
    
    /***
     * check admin user data
     * @param array $data
     * @return array $response
     */
    public function checkData($data) {
        $query = $this->db->get_where('admin',$data);
        if ($query->result()) {
            $row = $query->row();
            $adminToken = $this->random->generateCode(20);
            $response = array(
                'valid' => true,
                'adminId' => $row->adminID,
                'adminFirstname' => $row->admin_firstname,
                'adminLastname' => $row->admin_lastname,
                'adminToken' => $adminToken
            );
            $this->db->where($data);
            $this->db->update('admin',array('admin_token' => $adminToken));
        } else {
            $response = array(
                'valid' => false
            );
        }
        return $response;
    }// end of function
    
}// end of class
