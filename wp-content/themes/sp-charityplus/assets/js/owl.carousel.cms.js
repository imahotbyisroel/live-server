! function(a) {
    "use strict";
    a(document).ready(function() {
        function b(b) {
            var c = a(b.target).find(".owl-item");
            c.removeClass("first last"), 
            c.eq(b.item.index).addClass("first"), 
            c.eq(b.item.index + b.page.size - 1).addClass("last")
        }
        a(".cms-carousel").each(function() {
            var c = a(this),
                d = c.attr("id"),
                e = cmscarousel[d];
            c.attr("data-slidersettings") ? e = jQuery.parseJSON(c.attr("data-slidersettings")) : (e.margin = parseInt(e.margin), e.loop = "true" === e.loop, e.mouseDrag = "true" === e.mouseDrag, e.nav = "true" === e.nav, e.dots = "true" === e.dots, e.autoplay = "true" === e.autoplay, e.autoplayTimeout = parseInt(e.autoplayTimeout), e.autoplayHoverPause = "true" === e.autoplayHoverPause, e.smartSpeed = parseInt(e.smartSpeed), a(".cms-dot-container" + d).length && (e.dotsContainer = ".cms-dot-container" + d, e.dotsEach = !0)), c.on("initialized.owl.carousel", function(a) {
                b(a)
            }), c.owlCarousel(e), c.on("changed.owl.carousel", function(a) {
                b(a)
            })
        });
    })
}(jQuery);