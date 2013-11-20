


// the semi-colon before function invocation is a safety net against concatenated
// scripts and/or other plugins which may not be closed properly.
;(function ( $, window, document, undefined ) {

		// undefined is used here as the undefined global variable in ECMAScript 3 is
		// mutable (ie. it can be changed by someone else). undefined isn't really being
		// passed in so we can ensure the value of it is truly undefined. In ES5, undefined
		// can no longer be modified.

		// window and document are passed through as local variable rather than global
		// as this (slightly) quickens the resolution process and can be more efficiently
		// minified (especially when both are regularly referenced in your plugin).

		// Create the defaults once
		var pluginName = "clgPlugin",
				defaults = {
				navState: "close",
				connections: [],
				showIPtoolFooter: true,
				navWrapper: $('.nav-drawer-container'),
				expert: function(){
					return localStorage.getItem('expertChecked')
				},
				expertBtn: $('*[data-toggle-expert]'),
				singleUrl: function(){
					return $('.allStepsOn').attr('href');
				} 
		};

		// The actual plugin constructor
		// function Plugin ( element, options ) {
		function Plugin ( element, options ) {
				// this.element = element;
				// jQuery has an extend method which merges the contents of two or
				// more objects, storing the result in the first object. The first object
				// is generally empty as we don't want to alter the default options for
				// future instances of the plugin
				this.settings = $.extend( {}, defaults, options );
				this._defaults = defaults;
				this._name = pluginName;
				this.init();
		}

		Plugin.prototype = {
				init: function () {
						// Place initialization logic here
						// You already have access to the DOM element and
						// the options via the instance, e.g. this.element
						// and this.settings
						// you can add more functions like the one below and
						// call them like so: this.yourOtherFunction(this.element, this.settings).
						var ths = this;
						var settings = this.settings;
						console.log("xD");

						$('*[data-toggle-nav]').click(function(){
							ths.showNav();
						});


						/* ----------------------------------------------------------------
						EXPRT BUTTON
						---------------------------------------------------------------- */
						this.settings.expertBtn.click(function(){
							
							if(ths.settings.expert() === 'yes') {
								localStorage.setItem('expertChecked', 'no');
							} else {
								localStorage.setItem('expertChecked', 'yes');
							}
							ths.toggleExpert();

							// $.waypoints('refresh');

						});
						ths.toggleExpert();


						/* ----------------------------------------------------------------
						STICKY NAV WITH WAYPOINTS
						//using the jquery waypoints plugin
						---------------------------------------------------------------- */
						$('#waypoint-header').waypoint('sticky', {
							wrapper: '<div class="sticky-wrapper" />',
							stuckClass: 'stuck',
							handler: function(direction){
								$('.nav-index-wrapper').hide();
							}
						});
						$('.chapter-container').waypoint( function(direction){
							var $active = $(this);
							var singleUrl = ths.settings.singleUrl();

							/* The waypoint is triggered at the top of each list item representing a dial section. When triggering in the down direction we want to use the dial section the waypoint is attached to. But in the up direction we want to use the previous dial section. */
							if (direction === "up") {
								$active = $active.prev();
							}

							/* If we triggered in the up direction and the result from 'prev' came back with an empty set of elements, it means we were on the first element in the list, and we should just use the original element. */
							if (!$active.length) {
						    // $active = $(this);
						    // $('.currentChapter').html();
							}

							// $('.currentChapter a').html($active.find('.chapterTitle').data('title'));
							$('li.currentChapter em').html($active.find('.chapterTitle').data('title'));

							$('.allStepsOn').attr('href',  singleUrl + '/' + $active.find('.chapterTitle').data('slug'));
							$('.nav-thing li a').each(function(){
								if( $(this).text() === $active.find('.chapterTitle').data('title') ) {
									$('.nav-thing li a').removeClass('completed');
									$(this).toggleClass('completed');
								}
							});


						}, {} );

				},
				yourOtherFunction: function () {
						// some logic
				},
				/* ----------------------------------------------------------------
				NAVIGATION
				---------------------------------------------------------------- */
				showNav: function() {
					var wrapper = this.settings.navWrapper;
					var navState = this.settings.navState;
					wrapper.slideToggle('fast', function(){
						if (wrapper.is(':visible')) {
							navState = 'open';
						} else { 
							navState = 'close';
						}		
					});
					return navState;
				},
				toggleExpert: function() {
					var expertBtn = this.settings.expertBtn;
					if (this.settings.expert() === 'yes') {
						// $(window).scrollTop(0);
						$('.page-content-full').hide();
						$('.actionOverview').removeClass('hide');
						// doSource(connections)
						expertBtn.addClass('btn-warning');
						expertBtn.find('.glyphicon').removeClass('glyphicon-save').addClass('glyphicon-saved');

					} else {
						$('.page-content-full').show();
						$('.actionOverview').addClass('hide');
						expertBtn.removeClass('btn-warning');
						expertBtn.find('.glyphicon').removeClass('glyphicon-saved').addClass('glyphicon-save');
					}

					$('body').trigger('expertToggle');

					return this.settings.expert();

				},
				
		};

		// A really lightweight plugin wrapper around the constructor,
		// preventing against multiple instantiations
		$.fn[ pluginName ] = function ( options ) {
				return this.each(function() {
						if ( !$.data( this, "plugin_" + pluginName ) ) {
								$.data( this, "plugin_" + pluginName, new Plugin( this, options ) );
						}
				});
		};

})( jQuery, window, document );






