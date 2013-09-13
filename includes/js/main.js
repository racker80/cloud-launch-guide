//@codekit-prepend "../bower_components/jquery/jquery.js"
//@codekit-prepend "../bower_components/bootstrap/js/dropdown.js"
//@codekit-prepend "../bower_components/zeroclipboard/ZeroClipboard.js"
//@codekit-prepend "../bower_components/jquery-waypoints/waypoints.js"
//@codekit-prepend "../bower_components/jquery-waypoints/shortcuts/sticky-elements/waypoints-sticky.js"

$(document).ready(function() {
	// toggle menu and state handling

	var navState = 'close';



/* ----------------------------------------------------------------
	NAVIGATION
	
---------------------------------------------------------------- */
	showNav = function() {
		var wrapper = $('.nav-index-wrapper');
		wrapper.slideToggle('fast', function(){
			if (wrapper.is(':visible')) {
				navState = 'open';
			} else { 
				navState = 'close';
			}		
		});
	}

	$('*[data-toggle-nav]').click(function(){
		showNav();
	});





/* ----------------------------------------------------------------
	EXPERT MODE
	
---------------------------------------------------------------- */
var expertBtn = $('*[data-toggle-expert]');

	var toggleExpert = function() {
		var expert = localStorage.getItem('expertChecked');
		if (expert === 'yes') {
			$(window).scrollTop(0);
			$('.page-container').hide();
			$('.actionOverview').removeClass('hide');

			expertBtn.addClass('btn-warning');
			expertBtn.find('.glyphicon').removeClass('glyphicon-save').addClass('glyphicon-saved');

		} else {
			$('.page-container').show();
			$('.actionOverview').addClass('hide');
			expertBtn.removeClass('btn-warning');
			expertBtn.find('.glyphicon').removeClass('glyphicon-saved').addClass('glyphicon-save');
		}
	}
	
	expertBtn.click(function(){
		var expert = localStorage.getItem('expertChecked');
		if(expert === 'yes') {
			expert = localStorage.setItem('expertChecked', 'no');
		} else {
			expert = localStorage.setItem('expertChecked', 'yes');
		}
		toggleExpert();

		$.waypoints('refresh');

	});

	toggleExpert();



/* ----------------------------------------------------------------
	IP Tool
	
---------------------------------------------------------------- */
	var types = ['your.master.public.ip.address', 'your.master.private.ip.address', 'your.clone.public.ip.address', 'your.clone.private.ip.address'];

	var showIPtool = function(value) {
		var n = value.match(/(your\.)(.*)(\.)(address)/g);
		if(n != null) {
			var tool = $(this).parentsUntil('.container').find('.sidebar *[data-ip-type="'+n[0]+'"]');
			tool.show();
		}
	}

	$('pre').each(function(){
		var ths = $(this);
		var	txt = ths.html();
		var	n = ths.html().match(/(your\.)(.*)(\.)(address)/gi);
		
		if(n) {
			$.each(types, function(index, value){
				var re = new RegExp(value, 'g');
				
				if( ths.html().match(re) ) {
					var cl = value.replace(/\./g, '-');
				
					if(localStorage.getItem(value)) {
						var text = localStorage.getItem(value);
						$('.ip-panel .panel-footer').hide();
					} else {
						var text = value;
					}

					var txt = ths.html().replace(re, '<span data-code-ip-type="'+value+'" class="address '+cl+'">'+text+'</span>');
					$(ths).html(txt);
					
					var tool = $(ths).parentsUntil('.container').find('.sidebar *[data-ip-type="'+value+'"]');
					tool.show();
				}
			});
			$('.address').css('background', 'red');
		}
	});


	$('*[data-ip-current]').each(function(){
		var type = $(this).parents('.ip-table').data('ip-type');
		if(localStorage.getItem(type)) {
			$(this).html(localStorage.getItem(type));
		} else {
			
		}
		
	});

	//add click functions
	$('.ip-table .edit').click(function(){
		$(this).parent().toggle().parents('.ip-table').find('.edit-ip').toggle();
		return false;
	});

	//add click functions
	$('.ip-table .save').click(function(){
		$(this).parent().toggle().parents('.ip-table').find('.current-ip').toggle();
		var type = $(this).parents('.ip-table').data('ip-type');
		localStorage.setItem(type, $(this).parent().find('input').val());

		console.log(localStorage.getItem(type));
		return false;
	});

	//add keyup function
	$('*[data-ip-input]').keyup(function() {
		var cl= $(this).data('ip-input');
		var vl = $(this).val();
		$('span.'+cl).html(vl);
		// $.cookies.set('clg_clone_private_ip', $(this).val());
	});







/* ----------------------------------------------------------------
	CLIPBOARD
	
---------------------------------------------------------------- */
	// zeroClipboard 
		
	//set path
	// ZeroClipboard.setDefaults( { moviePath: 'includes/js/plugins/ZeroClipboard.swf' } );

	
/* ----------------------------------------------------------------
	TOOLTIPS
	
---------------------------------------------------------------- */
	// Tooltips
	
 //    $(function() {
	// 	$( document ).tooltip({
	// 		position: {
	// 			my: "center bottom-20",
	// 			at: "center top",
	// 			using: function( position, feedback ) {
	// 				$( this ).css( position );
	// 				$( "<div>" )
	// 				.addClass( "arrow" )
	// 				.addClass( feedback.vertical )
	// 				.addClass( feedback.horizontal )
	// 				.appendTo( this );
	// 			}
	// 		}
	// 	});
	// });







    //IP TOOL
    //toggle the widget body
    $('.widget .panel-heading .close').click(function(){
    	$(this).parent().parent().find('.widgetSection').toggle();
    });



/* ----------------------------------------------------------------
	STICKY NAV WITH WAYPOINTS
	//using the jquery waypoints plugin

---------------------------------------------------------------- */

    $('#waypoint-header').waypoint('sticky', {
    	wrapper: '<div class="sticky-wrapper" />',
    	stuckClass: 'stuck',
    	offset:-200,
    	handler: function(direction){
    		$('.nav-index-wrapper').hide();
    	}
    });


	$('.chapter-container').waypoint( function(direction) {
	  var $active = $(this);

	  /* The waypoint is triggered at the top of each list item representing a dial section. When triggering in the down direction we want to use the dial section the waypoint is attached to. But in the up direction we want to use the previous dial section. */
	  if (direction === "up") {
	    $active = $active.prev();
	  }

	  /* If we triggered in the up direction and the result from 'prev' came back with an empty set of elements, it means we were on the first element in the list, and we should just use the original element. */
	  if (!$active.length) {
	    // $active = $(this);
	    // $('.currentChapter').html();
	  }

	  $('.currentChapter a').html($active.find('.chapterTitle').data('title'));
	  $('.nav-thing li a').each(function(){
	  	if( $(this).text() === $active.find('.chapterTitle').data('title') ) {
	  		$('.nav-thing li a').removeClass('completed');
	  		$(this).toggleClass('completed');
	  	}
	  });

	}, {
	  // context: 'body' // Make the scroll context the nearest ul.
	});

				
});

