<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class common extends CI_Model {
	function getrow($table='',$where=''){
		if(!empty($where)){
			$this->db->where($where);
			$query = $this->db->get($table);
		}else{
			$query = $this->db->get($table);
		}
		return $query->row();
	}
	function getsum($table, $column_name){
		$this->db->select_sum($column_name);
		$this->db->from($table);
		$query = $this->db->get();
		return  $query->row()->value;

	}
	function getall($table='',$where='',$order=''){
		if(!empty($where) && !empty($order)){
			$this->db->where($where);
			$this->db->order_by($order,'desc');
			$query = $this->db->get($table); 
		}elseif(!empty($where)){
			$this->db->where($where);
			$query = $this->db->get($table);
		}else{
			$query = $this->db->get($table);
		}
		return  $query->result();
	}
	function insert($table='',$value=''){
		$this->db->insert($table,$value);
	}
	
	function add($table='', $data){
		$this->db->insert($table,$data);
		return true;
	}
	function add_and_get_id($table='', $data){
		$this->db->insert($table,$data);
		return $this->db->insert_id();
	}
	function change($table='', $data='', $where =''){
		$this->db->update($table,$data,$where);
		return true;
	}
	function remove($table='', $where=''){
		$this->db->delete($table,$where);
		return true;
	}
	function record_count($table) {
        return $this->db->count_all($table);
    }
	// -- speacial query --- 

	function getinbox($userID){
		$this->db->select('*');
		$this->db->where('toID',$userID);
		$this->db->join('subscribers', 'subscribers.subID = messages.fromID','left');
		$query = $this->db->get('messages');
		return  $query->result();
	}

	function getnotie($userID){
		$this->db->select('*');
		$this->db->where('to_user',$userID);
		$this->db->join('subscribers', 'subscribers.subID = notification.from_user','left');
		$query = $this->db->get('notification');
		return  $query->result();
	}

	function inboxview($where){
		$this->db->select('*');
		$this->db->where($where);
		$this->db->join('subscribers', 'subscribers.subID = messages.fromID','left');
		$query = $this->db->get('messages');
		return  $query->row();
	} 

	function notieview($where){
		$this->db->select('*');
		$this->db->where($where);
		$this->db->join('subscribers', 'subscribers.subID = notification.from_user','left');
		$query = $this->db->get('notification');
		return  $query->row();
	} 

	function getallhome($myid){
		$this->db->select('*');
		$this->db->where("swapStatus = 'ACTIVE' AND ownerID <> $myid");
		$this->db->join('area_type', 'area_type.ATypeID = homes.homeID','left');
		$this->db->join('house_type', 'house_type.HTypeID = homes.HTypeID','left');
		$this->db->join('locations', 'locations.locID = homes.locID','left');
		$this->db->join('subscribers', 'subscribers.subID = homes.ownerID','left');
		$query = $this->db->get('homes');
		return  $query->result();
	}
	function allhome($limit){
		$this->db->select('*');
		$this->db->where("swapStatus = 'ACTIVE'");
		$this->db->join('area_type', 'area_type.ATypeID = homes.homeID','left');
		$this->db->join('house_type', 'house_type.HTypeID = homes.HTypeID','left');
		$this->db->join('locations', 'locations.locID = homes.locID','left');
		$this->db->limit($limit);
		$query = $this->db->get('homes');
		return  $query->result();
	}
	function match_home($where){
		$this->db->select('*');
		$this->db->where($where);
		$this->db->join('area_type', 'area_type.ATypeID = homes.homeID','left');
		$this->db->join('house_type', 'house_type.HTypeID = homes.HTypeID','left');
		$this->db->join('locations', 'locations.locID = homes.locID','left');
		$this->db->join('subscribers', 'subscribers.subID = homes.ownerID','left');
		$this->db->join('travel_plan', 'travel_plan.subID = homes.ownerID','left');
		$this->db->order_by('homes.dealNegotiation');
		$query = $this->db->get('homes');
		return  $query->result();
	}
	function suggestion($where){
		$this->db->select('*');
		//$this->db->where($where);
		$this->db->join('area_type', 'area_type.ATypeID = homes.homeID','left');
		$this->db->join('house_type', 'house_type.HTypeID = homes.HTypeID','left');
		$this->db->join('locations', 'locations.locID = homes.locID','left');
		$this->db->join('subscribers', 'subscribers.subID = homes.ownerID','left');
		$this->db->join('travel_plan', 'travel_plan.subID = homes.ownerID','left');
		$query = $this->db->get_where('homes',$where);
		return  $query->result();
	}

	function getviewhome($userid,$homeid){
		$where = array('homes.ownerID'=>$userid,
					'homes.homeID' => $homeid);
		$this->db->select('*');
		$this->db->where($where);
		$this->db->join('area_type', 'area_type.ATypeID = homes.homeID','left');
		$this->db->join('house_type', 'house_type.HTypeID = homes.HTypeID','left');
		$this->db->join('locations', 'locations.locID = homes.locID','left');
		$this->db->join('subscribers', 'subscribers.subID = homes.ownerID','left');
		//$this->db->from('homes');
		$query = $this->db->get('homes');
		return  $query->row();
	}
	function getviewhome2($homeid){
		$where = array('homes.homeID' => $homeid);
		$this->db->select('*');
		$this->db->where($where);
		$this->db->join('area_type', 'area_type.ATypeID = homes.homeID','left');
		$this->db->join('house_type', 'house_type.HTypeID = homes.HTypeID','left');
		$this->db->join('locations', 'locations.locID = homes.locID','left');
		$this->db->join('subscribers', 'subscribers.subID = homes.ownerID','left');
		//$this->db->from('homes');
		$query = $this->db->get('homes');
		return  $query->row();
	}
	function getrowhome($userid){
		$this->db->select('*');
		$this->db->where('homes.ownerID',$userid);
		$this->db->join('area_type', 'area_type.ATypeID = homes.homeID','left');
		$this->db->join('house_type', 'house_type.HTypeID = homes.HTypeID','left');
		$this->db->join('subscribers', 'subscribers.subID = homes.ownerID','left');
		$this->db->join('locations', 'locations.locID = homes.locID','left');
		//$this->db->from('homes');
		$query = $this->db->get('homes');
		return  $query->row();
	}
	function gethome_id($userhome){
		$this->db->select('*');
		$this->db->where('homes.homeID',$userhome);
		$this->db->join('area_type', 'area_type.ATypeID = homes.homeID','left');
		$this->db->join('house_type', 'house_type.HTypeID = homes.HTypeID','left');
		$this->db->join('subscribers', 'subscribers.subID = homes.ownerID','left');
		$this->db->join('locations', 'locations.locID = homes.locID','left');
		//$this->db->from('homes');
		$query = $this->db->get('homes');
		return  $query->row();
	}
	function getmyhome($home){
		$this->db->select('*');
		$this->db->where($home);
		$this->db->join('area_type', 'area_type.ATypeID = homes.ATypeID','left');
		$this->db->join('house_type', 'house_type.HTypeID = homes.HTypeID','left');
		$this->db->join('subscribers', 'subscribers.subID = homes.ownerID','left');
		$this->db->join('locations', 'locations.locID = homes.locID','left');
		//$this->db->from('homes');
		$query = $this->db->get('homes');
		return  $query->row();
	}
	function gethomes($userid){
		$this->db->select('*');
		$this->db->where('homes.ownerID',$userid);
		$this->db->join('area_type', 'area_type.ATypeID = homes.homeID','left');
		$this->db->join('house_type', 'house_type.HTypeID = homes.HTypeID','left');
		$this->db->join('subscribers', 'subscribers.subID = homes.ownerID','left');
		$this->db->join('locations', 'locations.locID = homes.locID','left');
		//$this->db->from('homes');
		$query = $this->db->get('homes');
		return  $query->result();
	}
	function myplan($userid){
		$this->db->select('*');
		$this->db->where('travel_plan.subID',$userid);
		$this->db->join('locations', 'locations.locID = travel_plan.locID','left');
		$query = $this->db->get('travel_plan');
		return  $query->row(); 
	}
	function myplan2($travelplanid,$subid){
		$where = array('travel_plan.TravelPlanID'=>$travelplanid,
					'travel_plan.subID' => $subid);
		$this->db->select('*');
		$this->db->where($where);
		$this->db->join('locations', 'locations.locID = travel_plan.locID','left');
		$query = $this->db->get('travel_plan');
		return  $query->row(); 
	}
	function countallplan($userid){
		$this->db->select('*');
		$this->db->where('travel_records.tr_subID',$userid);
		$this->db->join('locations', 'locations.locID = travel_records.tr_locID','left');
		$query = $this->db->get('travel_records');
		return  $query->result(); 
	}
	function countalltravelplan($userid){
		$this->db->select('*');
		$this->db->where('travel_plan.subID',$userid);
		$this->db->join('locations', 'locations.locID = travel_plan.locID','left');
		$query = $this->db->get('travel_plan');
		return  $query->result(); 
	}	
	function allplan($limit, $start, $userid){
		$this->db->select('*');
		$this->db->limit($limit, $start);
		$this->db->where('travel_records.tr_subID',$userid);
		$this->db->join('locations', 'locations.locID = travel_records.tr_locID','left');
		$query = $this->db->get('travel_records');
		return  $query->result(); 
	}
	function alltravelplan($limit, $start, $userid){
		$this->db->select('*');
		$this->db->limit($limit, $start);
		$this->db->where('travel_plan.subID',$userid);
		$this->db->join('locations', 'locations.locID = travel_plan.locID','left');
		$query = $this->db->get('travel_plan');
		return  $query->result(); 
	}
	function swapped($homeid){
		$query = $this->db->query("SELECT * FROM home_swap WHERE (swap_home = $homeid OR swap_home_to = $homeid) AND (action = 'swapped' OR action = 'done' OR action = 'done-pending')");
		return $query->result();
	}
	
	function check_current_swap($myid){
		$query = $this->db->query("SELECT * FROM home_swap WHERE (swap_home = $myid OR swap_home_to = $myid) AND (action = 'swapped' OR action = 'done-pending')");
		return $query->row();
	}
	
	function check_swap($myid,$homeid){
		$query = $this->db->query("SELECT * FROM home_swap WHERE (swap_home = $myid AND swap_home_to = $homeid) OR (swap_home = $homeid AND swap_home_to = $myid) AND (action = 'swapped' OR action = 'done-pending')");
		return $query->row();
	}
	function getreviews($id, $myID){
		$this->db->select('*');
		$this->db->join('subscribers', 'subscribers.subID = ratings_reviews.from_userID','left');
		$query = $this->db->get_where('ratings_reviews',array('homeID'=>$id, 'from_userID' => $myID));
		return  $query->result();
	}	
	function getreviews_myhome($id){
		$this->db->select('*');
		$this->db->join('subscribers', 'subscribers.subID = ratings_reviews.from_userID','left');
		$query = $this->db->get_where('ratings_reviews',array('homeID'=>$id));
		return  $query->result();
	}
	//pagenation
	public function fetch_homes($limit, $start, $myid) {
        
        $this->db->select('*');
		$this->db->limit($limit, $start);
		$this->db->where("swapStatus = 'ACTIVE' AND ownerID <> $myid");
		$this->db->join('area_type', 'area_type.ATypeID = homes.homeID','left');
		$this->db->join('house_type', 'house_type.HTypeID = homes.HTypeID','left');
		$this->db->join('locations', 'locations.locID = homes.locID','left');
		$this->db->join('subscribers', 'subscribers.subID = homes.ownerID','left');
		$query = $this->db->get('homes');
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

   public function search_homes($limit, $start, $myid, $search) {
        
        $this->db->select('*');
        $addthis = "homes.maxGuests LIKE '%".$search."%' OR locations.cityName LIKE '%".$search."%' OR subscribers.lname LIKE '%".$search."%' OR subscribers.fname LIKE '%".$search."%'";
		$this->db->where("homes.swapStatus = 'ACTIVE' AND homes.ownerID <> $myid AND ".$addthis);
		//$this->db->where($addthis);
		$this->db->join('area_type', 'area_type.ATypeID = homes.homeID','left');
		$this->db->join('house_type', 'house_type.HTypeID = homes.HTypeID','left');
		$this->db->join('locations', 'locations.locID = homes.locID','left');
		$this->db->join('subscribers', 'subscribers.subID = homes.ownerID','inner');
        $this->db->limit($limit, $start);
		$query = $this->db->get('homes');
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
   }
   function search_count($myid, $search){
		$this->db->select('*');
		$addthis = "homes.maxGuests LIKE '%".$search."%' OR locations.cityName LIKE '%".$search."%' OR subscribers.lname LIKE '%".$search."%' OR subscribers.fname LIKE '%".$search."%'";
		//$this->db->where($addthis);
		$this->db->where("homes.swapStatus = 'ACTIVE' AND homes.ownerID <> $myid AND ".$addthis);
		$this->db->where("homes.swapStatus = 'ACTIVE' AND homes.ownerID <> $myid AND ".$addthis);
		$this->db->join('area_type', 'area_type.ATypeID = homes.homeID','left');
		$this->db->join('house_type', 'house_type.HTypeID = homes.HTypeID','left');
		$this->db->join('locations', 'locations.locID = homes.locID','left');
		$this->db->join('subscribers', 'subscribers.subID = homes.ownerID','left');
		//$this->db->from('homes');
		$query = $this->db->get('homes');
		return  $query->result();
	}
	
	function addLocation($data)
	{
		$query = $this->db->insert('locations',$data);

		if($query)
		{
			return "success";
		}
		else
		{
			return "fail";
		}
	}

	function getLastRowLocation()
	{
		$this->db->select_max('locID');
		$query = $this->db->get('locations');

		return $query->row();
	}

	function updateLocation($id, $data)
	{
		$query = $this->db->update('locations', $data, array('locID' => $id));

		if($query)
		{
			return "success";
		}
		else
		{
			return "fail";
		}
	}

	function filterMatch($ownerID, $sdate, $edate){
		$sql = "SELECT * FROM `travel_plan` WHERE travel_plan.subID <> '".$ownerID."' AND (PStartDAte >= '".$sdate."' AND PEndDate <= '".$edate."') AND travel_plan.locID in (SELECT locID FROM homes WHERE homes.ownerID = '".$ownerID."') ORDER BY travel_plan.subID";
		$query = $this->db->query($sql);
		return  $query->row();
	}

	function getrow2($table='',$where=''){
		if(!empty($where)){
			$this->db->where($where);
			$query = $this->db->get($table);
		}else{
			$query = $this->db->get($table);
		}
		return $query->result();
	}

	function insert_rate($data)
	{
		$query = $this->db->insert('ratings_reviews',$data);

		if($query)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}

	function update_rate($where, $data)
	{
		$query = $this->db->update('ratings_reviews', $data, $where);

		if($query)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
}

?>