<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>刺猬公社</title>
    <link rel="stylesheet" href="<?php echo base_url();?>css/amazeui.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/style.css">
</head>

<body>
    <?php $this->load->view('pc/page_header',['category'=>'6']); ?>
    <div class="container">
        <div class="content-container">
            <div class="news-wrapper">
                <?php
                if (count($res) == 0) {
                	echo('<script>alert("暂无相关结果");</script>');
                }
			    foreach ($res as $post) {
			    ?>
                    <div class="news" id="post<?php echo $post['post_id']; ?>">
                        <a href="<?php echo base_url('post/show/'.$post['post_id']); ?>" class="img"><img src="<?php echo $post['image_url']; ?>"></a>
                        <a class="title" href="">
                            <?php echo $post['title']; ?>
                        </a>
                        <p class="abstract">
                            <?php echo $post['abstract']; ?>
                        </p>
                        <span class="date"><?php echo substr($post['publish_at'],0,10); ?></span>
                    </div>
                    <?php } ?>
            </div>
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
    <div class="footer">
        <p>Copyright &copy; 2016 刺猬公社 京ICP备16021745号</p>
        <p>All Rights Reserved</p>
    </div>
</body>

</html>
