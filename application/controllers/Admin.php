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
		$total_read = $this->db->count_all_results('page_view');

		$this->db->where('status',null);
		$unread =  $this->db->count_all_results('comment');

		$this->db->where('status','published');
		$total_post = $this->db->count_all_results('post');

		$this->load->view('admin/dashborad_view',[
			'total_read'=>$total_read,
			'unread'=>$unread,
			'total_post'=>$total_post
			]);
	}

	public function compose($post_id = '')
	{
		if ($post_id == null) {
			$this->load->view('admin/compose_view');
		}else{
			$this->db->where('post_id',$post_id);
			$res = $this->db->get('post')->result_array();
			if ($this->db->affected_rows() == 1) {
				$this->load->view('admin/update_post_view2',[
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

			$this->load->view('admin/post_list_view',[
				'status'=>$status,
				'total'=>$total,
				'posts'=>$res,
				'page'=>$page
				]);
		}else{
			header('Location:'.base_url('admin/post_list/draft/1'));
		}
	}

	public function comment_list($is_read = 'unread', $page = 1)
	{
		if ( in_array($is_read,['read','unread']) and $page >= 1){
			if ($is_read == 'unread'){
				$this->db->where('status',null);
				$total = $this->db->count_all_results('comment');

				$this->db->where('status',null);
				$this->db->order_by('update_at','DESC');
				$this->db->limit(25,($page - 1) * 25);
				$res = $this->db->get('comment')->result_array();
			}else{
				$this->db->where('status !=',null);
				$total = $this->db->count_all_results('comment');

				$this->db->where('status !=',null);
				$this->db->order_by('update_at','DESC');
				$this->db->limit(25,($page - 1) * 25);
				$res = $this->db->get('comment')->result_array();
			}
//			echo $total;
			$this->load->view('admin/comment_list_view',[
				'is_read'=>$is_read,
				'total'=>$total,
				'comments'=>$res,
				'page'=>$page
			]);
		}else{
			header('Location:'.base_url('admin/comment_list/unread/1'));
		}
//
	}

	public function data(){
		//一周阅读量
		$week_data;
		$month_data;
		for ($i = 0; $i<=6; $i++){
			$day = date('Y-m-d',strtotime("-$i day"));
			$this->db->like('create_at',$day);
			$count = $this->db->count_all_results('page_view');
			$week_data[$day] = $count;
			$month_data[$day] = $count;
		}
		for ($i=7; $i <= 29 ; $i++) { 
			$day = date('Y-m-d',strtotime("-$i day"));
			$this->db->like('create_at',$day);
			$count = $this->db->count_all_results('page_view');
			$month_data[$day] = $count;
		}

		$this->load->view('admin/data_view',[
			'week_data'=>$week_data,
			'month_data'=>$month_data
			]);
	}

	public function data_export()
	{
		echo "正在生成报表，请稍后。。。";
		$this->load->dbutil();
		$reads_per_day_file = __DIR__.'/../../data/read_count_per_day.csv';
		$post_read_count_file = __DIR__.'/../../data/post_read_count.csv';
		$data_zip_file = __DIR__.'/../../data/ciwei_data.zip';

		$query = $this->db->query("select day as date,count(*) as read_count from page_view group by day");

		$delimiter = ",";
		$newline = "\r\n";
		$enclosure = '"';
		file_put_contents($reads_per_day_file, $this->dbutil->csv_from_result($query, $delimiter, $newline, $enclosure));
	
		$query = $this->db->query("select post_id as id, title, read_count from post order by post_id DESC");
		file_put_contents($post_read_count_file, $this->dbutil->csv_from_result($query, $delimiter, $newline, $enclosure));

		 $zip = new ZipArchive();
		 $zip->open($data_zip_file, ZIPARCHIVE::CREATE);
		 $zip->addFile($reads_per_day_file,'read_count_per_day.csv');
		 $zip->addFile($post_read_count_file,'post_read_count.csv');
		 $zip->close();

		 header('Location:'.base_url('/data/ciwei_data.zip'));
	}

	public function logout()
	{
		$this->session->sess_destroy();
		header('Location:'.base_url());
	}

	public function test()
	{
		// date_default_timezone_set('Asia/Shanghai');
		echo date('H:i:s');
		// $this->load->view('admin/post_list_view');
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
			// var_dump($this->input->post());
			// exit();
			$this->db->insert('post',[
				'title'=>$this->input->post('title'),
				'author'=>$this->input->post('author'),
				'abstract'=>$this->input->post('abstract'),
				'content'=>$this->input->post('editorValue'),
				'type'=>$this->input->post('type') == '' ? 'post':'slide',
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
		// var_dump($this->input->post());
		// exit();
		try{
			$this->db->where('post_id',$this->input->post('post_id'));
			$this->db->update('post',[
				'title'=>$this->input->post('title'),
				'author'=>$this->input->post('author'),
				'abstract'=>$this->input->post('abstract'),
				'content'=>$this->input->post('editorValue'),
				'type'=>$this->input->post('type') == '' ? 'post':'slide',
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
		date_default_timezone_set('Asia/Shanghai');
		$this->db->where('post_id',$post_id);
		$this->db->update('post',[
			'status'=>'published',
			'publish_at'=>date('Y-m-d h:i:s',time())
		]);
		header('Location:'.base_url('admin/post_list/published'));
	}

	public function restore_post($post_id){
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
		header('Location:'.base_url('admin/comment_list/unread'));
	}

	public function refuse_comment($comment_id)
	{
		$this->db->where('comment_id',$comment_id);
		$this->db->update('comment',[
			'status'=>'refused'
		]);
		header('Location:'.base_url('admin/comment_list/unread'));
	}
}