jQuery(function($) {
	"use strict";

	$.fn.scrollTo = function( target, options, callback ){
		if(typeof options == 'function' && arguments.length == 2){ callback = options; options = target; }
		var settings = $.extend({
			scrollTarget  : target,
			offsetTop     : 50,
			duration      : 500,
			easing        : 'swing'
		}, options);
		return this.each(function(){
			var scrollPane = $(this);
			var scrollTarget = (typeof settings.scrollTarget == "number") ? settings.scrollTarget : $(settings.scrollTarget);
			var scrollY = (typeof scrollTarget == "number") ? scrollTarget : scrollTarget.offset().top + scrollPane.scrollTop() - parseInt(settings.offsetTop);
			scrollPane.animate({scrollTop : scrollY }, parseInt(settings.duration), settings.easing, function(){
				if (typeof callback == 'function') { callback.call(this); }
			});
		});
	};

	var $wisi = $('.wysi' );
	if($wisi.length) {
		$wisi.wysihtml5({
			"stylesheets": [],
			"locale": "ru-RU"
		});
	}

	$('.popup').popup();

	$('.integer').increment();

	$('.ik').ikSelect({
		ddFullWidth: true,
		autoWidth: false,
		equalWidths: true
	});

	$('.goto').each(function(){
		$(this).on('click', function(e){
			e.preventDefault();
			$('body').scrollTo($('#' + $(this).data('goto')));
		});
	});

	function Calculator() {
		var that = this;

		var $form = $('#application-form form'),
			$total = $form.find('.total-price .value'),
			$items = $form.find('.items')
		;

		this.calculate = function() {
			var total = 0;
			$items.find('.item').each(function(){
				total += parseFloat($(this).find('select option:selected').data('price')) * $(this).find('.quantity').val();
			});

			$total.text(total);
		};

		this.getPrices = function() {
			$items.find('.item').each(function(){
				var select = $(this).find('select');
				$(this).find('.price .value').text(select.find('option:selected' ).data('price') * $(this).find('.quantity').val());
				that.calculate();
				select.on('change', function(){
					that.getPrices();
					that.calculate();
				});
				$('body').on('changeVal', function(){
					that.calculate();
					that.getPrices();
				});
			});
		};

		this.bindSelect = function() {

		};

		this.init = function() {
			that.getPrices();
			that.bindSelect();
		};
	};

	var calc = new Calculator();
	calc.init();

	var applicationForm = $('.application-form' ),
		actionNewItemButton = applicationForm.find('.action-add-new-item'),
		waiting = false
		;

	applicationForm.find('input[type="submit"]').on('click', function(e){
		e.preventDefault();


        if(jQuery('span.total-price .value').text() == 0){
            var checkout = jQuery('.popup-wrapper .popup.checkout_order');
            jQuery('.popup-wrapper').fadeIn();
            checkout.fadeIn();

        }else
        {
            var data = applicationForm.find('form').serialize();
            $.ajax({
                url: ajax_url.checkout,
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    if(data.code == 1) {
                        console.log(data.error);
                    } else {
                        // popup
                        var checkout = $('.popup-wrapper .popup.checkout_form');
                        var total_price = 0;
                        var items = '';

                        $('.popup-wrapper').fadeIn();
                        checkout.fadeIn();
                        checkout.find('.order-number .value').text(data.data.uniqueIdx);
                        checkout.find('.wallet').text(data.data.wallet);

                        for(var i = 0; i < data.applicationData.length; i++) {

                            total_price += data.applicationData[i]['totalPrice'];
                            items += ' <div class="position"> 																	\
                                            <div class="title"> 																\
                                                '+ data.applicationData[i]['productName']+'										\
                                        </div> 																					\
                                            <div class="count"> 																\
                                                '+ data.applicationData[i]['quantity']+' шт. 									\
                                            </div> 																				\
                                            <div class="price"> 																\
                                                '+ data.applicationData[i]['totalPrice']+' руб. 		\
                                            </div> 																				\
                                        </div>';
                        }

                        checkout.find('.positions' ).append($(items));
                        checkout.find('.total-price .value').text(total_price);
                        checkout.find('.delivery-point').text(data.data.deliveryPointName);
                    }
                },
                error: function() {
                    console.log('error');
                },
                data: data

            })
        }
	});

	// Dummy ajax response data

	// ajax callback
	function resp() {
		var newItem = applicationForm.find('.item' ).first().clone()
		;

		var select = newItem.find('.ik_select select');

		newItem.find('.ik_select').remove();
		newItem.find('.item-name').html(select);
		newItem.find('.price .value').text();
		newItem.find('input.quantity').val('1');

		newItem.appendTo(applicationForm.find('.items'));

		newItem.find('.ik').ikSelect({
			ddFullWidth: true,
			autoWidth: false,
			equalWidths: true
		});

		newItem.find('.integer').increment();
		calc.init();

		waiting = false;
	};

	// Add new item
	actionNewItemButton.on('click', function(e){
		e.preventDefault();
		if(!waiting) {
			waiting = true;

			// Do ajax request
			resp();
		}
	});

	var bindLoginForm = function(resp) {
		var $data = $(resp);
		var $form = $data.find('form');
		$('body').append($data);
		$data.fadeIn().find('.popup').fadeIn();
		$data.find('.popup').popup();
		$form.find('input[type="submit"]').on('click', function(e){
			e.preventDefault();
			$.ajax({
				url: ajax_url.login,
				type: 'POST',
				dataType: 'html',
				success: function(resp) {
					if(resp == 'ok') {
						window.location.href = base_url;
						return;
					} else {
						$data.remove();
						bindLoginForm(resp);
					}
				},
				data: $form.serialize()
			})
		});
	};

	$('.action-login').on('click', function(e){
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: ajax_url.login,
			dataType: 'html',
			success: bindLoginForm
		})
	});

	var bindRegisterForm = function(resp) {
		var $data = $(resp);
		var $form = $data.find('form');
		$('body').append($data);
		$data.fadeIn().find('.popup').fadeIn();
		$data.find('.popup').popup();
		$form.find('input[type="submit"]').on('click', function(e){
			e.preventDefault();
			$.ajax({
				url: ajax_url.register,
				type: 'POST',
				dataType: 'html',
				success: function(resp) {
					if(resp == 'ok') {
						window.location.href = base_url;
						return;
					} else {
						$data.remove();
						bindRegisterForm(resp);
					}
				},
				data: $form.serialize()
			})
		});
	};

	$('.action-register').on('click', function(e){
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: ajax_url.register,
			dataType: 'html',
			success: bindRegisterForm
		});
	});

	$('.flexslider').flexslider({
		autoScroll: false,
		controlNav: false,
		animation: 'slide'
	});
});