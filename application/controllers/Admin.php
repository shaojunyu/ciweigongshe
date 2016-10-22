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
			$res = $this->db->get('post')->result_array();
			if ($this->db->affected_rows() == 1) {
				$this->load->view('admin/update_post_view',[
					'post'=>$res[0]
					]);
			}else{
				header('Location:'.base_url('admin/compose'));
//				$this->load->view('compose_view');
			}
		}
	}

	public function post_list($status = 'draft', $page = 1)
	{
		if (in_array($status,['draft','published','closed']) and $page >= 1) {
			$this->db->where('status',$status);
			$total = $this->db->count_all_results('post');
			$this->db->where('status',$status);
			$this->db->order_by('update_at','DESC');
			$this->db->limit(25,($page - 1) * 25);
			$res = $this->db->get('post')->result_array();
//			var_dump($res);

			$this->load->view('post_list_view',[
				'status'=>$status,
				'total'=>$total,
				'posts'=>$res
				]);
		}else{
			header('Location:'.base_url('admin/post_list/draft/1'));
		}
	}

	public function comment_list()
	{
		# code...
	}

	public function data(){
		$this->load->view('data_view');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		header('Location:'.base_url());
	}

	public function test()
	{
		$this->load->view('post_list_view');
		// $res = $this->db->insert('post',[
		// 	'title'=>'dasdas',
		// 	'author'=>'yusj',
		// 	'image_url'=>'url'
		// 	]);
		// var_dump($res);
		// var_dump($this->db->insert_id());
		# code...
		// $this->db->order_by('update_at','DESC');
		// $res = $this->db->get('post');
		// var_dump($res->result_array());
	}

///////////////////////////////////////////////////////////////////////////////////////
	//api
	public function store_post()
	{
		try {
//			var_dump($this->input->post());

			$this->db->insert('post',[
				'title'=>$this->input->post('title'),
				'author'=>$this->input->post('author'),
				'abstract'=>$this->input->post('abstract'),
				'content'=>$this->input->post('content'),
				'type'=>$this->input->post('type') == '' ? 'post':'nav',
				'image_url'=>$this->input->post('image_url'),
				'status'=>'draft'
				]);

			$post_id = $this->db->insert_id();
			foreach ($this->input->post('category') as $category_id) {
				$this->db->insert('post_category',[
					'post_id'=>$post_id,
					'category_id'=>$category_id
					]);
			}
			header('Location:'.base_url('admin/post_list/draft'));
		} catch (exception $e) {
			header('Location:'.base_url('admin/post_list'));
		}
	}

	public function update_post()
	{
//		var_dump($this->input->post());
		try{
			$this->db->where('post_id',$this->input->post('post_id'));
			$this->db->update('post',[
				'title'=>$this->input->post('title'),
				'author'=>$this->input->post('author'),
				'abstract'=>$this->input->post('abstract'),
				'content'=>$this->input->post('content'),
				'type'=>$this->input->post('type') == '' ? 'post':'nav',
				'image_url'=>$this->input->post('image_url')
				]);

			$this->db->where('post_id',$this->input->post('post_id'));
			$this->db->delete('post_category');
			foreach ($this->input->post('category') as $category_id) {
				$this->db->insert('post_category',[
					'post_id'=>$this->input->post('post_id'),
					'category_id'=>$category_id
				]);
			}

		}catch (exception $e){

		}
		header('Location:'.base_url('admin/post_list/').$this->input->post('status'));
		# code...
	}

	public function publish_post($post_id)
	{
		$this->db->where('post_id',$post_id);
		$this->db->update('post',[
			'status'=>'published'
		]);
		header('Location:'.base_url('admin/post_list/published'));
	}

	public function unpublish_post($post_id){
		$this->db->where('post_id',$post_id);
		$this->db->update('post',[
			'status'=>'draft'
		]);
		header('Location:'.base_url('admin/post_list/draft'));
	}

	public function close_post($post_id)
	{
		$this->db->where('post_id',$post_id);
		$this->db->update('post',[
			'status'=>'closed'
		]);
		header('Location:'.base_url('admin/post_list/closed'));
	}


	//api 评论管理
	public function approve_commment($comment_id)
	{
		$this->db->where('comment_id',$comment_id);
		$this->db->update('comment',[
			'status'=>'approved'
		]);
	}

	public function refuse_comment($comment_id)
	{
		$this->db->where('comment_id',$comment_id);
		$this->db->update('comment',[
			'status'=>'refused'
		]);
	}
}