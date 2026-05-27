!(function (e) {
  "use strict";
  function t(t) {
    e(t).length > 0 &&
      e(t).each(function () {
        var t = e(this).find("a");
        e(this)
          .find(t)
          .each(function () {
            e(this).on("click", function () {
              var t = e(this.getAttribute("href"));
              t.length &&
                (event.preventDefault(),
                e("html, body")
                  .stop()
                  .animate({ scrollTop: t.offset().top - 10 }, 1e3));
            });
          });
      });
  }
  if (
    (e(window).on("load", function () {
      (e(".preloader").fadeOut(), e(".swiper-fade").addClass("fade-ani"));
    }),
    e(".preloader").length > 0 &&
      e(".preloaderCls").each(function () {
        e(this).on("click", function (t) {
          (t.preventDefault(), e(".preloader").css("display", "none"));
        });
      }),
    (e.fn.thmobilemenu = function (t) {
      var n = e.extend(
        {
          menuToggleBtn: ".th-menu-toggle",
          bodyToggleClass: "th-body-visible",
          subMenuClass: "th-submenu",
          subMenuParent: "menu-item-has-children",
          thSubMenuParent: "th-item-has-children",
          subMenuParentToggle: "th-active",
          meanExpandClass: "th-mean-expand",
          appendElement: '<span class="th-mean-expand"></span>',
          subMenuToggleClass: "th-open",
          toggleSpeed: 400,
        },
        t,
      );
      return this.each(function () {
        var t = e(this);
        function a() {
          t.toggleClass(n.bodyToggleClass);
          var a = "." + n.subMenuClass;
          e(a).each(function () {
            e(this).hasClass(n.subMenuToggleClass) &&
              (e(this).removeClass(n.subMenuToggleClass),
              e(this).css("display", "none"),
              e(this).parent().removeClass(n.subMenuParentToggle));
          });
        }
        t.find("." + n.subMenuParent).each(function () {
          var t = e(this).find("ul");
          (t.addClass(n.subMenuClass),
            t.css("display", "none"),
            e(this).addClass(n.subMenuParent),
            e(this).addClass(n.thSubMenuParent),
            e(this).children("a").append(n.appendElement));
        });
        var s = "." + n.thSubMenuParent + " > a";
        (e(s).each(function () {
          e(this).on("click", function (t) {
            var a, s;
            (t.preventDefault(),
              (a = e(this).parent()),
              (s = a.children("ul")).length > 0 &&
                (a.toggleClass(n.subMenuParentToggle),
                s.slideToggle(n.toggleSpeed),
                s.toggleClass(n.subMenuToggleClass)));
          });
        }),
          e(n.menuToggleBtn).each(function () {
            e(this).on("click", function () {
              a();
            });
          }),
          t.on("click", function (e) {
            (e.stopPropagation(), a());
          }),
          t.find("div").on("click", function (e) {
            e.stopPropagation();
          }));
      });
    }),
    e(".th-menu-wrapper").thmobilemenu(),
    t(".onepage-nav"),
    t(".scroll-down"),
    e(window).on("scroll", function () {
      e(".onepage-nav").length;
    }),
    e(window).scroll(function () {
      e(this).scrollTop() > 500
        ? (e(".sticky-wrapper").addClass("sticky"),
          e(".category-menu").addClass("close-category"))
        : (e(".sticky-wrapper").removeClass("sticky"),
          e(".category-menu").removeClass("close-category"));
    }),
    e(".scroll-top").length > 0)
  ) {
    var n = document.querySelector(".scroll-top"),
      a = document.querySelector(".scroll-top path"),
      s = a.getTotalLength();
    ((a.style.transition = a.style.WebkitTransition = "none"),
      (a.style.strokeDasharray = s + " " + s),
      (a.style.strokeDashoffset = s),
      a.getBoundingClientRect(),
      (a.style.transition = a.style.WebkitTransition =
        "stroke-dashoffset 10ms linear"));
    var i = function () {
      var t = e(window).scrollTop(),
        n = e(document).height() - e(window).height(),
        i = s - (t * s) / n;
      a.style.strokeDashoffset = i;
    };
    (i(), e(window).scroll(i));
    (jQuery(window).on("scroll", function () {
      jQuery(this).scrollTop() > 50
        ? jQuery(n).addClass("show")
        : jQuery(n).removeClass("show");
    }),
      jQuery(n).on("click", function (e) {
        return (
          e.preventDefault(),
          jQuery("html, body").animate({ scrollTop: 0 }, 750),
          !1
        );
      }));
  }
  (e("[data-bg-src]").length > 0 &&
    e("[data-bg-src]").each(function () {
      var t = e(this).attr("data-bg-src");
      (e(this).css("background-image", "url(" + t + ")"),
        e(this).removeAttr("data-bg-src").addClass("background-image"));
    }),
    e("[data-bg-color]").length > 0 &&
      e("[data-bg-color]").each(function () {
        var t = e(this).attr("data-bg-color");
        (e(this).css("background-color", t),
          e(this).removeAttr("data-bg-color"));
      }),
    e("[data-border]").each(function () {
      var t = e(this).data("border");
      e(this).css("--th-border-color", t);
    }),
    e("[data-mask-src]").length > 0 &&
      e("[data-mask-src]").each(function () {
        var t = e(this).attr("data-mask-src");
        (e(this).css({
          "mask-image": "url(" + t + ")",
          "-webkit-mask-image": "url(" + t + ")",
        }),
          e(this).addClass("bg-mask"),
          e(this).removeAttr("data-mask-src"));
      }),
    e(".th-slider").each(function () {
      var t = e(this),
        n = e(this).data("slider-options"),
        a = t.find(".slider-prev"),
        s = t.find(".slider-next"),
        i = t.find(".slider-pagination.pagi-number"),
        o = t.siblings(".slider-controller").find(".slider-pagination"),
        r = o.length ? o.get(0) : t.find(".slider-pagination").get(0),
        l = n.paginationType ? n.paginationType : "bullets",
        c = n.autoplay,
        d = {
          slidesPerView: 1,
          spaceBetween: n.spaceBetween ? n.spaceBetween : 24,
          loop: 0 != n.loop,
          speed: n.speed ? n.speed : 1e3,
          autoplay: c || { delay: 6e3, disableOnInteraction: !1 },
          navigation: { nextEl: s.get(0), prevEl: a.get(0) },
          pagination: {
            el: r,
            type: l,
            clickable: !0,
            renderBullet: function (e, t) {
              var n = e + 1,
                a = n < 10 ? "0" + n : n;
              return i.length
                ? '<span class="' + t + ' number">' + a + "</span>"
                : '<span class="' +
                    t +
                    '" aria-label="Go to Slide ' +
                    a +
                    '"></span>';
            },
            formatFractionCurrent: function (e) {
              return e < 10 ? "0" + e : e;
            },
            formatFractionTotal: function (e) {
              return e < 10 ? "0" + e : e;
            },
          },
          on: {
            slideChange: function () {
              setTimeout(function () {
                p.params.mousewheel.releaseOnEdges = !1;
              }, 500);
            },
            reachEnd: function () {
              setTimeout(function () {
                p.params.mousewheel.releaseOnEdges = !0;
              }, 750);
            },
          },
        },
        u = JSON.parse(t.attr("data-slider-options"));
      u = e.extend({}, d, u);
      var p = new Swiper(t.get(0), u);
      e(".slider-area").length > 0 &&
        e(".slider-area").closest(".container").parent().addClass("arrow-wrap");
    }),
    e("[data-ani]").each(function () {
      var t = e(this).data("ani");
      e(this).addClass(t);
    }),
    e("[data-ani-delay]").each(function () {
      var t = e(this).data("ani-delay");
      e(this).css("animation-delay", t);
    }),
    e("[data-slider-prev], [data-slider-next]").on("click", function () {
      var t = e(this).data("slider-prev") || e(this).data("slider-next"),
        n = e(t);
      if (n.length) {
        var a = n[0].swiper;
        a && (e(this).data("slider-prev") ? a.slidePrev() : a.slideNext());
      }
    }),
    (e.fn.activateSliderThumbs = function (t) {
      var n = e.extend({ sliderTab: !1, tabButton: ".tab-btn" }, t);
      return this.each(function () {
        var t = e(this),
          a = t.find(n.tabButton),
          s = e('<span class="indicator"></span>').appendTo(t),
          i = t.data("slider-tab"),
          o = e(i)[0].swiper;
        if (
          (a.on("click", function (t) {
            t.preventDefault();
            var a = e(this);
            if (
              (a.addClass("active").siblings().removeClass("active"),
              c(a),
              a.prevAll(n.tabButton).addClass("list-active"),
              a.nextAll(n.tabButton).removeClass("list-active"),
              n.sliderTab)
            ) {
              var s = a.index();
              o.slideTo(s);
            }
          }),
          n.sliderTab)
        ) {
          o.on("slideChange", function () {
            var e = o.realIndex,
              t = a.eq(e);
            (t.addClass("active").siblings().removeClass("active"),
              c(t),
              t.prevAll(n.tabButton).addClass("list-active"),
              t.nextAll(n.tabButton).removeClass("list-active"));
          });
          var r = o.activeIndex,
            l = a.eq(r);
          (l.addClass("active").siblings().removeClass("active"),
            c(l),
            l.prevAll(n.tabButton).addClass("list-active"),
            l.nextAll(n.tabButton).removeClass("list-active"));
        }
        function c(e) {
          var t = e.position(),
            n = parseInt(e.css("margin-top")) || 0,
            a = parseInt(e.css("margin-left")) || 0;
          (s.css("--height-set", e.outerHeight() + "px"),
            s.css("--width-set", e.outerWidth() + "px"),
            s.css("--pos-y", t.top + n + "px"),
            s.css("--pos-x", t.left + a + "px"));
        }
      });
    }),
    e(".testi-box-tab").length &&
      e(".testi-box-tab").activateSliderThumbs({
        sliderTab: !0,
        tabButton: ".tab-btn",
      }));
  var o = ".ajax-contact",
    r = '[name="email"]',
    l = e(".form-messages");
  function c() {
    var t = e(o).serialize();
    (function () {
      var t,
        n = !0;
      function a(a) {
        a = a.split(",");
        for (var s = 0; s < a.length; s++)
          ((t = o + " " + a[s]),
            e(t).val()
              ? (e(t).removeClass("is-invalid"), (n = !0))
              : (e(t).addClass("is-invalid"), (n = !1)));
      }
      (a(
        '[name="name"],[name="email"],[name="subject"],[name="number"],[name="message"]',
      ),
        e(r).val() &&
        e(r)
          .val()
          .match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)
          ? (e(r).removeClass("is-invalid"), (n = !0))
          : (e(r).addClass("is-invalid"), (n = !1)));
      return n;
    })() &&
      jQuery
        .ajax({ url: e(o).attr("action"), data: t, type: "POST" })
        .done(function (t) {
          (l.removeClass("error"),
            l.addClass("success"),
            l.text(t),
            e(o + ' input:not([type="submit"]),' + o + " textarea").val(""));
        })
        .fail(function (e) {
          (l.removeClass("success"),
            l.addClass("error"),
            "" !== e.responseText
              ? l.html(e.responseText)
              : l.html(
                  "Oops! An error occured and your message could not be sent.",
                ));
        });
  }
  function d(t, n, a, s) {
    (e(n).on("click", function (n) {
      (n.preventDefault(), e(t).addClass(s));
    }),
      e(t + " > div").on("click", function (n) {
        (n.stopPropagation(), e(t).addClass(s));
      }),
      e(a).on("click", function (n) {
        (n.preventDefault(), n.stopPropagation(), e(t).removeClass(s));
      }));
  }
  function u(e) {
    return parseInt(e, 10);
  }
  (e(o).on("submit", function (e) {
    (e.preventDefault(), c());
  }),
    d(".popup-search-box", ".searchBoxToggler", ".searchClose", "show"),
    d(".sidemenu-cart", ".sideMenuToggler", ".sideMenuCls", "show"),
    d(".sidemenu-info", ".sideMenuInfo", ".sideMenuCls", "show"),
    e(".popup-image").magnificPopup({
      type: "image",
      mainClass: "mfp-zoom-in",
      removalDelay: 260,
      gallery: { enabled: !0 },
    }),
    e(".popup-video").magnificPopup({ type: "iframe" }),
    e(".popup-content").magnificPopup({ type: "inline", midClick: !0 }),
    (e.fn.sectionPosition = function (t, n) {
      e(this).each(function () {
        var a,
          s,
          i,
          o,
          r,
          l = e(this);
        ((a = Math.floor(l.height() / 2)),
          (s = l.attr(t)),
          (i = l.attr(n)),
          (o = u(e(i).css("padding-top"))),
          (r = u(e(i).css("padding-bottom"))),
          "top-half" === s
            ? (e(i).css("padding-bottom", r + a + "px"),
              l.css("margin-top", "-" + a + "px"))
            : "bottom-half" === s &&
              (e(i).css("padding-top", o + a + "px"),
              l.css("margin-bottom", "-" + a + "px")));
      });
    }));
  if (
    (e("[data-sec-pos]").length &&
      e("[data-sec-pos]").imagesLoaded(function () {
        e("[data-sec-pos]").sectionPosition("data-sec-pos", "data-pos-for");
      }),
    e(".filter-active").imagesLoaded(function () {
      var t = ".filter-active";
      if (e(t).length > 0) {
        var n = e(t).isotope({
          itemSelector: ".filter-item",
          filter: "*",
          masonry: { columnWidth: ".filter-item" },
        });
        (e(".filter-menu-active").on("click", "button", function () {
          var t = e(this).attr("data-filter");
          n.isotope({ filter: t });
        }),
          e(".filter-menu-active").on("click", "button", function (t) {
            (t.preventDefault(),
              e(this).addClass("active"),
              e(this).siblings(".active").removeClass("active"));
          }));
      }
      e(".load-more-btn").on("click", function () {
        var n = e(this).find("i");
        (n.addClass("fa-spin-pulse"),
          setTimeout(function () {
            n.removeClass("fa-spin-pulse");
          }, 1e3));
        var a = e(this);
        setTimeout(function () {
          var n = a.prev(".load-more-active");
          (0 === n.length &&
            (n = a.closest(".container").find(".load-more-active")),
            n
              .find(".filter-item.d-none, .accordion-card.d-none")
              .removeClass("d-none"));
          e(t).isotope({ filter: "*" });
        }, 700);
      });
    }),
    e(".masonary-active, .woocommerce-Reviews .comment-list").imagesLoaded(
      function () {
        var t = ".masonary-active, .woocommerce-Reviews .comment-list";
        (e(t).length > 0 &&
          e(t).isotope({
            itemSelector: ".filter-item, .woocommerce-Reviews .comment-list li",
            filter: "*",
            masonry: { columnWidth: 1 },
          }),
          e('[data-bs-toggle="tab"]').on("shown.bs.tab", function (n) {
            e(t).isotope({ filter: "*" });
          }));
      },
    ),
    e(".counter-number").counterUp({ delay: 10, time: 1e3 }),
    e(".hover-item").hover(function () {
      (e(this).addClass("item-active"),
        e(this).siblings().removeClass("item-active"));
    }),
    (e.fn.shapeMockup = function () {
      e(this).each(function () {
        var t = e(this),
          n = t.data("top"),
          a = t.data("right"),
          s = t.data("bottom"),
          i = t.data("left");
        t.css({ top: n, right: a, bottom: s, left: i })
          .removeAttr("data-top")
          .removeAttr("data-right")
          .removeAttr("data-bottom")
          .removeAttr("data-left")
          .parent()
          .addClass("shape-mockup-wrap");
      });
    }),
    e(".shape-mockup") && e(".shape-mockup").shapeMockup(),
    e(".progress-bar").waypoint(
      function () {
        e(".progress-bar").css({
          animation: "animate-positive 1.8s",
          opacity: "1",
        });
      },
      { offset: "75%" },
    ),
    (e.fn.countdown = function () {
      e(this).each(function () {
        var t = e(this),
          n = new Date(t.data("offer-date")).getTime();
        function a(e) {
          return t.find(e);
        }
        var s = setInterval(function () {
          var e = new Date().getTime(),
            i = n - e,
            o = Math.floor(i / 864e5),
            r = Math.floor((i % 864e5) / 36e5),
            l = Math.floor((i % 36e5) / 6e4),
            c = Math.floor((i % 6e4) / 1e3);
          (o < 10 && (o = "0" + o),
            r < 10 && (r = "0" + r),
            l < 10 && (l = "0" + l),
            c < 10 && (c = "0" + c),
            i < 0
              ? (clearInterval(s),
                t.addClass("expired"),
                t.find(".message").css("display", "block"))
              : (a(".day").html(o),
                a(".hour").html(r),
                a(".minute").html(l),
                a(".seconds").html(c)));
        }, 1e3);
      });
    }),
    e(".counter-list").length && e(".counter-list").countdown(),
    e(".hero-2").length > 0 &&
      window.addEventListener("scroll", function () {
        let t = window.scrollY;
        e(".line").css("width", "calc(var(--size) - " + 0.1 * t + "px)");
      }),
    e(".tilt-active").tilt({ maxTilt: 15, perspective: 1e3 }),
    e(".overlay-direction").length > 0 && window.innerWidth > 767)
  ) {
    const e = [].slice.call(
        document.querySelectorAll(".overlay-direction .filter-item"),
        0,
      ),
      t = { 0: "top", 1: "right", 2: "bottom", 3: "left" },
      n = ["in", "out"]
        .map((e) => Object.values(t).map((t) => `${e}-${t}`))
        .reduce((e, t) => e.concat(t)),
      a = (e, t) => {
        const {
            width: n,
            height: a,
            top: s,
            left: i,
          } = t.getBoundingClientRect(),
          o =
            e.pageX - (i + window.pageXOffset) - (n / 2) * (n > a ? a / n : 1),
          r =
            e.pageY - (s + window.pageYOffset) - (a / 2) * (a > n ? n / a : 1);
        return Math.round(Math.atan2(r, o) / 1.57079633 + 5) % 4;
      };
    class s {
      constructor(e) {
        ((this.element = e),
          this.element.addEventListener("mouseover", (e) =>
            this.update(e, "in"),
          ),
          this.element.addEventListener("mouseout", (e) =>
            this.update(e, "out"),
          ));
      }
      update(e, s) {
        (this.element.classList.remove(...n),
          this.element.classList.add(`${s}-${t[a(e, this.element)]}`));
      }
    }
    e.forEach((e) => new s(e));
  }
  ((e.fn.indicator = function () {
    e(this).each(function () {
      var t = e(this),
        n = t.find("a"),
        a = t.find("button");
      t.append('<span class="indicator"></span>');
      var s,
        i = t.find(".indicator");
      function o() {
        var n = t.find(".active"),
          a = n.css("height"),
          s = n.css("width"),
          o = n.position().top + "px",
          r = n.position().left + "px";
        (e(window).on("resize", function () {
          ((o = n.position().top + "px"), (r = n.position().left + "px"));
        }),
          i.get(0).style.setProperty("--height-set", a),
          i.get(0).style.setProperty("--width-set", s),
          i.get(0).style.setProperty("--pos-y", o),
          i.get(0).style.setProperty("--pos-x", r));
      }
      (n.length ? (s = n) : a.length && (s = a),
        s.on("click", function (t) {
          (t.preventDefault(),
            e(this).addClass("active"),
            e(this).siblings(".active").removeClass("active"),
            o());
        }),
        o(),
        e(window).on("resize", function () {
          o();
        }));
    });
  }),
    e(".indicator-active").length && e(".indicator-active").indicator(),
    e("#compslider").on("input change", (t) => {
      const n = t.target.value;
      (e(".foreground-img").css("width", n + "%"),
        e(".slider-button").css("left", `calc(${n}% - 32px)`));
    }),
    e(".color-switch-btns button").each(function () {
      const t = e(this),
        n = t.data("color");
      (t.css("--theme-color", n),
        t.on("click", function () {
          const t = e(this).data("color");
          e(":root").css("--theme-color", t);
        }));
    }),
    e("#thcolorpicker").on("input", function () {
      const t = e(this).val();
      var n;
      ((n = t), e(":root").css("--theme-color", n));
    }),
    e(document).on("click", ".switchIcon", function () {
      e(".color-scheme").toggleClass("active");
    }),
    e("#ship-to-different-address-checkbox").on("change", function () {
      e(this).is(":checked")
        ? e("#ship-to-different-address").next(".shipping_address").slideDown()
        : e("#ship-to-different-address").next(".shipping_address").slideUp();
    }),
    e(".woocommerce-form-login-toggle a").on("click", function (t) {
      (t.preventDefault(), e(".woocommerce-form-login").slideToggle());
    }),
    e(".woocommerce-form-coupon-toggle a").on("click", function (t) {
      (t.preventDefault(), e(".woocommerce-form-coupon").slideToggle());
    }),
    e(".shipping-calculator-button").on("click", function (t) {
      (t.preventDefault(),
        e(this).next(".shipping-calculator-form").slideToggle());
    }),
    e('.wc_payment_methods input[type="radio"]:checked')
      .siblings(".payment_box")
      .show(),
    e('.wc_payment_methods input[type="radio"]').each(function () {
      e(this).on("change", function () {
        (e(".payment_box").slideUp(),
          e(this).siblings(".payment_box").slideDown());
      });
    }),
    e(".rating-select .stars a").each(function () {
      e(this).on("click", function (t) {
        (t.preventDefault(),
          e(this).siblings().removeClass("active"),
          e(this).parent().parent().addClass("selected"),
          e(this).addClass("active"));
      });
    }),
    e(".quantity-plus").each(function () {
      e(this).on("click", function (t) {
        t.preventDefault();
        var n = e(this).siblings(".qty-input"),
          a = parseInt(n.val(), 10);
        isNaN(a) || n.val(a + 1);
      });
    }),
    e(".quantity-minus").each(function () {
      e(this).on("click", function (t) {
        t.preventDefault();
        var n = e(this).siblings(".qty-input"),
          a = parseInt(n.val(), 10);
        !isNaN(a) && a > 1 && n.val(a - 1);
      });
    }),
    // window.addEventListener(
    //   "contextmenu",
    //   function (e) {
    //     e.preventDefault();
    //   },
    //   !1,
    // ),
    (document.onkeydown = function (e) {
      //   return (
      //     123 != event.keyCode &&
      //     (!e.ctrlKey || !e.shiftKey || e.keyCode != "I".charCodeAt(0)) &&
      //     (!e.ctrlKey || !e.shiftKey || e.keyCode != "C".charCodeAt(0)) &&
      //     (!e.ctrlKey || !e.shiftKey || e.keyCode != "J".charCodeAt(0)) &&
      //     (!e.ctrlKey || e.keyCode != "U".charCodeAt(0)) &&
      //     void 0
      //   );
    }));
})(jQuery);
