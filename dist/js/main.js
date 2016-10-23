$(function () {
    $(".my-load").click(function () {
      $(this).hide();
      $(".my-loading").css("display", "block");
      $(".my-loading").show();

      // ajax获取新的文章
      $.ajax({
        url: "",
        type: "POST",
        success: function (data) {

        },
        error: function () {
          alert("error");
        }
      });
    });
});