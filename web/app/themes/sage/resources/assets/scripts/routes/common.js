export default {
  init() {
    /**
     * Toggle switcher languages
     */
    $('.lang_switcher span').on('click', function () {
      $('.lang_switcher .hidden_switcher').toggleClass('active');
    })

    $('.lang_switcher span').first().text($('.lang-item.current-lang').text());

    $(document).click(function (event) {
      if (!$(event.target).is('.lang_switcher span')) {
        $('.lang_switcher .hidden_switcher').removeClass('active');
      }
    });

    $('a[href^="#"]').click(function (e) {
      e.preventDefault();
      let id = $(this).attr('href');
      let offset = 60;
      let target = $(id).offset().top - offset;
      $('html, body').animate({ scrollTop: target }, 500);
      $('header').removeClass('active');
    });

    /**
     * Redirect to
     */
    $('.redirect_to').on('click', function () {
      window.open($(this).attr('data-redirect'), '_blank');
    });

    /**
     * Scroll to top
     */
    $(window).scroll(function () {
      if ($(this).scrollTop() > 100) {
        $('#toTop').fadeIn();
      } else {
        $('#toTop').fadeOut();
      }
    });

    $('#toTop').click(function () {
      $('html, body').animate({ scrollTop: 0 }, 1000);
    });
  },
  finalize() {
  },
};
