$(document).ready(function () {
    stickyHeader();
    backToTop();
});

/*Липкая шапка*/
function stickyHeader() {
    $(window).scroll(function () {
        if ($(this).scrollTop() > '74') {
            $('.header').css('position', 'fixed');
            $('.circleUp').css('display','block');
        } else {
            $('.header').css('position', 'relative');
            $('.circleUp').css('display','none');
        }
    });
}
/*Возврат в начало страницы*/
function backToTop() {
    $('.circleUp').click(function () {
        $('html, body').animate({scrollTop: 0},500);
        return false;
    });
}