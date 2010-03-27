$(document).ready(function() {
    $('.sf_admin_filter:not(:has(ul.error_list))').hide()
        .closest('#sf_admin_container').find('h1')
        .append('<a href="#" class="toggle-filters off">Recherche avancée</a>');
    
    $('a.toggle-filters').click(function(ev) {
        $(this).toggleClass('off').closest('#sf_admin_container').find('.sf_admin_filter').slideToggle();
        ev.preventDefault();
    });
});
