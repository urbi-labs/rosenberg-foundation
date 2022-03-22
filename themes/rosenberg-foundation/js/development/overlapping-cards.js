$(document).ready(function(){

	$('.has-read-more').each(function (index, el) {

		var maxLength = 110;
		var content = $(el).html();

		if (content.length > maxLength) {
			var visibleText = content.substring(0, maxLength);
			var hiddenText = content.substring(maxLength, content.length);

			var html = visibleText
					 + '<div class="hidden-text">' + hiddenText + '</div>'
					 + '<div class="read-more"><a href="#" class="read-more__link more"> Read more </a></div>';

			$(el).html(html);
		}

	});

	//Read More and Read Less Click Event binding
	$(document).on("click", ".read-more", function (e) {
		e.preventDefault()
		var container = $(this);

		if (container.hasClass('less')) {
			container.removeClass('less');
			container.siblings('.hidden-text').removeClass('show');
			$(container).children('.read-more__link').text('Read More').removeClass('less');

		} else {
			container.addClass('less');
			container.siblings('.hidden-text').addClass('show');
			$(container).children('.read-more__link').text('Less').addClass('less');
		}
	});

});