$(document).ready(function() {

	$('body').clgPlugin();

		var types = [];
		var preWithCode = [];
		var connections = [];

;(function () {
		//create the copy button
		var preGroup = $('pre');

		preGroup.each(function(){
			var ths = $(this).wrap('<div class="pre-wrapper"></div>');
			if(ths.hasClass('terminal')) {
				var copybtn = $('<button class="btn btn-sm btn-default copy-button" >Copy</button>').attr('data-clipboard-text', ths.text()).insertAfter(ths);
			}
		});


		var clip = new ZeroClipboard( $(".copy-button"), {
		  moviePath: "/includes/bower_components/zeroclipboard/ZeroClipboard.swf"
		});

		clip.on( 'load', function(client) {
		  // alert( "movie is loaded" );
		} );
		clip.on( 'complete', function(client, args) {
			$(this).parents('.pre-wrapper').addClass('copied');
		  	console.log("Copied text to clipboard: " + args.text );
		} );




		preGroup.each(function(index, value){
			var ths = $(this);
			var copybtn = ths.parents('.pre-wrapper').find('.copy-button');

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
						'<input type="text" class="text" id="uniqueID"> <a href="#" class="save">save</a>'+
						'</div>'+
						'</div>');
					template.find('h5').html(value.split('.').join(' '));
					$(ths).parentsUntil('.container').find('.sidebar .ip-panel .widgetSection').append(template.show());
					preWithCode.push(ths);
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

					var htm = ths.html();
					var str = htm.replace(re, '<span id="plumb-target-'+indexID+'" class="plumb_target"></span><span id="code-ip-target-'+indexID+'" data-code-ip-type="'+value+'" class="address '+cl+'">'+text+'</span>')
					$(ths).html(str);

					if(copybtn) {
						//adjust the copy button!  yea!
						copybtn.attr('data-clipboard-text', ths.text().replace(re, text) );
					}


					var source = $(ths).parentsUntil('.container').find('.sidebar *[data-ip-type="'+value+'"]')
					.attr('data-target', '#plumb-target-'+indexID).show();

					var target = $('span#plumb-target-'+indexID);

							connections.push({
								'source': source,
								'target': target
							});
					}

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

		});



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

})();




