$(document).ready(function(){$(function(){$(".tooltip-rs").tooltip({position:{my:"center bottom-20",at:"center top",using:function(e,t){$(this).css(e);$("<div>").addClass("arrow").addClass(t.vertical).addClass(t.horizontal).appendTo(this)}}})});$(function(){var e=$("#video-quickstart").attr("src").replace("autoplay=0","autoplay=1");$("#dialog").dialog({autoOpen:!1,modal:!0,width:680,closeOnEscape:!0,buttons:{},close:function(){$("#video-quickstart").attr("src","")},open:function(){$(".ui-dialog-titlebar-close").hide();$("#video-quickstart").attr("src",e)}});$(".dialog-rs").click(function(){$("#dialog").dialog("open")});$("a.dialog-close").click(function(){$("#dialog").dialog("close")})})});