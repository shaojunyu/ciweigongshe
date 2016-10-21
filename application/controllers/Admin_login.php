<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Admin_login extends CI_Controller
{
	public function index()
	{
		$this->session->set_userdata(['user'=>'admin']);
	}

	public function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if (($username == 'ciweiAdmin') and ($password == 'ciweiPassword') ){
			$this->session->set_userdata(['user'=>'admin']);
			header('Location:'.base_url('admin'));
		}else{
			header('Location:'.base_url('admin_login?error'));
		}
	}
}