;(function() {
	var common = {
			connector : [ "Bezier", { curviness: 50 } ],
			anchors : [ "RightMiddle", "LeftMiddle" ],
			paintStyle : {
				lineWidth:2,
				strokeStyle: 'rgba(200,0,0,100)',
				"dashstyle":"2 4"
			},
			endpoint:[ "Dot", { radius:3 } ],
			endpointStyle : { fillStyle : "rgba(200,0,0,100)" },
		}

	function drawConnection(source, target) {
		if(jsPlumb.isSource(source) && source.is(":visible")) {
			jsPlumb.connect({
				source:source, 
				target:target, 
				container:source.parents('.row'),
				detachable:false,
				endpointsOnTop:false, 
			}, common);		

		}
	}
	
	$.each(connections, function(index, value){
		var target = value.target;
		var source = value.source;

		target.offset({
			left: target.parent().offset().left
		});

		jsPlumb.makeSource(source, {
			isSource:true,
			dragOptions:null,
			anchor: "RightMiddle",
			maxConnections:1,
			endpoint:[ "Dot", { radius:3 } ],
			uniqueEndpoint:true,
			paintStyle : { fillStyle : "rgba(200,0,0,100)" },
		}, common);

		drawConnection(source, target);

		$(source).find('input').bind('click', function(){
			$(this).focus();
		});

	});



	$('.page-content-full .page-content').each(function(){
		
				
		// var ths = $(this);
		// var	container = ths.parent();

		// var row = ths.find('.row').clone(true);
		// var pageContent = row.find('.page-content');
		// var content = {
		// 	title: pageContent.find(' h4').clone(true),
		// 	pre: pageContent.find('pre').parent().clone(true),
		// }

		
		// pageContent.empty().append(content.title);

		// $.each(content.pre, function(){
		// 	pageContent.append(this);
		// });


		// // container.find('.chapter-code-wrapper').append(row);
		// container.append(row);

		// row.wrap('<div class="page-content-code container"></div>');

		// ths.remove();

		// console.log(container)

	})



	$('body').on('expertToggle', function(event){

		$.each(connections, function(index, value){
			var target = value.target;
			var source = value.source;

			target.offset({
				left: target.parent().offset().left
			});

			drawConnection(source, target);

		});



	});

})();




Socialite.load();


});




// 	// toggle menu and state handling

// 	var navState = 'close';



// /* ----------------------------------------------------------------
// 	NAVIGATION
	
// ---------------------------------------------------------------- */
// 	showNav = function() {
// 		var wrapper = $('.nav-drawer-container');
// 		wrapper.slideToggle('fast', function(){
// 			if (wrapper.is(':visible')) {
// 				navState = 'open';
// 			} else { 
// 				navState = 'close';
// 			}		
// 		});
// 	}

// 	$('*[data-toggle-nav]').click(function(){
// 		showNav();
// 	});




// /* ----------------------------------------------------------------
// 	EXPERT MODE
	
// ---------------------------------------------------------------- */
// var expertBtn = $('*[data-toggle-expert]');

// 	var toggleExpert = function() {
// 		var expert = localStorage.getItem('expertChecked');
// 		if (expert === 'yes') {
// 			// $(window).scrollTop(0);
// 			$('.page-content-full').hide();
// 			$('.actionOverview').removeClass('hide');
// 			doSource(connections)
// 			expertBtn.addClass('btn-warning');
// 			expertBtn.find('.glyphicon').removeClass('glyphicon-save').addClass('glyphicon-saved');

// 		} else {
// 			$('.page-content-full').show();
// 			$('.actionOverview').addClass('hide');
// 			expertBtn.removeClass('btn-warning');
// 			expertBtn.find('.glyphicon').removeClass('glyphicon-saved').addClass('glyphicon-save');
// 		}
// 		// jsPlumb.setSuspendDrawing(true);

// 		// jsPlumb.select().each(function(e){
// 		// 	console.log($(e.source).is(':hidden'))
// 		// 	if($(e.source).is(':hidden')){
// 		// 		jsPlumb.detachAllConnections(e.source);
// 		// 	}
// 		// });
// 		// jsPlumb.setSuspendDrawing(false, true);


// 	}
	
// 	expertBtn.click(function(){
// 		var expert = localStorage.getItem('expertChecked');
// 		if(expert === 'yes') {
// 			expert = localStorage.setItem('expertChecked', 'no');
// 		} else {
// 			expert = localStorage.setItem('expertChecked', 'yes');
// 		}
// 		toggleExpert();

// 		$.waypoints('refresh');

// 	});






// /* ----------------------------------------------------------------
// 	IP Tool
	
// ---------------------------------------------------------------- */
// 	// var types = ['your.master.public.ip.address', 'your.master.private.ip.address', 'your.clone.public.ip.address', 'your.clone.private.ip.address'];

// 	var types = [];

// 	var connections = [];



