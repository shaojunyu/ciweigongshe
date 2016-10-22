initSample();

$(function () {
	var title = "";
	var author = "";
	var summary = "";
	var sort = [];
	var isShow = false;
	var articalContent = "";

	$(".compose-artical").click(function () {
		title = $("#inputTitle").val();
		author = $("#inputAuthor").val();
		summary = $(".summary").val();
		$('input[name="sort"]:checked').each(function(){
            sort.push($(this).val());
        });
        if($('input[name="is-show"]:checked').length === 1) {
        	isShow = true;
        }
        articalContent = CKEDITOR.instances.editor.getData();

        var data = {
        	title: title,
        	author: author,
        	summary: summary,
        	sort: sort,
        	isShow: isShow,
        	articalContent: articalContent
        };

        //发表时出错需要对数组sort置空
	});
});