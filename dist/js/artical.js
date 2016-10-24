$(function () {
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
            	$(".am-modal-bd").html("提交成功，审核中");
				$("#my-btn-primary").click();
				clearForm();
        	},
        	error: function () {
        		$(".am-modal-bd").html("请求失败！请重试");
				$("#my-btn-primary").click();
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


//trim
function myTrim(str) {
    if(String.prototype.trim) {
        return str.trim();
    }
    return str.replace(/^\s+(.*?)\s+$/g, "$1");
    //or
    //return str.replace(/^\s+/, "").replace(/\s+$/, "");
}

//clear
function clearForm() {
	$("#nickname").val("");
	$(".comment").val("");
	$('#anonymous').prop('checked', false);
}