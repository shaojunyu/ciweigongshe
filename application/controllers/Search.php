<?php

class Search extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
    	$search = $this->input->get('search');
    	if (empty($search)) {
    		if ($this->is_mobile_device()) {
	    		$this->load->view('mobile/search_view');
	    	}else{
	    		$this->load->view('pc/search_view');
	    	}
    	}else{
    		$res = $this->db->like("content",$search)
	    			->where('status','published')
	    			->order_by('post_id','DESC')
	    			->limit(10)
	    			->get('post')
	    			->result_array();
    		if ($this->is_mobile_device()) {
	    		$this->load->view('mobile/result_view',[
	    			'res'=>$res
	    			]);
    		}else{
    			$this->load->view('pc/result_view',[
	    			'res'=>$res
	    			]);
    		}
    	}

    	
    }

    private function is_mobile_device()
    {
        return preg_match('/mobile/i',$_SERVER['HTTP_USER_AGENT'])==1?true:false;
    }

}