// $(document).ready(function(){

// 	$('.has-read-more').each(function (index, el) {

// 		var maxLength = 153;
// 		var content = $(el).html();

// 		var titleText = $('#overlapping-cards__text-heading').text();
		
// 		var leadText = $('#overlapping-cards__text-content').text();
// 		var cleanLeadText = $.trim(leadText);
// 		cleanLeadText = cleanLeadText.replace(/(\s|\r\n|\n|\r)/g, " ");

// 		var totalText = titleText + " " + cleanLeadText;
		
// 		var newTextCut = totalText.substring(0, maxLength);
// 		var myLastWord = newTextCut.split(" ").pop();

// 		var indexLastWord = content.indexOf(myLastWord);

// 		var index = indexLastWord + myLastWord.length;

// 		var visibleText = content.substr(0, index);
// 		var hiddenText = content.substring(index , content.length);

// 		var html = visibleText
// 		 			+ '<div class="hidden-text">' + hiddenText + '</div>'
// 		 			+ '<div class="read-more"><a href="#" class="read-more__link more"> Learn more </a></div>';

// 		$(el).html(html);

// 	});

// 	//Read More and Read Less Click Event binding
// 	$(document).on("click", ".read-more", function (e) {
// 		e.preventDefault()
// 		var container = $(this);

// 		if (container.hasClass('less')) {
// 			container.removeClass('less');
// 			container.siblings('.overlapping-cards__text-content').find('.hidden-text').removeClass('show');
// 			$(container).children().text('Learn more').removeClass('less');
// 		} else {
// 			container.addClass('less');
// 			container.siblings('.overlapping-cards__text-content').find('.hidden-text').addClass('show');
// 			$(container).children().text('Less').addClass('less');
// 		}
// 	});

// });

// $(window).resize(function(){  
//     var width = $(window).width();
//     if (width < 530) {
//         $('.overlapping-cards__text.card-expanded-text-sm').removeClass('hidden');
//         $('.overlapping-cards__text.card-expanded-text').addClass('hidden');

// 		$('.overlapping-cards__text.card-link-text-sm').removeClass('hidden');
//         $('.overlapping-cards__text.card-link-text').addClass('hidden');
//     } else {
//         $('.overlapping-cards__text.card-expanded-text-sm').addClass( 'hidden');
//         $('.overlapping-cards__text.card-expanded-text').removeClass('hidden');

// 		$('.overlapping-cards__text.card-link-text-sm').addClass( 'hidden');
//         $('.overlapping-cards__text.card-link-text').removeClass('hidden');
//     }
// });

// $(window).resize(function(){  
//     var width = $(window).width();
//     if (width < 850) {
// 		$('.overlapping-cards__text.card-link-text-sm').removeClass('hidden');
//         $('.overlapping-cards__text.card-link-text').addClass('hidden');
//     } else {
// 		$('.overlapping-cards__text.card-link-text-sm').addClass( 'hidden');
//         $('.overlapping-cards__text.card-link-text').removeClass('hidden');
//     }
// });
