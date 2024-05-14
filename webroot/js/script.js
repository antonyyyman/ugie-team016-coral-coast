$( document ).ready(function() {
    var w = window.innerWidth;

    if(w > 767){
        $('#menu-jk').scrollToFixed();
    }else{
        $('#menu-jk').scrollToFixed();
    }



})


$( document ).ready(function() {

    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        autoplay: true,
        dots: true,
        autoplayTimeout: 5000,
        navText:['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    })


});

function toggleText(element) {
    var container = element.parentNode;
    var preview = container.querySelector('.text-preview');
    var fullText = container.querySelector('.full-text');

    if (preview.style.display === 'none') {
        preview.style.display = 'block';
        fullText.style.display = 'none';
        element.textContent = 'Show More';
    } else {
        preview.style.display = 'none';
        fullText.style.display = 'block';
        element.textContent = 'Show Less';
    }
}
