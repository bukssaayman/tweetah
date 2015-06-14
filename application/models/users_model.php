<?php

if(!defined('BASEPATH'))	exit('No direct script access allowed');

class	Users_model	extends	CI_Model	{

	function	__construct()	{
		parent::__construct();
	}

	function	getUserDetails($search = array()){

		$results	=	array();
		if(!empty($search['password'])){	//normal login attempt
			//$this->input->post() already sanitizes the input for me, no extra escaping necessary

			$query	=	$this->db->get_where('tbl_user',	array('strHandle'	=>	$this->input->post('handle'),	'strPassword'	=>	$this->encrypt->sha1($this->input->post('password'))));
		}	else{//get a specific user
			$query	=	$this->db->get_where('tbl_user',	array('userID'	=>	$search['userID']));
		}

		foreach($query->result()	as	$row)	{
			$results[]	=	$row;
		}
		return	$results;
	}

	function	userExists(){
		//$this->input->post() already sanitizes the input for me, no extra escaping necessary

		$results	=	array();
		$query	=	$this->db->get_where('tbl_user',	array('strHandle'	=>	$this->input->post('handle')));
		foreach($query->result()	as	$row)	{
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
