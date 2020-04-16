!
    function() {
        null !== document.getElementById("vcomments") && new Valine({
            el: "#vcomments",
            appId: rebirth_option.valine_appid,
            appKey: rebirth_option.valine_appkey,
            serverURLs: rebirth_option.valine_serverurls,
            avatar: "mm",
            visitor: !0,
            highlight: !0,
            recordIP: !0,
            placeholder: "请您理智发言，共建美好社会！",
            path: window.location.pathname,
            meta: ['nick', 'mail', 'link'],
            pageSize: 10,
            lang: 'zh-CN',
            avatarForce: false
        });
        let e = {}, t = $(this).index(), a = rebirth_option.home_url;

        function r(e, t) {
            let a = new RegExp(t, "gi");
            return e = e.replace(a, function(e) {
                return "<mark>" + e + "</mark>"
            })
        }
        $("#ghost-search-field").focus(function() {
            e[t] || $.ajax({
                type: "GET",
                url: a + "/wp-json/rebirth/v1/cache_search/json",
                dataType: "json",
                success: function(a) {
                    e[t] = a
                }
            })
        }), $("#ghost-search-field").on("input propertychange", function() {
            let a = $("#ghost-search-field").val();
            if ("" === a) {
                $("#ghost-search-results").html("");
                let e = $(".search-meta").attr("data-no-results-text").replace("[results]", 0);
                $(".search-meta").text(e)
            } else {
                let s = "", n = 0;
                $.each(e[t], function(e, t) {
                    -1 === t.title.toUpperCase().indexOf(a.toUpperCase()) && -1 === t.text.toUpperCase().indexOf(a.toUpperCase()) || (s +=
                        function(e, t, a, s, n) {
                            let i = e.trim().split(" "), l = t.indexOf(i[i.length - 1]), o = a.indexOf(i[i.length - 1]);
                            return t = l < 20 ? t.slice(0, 30) : t.slice(l - 10, l + 10), a = o < 40 ? a.slice(0, 70) : a.slice(o - 45, o + 45), '<a data-pjax href="' + n + '" class="ghost-search-item"><h2>' + (t = r(t, e)) + '</h2><span id="search-span">' + (a = r(a, e) + "...") + "</span><br><span>发布日期：" + s + "</span></a>"
                        }(a, t.title, t.text, t.time, t.link), n++)
                }), $("#ghost-search-results").html(s);
                let i = $(".search-meta").attr("data-no-results-text").replace("[results]", n);
                $(".search-meta").text(i)
            }
        })
    }();