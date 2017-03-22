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
  <li class="am-active">搜索</li>
</ol>
<form class="am-form" action="./search" method="get">
  <fieldset>
    <legend></legend>
    <div class="am-form-group">
      <label for="doc-ta-1">请输入要搜索的内容</label>
      <textarea class="" rows="5" id="doc-ta-1" name="search"></textarea>
    </div>
    <p><button type="submit" class="am-btn am-btn-default">提交搜索</button></p>
  </fieldset>
</form>
</div>

</body>
</html>
