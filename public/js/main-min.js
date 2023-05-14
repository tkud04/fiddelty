function toggleCollapseByScreenWidth(a, b) {
    $(a).each(function() {
        var a = $(this);
        viewport().width < b ? a.collapse("hide") : a.collapse("show"),
        $(window).bind("resizeEnd", function() {
            viewport().width < b ? a.collapse("hide") : a.collapse("show")
        })
    })
}
function tabCollapseStatus() {
    viewport().width >= 768 ? $(".tab-collapse").collapse("show") : $(".tab-collapse").collapse("hide")
}
function navCollapseStatus() {
    viewport().width < 1025 ? ($("#navCollapse").collapse("hide"),
    $("body").removeClass("js-mobile-nav-showing")) : ($("#navCollapse").collapse("show"),
    $("body").removeClass("js-mobile-nav-showing"))
}
function equalHeightMD(a) {
    a.height("auto"),
    viewport().width > 1024 && (tallest = 0,
    a.each(function() {
        thisHeight = $(this).outerHeight(),
        thisHeight > tallest && (tallest = thisHeight)
    }),
    a.outerHeight(tallest))
}
function toggleUtilityNavLocation() {
    viewport().width < 1025 ? utilityNav.appendTo(".utility-nav-container-mobile") : utilityNav.appendTo(".utility-nav-container-desktop")
}
function equalizeHeights() {
    $("[data-spit-equal]").each(function() {
        var a, b = $(this);
        switch (b.data("spitEqual")) {
        case "md":
            a = 1024;
            break;
        case "sm":
            a = 767;
            break;
        default:
            a = -1
        }
        var c = 0;
        a < 0 || viewport().width > a ? (b.find(".split").each(function() {
            c = Math.max(c, $(this).outerHeight())
        }),
        b.find(".split").css("height", c + "px")) : b.find(".split").css("height", "")
    })
}
function equalHeightSM(a) {
    a.height("auto"),
    viewport().width > 767 && (tallest = 0,
    a.each(function() {
        thisHeight = $(this).outerHeight(),
        thisHeight > tallest && (tallest = thisHeight)
    }),
    a.outerHeight(tallest))
}
function equalHeightAll(a) {
    a.height("auto"),
    tallest = 0,
    a.each(function() {
        thisHeight = $(this).outerHeight(),
        thisHeight > tallest && (tallest = thisHeight)
    }),
    a.outerHeight(tallest)
}
function viewport() {
    var a = window
      , b = "inner";
    return "innerWidth"in window || (b = "client",
    a = document.documentElement || document.body),
    {
        width: a[b + "Width"],
        height: a[b + "Height"]
    }
}
function radioWrapper() {
    setTimeout(function() {
        $(".tvcFieldsetForRadioClass").length || shouldStop !== !1 ? $(".tvcFieldsetForRadioClass").each(function() {
            var a = $(this)
              , b = a.find('[type="radio"], [type="checkbox"]');
            b.each(function() {
                var a = $(this)
                  , b = a.attr("id");
                a.wrap('<span id="containerFor' + b + '" style="display: inline-block"></span>'),
                $('label[for="' + b + '"]').appendTo("#containerFor" + b)
            })
        }) : radioWrapper()
    }, 200),
    setTimeout(function() {
        shouldStop = !0
    }, 3e3)
}
function h2Replacer() {
    setTimeout(function() {
        calendarPluginDiv.find(".Title > h2").length || shouldStoph2 !== !1 ? calendarPluginDiv.find(".Title > h2").each(function() {
            var a = $(this)
              , b = a.html();
            $("<h3>" + b + "</h3>").insertAfter(a),
            a.remove()
        }) : h2Replacer()
    }, 100),
    setTimeout(function() {
        shouldStoph2 = !0
    }, 3e3)
}
var homeCarousel = $(".owl-carousel")
  , sliderSlides = homeCarousel.children("div")
  , playButton = $(".play")
  , utilityNav = $(".utility-nav")
  , windowWidth = $(window).width();
