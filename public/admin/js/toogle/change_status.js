(function ($) {
    /*======== 1. START CHANGE DOCTOR STATUS ========*/
    $(".toggle-class-doctor").change(function () {
        var status = $(this).prop("checked") == true ? 1 : 0;
        var doctor_id = $(this).data("id");

        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/doctor-status",
            data: {
                status: status,
                doctor_id: doctor_id,
            },
            success: function (data) {
                console.log("Success");
            },
        });
    });
    /*======== 1. END CHANGE DOCTOR STATUS ========*/


    /*======== 1. START CHANGE BLOG STATUS ========*/
    $(".toggle-class-blog").change(function () {
        var status = $(this).prop("checked") == true ? 1 : 0;
        var blog_id = $(this).data("id");

        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/blog-status",
            data: {
                status: status,
                blog_id: blog_id,
            },
            success: function (data) {
                console.log("Success");
            },
        });
    });
    /*======== 1. END CHANGE BLOG STATUS ========*/

})(jQuery);
