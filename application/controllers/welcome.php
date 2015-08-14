<?php

if(!defined('BASEPATH'))	exit('No direct script access allowed');

class	Welcome	extends	MY_Controller	{

	public	function	index()	{
		$this->load->view('welcome/header');
		$this->load->view('welcome/login_view');
		$this->load->view('welcome/footer');
	}

	public	function	login(){
		if(empty($this->input->post())){
			redirect('/');
		}
		$this->load->library('encrypt');
		$this->load->database();
		$this->load->model('Users_model',	'Users');
		$data['user']	=	$this->Users->getUser(array('login'=>''));
		
		if(!empty($data['user'])){
			parent::setUserSession($data['user'][0]['userID']);
			redirect('/tweets');
		}	else{
			$data['error']	=	true;
			$this->load->view('welcome/header');
			$this->load->view('welcome/login_view',	$data);
			$this->load->view('welcome/footer');
		}
	}
}
