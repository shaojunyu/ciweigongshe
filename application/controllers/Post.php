<?php
/**
 * Created by PhpStorm.
 * User: yushaojun
 * Date: 10/21/2016
 * Time: 7:32 PM
 */

class Post extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
//        $this->db->where('id',$id);
//        $res = $this->db->get('post')->result_array();
//        if ( count($res) == 0){
//            header('Location:'.base_url());
//        }else{
//            $res = $res[0];
//        }
//
//        //更新阅读量数据
//        if (get_cookie('ci_session') == null){
//
//        }
//        $this->db->where('id',$id);
//        $this->db->update('post',['read_count'=>$res['read_count'] + 1]);

    }

    public function show($id){

    }

    public function category($id){

    }
}