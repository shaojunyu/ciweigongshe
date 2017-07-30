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
var ADDRESS = '';
$(function() {

    var page_name = $('#page_name').val()
    switch (page_name) {
        case 'login':
            initLoginPage()
    }
    var tags_helper = {}

    $('.cw_delete_btn').click(function() {
        var item_type = $(this).attr('type');
        var action = $(this).attr('action');
        var uid = $(this).attr('uid');
        $('.delete_confirm_modal .item_type_replace').html(item_type);
        $('.delete_confirm_modal .cw_confirm_btn').click(function() {
            sendData(action, null, null, null, uid)
        })
    })

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
            success: success || function() { window.location.reload(); },
            error: error || function() { alert('网络出错'); }
        })
    }


    function initLoginPage() {
        // initLoginForm()
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
            $('#' + rand_id).click(function() {
                event.preventDefault()
                $(this).parents('.author_tag:first').remove()
                tags_helper[rand_id] = ''
            })

        }

    })

    //
    //$('.delete_tag_btn').click(function() {
    //    $(this).parents().find('.author_tag')[0].remove()
    //})

    $('.toggle_cat_modify_modal').click(function() {
        var uid = $(this).attr('uid');
        
        var action = $(this).data('action')
        var helper = {
            create: '创建分类',
            modify: '修改分类'
        }

        $('#cat_modify_modal_labal_1').html(helper[action] || '分类')
        $('#cat_modify_modal form').data('action', action)
    })


    $('.media_select_btn').click(function() {
        if($(this).hasClass('btn-default')) {
            $(this).removeClass('btn-default').addClass('btn-info')
        } else {
            $(this).removeClass('btn-info').addClass('btn-default')

        }
    })

    //initEditor()
    initAddTagForm()
    function initAddTagForm() {
        $('#add_tag_form_submit').click(function(e) {
            e.preventDefault()
            var form_data = $('#tag_add_form').serializeJson();
            if( !form_data.name ) {
                alert('请输入分类名');
                return false;
            }
            function success(res) {
                // console.log(res)
                window.location.reload();
            }
            function error() {
                // console.error('error')
                alert('网络出错， 请重试！')
            }
            sendData('ADD_TAG', form_data, success, error)
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



})