<?php

class PaymentModel extends CI_Model{
    
    
   function record_count(){
		$this->db->select('*');
		$this->db->join('subscribers', 'subscribers.subID = payment_records.from_id','left');
		$query = $this->db->get('payment_records');
		return  count($query->result());
	}
   public function fetch_payment($limit, $start) {
        
        $this->db->select('*');
		$this->db->limit($limit, $start);
		$this->db->join('subscribers', 'subscribers.subID = payment_records.from_id','left');
		$query = $this->db->get('payment_records');
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
