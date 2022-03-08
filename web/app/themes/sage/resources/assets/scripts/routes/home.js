import Swiper, { Navigation, Pagination, Scrollbar } from 'swiper';

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
    const newsSlider = new Swiper('.news__slider', {
      modules: [Navigation, Pagination, Scrollbar],
      spaceBetween: 38,
      slidesPerView: 'auto',

      navigation: {
        nextEl: '.news-next',
        prevEl: '.news-prev',
      },

      scrollbar: {
        el: '.swiper-scrollbar',
        draggable: true,
        dragSize: 64,
      },
    });

    $('.news .swiper-filter').on('click', function () {
      var filter = $(this).attr('data-filter');
      $('.news__slider .swiper-slide').css('display', 'none')
      $('.news__slider .swiper-slide' + filter).css('display', '')
      $('.news .swiper-filter').removeClass('swiper-active');
      $(this).addClass('swiper-active');

      newsSlider.updateSize();
      newsSlider.updateSlides();
      newsSlider.updateProgress();
      newsSlider.updateSlidesClasses();
      newsSlider.slideTo(0);
      newsSlider.scrollbar.updateSize();

      return false;
    });

    /**
     * Movement slider
     */
    new Swiper('.movement__slider', {
      modules: [Navigation, Scrollbar],
      spaceBetween: 48,
      slidesPerView: 'auto',

      navigation: {
        nextEl: '.movement-next',
        prevEl: '.movement-prev',
      },

      scrollbar: {
        el: '.swiper-scrollbar',
        draggable: true,
        dragSize: 64,
      },
    });

    /**
     * Sanctions slider
     */
    const sanctionsSlider = new Swiper('.sanctions__slider', {
      modules: [Navigation, Scrollbar],
      spaceBetween: 48,
      slidesPerView: 'auto',

      navigation: {
        nextEl: '.sanctions-next',
        prevEl: '.sanctions-prev',
      },

      scrollbar: {
        el: '.swiper-scrollbar',
        draggable: true,
        dragSize: 64,
      },
    });

    $('.sanctions_filter .swiper-filter').on('click', function () {
      var filter = $(this).attr('data-filter');
      $('.sanctions__slider .swiper-slide').css('display', 'none')
      $('.sanctions__slider .swiper-slide' + filter).css('display', '')
      $('.sanctions_filter .swiper-filter').removeClass('swiper-active');
      $(this).addClass('swiper-active');

      sanctionsSlider.updateSize();
      sanctionsSlider.updateSlides();
      sanctionsSlider.updateProgress();
      sanctionsSlider.updateSlidesClasses();
      sanctionsSlider.slideTo(0);
      sanctionsSlider.scrollbar.updateSize();

      return false;
    });

    /**
     * Petitions slider
     */
    const petitionsSlider = new Swiper('.petitions__slider', {
      modules: [Navigation, Scrollbar],
      spaceBetween: 48,
      slidesPerView: 'auto',

      navigation: {
        nextEl: '.petitions-next',
        prevEl: '.petitions-prev',
      },

      scrollbar: {
        el: '.swiper-scrollbar',
        draggable: true,
        dragSize: 64,
      },
    });

    $('.petitions_filters .swiper-filter').on('click', function () {
      var filter = $(this).attr('data-filter');
      $('.petitions__slider .swiper-slide').css('display', 'none')
      $('.petitions__slider .swiper-slide' + filter).css('display', '')
      $('.petitions_filters .swiper-filter').removeClass('swiper-active');
      $(this).addClass('swiper-active');

      petitionsSlider.updateSize();
      petitionsSlider.updateSlides();
      petitionsSlider.updateProgress();
      petitionsSlider.updateSlidesClasses();
      petitionsSlider.slideTo(0);
      petitionsSlider.scrollbar.updateSize();

      return false;
    });

    /**
     * Donation slider
     */
    new Swiper('.donation__slider', {
      modules: [Navigation, Scrollbar],
      spaceBetween: 48,
      slidesPerView: 'auto',

      navigation: {
        nextEl: '.donation-next',
        prevEl: '.donation-prev',
      },

      scrollbar: {
        el: '.swiper-scrollbar',
        draggable: true,
        dragSize: 64,
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
