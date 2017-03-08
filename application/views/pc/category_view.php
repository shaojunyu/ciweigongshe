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
            <div class="news">
                <a href="javascript:;" class="img"><img src="http://s.amazeui.org/media/i/demos/bing-1.jpg"></a>
                <a class="category">category</a>
                <a class="title" href="javascript:;">哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈</a>
                <p class="brief">哈哈哈哈哈哈啊哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈qdbajkefbaeksfbakwdhakefefjasdjskfenekasjfweasjfubekafbhakfcbakefuwqdbajkefbaeksfbakwdhakefefjasdjskfenekasjfweasjfubekafbhakfcbakefuwqdbajkefbaeksfbakwdhakefefjasdjskfenekasjfweasjfubekafbhakfcbakefuwqdbajkefbaeksfbakwdhakefefjasdjskfenekasjfweas</p>
                <span class="date">1天前</span>
            </div>
            <div class="news">
                <a href="javascript:;" class="img"><img src="http://s.amazeui.org/media/i/demos/bing-1.jpg"></a>
                <a class="category">category</a>
                <a class="title" href="javascript:;">hhh</a>
                <p class="brief">asdjskfenekasjfweasjfubekafbhakfcbakefuwqdbajkefbaeksfbakwdhakefefj</p>
                <span class="date">1天前</span>
            </div>
            <div class="news">
                <a href="javascript:;" class="img"><img src="http://s.amazeui.org/media/i/demos/bing-1.jpg"></a>
                <a class="category">category</a>
                <a class="title" href="javascript:;">hhh</a>
                <p class="brief">asdjskfenekasjfweasjfubekafbhakfcbakefuwqdbajkefbaeksfbakwdhakefefj</p>
                <span class="date">1天前</span>
            </div>
            <div class="news">
                <a href="javascript:;" class="img"><img src="http://s.amazeui.org/media/i/demos/bing-1.jpg"></a>
                <a class="category">category</a>
                <a class="title" href="javascript:;">hhh</a>
                <p class="brief">asdjskfenekasjfweasjfubekafbhakfcbakefuwqdbajkefbaeksfbakwdhakefefj</p>
                <span class="date">1天前</span>
            </div>
            <div class="news">
                <a href="javascript:;" class="img"><img src="http://s.amazeui.org/media/i/demos/bing-1.jpg"></a>
                <a class="category">category</a>
                <a class="title" href="javascript:;">hhh</a>
                <p class="brief">asdjskfenekasjfweasjfubekafbhakfcbakefuwqdbajkefbaeksfbakwdhakefefj</p>
                <span class="date">1天前</span>
            </div>
            <div class="news" id="post47">
                <a href="javascript:;" class="img"><img src="http://s.amazeui.org/media/i/demos/bing-1.jpg"></a>
                <a class="category">category</a>
                <a class="title" href="javascript:;">hhh</a>
                <p class="brief">asdjskfenekasjfweasjfubekafbhakfcbakefuwqdbajkefbaeksfbakwdhakefefj</p>
                <span class="date">1天前</span>
            </div>
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
<script type="text/javascript" src="<?php echo base_url();?>js/category.js"></script>
</body>
</html>