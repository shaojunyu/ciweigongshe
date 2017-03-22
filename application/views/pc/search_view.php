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
            <div class="news-wrapper" style="width: 70%;">
                <form class="am-form" action="./search" method="get">
                    <fieldset>
                        <legend style="color: white;">请输入要搜索的内容</legend>
                        <div class="am-form-group">
                            <label for="doc-ta-1"></label>
                            <textarea class="" rows="5" id="doc-ta-1" name="search"></textarea>
                        </div>
                        <p>
                            <button type="submit" class="am-btn am-btn-default">提交搜索</button>
                        </p>
                    </fieldset>
                </form>
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
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/amazeui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/category.js"></script>
</body>

</html>
