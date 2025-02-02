(function ($) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	jQuery(document).ready(function ($) {
		$(document).on(
			'click',
			'.catch-under-construction-upload-media-button',
			function (e) {
				e.preventDefault();
				var $button = $(this);

				// Create the media frame.
				var file_frame = (wp.media.frames.file_frame = wp.media({
					title: 'Select or upload media',
					button: {
						text: 'Select',
					},
					multiple: false, // Set to true to allow multiple files to be selected
				}));

				// When an image is selected, run a callback.
				file_frame.on('select', function () {
					// We set multiple to false so only get one image from the uploader
					$button
						.siblings(
							'.catch-under-construction-reset-media-button'
						)
						.removeClass('ctis-hide');
					$button.text('Change');

					var attachment = file_frame
						.state()
						.get('selection')
						.first()
						.toJSON();

					/* Show Reset Button on image change */
					$button.siblings('input').val(attachment.url);
					$button
						.siblings('span.ctis-image-holder')
						.html('<img src="' + attachment.url + '">');
				});

				// Finally, open the modal
				file_frame.open();
			}
		);

		$('.image-url').each(function () {
			$(this).on('keyup', function () {
				$(this)
					.siblings('span.ctis-image-holder')
					.html('<img src="' + $(this).val() + '">');

				/* Show Reset Button on image change */
				$(this)
					.siblings('.catch-under-construction-reset-media-button')
					.removeClass('ctis-hide');
				$(this)
					.siblings('.catch-under-construction-upload-media-button')
					.text('Change');
			});
		});

		/* Change image to default and hide remove Reset button */
		$(document).on(
			'click',
			'.catch-under-construction-reset-media-button',
			function (e) {
				e.preventDefault();
				var name = $(this).siblings('input').attr('name');
				var option_name;
				if ('catch_under_construction_options[image]' == name) {
					option_name = 'image';
				} else if ('catch_under_construction_options[logo]' == name) {
					option_name = 'logo';
				}
				$(this).siblings('input').val(default_options[option_name]);
				$(this)
					.siblings('span.ctis-image-holder')
					.find('img')
					.attr('src', default_options[option_name]);
				$(this)
					.siblings('.catch-under-construction-upload-media-button')
					.text('Upload');
				$(this).addClass('ctis-hide');
			}
		);

		$('.ctis-trigger').on('change', function () {
			if ('click' === $(this).val()) {
				$('.ctis-more-text').parent().parent().show();
			} else {
				$('.ctis-more-text').parent().parent().hide();
			}
		});
	});

	$(function () {
		/* CPT switch */
		$('.ctp-switch').on('click', function () {
			var loader = $(this).parent().next();

			loader.show();

			var main_control = $(this);
			var data = {
				action: 'ctp_switch',
				value: this.checked,
				security: $('#ctp_tabs_nonce').val(),
				option_name: main_control.attr('rel'),
			};

			$.post(ajaxurl, data, function (response) {
				response = $.trim(response);

				if ('1' == response) {
					main_control.parent().parent().addClass('active');
					main_control.parent().parent().removeClass('inactive');
				} else if ('0' == response) {
					main_control.parent().parent().addClass('inactive');
					main_control.parent().parent().removeClass('active');
				} else {
					alert(response);
				}
				loader.hide();
			});
		});
		/* CPT switch End */

		// Tabs
		$('.catchp_widget_settings .nav-tab-wrapper a').on(
			'click',
			function (e) {
				e.preventDefault();

				if (!$(this).hasClass('ui-state-active')) {
					$('.nav-tab').removeClass('nav-tab-active');
					$('.wpcatchtab').removeClass('active').fadeOut(0);

					$(this).addClass('nav-tab-active');

					var anchorAttr = $(this).attr('href');

					$(anchorAttr).addClass('active').fadeOut(0).fadeIn(500);
				}
			}
		);
	});

	// jQuery Match Height init for sidebar spots
	$(document).ready(function () {
		$(
			'.catchp-sidebar-spot .sidebar-spot-inner, .col-2 .catchp-lists li, .col-3 .catchp-lists li'
		).matchHeight();
	});

	$(function () {
		/* For Input Switch */
		$('.wpuc-input-switch').on('click', function () {
			var main_control = $(this);

			var attribute = $(this).is(':checked');

			if (true == attribute) {
				main_control.parent().parent().addClass('active');
				main_control.parent().parent().removeClass('inactive');
			} else if (false == attribute) {
				main_control.parent().parent().addClass('inactive');
				main_control.parent().parent().removeClass('active');
			}
		});
		/* For Input Switch End */
	});
	// jQuery UI Tooltip initializaion
	$(document).ready(function () {
		$('.tooltip').tooltip();
	});
})(jQuery);
