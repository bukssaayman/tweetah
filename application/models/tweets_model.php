<?php if(!defined('BASEPATH'))	exit('No direct script access allowed');

class	Tweets_model	extends	CI_Model	{

	function	__construct()	{
		parent::__construct();
	}

	function	getTweetsForUser(){
		$results	=	array();
		$this->db->select('*');
		$this->db->from('tbl_tweets');
		$this->db->join('tbl_user',	'tbl_tweets.intUserID = tbl_user.userID');
		$this->db->order_by("timestamp", "desc"); 
		$query	=	$this->db->get();

		foreach($query->result()	as	$row)	{
			$results[]	=	$row;
		}
		return	$results;
	}

	function	logTweetsForUser(){
		$this->db->insert('tbl_tweets',	array(
		'strTweetText'	=>	$this->input->post('text'),
		'intUserID'	=>	$this->input->post('user')
		));
	}
}
