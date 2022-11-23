$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("body").on("keyup", "#searchBlog", function () {
        let searchData = $("#searchBlog").val();
        if (searchData.length > 0) {
            $.ajax({
                type: "POST",
                url: "find-blog",
                data: {search: searchData},
                success: function (result) {
                    $('#suggestBlog').html(result)
                }
            });
        }
        if (searchData.length < 1) $('#suggestBlog').html("");
    })

})
