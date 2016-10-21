<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Admin extends CI_controller
{
	public function __construct()
	{
		parent::__construct();
		if ( $this->session->userdata('user') !== 'admin' ){
			header('Location:'.base_url());
		}
	}

	public function index($value='')
	{
		var_dump($this->session->userdata());
		// header('Location:'.base_url());
		# code...
	}
}