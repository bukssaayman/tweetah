<?php

if(!defined('BASEPATH'))	exit('No direct script access allowed');

class	MY_Controller	extends	CI_Controller	{
	/*
		* I created this custom controller to have the code that checks for login in the constructor
		* Each controller that needs to check that the user is logged in, can simply extend this controller
		*/

	function	__construct(){
		parent::__construct();
	}

	public	function	forceLoggedIn(){
		$this->load->library('session');
		if(!$this->session->userdata('logged_in')){
			redirect('/');
		}
	}

	public	function	setUserSession($intUserID	=	null){
		if(!is_null($intUserID)){
			$this->load->database();
			$this->load->library('session');

			$this->load->model('Users_model',	'Users');
			$data['user']	=	$this->Users->getUserDetails(array('userID' => $intUserID));

			$this->session->set_userdata(array(
			'handle'	=>	$data['user'][0]->strHandle,
			'firstName'	=>	$data['user'][0]->strFirstName,
			'lastName'	=>	$data['user'][0]->strLastName,
			'userID'	=>	$data['user'][0]->userID,
			'logged_in'	=>	TRUE
			));
		}
	}
}
