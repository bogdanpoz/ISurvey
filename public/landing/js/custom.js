(function($) {
    "use strict";

    $("#sidebar").mCustomScrollbar({
        theme: "minimal",
    });

    $("#sidebarCollapse").on("click", function() {
        $("#sidebar").toggleClass("active");
        $(".collapse.in").toggleClass("in");
        $("a[aria-expanded=true]").attr("aria-expanded", "false");
    });

    $(document).on("click", function(e) {
        var clickedEl = $(e.target);
        var insideClicker = $("#sidebarCollapse");
        var insideClicker2 = $("#sidebar");

        // Outside click handler
        if (
            !(
                clickedEl.is(insideClicker) ||
                clickedEl.is(insideClicker2) ||
                insideClicker.has(clickedEl).length > 0 ||
                insideClicker2.has(clickedEl).length > 0
            )
        ) {
            $("#sidebar").removeClass("active");
        }
    });
})(jQuery);