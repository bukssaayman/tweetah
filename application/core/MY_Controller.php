<?php

if(!defined('BASEPATH'))	exit('No direct script access allowed');

class	MY_Controller	extends	CI_Controller	{
	/*
		* I created this custom controller to have the code that checks for login in the constructor
		* Each controller that needs to check that the user is logged in, can simply extend this controller
		*/

	function	__construct(){
		parent::__construct();

		$this->load->library('session');
		if(!$this->session->userdata('logged_in')){
			redirect('/');
		}
	}
}
