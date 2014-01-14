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
	
	// Modals
	
	$(function() {
		$('#dialog-feedback').dialog({
			autoOpen: false,
			modal: true,
			draggable: false,
			width: 550,
			closeText: "",
			closeOnEscape: true,
		    create: function(event, ui) { 
				$('span.ui-button-icon-primary').remove();

				var widget = $(this).dialog('widget');
				$('.ui-dialog-titlebar-close span', widget).addClass('glyphicon glyphicon-remove dialog-close');
			}
		});
	
	    $('a.dialog-f').click(function() {
	      $('#dialog-feedback').dialog('open');
	    });
		
	});
	
	$(function() {
		$('#dialog-comingsoon').dialog({
			autoOpen: false,
			modal: true,
			draggable: false,
			width: 550,
			closeText: "",
			closeOnEscape: true,
		    create: function(event, ui) { 
				$('span.ui-button-icon-primary').remove();

				var widget = $(this).dialog('widget');
				$('.ui-dialog-titlebar-close span', widget).addClass('glyphicon glyphicon-remove dialog-close');
			}
		});
	
	    $('a.dialog-c').click(function() {
	      $('#dialog-comingsoon').dialog('open');
	    });
		
	});
	
	
	$(function() {
		var url = $('#video-quickstart').attr('src').replace('autoplay=0', 'autoplay=1');

		$('#dialog-video').dialog({
			autoOpen: false,
			modal: true,
			draggable: false,
			width: 740,
			closeText: "",
			closeOnEscape: true,
		    close: function() {
				$('#video-quickstart').attr('src', '');
		    },
		    open: function() {
				$('#video-quickstart').attr('src', url);
		    },
		    create: function(event, ui) { 
				$('span.ui-button-icon-primary').remove();

				var widget = $(this).dialog('widget');
				$('.ui-dialog-titlebar-close span', widget).addClass('glyphicon glyphicon-remove dialog-close');
			}
		});
	
	    $('a.dialog-v').click(function() {
	      $('#dialog-video').dialog('open');
	    });
		
	});
	
	// Scroll to elements on homepage

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
	
	// Validate forms
	
	$(function() {
		$("#feedbackForm").validate({
			rules: {
				feedbackWhat: "required",
				feedbackHow: "required"
			},
			submitHandler: function(form) {
				$.ajax({
					type: "POST",
					url: "feedback.php",
					data: $('#feedbackForm').serialize(),
					timeout: 3000,
					success: function() {alert('Thank you. Your feedback has been received.');},
					error: function() {alert('Something went wrong. Please try again.');}
				});
				return false;
			}
		});
	});
	
	$(function() {
		$("#csForm").validate({
			rules: {
				csEmail: "required"
			},
			messages: {
				csEmail: "Required"
			},
			submitHandler: function(form) {
				$.ajax({
					type: "POST",
					url: "idea.php",
					data: $('#csForm').serialize(),
					timeout: 3000,
					success: function() {alert('Thank you. Your feedback has been received.');},
					error: function() {alert('Something went wrong. Please try again.');}
				});
				return false;
			}
		});
	});	

});