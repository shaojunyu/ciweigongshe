<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>刺猬公社</title>
    <link rel="stylesheet" href="<?php echo base_url();?>css/amazeui.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/style.css">
</head>
<body>
<?php $this->load->view('pc/page_header',['category'=>$category_id]); ?>
<div class="container">
    <div class="content-container">
        <!-- news -->
        <div class="news-wrapper">

    <?php
    $query = $this->db->query("select post.post_id,title,image_url,abstract,publish_at from post inner join post_category on post.post_id = post_category.post_id where category_id = ".$category_id." and status = 'published' order by post.post_id DESC  limit 9 ");
    $res = $query->result_array();
    // var_dump($res);
    foreach ($res as $post) {
    ?>
            <div class="news" id="post<?php echo $post['post_id']; ?>">
                <a href="<?php echo base_url('post/show/'.$post['post_id']); ?>" class="img"><img src="<?php echo $post['image_url']; ?>"></a>
                <a class="title" href="">hhh</a>
                <p class="abstract"><?php echo $post['abstract']; ?></p>
                <span class="date"><?php echo substr($post['publish_at'],0,10); ?></span>
            </div>
<?php } ?>
        </div>
        <button type="button" class="am-btn am-btn-default my-load">加载更多</button>
        <button class="am-btn am-btn-default my-loading"><i class="am-icon-spinner am-icon-spin"></i>加载中</button>
    </div>
</div>
<div class="QrCode-wrap">
    <div class="app-download-container">
        <a href="" target="_blank">
            <p>刺猬公社</p>
            <figure><img src="http://www.ciweigongshe.net/705276324787205976.jpg" alt="QRCode"></figure>
            <p>扫描关注</p>
        </a>
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
<script type="text/javascript" src="<?php echo base_url();?>js/category.js"></script>
</body>
</html>