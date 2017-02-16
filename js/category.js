$(function () {
	//初始定位
	if( $(window).scrollTop() >= 60) {
		$("nav").css({"position":"fixed", "top":"0"});
	}
	else if($(window).scrollTop() < 60) {
		$("nav").css("position", "");
	}
	//滚动定位
	$(window).scroll(function () {
		if( $(window).scrollTop() >= 60) {
			$("nav").css({"position":"fixed", "top":"0", "z-index":"999"});
		}
		else if($(window).scrollTop() < 60) {
			$("nav").css("position", "");
		}
	});


	//加载更多
	$(".my-load").click(function () {
		$(this).hide();
		$(".my-loading").css("display", "block");
	});
});


//模态框
function showMsg(msg) {
	$(".am-modal-bd").html(msg);
	$("#my-alert").modal();
}