$(document).ready(function () {
    $('.accordionButton').click(function () {
        var accordian = $(this);
        accordian.removeClass('on');
        accordian.next('.accordionContent').slideUp('normal');
        accordian.find('.plusMinus').text('+');
        if ($(this).next().is(':hidden') == true) {
            $(this).addClass('on');
            $(this).next().slideDown('normal');
            $(this).children('.plusMinus').text('-');
        }
    });
    $('.accordionContent').hide();

});