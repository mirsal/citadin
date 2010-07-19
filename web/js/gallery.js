$(document).ready(function() {

    $('section.gallery ul.thumbnails').css('overflow-y', 'hidden');

    if($('section.gallery ul.thumbnails > li').length <= 4)
        return;

    $('section.gallery a.control').addClass('visible');

    $('section.gallery a.next.control').click(function(ev) {
        $(this).closest('section').find('ul.thumbnails').scrollTo('+=79px', 100);
        ev.preventDefault();
    });

    $('section.gallery a.prev.control').click(function(ev) {
        $(this).closest('section').find('ul.thumbnails').scrollTo('-=79px', 100);
        ev.preventDefault();
    });

});
