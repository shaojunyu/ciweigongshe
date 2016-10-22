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

	public function compose($post_id = '')
	{
		if ($post_id == null) {
			$this->load->view('compose_view');
		}else{
			$this->db->where('post_id',$post_id);
			$this->db->get('post');
			if ($this->db->affected_rows() == 1) {
				# code...
			}else{
				$this->load->view('compose_view');
			}
		}

		
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
			// $this->db->insert('post',[
			// 	'title'=>$this->input->post('title'),
			// 	'author'=>$this->input->post('author'),
			// 	'abstract'=>$this->input->post('abstract'),
			// 	'content'=>$this->input->post('content'),
			// 	'type'=>$this->input->post('abstract'),
			// 	'abstract'=>$this->input->post('abstract'),
			// 	]);
		} catch (exception $e) {
			
		}
	}

	public function store_draft()
	{
		# code...
	}

	public function update_post()
	{
		# code...
	}

	public function publish_post()
	{
		# code...
	}

	public function close_post()
	{
		# code...
	}


}