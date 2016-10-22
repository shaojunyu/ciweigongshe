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
			header('Location:'.base_url('admin_login'));
		}
	}

	public function index($value='')
	{
		var_dump($this->session->userdata());
		// header('Location:'.base_url());
		# code...
	}

	public function compose()
	{
		$this->load->view('compose_view');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		header('Location:'.base_url());
	}


	//api
	public function store_post()
	{
		try {
			var_dump($this->input->post());
			//$this->db->insert('post',);
		} catch (exception $e) {
			
		}
	}
}