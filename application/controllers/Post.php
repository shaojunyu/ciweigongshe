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

    public function show($post_id){
        $this->db->where('post_id',$post_id);
        $res = $this->db->get('post')->result_array();
        if (count($res) == 1) {
            $this->load->view('post_view',[
                'post'=>$res[0]
                ]);

            $read_count = $res[0]['read_count'];
//        //更新阅读量数据
       if (get_cookie('ci_session') == null){
            try{
                $this->db->trans_start();
                $this->db->where('post_id',$post_id);
                $this->db->update('post',['read_count'=>$read_count + 1]);

                $this->db->insert('page_view',[
                    'post_id'=>$post_id,
                    'day'=>date('Y-m-d')         
                    ]);
                $this->db->trans_complete();
            }catch(exception $e){}
        }else{
            $this->db->where('session',get_cookie('ci_session'));
            $this->db->where('post_id',$post_id);
            if ($this->db->count_all_results('page_view') == 0) {
                try{
                    $this->db->trans_start();
                    $this->db->where('post_id',$post_id);
                    $this->db->update('post',['read_count'=>$read_count + 1]);

                    $this->db->insert('page_view',[
                        'post_id'=>$post_id,
                        'day'=>date('Y-m-d'),
                        'session'=>get_cookie('ci_session')
                        ]);
                    $this->db->trans_complete();
                }catch(exception $e){}
            }

        }



        }else{
            header('Location:'.base_url());
        }
    }

    public function category($id){

    }

    public function load_more(){
        
    }


///////////////ajax api
    public function comment()
    {
        # code...
    }
}