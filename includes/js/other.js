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

		$('#dialog').dialog({
			autoOpen: false,
			modal: true,
			draggable: false,
			width: 700,
			closeOnEscape: true,
		    close: function() {
				$('#video-quickstart').attr('src', '');
		    },
		    open: function() {
				$('#video-quickstart').attr('src', url);
		    },
	        create: function (event, ui) {
	            $(".ui-dialog-titlebar").html('<a href="#" class="glyphicon glyphicon-remove-circle dialog-close"></a>');
	        },
		});
	
	    $('a.dialog-rs').click(function() {
	      $('#dialog').dialog( "open" );
	    });
		
	    $('a.dialog-close').click(function() {
	      $('#dialog').dialog( "close" );
	    });
		
		
	});

});