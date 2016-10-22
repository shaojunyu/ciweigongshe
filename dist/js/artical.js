$(function () {
	$(".comment-bottom-btn").click(function () {
		$(".comment-fixed").hide();
		$(".my-cover").show();
		$(".comment-box").show();
	});

	$("#published").click(function () {
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