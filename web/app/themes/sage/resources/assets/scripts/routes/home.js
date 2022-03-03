import Swiper, { Navigation, Pagination } from 'swiper';

export default {
  init() {
    /**
     * Hot news slider
     */
    new Swiper('.hotNews', {
      modules: [Navigation],
      navigation: {
        nextEl: '.hotNews-next',
        prevEl: '.hotNews-prev',
      },
    });

    /**
     * News slider
     */
    new Swiper('.news__slider', {
      modules: [Navigation, Pagination],
      spaceBetween: 48,
      slidesPerView: 'auto',

      navigation: {
        nextEl: '.news-next',
        prevEl: '.news-prev',
      },

      pagination: {
        el: '.news-pagination',
        clickable: true,
      },
    });

    /**
     * Movement slider
     */
    new Swiper('.movement__slider', {
      modules: [Navigation, Pagination],
      spaceBetween: 48,
      slidesPerView: 'auto',

      navigation: {
        nextEl: '.movement-next',
        prevEl: '.movement-prev',
      },

      pagination: {
        el: '.movement-pagination',
        clickable: true,
      },
    });

    /**
     * Toogle mob menu
     */
    $('.mob_menu_btn').on('click', () => {
      $('header').toggleClass('active');
    });

    /**
     * News video
     */
    $('.modal').on('hidden.bs.modal', function () {
      $('.modal video').trigger('pause');
    })

  },
  finalize() {
  },
};
