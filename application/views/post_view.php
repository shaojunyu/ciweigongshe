<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>刺猬公社——内容产业第一报道媒体</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="stylesheet" href="<?php echo base_url();?>/dist/css/amazeui.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/dist/css/artical.css">
</head>
<body>
<div class="wrapper">
<!-- Header -->
<header data-am-widget="header" class="am-header am-header-default">

</header>

<!-- Menu -->
  <nav data-am-widget="menu" class="am-menu  am-menu-offcanvas1" data-am-menu-offcanvas> 
    <a href="javascript: void(0)" class="am-menu-toggle" id="nav">
          <i class="am-menu-toggle-icon am-icon-bars"></i>
    </a>

    <div class="am-offcanvas" >
      <div class="am-offcanvas-bar">

      <ul class="am-menu-nav am-avg-sm-1">
          <li class="">
            <a href="javascript:;" class="" >FEED流</a>
          </li>
          <li class="">
            <a href="javascript:;" class="" >深报道</a>
          </li>
          <li class="">
            <a href="javascript:;" class="" >热公司</a>
          </li>
          <li class="">
            <a href="javascript:;" class="" >新闻学院</a>
          </li>
          <li class="">
            <a href="javascript:;" class="" >未来内容</a>
          </li>
          <li class="">
            <a href="javascript:;" class="" >会议/培训</a>
          </li>
      </ul>

      </div>
    </div>
  </nav>


<ol class="am-breadcrumb am-breadcrumb-slash my-breadcrumb-style">
  <li><a href="#">首页</a></li>
  <li class="am-active">FEED流</li>
</ol>

<!-- List -->
<div data-am-widget="list_news" class="am-list-news am-list-news-default">
  <div class="am-list-news-bd">
    <ul class="am-list">
     <!--缩略图在标题下方居左-->
      <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-bottom-left">
        <a href="javascript:;" class="my-news-title">旅行</a>
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
          <a href="javascript:;" class="my-news-title">生活</a>
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



  <div data-am-widget="gotop" class="am-gotop am-gotop-fixed" >
    <a href="#top" title="回到顶部">
        <span class="am-gotop-title">回到顶部</span>
          <i class="am-gotop-icon am-icon-chevron-up"></i>
    </a>
  </div>


<!-- 评论 -->
  <div class="my-cover"></div>
  <div class="comment-box">
    <p class="nickname-box"><input type="text" id="nickname" placeholder="输入昵称"> <label for="anonymous"><input type="checkbox" id="anonymous">匿名评论</label></p>
    <form class="am-form">
      <fieldset>
        <div class="am-form-group">
          <label for="doc-ta-1">评论</label>
          <textarea class="comment" rows="4" id="doc-ta-1" style="resize: none;"></textarea>
        </div>
      </fieldset>
    </form>
    <p class="my-button-box">
      <button type="button" id="published" class="am-btn am-btn-primary">发表</button>
      <button type="button" id="cancel" class="am-btn am-btn-dange am-radius">取消</button>
    </p>
  </div>
  <div class="comment-fixed">
    <input class="comment-bottom-btn" readonly="readonly" type="text" placeholder="发表评论">
  </div>

  <div class="footer">
    <p>Copyright &copy; 2016 刺猬公社 京ICP备16021745号</p>
    <p>All Rights Reserved</p>
  </div>

</div>

<script src="<?php echo base_url();?>/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>/dist/js/amazeui.min.js"></script>
<script src="<?php echo base_url();?>/dist/js/artical.js"></script>
</body>
</html>
