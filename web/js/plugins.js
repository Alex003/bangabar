// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// Place any jQuery/helper plugins in here.

jQuery(function($) {
	"use strict";

	$.fn.increment = function() {
		$(this).each(function(){
			var that = $(this);
			var input = that.find('input.quantity');

			that.find('.inc, .dec').on('click', function(e){
				e.preventDefault();

				var current = parseInt(input.val());
				if($(this).hasClass('inc')){
					input.val(current+1);
				} else if($(this).hasClass('dec')) {
					if(current > 0) {
						input.val(current-1);
					}
				}
				$('body').trigger('changeVal');
			});
		});
	};

	$.fn.popup = function() {
		var $wrapper = $('.popup-wrapper');

		$(this).each(function() {
			var $that = $(this);

			$that.find('.close-popup' ).on('click', function(e){
				e.preventDefault();
				$wrapper.fadeOut();
			});


		});
	}

});


