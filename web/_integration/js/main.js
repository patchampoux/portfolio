/* History.js change url on scroll and on nav click */
$(document).ready(function() {
	var $navLinks = $('#navigation .primary').find('a');

	$navLinks.on('click touchstart', function(e) {
		e.preventDefault();
	});
});


/* Init plugins */
$(document).ready(function() {
	/* Placeholder polyfill */
	$('.form-control').inputPlaceholderPolyfill();
});