var loadMorePostNumber = 6;
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


    //加载更多
    $(".my-load").click(function() {
        $(this).css("display", "none");
        $(".my-loading").css("display", "block");
        var lastNewsId = $('.news:last').attr('id').replace(/[^0-9]/g, "");
        var str = subBefore(window.location.href, 'ciweigongshe');
        var catId = getCatId(window.location.href);
        var postUrl = str.concat('/post/load_more/', lastNewsId, '/', catId);
        console.log(postUrl);
        $.post(postUrl, function(data) {
            if (data.length > 0) {
                $(".my-loading").css("display", "none");
                if (data.length == loadMorePostNumber) $(".my-load").css("display", "block");
                createNews(data, $('.news-wrapper'));
            } else {
                $(".my-loading").css("display", "none");
            }
        }, 'json');
    });
});

function getCatId(str) {
    var subStr = subBefore(str, '?');
    return subStr.replace(/[^0-9]/g, "");
}

function subBefore(sourceStr, paraStr) {
    var index = sourceStr.indexOf(paraStr);
    if (index == -1) return sourceStr;
    else return sourceStr.substr(0, index + paraStr.length);
}
//load_more create dom
function createNews(data, parent) {
    for (var i = 0; i < data.length; i++) {
        var docfrag = document.createDocumentFragment();
        var baseUrl = subBefore(window.location.href, 'ciweigongshe');
        var postUrl = baseUrl.concat('/post/show/', data[i].post_id);
        //生成img
        var imgWrap = document.createElement('a');
        imgWrap.className = 'img';
        var img = document.createElement('img');
        img.src = data[i].image_url;
        imgWrap.appendChild(img);
        imgWrap.href = postUrl;
        docfrag.appendChild(imgWrap);
        //生成时间
        var date = document.createElement('h3');
        date.className = 'date';
        date.innerText = data[i].publish_at;
        docfrag.appendChild(date);
        //生成titile
        var title = document.createElement('a');
        title.className = 'title';
        title.innerText = data[i].title;
        title.href = postUrl;
        docfrag.appendChild(title);
        //生成abstract
        var abstract = document.createElement('p');
        abstract.className = 'abstract';
        abstract.innerText = data[i].abstract;
        docfrag.appendChild(abstract);
        //生成category
        var category = document.createElement('span');
        category.className = 'category';
        category.innerText = "test";
        docfrag.appendChild(category);
        //插入parent
        $('<div/>', {
            class: 'news',
            id: 'post'.concat(data[i].post_id),
            html: docfrag
        }).appendTo(parent);
    }
}

//模态框
function showMsg(msg) {
    $(".am-modal-bd").html(msg);
    $("#my-alert").modal();
}
