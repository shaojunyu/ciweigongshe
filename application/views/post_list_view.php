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

    <!-- DataTables CSS -->
    <link href="<?php echo base_url();?>/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url();?>/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="<?php echo base_url();?>/dist/css/post-list.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <?php $this->load->view('public_nav'); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-pills" role="tablist" style="margin: 50px 0 30px 0;">
                      <li role="presentation" class="<?php echo $status=='draft'?'active':''; ?>"><a href="<?php echo base_url('admin/post_list/draft');?>">待发布</a></li>

                      <li role="presentation" class="<?php echo $status=='published'?'active':''; ?>"><a href="<?php echo base_url('admin/post_list/published');?>">已发布</a></li>

                      <li role="presentation" class="<?php echo $status=='closed'?'active':''; ?>"><a href="<?php echo base_url('admin/post_list/closed');?>">回收站</a></li>
                    </ul>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>标题</th>
                                        <th>作者</th>
                                        <th>摘要</th>
                                        <th>日期</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($posts as $post){?>
                                    <tr>
                                        <td><?php echo $post['title']; ?></td>
                                        <td><?php echo $post['author']; ?></td>
                                        <td><?php echo $post['abstract']; ?></td>
                                        <td><?php echo $post['update_at']; ?></td>
                                        <td>
                                            <a href="javascript:;">发布</a>
                                            <a href="javascript:;">预览</a>
                                            <a href="javascript:;">编辑</a>
                                            <a href="javascript:;">删除</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>

                            
                              <ul id="pagination1" class="pagination">
                                
                              </ul>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url();?>/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>/dist/js/sb-admin-2.js"></script>
    <script src="<?php echo base_url();?>/dist/js/jqPaginator.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    var count = true;
    var currentPage = 1;
    $('#pagination1').jqPaginator({
        totalPages: 100,
        visiblePages: 10,
        currentPage: currentPage,
        onPageChange: function (num, type) {
            if(count) {
                count = false;
                return;
            }
        }
    });
    </script>

</body>

</html>
