var loadMorePostNumber = 6;
$(function() {
    //初始定位
    if ($(window).scrollTop() >= 60) {
        $("nav").css({ "position": "fixed", "top": "0" });
        $(".QrCode-wrap").css("top", "60px");
    } else if ($(window).scrollTop() < 60) {
        $("nav").css("position", "");
        $(".QrCode-wrap").css("top", "130px");
    }
    //滚动定位
    $(window).scroll(function() {
        if ($(window).scrollTop() >= 60) {
            $("nav").css({ "position": "fixed", "top": "0", "z-index": "999" });
            $(".QrCode-wrap").css("top", "60px");
        } else if ($(window).scrollTop() < 60) {
            $("nav").css("position", "");
            $(".QrCode-wrap").css("top", "130px");
        }
    });
    //添加虚线
    createListLine($('.news:nth-child(3n+1)'));
    //加载更多
    $(".my-load").click(function() {
        $(this).css("display", "none");
        $(".my-loading").css("display", "block");
        var lastNewsId = $('.news:last').attr('id').replace(/[^0-9]/g, "");
        var str = subBefore(window.location.href, '/ciweigongshe');
        var postUrl = str.concat('/post/load_more/', lastNewsId);
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

function subBefore(sourceStr, paraStr) {
    var index = sourceStr.indexOf(paraStr);
    if (index == -1) return sourceStr;
    else return sourceStr.substr(0, index + paraStr.length);
}

function createNews(data, parent) {
    for (var i = 0; i < data.length; i++) {
        var docfrag = document.createDocumentFragment();
        var baseUrl = subBefore(window.location.href, '/ciweigongshe');
        var postUrl = baseUrl.concat('/post/show/', data[i].post_id);
        if(($('.news').length % 3) === 0){
            console.log($('.news').length);
            $('<div/>', {
                class: 'news-list-line'
            }).appendTo(parent);
        }
        //生成img
        var imgWrap = document.createElement('a');
        imgWrap.className = 'img';
        var img = document.createElement('img');
        img.src = data[i].image_url;
        imgWrap.appendChild(img);
        imgWrap.href = postUrl;
        docfrag.appendChild(imgWrap);
        //生成category
        var category = document.createElement('span');
        category.className = 'category';
        category.innerText = "category";
        docfrag.appendChild(category);
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
        //生成时间
        var date = document.createElement('h3');
        date.className = 'date';
        date.innerText = data[i].publish_at.substr(0,10);
        docfrag.appendChild(date);
        //插入parent
        $('<div/>', {
            class: 'news',
            id: 'post'.concat(data[i].post_id),
            html: docfrag
        }).appendTo(parent);
    }
}

function createListLine(ele) {
    if(!ele.prev().hasClass('news-list-line')){
        $('<div/>', {
            class: 'news-list-line'
        }).insertBefore(ele);
    }
}

//模态框
function showMsg(msg) {
    $(".am-modal-bd").html(msg);
    $("#my-alert").modal();
}
