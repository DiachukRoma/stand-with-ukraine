// Smooth scrolling on internal page links jQuery plugin

function smoothScroll()
{
// Select all links with hashes
    $('a[href*="#"]')
    // Remove links that don't actually link to anything
    .not('.btn')
    .not('[href="#"]')
    .not('[href="#0"]')
    .on('click', function (e) {
      // On-page links only
        if (
        location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '')
        &&
        location.hostname === this.hostname
        ) {
          // Figure out the element to scroll to
            const hash = this.hash;
            let target = $(hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) { // make sure target exists
              // Only prevent the default behavior if the animation is actually going to play
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: $(target).offset().top - parseInt($('body').css('scroll-padding-top')), // use scroll-padding-top as offset for scroll
                }, 450, function () {
                  // Callback after animation: change focus to target element
                    const $target = $(target);
                    window.history.pushState(null, null, hash); // update URL address
                    $target.focus();
                });
            }
        }
    });
}

export default smoothScroll;
