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
		else if($("#nickname").val() !== "" && $("input:checked").length === 1) {
			$(".am-modal-bd").html("请不要同时填写昵称和选择匿名");
			$("#my-btn-primary").click();
			return;
		}
		else if($(".comment").val() === "") {
			$(".am-modal-bd").html("评论内容不能为空");
			$("#my-btn-primary").click();
			return;
		}

		$(".my-cover").hide();
		$(".comment-box").hide();
		$(".comment-fixed").show();

		$("form").submit();
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