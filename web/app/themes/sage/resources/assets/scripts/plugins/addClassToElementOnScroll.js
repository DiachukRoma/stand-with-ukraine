// Add a 'scrolled' class to the an element after scrolling a specified number of pixels
// Good for hiding / showing navbar dependent on scroll
// call this function inside a $(window).on('scroll') event

function addClassToElementOnScroll(scrollDistance, $element) {
  const scroll = $(window).scrollTop();
  if (scroll >= scrollDistance) {
    $element.addClass('scrolled');
  } else {
    $element.removeClass('scrolled');
  }
}

export default addClassToElementOnScroll;
