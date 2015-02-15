/*
 * Inline Text Editing 1.3
 * April 26, 2010
 * Corey Hart @ http://www.codenothing.com
 */ 
jQuery(function( $ ){
	$('.inline-edit').inlineEdit({hover: 'hover'})
});

function checkform(){	
	var emailreceipt = document.getElementById("emailreceipt").value;
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   if(reg.test(emailreceipt) == false){
      alert('Invalid Email Address in one of the fields');
      return false;
   }
}
(function( $, undefined ){
	var i = -10;
	var templateid = $('#templateid').val();
	$.fn.inlineEdit = function( options ) {
		return this.each(function(){ 
			i++;
			
			// Settings and local cache
			var self = this, $main = $( self ), original,
			settings = $.extend({
					href: 'templates_ajax.php',
					requestType: 'POST',
					html: true,
					load: undefined,
					display: '.display',
					form: '.form',
					text: '.text',
					save: '.save',
					cancel: '.cancel',
					revert: '.revert',
					loadtxt: 'Loading...',
					hover: undefined,
					postVar: 'text',
					postData: {
						field: i,
						templateid: templateid
					},
					postFormat: undefined
				}, options || {}, $.metadata ? $main.metadata() : {} ),

				// Cache All Selectors
				$display = $main.find( settings.display ),
				$form = $main.find( settings.form ),
				$text = $form.find( settings.text ),
				$save = $form.find( settings.save ),
				$revert = $form.find( settings.revert ),
				$cancel = $form.find( settings.cancel );

			// Make sure the plugin only get initialized once
			if ( $.data( self, 'inline-edit' ) === true ) {
				return;
			}
			$.data( self, 'inline-edit', true );

			// Prevent sending form submission
			$form.bind( 'submit.inline-edit', function(){
				$save.trigger( 'click.inline-edit' );
				return false;
			});
	
			// Display Actions
			$display.bind( 'click.inline-edit', function(){
				$display.hide();
				$form.show();

				if ( settings.html ) {
					if ( original === undefined ) {
						original = $display.html();
					}

					$text.val( original ).focus();
				}
				else if ( original === undefined ) {
					original = $text.val();
				}

				return false;
			})
			.bind( 'mouseenter.inline-edit', function(){
				$display.addClass( settings.hover );
			})
			.bind( 'mouseleave.inline-edit', function(){
				$display.removeClass( settings.hover );
			});

			// Add revert handler
			$revert.bind( 'click.inline-edit', function(){
				$text.val( original || '' ).focus();
				return false;
			});

			// Cancel Actions
			$cancel.bind( 'click.inline-edit', function(){
				$form.hide();
				$display.show();

				// Remove hover action if stalled
				if ( $display.hasClass( settings.hover ) ) {
					$display.removeClass( settings.hover );
				}

				return false;
			});

			// Save Actions
			$save.bind( 'click.inline-edit', function( event ) {
				settings.postData[ settings.postVar ] = $text.val();
				$form.hide();
				$display.html( settings.loadtxt ).show();

				if ( $display.hasClass( settings.hover ) ) {
					$display.removeClass( settings.hover );
				}

				$.ajax({
					url: settings.href,
					type: settings.requestType,
					data: settings.postFormat ? 
						settings.postFormat.call( $main, event, { settings: settings, postData: settings.postData } ) :
						settings.postData,
					success: function( response ){
						original = undefined;

						if ( settings.load ) {
							settings.load.call( $display, event, { response: response, settings: settings } );
							return;
						}

						$display.html( response );
					}
				});

				return false;
			});
		});
	};

})( jQuery );