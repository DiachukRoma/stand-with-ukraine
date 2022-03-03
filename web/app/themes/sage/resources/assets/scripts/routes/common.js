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


  },
  finalize() {
  },
};