// 	function doSource(connections) {
// 		var common = {
// 			connector : [ "Bezier", { curviness: 50 } ],
// 			Anchors : [ "RightMiddle", "LeftMiddle" ],
// 			paintStyle : {
// 				lineWidth:2,
// 				strokeStyle: 'rgba(200,0,0,100)',
// 				"dashstyle":"2 4"
// 			},
// 			endpoint:[ "Dot", { radius:3 } ],
// 			endpointStyle : { fillStyle : "rgba(200,0,0,100)" },
// 		}

// 		$.each(connections, function(index, value){
// 			var target = value.target;
// 			var source = value.source;

// 			target.offset({
// 				left: target.parent().offset().left
// 			});

// 			jsPlumb.makeSource(source, {
// 				isSource:true,
// 				dragOptions:null,
// 				anchor: "RightMiddle",
// 				maxConnections:1,
// 				endpoint:[ "Dot", { radius:3 } ],
// 				uniqueEndpoint:true,
// 				paintStyle : { fillStyle : "rgba(200,0,0,100)" },
// 			});

// 			// var endpointOptions = { 
// 			// 	isTarget:true, 
// 			// 	maxConnections:5,
// 			// 	endpoint:"Rectangle", 
// 			// 	ConnectionsDetachable:false,
// 			// 	paintStyle:{ fillStyle:"gray" } 
// 			// };

// 			// jsPlumb.makeTarget(target, endpointOptions);

// 			if(jsPlumb.isSource(source) && source.is(":visible")) {

// 			}

// 				jsPlumb.connect({
// 					source:source, 
// 					target:target, 
// 					container:source.parents('.row'),
// 					detachable:false
// 				}, common);			

// 		});

// 	}





// 	function plumbConnect() {

// 	}



// 				$('pre').each(function(index, value){
// 				var ths = $(this).wrap('<div class="pre-wrapper"></div>');
// 				if(ths.hasClass('terminal')) {
// 					var copybtn = $('<button class="btn btn-sm btn-default copy-button" >Copy</button>').attr('data-clipboard-text', ths.text()).insertAfter(ths);
// 				}
// 				var	txt = ths.html();
// 				var	n = ths.html().match(/(your\.)(.*)(\.)(address)/gi);
// 				var ID = index;

// 				if(n) {
// 					$.each(n, function(index, value){
// 						if($.inArray(value, types) === -1) {
// 							types.push(value);
// 						}
// 						var template = $('<div class="ip-table" data-ip-type="'+value+'">'+
// 							'<h5></h5>'+
// 							'<div class="current-ip">'+
// 							'<span data-ip-current="" class="ip-current"></span>'+
// 							'<a href="#" class="edit">edit</a>'+
// 							'</div>'+
// 							'<div class="edit-ip">'+
// 							'<input type="text" class="text"> <a href="#" class="save">save</a>'+
// 							'</div>'+
// 							'</div>');
// 						template.find('h5').html(value.split('.').join(' '));
// 						$(ths).parentsUntil('.container').find('.sidebar .ip-panel .widgetSection').append(template.show());
// 					});


// 					$.each(n, function(index, value){
// 						var re = new RegExp(value, 'g');

// 						if( ths.html().match(re) ) {
// 							var cl = value.replace(/\./g, '-');
							
// 							if(localStorage.getItem(value)) {
// 								var text = localStorage.getItem(value);

// 								//if a value exists, we don't need the footer
// 								$('.ip-panel .panel-footer').hide();

// 							} else {
// 								var text = value;
// 							}

// 							var indexID = ID + '-' + (ID + (index));

// 							var htm = ths.html();
// 							var str = htm.replace(re, '<span id="plumb-target-'+indexID+'" class="plumb_target"></span><span id="code-ip-target-'+indexID+'" data-code-ip-type="'+value+'" class="address '+cl+'">'+text+'</span>')
// 							$(ths).html(str);

// 							if(copybtn) {
// 								//adjust the copy button!  yea!
// 								copybtn.attr('data-clipboard-text', ths.text().replace(re, text) );
// 							}


// 							var source = $(ths).parentsUntil('.container').find('.sidebar *[data-ip-type="'+value+'"]')
// 								.attr('data-target', '#plumb-target-'+indexID).show();

// 							var target = $('span#plumb-target-'+indexID);



// 							connections.push({
// 								'source': source,
// 								'target': target
// 							});





// 						}
// 					});


					
// 				}

// 			});
	