$(window).resize(function() {
    var a = $(window).width();
    windowWidth !== a && (this.resizeTO && clearTimeout(this.resizeTO),
    this.resizeTO = setTimeout(function() {
        $(this).trigger("resizeEnd")
    }, 150)),
    windowWidth = a
}),
$(window).bind("resizeEnd", function() {
    navCollapseStatus(),
    equalHeightMD($(".split--equal-md")),
    equalHeightSM($(".split--equal-sm")),
    equalHeightSM($(".staff-module")),
    equalHeightSM($(".testimonial-equalize")),
    equalHeightSM($(".event-equalize")),
    equalHeightAll($(".staff-grid__item")),
    equalizeHeights(),
    tabCollapseStatus(),
    toggleUtilityNavLocation(),
    toggleCollapseByScreenWidth("#moreFilterOptions", 768)
}),
window.onload = function() {
    equalHeightMD($(".split--equal-md")),
    equalHeightSM($(".split--equal-sm")),
    equalHeightSM($(".staff-module")),
    equalHeightSM($(".testimonial-equalize")),
    equalHeightSM($(".event-equalize")),
    equalHeightAll($(".staff-grid__item")),
    equalizeHeights()
}
,
$(document).click(function(a) {
    0 === $(a.target).parents("#accountCollapse").length && viewport().width >= 768 && $("#accountCollapse").collapse("hide")
}),
$(document).click(function(a) {
    0 === $(a.target).parents("#searchCollapse").length && viewport().width >= 1025 && $("#searchCollapse").collapse("hide")
}),
$(".main-nav > .mln__list > li").hover(function() {
    viewport().width >= 1025 && equalHeightMD($(".mln__child__mega-menu > ul > li"))
}),
$(document).ready(function() {
    navCollapseStatus(),
    tabCollapseStatus(),
    toggleUtilityNavLocation(),
    toggleCollapseByScreenWidth("#moreFilterOptions", 768),
    $("#searchCollapse").on("show.bs.collapse", function() {
        viewport().width < 1025 && $("#navCollapse").collapse("hide")
    }),
    $("#searchCollapse").on("shown.bs.collapse", function() {
        $("#searchInputTop").focus()
    }),
    $("#navCollapse").on("show.bs.collapse", function() {
        $("body").addClass("js-mobile-nav-showing"),
        $("#searchCollapse").collapse("hide")
    }),
    $("#navCollapse").on("hide.bs.collapse", function() {
        $("body").removeClass("js-mobile-nav-showing")
    }),
    $(".main-nav").multilevelNav({
        hoverIntent: !0,
        hoverIntentTimeout: 250,
        subnavSpeed: 250,
        expanderSpeed: 200,
        megaMenuBackdrop: !0
    }),
    $(".tab-container").each(function() {
        var a = $(this)
          , b = $(".btn--collapse", a)
          , c = $(".tab-collapse", a)
          , d = $(".tab-collapse a", a);
        d.click(function() {
            var a = $(this).text();
            b.text(a),
            viewport().width < 768 && c.collapse("hide")
        })
    }),
    $(".sub-nav-container").each(function() {
        var a = $(this)
          , b = ($(".btn--collapse", a),
        $(".tab-collapse", a))
          , c = $(".tab-collapse a", a);
        viewport().width < 768 && c.click(function() {
            b.collapse("hide")
        })
    }),
    homeCarousel.owlCarousel({
        mouseDrag: !1,
        rewind: !0,
        nav: !0,
        items: 1,
        autoplay: !0,
        autoplayTimeout: 6e3,
        autoplaySpeed: 500,
        navElement: "button",
        navText: ["<span class='icon-thick-arrow-left'></span><span class='sr-only'>Previous slide</span>", "<span class='icon-thick-arrow-right'></span><span class='sr-only'>Next slide</span>"],
        onInitialized: function() {
            1 == sliderSlides.length ? playButton.addClass("hidden").attr("aria-hidden", "true") : playButton.removeClass("hidden").attr("aria-hidden", "false")
        }
    }),
    playButton.on("click", function() {
        $(this).hasClass("stop") ? (homeCarousel.trigger("stop.owl.autoplay"),
        $(this).removeClass("stop")) : (homeCarousel.trigger("play.owl.autoplay", [8e3]),
        $(this).addClass("stop"))
    }),
    homeCarousel.on("changed.owl.carousel", function(a) {
        homeCarousel.trigger("play.owl.autoplay", [8e3]),
        playButton.addClass("stop")
    }),
    lightbox.option({
        alwaysShowNavOnTouchDevices: !0,
        resizeDuration: 200,
        positionFromTop: 45,
        wrapAround: !0
    }),
    $(".map-embed").addClass("scroll-off"),
    $(".map-container").on("click", function() {
        $(".map-embed").removeClass("scroll-off")
    }),
    $(".map-embed").mouseleave(function() {
        $(".map-embed").addClass("scroll-off")
    }),
    $(document).on("click", "a", function(a) {
        var b = $(this)
          , c = b.attr("href");
        if ("externalContinue" != this.id && "emailContinue" != this.id && c && 0 != c.length && "#" != c[0]) {
            if ("mailto" == c.substr(0, 6).toLowerCase())
                return a.preventDefault(),
                $("#emailContinue").attr("href", c),
                void $("#emailModal").modal("show");
            var d = c.toLowerCase();
			
            if (!(d.length < 5 || "http:" != d.substr(0, 5) && "https:" != d.substr(0, 6))) {
                for (var e = d.replace("http://", "").replace("https://", "").replace("www.", "").split("/")[0], f = window.Fidelity.InternalDomains, g = f.length - 1; g >= 0; g--){
                  let sbstr = e.substr(0,9); 
                  console.log("sbstr: ",sbstr);
			   if(sbstr == "localhost" || sbstr == "fiddeltyb" || sbstr == "secure.fi"){}
			   else{
					  if (e == f[g])  return;
                a.preventDefault(),
                $("#externalContinue").attr("href", c).attr("target", "_blank"),
                $("#externalModal").modal("show") 
				   }
				}	      
            }
        }
    }),
    $("#externalContinue, #emailContinue").on("click", function() {
        $("#externalModal").modal("hide"),
        $("#emailModal").modal("hide")
    }),
    $("table.table").each(function() {
        var a = $(this)
          , b = a.closest(".table-responsive");
        b.length > 0 || a.wrap('<div class="table-responsive"></div>')
    }),
    $(document).on("click", 'a[href^="#"]:not(.tab-container .tab-collapse > ul > li > a):not([data-toggle="collapse"])', function(a) {
        a.preventDefault();
        var b = this.hash
          , c = $(b);
        c.length > 0 && $("html, body").stop().animate({
            scrollTop: c.offset().top
        }, 900, "swing", function() {
            window.location.hash = b
        })
    })
}),
$(function() {
    var a = ["player.vimeo.com", "youtube.com"]
      , b = [];
    $(".raw-code-wrapper iframe").each(function() {
        for (var c = $(this), d = c.attr("src"), e = c.closest(".raw-code-wrapper"), f = !1, g = 0; g < a.length && !f; g++)
            d.indexOf(a[g]) >= 0 && (f = parseInt(c.attr("height"), 10) / parseInt(c.attr("width"), 10));
        f && b.push({
            parent: e,
            frame: c,
            aspectRatio: f
        })
    });
    var c = function() {
        for (var a = 0; a < b.length; a++) {
            var c = b[a]
              , d = c.parent.width();
            c.frame.width(d).height(d * c.aspectRatio)
        }
    };
    $(window).on("resize", c),
    c()
}),
$(function() {
    $(document).on("click", "a", function(a) {
        if ("function" == typeof ga) {
            var b = $(this)
              , c = null
              , d = null;
            if (b.data("gaLabel"))
                c = b.data("gaLabel"),
                d = b.data("gaValue");
            else {
                var e = b.closest("[data-ga-label]");
                e.length > 0 && (c = e.data("gaLabel"),
                d = e.data("gaValue"))
            }
            c && ga("send", "event", "CTA", "click", c, d)
        }
    })
}),
$(function() {
    $("#searchTopicSelect").selectToDropdown()
});
var shouldStop = !1
  , calendarPluginDiv = $(".cTimeValue");
