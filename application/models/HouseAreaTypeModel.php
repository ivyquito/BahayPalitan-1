<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/***
 * House Area Type Model
 */
class HouseAreaTypeModel extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->adminId = $this->session->userdata('adminId');
    }
    
    public function record_count() {
        return $this->db->count_all("area_type");
    }

    public function fetch_area_type($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("area_type");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
    
    public function addHouseAreaType($description){
        $query = $this->db->get_where('area_type',array('description'=>$description));
        if ($query->num_rows() > 0){
            $response['valid'] = false;
        } else {
            date_default_timezone_set("Asia/Manila");
            $prepareData = array(
                'description' => $description,
                'created_by' => $this->adminId,
                'created_date' => date('Y-m-d h:i:s'),
                'modified_date' => date('Y-m-d h:i:s'),
                'created_ip' => $this->input->ip_address(),
                'modified_ip' => $this->input->ip_address()
            );
            $this->db->insert('area_type',$prepareData);
            $response['valid'] = true;
        }
        return $response;
    }
    
    public function editHouseAreaType($data){
        $query = $this->db->get_where('area_type',array('ATypeID'=>$data[0],'description'=>$data[1]));
        if ($query->num_rows() > 0) {
            $response['valid'] = true;
        } else {
            $checkExist = $this->db->get_where('area_type', array('description'=>$data[1]));
            if ($checkExist->num_rows() > 0){
                $response['valid'] = false;
            } else {
                $this->db->where('ATypeID',$data[0]);
                $this->db->update('area_type', array('description'=>$data[1]));
                $response['valid'] = true;
            }
        }
        return $response;
    }
    
    public function deleteHouseAreaType($id) {
        return ($this->db->delete('area_type',array('ATypeID' => $id))) ? true : false;
    }
}