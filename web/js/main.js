/* Global variables */
var $window = $(window),
	$body = $('body'),
	resizeTimer;

/* History.js change url on scroll and on nav click */
$(document).ready(function() {
	var $navLinks = $('.navigation').find('.primary a'),
		siteTitle = $('title').text();

	$body.on('click touchstart', 'a.brand', function(e) {
		$("html, body").animate({ scrollTop: 0 }, 1000, 'easeInOutCubic');

		e.preventDefault();
	});

	$body.on('click touchstart', '.navigation .primary a', function(e) {
		var $this = $(this),
			url = $this.attr('href'),
			elementTop = $(url).offset().top;

		$("html, body").animate({ scrollTop: elementTop }, 1000, 'easeInOutCubic');

		e.preventDefault();
	});

	function setActiveLink(state) {
		$('.navigation .primary a').each(function() {
			var $this = $(this);

			if($this.data('state') === state && !$this.hasClass('active')) {
				$this.parent().siblings().find('a').removeClass('active');

				$this.addClass('active');
			} else if(state === 0) {
				$navLinks.removeClass('active');
			}
		});
	}

	function goToSection() {
		var url = window.location.href,
			sectionUrl = url.split('?')[1];

		if(sectionUrl) {
			sectionUrl = sectionUrl.split('&')[0];
		}

		if(sectionUrl) {
			sectionUrl = sectionUrl.split('=')[1];
		}

		if(sectionUrl === 'accueil') {
			History.replaceState({state:0}, "", "?section=accueil");

			setActiveLink(0);

			$("html, body").scrollTop(0);
		} else if(sectionUrl === 'realisations') {
			History.replaceState({state:1}, "", "?section=realisations");

			setActiveLink(1);

			$("html, body").scrollTop($('#realisations').offset().top);
		} else if(sectionUrl === 'a-propos') {
			History.replaceState({state:2}, "", "?section=a-propos");

			setActiveLink(2);

			$("html, body").scrollTop($('#a-propos').offset().top);
		} else if(sectionUrl === 'contact') {
			History.replaceState({state:2}, "", "?section=a-propos");

			setActiveLink(3);

			$("html, body").scrollTop($('#contact').offset().top);
		} else {
			History.replaceState({state:0}, siteTitle, "?section=accueil");

			setActiveLink(0);

			$("html, body").scrollTop(0);
		}
	}

	function setSate() {
		var scrolled = $window.scrollTop(),
			realisationsOT = $('#realisations').offset().top,
			aboutOT = $('#a-propos').offset().top,
			contactOT = $('#contact').offset().top,
			siteHeight = $('#site-wrapper').outerHeight(),
			windowHeight = $window.outerHeight();

		if(scrolled >= 0 && scrolled < realisationsOT && (scrolled >= siteHeight - (windowHeight + 100)) === false) {
			History.replaceState({state:0}, siteTitle, "?section=accueil");

			setActiveLink(0);
		}

		if(scrolled >= realisationsOT && scrolled < aboutOT && (scrolled >= siteHeight - (windowHeight + 100)) === false) {
			History.replaceState({state:1}, "Réalisations | " + siteTitle, "?section=realisations");

			setActiveLink(1);
		}

		if(scrolled >= aboutOT && scrolled < contactOT && (scrolled >= siteHeight - (windowHeight + 100)) === false) {
			History.replaceState({state:2}, "À propos | " + siteTitle, "?section=a-propos");

			setActiveLink(2);
		}

		if(scrolled >= contactOT || scrolled >= siteHeight - (windowHeight + 100)) {
			History.replaceState({state:3}, "Contact | " + siteTitle, "?section=contact");

			setActiveLink(3);
		}
	}

	goToSection();

	$window.on('scroll', function() {
		setSate();
	});
});


/* On touch realisations */
$(document).ready(function() {
	if(!$('html').hasClass('no-touch')) {
		var $items = $('.portfolio').find('.item');

		$items.on('click', function(e) {
			var $this = $(this);

			this.toggleClass('hover');

			$this.parent().siblings().find('.item').removeClass('hover');

			e.preventDefault();
		});
	}
});


