(function( $ ) {
	'use strict';
/** плавная прокрутка */
	$(document).ready(function(){
		$("#sia-dictionar").on("click","a", function (event) {
			event.preventDefault();
			var id  = $(this).attr('href'),
				top = $(id).offset().top;
			$('body,html').animate({scrollTop: top}, 1500);
		});
	});
/** Поиск */
	$(document).ready(function() {
		$('#search').hideseek({
		highlight: true,
		nodata: 'Результаты не найдены',
		ignore_accents: true
		});
	});

})( jQuery );
