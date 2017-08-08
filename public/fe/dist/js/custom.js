/**
 * Created by sunqi on 17/7/15.
 */
( function ($){
    $.fn.serializeJson= function (){
        var serializeObj={};
        $( this .serializeArray()).each( function (){
            serializeObj[ this .name]= this .value;
        });
        return serializeObj;
    };
})(jQuery);

(function($){
    $.fn.serializeJson=function(){
        var serializeObj={};
        $(this.serializeArray()).each(function(){
            serializeObj[this.name]=this.value;
        });
        return serializeObj;
    };
})(jQuery);




var EDITOR = null;
var IAMGE_LIST_LOADED = false;
var ADDRESS = '';
var tags_helper = {}
$(function() {

    function sendData(type, data, success, error, uid) {
        var api = {
            LOGIN: {
                url: ADDRESS + '/login',
                method: 'post'
            },
            ADD_TAG: {
                url: '/admin/addTag',
                method: 'post'
            },
            DELETE_TAG: {
                url: '/admin/deleteTag/' + uid,
                method: 'get'
            },
            UPDATE_TAG: {
                url: '/admin/updateTag',
                method: 'post'
            },
            GET_IMAGE_LIST: {
                url: '/admin/getImageList',
                method: 'get'
            },
            ADD_AUTHOR: {
                url: '/admin/addAuthor',
                method: 'post'
            },
            'DELETE_AUTHOR': {
                url: '/admin/deleteAuthor/' + uid,
                method: 'get'
            },
            'GET_AUTHOR_DATA': {
                url: 'admin/getAuthor/' + uid,
                method: 'get'
            },
            'UPDATE_AUTHOR': {
                url: '/admin/updateAuthor',
                method: 'post'
            }
        }

        if(!api[type]) {
            console.error('错误数据发送类型');
            return;
        }

        $.ajax({
            headers: {
                'X-XSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: api[type].method,
            url: api[type].url,
            data: data || {},
            success: success || function(d) {
                if(d.code == 0) {
                    window.location.reload()
                } else {
                    $.toast().reset('all');
                    $("body").removeAttr('class');
                    $.toast({
                        text: '错误',
                        position: 'bottom-left',
                        loaderBg:'#e69a2a',
                        icon: 'info',
                        hideAfter: 3000,
                        stack: 6
                    });
                }
            },
            error: error || function(d) {
                $.toast().reset('all');
                $("body").removeAttr('class');
                $.toast({
                    text: '网络出错，请重试！',
                    position: 'bottom-left',
                    loaderBg:'#e69a2a',
                    icon: 'info',
                    hideAfter: 3000,
                    stack: 6
                });
            }
        })
    }

    function initImageSelect() {
        $('.select_image').click(function(e) {
            if(IAMGE_LIST_LOADED) {
                return false;
            }
            e.preventDefault();
            function onSuccess (d) {
                IAMGE_LIST_LOADED = true;
                var list = d.images;
                var url = '';
                var htm = list.map(function(obj) {
                    return '<div class="col-sm-3 col-xs-6">'+
                        '<div class="panel panel-default card-view pa-0">'+
                        '<div class="panel-wrapper collapse in">'+
                        '<div class="panel-body pa-0">'+
                        '<article class="col-item">'+
                        '<div class="photo">'+
                        '<div class="options">'+
                        '<button ' +
                            'data-url="' + obj.url + '"' +
                        'class="btn btn-default btn-icon-anim btn-circle media_select_btn"><i class="fa fa-check"></i></button>'+
                        '</div>'+
                        '<a href="javascript:void(0);"> <img src="' + obj.url + '" class="img-responsive" alt="Product Image" style="width: 100%;height: 120px;"> </a>'+
                        '</div>'+
                        '</article>'+
                        '</div>'+
                        '</div>'+
                        '</div>';

                })
                $('.imageListContainer').html(htm);

                $('.media_select_btn').click(function() {
                    $('.media_select_btn').removeClass('btn-info');
                    $(this).addClass('btn-info')
                    url = $(this).data('url');
                })

                $('#ensure_image_select').click(function() {
                    if (url) {
                        $('#avatar_preview').attr('src', url);
                        $('#author_avatar').val(url);
                    }
                })
                // initMediaSelect()
            }
            sendData('GET_IMAGE_LIST', null, onSuccess, null, null)

        })
    }
    function initTagsEdit() {
        function joinTag(obj) {
            var arr = [];
            for(var prop in obj) {
                if(obj[prop]) {
                    arr.push(obj[prop]);
                }
            };
            var val = arr.join(',');
            if ( val ) {
                console.log(val);
                $('#author_interest').val(val);
            } else {
                $('#author_interest').val('');
            }
        }
        $('#add_author_tag').click(function() {
            var tag_name = $('#author_tag_input').val().trim() + '';
            var rand_id = 'tag' + (Math.random() + '').split('.')[1]
            var htm = '<button class="btn btn-primary btn-rounded btn-lable-wrap right-label author_tag">'+
                '    <span class="btn-text">\{tag_name\}</span>'+
                '    <span class="btn-label delete_tag_btn" id="\{rand_id\}"><i class="fa fa-times"></i> </span>'+
                '</button>';
            if(tag_name) {
                var $htm = $(htm.replace('{tag_name}', tag_name).replace('{rand_id}',rand_id))
                $('.form_tag_list').append($htm)
                tags_helper[rand_id] = tag_name
                joinTag(tags_helper);
                $('#' + rand_id).click(function() {
                    event.preventDefault()
                    $(this).parents('.author_tag:first').remove()
                    tags_helper[rand_id] = ''
                    joinTag(tags_helper);
                })

            }

        })
    }
    function initAuthorForm(action) {
        $('#author_form_submit').click(function(e) {
            e.preventDefault();
            var form_data = $('#add_author_form').serializeJson();
            if(!(form_data.name
                && form_data.introduction
                && form_data.interest
                && form_data.avatar)) {
                alert('请完善信息')
                return false
            }
            sendData(action || 'ADD_AUTHOR', form_data)

        })
    }
    function initMediaSelect() {
        $('.media_select_btn').click(function() {
            if($(this).hasClass('btn-default')) {
                $(this).removeClass('btn-default').addClass('btn-info')
            } else {
                $(this).removeClass('btn-info').addClass('btn-default')

            }
        })
    }


    initProgressTip()
    function initProgressTip() {
        $('.cw_submit_btn').on('click',function(e){
            $.toast().reset('all');
            $("body").removeAttr('class').removeClass("bottom-center-fullwidth").addClass("top-center-fullwidth");
            $.toast({
                heading: '',
                text: '数据处理中，请稍后。。。',
                position: 'top-center',
                loaderBg:'green',
                hideAfter: 3500
            });
            return false;
        });
    }

    function initAddAuthor() {
        initImageSelect()
        initTagsEdit()
        initAuthorForm()
        // initMediaSelect()
    }

    function initUpdateAuthor() {
        initImageSelect()
        initTagsEdit()
        initAuthorForm('UPDATE_AUTHOR')
    }

    var page_name = $('#page_name').val()
    switch (page_name) {
        case 'login':
            initLoginPage();
            break;
        case 'addAuthor':
            initAddAuthor();
            break;
        case 'updateAuthor':
            initUpdateAuthor();
            break;
    }

    $('.cw_delete_btn').click(function() {
        var item_type = $(this).attr('type');
        var action = $(this).attr('action');
        var uid = $(this).attr('uid');
        $('.delete_confirm_modal .item_type_replace').html(item_type);
        $('.delete_confirm_modal .cw_confirm_btn').click(function() {
            sendData(action, null, null, null, uid)
        })
    })


    function initLoginPage() {
        // initLoginForm()
    }


    //
    //$('.delete_tag_btn').click(function() {
    //    $(this).parents().find('.author_tag')[0].remove()
    //})

    initTagModify()

    function initTagModify() {
        $('.toggle_cat_modify_modal').click(function() {
            var uid = $(this).data('uid');
            var action = $(this).data('action')
            $('#cat_modify_uid_input').val(uid)
        })
        $('#cat_modify_form_submit').click(function() {
            var form_data = $('#cat_modify_form').serializeJson()
            sendData('UPDATE_TAG', form_data)
        })

    }




    //initEditor()
    initAddTagForm()
    function initAddTagForm() {
        $('#add_tag_form_submit').click(function(e) {
            e.preventDefault()
            var form_data = $('#tag_add_form').serializeJson();
            sendData('ADD_TAG', form_data)
        })
    }

    function initLoginForm() {

        $('#login_form').bind('submit', function(e) {
            e.preventDefault();
            var email = $(this).find('#login_form_username').val().trim() + ''
            var password = $(this).find('#login_form_pwd').val().trim() + ''
            if(email && password) {
                var form_data = {
                    email: email,
                    password: password,
                    _token: $(this).find('#hide_token').val().trim()
                }
                function success(res) {
                    console.log(res)
                }
                function error() {
                    console.error('error')
                }
                sendData('LOGIN', form_data, success, error)
            }
        })
    }
    function initEditor() {
        var E = window.wangEditor
        var editor2 = new E('#article_form_editor')

        editor2.customConfig.menus = [
            'head',  // 标题
            'bold',  // 粗体
            'italic',  // 斜体
            'underline',  // 下划线
            'strikeThrough',  // 删除线
            'foreColor',  // 文字颜色
            'backColor',  // 背景颜色
            'link',  // 插入链接
            'list',  // 列表
            'justify',  // 对齐方式
            'quote',  // 引用
            'emoticon',  // 表情
            'table',  // 表格
            'video',  // 插入视频
            'code',  // 插入代码
            'undo',  // 撤销
            'redo'  // 重复
        ]
        editor2.create()

        $('.w-e-toolbar').append(
        '<div class="w-e-menu" data-toggle="modal" data-target=".media_select_modal" style="z-index:10001;"><i class="w-e-icon-image"><i></i></i></div>' +
        '<div class="w-e-menu" style="z-index:10001;"><i class="w-e-icon-play"><i></i></i></div>'
        )
        EDITOR = editor2;
    }


    // initUpload();

    function initUpload() {
        accessid = ''
        accesskey = ''
        host = ''
        policyBase64 = ''
        signature = ''
        callbackbody = ''
        filename = ''
        key = ''
        expire = 0
        g_object_name = ''
        g_object_name_type = ''
        now = timestamp = Date.parse(new Date()) / 1000;

        function send_request()
        {
            var xmlhttp = null;
            if (window.XMLHttpRequest)
            {
                xmlhttp=new XMLHttpRequest();
            }
            else if (window.ActiveXObject)
            {
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }

            if (xmlhttp!=null)
            {
                serverUrl = '/admin/getUploadToken/image'
                xmlhttp.open( "GET", serverUrl, false );
                xmlhttp.send( null );
                return xmlhttp.responseText
            }
            else
            {
                alert("Your browser does not support XMLHTTP.");
            }
        };

        function check_object_radio() {
            var tt = document.getElementsByName('myradio');
            for (var i = 0; i < tt.length ; i++ )
            {
                if(tt[i].checked)
                {
                    g_object_name_type = tt[i].value;
                    break;
                }
            }
        }

        function get_signature()
        {
            //可以判断当前expire是否超过了当前时间,如果超过了当前时间,就重新取一下.3s 做为缓冲
            now = timestamp = Date.parse(new Date()) / 1000;
            if (expire < now + 3)
            {
                body = send_request()
                var obj = eval ("(" + body + ")");
                host = obj['host']
                policyBase64 = obj['policy']
                accessid = obj['accessid']
                signature = obj['signature']
                expire = parseInt(obj['expire'])
                callbackbody = obj['callback']
                key = obj['dir']
                return true;
            }
            return false;
        };

        function random_string(len) {
            len = len || 32;
            var chars = 'ABCDEFGHJKMNPQRSTWXYZabcdefhijkmnprstwxyz2345678';
            var maxPos = chars.length;
            var pwd = '';
            for (i = 0; i < len; i++) {
                pwd += chars.charAt(Math.floor(Math.random() * maxPos));
            }
            return pwd;
        }

        function get_suffix(filename) {
            pos = filename.lastIndexOf('.')
            suffix = ''
            if (pos != -1) {
                suffix = filename.substring(pos)
            }
            return suffix;
        }

        function calculate_object_name(filename)
        {
            if (g_object_name_type == 'local_name')
            {
                g_object_name += "${filename}"
            }
            else if (g_object_name_type == 'random_name')
            {
                suffix = get_suffix(filename)
                g_object_name = key + random_string(10) + suffix
            }
            return ''
        }

        function get_uploaded_object_name(filename)
        {
            if (g_object_name_type == 'local_name')
            {
                tmp_name = g_object_name
                tmp_name = tmp_name.replace("${filename}", filename);
                return tmp_name
            }
            else if(g_object_name_type == 'random_name')
            {
                return g_object_name
            }
        }

        function set_upload_param(up, filename, ret)
        {
            if (ret == false)
            {
                ret = get_signature()
            }
            g_object_name = key;
            if (filename != '') { suffix = get_suffix(filename)
                calculate_object_name(filename)
            }
            new_multipart_params = {
                'key' : g_object_name,
                'policy': policyBase64,
                'OSSAccessKeyId': accessid,
                'success_action_status' : '200', //让服务端返回200,不然，默认会返回204
                'callback' : callbackbody,
                'signature': signature,
            };

            up.setOption({
                'url': host,
                'multipart_params': new_multipart_params
            });

            up.start();
        }

        var uploader = new plupload.Uploader({
            runtimes : 'html5,flash,silverlight,html4',
            browse_button : 'selectfiles',
            multi_selection: false,
            container: document.getElementById('btn-container'),
            flash_swf_url : 'fe/vendors/plupload/js/Moxie.swf',
            silverlight_xap_url : 'fe/vendors/plupload/js/Moxie.xap',
            url : 'http://oss.aliyuncs.com',
            filters: {
                mime_types : [ //只允许上传图片和zip文件
                    { title : "Image files", extensions : "jpg,gif,png,bmp" },
                    { title : "Zip files", extensions : "zip,rar" }
                ],
                max_file_size : '10mb', //最大只能上传10mb的文件
                prevent_duplicates : true //不允许选取重复文件
            },
            init: {
                PostInit: function() {
                    document.getElementById('upload_useable').innerHTML = '';
                    document.getElementById('postfiles').onclick = function() {
                        set_upload_param(uploader, '', false);
                        return false;
                    };
                },

                FilesAdded: function(up, files) {
                    plupload.each(files, function(file) {
                        document.getElementById('upload_useable').innerHTML += '<div id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ')<b></b>'
                            +'<div class="progress"><div class="progress-bar" style="width: 0%"></div></div>'
                            +'</div>';
                    });
                },

                BeforeUpload: function(up, file) {
                    // check_object_radio();
                    set_upload_param(up, file.name, true);
                },

                UploadProgress: function(up, file) {
                    var d = document.getElementById(file.id);
                    d.getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
                    var prog = d.getElementsByTagName('div')[0];
                    var progBar = prog.getElementsByTagName('div')[0]
                    progBar.style.width= 2*file.percent+'px';
                    progBar.setAttribute('aria-valuenow', file.percent);
                },

                FileUploaded: function(up, file, info) {
                    if (info.status == 200)
                    {
                        document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = 'upload to oss success, object name:' + get_uploaded_object_name(file.name) + ' 回调服务器返回的内容是:' + info.response;
                    }
                    else if (info.status == 203)
                    {
                        document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '上传到OSS成功，但是oss访问用户设置的上传回调服务器失败，失败原因是:' + info.response;
                    }
                    else
                    {
                        document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = info.response;
                    }
                },

                Error: function(up, err) {
                    if (err.code == -600) {
                        document.getElementById('console').appendChild(document.createTextNode("\n选择的文件太大了,可以根据应用情况，在upload.js 设置一下上传的最大大小"));
                    }
                    else if (err.code == -601) {
                        document.getElementById('console').appendChild(document.createTextNode("\n选择的文件后缀不对,可以根据应用情况，在upload.js进行设置可允许的上传文件类型"));
                    }
                    else if (err.code == -602) {
                        document.getElementById('console').appendChild(document.createTextNode("\n这个文件已经上传过一遍了"));
                    }
                    else
                    {
                        document.getElementById('console').appendChild(document.createTextNode("\nError xml:" + err.response));
                    }
                }
            }
        });

        uploader.init();
    }


})