//@codekit-prepend "../bower_components/jquery/jquery.js"
//@codekit-prepend "../bower_components/bootstrap/js/dropdown.js"
//@codekit-prepend "../bower_components/zeroclipboard/ZeroClipboard.js"
//@codekit-prepend "../bower_components/jquery-waypoints/waypoints.js"
//@codekit-prepend "../bower_components/jquery-waypoints/shortcuts/sticky-elements/waypoints-sticky.js"
//@codekit-prepend "../bower_components/jsPlumb/dist/js/jquery.jsPlumb-1.5.2.js"




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
		jsPlumb.repaintEverything();

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




var plumbInstances = {};
function doConnections(){ 
	$.each(connections, function(index, value){

		value.pre.offset({
			left: value.pre.parent().offset().left
		})

		var firstInstance = jsPlumb.getInstance();
		firstInstance.importDefaults({
			Connector : [ "Bezier", { curviness: 50 } ],
			Anchors : [ "RightMiddle", "LeftMiddle" ],
			PaintStyle : {
				lineWidth:2,
				strokeStyle: 'rgba(200,0,0,100)',
				"dashstyle":"2 4"
			},
			Endpoint:[ "Dot", { radius:3 } ],
			EndpointStyle : { fillStyle : "rgba(200,0,0,100)" },
		});

		firstInstance.connect({
			source:value.tool, 
			target:value.pre, 
			container:value.tool.parents('.row')
		});
	});
}


/* ----------------------------------------------------------------
	IP Tool
	
---------------------------------------------------------------- */
	// var types = ['your.master.public.ip.address', 'your.master.private.ip.address', 'your.clone.public.ip.address', 'your.clone.private.ip.address'];

	var types = [];

	var connections = [];

	$('pre').each(function(index, value){
		var ths = $(this);
		var	txt = ths.html();
		var	n = ths.html().match(/(your\.)(.*)(\.)(address)/gi);
		var ID = index;

		if(n) {
			$.each(n, function(index, value){
				if($.inArray(value, types) === -1) {
					types.push(value);
				}
				var template = $('<div class="ip-table" data-ip-type="'+value+'">'+
					'<h5></h5>'+
					'<div class="current-ip">'+
					'<span data-ip-current="" class="ip-current"></span>'+
					'<a href="#" class="edit">edit</a>'+
					'</div>'+
					'<div class="edit-ip">'+
					'<input type="text" class="text" data-ip-input=""> <a href="#" class="save">save</a>'+
					'</div>'+
					'</div>');
				template.find('h5').html(value.split('.').join(' '));
				$(ths).parentsUntil('.container').find('.sidebar .ip-panel .widgetSection').append(template.show());
			});


			$.each(n, function(index, value){
				var re = new RegExp(value, 'g');

				if( ths.html().match(re) ) {
					var cl = value.replace(/\./g, '-');
					
					if(localStorage.getItem(value)) {
						var text = localStorage.getItem(value);

							//if a value exists, we don't need the footer
							$('.ip-panel .panel-footer').hide();

						} else {
							var text = value;
						}
						var indexID = ID + '-' + (ID + (index));

						if(index < 1) {
						$(ths).html(
							ths.text().replace(re, '<span id="plumb-target-'+indexID+'" class="plumb_target"></span><span id="code-ip-target-'+indexID+'" data-code-ip-type="'+value+'" class="address '+cl+'">'+text+'</span>')
							);


						connections.push({
							'pre': $('span#plumb-target-'+indexID),
							'tool': $(ths).parentsUntil('.container').find('.sidebar *[data-ip-type="'+value+'"]')
							.attr('data-target', '#code-ip-target-'+indexID).show()
						})
						}

					}
			});
			
			$('.address').css('background', 'red');
			jsPlumb.ready(function() {
				doConnections();

			});
			
		}


		
			

	});






	var showIPtoolFooter = function(){
		var i = 0;
		$.each(types, function(index, value){
			if(localStorage.getItem(value)) {
				i++;
			}
		});
		if(i > 0) {
			$('.ip-panel .panel-footer').fadeOut();
		} else {
			$('.ip-panel .panel-footer').fadeIn();
		}

	}
	showIPtoolFooter();

	var setCurrentIP = function(target, type) {
		if(localStorage.getItem(type)) {
			if(target.is('input')) {
				target.val(localStorage.getItem(type));
			} else {
				target.html(localStorage.getItem(type));
			}
		} else {

		}
		return target;
	}

	var currentIPkeyUp = function(type, value) {
			$('.ip-panel *[data-ip-type="'+type+'"] .edit-ip input.text').val(value);
			$('.ip-panel *[data-ip-type="'+type+'"] .ip-current').html(value);
			$('span[data-code-ip-type="'+type+'"]').html(value);
			localStorage.setItem(type, value)
		}


	$('.ip-panel *[data-ip-type]').each(function(){
		var ths = $(this);
		var target = $(ths.data('target'));
		var type = ths.data('ip-type');

		var currentIP = setCurrentIP(ths.find('.ip-current'), type);

		var ipInput = setCurrentIP(ths.find('.edit-ip input.text'), type)
						.keyup(function(){
							currentIPkeyUp(type, $(this).val());
						});

	})



	//add click functions
	$('.ip-table .edit').click(function(){
		$('.ip-table .edit-ip').hide();
		$('.ip-table .current-ip').show();

		$(this).parent().hide().parents('.ip-table').find('.edit-ip').show();
		return false;
	});

	//add click functions
	$('.ip-table .save').click(function(){
		$('.ip-table .edit-ip').hide();
		$(this).parents('.ip-table').find('.current-ip').show();

		showIPtoolFooter();

		return false;
	});




jsPlumb.ready(function() {
	
});



toggleExpert();



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
    	var con = $(this).parents('.widget').find('.ip-table').first();
    });

    $('#banner-content .page-header-options').width($(this).find('.action-options').outerWidth() + 10).css('margin', '0 auto');

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

	var singleUrl = $('.allStepsOn').attr('href');

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
	  
	  $('.allStepsOn').attr('href',  singleUrl + '/' + $active.find('.chapterTitle').data('slug'));
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

