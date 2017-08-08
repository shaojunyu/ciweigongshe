@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <!-- 页面标题 -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">分类管理</h5>
            </div>
            <!-- 附加操作 -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <button
                        class="btn btn-primary btn-rounded btn-icon left-icon pull-right toggle_cat_modify_modal"
                        data-target="#cat_add_modal"
                        data-toggle="modal"
                >
                    <i class="fa fa-plus"></i>
                    <span>添加分类</span>
                </button>
            </div>
            <!-- /附加操作 -->
        </div>
        <!-- /页面标题 -->

        <!-- 素材列表 -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">

                            <div class="table-wrap mt-40">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered mb-0">
                                        <thead>
                                        <tr>
                                            <th>名称</th>
                                            <th>slug</th>
                                            <th>文章数</th>
                                            <th class="text-nowrap">操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($tags as $tag)
                                            <tr>
                                                <td>{{$tag->name}}</td>
                                                <td>
                                                    {{$tag->name}}
                                                </td>
                                                <td>未查询</td>
                                                <td class="text-nowrap">
                                                    <a href="#" class="mr-25 toggle_cat_modify_modal"
                                                       data-action="modify"
                                                       data-toggle="modal"
                                                       data-uid="{{ $tag->object_id }}"
                                                       data-target="#cat_modify_modal"
                                                    >
                                                        <i class="fa fa-pencil text-inverse m-r-10"></i>
                                                    </a>
                                                    <a href="#"
                                                       class="mr-25 cw_delete_btn"
                                                       data-toggle="modal"
                                                       data-target=".delete_confirm_modal"
                                                       type="分类"
                                                       action="DELETE_TAG"
                                                       uid="{{ $tag->object_id }}"
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
    <div class="modal fade" id="cat_modify_modal" tabindex="-1" role="dialog"
         aria-labelledby="cat_modify_modal_label_1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    <h5 class="modal-title" id="cat_modify_modal_labal_1">修改分类</h5>
                </div>
                <div class="modal-body">
                    <form id="cat_modify_form">
                        <div class="form-group">
                            <label for="cat_name_input" class="control-label mb-10">分类名</label>
                            <input type="text" class="form-control" name="name" id="cat_name_input">
                        </div>
                        <input name="object_id" style="display:none;" value="" id="cat_modify_uid_input">
                        {{ csrf_field() }}
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" id="cat_modify_form_submit" class="btn btn-primary cw_submit_btn"
                            data-dismiss="modal">确认修改
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="cat_add_modal" tabindex="-1" role="dialog" aria-labelledby="cat_modify_modal_label_1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    <h5 class="modal-title">添加分类</h5>
                </div>
                <div class="modal-body">
                    <form id="tag_add_form">
                        <div class="form-group">
                            <label for="cat_name_add_input" class="control-label mb-10">分类名</label>
                            <input type="text" class="form-control" name="name" id="cat_name_add_input">

                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" id="add_tag_form_submit" class="btn btn-primary cw_submit_btn">确认</button>
                </div>
            </div>
        </div>
    </div>
@endsection