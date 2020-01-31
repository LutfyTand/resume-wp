/**
 * bookblock.js v2.0.1
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2013, Codrops
 * http://www.codrops.com
 */

 (function(f, g, d) {
    var c = f(g),
        e = g.Modernizr;
    e.addTest("csstransformspreserve3d", function() {
        var l = e.prefixed("transformStyle");
        var k = "preserve-3d";
        var j;
        if (!l) {
            return false
        }
        l = l.replace(/([A-Z])/g, function(n, m) {
            return "-" + m.toLowerCase()
        }).replace(/^ms-/, "-ms-");
        e.testStyles("#modernizr{" + l + ":" + k + ";}", function(m, n) {
            j = g.getComputedStyle ? getComputedStyle(m, null).getPropertyValue(l) : ""
        });
        return (j === k)
    });
    var a = f.event,
        b, i;
    b = a.special.debouncedresize = {
        setup: function() {
            f(this).on("resize", b.handler)
        },
        teardown: function() {
            f(this).off("resize", b.handler)
        },
        handler: function(n, j) {
            var m = this,
                l = arguments,
                k = function() {
                    n.type = "debouncedresize";
                    a.dispatch.apply(m, l)
                };
            if (i) {
                clearTimeout(i)
            }
            j ? k() : i = setTimeout(k, b.threshold)
        },
        threshold: 150
    };
    f.BookBlock = function(j, k) {
        this.$el = f(k);
        this._init(j)
    };
    f.BookBlock.defaults = {
        startPage: 1,
        orientation: "vertical",
        direction: "ltr",
        speed: 1000,
        easing: "ease-in-out",
        shadows: true,
        shadowSides: 0.2,
        shadowFlip: 0.1,
        circular: false,
        nextEl: "",
        prevEl: "",
        autoplay: false,
        interval: 3000,
        onEndFlip: function(j, l, k) {
            return false
        },
        onBeforeFlip: function(j) {
            return false
        }
    };
    f.BookBlock.prototype = {
        _init: function(j) {
            this.options = f.extend(true, {}, f.BookBlock.defaults, j);
            this.$el.addClass("bb-" + this.options.orientation);
            this.$items = this.$el.children(".bb-item").hide();
            this.itemsCount = this.$items.length;
            if ((this.options.startPage > 0) && (this.options.startPage <= this.itemsCount)) {
                this.current = (this.options.startPage - 1)
            } else {
                h("startPage option is out of range");
                this.current = 0
            }
            this.previous = -1;
            this.$current = this.$items.eq(this.current).show();
            this.elWidth = this.$el.width();
            var k = {
                WebkitTransition: "webkitTransitionEnd",
                MozTransition: "transitionend",
                OTransition: "oTransitionEnd",
                msTransition: "MSTransitionEnd",
                transition: "transitionend"
            };
            this.transEndEventName = k[e.prefixed("transition")] + ".bookblock";
            this.support = e.csstransitions && e.csstransforms3d && e.csstransformspreserve3d;
            this._initEvents();
            if (this.options.autoplay) {
                this.options.circular = true;
                this._startSlideshow()
            }
        },
        _initEvents: function() {
            var j = this;
            if (this.options.nextEl !== "") {
                f(this.options.nextEl).on("click.bookblock touchstart.bookblock", function() {
                    j._action("next");
                    return false
                })
            }
            if (this.options.prevEl !== "") {
                f(this.options.prevEl).on("click.bookblock touchstart.bookblock", function() {
                    j._action("prev");
                    return false
                })
            }
            c.on("debouncedresize", function() {
                j.elWidth = j.$el.width()
            })
        },
        _action: function(j, k) {
            this._stopSlideshow();
            this._navigate(j, k)
        },
        _navigate: function(j, k) {
            if (this.isAnimating) {
                return false
            }
            this.options.onBeforeFlip(this.current);
            this.isAnimating = true;
            this.$current = this.$items.eq(this.current);
            if (k !== d) {
                this.current = k
            } else {
                if (j === "next" && this.options.direction === "ltr" || j === "prev" && this.options.direction === "rtl") {
                    if (!this.options.circular && this.current === this.itemsCount - 1) {
                        this.end = true
                    } else {
                        this.previous = this.current;
                        this.current = this.current < this.itemsCount - 1 ? this.current + 1 : 0
                    }
                } else {
                    if (j === "prev" && this.options.direction === "ltr" || j === "next" && this.options.direction === "rtl") {
                        if (!this.options.circular && this.current === 0) {
                            this.end = true
                        } else {
                            this.previous = this.current;
                            this.current = this.current > 0 ? this.current - 1 : this.itemsCount - 1
                        }
                    }
                }
            }
            this.$nextItem = !this.options.circular && this.end ? this.$current : this.$items.eq(this.current);
            if (!this.support) {
                this._layoutNoSupport(j)
            } else {
                this._layout(j)
            }
        },
        _layoutNoSupport: function(k) {
            this.$items.hide();
            this.$nextItem.show();
            this.end = false;
            this.isAnimating = false;
            var j = k === "next" && this.current === this.itemsCount - 1 || k === "prev" && this.current === 0;
            this.options.onEndFlip(this.previous, this.current, j)
        },
        _layout: function(l) {
            var v = this,
                u = this._addSide("left", l),
                o = this._addSide("middle", l),
                j = this._addSide("right", l),
                r = u.find("div.bb-overlay"),
                t = o.find("div.bb-flipoverlay:first"),
                w = o.find("div.bb-flipoverlay:last"),
                s = j.find("div.bb-overlay"),
                k = this.end ? 400 : this.options.speed;
            this.$items.hide();
            this.$el.prepend(u, o, j);
            o.css({
                transitionDuration: k + "ms",
                transitionTimingFunction: this.options.easing
            }).on(this.transEndEventName, function(y) {
                if (f(y.target).hasClass("bb-page")) {
                    v.$el.children(".bb-page").remove();
                    v.$nextItem.show();
                    v.end = false;
                    v.isAnimating = false;
                    var x = l === "next" && v.current === v.itemsCount - 1 || l === "prev" && v.current === 0;
                    v.options.onEndFlip(v.previous, v.current, x)
                }
            });
            if (l === "prev") {
                o.addClass("bb-flip-initial")
            }
            if (this.options.shadows && !this.end) {
                var n = (l === "next") ? {
                        transition: "opacity " + this.options.speed / 2 + "ms linear " + this.options.speed / 2 + "ms"
                    } : {
                        transition: "opacity " + this.options.speed / 2 + "ms linear",
                        opacity: this.options.shadowSides
                    },
                    q = (l === "next") ? {
                        transition: "opacity " + this.options.speed / 2 + "ms linear"
                    } : {
                        transition: "opacity " + this.options.speed / 2 + "ms linear " + this.options.speed / 2 + "ms",
                        opacity: this.options.shadowFlip
                    },
                    m = (l === "next") ? {
                        transition: "opacity " + this.options.speed / 2 + "ms linear " + this.options.speed / 2 + "ms",
                        opacity: this.options.shadowFlip
                    } : {
                        transition: "opacity " + this.options.speed / 2 + "ms linear"
                    },
                    p = (l === "next") ? {
                        transition: "opacity " + this.options.speed / 2 + "ms linear",
                        opacity: this.options.shadowSides
                    } : {
                        transition: "opacity " + this.options.speed / 2 + "ms linear " + this.options.speed / 2 + "ms"
                    };
                t.css(q);
                w.css(m);
                r.css(n);
                s.css(p)
            }
            setTimeout(function() {
                o.addClass(v.end ? "bb-flip-" + l + "-end" : "bb-flip-" + l);
                if (v.options.shadows && !v.end) {
                    t.css({
                        opacity: l === "next" ? v.options.shadowFlip : 0
                    });
                    w.css({
                        opacity: l === "next" ? 0 : v.options.shadowFlip
                    });
                    r.css({
                        opacity: l === "next" ? v.options.shadowSides : 0
                    });
                    s.css({
                        opacity: l === "next" ? 0 : v.options.shadowSides
                    })
                }
            }, 25)
        },
        _addSide: function(l, k) {
            var j;
            switch (l) {
                case "left":
                    j = f('<div class="bb-page"><div class="bb-back"><div class="bb-outer"><div class="bb-content"><div class="bb-inner">' + (k === "next" ? this.$current.html() : this.$nextItem.html()) + '</div></div><div class="bb-overlay"></div></div></div></div>').css("z-index", 102);
                    break;
                case "middle":
                    j = f('<div class="bb-page"><div class="bb-front"><div class="bb-outer"><div class="bb-content"><div class="bb-inner">' + (k === "next" ? this.$current.html() : this.$nextItem.html()) + '</div></div><div class="bb-flipoverlay"></div></div></div><div class="bb-back"><div class="bb-outer"><div class="bb-content" style="width:' + this.elWidth + 'px"><div class="bb-inner">' + (k === "next" ? this.$nextItem.html() : this.$current.html()) + '</div></div><div class="bb-flipoverlay"></div></div></div></div>').css("z-index", 103);
                    break;
                case "right":
                    j = f('<div class="bb-page"><div class="bb-front"><div class="bb-outer"><div class="bb-content"><div class="bb-inner">' + (k === "next" ? this.$nextItem.html() : this.$current.html()) + '</div></div><div class="bb-overlay"></div></div></div></div>').css("z-index", 101);
                    break
            }
            return j
        },
        _startSlideshow: function() {
            var j = this;
            this.slideshow = setTimeout(function() {
                j._navigate("next");
                if (j.options.autoplay) {
                    j._startSlideshow()
                }
            }, this.options.interval)
        },
        _stopSlideshow: function() {
            if (this.options.autoplay) {
                clearTimeout(this.slideshow);
                this.options.autoplay = false
            }
        },
        next: function() {
            this._action(this.options.direction === "ltr" ? "next" : "prev")
        },
        prev: function() {
            this._action(this.options.direction === "ltr" ? "prev" : "next")
        },
        jump: function(k) {
            k -= 1;
            if (k === this.current || k >= this.itemsCount || k < 0) {
                return false
            }
            var j;
            if (this.options.direction === "ltr") {
                j = k > this.current ? "next" : "prev"
            } else {
                j = k > this.current ? "prev" : "next"
            }
            this._action(j, k)
        },
        last: function() {
            this.jump(this.itemsCount)
        },
        first: function() {
            this.jump(1)
        },
        isActive: function() {
            return this.isAnimating
        },
        update: function() {
            var j = this.$items.eq(this.current);
            this.$items = this.$el.children(".bb-item");
            this.itemsCount = this.$items.length;
            this.current = j.index()
        },
        destroy: function() {
            if (this.options.autoplay) {
                this._stopSlideshow()
            }
            this.$el.removeClass("bb-" + this.options.orientation);
            this.$items.show();
            if (this.options.nextEl !== "") {
                f(this.options.nextEl).off(".bookblock")
            }
            if (this.options.prevEl !== "") {
                f(this.options.prevEl).off(".bookblock")
            }
            c.off("debouncedresize")
        }
    };
    var h = function(j) {
        if (g.console) {
            g.console.error(j)
        }
    };
    f.fn.bookblock = function(k) {
        if (typeof k === "string") {
            var j = Array.prototype.slice.call(arguments, 1);
            this.each(function() {
                var l = f.data(this, "bookblock");
                if (!l) {
                    h("cannot call methods on bookblock prior to initialization; attempted to call method '" + k + "'");
                    return
                }
                if (!f.isFunction(l[k]) || k.charAt(0) === "_") {
                    h("no such method '" + k + "' for bookblock instance");
                    return
                }
                l[k].apply(l, j)
            })
        } else {
            this.each(function() {
                var l = f.data(this, "bookblock");
                if (l) {
                    l._init()
                } else {
                    l = f.data(this, "bookblock", new f.BookBlock(k, this))
                }
            })
        }
        return this
    }
})(jQuery, window);