<?php

class LocationModel extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->adminId = $this->session->userdata('adminId');
    }
    
    public function record_count() {
        return $this->db->count_all("locations");
    }

    public function fetch_location($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("locations");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   
   public function addLocation($data) {
       $query = $this->db->get_where('locations', array('cityName' => $data['cityName']));
       if ($query->num_rows() > 0) {
           return false;
       } else {
           $this->db->insert('locations',$data);
           return true;
       }
   }
   
   public function editLocation($data) {
       $this->db->where('locID',$data['id']);
       $this->db->update('locations', array('status' => $data['status']));
   }
   
}
