$(document).ready(function() {

	// Tooltips

	$(function() {
		$('.tooltip-rs').tooltip({
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
	
	$(function() {
		var url = $('#video-quickstart').attr('src').replace('autoplay=0', 'autoplay=1');

		$('#dialog-video').dialog({
			autoOpen: false,
			modal: true,
			draggable: false,
			position: ['center','middle'],
			width: 770,
			closeOnEscape: true,
		    close: function() {
				$('#video-quickstart').attr('src', '');
		    },
		    open: function() {
				$('#video-quickstart').attr('src', url);
		    },
	        create: function (event, ui) {
	            $(".ui-dialog-titlebar").html('<a href="#" class="glyphicon glyphicon-remove dialog-close"></a>');
	        },
		});
	
	    $('a.dialog-rs').click(function() {
	      $('#dialog-video').dialog( "open" );
	    });
		
	    $('a.dialog-close').click(function() {
	      $('#dialog-video').dialog( "close" );
	    });
		
	});
	
	// scroll to elements on homepage

	$(function() {

		$('#banner-wrapper .unbox').click(function() {
			$('html, body').animate({
				scrollTop: $('#content-container .unbox').offset().top -10
			}, 500);
			return false;
		});
		
		$('#banner-wrapper .discover').click(function() {
			$('html, body').animate({
				scrollTop: $('#content-container .discover').offset().top -10
			}, 500);
			return false;
		});
		
		
		$('#banner-wrapper .build').click(function() {
			$('html, body').animate({
				scrollTop: $('#content-container .build').offset().top -10
			}, 500);
			return false;
		});
		
	});

});