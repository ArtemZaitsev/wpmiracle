
// слайдер

// листаем
setInterval(function () {
    let currLeft = Math.ceil($('.slider').scrollLeft());
    let slideWidth = parseInt($('.slider-container').find('.slider').css('width'));
    let slidesCount = $('.slides > li').length;
    if (currLeft + slideWidth >= slidesCount * slideWidth) {
        $('.slider').animate({ scrollLeft: 0 }, 100);
    } else {
        $('.slider').animate({ scrollLeft: currLeft + slideWidth }, 1000);
    }
}, 3000);


//ширина слайдера при загрузке
$(document).ready(function () {
    let sliderWidth = $('.slider-container').width();
    $('.slider').css('width', sliderWidth + 'px');
    $('.slider > .slides > li').css('width', sliderWidth + 'px');
});

//Изменение ширины слайдер при ресайзе окна
$(window).resize(function () {
    let sliderWidth = $('.slider-container').width();
    $('.slider').css('width', sliderWidth + 'px');
    $('.slider > .slides > li').css('width', sliderWidth + 'px');
});

//клик на стрелку вправо

var canScroll = 1;
var slideSpeed = 1000;

$('.slider-next').click(function () {
    if (canScroll == 1) {
        canScroll = 0;
        $('.slides').css('display', 'flex');
        //вот эта фигня давала дробные значения ее надо сразу было сейлить поэтом слайд третий и плоховал))
        let currOffset = Math.ceil($('.slider').scrollLeft());
        //Определяем ширину слайда
        let slideWidth = parseInt($(this).closest('.slider-container').find('.slider').css('width'));
        //определяем количество слайдов
        let slidesCount = $('.slides > li').length;
        if (currOffset + slideWidth >= slidesCount * slideWidth) {
            $('.slider').animate({ scrollLeft: 0 }, 100);
        } else {
            $('.slider').animate({ scrollLeft: currOffset + slideWidth }, slideSpeed);
        }
        setTimeout(function () { canScroll = 1; }, slideSpeed);
    }
});

//клик на стрелку влево
$('.slider-prev').click(function () {
    if (canScroll == 1) {
        canScroll = 0;
        $('.slides').css('display', 'flex');
        let currOffset = Math.ceil($('.slider').scrollLeft());
        //Определяем ширину слайда
        let slideWidth = parseInt($(this).closest('.slider-container').find('.slider').css('width'));
        if (Math.ceil(currOffset - slideWidth) <= 0) {
            $('.slider').animate({ scrollLeft: 0 }, 100);
        } else {
            $('.slider').animate({ scrollLeft: currOffset - slideWidth }, slideSpeed);
        }
        setTimeout(function () { canScroll = 1; }, slideSpeed);
    }

});