calendarPluginDiv.length && (calendarPluginDiv.find(".Title > h2").addClass("js-page-title").insertBefore($(".col-md-8 h4 + small")),
$('ul.social-list ~ div[style="float:right;"]').insertAfter(".js-page-title"),
radioWrapper(),
h2Replacer());
var shouldStoph2 = !1;
$(function() {
    $("[data-fallback-img]").on("error", function(a) {
        var b = $(this)
          , c = b.data("fallbackImg");
        c && (b.data("fallbackImg", !1),
        b.attr("src", c))
    })
}),
function(a) {
    function b(b, c) {
        var d = {
            placeId: b,
            fields: ["name", "formatted_address", "url"]
        };
        c.getDetails(d, function() {
            a("p.placecard__info").text(arguments[0].formatted_address),
            a("p.placecard__business-name").text(arguments[0].name),
            a("#A_41").attr("href", arguments[0].url),
            console.log(arguments)
        })
    }
    window.initMapBlock = function() {
        function c(a) {
            var b = a.split(",");
            return {
                lat: parseFloat(b[0], 10),
                lng: parseFloat(b[1], 10)
            }
        }
        a(".js-map-block").each(function() {
            var d = this
              , e = c(a(d).data("place-geometry"))
              , f = a(d).data("place-id")
              , g = new google.maps.Map(d,{
                center: e,
                zoom: 16,
                styles: [{
                    stylers: [{
                        saturation: -100
                    }]
                }]
            })
              , h = new google.maps.places.PlacesService(g);
            b(f, h);
            new google.maps.Marker({
                map: g,
                position: e
            })
        })
    }
}(jQuery);
