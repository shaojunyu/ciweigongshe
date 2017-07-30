<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>刺猬公社管理后台</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- switchery CSS -->
    <link href="{{ asset('fe/vendors/bower_components/switchery/dist/switchery.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="{{ asset('fe/dist/css/style.css') }}" rel="stylesheet" type="text/css">

</head>
<body>
<!--Preloader-->
<div class="preloader-it">
    <div class="la-anim-1"></div>
</div>
<!--/Preloader-->
<div class="wrapper theme-1-active pimary-color-red">
    <!-- Top Menu Items -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="mobile-only-brand pull-left">
            <div class="nav-header pull-left">
                <div class="logo-wrap">
                    <a href="index.html">
                        <img class="brand-img" src="fe/dist/img/logo.png" alt="brand"/>
                        <span class="brand-text">刺猬公社后台</span>
                    </a>
                </div>
            </div>
        </div>

        <div id="mobile_only_nav" class="mobile-only-nav pull-right">
            <ul class="nav navbar-right top-nav pull-right">
                <li class="dropdown auth-drp">
                    <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="fe/dist/img/user1.png"
                                                                                         alt="user_auth"
                                                                                         class="user-auth-img img-circle"><span
                            class="user-online-status"></span></a>
                    <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX"
                        data-dropdown-out="flipOutX">
                        <li>
                            <a href="#"><i class="zmdi zmdi-settings"></i><span>账号设置</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="zmdi zmdi-power"></i><span>注销</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- /Top Menu Items -->

    <!-- Left Sidebar Menu -->
    <div class="fixed-sidebar-left">
        <ul class="nav navbar-nav side-nav nicescroll-bar">
            <li class="navigation-header">
                <span>导航</span>
                <i class="zmdi zmdi-more"></i>
            </li>
            <li>
                <a href="documentation.html">
                    <div class="pull-left">
                        <i class="zmdi zmdi-book mr-20"></i>
                        <span class="right-nav-text">作者管理</span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="page-wrapper">
        <div class="container-fluid">
           @yield('content')
        </div>

        <!-- Footer -->
        <footer class="footer container-fluid pl-30 pr-30">
            <div class="row">
                <div class="col-sm-12">
                    <p>2017 &copy; 刺猬公社</p>
                </div>
            </div>
        </footer>
        <!-- /Footer -->

    </div>
    <!-- /Main Content -->
</div>
<!-- /#wrapper -->

<div class="modal fade delete_confirm_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="mySmallModalLabel">您确定要删除该<span class="item_type_replace">..</span>吗?</h5>
            </div>
            <div class="modal-body">
                <div class="button-list mt-25">
                    <a class="btn btn-warning cw_confirm_btn" role="button">确认</a>
                    <button class="btn btn-success " type="button" data-dismiss="modal" aria-hidden="true">取消</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>




<!-- JavaScript -->

<!-- jQuery -->
<script src="{{ asset('fe/vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('fe/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('fe/dist/js/dropdown-bootstrap-extended.js') }}"></script>
<script src="{{ asset('fe/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js') }}"></script>
<script src="{{ asset('fe/vendors/bower_components/switchery/dist/switchery.min.js') }}"></script>
<script src="{{ asset('fe/dist/js/init.js') }}"></script>
<script src="{{ asset('fe/dist/js/custom.js') }}"></script>

</body>
</html>