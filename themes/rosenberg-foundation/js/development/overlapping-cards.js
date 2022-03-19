$(document).ready(function(){
	
	function checkSectionHeight(el) {

        console.log('entro');

		var legalSectionChildren = $(el).children()
		var sectionHeight = 0

		$(legalSectionChildren).each(function (index, child) {
			sectionHeight += $(child).outerHeight()
		})

		return sectionHeight;

	}

	$('.has-read-more').each(function (index, el) {

        console.log('entro-has-read-more');

		if (checkSectionHeight(el) > 96) {
			$(el).addClass('max-height')
			$(el).siblings('.read-more').addClass('show')
		}

		$(el).css('max-height', checkSectionHeight(el))

	})

	//Read More and Read Less Click Event binding
	$(document).on("click", ".read-more", function (e) {
		e.preventDefault()
        console.log('click');

		var $container = $(this).siblings(".has-read-more")

        console.log($container.outerHeight());

		if ($container.outerHeight() > 97) {
            console.log('entra por si');
			$container.addClass('max-height');
			$container.siblings('.read-more').find('.read-more__link').text('Show More');
			$container.siblings('.read-more').find('.material-icons').text('expand_more');
		} else {
            console.log('entra por no');
			$container.removeClass('max-height');
			$container.siblings('.read-more').find('.read-more__link').text('Show Less');
			$container.siblings('.read-more').find('.material-icons').text('expand_less');
		}
	});

});