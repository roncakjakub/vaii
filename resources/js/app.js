$(document).ready(function () {
    $('.addressable').on('click', function (e) {
        e.preventDefault()
        window.location = $(this).data('href')
    })

    var colors = ['#C60D13', '#900b11', '#d5494d']; // Define Your colors here, can be html name of color, hex, rgb or anything what You can use in CSS
    $('.sub-nav').css('background', colors[0])
    var active = 1;

    setInterval(function () {
        $('.sub-nav').css('background', colors[active])
        active++;
        if (active == colors.length) active = 0;
    }, 5000);
});
