$(document).ready( function() {

    $('.read-more__expand').click( e => {
        e.preventDefault()
        $(e.target).closest('.overlapping-cards__text').find('.overlapping-cards__text-excerpt').toggleClass('expanded')
        $(e.target).closest('.overlapping-cards__text').toggleClass('expanded')
        if($(e.target).closest('.overlapping-cards__text').hasClass('expanded')) {
            $(e.target).text('See less')
        } else {
            $(e.target).text('Learn more')
        }
    });

});