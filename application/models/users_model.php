<?php if(!defined('BASEPATH'))	exit('No direct script access allowed');

class	Users_model	extends	CI_Model	{

	function	__construct()	{
		parent::__construct();
	}

	function	getUserDetails(){
		//$this->input->post() already sanitizes the input for me, no extra escaping necessary

		$results	=	array();
		$query = $this->db->get_where('tbl_user', array('strHandle' => $this->input->post('handle'), 'strPassword' => $this->input->post('password')));
		foreach($query	->	result()	as	$row)	{
			$results[]	=	$row;
		}
		return	$results;
	}
}
