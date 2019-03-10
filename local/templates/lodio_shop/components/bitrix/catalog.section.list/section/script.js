
$(document).ready(function () {
    var checker = false;

    $('.sectionActiveBtn').click(function () {
        if (checker == false) {
            $('.filter-box').show();
            $('.sectionActiveBtn').addClass('active');
            checker = true;
        } else {
            $('.filter-box').hide();
            $('.sectionActiveBtn').removeClass('active');
            checker = false;
        }
    });

});
