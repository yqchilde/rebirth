!function () {
    if (document.getElementById('vcomments') !== null) {
        new Valine({
            el: "#vcomments",
            appId: rebirth_option.valine_appid,
            appKey: rebirth_option.valine_appkey,
            serverURLs: rebirth_option.valine_serverurls,
            notify: true,
            verify: true,
            avatar: 'mm',
            visitor: true,
            highlight: true,
            recordIP: true,
            placeholder: "请您理智发言，共建美好社会！",
            path: window.location.pathname
        });
    }

    let container = {};
    let index = $(this).index();
    let apiUrl = rebirth_option.home_url;
    $("#ghost-search-field").focus(function () {
        if (container[index]) {
        } else {
            $.ajax({
                type: "GET",
                url: apiUrl + "/wp-json/rebirth/v1/cache_search/json",
                dataType: "json",
                success: function (res) {
                    container[index] = res;
                }
            });
        }

    });

    function dataProcessing(key, title, text, time, link) {
        let s = key.trim().split(" ");
        let _title = title.indexOf(s[s.length - 1]);
        let _text = text.indexOf(s[s.length - 1]);

        title = _title < 20 ? title.slice(0, 30) : title.slice(_title - 10, _title + 10);
        text = _text < 40 ? text.slice(0, 60) : text.slice(_text - 40, _text + 40);

        title = keyMark(title, key);
        text = keyMark(text, key) + "...";

        let info = '<a data-pjax href="' + link + '" class="ghost-search-item">' +
            '<h2>' + title + '</h2>' +
            '<div style="color: #333" ' +
            '<span>' + text + '</span>' +
            '</div>' +
            '<span>发布日期：' + time + '</span>' +
            '</a>';

        return info;
    }

    function keyMark(string, key) {
        let reg = new RegExp(key, "gi");
        string = string.replace(reg, function (txt) {
            return "<mark>" + txt + "</mark>";
        });
        return string;
    }

    $('#ghost-search-field').on('input propertychange', function () {
        let searchField = $('#ghost-search-field').val();
        if (searchField === "") {
            $("#ghost-search-results").html("");
            let res = $(".search-meta").attr("data-no-results-text").replace("[results]", 0);
            $(".search-meta").text(res);
        } else {
            let allSearch = "";
            let count = 0;
            $.each(container[index], function (k, v) {
                if (!((v.title.toUpperCase().indexOf(searchField.toUpperCase()) !== -1) || (v.text.toUpperCase().indexOf(searchField.toUpperCase()) !== -1))) {
                    return;
                }
                allSearch += dataProcessing(searchField, v.title, v.text, v.time, v.link);
                count++;
            });
            $("#ghost-search-results").html(allSearch);
            let res = $(".search-meta").attr("data-no-results-text").replace("[results]", count);
            $(".search-meta").text(res);
        }
    });
}();