// 	var showIPtoolFooter = function(){
// 		var i = 0;
// 		$.each(types, function(index, value){
// 			if(localStorage.getItem(value)) {
// 				i++;
// 			}
// 		});
// 		if(i > 0) {
// 			$('.ip-panel .panel-footer').fadeOut();
// 		} else {
// 			$('.ip-panel .panel-footer').fadeIn();
// 		}

// 	}
// 	showIPtoolFooter();

// 	var setCurrentIP = function(target, type) {
// 		if(localStorage.getItem(type)) {
// 			if(target.is('input')) {
// 				target.val(localStorage.getItem(type));
// 			} else {
// 				target.html(localStorage.getItem(type));
// 			}
// 		} else {

// 		}
// 		return target;
// 	}

// 	var currentIPkeyUp = function(type, value) {
// 			$('.ip-panel *[data-ip-type="'+type+'"] .edit-ip input.text').val(value);
// 			$('.ip-panel *[data-ip-type="'+type+'"] .ip-current').html(value);
// 			$('span[data-code-ip-type="'+type+'"]').html(value);
// 			localStorage.setItem(type, value)
// 		}


// 	$('.ip-panel *[data-ip-type]').each(function(){
// 		var ths = $(this);
// 		var target = $(ths.data('target'));
// 		var type = ths.data('ip-type');

// 		var currentIP = setCurrentIP(ths.find('.ip-current'), type);

// 		var ipInput = setCurrentIP(ths.find('.edit-ip input.text'), type)
// 						.keyup(function(){
// 							currentIPkeyUp(type, $(this).val());
// 						});

// 	})



// 	//add click functions
// 	$('.ip-table .edit').click(function(){
// 		$('.ip-table .edit-ip').hide();
// 		$('.ip-table .current-ip').show();

// 		$(this).parent().hide().parents('.ip-table').find('.edit-ip').show();
// 		return false;
// 	});

// 	//add click functions
// 	$('.ip-table .save').click(function(){
// 		$('.ip-table .edit-ip').hide();
// 		$(this).parents('.ip-table').find('.current-ip').show();

// 		showIPtoolFooter();

// 		return false;
// 	});




// var clip = new ZeroClipboard( $(".copy-button"), {
//   moviePath: "/includes/bower_components/zeroclipboard/ZeroClipboard.swf"
// } );

// clip.on( 'load', function(client) {
//   // alert( "movie is loaded" );
// } );
// clip.on( 'complete', function(client, args) {
// 	$(this).parents('.pre-wrapper').addClass('copied');
//   console.log("Copied text to clipboard: " + args.text );
// } );

// // toggleExpert();



// /* ----------------------------------------------------------------
// 	CLIPBOARD
	
// ---------------------------------------------------------------- */
// 	// zeroClipboard 
		
// 	//set path
// 	// ZeroClipboard.setDefaults( { moviePath: 'includes/bower_components/zeroclipboard/ZeroClipboard.swf' } );
// 	// $.each($(".copy-button"), function(){
// 	// 	var clip = new ZeroClipboard( $(this), {
// 	// 		moviePath: "includes/bower_components/zeroclipboard/ZeroClipboard.swf"
// 	// 	} );

// 	// // var clip = new ZeroClipboard( $(".copy-button") );
// 	// 	clip.on( 'load', function(client) {
// 	// 		alert( "movie is loaded" );
// 	// 	} );
	
// 	// })
	

// /* ----------------------------------------------------------------
// 	TOOLTIPS
	
// ---------------------------------------------------------------- */
// 	// Tooltips
	
//  //    $(function() {
// 	// 	$( document ).tooltip({
// 	// 		position: {
// 	// 			my: "center bottom-20",
// 	// 			at: "center top",
// 	// 			using: function( position, feedback ) {
// 	// 				$( this ).css( position );
// 	// 				$( "<div>" )
// 	// 				.addClass( "arrow" )
// 	// 				.addClass( feedback.vertical )
// 	// 				.addClass( feedback.horizontal )
// 	// 				.appendTo( this );
// 	// 			}
// 	// 		}
// 	// 	});
// 	// });







//     //IP TOOL
//     //toggle the widget body
//     $('.widget .panel-heading .close').click(function(){
//     	$(this).parent().parent().find('.widgetSection').toggle();
//     	var con = $(this).parents('.widget').find('.ip-table').first();
//     });

