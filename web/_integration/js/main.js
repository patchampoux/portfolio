/* Global variables */
var $window = $(window);

/* History.js change url on scroll and on nav click */
$(document).ready(function() {
	var $brandLink = $('.brand'),
		$navLinks = $('#navigation').find('.primary a'),
		siteTitle = $('title').text();

	$brandLink.on('click touchstart', function(e) {
		$("html, body").animate({ scrollTop: 0 }, 1000, 'easeInOutCubic');

		e.preventDefault();
	});

	$navLinks.on('click touchstart', function(e) {
		var $this = $(this),
			url = $this.attr('href'),
			elementTop = $(url).offset().top;

		$("html, body").animate({ scrollTop: $(url).offset().top }, 1000 - ((elementTop * 10) / 100), 'easeInOutCubic');

		e.preventDefault();
	});

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

			$("html, body").animate({ scrollTop: 0 }, 0);
		} else if(sectionUrl === 'realisations') {
			History.replaceState({state:1}, "Réalisations | " + siteTitle, "?section=realisations");

			$("html, body").animate({ scrollTop: $('#realisations').offset().top }, 0);
		} else if(sectionUrl === 'a-propos') {
			History.replaceState({state:2}, "À propos | " + siteTitle, "?section=a-propos");

			$("html, body").animate({ scrollTop: $('#a-propos').offset().top }, 0);
		} else if(sectionUrl === 'contact') {
			History.replaceState({state:2}, "Contact | " + siteTitle, "?section=a-propos");

			$("html, body").animate({ scrollTop: $('#contact').offset().top }, 0);
		} else {
			History.replaceState({state:0}, siteTitle, "?section=accueil");

			$("html, body").animate({ scrollTop: 0 }, 0);
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
		}

		if(scrolled >= realisationsOT && scrolled < aboutOT && (scrolled >= siteHeight - (windowHeight + 100)) === false) {
			History.replaceState({state:1}, "Réalisations | " + siteTitle, "?section=realisations");
		}

		if(scrolled >= aboutOT && scrolled < contactOT && (scrolled >= siteHeight - (windowHeight + 100)) === false) {
			History.replaceState({state:2}, "À propos | " + siteTitle, "?section=a-propos");
		}

		if(scrolled >= contactOT || scrolled >= siteHeight - (windowHeight + 100)) {
			History.replaceState({state:3}, "Contact | " + siteTitle, "?section=contact");
		}
	}

	goToSection();

	$window.on('scroll', function() {
		setSate();
	});
});


/* Init plugins */
$(document).ready(function() {
	/* Placeholder polyfill */
	$('.form-control').inputPlaceholderPolyfill();
});