let wSlide = $('.slide-show .my-slide').css('width');
let index = 0;
wSlide = parseInt(wSlide.split('px')[0]);
$(document).ready(function () {
    $('.dot').click(function () {
        let numSlide = $(this).data('id');
        if (numSlide == index) {
            numSlide = (index == 0 ? 2 : 0);
        }
        $('.slide').css({
            'transform': 'translateX(-' + wSlide * numSlide + 'px)'
        });
        index = numSlide;
    });
    setInterval(function () {
        index++;
        if(index == 3)
        {
            index = 0;
        }
        $('.slide').css({
            'transform': 'translateX(-' + wSlide * index + 'px)'
        });
    }, 3 * 1000);
});