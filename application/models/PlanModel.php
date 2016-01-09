<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/***
 * Admin Login Model
 */
class PlanModel extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->adminId = $this->session->userdata('adminId');
    }
    public function record_count() {
        return $this->db->count_all("plans");
    }

    public function fetch_plans($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("plans");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   
    public function addPlan($data) {
        $response = array();
        $this->db->where('planName',$data[0]);
        $query = $this->db->get('plans');
        if ($query->result()) {
            $response['valid'] = false;
        } else {
            date_default_timezone_set("Asia/Manila");
            $plan = array(
                'planName' => $data[0],
                'planDesc' => $data[1],
                'planAmount' => $data[2],
                'status' => 1,
                'plan_created_by' => $this->adminId,
                'plan_created_date' => date('Y-m-d h:i:s'),
                'plan_modified_date' => date('Y-m-d h:i:s'),
                'plan_created_ip' => $this->input->ip_address(),
                'plan_modified_ip' => $this->input->ip_address()
            );
            $this->db->insert('plans',$plan);
            $response['valid'] = true;
        }
        return $response;
    }// end of function
    
   
    
    /*** 
     * Edit plan 
     * @param array-data
     * @return array
     */
    public function editPlan($data) {
        $readyData = array(
                'planName' => $data[1],
                'planDesc' => $data[2],
                'planAmount' => $data[3]
            );
        $query = $this->db->get_where('plans',array('planID'=>$data[0], 'planName'=>$data[1]));
        if ($query->num_rows()>0) {
            $this->db->where('planID',$data[0]);
            $this->db->update('plans',$readyData);
            $response['valid'] = true;
        } else {
            $checkExist = $this->db->get_where('plans',array('planName'=>$data[1]));
            if ($checkExist->num_rows()>0) {
                $response['valid'] = false;
            } else {
                $this->db->where('planID',$data[0]);
                $this->db->update('plans',$readyData);
                $response['valid'] = true;   
            }
        }
        return $response; 
    }// end of function
    
    /***
     * Use to delete plan
     * @param int
     * @return boolean
     */
    public function deletePlan($id){
        $this->db->where('planID',$id);
        $this->db->delete('plans');
    }
}