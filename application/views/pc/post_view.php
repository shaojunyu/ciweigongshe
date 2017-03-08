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
        <div class="content" itemprop="articleBody"><?php echo $post['content']; ?></div>
    </article>
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
            <li class="am-comment">
                <a href="#link-to-user-home">
                    <img src="images/tx.png" class="am-comment-avatar" width="48" height="48"/>
                </a>
                <div class="am-comment-main">
                    <header class="am-comment-hd">
                        <div class="am-comment-meta">
                            <a href="#link-to-user" class="am-comment-author">匿名用户</a>
                            评论于 <time datetime="2016-12-16T00:00:00Z">2016年12月16日</time>
                        </div>
                    </header>
                    <div class="am-comment-bd">哈达和大叔的哈维斯的哈uh大</div>
                </div>
            </li>
            <li class="am-comment">
                <a href="#link-to-user-home">
                    <img src="images/tx.png" class="am-comment-avatar" width="48" height="48"/>
                </a>
                <div class="am-comment-main">
                    <header class="am-comment-hd">
                        <div class="am-comment-meta">
                            <a href="#link-to-user" class="am-comment-author">匿名用户</a>
                            评论于 <time datetime="2016-12-16T00:00:00Z">2016年12月16日</time>
                        </div>
                    </header>
                    <div class="am-comment-bd">哈达和大叔的哈维斯的哈uh大</div>
                </div>
            </li>
        </ul>
    </div>

    <div class="interested">
        <p class="interested-block">您可能感兴趣的</p>
        <div class="news-list clearfix">
            <div class="news">
                <a href="javascript:;" class="img"><img src="http://s.amazeui.org/media/i/demos/bing-1.jpg"></a>
                <a class="title" href="javascript:;">哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈</a>
            </div>
            <div class="news">
                <a href="javascript:;" class="img"><img src="http://s.amazeui.org/media/i/demos/bing-1.jpg"></a>
                <a class="title" href="javascript:;">哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈</a>
            </div><div class="news">
                <a href="javascript:;" class="img"><img src="http://s.amazeui.org/media/i/demos/bing-1.jpg"></a>
                <a class="title" href="javascript:;">哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈</a>
            </div>
        </div>

        <div class="news-list clearfix">
            <div class="news">
                <a href="javascript:;" class="img"><img src="http://s.amazeui.org/media/i/demos/bing-1.jpg"></a>
                <a class="title" href="javascript:;">哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈</a>
            </div><div class="news">
                <a href="javascript:;" class="img"><img src="http://s.amazeui.org/media/i/demos/bing-1.jpg"></a>
                <a class="title" href="javascript:;">哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈</a>
            </div><div class="news">
                <a href="javascript:;" class="img"><img src="http://s.amazeui.org/media/i/demos/bing-1.jpg"></a>
                <a class="title" href="javascript:;">哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈</a>
            </div>
        </div>
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