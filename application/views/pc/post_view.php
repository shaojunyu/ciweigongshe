<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>刺猬公社</title>
    <link rel="stylesheet" href="<?php echo base_url();?>css/post.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/amazeui.min.css">
</head>
<body>
<?php $this->load->view('pc/page_header',['category'=>$category_id]); ?>

<div class="container">
    <article id="post<?php echo $post['post_id']; ?>">
        <h1 class="postTitle" itemprop="postSubject"><?php echo $post['title']; ?></h1>
        <div class="post_meta">
            <span class="date" datetime="<?php echo $post['publish_at']; ?>"><?php echo substr($post['publish_at'], 0, 10); ?></span>
            <span class="author"><?php echo $post['author'];?></span>
        </div>
        <p class="abstract"><?php echo $post['abstract']; ?></p>
        <img class="large-img" src="<?php echo $post['image_url']; ?>">
        <div class="content" itemprop="articleBody">
        <?php //
            // echo $post['content']; 
            $content = preg_replace('/white-space: nowrap;/', '', $post['content']);
            $content = preg_replace('/<p><span style=""><br><\/span><\/p>/', '', $content);
            echo $content;
        ?>
        </div>
    </article>
    <div class="QrCode-wrap">
        <div class="app-download-container">
            <a href="" target="_blank">
                <p>刺猬公社</p>
                <figure><img src="" alt="QRCode"></figure>
                <p>扫描关注</p>
            </a>
        </div>
    </div>
    <!-- 分享 -->
    <div class="share">
        <div class="bdsharebuttonbox" data-tag="share_1">
            <a class="bds_weixin" data-cmd="weixin"></a>
            <a class="bds_tsina" data-cmd="tsina"></a>
            <a class="bds_qzone" data-cmd="qzone" href="#"></a>
            <a class="bds_count" data-cmd="count"></a>
        </div>
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
    <div class="comment-edit">
        <p class="comments-block">发表评论</p>
        <form id="my-form">
            <p class="nickname-box"><input type="text" id="nickname" name="name" placeholder="输入昵称"> <label for="anonymous"><input type="checkbox" id="anonymous">匿名评论</label></p>
            <fieldset>
                <div class="am-form-group">
                    <label for="doc-ta-1">评论</label>
                    <textarea class="comment" name="content" rows="4" id="doc-ta-1" style="resize: none;"></textarea>
                </div>
            </fieldset>
            <p class="my-button-box">
                <button type="button" id="published" class="am-btn am-btn-primary">提交</button>
                <button type="reset" id="cancel" class="am-btn am-btn-dange am-radius">重置</button>
            </p>
            <input type="text" style="display: none;" name="post_id" id="post-id">
        </form>
    </div>


    <div class="comments-wrapper">
        <p class="comments-block">评论区</p>
        <!-- 评论列表 -->
        <ul class="am-comments-list am-comments-list-flip">

<?php
$this->db->where('post_id',$post['post_id']);
$this->db->where('status','approved');
$this->db->limit(10);
$this->db->order_by('comment_id','DESC');
$res = $this->db->get('comment')->result_array();
if (count($res) > 0) {
    foreach ($res as $comment) {
?>
            <li class="am-comment">
                <a href="#link-to-user-home">
                    <img src="<?php echo base_url();?>favicon.ico" class="am-comment-avatar" width="48" height="48"/>
                </a>
                <div class="am-comment-main">
                    <header class="am-comment-hd">
                        <div class="am-comment-meta">
                            <a href="#link-to-user" class="am-comment-author"><?php echo $comment['author']; ?></a>
                            评论于 <time datetime="<?php echo $comment['create_at']; ?>"><?php echo $comment['create_at']; ?></time>
                        </div>
                    </header>
                    <div class="am-comment-bd"> <?php echo $comment['content']; ?></div>
                </div>
            </li>
<?php }
}?>
        </ul>
    </div>

    <div class="interested">
        <p class="interested-block">文章推荐</p>
<?php
$sql = "select post.post_id,post.title,post.image_url,post.publish_at,post.abstract,post.author from post where status = 'published' and post_id in
(select distinct post_category.post_id from post_category where  post_category.category_id in 
(select post_category.category_id from post_category where post_id = ".$post['post_id'].") and post_id != ".$post['post_id'].") order by post_id DESC limit 3";
$query = $this->db->query($sql);
$res = $query->result_array();
// var_dump($res);
foreach ($res as $relative_post) {
?>
        <div class="news" id="">
            <a href="<?php echo base_url('post/show/'.$relative_post['post_id']); ?>" class="img"><img src="<?php echo $relative_post['image_url']; ?>"></a>
            <a class="category"><?php echo $relative_post['author']; ?></a>
            <a class="title" href=""><?php echo $relative_post['title']; ?></a>
            <p class="abstract"><?php echo $relative_post['abstract']; ?></p>
            <span class="date"><?php echo substr($post['publish_at'],0,10)?></span>
        </div>
<?php } ?>

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
<script type="text/javascript" src="<?php echo base_url();?>js/post.js"></script>
</body>
</html>