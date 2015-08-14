<?php

if(!defined('BASEPATH'))	exit('No direct script access allowed');

class	Register	extends	MY_Controller	{

	public	function	index()	{
		$this->load->view('register/header');
		$this->load->view('register/register_view');
		$this->load->view('register/footer');
	}

	public	function	checkUserExists(){ //this is called via ajax to test if user handle is available
		$canRegisterHandle	=	false;
		$this->load->database();
		$this->load->model('Users_model',	'Users');
		$data['user']	=	$this->Users->getUser();
		
		if(empty($data['user'])){
			$canRegisterHandle	=	true;
		}	
		
		echo	json_encode($canRegisterHandle);
	}

	public	function	signup(){
		$data = array();
		
		if(!empty($this->input->post())){
			$arrErrors	=	array();
			if(empty($this->input->post('first_name'))){
				$arrErrors[]	=	'Please enter your first name';
			}

			if(empty($this->input->post('last_name'))){
				$arrErrors[]	=	'Please enter your surname';
			}

			if(empty($this->input->post('handle'))){
				$arrErrors[]	=	'Please choose your username';
			}

			if(empty($this->input->post('password'))){
				$arrErrors[]	=	'Please choose a password';
			}	else{
				if($this->input->post('password')	!==	$this->input->post('password_confirm')){
					$arrErrors[]	=	'Password not the same as password confirmation';
				}
			}

			if(empty($arrErrors)){
				$this->load->library('encrypt');
				$this->load->database();
				$this->load->model('Users_model',	'Users');
				
				$data['existing_user']	=	$this->Users->getUser();
				
				if(empty($data['existing_user'])){ //you can register a new user
					$data['user']	=	$this->Users->addUser($this->encrypt->sha1($this->input->post('password')));
					parent::setUserSession($data['user']);
					redirect('/tweets');					
				} else{ //that user already exists
					$data['errors']	=	array('A user with that handle already exists.');
				}
			}	else{
				$data['errors']	=	$arrErrors;
			}
		}	
		
		$this->load->view('register/header');
		$this->load->view('register/register_view', $data);
		$this->load->view('register/footer');
	}
}
