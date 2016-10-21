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

    <link href="<?php echo base_url();?>/vendor/styles/compose.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">刺猬公社</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> 数据分析</a>
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i> 文章管理</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> 文章发布</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> 评论管理</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> 素材管理</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
    </div>

    <div id="page-wrapper">
        <form class="form-horizontal compose-info" role="form">
          <div class="form-group">
            <label for="inputTitle" class="col-sm-1 control-label">标题</label>
            <div class="col-sm-11">
              <input type="text" class="form-control" id="inputTitle" placeholder="文章标题">
            </div>
          </div>
          <div class="form-group">
            <label for="inputAuthor" class="col-sm-1 control-label">作者</label>
            <div class="col-sm-11">
              <input type="text" class="form-control" id="inputAuthor" placeholder="文章作者">
            </div>
          </div>
          <label class="control-label">文章摘要</label>
          <textarea class="form-control" rows="4"></textarea>

            <label class="control-label" style="padding: 7px 10px 0 0; vertical-align: middle;">文章分类</label>
            <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox1" value="option1"> FEED流
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox2" value="option2"> 深报道
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox3" value="option3"> 热公司
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox4" value="option4"> 新闻学院
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox5" value="option5"> 未来内容
            </label>
            <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox6" value="option6"> 会议/培训
            </label>
          
          <div>  
            <label class="control-label" style="padding: 7px 10px 0 0; vertical-align: middle;">展示选择</label>
            <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox7" value="option7"> 首页轮播展示
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
    <script>
        initSample();

        /*setInterval(function () {
            console.log(CKEDITOR.instances.editor.getData());
        }, 3000);*/
    </script>

</body>

</html>
