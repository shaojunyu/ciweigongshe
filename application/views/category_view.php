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
  
<ol class="am-breadcrumb am-breadcrumb-slash my-breadcrumb-style">
  <li><a href="#">首页</a></li>
  <li class="am-active">新闻学院</li>
</ol>

<!-- List -->
<div data-am-widget="list_news" class="am-list-news am-list-news-default">
  <div class="am-list-news-bd">
    <ul class="am-list">

     <!--缩略图在标题下方居左-->
      <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-bottom-left">
        <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11614662/" class="">我很囧，你保重....晒晒旅行中的那些囧！</a></h3>
        <div class="am-u-sm-5 am-list-thumb">
          <a href="http://www.douban.com/online/11614662/" class="">
            <img src="http://s.amazeui.org/media/i/demos/bing-2.jpg" alt="我很囧，你保重....晒晒旅行中的那些囧！"/>
          </a>
        </div>

        <div class="am-u-sm-7  am-list-main">
          <div class="am-list-item-text">囧人囧事囧照，人在囧途，越囧越萌。标记《带你出发，陪我回家》http://book.douban.com/subject/25711202/为“想读”“在读”或“读过”，有机会获得此书本活动进行3个月，每月送出三本书。会有不定期bonus！</div>
        </div>

        <div class="my-clear"></div>
        <span class="my-date">1小时前</span>
      </li>

      <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-bottom-left">
          <h3 class="am-list-item-hd"><a href="http://www.douban.com/online/11624755/" class="">我最喜欢的一张画</a></h3>
          <div class="am-u-sm-5 am-list-thumb">
            <a href="http://www.douban.com/online/11624755/" class="">
              <img src="http://s.amazeui.org/media/i/demos/bing-2.jpg" alt="我最喜欢的一张画"/>
            </a>
          </div>

          <div class=" am-u-sm-7  am-list-main">
            <div class="am-list-item-text">你最喜欢的艺术作品，告诉大家它们的------名图画，色彩，交织，撞色，线条雕塑装置当代古代现代作品的照片美我最喜欢的画群296795413进群发画，少说多发图，</div>
          </div>

          <div class="my-clear"></div>
          <span class="my-date">1小时前</span>
      </li>
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
</body>
</html>
