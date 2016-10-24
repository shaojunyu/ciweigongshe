<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>刺猬公社——内容产业第一报道媒体</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="stylesheet" href="<?php echo base_url();?>/dist/css/amazeui.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/dist/css/app.css">
</head>
<body>
<div class="wrapper">

<!-- Header -->
<header data-am-widget="header" class="am-header am-header-default">
  
</header>

<?php $this->load->view('menu'); ?>

<!-- Slider -->
<div data-am-widget="slider" class="am-slider am-slider-default" data-am-slider='{}' >
  <ul class="am-slides">
  <?php
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



<!-- List -->
<div data-am-widget="list_news" class="am-list-news am-list-news-default">
  <div class="am-list-news-bd">
    <ul class="am-list">


    <?php
    $this->db->select('post_id,publish_at,title,image_url,abstract');
    $this->db->where('type','post');
    $this->db->where('status','published')->order_by('post_id','DESC')->limit(10);
    $res = $this->db->get('post')->result_array();
    foreach ($res as $post) {
    ?>
     <!--缩略图在标题下方居左-->
      <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-bottom-left">
        <a href="<?php echo base_url('/post/show/'.$post['post_id']); ?>">
        <h3 class="am-list-item-hd"><?php echo $post['title']; ?></h3>
        <div class="am-u-sm-5 am-list-thumb">
            <img src="<?php echo $post['image_url']; ?>" alt=""/>
        </div>
        <div class="am-u-sm-7  am-list-main">
          <div class="am-list-item-text"><?php echo $post['abstract']; ?> </div>
        </div>
        <div class="my-clear"></div>
        <span class="my-date"><?php echo $post['publish_at']; ?></span>
        </a>
      </li>
      <?php } ?>

    </ul>
  </div>
</div>

  <button type="button" class="am-btn am-btn-default my-load">加载更多</button>
  <button class="am-btn am-btn-default my-loading">
    <i class="am-icon-spinner am-icon-spin"></i>
    加载中
  </button>

  <div data-am-widget="gotop" class="am-gotop am-gotop-fixed" >
    <a href="#top" title="回到顶部">
        <span class="am-gotop-title">回到顶部</span>
          <i class="am-gotop-icon am-icon-chevron-up"></i>
    </a>
  </div>

  <div class="footer">
    <p>Copyright &copy; 2016 刺猬公社 京ICP备16021745号</p>
    <p>All Rights Reserved</p>
  </div>

</div>
<script src="<?php echo base_url();?>/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>/dist/js/amazeui.min.js"></script>
<script src="<?php echo base_url();?>/dist/js/main.js"></script>
</body>
</html>
