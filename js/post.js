$(function() {
    //初始定位
    if ($(window).scrollTop() >= 60) {
        $("nav").css({ "position": "fixed", "top": "0" });
    } else if ($(window).scrollTop() < 60) {
        $("nav").css("position", "");
    }
    //滚动定位
    $(window).scroll(function() {
        if ($(window).scrollTop() >= 60) {
            $("nav").css({ "position": "fixed", "top": "0", "z-index": "999" });
        } else if ($(window).scrollTop() < 60) {
            $("nav").css("position", "");
        }
    });
    $('#published').on('click', function(event) {
        var baseUrl = subBefore(window.location.href, '/ciweigongshe');
        var postId = getPostId(window.location.href);
        var name = $('#nickname').val();
        var comment = $('textarea.comment').val();
        var postUrl = baseUrl.concat('/post/comment');
        if ($('#anonymous').is(':checked')) {
            name = '匿名用户';
            if (!comment) {
                alert('请输入评论内容！');
            } else {
                $.post(postUrl, {
                	'name':name,
                	'post_id':postId,
                	'content':comment
                },function() {
                	clearForm($('#my-form'));
                    alert("评论成功，后台管理员正在审核，请等待！");
                });
            }
        } else if (!name) {
            alert('请输入昵称或者勾选匿名用户！');
        } else {
            $.post(postUrl, {
                'name':name,
                'post_id':postId,
                'content':comment
            },function() {
                clearForm($('#my-form'));
                alert("评论成功，后台管理员正在审核，请等待！");
            });
        }
        forbiddenEvent(event);
    });
});

function clearForm(form) {
  // iterate over all of the inputs for the form
  // element that was passed in
  $(':input', form).each(function() {
    var type = this.type;
    var tag = this.tagName.toLowerCase(); // normalize case
    // it's ok to reset the value attr of text inputs,
    // password inputs, and textareas
    if (type == 'text' || type == 'password' || tag == 'textarea')
      this.value = "";
    // checkboxes and radios need to have their checked state cleared
    // but should *not* have their 'value' changed
    else if (type == 'checkbox' || type == 'radio')
      this.checked = false;
    // select elements need to have their 'selectedIndex' property set to -1
    // (this works for both single and multiple select elements)
    else if (tag == 'select')
      this.selectedIndex = -1;
  });
}
function forbiddenEvent(event) {
    event = event || window.event;
    if (event.stopPropagation) event.stopPropagation();
    else event.cancelBubble = true;
    if (event.preventDefault) event.preventDefault();
    else event.returnValue = false;

}

function getPostId(str) {
    var subStr = subBefore(str, '?');
    return subStr.replace(/[^0-9]/g, "");
}

function subBefore(sourceStr, paraStr) {
    var index = sourceStr.indexOf(paraStr);
    if (index == -1) return sourceStr;
    else return sourceStr.substr(0, index + paraStr.length);
}

//模态框
function showMsg(msg) {
    $(".am-modal-bd").html(msg);
    $("#my-alert").modal();
}
