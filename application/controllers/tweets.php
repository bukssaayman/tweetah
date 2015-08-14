<?php

if(!defined('BASEPATH'))	exit('No direct script access allowed');

class	Tweets	extends	MY_Controller	{
	
	public function __construct()	{
		parent::__construct();
		parent::forceLoggedIn(); //make sure the user is logged in for all methods in this class
}

	public	function	index()	{
		$this->load->database();
		$this->load->model('Tweets_model');
		$data['tweets']	=	$this->Tweets_model->getTweetsForUserTimeline();
		
		$this->load->view('tweets/header');
		$this->load->view('tweets/tweets_view',	$data);
		$this->load->view('tweets/footer');
	}
	
	public	function	log(){
		$this->load->database();
		$this->load->model('Tweets_model');
		$this->Tweets_model->logTweetsForUser();

		$data['tweet']	=	array(
		'strHandle'	=>	$this->session->userdata('handle'),
		'timestamp'	=>	date('Y-m-d H:i:s'),
		'strTweetText'	=>	$this->input->post('text')
		);
		
		$tweetHTML	=	$this->load->view('tweets/tweet_template',	$data,	true);
		echo	json_encode($tweetHTML);
	}
}
