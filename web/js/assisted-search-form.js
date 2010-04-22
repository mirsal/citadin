$(document).ready(function() {
    $('form.assisted_search.unbound')
        .find('input[type=text], textarea')
        .click(function(ev) {

            var _default = $(this).attr('value') ? $(this).attr('value') : $(this).text();
            
            if($(this).data('default') == undefined) {
                $(this).data('default', _default);
            }

            if($(this).data('default') == _default) {
                $(this).removeAttr('value').empty();
            }

            $(this).removeClass('dimmed');

        }).blur(function(ev) {

            if($(this).attr('value') || $(this).text()) {
                return;
            }

            $(this).attr('value', $(this).data('default'))
                   .text($(this).data('default'))
                   .addClass('dimmed');

        }).addClass('dimmed');
});
