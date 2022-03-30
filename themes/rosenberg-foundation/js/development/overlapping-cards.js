$(document).ready( function() {

    $('.read-more__expand').click( e => {
        e.preventDefault()
        $(e.target).siblings('.overlapping-cards__text-excerpt').toggleClass('expanded')
        $(e.target).closest('.overlapping-cards__text').toggleClass('expanded')
    })

});