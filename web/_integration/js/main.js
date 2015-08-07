/* Global variables */
var $window = $(window);

/* History.js change url on scroll and on nav click */
$(document).ready(function() {
	var $brandLink = $('a.brand'),
		$navLinks = $('.navigation').find('.primary a'),
		siteTitle = $('title').text();

	$brandLink.on('click touchstart', function(e) {
		$("html, body").animate({ scrollTop: 0 }, 1000, 'easeInOutCubic');

		e.preventDefault();
	});

	$navLinks.on('click touchstart', function(e) {
		var $this = $(this),
			url = $this.attr('href'),
			elementTop = $(url).offset().top;

		$("html, body").animate({ scrollTop: elementTop }, 1000, 'easeInOutCubic');

		e.preventDefault();
	});

	function setActiveLink(state) {
		$navLinks.each(function() {
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
			History.replaceState({state:0}, siteTitle, "?section=accueil");

			setActiveLink(0);

			$("html, body").scrollTop(0);
		} else if(sectionUrl === 'realisations') {
			History.replaceState({state:1}, "Réalisations | " + siteTitle, "?section=realisations");

			setActiveLink(1);

			$("html, body").scrollTop($('#realisations').offset().top);
		} else if(sectionUrl === 'a-propos') {
			History.replaceState({state:2}, "À propos | " + siteTitle, "?section=a-propos");

			setActiveLink(2);

			$("html, body").scrollTop($('#a-propos').offset().top);
		} else if(sectionUrl === 'contact') {
			History.replaceState({state:2}, "Contact | " + siteTitle, "?section=a-propos");

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

		$items.on('click touchstart', function() {
			var $this = $(this);

			if($this.hasClass('hover')) {
				$this.removeClass('hover');
			} else {
				$items.removeClass('hover');

				$this.addClass('hover');
			}
		});
	}
});


/* Init plugins */
$(document).ready(function() {
	/* Placeholder polyfill */
	$('.form-control').inputPlaceholderPolyfill();
});