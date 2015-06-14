<?php

if(!defined('BASEPATH'))	exit('No direct script access allowed');

class	Welcome	extends	CI_Controller	{

	public	function	index()	{
		$this->load->view('welcome/header');
		$this->load->view('welcome/login_view');
		$this->load->view('welcome/footer');
	}

	public	function	register(){
		$this->load->view('register/header');
		$this->load->view('register/register_view');
		$this->load->view('register/footer');
	}

	public	function	login(){
		if(empty($this->input->post())){
			redirect('/');
		}

		$this->load->database();
		$this->load->model('Users_model',	'Users');
		$data['user']	=	$this->Users->getUserDetails();

		if(!empty($data['user'])){
			$this->load->library('session');

			$this->session->set_userdata(array(
			'handle'	=>	$data['user'][0]->strHandle,
			'firstName'	=>	$data['user'][0]->strFirstName,
			'lastName'	=>	$data['user'][0]->strLastName,
			'userID'	=>	$data['user'][0]->userID,
			'logged_in'	=>	TRUE
			));

			redirect('/tweets');
		}	else{
			$data['error']	=	true;
			$this->load->view('welcome/header');
			$this->load->view('welcome/login_view',	$data);
			$this->load->view('welcome/footer');
		}
	}
}
