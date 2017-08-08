@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">作者列表</h5>
            </div>
            <!-- 面包屑导航 -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <a href="/admin/addAuthor">
                    <button class="btn btn-primary btn-rounded btn-icon left-icon pull-right">
                        <i class="fa fa-plus"></i>
                        <span>添加作者</span>
                    </button>
                </a>
            </div>
            <!-- /面包屑导航 -->
        </div>
        <!-- /Title -->

        <!-- Row -->
        <div class="row">
            @foreach ($authors as $author)
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-danger contact-card card-view">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <div class="pull-left user-img-wrap mr-15">
                                    <img class="card-user-img img-circle pull-left" src="{{ $author->avatar }}"
                                         alt="user"/>
                                </div>
                                <div class="pull-left user-detail-wrap">
											<span class="block card-user-name">
												{{ $author->name }}
											</span>
                                    <span class="block card-user-desn">
												作者
											</span>
                                </div>
                            </div>
                            <div class="pull-right">
                                <a class="pull-left inline-block mr-15" href="/admin/updateAuthor/{{$author->object_id}}">
                                    <i class="zmdi zmdi-edit txt-light"></i>
                                </a>
                                <a class="pull-left inline-block mr-15 cw_delete_btn"
                                   href="#"
                                   data-toggle="modal"
                                   data-target=".delete_confirm_modal"
                                   type="作者"
                                   action="DELETE_AUTHOR"
                                   uid="{{ $author->object_id }}"
                                >
                                    <i class="zmdi zmdi-delete txt-light"></i>
                                </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body row">
                                <div class="user-others-details pl-15 pr-15">
                                    <div class="mb-15">
                                        <i class="zmdi zmdi-email-open inline-block mr-10"></i>
                                        <span class="inline-block txt-dark">文章数:??</span>
                                    </div>
                                    <div class="mb-15">
                                        <i class="zmdi zmdi-smartphone inline-block mr-10"></i>
                                        <span class="inline-block txt-dark">粉丝数:??</span>
                                    </div>
                                    <div class="mb-15">
                                        <i class="zmdi zmdi-phone inline-block mr-10"></i>
                                        <span class="inline-block txt-dark">关注领域:
                                            {{ $author->interest }}
                                    </span>
                                    </div>
                                </div>
                                <hr class="light-grey-hr mt-20 mb-20"/>
                                <div class="emp-detail pl-15 pr-15">
                                    <div class="mb-5">
                                        <span class="inline-block capitalize-font mr-5">添加日期:</span>
                                        <span class="txt-dark">12-10-2014</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Row -->
    </div>
@endsection