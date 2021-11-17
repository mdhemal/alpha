;(function($){
	$(document).ready(function() {
		$('.popup').each(function() {
			image = $(this).find('img').attr('src');
			$(this).attr('href', image);
		});
	})
})(jQuery)