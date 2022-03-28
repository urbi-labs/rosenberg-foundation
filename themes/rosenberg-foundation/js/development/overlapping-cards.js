$(document).ready( function() {

    $('.read-more__expand').click( e => {
        console.log('akajsdhs')
        e.preventDefault()
        $(e.target).siblings('.overlapping-cards__text-excerpt').toggleClass('show')
    })

});