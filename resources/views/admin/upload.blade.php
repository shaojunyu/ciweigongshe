@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="pills-struct mt-40">
                    <ul role="tablist" class="nav nav-pills" id="myTabs_6">
                        <li class="active" role="presentation"><a aria-expanded="true" data-toggle="tab" role="tab"
                                                                  id="home_tab_6" href="#image_upload_tab">图片上传</a></li>
                        <li role="presentation" class=""><a data-toggle="tab" id="profile_tab_6" role="tab"
                                                            href="#video_upload_tab" aria-expanded="false">视频上传</a></li>

                    </ul>
                    <div class="tab-content" id="myTabContent_6">
                        <div id="image_upload_tab" class="tab-pane fade active in" role="tabpanel">
                            <div class="panel panel-default card-view">
                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <h6 class="panel-title txt-dark"> Button</h6>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body">
                                        <p class="text-muted" id="upload_useable">
                                            不支持
                                        </p>
                                        <div class="button-list mt-25" id="btn-container">
                                            <button id="selectfiles" class="btn  btn-primary">Primary</button>
                                            <button id="postfiles" class="btn  btn-success">Success</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="video_upload_tab" class="tab-pane fade" role="tabpanel">
                            <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.
                                Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson
                                artisan
                                four loko farm-to-table craft beer twee.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('fe/vendors/plupload/js/plupload.full.min.js') }}"></script>
@endsection