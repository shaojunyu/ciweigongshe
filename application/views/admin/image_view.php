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
    <link href="<?php echo base_url();?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?php echo base_url();?>vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url();?>vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="<?php echo base_url();?>/dist/css/post-list.css">
    <link rel="stylesheet" href="<?php echo base_url();?>/dist/css/unite.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <?php $this->load->view('admin/public_nav',['title'=>'素材管理']); ?>
        <div id="page-wrapper">
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
<?php
$res = $this->db->limit(10)->order_by('id','DESC')->get('image')->result_array();
// var_dump($res);
foreach ($res as $image) {
    if (!file_exists('./images/upload/'.$image['file_name'])) {
        continue;
    }
?>
                    <div class="col-lg-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?php echo $image['origin_name']; ?>
                            </div>
                            <div class="panel-body" style="max-height: 220px; overflow: hidden;">
                            <img src="<?php echo base_url('images/upload/'.$image['file_name']); ?>" class="img-responsive" alt="Responsive image" file_name="<?php echo $image['file_name'];  ?>" image_id="<?php echo $image['id']; ?>">
                            </div>
                            <div class="panel-footer">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#imgLinks">获取链接</button>
                                <div class="modal fade" id="imgLinks" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                            </div>
                                            <div class="modal-body">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                                <button type="button" class="btn btn-primary">复制</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteImg" hash="<?php echo $image['raw_name'] ?>">删除</button>
                                <div class="modal fade" id="deleteImg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">操作提醒</h4>
                                            </div>
                                            <div class="modal-body">确定要删除此图片吗？</div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                                <button type="button"  class="btn btn-danger delete-img-true">删除</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            </div>
                        </div>
                    </div>
<?php } ?>
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


    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>/dist/js/sb-admin-2.js"></script>
    <script src="<?php echo base_url();?>/dist/js/jqPaginator.min.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('.delete-img-true').on('click',function () {
                var imgId = $(this).parents('.col-lg-3').find('img.img-responsive').attr('file_name');
                var baseUrl = subBefore(window.location.href, 'admin');
                var postUrl = baseUrl.concat('/delete_image/',imgId);
                console.log($(this));
                // $.post(postUrl,function () {
                //     console.log('dsfsdg');
                // });
            });
        });
        function subBefore(sourceStr, paraStr) {
            var index = sourceStr.indexOf(paraStr);
            if (index == -1) return sourceStr;
            else return sourceStr.substr(0, index + paraStr.length);
        }
    </script>
</body>

</html>
