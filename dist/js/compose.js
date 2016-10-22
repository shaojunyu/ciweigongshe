initSample();

$(function () {
	var title = "";
	var author = "";
	var summary = "";
	var sort = [];
	var isShow = false;
	var articalContent = "";

	$(".compose-artical").click(function () {
		$(".compose-info").attr("action", "./store_post");
		$(".hide").val(CKEDITOR.instances.editor.getData());
		if ($('input[name="type"]:checked').length === 1) {
        	$("#inlineCheckbox7").attr("value", "nav");
        }
        else {
        	$("#inlineCheckbox7").attr("value", "");
        }
		$(".compose-info").submit();
		/*title = $("#inputTitle").val();
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
*/
	});
});