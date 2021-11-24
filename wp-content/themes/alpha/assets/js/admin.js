;(function ($) {
    $(document).ready(function () {
        $("#post-formats-select .post-format").on("click", function () {
            if ($(this).attr("id") == "post-format-image") {
                $("#_alpha_image_information").show();
            } else {
                $("#_alpha_image_information").hide();
            }
        });
        // prevent default behavior of cmb2
        if (alpha_pf.format != "image") {
            $("#_alpha_image_information").hide();
        }
    });
})(jQuery);