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
        $this->db->where('status','published');
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

    public function preview($post_id)
    {
        $this->db->where('post_id',$post_id);
        $res = $this->db->get('post')->result_array();
        $this->load->view('post_view',[
           'post'=>$res[0]
        ]);
        # code...
    }

    public function category($category_id){
        if (empty($category_id)) {
            header('Location:'.base_url());
        }

        $this->load->view('category_view');
    }



///////////////ajax api
    public function comment()
    {
        $name = $this->input->post('name');
        $content = $this->input->post('content');
        $post_id = $this->input->post('post_id');
        if (empty($name)) {
            $name = '匿名用户';
        }
        $this->db->insert('comment',[
            'author'=>$name,
            'content'=>$content,
            'post_id'=>$post_id
            ]);
    }

    public function load_more($post_id = '', $category_id = '')
    {
        if (empty($post_id)) {
            echo '{"data":null}';
        }else{
            if (empty($category_id)) {
                $this->db->limit(10);
                $this->db->where('post_id >', $post_id);
                $this->db->where('status','published');
                $this->db->select('post_id,abstract,image_url,publish_at');
                $res = $this->db->get('post')->result_array();
                // var_dump($res);
                echo json_encode(['data'=>$res]);
                // var_dump($res);
            }else{

            }
        }
    }
}