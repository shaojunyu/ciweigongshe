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
                <a class="navbar-brand" href="">刺猬公社</a>
            </div>
            <!-- /.navbar-header -->

            <h3 class="page-title">
                <?php echo isset($title)?$title:'管理后台'; ?>
            </h3>

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                            <a href="<?php echo base_url('admin');?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/data');?>"><i class="fa fa-bar-chart-o fa-fw"></i> 数据分析</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/post_list');?>"><i class="fa fa-table fa-fw"></i> 文章管理</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/compose');?>"><i class="fa fa-edit fa-fw"></i> 文章编辑</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/comment_list');?>"><i class="fa fa-edit fa-fw"></i> 评论管理</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/image_list');?>"><i class="fa fa-wrench fa-fw"></i> 素材管理</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
    </div>