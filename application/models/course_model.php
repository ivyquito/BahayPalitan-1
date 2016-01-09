<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class course_model extends CI_Model {
	function getAllCourse($uname,$pass){
		
	}
	function insertCourse($title,$code){
		$data = array(	'coursetitle'=>$title,
						'coursecode'=>$code);
		$this->db->insert('edp_courses',$data);
		$this->db->insert_id();
		return $this->db->insert_id();
	}
	function addMajor($id, $major){
		$data = array(	'course_id'=>$id,
						'major_name'=>$major);
		$this->db->insert('edp_courses_majors',$data);
	}
	function getAll(){
		//$query = $this->db->get('edp_courses');
		$this->db->select('edp_courses.coursetitle,edp_courses.coursecode,edp_courses_majors.*');
		$this->db->from('edp_courses');
		$this->db->join('edp_courses_majors', 'edp_courses_majors.course_id = edp_courses.id');
		//$this->db->where(array('positionname.position_electionid'=>$electionid)); 
        $query  =   $this->db->get();
        //return $query_voters->result();
		return  $query->result();
	}
	function getMajor($id){
		
	}
}
?>