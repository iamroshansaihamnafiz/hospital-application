$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("body").on("keyup", "#search", function () {
        let searchData = $("#search").val();
        if (searchData.length > 0) {
            $.ajax({
                type: "POST",
                url: "find-doctor",
                data: {search: searchData},
                success: function (result) {
                    $('#suggestDoctor').html(result)
                }
            });
        }
        if (searchData.length < 1) $('#suggestDoctor').html("");
    })

})
