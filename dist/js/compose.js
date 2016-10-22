initSample();

$(function () {
	var title = "";
	var author = "";
	var summary = "";
	var sort = [];
	var isShow = false;
	var articalContent = "";

	$(".compose-artical").click(function () {
		if ($("#inputTitle").val() === "") {
			$(".show-msg").html("请输入文章标题！");
			$('#myModal').modal({});
			return;
		}
		else if ($("#inputAuthor").val() === "") {
			$(".show-msg").html("请输入文章作者！");
			$('#myModal').modal({});
			return;
		}
		else if ($("#inputImg").val() === "") {
			$(".show-msg").html("请输入文章封面图片！");
			$('#myModal').modal({});
			return;
		}
		else if ($(".summary").val() === "") {
			$(".show-msg").html("请输入文章摘要！");
			$('#myModal').modal({});
			return;
		}
		else if($(".category-box input:checked").length === 0) {
			$(".show-msg").html("请选择文章分类！");
			$('#myModal').modal({});
			return;
		}
		else if (!CKEDITOR.instances.editor.getData()) {
			$(".show-msg").html("请输入文章内容！");
			$('#myModal').modal({});
			return;
		}
		$(".hide").val(CKEDITOR.instances.editor.getData());
		if ($('input[name="type"]:checked').length === 1) {
        	$("#inlineCheckbox7").attr("value", "nav");
        }
        else {
        	$("#inlineCheckbox7").attr("value", "");
        }

		$(".compose-info").submit();
	});


	$(".view-img").click(function () {
		$(".cover").show();
		$(".img-box").show();
		var img = new Image();
		img.className = "show-img";

		img.onload = function () {
			
		};
		img.onerror = function () {
			hideImg();
			$(".show-msg").html("图片加载失败！");
			$('#myModal').modal({});
		};
		img.src = $("#inputImg").val();
		document.querySelector(".img-box").appendChild(img);
	});

	$(".cover").click(function () {
		hideImg();
	});
	$(".show-img").click(function () {
		hideImg();
	});
});

function hideImg() {
	$(".cover").hide();
	$(".img-box").hide();
	document.querySelector(".img-box").removeChild(document.querySelector(".show-img"));
}