//     $('#banner-content .page-header-options').width($(this).find('.action-options').outerWidth() + 10).css('margin', '0 auto');

// /* ----------------------------------------------------------------
// 	STICKY NAV WITH WAYPOINTS
// 	//using the jquery waypoints plugin

// ---------------------------------------------------------------- */

//     $('#waypoint-header').waypoint('sticky', {
//     	wrapper: '<div class="sticky-wrapper" />',
//     	stuckClass: 'stuck',
//     	offset:-200,
//     	handler: function(direction){
//     		$('.nav-index-wrapper').hide();
//     	}
//     });

// 	var singleUrl = $('.allStepsOn').attr('href');
	
// 	$('.chapter-container').waypoint( function(direction) {
// 	  var $active = $(this);

// 	  /* The waypoint is triggered at the top of each list item representing a dial section. When triggering in the down direction we want to use the dial section the waypoint is attached to. But in the up direction we want to use the previous dial section. */
// 	  if (direction === "up") {
// 	    $active = $active.prev();
// 	  }

// 	  /* If we triggered in the up direction and the result from 'prev' came back with an empty set of elements, it means we were on the first element in the list, and we should just use the original element. */
// 	  if (!$active.length) {
// 	    // $active = $(this);
// 	    // $('.currentChapter').html();
// 	  }

// 	  $('.currentChapter a').html($active.find('.chapterTitle').data('title'));
	  
// 	  $('.allStepsOn').attr('href',  singleUrl + '/' + $active.find('.chapterTitle').data('slug'));
// 	  $('.nav-thing li a').each(function(){
// 	  	if( $(this).text() === $active.find('.chapterTitle').data('title') ) {
// 	  		$('.nav-thing li a').removeClass('completed');
// 	  		$(this).toggleClass('completed');
// 	  	}
// 	  });

// 	}, {
// 	  // context: 'body' // Make the scroll context the nearest ul.
// 	});





				
// 					jsPlumb.ready(function() {
// 						doSource(connections);
// 						toggleExpert();
// 					});	









// var plumbInstances = {};
// function doConnections(){ 
// 	$.each(connections, function(index, value){

// 		value.pre.offset({
// 			left: value.pre.parent().offset().left
// 		})

// 		// var firstInstance = jsPlumb.getInstance();
// 		// firstInstance.importDefaults({
// 		// 	Connector : [ "Bezier", { curviness: 50 } ],
// 		// 	Anchors : [ "RightMiddle", "LeftMiddle" ],
// 		// 	PaintStyle : {
// 		// 		lineWidth:2,
// 		// 		strokeStyle: 'rgba(200,0,0,100)',
// 		// 		"dashstyle":"2 4"
// 		// 	},
// 		// 	Endpoint:[ "Dot", { radius:3 } ],
// 		// 	EndpointStyle : { fillStyle : "rgba(200,0,0,100)" },
// 		// });

// 		// firstInstance.connect({
// 		// 	source:value.tool, 
// 		// 	target:value.pre, 
// 		// 	container:value.tool.parents('.row')
// 		// });

// 		// var firstInstance = jsPlumb.getInstance();
// 		// var importDefaults({
// 		// 	Connector : [ "Bezier", { curviness: 50 } ],
// 		// 	Anchors : [ "RightMiddle", "LeftMiddle" ],
// 		// 	PaintStyle : {
// 		// 		lineWidth:2,
// 		// 		strokeStyle: 'rgba(200,0,0,100)',
// 		// 		"dashstyle":"2 4"
// 		// 	},
// 		// 	Endpoint:[ "Dot", { radius:3 } ],
// 		// 	EndpointStyle : { fillStyle : "rgba(200,0,0,100)" },
// 		// });

// 		// jsPlumb.connect({
// 		// 	source:value.tool, 
// 		// 	target:value.pre, 
// 		// 	container:value.tool.parents('.row')
// 		// });

// 	});
// }

// function makeConnection() {
// 	jsPlumb.connect({
//     source:"element1", 
//     target:"element2",
//     Connector : [ "Bezier", { curviness: 50 } ],
// 	Anchors : [ "RightMiddle", "LeftMiddle" ],
// 	PaintStyle : {
// 		lineWidth:2,
// 		strokeStyle: 'rgba(200,0,0,100)',
// 		"dashstyle":"2 4"
// 	},
// 	Endpoint:[ "Dot", { radius:3 } ],
// 	EndpointStyle : { fillStyle : "rgba(200,0,0,100)" },
// 	});
// }

