@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <!-- 页面标题 -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">文章管理</h5>
            </div>
            <!-- 附加操作 -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <a href="添加文章.html">
                    <button
                            class="btn btn-primary btn-rounded btn-icon left-icon pull-right"
                    >
                        <i class="fa fa-plus"></i>
                        <span>添加文章</span>
                    </button>
                </a>
            </div>
            <!-- /附加操作 -->
        </div>
        <!-- /页面标题 -->

        <!-- 素材列表 -->
        <div class="row">

            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">所有文章</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body row pa-0">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                        <tr>
                                            <th>标题</th>
                                            <th>日期</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td>{{ $post->title }}</td>
                                                <td>Jan 18, 2017</td>
                                                <td class="text-nowrap">
                                                    <a href="#" class="mr-25 toggle_cat_modify_modal"
                                                       data-action="modify"
                                                       data-toggle="modal"
                                                       data-target="#cat_modify_modal"
                                                    >
                                                        <i class="fa fa-pencil text-inverse m-r-10"></i>
                                                    </a>
                                                    <a href="#"
                                                       class="mr-25 cw_delete_btn"
                                                       data-toggle="modal"
                                                       data-target=".delete_confirm_modal"
                                                       type="文章"
                                                       action="http://delete.com?key=12345"
                                                    >
                                                        <i class="fa fa-close text-danger"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 素材列表 -->
    </div>
@endsection