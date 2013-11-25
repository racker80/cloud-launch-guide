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
			width: 400,
			closeOnEscape: true,
		    close: function() {
				$('#video-quickstart').attr('src', '');
		    },
		    open: function() {
				$('#video-quickstart').attr('src', url);
		    }
		});
	
	    $('.dialog-rs').click(function() {
	      $('#dialog').dialog( "open" );
	    });
	});

});