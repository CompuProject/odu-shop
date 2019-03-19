$(document).ready(function () {
    stickyHeader();
    backToTop();
    getSizeBlock();
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
function getSizeBlock() {
    var checker = false;
    $('.sizeBlockBtn').click(function () {
        if (checker == false) {
            checker = true;
            $(this).hide();
            $('.sizeBlockWrapper').animate({right:"0"},500);
        }
    });
    $('.size_panel_closeBtn').click(function () {
        if (checker == true) {
            checker = false;
            $('.sizeBlockWrapper').animate({right:"-25%"},500);
            setTimeout(function () {
                $('.sizeBlockBtn').show();
            }, 500);
        }
    });
}