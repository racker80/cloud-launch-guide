$(document).ready(function() {

	// toggle menu and state handling

	var nav = localStorage.getItem('navState');
    
	if (nav == 'open') {
		$('#nav-index-wrapper').show();
		$('#toggle-nav img').addClass('close');
	}
	
	$(function() {	
		$('#toggle-nav a').click(function() {

			$('#nav-index-wrapper').slideToggle('fast', function(){
				if ($('#nav-index-wrapper').is(':visible')) {
					$('#toggle-nav img').addClass('close');
					localStorage.setItem('navState','open');
				} else { 
					$('#toggle-nav img').removeClass('close');
					localStorage.removeItem('navState');
				}		
			});
				
			return false;
		});
	});
	
	// expert-mode state handling
	
	var expert = localStorage.getItem('expertChecked');
    
	if (expert == 'yes') {
		$('#myonoffswitch').prop('checked', true);
	} else {
		$('#myonoffswitch').prop('checked', false);
	}
	
	function checkExpert() {
		if ($('#myonoffswitch').is(':checked')) {
			localStorage.setItem('expertChecked','yes');
		} else { 
			localStorage.setItem('expertChecked','no');
		}		
	}
		
	$(function() {	
		$('#myonoffswitch').click(function() {
			checkExpert();
		});
		return false;
	});
	
	// scroll-to-fixed plugin
	
    // $('#header-breadcrumbs-wrapper').scrollToFixed();
    // $('##header-progress').scrollToFixed();
	
	
	
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
				
});
