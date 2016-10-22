<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>刺猬公社——内容产业第一报道媒体</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url();?>/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="<?php echo base_url();?>/vendor/ckeditor/neo.css" rel="stylesheet">

    <link href="<?php echo base_url();?>/dist/css/compose.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<?php $this->load->view('public_nav');?>

    <div id="page-wrapper">
        <form class="compose-info" role="form">
          <div class="form-group">
            <label for="inputTitle" class="control-label">标题</label>
            <input type="text" class="form-control" id="inputTitle" placeholder="文章标题">
          </div>
          <div class="form-group">
            <label for="inputAuthor" class="control-label">作者</label>
            <input type="text" class="form-control" id="inputAuthor" placeholder="文章作者">
          </div>
          <label class="control-label">文章摘要</label>
          <textarea class="form-control summary" rows="4"></textarea>

            <div><label class="control-label" style="padding: 7px 10px 0 0; vertical-align: middle;">文章分类</label></div>
            <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox1" name="sort" value="FEED流"> FEED流
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox2" name="sort" value="深报道"> 深报道
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox3" name="sort" value="热公司"> 热公司
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox4" name="sort" value="新闻学院"> 新闻学院
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox5" name="sort" value="未来内容"> 未来内容
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox6" name="sort" value="会议/培训"> 会议/培训
            </label>
          
          <div>  
            <div><label class="control-label" style="padding: 7px 10px 0 0; vertical-align: middle;">展示选择</label></div>
            <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox7" name="is-show" value="option7"> 首页轮播展示
            </label>
          </div>
        </form>
        <div class="adjoined-bottom">
            <div class="grid-container">
                <div class="grid-width-100">
                    <div id="editor">
                        
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary compose-artical">发布文章</button>
    </div>


    <!-- jQuery -->
    <script src="<?php echo base_url();?>/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>/dist/js/sb-admin-2.js"></script>

    <script src="<?php echo base_url();?>/vendor/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url();?>/vendor/ckeditor/sample.js"></script>
    <script src="<?php echo base_url();?>/dist/js/compose.js"></script>

</body>

</html>
