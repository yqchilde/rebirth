!
function (t) {
	var e = {};

	function n(o) {
		if (e[o]) return e[o].exports;
		var r = e[o] = {
			i: o,
			l: !1,
			exports: {}
		};
		return t[o].call(r.exports, r, r.exports, n), r.l = !0, r.exports
	}
	n.m = t, n.c = e, n.d = function (t, e, o) {
		n.o(t, e) || Object.defineProperty(t, e, {
			enumerable: !0,
			get: o
		})
	}, n.r = function (t) {
		"undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(t, Symbol.toStringTag, {
			value: "Module"
		}), Object.defineProperty(t, "__esModule", {
			value: !0
		})
	}, n.t = function (t, e) {
		if (1 & e && (t = n(t)), 8 & e) return t;
		if (4 & e && "object" == typeof t && t && t.__esModule) return t;
		var o = Object.create(null);
		if (n.r(o), Object.defineProperty(o, "default", {
				enumerable: !0,
				value: t
			}), 2 & e && "string" != typeof t)
			for (var r in t) n.d(o, r, function (e) {
				return t[e]
			}.bind(null, r));
		return o
	}, n.n = function (t) {
		var e = t && t.__esModule ?
			function () {
				return t.
				default
			} : function () {
				return t
			};
		return n.d(e, "a", e), e
	}, n.o = function (t, e) {
		return Object.prototype.hasOwnProperty.call(t, e)
	}, n.p = "", n(n.s = 0)
}([function (t, e, n) {
	n(3), t.exports = n(2)
}, function (t, e) {
	!
	function (e) {
		"use strict";
		var n = Object.prototype,
			o = n.hasOwnProperty,
			r = "function" == typeof Symbol ? Symbol : {},
			a = r.iterator || "@@iterator",
			i = r.asyncIterator || "@@asyncIterator",
			c = r.toStringTag || "@@toStringTag",
			s = "object" == typeof t,
			l = e.regeneratorRuntime;
		if (l) s && (t.exports = l);
		else {
			(l = e.regeneratorRuntime = s ? t.exports : {}).wrap = h;
			var u = {},
				d = {};
			d[a] = function () {
				return this
			};
			var p = Object.getPrototypeOf,
				f = p && p(p(C([])));
			f && f !== n && o.call(f, a) && (d = f);
			var m = w.prototype = g.prototype = Object.create(d);
			y.prototype = m.constructor = w, w.constructor = y, w[c] = y.displayName = "GeneratorFunction", l.isGeneratorFunction = function (t) {
				var e = "function" == typeof t && t.constructor;
				return !!e && (e === y || "GeneratorFunction" === (e.displayName || e.name))
			}, l.mark = function (t) {
				return Object.setPrototypeOf ? Object.setPrototypeOf(t, w) : (t.__proto__ = w, c in t || (t[c] = "GeneratorFunction")), t.prototype = Object.create(m), t
			}, l.awrap = function (t) {
				return {
					__await: t
				}
			}, b(k.prototype), k.prototype[i] = function () {
				return this
			}, l.AsyncIterator = k, l.async = function (t, e, n, o) {
				var r = new k(h(t, e, n, o));
				return l.isGeneratorFunction(e) ? r : r.next().then((function (t) {
					return t.done ? t.value : r.next()
				}))
			}, b(m), m[c] = "Generator", m[a] = function () {
				return this
			}, m.toString = function () {
				return "[object Generator]"
			}, l.keys = function (t) {
				var e = [];
				for (var n in t) e.push(n);
				return e.reverse(),
					function n() {
						for (; e.length;) {
							var o = e.pop();
							if (o in t) return n.value = o, n.done = !1, n
						}
						return n.done = !0, n
					}
			}, l.values = C, E.prototype = {
				constructor: E,
				reset: function (t) {
					if (this.prev = 0, this.next = 0, this.sent = this._sent = void 0, this.done = !1, this.delegate = null, this.method = "next", this.arg = void 0, this.tryEntries.forEach(L), !t)
						for (var e in this) "t" === e.charAt(0) && o.call(this, e) && !isNaN(+e.slice(1)) && (this[e] = void 0)
				},
				stop: function () {
					this.done = !0;
					var t = this.tryEntries[0].completion;
					if ("throw" === t.type) throw t.arg;
					return this.rval
				},
				dispatchException: function (t) {
					if (this.done) throw t;
					var e = this;

					function n(n, o) {
						return i.type = "throw", i.arg = t, e.next = n, o && (e.method = "next", e.arg = void 0), !!o
					}
					for (var r = this.tryEntries.length - 1; r >= 0; --r) {
						var a = this.tryEntries[r],
							i = a.completion;
						if ("root" === a.tryLoc) return n("end");
						if (a.tryLoc <= this.prev) {
							var c = o.call(a, "catchLoc"),
								s = o.call(a, "finallyLoc");
							if (c && s) {
								if (this.prev < a.catchLoc) return n(a.catchLoc, !0);
								if (this.prev < a.finallyLoc) return n(a.finallyLoc)
							} else if (c) {
								if (this.prev < a.catchLoc) return n(a.catchLoc, !0)
							} else {
								if (!s) throw new Error("try statement without catch or finally");
								if (this.prev < a.finallyLoc) return n(a.finallyLoc)
							}
						}
					}
				},
				abrupt: function (t, e) {
					for (var n = this.tryEntries.length - 1; n >= 0; --n) {
						var r = this.tryEntries[n];
						if (r.tryLoc <= this.prev && o.call(r, "finallyLoc") && this.prev < r.finallyLoc) {
							var a = r;
							break
						}
					}
					a && ("break" === t || "continue" === t) && a.tryLoc <= e && e <= a.finallyLoc && (a = null);
					var i = a ? a.completion : {};
					return i.type = t, i.arg = e, a ? (this.method = "next", this.next = a.finallyLoc, u) : this.complete(i)
				},
				complete: function (t, e) {
					if ("throw" === t.type) throw t.arg;
					return "break" === t.type || "continue" === t.type ? this.next = t.arg : "return" === t.type ? (this.rval = this.arg = t.arg, this.method = "return", this.next = "end") : "normal" === t.type && e && (this.next = e), u
				},
				finish: function (t) {
					for (var e = this.tryEntries.length - 1; e >= 0; --e) {
						var n = this.tryEntries[e];
						if (n.finallyLoc === t) return this.complete(n.completion, n.afterLoc), L(n), u
					}
				},
				catch: function (t) {
					for (var e = this.tryEntries.length - 1; e >= 0; --e) {
						var n = this.tryEntries[e];
						if (n.tryLoc === t) {
							var o = n.completion;
							if ("throw" === o.type) {
								var r = o.arg;
								L(n)
							}
							return r
						}
					}
					throw new Error("illegal catch attempt")
				},
				delegateYield: function (t, e, n) {
					return this.delegate = {
						iterator: C(t),
						resultName: e,
						nextLoc: n
					}, "next" === this.method && (this.arg = void 0), u
				}
			}
		}

		function h(t, e, n, o) {
			var r = e && e.prototype instanceof g ? e : g,
				a = Object.create(r.prototype),
				i = new E(o || []);
			return a._invoke = function (t, e, n) {
				var o = "suspendedStart";
				return function (r, a) {
					if ("executing" === o) throw new Error("Generator is already running");
					if ("completed" === o) {
						if ("throw" === r) throw a;
						return T()
					}
					for (n.method = r, n.arg = a;;) {
						var i = n.delegate;
						if (i) {
							var c = x(i, n);
							if (c) {
								if (c === u) continue;
								return c
							}
						}
						if ("next" === n.method) n.sent = n._sent = n.arg;
						else if ("throw" === n.method) {
							if ("suspendedStart" === o) throw o = "completed", n.arg;
							n.dispatchException(n.arg)
						} else "return" === n.method && n.abrupt("return", n.arg);
						o = "executing";
						var s = v(t, e, n);
						if ("normal" === s.type) {
							if (o = n.done ? "completed" : "suspendedYield", s.arg === u) continue;
							return {
								value: s.arg,
								done: n.done
							}
						}
						"throw" === s.type && (o = "completed", n.method = "throw", n.arg = s.arg)
					}
				}
			}(t, n, i), a
		}

		function v(t, e, n) {
			try {
				return {
					type: "normal",
					arg: t.call(e, n)
				}
			} catch (t) {
				return {
					type: "throw",
					arg: t
				}
			}
		}

		function g() {}

		function y() {}

		function w() {}

		function b(t) {
			["next", "throw", "return"].forEach((function (e) {
				t[e] = function (t) {
					return this._invoke(e, t)
				}
			}))
		}

		function k(t) {
			var e;
			this._invoke = function (n, r) {
				function a() {
					return new Promise((function (e, a) {
						!
						function e(n, r, a, i) {
							var c = v(t[n], t, r);
							if ("throw" !== c.type) {
								var s = c.arg,
									l = s.value;
								return l && "object" == typeof l && o.call(l, "__await") ? Promise.resolve(l.__await).then((function (t) {
									e("next", t, a, i)
								}), (function (t) {
									e("throw", t, a, i)
								})) : Promise.resolve(l).then((function (t) {
									s.value = t, a(s)
								}), i)
							}
							i(c.arg)
						}(n, r, e, a)
					}))
				}
				return e = e ? e.then(a, a) : a()
			}
		}

		function x(t, e) {
			var n = t.iterator[e.method];
			if (void 0 === n) {
				if (e.delegate = null, "throw" === e.method) {
					if (t.iterator.return && (e.method = "return", e.arg = void 0, x(t, e), "throw" === e.method)) return u;
					e.method = "throw", e.arg = new TypeError("The iterator does not provide a 'throw' method")
				}
				return u
			}
			var o = v(n, t.iterator, e.arg);
			if ("throw" === o.type) return e.method = "throw", e.arg = o.arg, e.delegate = null, u;
			var r = o.arg;
			return r ? r.done ? (e[t.resultName] = r.value, e.next = t.nextLoc, "return" !== e.method && (e.method = "next", e.arg = void 0), e.delegate = null, u) : r : (e.method = "throw", e.arg = new TypeError("iterator result is not an object"), e.delegate = null, u)
		}

		function j(t) {
			var e = {
				tryLoc: t[0]
			};
			1 in t && (e.catchLoc = t[1]), 2 in t && (e.finallyLoc = t[2], e.afterLoc = t[3]), this.tryEntries.push(e)
		}

		function L(t) {
			var e = t.completion || {};
			e.type = "normal", delete e.arg, t.completion = e
		}

		function E(t) {
			this.tryEntries = [{
				tryLoc: "root"
			}], t.forEach(j, this), this.reset(!0)
		}

		function C(t) {
			if (t) {
				var e = t[a];
				if (e) return e.call(t);
				if ("function" == typeof t.next) return t;
				if (!isNaN(t.length)) {
					var n = -1,
						r = function e() {
							for (; ++n < t.length;)
								if (o.call(t, n)) return e.value = t[n], e.done = !1, e;
							return e.value = void 0, e.done = !0, e
						};
					return r.next = r
				}
			}
			return {
				next: T
			}
		}

		function T() {
			return {
				value: void 0,
				done: !0
			}
		}
	}(function () {
		return this
	}() || Function("return this")())
}, function (t, e) {}, function (t, e, n) {
	"use strict";
	n.r(e);
	n(1);
	var o, r = function (t) {
			t(".site-wrapper").toggleClass("toggled"), t(event.currentTarget).hide(250), t("body").addClass("overflow-hidden").append('<div class="modal-backdrop fade show global-modal global-modal-click-close"></div>'), t(".sidebar-container").addClass("boxshadow-right")
		},
		a = function (t) {
			t(".site-wrapper").toggleClass("toggled"), t(".sidebar-toggler").show(250), t("body").removeClass("overflow-hidden"), t(".sidebar-container").removeClass("boxshadow-right"), t(".global-modal").remove()
		},
		i = (window, (o = window.jQuery)(".sidebar-toggler").click((function (t) {
			r(o), o(".global-modal-click-close").bind("click", (function (t) {
				a(o)
			}))
		})), o(".sidebar-close").click((function (t) {
			a(o), o(".global-modal-click-close").unbind()
		})), function (t, e) {
			e(".click-search").click((function (t) {
				e("body").addClass("overflow-hidden").append('<div class="modal-backdrop fade show global-modal global-modal-pc-search"></div>'), e(".search-wrapper").show(250)
			})), e(".click-search-close").click((function (t) {
				e("body").removeClass("overflow-hidden"), e(".search-wrapper").hide(250), e(".global-modal-pc-search").remove()
			}))
		}(window, window.jQuery), function (t) {
			return t(document).scrollTop() <= 0
		}),
		c = function (t) {
			t(".main-header").addClass("top-nav")
		},
		s = function (t) {
			t(".main-header").removeClass("top-nav")
		},
		l = function (t) {
			var e = t.map((function (t) {
				return e = t, new Promise((function (t, n) {
					if (null !== document.getElementById(e.id)) return t(e), !1;
					var o = document.createElement("script");
					o.id = e.id, o.addEventListener("load", (function () {
						t(e)
					}), !1), o.addEventListener("error", (function () {
						n(e)
					}), !1), o.src = e.url, (document.getElementsByTagName("body")[0] || document.getElementsByTagName("head")[0]).appendChild(o)
				}));
				var e
			}));
			return Promise.all(e)
		},
		u = function (t) {
			var e = t.map((function (t) {
				return e = t, new Promise((function (t, n) {
					if (null !== document.getElementById(e.id)) return t(e), !1;
					var o = document.createElement("link");
					o.type = "text/css", o.rel = "stylesheet", o.id = e.id, o.addEventListener("load", (function () {
						t(e)
					}), !1), o.addEventListener("error", (function () {
						n(e)
					}), !1), o.href = e.url, document.getElementsByTagName("head")[0].appendChild(o)
				}));
				var e
			}));
			return Promise.all(e)
		};
	(function (t, e) {
		i(e) ? c(e) : s(e), e(t).scroll((function () {
			i(e) ? c(e) : s(e)
		}))
	})(window, window.jQuery),
	function (t) {
		(0, t.jQuery)(".site-tooltip").tooltip({
			html: !0,
			template: '<div class="tooltip site-tooltip-wrapper" role="tooltip"><div class="arrow"></div><div class="tooltip-inner site-tooltip-wrapper-inner"></div></div>'
		})
	}(window),
	function (t) {
		(0, t.jQuery)(".site-popover").popover({
			html: !0,
			template: '<div class="popover site-popover-wrapper" role="tooltip"><div class="arrow"></div><h3 class="popover-header site-popover-wrapper-header"></h3><div class="popover-body site-popover-wrapper-body"></div></div>'
		})
	}(window),
	function (t) {
		var e = t.jQuery;
		!
		function (t) {
			var e = t.jQuery,
				n = {
					findOrFilter: function (t, e) {
						var n = t.find(e);
						return t.filter(e).add(n).filter(":not([data-toc-skip])")
					},
					generateUniqueIdBase: function (t) {
						return e(t).text().trim().replace(/\'/gi, "").replace(/[& +$,:;=?@"#{}|^~[`%!'<>\]\.\/\(\)\*\\\n\t\b\v]/g, "-").replace(/-{2,}/g, "-").substring(0, 64).replace(/^-+|-+$/gm, "").toLowerCase() || t.tagName.toLowerCase()
					},
					generateUniqueId: function (t) {
						for (var e = this.generateUniqueIdBase(t), n = 0;; n++) {
							var o = e;
							if (n > 0 && (o += "-" + n), !document.getElementById(o)) return o
						}
					},
					generateAnchor: function (t) {
						if (t.id) return t.id;
						var e = this.generateUniqueId(t);
						return t.id = e, e
					},
					createNavList: function () {
						return e('<ul class="nav navbar-nav article-toc"></ul>')
					},
					createChildNavList: function (t) {
						var e = this.createNavList();
						return t.append(e), e
					},
					generateNavEl: function (t, n) {
						var o = e('<a class="nav-link"></a>');
						o.attr("href", "#" + t), o.text(n);
						var r = e("<li></li>");
						return r.append(o), r
					},
					generateNavItem: function (t) {
						var n = this.generateAnchor(t),
							o = e(t),
							r = o.data("toc-text") || o.text();
						return this.generateNavEl(n, r)
					},
					getTopLevel: function (t) {
						for (var e = 1; e <= 6; e++) {
							if (this.findOrFilter(t, "h" + e).length > 1) return e
						}
						return 1
					},
					getHeadings: function (t, e) {
						var n = "h" + e,
							o = "h" + (e + 1);
						return this.findOrFilter(t, n + "," + o)
					},
					getNavLevel: function (t) {
						return parseInt(t.tagName.charAt(1), 10)
					},
					populateNav: function (t, e, n) {
						var o, r = t,
							a = this;
						n.each((function (n, i) {
							var c = a.generateNavItem(i);
							a.getNavLevel(i) === e ? r = t : o && r === t && (r = a.createChildNavList(o)), r.append(c), o = c
						}))
					},
					parseOps: function (t) {
						var n;
						return (n = t.jquery ? {
							$nav: t
						} : t).$scope = n.$scope || e(document.body), n
					}
				},
				o = {
					$nav: e("nav.article-toc-nav"),
					$scope: e("article.article-main")
				};
			(o = n.parseOps(o)).$nav.attr("data-toggle", "toc");
			var r = n.createChildNavList(o.$nav),
				a = n.getTopLevel(o.$scope),
				i = n.getHeadings(o.$scope, a);
			n.populateNav(r, a, i)
		}(t), e("body").scrollspy({
			target: e(".article-toc-nav"),
			offset: 150
		}), e("nav.article-toc-nav ul li a").on("click", (function (t) {
			e("html, body").animate({
				scrollTop: e(e(this).attr("href")).offset().top - 80
			}, 500), t.preventDefault()
		}))
	}(window),
	function (t) {
		var e = t.document.querySelector(".article-main");
		if (null === e) return !1;
		var n = t.document.querySelector(".reading-progress-bar");
		if (null === n) return !1;
		var o = t.document.querySelector(".progress-number");
		t.requestAnimationFrame((function r() {
			var a = e.getBoundingClientRect(),
				i = t.innerHeight / 2;
			if (a.top > i) {
				n.setAttribute("aria-valuenow", 0), n.style.width = "0%", o.style.display = "none"
			}
			if (a.top < i) {
				var c = n.getAttribute("aria-valuemax");
				n.setAttribute("aria-valuenow", c), n.style.width = c + "%", o.style.display = "none"
			}
			if (a.top <= i && a.bottom >= i) {
				var s = n.getAttribute("aria-valuemax") * Math.abs(a.top - i) / a.height;
				n.setAttribute("aria-valuenow", s), n.style.width = s + "%", o.innerHTML = t.Math.round(s) + "%", o.style.display = "block"
			}
			t.requestAnimationFrame(r)
		}))
	}(window);

	function d(t) {
		return (d = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ?
			function (t) {
				return typeof t
			} : function (t) {
				return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t
			})(t)
	}

	function p(t, e) {
		if (0 === arguments.length) return null;
		var n, o = e || "{y}-{m}-{d} {h}:{i}:{s}";
		"object" === d(t) ? n = t : ("string" == typeof t && /^[0-9]+$/.test(t) && (t = parseInt(t)), "number" == typeof t && 10 === t.toString().length && (t *= 1e3), n = new Date(t));
		var r = {
			y: n.getFullYear(),
			m: n.getMonth() + 1,
			d: n.getDate(),
			h: n.getHours(),
			i: n.getMinutes(),
			s: n.getSeconds(),
			a: n.getDay()
		};
		return o.replace(/{([ymdhisa])+}/g, (function (t, e) {
			var n = r[e];
			return "a" === e ? ["日", "一", "二", "三", "四", "五", "六"][n] : n.toString().padStart(2, "0")
		}))
	}

	function f(t, e) {
		t = 10 === ("" + t).length ? 1e3 * parseInt(t) : +t;
		var n = new Date(t),
			o = (Date.now() - n) / 1e3;
		return o < 30 ? "刚刚" : o < 3600 ? Math.ceil(o / 60) + "分钟前" : o < 86400 ? Math.ceil(o / 3600) + "小时前" : o < 172800 ? "1天前" : e ? p(t, e) : n.getMonth() + 1 + "月" + n.getDate() + "日" + n.getHours() + "时" + n.getMinutes() + "分"
	}
	var m = function (t, e) {
		var n = (new Date).valueOf(),
			o = void 0 === e.id ? console.warn("未填写 Toast 节点ID") : e.id,
			r = void 0 === e.content ? console.warn("未填写 Toast 内容") : e.content,
			a = void 0 === e.time ? f(new Date) : f(new Date(e.time)),
			i = void 0 === e.config ? {
				animation: !0,
				autohide: !0,
				delay: 2500
			} : e.config,
			c = '\n<div id="'.concat(o + n, '" class="toast toast-wrapper-list-item ').concat(o, '" role="alert" aria-live="assertive" aria-atomic="true">\n<div class="toast-header">\n<img src="/favicon.png" class="rounded mr-2" alt="site-logo">\n<strong class="mr-auto">').concat(rebirth_option.toast_title, "</strong>\n<small>").concat(a, '</small>\n<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">\n<span aria-hidden="true">&times;</span>\n</button>\n</div>\n<div class="toast-body">').concat(r, "</div>\n</div>\n");
		t(".toast-wrapper .toast-wrapper-list").append(c), t("#".concat(o + n)).toast(i).toast("show").on("hidden.bs.toast", (function () {
			t(this).remove()
		}))
	};

	function h(t, e, n, o, r, a, i) {
		try {
			var c = t[a](i),
				s = c.value
		} catch (t) {
			return void n(t)
		}
		c.done ? e(s) : Promise.resolve(s).then(o, r)
	}

	function v(t) {
		return function () {
			var e = this,
				n = arguments;
			return new Promise((function (o, r) {
				var a = t.apply(e, n);

				function i(t) {
					h(a, o, r, i, c, "next", t)
				}

				function c(t) {
					h(a, o, r, i, c, "throw", t)
				}
				i(void 0)
			}))
		}
	}(function () {
		var t = v(regeneratorRuntime.mark((function t(e) {
			var n, o;
			return regeneratorRuntime.wrap((function (t) {
				for (;;) switch (t.prev = t.next) {
					case 0:
						return n = "https://cdn.jsdelivr.net/npm/prismjs@1.20.0", t.next = 3, e.document.querySelectorAll(".post-content pre>code");
					case 3:
						if (0 !== (o = t.sent).length) {
							t.next = 6;
							break
						}
						return t.abrupt("return", !1);
					case 6:
						return t.next = 8, u([{
							id: "prism-line-numbers-css",
							url: "".concat(n, "/plugins/line-numbers/prism-line-numbers.min.css")
						}, {
							id: "prism-toolbar-css",
							url: "".concat(n, "/plugins/toolbar/prism-toolbar.min.css")
						}]);
					case 8:
						return t.next = 10, l([{
							id: "prism-core-js",
							url: "".concat(n, "/components/prism-core.min.js")
						}]).then(v(regeneratorRuntime.mark((function t() {
							return regeneratorRuntime.wrap((function (t) {
								for (;;) switch (t.prev = t.next) {
									case 0:
										return t.next = 2, o.forEach((function (t) {
											t.parentNode.classList.add("overflow-hidden", "line-numbers");
											var n = e.document.createElement("div");
											n.id = "pre-loading", n.className = "d-flex justify-content-center align-items-center pre-block-loading", n.innerHTML = '<div class="loading"><div class="d-flex justify-content-center text-center loading-icon"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div><div class="text-center loading-text"><span>载入代码中...</span></div></div>', t.parentNode.insertBefore(n, t)
										}));
									case 2:
										return t.next = 4, l([{
											id: "prism-autoloader-js",
											url: "".concat(n, "/plugins/autoloader/prism-autoloader.min.js")
										}, {
											id: "prism-prism-toolbar-js",
											url: "".concat(n, "/plugins/toolbar/prism-toolbar.min.js")
										}, {
											id: "prism-line-numbers-js",
											url: "".concat(n, "/plugins/line-numbers/prism-line-numbers.min.js")
										}]).then(v(regeneratorRuntime.mark((function t() {
											return regeneratorRuntime.wrap((function (t) {
												for (;;) switch (t.prev = t.next) {
													case 0:
														return e.Prism.plugins.autoloader.languages_path = "".concat(n, "/components/"), e.Prism.plugins.toolbar.registerButton("show-language", (function (t) {
															var e = document.createElement("div");
															return e.className = "show-language", e.innerHTML = '<i class="fas fa-code"></i> '.concat(t.language), e
														})), e.Prism.plugins.toolbar.registerButton("select-code", (function (t) {
															var n = document.createElement("button");
															return n.className = "select-code", n.innerHTML = "复制代码", n.addEventListener("click", (function () {
																if (document.body.createTextRange) {
																	var n = document.body.createTextRange();
																	n.moveToElementText(t.element), n.select()
																} else if (e.getSelection) {
																	var o = e.getSelection(),
																		r = document.createRange();
																	r.selectNodeContents(t.element), o.removeAllRanges(), o.addRange(r)
																}
																m(e.jQuery, {
																	id: "prism-toast",
																	content: "请按 Ctrl + C / Command + C 进行复制代码！"
																})
															})), n
														})), t.next = 5, o.forEach((function (t) {
															t.classList.contains("language-html") && (t.classList.remove("language-html"), t.classList.add("language-markup")), e.Prism.highlightAll(), setTimeout((function () {
																t.parentNode.classList.remove("overflow-hidden"), e.document.querySelector("#pre-loading").remove()
															}), 1e3)
														}));
													case 5:
													case "end":
														return t.stop()
												}
											}), t)
										}))));
									case 4:
									case "end":
										return t.stop()
								}
							}), t)
						}))));
					case 10:
					case "end":
						return t.stop()
				}
			}), t)
		})));
		return function (e) {
			return t.apply(this, arguments)
		}
	})()(window);
	var g = new Promise((function (t, e) {
			l([{
				id: "qrcode-js",
				url: "https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"
			}]).then((function (e) {
				return t(e)
			})).
			catch((function (t) {
				return e(t)
			}))
		})),
		y = (function (t) {
			(0, t.jQuery)(".btn-share-popover").on("shown.bs.popover", (function () {
				g.then((function (e) {
					new QRCode(document.getElementById("wechat-qr-code-img"), {
						text: "".concat(t.location.origin).concat(t.location.pathname),
						width: 128,
						height: 128,
						colorDark: "#000000",
						colorLight: "#ffffff",
						correctLevel: t.QRCode.CorrectLevel.H
					})
				}))
			}))
		}(window), function (t) {
			return t.sessionStorage.colorMode ? t.sessionStorage.colorMode.trim() : getComputedStyle(document.documentElement).getPropertyValue("--color-content").trim()
		});
	(function (t, e) {
		setTimeout((function () {
			"dark" === y(t) ? t.document.documentElement.setAttribute("data-theme", "dark") : t.document.documentElement.setAttribute("data-theme", "light")
		}), 0), e(".click-dark").click((function (n) {
			"dark" === y(t) ? (t.sessionStorage.setItem("colorMode", "light"), t.document.documentElement.setAttribute("data-theme", "light"), t.document.documentElement.style.setProperty("--color-content", "light")) : (m(e, {
				id: "dark-mode-toast",
				content: "如果您的系统支持黑暗模式，该功能是无效的！"
			}), t.sessionStorage.setItem("colorMode", "dark"), t.document.documentElement.setAttribute("data-theme", "dark"), t.document.documentElement.style.setProperty("--color-content", "dark"))
		}))
	})(window, window.jQuery),
	function (t) {
		(function (t) {
			return new Promise((function (e, n) {
				l([{
					id: "zooming-js",
					url: "https://cdn.jsdelivr.net/npm/zooming@2.1.1/build/zooming.min.js"
				}]).then((function (n) {
					var o = new Zooming;
					o.config({
						bgColor: "light" === y(t) ? "#fff" : "#263238",
						zIndex: 1040,
						scaleBase: 1
					}), e(o)
				})).
				catch((function (t) {
					return n(t)
				}))
			}))
		})(t).then((function (t) {
			t.listen(".post-content-main article.post-content p img"), t.listen(".post-content-main article.post-content figure.kg-image-card img")
		})).
		catch((function (t) {
			console.warn("Zooming 插件加载失败", t)
		}))
	}(window),
	function (t) {
		var e = t.jQuery;
		e(t.document).ready((function () {
			e("article.post-content li").each((function () {
				/\[x]\s/gm.test(this.innerHTML) && (this.innerHTML = this.innerHTML.replace(/\[x]\s/gm, '<span class="span-todo-checkbox checked"></span><input type="checkbox" checked disabled class="todo-list-input checked"/>&nbsp;'), e(this).parent().addClass("todo-list")), /\[\s]\s/gm.test(this.innerHTML) && (this.innerHTML = this.innerHTML.replace(/\[\s]\s/gm, '<span class="span-todo-checkbox"></span><input type="checkbox" disabled class="todo-list-input"/>&nbsp;'), e(this).parent().addClass("todo-list"))
			}))
		}))
	}(window),
	function (t) {
		t.document.querySelectorAll(".post-content table").forEach((function (e) {
			var n = t.document.createElement("div");
			n.className = "overflow-x-auto table-area", n.innerHTML = "".concat(e.outerHTML), e.parentNode.insertBefore(n, e), e.remove()
		}))
	}(window);

	function w(t) {
		var e = t(window).width();
		e <= 576 && (t("body").addClass("mobile-content").removeClass("tablet-content", "desktop-content"), t(".post-content").addClass("mobile-content").removeClass("tablet-content", "desktop-content")), e > 576 && e < 1200 && (t("body").addClass("tablet-content").removeClass("mobile-content", "desktop-content"), t(".post-content").addClass("tablet-content").removeClass("mobile-content", "desktop-content")), e >= 1200 && (t("body").addClass("desktop-content").removeClass("tablet-content", "mobile-content"), t(".post-content").addClass("desktop-content").removeClass("tablet-content", "mobile-content"))
	}
	var b, k, x, j, L, E, C, T, S, N = (b = function () {
			w(window.jQuery)
		}, k = 100, S = function t() {
			var e = +new Date - C;
			e < k && e > 0 ? j = setTimeout(t, k - e) : (j = null, x || (T = b.apply(E, L), j || (E = L = null)))
		}, function () {
			for (var t = arguments.length, e = new Array(t), n = 0; n < t; n++) e[n] = arguments[n];
			E = this, C = +new Date;
			var o = x && !j;
			return j || (j = setTimeout(S, k)), o && (T = b.apply(E, e), E = e = null), T
		}),
		I = (function (t) {
			var e = t.jQuery;
			w(e), addEventListener("resize", (function (t) {
				N(e)
			}))
		}(window), function (t) {
			var e = t.jQuery,
				n = e(".click-to-top");
			e(void 0).scrollTop() >= 50 ? n.addClass("bounceInRight").removeClass("bounceOutDown") : n.removeClass("bounceInRight").addClass("bounceOutDown"), e(t).scroll((function () {
				e(this).scrollTop() >= 50 ? n.addClass("bounceInRight").removeClass("bounceOutDown") : n.removeClass("bounceInRight").addClass("bounceOutDown")
			})), n.click((function () {
				e("body, html").animate({
					scrollTop: 0
				}, 500)
			}))
		}(window), function (t, e) {
			addEventListener("DOMContentLoaded", (function () {
				null === t.localStorage.getItem("system-toast") && m(e, {
					id: "system-toast",
					content: rebirth_option.toast_content,
					time: rebirth_option.toast_time
				}), e(".system-toast .close").click((function () {
					t.localStorage.setItem("system-toast", !0)
				}))
			}))
		}(window, window.jQuery), function (t, e) {
			for (var n = [], o = Math.max(2, t - 2); o <= Math.min(e - 1, t + 2); o++) n.push(o);
			return t - 2 > 2 && n.unshift("..."), t + 2 < e - 1 && n.push("..."), n.unshift(1), n.push(e), n
		});
	(function () {
		var t = window.location.href,
			e = document.querySelector(".curr-page"),
			n = document.querySelector(".total-pages");
		if (e && n) {
			var o = Number.parseInt(e.textContent, 10),
				r = Number.parseInt(n.textContent, 10),
				a = document.querySelector(".pagination"),
				i = document.querySelector(".page-item");
			if (r > 1) {
				var c = [];
				I(o, r).forEach((function (e) {
					var n = t.split("/");
					e === o ? c.push('<li class="page-item active"><span class="page-link">' + e + "</span></li>") : "number" == typeof e ? ("page" === n[n.length - 3] && (t = t.replace(/\/page\/.*$/, "") + "/"), c.push('<li class="page-item"><a class="page-link" href="' + t + "page/" + e + '/" aria-label="第' + e + '页">' + e + "</a></li>")) : c.push('<li class="page-item ellipsis"><a class="page-link">...</a></li>')
				})), null !== i && (1 === o ? i.insertAdjacentHTML("beforebegin", c.join("")) : i.insertAdjacentHTML("afterend", c.join("")))
			} else null != a && (a.style.display = "none")
		}
	})(),
	function (t) {
		!
		function (t) {
			var e = t.jQuery;
			e.ajax({
				method: "GET",
				url: "https://v2.jinrishici.com/one.json",
				dataType: "json",
				data: {
					client: "browser-sdk/1.2",
					"X-User-Token": "i/wLqcKXpGXairZ6OVsjMnwcfAe4YeGQ"
				},
				success: function (t) {
					e(".home-sentence").text(t.data.content)
				}
			})
		}(t)
	}(window)
}]);