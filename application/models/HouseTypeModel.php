<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/***
 * Admin Login Model
 */
class HouseTypeModel extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->adminId = $this->session->userdata('adminId');
    }
    
    public function record_count() {
        return $this->db->count_all("house_type");
    }

    public function fetch_house_type($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("house_type");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
    
    public function addHouseType($description){
        $response = array();
        $query = $this->db->get_where('house_type',array('description'=>$description));
        if ($query->num_rows() > 0){
            $response['valid'] = false;
        } else {
            $prepareData = array(
                'description' => $description,
                'created_by' => $this->adminId,
                'created_date' => date('Y-m-d h:i:s'),
                'modified_date' => date('Y-m-d h:i:s'),
                'created_ip' => $this->input->ip_address(),
                'modified_ip' => $this->input->ip_address()
            );
            $this->db->insert('house_type',$prepareData);
            $response['valid'] = true;
        }
        return $response;
    }
    
    public function editHouseType($data){
        $query = $this->db->get_where('house_type',array('HTypeID'=>$data[0],'description'=>$data[1]));
        if ($query->num_rows() > 0) {
            $this->db->where('HTypeID',$data[0]);
            $this->db->update('house_type',array('description'=>$data[1]));
            $response['valid'] = true;
        } else {
            $checkExist = $this->db->get_where('house_type',array('description'=>$data[1]));
            if ($checkExist->num_rows() > 0){
                $response['valid'] = false;
            } else {
                $this->db->where('HTypeID',$data[0]);
                $this->db->update('house_type',array('description'=>$data[1]));
                $response['valid'] = true;
            }
        }
        return $response;
    }// end of function
    
    public function deleteHouseType($id){
        return ($this->db->delete('house_type', array('HTypeID' => $id))) ? true :  false;
    }
    
}