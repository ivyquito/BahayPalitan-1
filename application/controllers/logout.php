<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class logout extends CI_Controller {

	function index(){
		$this->session->sess_destroy();
		redirect(base_url().'index.php');
	}
}