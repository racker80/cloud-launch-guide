// load FeedMagnet SDK
var fm_server = 'rackspace.feedmagnet.com'
;(function() {
    window.fm_ready = function(fx) {
        if (typeof $FM !== 'undefined' && typeof $FM.ready === 'function') {
            $FM.ready(fx);
        } else {
            window.setTimeout(function() { fm_ready.call(null, fx); }, 50);
        }
    };
    var fmjs = document.createElement('script');
    var p = ('https:' === document.location.protocol ? 'https://' : 'http://');
    fmjs.src = p + fm_server + '/embed.js';
    fmjs.setAttribute('async', 'true');
    document.documentElement.firstChild.appendChild(fmjs);
})();





fm_ready(function($, _) {
    // code that interacts with FeedMagnet goes here

    var feed = $FM.Feed('test-group').options({'limit': 3}).get()

    feed.connect('new_update', function(self, data) {
       var udata = data.update.data
       data.update.html =
       '<div class="feed-widget">' +
       '<div class="text">' + udata.text + '</div>' +
       '<img class="avatar" ' +
       'src="' + udata.author.avatar + '" />' +
       '<div class="author">' + udata.author.alias + '</div>' +
       '<div class="timestamp">' +
       _(udata.timestamp).pretty_time() +
       '</div>' +
       
       '</div>'
   })

    var output = $FM.Element('#social-feed').display(feed)

});