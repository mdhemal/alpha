;(function($){
	$(document).ready(function() {
		$('.popup').each(function() {
			image = $(this).find('img').attr('src');
			$(this).attr('href', image);
		});


		var slider = tns({
		    container: '#gallery-images',
		    items: 1,
		    slideBy: 'page',
		    autoplay: true
		  });
		var team_slider = tns({
		    container: '.team-active',
		    items: 1,
		    slideBy: 'page',
		    autoplay: true
		  });
	})
})(jQuery)