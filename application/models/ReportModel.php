<?php

class ReportModel extends CI_Model{
    
    
   function record_count(){
		$this->db->select('*');
    $this->db->join('homes', 'homes.homeID = abuse_reports.homeID','left');
		$this->db->join('subscribers', 'subscribers.subID = abuse_reports.fromuser','left');
    $query = $this->db->get('abuse_reports');
		return  count($query->result());
	}
   public function fetch_report($limit, $start) {
        
        $this->db->select('*');
		$this->db->limit($limit, $start);
    $this->db->join('homes', 'homes.homeID = abuse_reports.homeID','left');
		$this->db->join('subscribers', 'subscribers.subID = abuse_reports.fromuser','left');
		$query = $this->db->get('abuse_reports');
        if ($query->num_rows() > 0) {

            //foreach ($query->result() as $row) {
            	//echo '<br/>'.$c++.'jh';
            	//echo '<pre>';
            	//print_r($row);
            	//echo '<pre>';
               //$data[] = $row;
            //}
            return $query->result();
        }
        return false;
   }
  
   
}
