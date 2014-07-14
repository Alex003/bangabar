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

            that.find('.inc, .dec').unbind('click.inc');
			that.find('.inc, .dec').bind('click.inc', function(e){
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

(function($) {
    $.fn.attachmentUpload = function(uploadUrl) {
        uploadUrl = uploadUrl || window.attachmentUploadUrl;
        var input = $(this);

        if(!input.is("input")) {
            throw Error("You can bind only text input!");
        }

        var fileInput = $("<input type='file' name='attachment'>");
        var formData = new FormData();

        fileInput[0].addEventListener("change", function (evt) {
            var i = 0, len = this.files.length, img, reader, file;

            for ( ; i < len; i++ ) {
                file = this.files[i];

                formData.append("file", file);

                $.ajax({
                    url: uploadUrl,
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (json) {
                        if(json.code == 0) {
                            input.val(json.file);
                            $(window).trigger('attachment-upload-success');
                        } else {
                            alert(json.error);
                        }
                    },
                    error: function() {
                        alert("Произошла ошибка сервера. Попробуйте позже...");
                    }
                });
            }

        }, false);

        fileInput.trigger("click");
    }
})(jQuery);

