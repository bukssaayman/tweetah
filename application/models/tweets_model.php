<?php if(!defined('BASEPATH'))	exit('No direct script access allowed');

class	Tweets_model	extends	CI_Model	{

	function	__construct()	{
		parent::__construct();
	}

	function	getTweetsForUserTimeline(){
		$results	=	array();
		$this->db->select('tbl_user.strHandle, tbl_tweets.timestamp, tbl_tweets.strTweetText');
		$this->db->from('tbl_tweets');
		$this->db->join('tbl_user',	'tbl_tweets.userID = tbl_user.userID');
		$this->db->order_by("timestamp", "desc"); 
		$query	=	$this->db->get();

		foreach($query->result_array()	as	$row)	{
			$results[]	=	$row;
		}
		return	$results;
	}

	function	logTweetsForUser(){
		$this->db->insert('tbl_tweets',	array(
		'strTweetText'	=>	$this->input->post('text'),
		'userID'	=>	$this->session->userdata('userID')
		));
	}
}
