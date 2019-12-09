/**
 * File main.js.
 *
 * Series of init tasks.
 *
 * Please see comments below.
 */

(function ($) {

    if ($('body').hasClass('archive')) {

        // get elements
        var alist = document.querySelectorAll("a.post-thumbnail");
        var alistImg = document.querySelectorAll("a.post-thumbnail > img");
        var sltemplateUrl = templateUrl.slice(0, -11); // "http://100.210.14.87/"

        // parse href and rebuild img url
        var urls = [];
        var urlpaths = [];
        var repUrls = [];

        // construct img urls
        function constUrls() {
            for (i = 0; i < alist.length; i++) {
                urls[i] = alist[i].href;
                urlpaths[i] = urls[i].slice(33, -1);
                repUrls[i] = sltemplateUrl + "mpeg-dash/ss_" + urlpaths[i] + ".jpg?" + new Date().getTime();
            }
        }

        // added .htaccess cache directives for cache management

        // change default img to live ss feed
        function repImg() {
            constUrls();
            for (i = 0; i < repUrls.length; i++) {
                alistImg[i].src = repUrls[i];
                alistImg[i].srcset = repUrls[i];
            }
        }
        repImg();

        // repeat thumbnail change every 5 min
        setInterval(function () {
            repImg();
        }, 300000)

    }

})(jQuery);