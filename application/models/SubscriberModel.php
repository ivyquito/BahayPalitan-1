<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/***
 * Subscriber Model
 */

class SubscriberModel extends CI_Model {
    
    public function record_count() {
        return $this->db->count_all("subscribers");
    }

    public function fetch_subscribers($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->join('payment_info', 'payment_info.subID = subscribers.subID','left');
        $query = $this->db->get("subscribers");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   
   public function deleteSubscriber($id) {
       return ($this->db->delete('subscribers', array('subID' => $id))) ? true : false;
   }
   
}
