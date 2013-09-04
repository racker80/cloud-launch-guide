$(document).ready(function() {
	// toggle menu and state handling

	showNav = function() {
		$('#nav-index-wrapper').slideToggle('fast', function(){
			if ($('#nav-index-wrapper').is(':visible')) {
				$('#toggle-nav img').addClass('close');
				localStorage.setItem('navState','open');
			} else { 
				$('#toggle-nav img').removeClass('close');
				localStorage.removeItem('navState');
			}		
		});
	}

	navToggle = function() {
		var nav = localStorage.getItem('navState');
    
		if (nav == 'open') {
			$('#nav-index-wrapper').show();
			$('#toggle-nav img').addClass('close');
		}
	
		$(function() {	
			$('#toggle-nav a').click(function() {
				showNav();
					
				return false;
			});
		});
	}

	navToggle();


	var toggleExpert = function(expert) {
		var expert = localStorage.getItem('expertChecked');
		if (expert === 'yes') {
			$('.page-container').hide();
			$('.actionOverview').removeClass('hide');
		} else {
			$('.page-container').show();
			$('.actionOverview').addClass('hide');
		}
	}
	toggleExpert();
	
	function checkExpert() {
		if ($('#myonoffswitch').is(':checked')) {
			localStorage.setItem('expertChecked','yes');
			toggleExpert();
		} else { 
			localStorage.setItem('expertChecked','no');
			toggleExpert();
		}		
	}
	
	checkExpert();

		$('#myonoffswitch').click(function() {
			checkExpert();
			showNav();
			$.waypoints('refresh');
		});
	
	
	// zeroClipboard 
		
	//set path
	ZeroClipboard.setDefaults( { moviePath: 'includes/js/plugins/ZeroClipboard.swf' } );

	
	// Tooltips
	
    $(function() {
		$( document ).tooltip({
			position: {
				my: "center bottom-20",
				at: "center top",
				using: function( position, feedback ) {
					$( this ).css( position );
					$( "<div>" )
					.addClass( "arrow" )
					.addClass( feedback.vertical )
					.addClass( feedback.horizontal )
					.appendTo( this );
				}
			}
		});
	});







    //IP TOOL
    //toggle the widget body
    $('.widget .panel-heading .close').click(function(){
    	$(this).parent().parent().find('.widgetSection').toggle();
    });



    //STICKY NAV
    //using the jquery waypoints plugin

    $('#guide-navbar').waypoint('sticky', {
    	wrapper: '<div class="sticky-wrapper" />',
    	stuckClass: 'stuck'
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

	  $('.currentChapter').html($active.find('h2.chapterTitle').data('title'));
	  $('.nav-thing li a').each(function(){
	  	if( $(this).text() === $active.find('h2.chapterTitle').data('title') ) {
	  		$('.nav-thing li a').removeClass('completed');
	  		$(this).toggleClass('completed');
	  	}
	  });

	}, {
	  // context: 'body' // Make the scroll context the nearest ul.
	});

				
});

