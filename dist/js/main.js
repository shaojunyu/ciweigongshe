var baseUrl = "./post/load_more/";

$(function () {
    $(".my-load").click(function () {
      $(this).hide();
      $(".my-loading").css("display", "block");
      $(".my-loading").show();

      // ajax获取新的文章
      var lastPostId = $(".am-list li").last().attr("data-post-id");
      $.ajax({
        url: baseUrl+lastPostId,
        type: "GET",
        dataType: "json",
        success: function (data) {
          if(data.length === 0) {
            $(".am-modal-bd").html("暂时没有更多文章了~");
            $("#my-btn-primary").click();
            $(".my-loading").hide();
            $(".my-load").css("display", "block");
            $(".my-load").show();
            return;
          }
          else {
            addPost(data);
            $(".my-loading").hide();
            $(".my-load").css("display", "block");
            $(".my-load").show();
          }
        },
        error: function () {
          $(".am-modal-bd").html("请求失败！请重试");
          $("#my-btn-primary").click();
        }
      });
    });
});

function addPost(data) {
  console.log( typeof data);
  var domTree = "";
  data.forEach(function (elem, index, arr) {
    domTree += '<li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-bottom-left" data-post-id="'+elem.post_id+'"><a href="./post/show/'+elem.post_id+'"><h3 class="am-list-item-hd">'+elem.title+'</h3><div class="am-u-sm-5 am-list-thumb"><img src="'+elem.image_url+'" /></div><div class="am-u-sm-7  am-list-main"><div class="am-list-item-text">'+elem.abstract+'</div></div><div class="my-clear"></div><span class="my-date">'+elem.publish_at+'</span></a></li>';
  });
  document.querySelector(".am-list").innerHTML += domTree;
}