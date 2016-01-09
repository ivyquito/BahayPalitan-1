<?php

/**
* Author 	 	: Michael Quieta & Issa Mae Cabradilla 
* Description 	:
*/


class system_model extends CI_Model
{
	public function jsonret($bool, $msg)
	{
		return json_encode(array('success' => $bool, 'message' => $msg));
	}

	public function get_all($table, $column, $condition)
	{
	  if($condition != '')
	  {
	    $sql = $this->db->select($column)
	            ->where($condition)
	            ->from($table)
	            ->get()
	            ->result();
	  }
	  else
	  {
	    $sql = $this->db->select($column)
	          ->from($table)
	          ->get()
	          ->result();
	  }
	  return $sql;
	}

	public function get_specific($table, $column, $condition)
	{
		$code = '';
		if($condition != '')
		{
			$sql = $this->db->select($column)
								->where($condition)
								->from($table)
								->get()
								->result();
			
		}
		else
		{
			$sql = $this->db->select($column)
								->from($table)
								->get()
								->result();
		}

		foreach ($sql as $row){ $code = $row->$column; }
		return $code; 

	}

	public function check_exist($table, $column, $param)
	{
		$sql = $this->db->select($column)
						->where($param)
						->from($table)
						->get();
		return ($sql->num_rows() > 0?1:0);
	}

	public function updateData($table, $param, $condition)
	{
		return $this->db->where($condition)
				 		->update($table, $param);
	}

	public function addData($table, $param)
	{
		return $this->db->insert($table, $param);
	}

	public function removeData($table, $condition)
	{
		return $this->db->where($condition)
						->delete($table);
	}

	public function last_insert_id()
	{
		return $this->db->insert_id();
	}

	public function getDataWLimit($table, $column, $condition, $limit, $orderCol, $orderSort)
	{
		if($condition != '')
		{
			$sql = $this->db->select($column)
							->where($condition)
							->from($table)
							->order_by($orderCol, $orderSort)
							->limit($limit)
							->get()
							->result();
		}
		else
		{
			$sql = $this->db->select($column)
							->from($table)
							->order_by($orderCol, $orderSort)
							->limit($limit)
							->get()
							->result();
		}
		return $sql;
	}
}