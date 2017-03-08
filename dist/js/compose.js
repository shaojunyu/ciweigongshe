// initSample();

$(function() {
    var title = "";
    var author = "";
    var summary = "";
    var sort = [];
    var isShow = false;
    var articalContent = "";
    
    $(".compose-artical").click(function() {
        if ($("#inputTitle").val() === "") {
            $(".show-msg").html("请输入文章标题！");
            $('#myModal').modal({});
            return;
        } else if ($("#inputAuthor").val() === "") {
            $(".show-msg").html("请输入文章作者！");
            $('#myModal').modal({});
            return;
        } else if ($("#imgFile").val() === "") {
            $(".show-msg").html("请选择文章封面图片！");
            $('#myModal').modal({});
            return;
        } else if ($(".summary").val() === "") {
            $(".show-msg").html("请输入文章摘要！");
            $('#myModal').modal({});
            return;
        } else if ($(".category-box input:checked").length === 0) {
            $(".show-msg").html("请选择文章分类！");
            $('#myModal').modal({});
            return;
        } else if (!UM.getEditor('myEditor').getContent()) {
            $(".show-msg").html("请输入文章内容！");
            $('#myModal').modal({});
            return;
        }
        // $(".hide").val(CKEDITOR.instances.editor.getData());
        if ($('input[name="type"]:checked').length === 1) {
            $("#inlineCheckbox7").attr("value", "nav");
        } else {
            $("#inlineCheckbox7").attr("value", "");
        }

        $(".compose-info").submit();
    });
    $('#imgFile').on('change', function(event) {
        var $file = $(this);
        var fileObj = $file[0];
        var windowURL = window.URL || window.webkitURL;
        var dataURL;
        var $img = $("#upload-img");
        if (fileObj && fileObj.files && fileObj.files[0]) {
            dataURL = windowURL.createObjectURL(fileObj.files[0]);
            $img.attr('src', dataURL);
        } else {
            dataURL = $file.val();
            // $img.css("filter",'progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod = scale,src="' + dataURL + '")');
            // var imgObj = document.getElementById("preview");
            // imgObj.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src=\"" + dataURL + "\")";
            // imgObj.style.width = "48px";
            // imgObj.style.height = "48px";
            var imgObj = document.getElementById("preview");
            // 两个坑:
            // 1、在设置filter属性时，元素必须已经存在在DOM树中，动态创建的Node，也需要在设置属性前加入到DOM中，先设置属性在加入，无效；
            // 2、src属性需要像下面的方式添加，上面的两种方式添加，无效；
            imgObj.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
            imgObj.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = dataURL;
        }
        $('figure.img-wrap').css('display','block');
    });
});

function hideImg() {
    $(".cover").hide();
    $(".img-box").hide();
    document.querySelector(".img-box").removeChild(document.querySelector(".show-img"));
}
