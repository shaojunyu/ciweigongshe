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
            //加载view
            if ($this->is_mobile_device())
            {
                $this->load->view('mobile/post_view',[
                    'post'=>$res[0]
                ]);
            }else{
                $this->load->view('pc/post_view',[
                    'post'=>$res[0],
                    'category_id'=>'1'
                ]);
            }


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
        $this->db->where('category_id',$category_id);
        $res = $this->db->get('category')->result_array();
        $category = $res[0]['name'];

        if ($this->is_mobile_device()){
            $this->load->view('mobile/category_view',[
                'category'=>$category,
                'category_id'=>$category_id
            ]);
        }else{
            $this->load->view('pc/category_view',[
                'category'=>$category,
                'category_id'=>$category_id
            ]);
        }



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
                $this->db->order_by('post_id','DESC');
                $this->db->where('post_id <', $post_id);
                $this->db->where('status','published');
                $this->db->select('post_id,abstract,image_url,publish_at,title');
                $res = $this->db->get('post')->result_array();
                // var_dump($res);
                echo json_encode($res);
                // var_dump($res);
            }else{
                $query = $this->db->query("select post.post_id,title,image_url,abstract,publish_at from post inner join post_category on post.post_id = post_category.post_id where category_id = ".$category_id." and post.post_id < ".$post_id." and status = 'published' limit 10 ");
                $res = $query->result_array();
                echo json_encode($res);
            }
        }
    }


    //private
    private function is_mobile_device()
    {
        return preg_match('/mobile/i',$_SERVER['HTTP_USER_AGENT'])==1?true:false;
    }
}