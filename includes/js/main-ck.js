// the semi-colon before function invocation is a safety net against concatenated
// scripts and/or other plugins which may not be closed properly.
(function(e,t,n,r){function o(t,n){this.settings=e.extend({},s,n);this._defaults=s;this._name=i;this.init()}var i="clgPlugin",s={navState:"close",connections:[],showIPtoolFooter:!0,navWrapper:e(".nav-drawer-container"),expert:function(){return localStorage.getItem("expertChecked")},expertBtn:e("*[data-toggle-expert]"),singleUrl:function(){return e(".allStepsOn").attr("href")}};o.prototype={init:function(){var t=this,n=this.settings;console.log("xD");e("*[data-toggle-nav]").click(function(){t.showNav()});this.settings.expertBtn.click(function(){t.settings.expert()==="yes"?localStorage.setItem("expertChecked","no"):localStorage.setItem("expertChecked","yes");t.toggleExpert()});t.toggleExpert();e("#waypoint-header").waypoint("sticky",{wrapper:'<div class="sticky-wrapper" />',stuckClass:"stuck",handler:function(t){e(".nav-index-wrapper").hide()}});e(".chapter-container").waypoint(function(n){var r=e(this),i=t.settings.singleUrl();n==="up"&&(r=r.prev());!r.length;e("li.currentChapter em").html(r.find(".chapterTitle").data("title"));e(".allStepsOn").attr("href",i+"/"+r.find(".chapterTitle").data("slug"));e(".nav-thing li a").each(function(){if(e(this).text()===r.find(".chapterTitle").data("title")){e(".nav-thing li a").removeClass("completed");e(this).toggleClass("completed")}})},{})},yourOtherFunction:function(){},showNav:function(){var e=this.settings.navWrapper,t=this.settings.navState;e.slideToggle("fast",function(){e.is(":visible")?t="open":t="close"});return t},toggleExpert:function(){var t=this.settings.expertBtn;if(this.settings.expert()==="yes"){e(".page-content-full").hide();e(".actionOverview").removeClass("hide");t.addClass("btn-info-rs");t.find(".glyphicon").removeClass("glyphicon-certificate").addClass("glyphicon-certificate")}else{e(".page-content-full").show();e(".actionOverview").addClass("hide");t.removeClass("btn-info-rs");t.find(".glyphicon").removeClass("glyphicon-certificate").addClass("glyphicon-certificate")}e("body").trigger("expertToggle");return this.settings.expert()}};e.fn[i]=function(t){return this.each(function(){e.data(this,"plugin_"+i)||e.data(this,"plugin_"+i,new o(this,t))})}})(jQuery,window,document);$(document).ready(function(){$("body").clgPlugin();var e=[],t=[],n=[];(function(){var r=$("pre");r.each(function(e){var t=$(this);if(!t.parent().hasClass("pre-wrapper")){t.wrap('<div class="pre-wrapper"></div>');if(t.hasClass("terminal"))var n=$('<button class="btn btn-sm btn-default copy-button" >Copy</button>').attr("data-clipboard-text",t.text()).insertAfter(t)}else r.splice(e,1)});var i=new ZeroClipboard($(".copy-button"),{moviePath:"/includes/bower_components/zeroclipboard/ZeroClipboard.swf"});i.on("load",function(e){});i.on("complete",function(e,t){$(this).parents(".pre-wrapper").addClass("copied");console.log("Copied text to clipboard: "+t.text)});r.each(function(r,i){var s=$(this),o=s.parents(".pre-wrapper").find(".copy-button"),u=s.html(),a=s.html().match(/(your\.)(.*)(\.)(address)/gi),f=r;if(a){$.each(a,function(n,r){$.inArray(r,e)===-1&&e.push(r);var i=$('<div class="ip-table" data-ip-type="'+r+'">'+"<h5></h5>"+'<div class="current-ip">'+'<span data-ip-current="" class="ip-current"></span>'+'<a href="#" class="edit">edit</a>'+"</div>"+'<div class="edit-ip">'+'<input type="text" class="text" id="uniqueID"> <a href="#" class="save">save</a>'+"</div>"+"</div>");i.find("h5").html(r.split(".").join(" "));$(s).parentsUntil(".container").find(".sidebar .ip-panel .widgetSection").append(i.show());t.push(s)});$.each(a,function(e,t){var r=new RegExp(t,"g");if(s.html().match(r)){var i=t.replace(/\./g,"-");if(localStorage.getItem(t)){var u=localStorage.getItem(t);$(".ip-panel .panel-footer").hide()}else var u=t;var a=f+"-"+(f+e),l=s.html(),c=l.replace(r,'<span id="plumb-target-'+a+'" class="plumb_target"></span><span id="code-ip-target-'+a+'" data-code-ip-type="'+t+'" class="address '+i+'">'+u+"</span>");$(s).html(c);o&&o.attr("data-clipboard-text",s.text().replace(r,u));var h=$(s).parentsUntil(".container").find('.sidebar *[data-ip-type="'+t+'"]').attr("data-target","#plumb-target-"+a).show(),p=$("span#plumb-target-"+a);n.push({source:h,target:p})}})}});var s=function(){var t=0;$.each(e,function(e,n){localStorage.getItem(n)&&t++});t>0?$(".ip-panel .panel-footer").fadeOut():$(".ip-panel .panel-footer").fadeIn()};s();var o=function(e,t){localStorage.getItem(t)&&(e.is("input")?e.val(localStorage.getItem(t)):e.html(localStorage.getItem(t)));return e},u=function(e,t){$('.ip-panel *[data-ip-type="'+e+'"] .edit-ip input.text').val(t);$('.ip-panel *[data-ip-type="'+e+'"] .ip-current').html(t);$('span[data-code-ip-type="'+e+'"]').html(t);localStorage.setItem(e,t)};$(".ip-panel *[data-ip-type]").each(function(){var e=$(this),t=$(e.data("target")),n=e.data("ip-type"),r=o(e.find(".ip-current"),n),i=o(e.find(".edit-ip input.text"),n).keyup(function(){u(n,$(this).val())})});$(".ip-table .edit").click(function(){$(".ip-table .edit-ip").hide();$(".ip-table .current-ip").show();$(this).parent().hide().parents(".ip-table").find(".edit-ip").show();return!1});$(".ip-table .save").click(function(){$(".ip-table .edit-ip").hide();$(this).parents(".ip-table").find(".current-ip").show();s();return!1})})();(function(){function t(t,n){jsPlumb.isSource(t)&&t.is(":visible")&&jsPlumb.connect({source:n,target:t,container:t.parents(".row"),detachable:!1,endpointsOnTop:!1},e)}var e={connector:["Bezier",{curviness:50}],anchors:["LeftMiddle","RightMiddle"],paintStyle:{lineWidth:2,strokeStyle:"rgba(200,0,0,100)",dashstyle:"2 4"},endpoint:["Dot",{radius:3}],endpointStyle:{fillStyle:"rgba(200,0,0,100)"}};$.each(n,function(n,r){var i=r.source,s=$(r.target).parents(".pre-wrapper");i.offset({});jsPlumb.makeSource(s,{isSource:!0,dragOptions:!1,anchor:"LeftMiddle",maxConnections:1,endpoint:["Dot",{radius:3}],uniqueEndpoint:!0,paintStyle:{fillStyle:"rgba(200,0,0,100)"}},e);t(s,i);$(s).find("input").bind("click",function(){$(this).focus()})});$("body").on("expertToggle",function(e){$.each(n,function(e,n){var r=n.source,i=$(n.target).parents(".pre-wrapper");t(i,r);$(i).find("input").bind("click",function(){$(this).focus()})})})})();Socialite.load()});