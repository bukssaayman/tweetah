<?php

if(!defined('BASEPATH'))	exit('No direct script access allowed');

class	Users_model	extends	CI_Model	{

	function	__construct()	{
		parent::__construct();
	}
	
	function getUser($searchParam = array()){
		$results	=	array();
		$key = array_shift(array_keys($searchParam)); //array_keys returns a multidimentional array of keys, I want the first element
		
		switch($key)	{
			case	'login': //login attempt, test user handle and password
				$query	=	$this->db->get_where('tbl_user',	array('strHandle'	=>	$this->input->post('handle'),	'strPassword'	=>	$this->encrypt->sha1($this->input->post('password'))));
				break;
			case	'userID': //get user based on specific ID
				$query	=	$this->db->get_where('tbl_user',	array('userID'	=>	$searchParam['userID']));
				break;

			default: //used to check if user hanldle is availbe at registration stage
				$query	=	$this->db->get_where('tbl_user',	array('strHandle'	=>	$this->input->post('handle')));
				break;
		}

		foreach($query->result_array()	as	$row)	{
			$results[]	=	$row;
		}
		
		return	$results;
	}

	function	addUser($strPassword	=	''){
		$data	=	array(
		'strHandle'	=>	$this->input->post('handle'),
		'strFirstName'	=>	$this->input->post('first_name'),
		'strLastName'	=>	$this->input->post('last_name'),
		'strPassword'	=>	$strPassword
		);

		$this->db->insert('tbl_user',	$data);
		return	$this->db->insert_id();
	}
}
