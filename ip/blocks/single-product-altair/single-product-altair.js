(function($){
$('.good__accord__it.active .good__accord__it__cnt').fadeIn(0);

$('.good__accord__it__title').on('click', function(event) {
	var th = $(this),
		par = th.closest('.good__accord__it'),
		cnt = par.find('.good__accord__it__cnt');
	if (par.hasClass('active')) {
		par.removeClass('active');
		cnt.slideUp(300);
	} else {
		par.addClass('active');
		cnt.slideDown(300);
	}
	event.preventDefault();
});
})(jQuery);
