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
/*Выдвигание таблицы размеров*/
function getSizeBlock() {
    var blockWidth = $('.sizeBlockWrapper').width();
    var checker = false;
    $('.sizeBlockBtn').click(function () {
        if (checker == false) {
            checker = true;
            $(this).hide();
            $('.sizeBlockWrapper').animate({right:"10px"},500);
        }
    });
    $('.size_panel_closeBtn').click(function () {
        if (checker == true) {
            checker = false;
            $('.sizeBlockWrapper').animate({right:"-1000"},500);
            setTimeout(function () {
                $('.sizeBlockBtn').show();
            }, 500);
        }
    });
    $('.btnBlockRow .tabBtn').click(function () {
        if (!$(this).hasClass('active')) {
            $('.btnBlockRow .tabBtn').removeClass("active");
            $(this).addClass("active");
            var tableId = $(this).attr("name");
            $(".size_panel_table").find("table").hide();
            $(".size_panel_table").find("#"+tableId+"Table").show();
            if (tableId == "parameter") {
                $('.sizeBlockWrapper').animate({width:"50%"},200);
            } else {
                $('.sizeBlockWrapper').animate({width:"25%"},200);
            }
        }
    });
}