// function doConnection(source, target){ 

// 		target.offset({
// 			left: target.parent().offset().left
// 		})

// 		// var firstInstance = jsPlumb.getInstance();
// 		// firstInstance.importDefaults({
// 		// 	Connector : [ "Bezier", { curviness: 50 } ],
// 		// 	Anchors : [ "RightMiddle", "LeftMiddle" ],
// 		// 	PaintStyle : {
// 		// 		lineWidth:2,
// 		// 		strokeStyle: 'rgba(200,0,0,100)',
// 		// 		"dashstyle":"2 4"
// 		// 	},
// 		// 	Endpoint:[ "Dot", { radius:3 } ],
// 		// 	EndpointStyle : { fillStyle : "rgba(200,0,0,100)" },
// 		// });


// 		// firstInstance.connect({
// 		// 	source:source, 
// 		// 	target:target, 
// 		// 	container:source.parents('.row')
// 		// });


// 		// var firstInstance = jsPlumb.getInstance();
// 		// jsPlumb.importDefaults = {
// 		// 	Connector : [ "Bezier", { curviness: 50 } ],
// 		// 	Anchors : [ "RightMiddle", "LeftMiddle" ],
// 		// 	PaintStyle : {
// 		// 		lineWidth:2,
// 		// 		strokeStyle: 'rgba(200,0,0,100)',
// 		// 		"dashstyle":"2 4"
// 		// 	},
// 		// 	Endpoint:[ "Dot", { radius:3 } ],
// 		// 	EndpointStyle : { fillStyle : "rgba(200,0,0,100)" },
// 		// };

// 		var common = {
// 			connector : [ "Bezier", { curviness: 50 } ],
// 			anchors : [ "RightMiddle", "LeftMiddle" ],
// 			paintStyle : {
// 				lineWidth:2,
// 				strokeStyle: 'rgba(200,0,0,100)',
// 				"dashstyle":"2 4"
// 			},
// 			endpoint:[ "Dot", { radius:3 } ],
// 			endpointStyle : { fillStyle : "rgba(200,0,0,100)" },
// 		};

// 		jsPlumb.connect({
// 			source:source, 
// 			target:target, 
// 			container:source.parents('.row'),
			
// 		}, common);

// 		// jsPlumb.makeSource(source, {
// 		//     Connector : [ "Bezier", { curviness: 50 } ],
// 		// 	Anchors : [ "RightMiddle", "LeftMiddle" ],
// 		// 	PaintStyle : {
// 		// 		lineWidth:2,
// 		// 		strokeStyle: 'rgba(200,0,0,100)',
// 		// 		"dashstyle":"2 4"
// 		// 	},
// 		// 	Endpoint:[ "Dot", { radius:3 } ],
// 		// 	EndpointStyle : { fillStyle : "rgba(200,0,0,100)" },
// 		// });

// 		// jsPlumb.makeTarget(target, {
// 		// 	isTarget:true, 
// 		// 	uniqueEndpoint:true,
// 		// 	PaintStyle : {
// 		// 		lineWidth:2,
// 		// 		strokeStyle: 'rgba(200,0,0,100)',
// 		// 		"dashstyle":"2 4"
// 		// 	},
// 		// 	Endpoint:[ "Dot", { radius:3 } ],
// 		// 	EndpointStyle : { fillStyle : "rgba(200,0,0,100)" },
// 		// });

// 		// jsPlumb.connect({
// 		// 	source:source, 
// 		// 	target:target,
// 		// 	Connector : [ "Bezier", { curviness: 50 } ],
// 		// 	Anchors : [ "RightMiddle", "LeftMiddle" ],
// 		// 	PaintStyle : {
// 		// 		lineWidth:2,
// 		// 		strokeStyle: 'rgba(200,0,0,100)',
// 		// 		"dashstyle":"2 4"
// 		// 	},
// 		// 	Endpoint:[ "Dot", { radius:3 } ],
// 		// 	EndpointStyle : { fillStyle : "rgba(200,0,0,100)" },
// 		// 	container:source.parents('.row')
// 		// })

// }