/* Fixed and mobile nav */
$(document).ready(function() {
	var scrolled = $window.scrollTop(),
		$header = $('#header'),
		$fixedHeader = $('<header id="fixed-header" class="site-padding"></header>').html($header.html()).prependTo('body'),
		$btnMnav = $('.btn-mnav'),
		headerHeight = $header.outerHeight(),
		$mnavOverlay = $('#mnav-overlay');

	function showFixedNav() {
		$fixedHeader.addClass('visible');
	}

	function hideFixedNav() {
		$fixedHeader.removeClass('visible');
	}

	function openMnav() {
		$body.addClass('unscroll mnav-open');
	}

	function closeMnav() {
		$body.removeClass('unscroll mnav-open');
	}

	if(scrolled >= headerHeight && !$fixedHeader.hasClass('visible')) {
		showFixedNav();
	} else if(scrolled < headerHeight && $fixedHeader.hasClass('visible')) {
		hideFixedNav();
	}

	$window.on('scroll', function() {
		scrolled = $window.scrollTop();
		headerHeight = $('#header').outerHeight();

		if(scrolled >= headerHeight && !$fixedHeader.hasClass('visible')) {
			showFixedNav();
		} else if(scrolled < headerHeight && $fixedHeader.hasClass('visible')) {
			hideFixedNav();
		}

		if(scrolled < headerHeight && $body.hasClass('mnav-open')) {
			closeMnav();
		}
	});

	$window.on('resize', function() {
		clearTimeout(resizeTimer);

		resizeTimer = setTimeout(function() {
			scrolled = $window.scrollTop();
			headerHeight = $('#header').outerHeight();

			if(scrolled >= headerHeight && !$fixedHeader.hasClass('visible')) {
				showFixedNav();
			} else if(scrolled < headerHeight && $fixedHeader.hasClass('visible')) {
				hideFixedNav();
			}

			if(scrolled < headerHeight && $body.hasClass('mnav-open')) {
				closeMnav();
			}
		}, 100);
	});

	$btnMnav.on('click', function(e) {
		if($body.hasClass('mnav-open')) {
			closeMnav();
		} else {
			openMnav();
		}

		e.preventDefault();
	});

	$mnavOverlay.on('click', function() {
		closeMnav();
	});

	$fixedHeader.find('.navigation .primary a').on('click touchstart', function() {
		setTimeout(function() {
			closeMnav();
		}, 1100);
	});

	$fixedHeader.find('.navigation').swipe( {
		//Generic swipe handler for all directions
		swipe:function(event, direction) {
			if(direction === 'right') {
				closeMnav();
			}
		}
	});

	$mnavOverlay.swipe( {
		//Generic swipe handler for all directions
		swipe:function(event, direction) {
			if(direction === 'right') {
				closeMnav();
			}
		}
	});
});


/* Ajax contact form */
$(document).ready(function() {
	var $frm = $('#contact-form');

	$frm.submit(function(e) {
		$.ajax({
			type: $frm.attr('method'),
			url: 'scripts/contact.ajax.php',
			data: $frm.serialize(),
			dataType: 'json',
			success: function(data){
				var $actionsWrapper = $frm.find('.actions'),
					$msg = $('<span class="error-msg" style="display:none;"><i class="icon-info"></i>&nbsp;&nbsp;' + data[0].message + '</span>');

				if(data[0].status === 'error') {
					if($actionsWrapper.find('.error-msg').length) {
						$actionsWrapper.find('.error-msg').stop(true, true).fadeOut(200, function() {
							$(this).html('<i class="icon-info"></i>&nbsp;&nbsp;' + data[0].message).stop(true, true).fadeIn(200);
						});
					} else  {
						$actionsWrapper.prepend($msg);

						$msg.stop(true, true).fadeIn(200);
					}
				} else {
					if($actionsWrapper.find('.error-msg').length) {
						$actionsWrapper.find('.error-msg').stop(true, true).fadeOut(200, function() {
							$(this).html('<i class="icon-info"></i>&nbsp;&nbsp;' + data[0].message).stop(true, true).fadeIn(200);
						});
					} else  {
						$actionsWrapper.prepend($msg);

						$msg.stop(true, true).fadeIn(200);
					}

					$frm.find('button').animate({
						'opacity': 0
					}, 200, function() {
						$(this).addClass('success').attr('disabled', 'disabled').html('<i class="icon-check"></i>Succès').animate({
							'opacity': 1
						}, 200);
					});
				}
			}
		});

		e.preventDefault();
	});
});


/* Init plugins */
$(document).ready(function() {
	/* Placeholder polyfill */
	$('.form-control').inputPlaceholderPolyfill();
});