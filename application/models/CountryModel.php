<?php

class CountryModel extends CI_Model{
    
    public function record_count() {
        return $this->db->count_all("area_type");
    }

    public function fetch_country($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("country");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   
   public function addCountry($countryName) {
       $query = $this->db->get_where('country',array('countryName' => $countryName));
       
       if ($query->num_rows() > 0) {
           return false;
       } else {
           $this->db->insert('country',array('countryName' => $countryName, 'status' => 'ACTIVE'));
           return true;
       }
   }
   
   public function editCountry($data) {
       $this->db->where('countryID', $data['id']);
       $this->db->update('country', array('status' => $data['status']));
       return true;
   }
   
}
