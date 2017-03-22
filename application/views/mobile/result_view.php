<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>刺猬公社</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />
  <link rel="stylesheet" href="<?php echo base_url();?>/dist/css/amazeui.min.css?213">
  <link rel="stylesheet" href="<?php echo base_url();?>/dist/css/artical.css?1212">
</head>
<body>
<div class="wrapper">
<!-- Header -->
<?php $this->load->view('mobile/menu'); ?>
<ol class="am-breadcrumb am-breadcrumb-slash my-breadcrumb-style">
  <li><a href="<?php echo base_url(); ?>">首页</a></li>
  <li class="am-active">搜索结果</li>
</ol>

<div data-am-widget="list_news" class="am-list-news am-list-news-default">
  <div class="am-list-news-bd">
    <ul class="am-list">
    <?php
    if (count($res) == 0) {
      echo("<h1>未搜索到相关内容<h1>");
    }
    foreach ($res as $post) {
    ?>
     <!--缩略图在标题下方居左-->
      <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-bottom-left" data-post-id="<?php echo $post['post_id'];?>">
       <a href="<?php echo base_url('post/show/'.$post['post_id']); ?>">
        <h3 style="font-size: 110%" class="am-list-item-hd"><?php echo $post['title']; ?></h3>
        <div class="am-u-sm-5 am-list-thumb">
            <img src="<?php echo $post['image_url']; ?>" alt=""/>
        </div>
        <div class="am-u-sm-7  am-list-main">
          <div class="am-list-item-text"><?php echo $post['abstract']; ?></div>
        </div>
        <div class="my-clear"></div>
        <span class="my-date"><?php echo substr($post['publish_at'],0,10); ?></span>
        </a>
      </li>
      <?php } ?>
    </ul>
  </div>
</div>

</div>

</body>
</html>
