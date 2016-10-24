$(function () {
	//name，content，post_id
	$(".comment-bottom-btn").click(function () {
		$(".comment-fixed").hide();
		$(".my-cover").show();
		$(".comment-box").show();
	});

	$("#published").click(function () {
		var postId = $('meta[name="post-id"]').attr("content");
		$("#post-id").val(postId);
		if($("#nickname").val() === "" ) {
			if($("input:checked").length === 0) {
				$(".am-modal-bd").html("请填写昵称或选择匿名");
				$("#my-btn-primary").click();
				return;
			}
		}
		
		if($("#nickname").val() !== "" && $("input:checked").length === 1) {
			$(".am-modal-bd").html("请不要同时填写昵称和选择匿名");
			$("#my-btn-primary").click();
			return;
		}
		else if(!(myTrim($(".comment").val()))) {
			$(".am-modal-bd").html("评论内容不能为空");
			$("#my-btn-primary").click();
			return;
		}

		$.ajax({
           type: "POST",
           url: "../comment",
           data: $("#my-form").serialize(), // serializes the form's elements.
           success: function (data) {
               alert(data);
           },
           error: function () {

           }
        });

		$(".my-cover").hide();
		$(".comment-box").hide();
		$(".comment-fixed").show();
	});

	$("#cancel").click(function () {
		$(".my-cover").hide();
		$(".comment-box").hide();
		$(".comment-fixed").show();
	});

	var width = $(".wrapper").width() / 2;
	$(".comment-fixed").css("margin-left", -width+"px");
	$(".comment-box").css("margin-left", -width+"px");
});



function myTrim(str) {
    if(String.prototype.trim) {
        return str.trim();
    }
    return str.replace(/^\s+(.*?)\s+$/g, "$1");
    //or
    //return str.replace(/^\s+/, "").replace(/\s+$/, "");
}