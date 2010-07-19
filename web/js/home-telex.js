$(document).ready(function() {
    var slide = function() {
        var container = $('.telex');
        container.scrollTo('li:eq(1)', { duration : 300, onAfter : function() {
            var prev = container.find('li:first').remove();
            container.scrollTo(container.find('li:first'));
            prev.appendTo(container);
        } });
        window.setTimeout(slide, 6000);
    }

    window.setTimeout(slide, 6000);
});
