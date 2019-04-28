if (window.innerWidth <= 485) {
    $('.text-warning').removeAttr('hidden')
}

window.addEventListener('orientationchange', function() {
    if (window.innerWidth <= 485) {
        $('.text-warning').attr('hidden', true)
    } else {
        $('.text-warning').removeAttr('hidden')
    }
})