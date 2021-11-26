$(document).ready(function () {
    $('.addressable').on('click', function (e) {
        e.preventDefault()
        window.location = $(this).data('href')
    })
});
