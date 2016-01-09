<?php

class AdminModel extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->adminId = $this->session->userdata('adminId');
    }
    
    public function record_count() {
        return $this->db->count_all("admin");
    }

    public function fetch_admin($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("admin");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
    
    public function add($data){
        $prepareUser = array(
            'username' => $data[0],
            'password' => md5($data[1]),
            'admin_firstname' => $data[2],
            'admin_lastname' => $data[3],
            'admin_email' => $data[4],
            'admin_birthdate' => $data[5],
            'admin_gender' => $data[6],
            'admin_created' => date('Y-m-d h:i:s'),
            'admin_modified' => date('Y-m-d h:i:s'),
            'admin_created_ip' => $this->input->ip_address(),
            'admin_modified_ip' => $this->input->ip_address(),
            'admin_flag' => 1
        );
        return ($this->db->insert('admin',$prepareUser)) ? true : false;
    }
    
    public function myAccount(){
        $query = $this->db->get_where('admin',array('adminID' => $this->adminId));
        $row = $query->row();
        return $row;
    }
    
    public function accountUpdate($data){
        $this->db->where('adminID',$this->adminId);
        $this->db->where('admin_token',$this->session->userdata('adminToken'));
        return ($this->db->update('admin',$data)) ? true : false ;
    }
}