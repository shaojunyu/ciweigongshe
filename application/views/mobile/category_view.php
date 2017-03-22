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
  <meta name="category_id" content= "<?php echo $category_id; ?>">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="stylesheet" href="<?php echo base_url();?>/dist/css/amazeui.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/dist/css/app.css">
</head>
<body>
<div class="wrapper">
<?php $this->load->view('mobile/menu'); ?>
  
<ol class="am-breadcrumb am-breadcrumb-slash my-breadcrumb-style">
  <li><a href="<?php echo base_url(); ?>">首页</a></li>
  <li class="am-active"><?php echo $category; ?></li>
</ol>

<!-- List -->
<div data-am-widget="list_news" class="am-list-news am-list-news-default">
  <div class="am-list-news-bd">
    <ul class="am-list">

    <?php
    $query = $this->db->query("select post.post_id,title,image_url,abstract,publish_at from post inner join post_category on post.post_id = post_category.post_id where category_id = ".$category_id." and status = 'published' order by post.post_id DESC  limit 10 ");
    $res = $query->result_array();
    // var_dump($res);
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

<!-- 模态框 -->
<button type="button" id="my-btn-primary" class="am-btn am-btn-primary" data-am-modal="{target: '#my-alert'}" style="display: none;"></button>
<div class="am-modal am-modal-alert" tabindex="-1" id="my-alert" style="z-index: 22222">
  <div class="am-modal-dialog">
    <div class="am-modal-bd">
      
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn">确定</span>
    </div>
  </div>
</div>


<?php
if (count($res) >= 10) {
?>
<button type="button" class="am-btn am-btn-default my-load">加载更多</button>
  <button class="am-btn am-btn-default my-loading">
    <i class="am-icon-spinner am-icon-spin"></i>
    加载中
  </button>
<?php } ?>

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
<script src="<?php echo base_url();?>/dist/js/category.js"></script>
</body>
</html>
