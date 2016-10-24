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
  <meta name="post-id" content="<?php echo $post['post_id']; ?>">
  <link rel="stylesheet" href="<?php echo base_url();?>/dist/css/amazeui.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/dist/css/artical.css">
</head>
<body>
<div class="wrapper">
<!-- Header -->
<header data-am-widget="header" class="am-header am-header-default">

</header>

<?php $this->load->view('menu'); ?>


<ol class="am-breadcrumb am-breadcrumb-slash my-breadcrumb-style">
  <li><a href="<?php echo base_url(); ?>">首页</a></li>
  <?php
  $query = $this->db->query("select post_id,category.category_id,category.name from category inner join post_category on post_category.category_id = category.category_id where post_id = ". $post['post_id']);
  $res = $query->result_array();
  foreach ($res as $category) {
    echo "<li><a href=\"".base_url('post/category/'.$category['category_id'])."\">".$category['name']."</a></li>";
  }
  ?>
</ol>

<!-- artical -->
<article class="am-article my-artical-style">
  <div class="am-article-hd">
    <h1 class="am-article-title"><?php echo $post['title']; ?></h1>
  </div>

  <div class="am-article-bd">
    <p class="am-article-lead"><?php echo $post['abstract']; ?></p>
    <div class="author-info">by <?php echo $post['author']; ?></div>
    <?php echo $post['content']; ?>
  </div>
</article>


<div class="bdsharebuttonbox" data-tag="share_1">
  <a class="bds_weixin" data-cmd="weixin"></a>
  <a class="bds_tsina" data-cmd="tsina"></a>
  <a class="bds_qzone" data-cmd="qzone" href="#"></a>
  <a class="bds_count" data-cmd="count"></a>
</div>
<script>
window.onload = function () {
  var bdText = $(".am-article-title").html();
  var bdDesc = $(".am-article-lead").html();
  var bdUrl = window.location.href;
  var bdPic = $("img:eq(0)").attr("src");
  window._bd_share_config = {
    common : {
      bdText : bdText, 
      bdDesc : bdDesc, 
      bdUrl : bdUrl,   
      bdPic : bdPic
    },
    share : [{
      "bdSize" : 24
    }]
  };
  with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
};
  
</script>


<?php
$this->db->where('post_id',$post['post_id']);
$this->db->where('status','approved');
$this->db->limit(10);
$this->db->order_by('comment_id','DESC');
$res = $this->db->get('comment')->result_array();

if (count($res) > 0) {

?>
<!-- 评论列表 -->
<ul class="am-comments-list am-comments-list-flip">
  <?php foreach ($res as $comment) {
    ?>
  <li class="am-comment">
    <a href="#link-to-user-home">
      <img src="<?php  echo base_url(); ?>images/tx.png" class="am-comment-avatar" width="48" height="48"/>
    </a>
    <div class="am-comment-main">
      <header class="am-comment-hd">
        <div class="am-comment-meta">
          <a href="#link-to-user" class="am-comment-author"><?php echo $comment['author']; ?></a>
          评论于 <time><?php echo $comment['create_at']; ?></time>
        </div>
      </header>
      <div class="am-comment-bd">
      <?php echo $comment['content']; ?>
      </div>
    </div>
  </li>
  <?php } ?>
</ul>
<?php } ?>


<!-- List -->
<div data-am-widget="list_news" class="am-list-news am-list-news-default">
  <!--列表标题-->
  <div class="am-list-news-hd am-cf">
    <!--带更多链接-->
    <a href="###">
      <h2>相关文章</h2>
    </a>
  </div>
  <div class="am-list-news-bd">
    <ul class="am-list">
      <li class="am-g">
        <a href="http://www.douban.com/online/11614662/" class="am-list-item-hd">我很囧，你保重....晒晒旅行中的那些囧！</a>
      </li>
      <li class="am-g">
        <a href="http://www.douban.com/online/11624755/" class="am-list-item-hd">我最喜欢的一张画</a>
      </li>
      <li class="am-g">
        <a href="http://www.douban.com/online/11645411/" class="am-list-item-hd">“你的旅行，是什么颜色？” 晒照片，换北欧梦幻极光之旅！</a>
      </li>
    </ul>
  </div>
</div>

<!-- Gallery -->
<div data-am-widget="list_news" class="am-list-news am-list-news-default">
  <!--列表标题-->
  <div class="am-list-news-hd am-cf my-title">
    <!--带更多链接-->
    <a href="###">
      <h2>您可能感兴趣的文章</h2>
    </a>
  </div>

  <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2
    am-avg-md-3 am-avg-lg-4 am-gallery-default">
    <li>
      <div class="am-gallery-item">
        <a href="javascript:;" class="">
          <img src="http://s.amazeui.org/media/i/demos/bing-2.jpg" alt="某天 也许会相遇 相遇在这个好地方" />
          <h3 class="am-gallery-title">远方 有一个地方 那里种有我们的梦想</h3>
          <div class="am-gallery-desc">2375-09-26</div>
        </a>
      </div>
    </li>
    <li>
      <div class="am-gallery-item">
        <a href="javascript:;"  class="">
          <img src="http://s.amazeui.org/media/i/demos/bing-2.jpg"
               alt="某天 也许会相遇 相遇在这个好地方" />
          <h3 class="am-gallery-title">某天 也许会相遇 相遇在这个好地方</h3>
          <div class="am-gallery-desc">2375-09-26</div>
        </a>
      </div>
    </li>
    <li>
      <div class="am-gallery-item">
        <a href="javascript:;" class="">
          <img src="http://s.amazeui.org/media/i/demos/bing-3.jpg"
               alt="不要太担心 只因为我相信" />
          <h3 class="am-gallery-title">不要太担心 只因为我相信</h3>
          <div class="am-gallery-desc">2375-09-26</div>
        </a>
      </div>
    </li>
    <li>
      <div class="am-gallery-item">
        <a href="javascript:;" class="">
          <img src="http://s.amazeui.org/media/i/demos/bing-4.jpg"
               alt="终会走过这条遥远的道路" />
          <h3 class="am-gallery-title">终会走过这条遥远的道路</h3>
          <div class="am-gallery-desc">2375-09-26</div>
        </a>
      </div>
    </li>
  </ul>
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
  <form id="my-form">
    <p class="nickname-box"><input type="text" id="nickname" name="name" placeholder="输入昵称"> <label for="anonymous"><input type="checkbox" id="anonymous">匿名评论</label></p>
      <fieldset>
        <div class="am-form-group">
          <label for="doc-ta-1">评论</label>
          <textarea class="comment" name="content" rows="4" id="doc-ta-1" style="resize: none;"></textarea>
        </div>
      </fieldset>
    <p class="my-button-box">
      <button type="button" id="published" class="am-btn am-btn-primary">发表</button>
      <button type="button" id="cancel" class="am-btn am-btn-dange am-radius">取消</button>
    </p>
    <input type="text" style="display: none;" name="post_id" id="post-id">
  </form>
  </div>
  <div class="comment-fixed">
    <input class="comment-bottom-btn" readonly="readonly" type="text" placeholder="发表评论">
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
