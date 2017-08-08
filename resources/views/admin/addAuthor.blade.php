@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">添加作者</h5>
            </div>
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default card-view">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="form-wrap">
                                <form id="add_author_form">
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">作者名</label>
                                        <input type="text" class="form-control" name="name" id="author_name">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">头像</label>
                                        <input type="text" class="form-control" name="avatar"
                                               id="author_avatar" style="display: none;">

                                        <div class="button-list mt-25">
                                            <img id="avatar_preview" style="width: 100px;" src=""/>
                                            <br/>
                                            <div
                                                    data-toggle="modal"
                                                    data-target=".media_select_modal"
                                                    class="select_image btn  btn-success btn-rounded">选择图片
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">简介</label>
                                        <textarea class="form-control" rows="5" name="introduction"
                                                  id="author_intro"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-10 text-left">关注领域</label>
                                        <input style="display: none;" type="text" class="form-control" name="interest" id="author_interest">
                                        <div class="input-group">
                                            <div class="panel-body">
                                                <div class="button-list mt-25 form_tag_list">

                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="author_tag_input"
                                                       placeholder="请输入一个关注领域">
                                                <div id="add_author_tag" class="input-group-addon"><i
                                                            class="icon-plus"></i></div>
                                            </div>

                                        </div>


                                    </div>
                                    {{ csrf_field() }}
                                    <div class="form-group mb-0">
                                        <button type="button" id="author_form_submit" class="btn btn-success pull-right"><span class="btn-text">添加</span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
    </div>
    <div class="modal fade media_select_modal" style="z-index: 10005" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="modal-title" id="myLargeModalLabel">选择</h5>
                </div>
                <div class="modal-body" style="height: 400px;overflow: scroll">
                    <div class="row imageListContainer">
                        <div class="col-sm-12">
                            <div class="panel panel-default card-view">
                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <h6 class="panel-title txt-dark">正在加载，请稍后...</h6>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body">
                                        <div class="progress progress-md">
                                            <div class="progress-bar progress-bar-info progress-bar-striped"
                                                 aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"
                                                 style="width: 85%" role="progressbar"><span class="sr-only">85% Complete (success)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger text-left" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-success text-left" data-dismiss="modal" id="ensure_image_select">确认</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <input id="page_name" style="display: none;" value="addAuthor">
@endsection
