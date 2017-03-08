<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>刺猬公社</title>
    <link rel="stylesheet" href="<?php echo base_url();?>css/amazeui.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/style.css">
</head>
<body>
<?php $this->load->view('pc/page_header',['category'=>'0']); ?>
<div class="container">
    <div class="content-container">
        <!-- Slider -->
        <div data-am-widget="slider" class="am-slider am-slider-default" data-am-slider='{}' >
            <ul class="am-slides">
                <?php
                $this->db->order_by('publish_at','DESC');
                $this->db->where('type','slide');
                $this->db->limit(6);
                $this->db->select('post_id,title,image_url');
                $res = $this->db->get('post')->result_array();
                foreach ($res as $post) {
                    ?>
                    <li>
                        <a href="<?php echo base_url('post/show/'.$post['post_id']); ?>">
                            <img src="<?php echo $post['image_url']; ?>">
                            <div class="am-slider-desc"><?php echo $post['title']; ?></div>
                        </a>
                    </li>

                <?php } ?>
            </ul>
        </div>

        <!-- news -->
        <div class="news-wrapper">
             <?php
            $this->db->select('post_id,publish_at,title,image_url,abstract');
            $this->db->where('type','post');
            $this->db->where('status','published')->order_by('post_id','DESC')->limit(9);
            $res = $this->db->get('post')->result_array();
            $i = 0;
            foreach ($res as $post) {
                $i = $i+1;
            ?>
                <div class="news" id="post<?php echo $post['post_id'] ?>">
                    <a href="<?php echo base_url('/post/show/'.$post['post_id']); ?>" class="img"><img src="<?php echo $post['image_url']; ?>"></a>
                    <a class="category">category</a>
                    <a class="title" href="<?php echo base_url('/post/show/'.$post['post_id']); ?>"><?php echo $post['title']; ?></a>
                    <p class="abstract"><?php echo $post['abstract']; ?></p>
                    <h3 class="date" datetime="<?php echo $post['publish_at']?>"><?php echo substr($post['publish_at'],0,10)?></h3>
                </div>
            <?php }?>
        </div>
        <button type="button" class="am-btn am-btn-default my-load">加载更多</button>
        <button class="am-btn am-btn-default my-loading"><i class="am-icon-spinner am-icon-spin"></i>加载中</button>
    </div>
</div>


<div data-am-widget="gotop" class="am-gotop am-gotop-fixed">
    <a href="#top" title="回到顶部">
        <span class="am-gotop-title">回到顶部</span>
        <i class="am-gotop-icon am-icon-chevron-up"></i>
    </a>
</div>

<div class="am-modal am-modal-alert" tabindex="-1" id="my-alert">
    <div class="am-modal-dialog">
        <div class="am-modal-bd"></div>
        <div class="am-modal-footer">
            <span class="am-modal-btn">确定</span>
        </div>
    </div>
</div>

<div class="footer">
    <p>Copyright &copy; 2016 刺猬公社 京ICP备16021745号</p>
    <p>All Rights Reserved</p>
</div>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/amazeui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/home.js"></script>
</body>
</html>