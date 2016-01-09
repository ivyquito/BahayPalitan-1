<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model {
	function find_user($uname,$pass){
		$data = array(
			'email' => $uname,
			'password'	=> sha1($pass),
			);
		$this->db->where($data);
		$query = $this->db->get('users');
		return $query->row();
	}
}
?>